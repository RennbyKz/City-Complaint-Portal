<?php

namespace App\Console\Commands;

use App\Services\ReportService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateMonthlyReport extends Command
{
    protected $signature = 'report:generate-monthly {--month=} {--year=}';

    protected $description = 'Generate the monthly department performance PDF report';

    public function handle(ReportService $reportService): int
    {
        $date = now()->subMonthNoOverflow();
        $year = (int) ($this->option('year') ?? $date->year);
        $month = (int) ($this->option('month') ?? $date->month);

        $stats = $reportService->monthlyDepartmentStats($year, $month);

        $pdf = Pdf::loadView('admin.reports.monthly-pdf', compact('stats', 'year', 'month'));

        Storage::disk('public')->put("reports/{$year}-{$month}.pdf", $pdf->output());

        $this->info("Monthly report generated for {$year}-{$month}.");

        return self::SUCCESS;
    }
}
