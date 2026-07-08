<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        $files = collect(Storage::disk('public')->files('reports'))
            ->sortDesc()
            ->values();

        return view('admin.reports.index', [
            'files' => $files,
            'year' => now()->year,
            'month' => now()->month,
        ]);
    }

    public function download(Request $request, ReportService $reportService): Response
    {
        $validated = $request->validate([
            'year' => ['required', 'integer', 'min:2020', 'max:2100'],
            'month' => ['required', 'integer', 'min:1', 'max:12'],
        ]);

        $stats = $reportService->monthlyDepartmentStats($validated['year'], $validated['month']);

        $pdf = Pdf::loadView('admin.reports.monthly-pdf', [
            'stats' => $stats,
            'year' => $validated['year'],
            'month' => $validated['month'],
        ]);

        return $pdf->download("monthly-report-{$validated['year']}-{$validated['month']}.pdf");
    }
}
