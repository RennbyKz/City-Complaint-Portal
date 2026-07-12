<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @font-face {
            font-family: 'MyanmarText';
            src: url('{{ resource_path('fonts/MyanmarText-Regular.ttf') }}') format('truetype');
            font-weight: normal;
        }
        @font-face {
            font-family: 'MyanmarText';
            src: url('{{ resource_path('fonts/MyanmarText-Bold.ttf') }}') format('truetype');
            font-weight: bold;
        }
        body { font-family: 'MyanmarText', sans-serif; font-size: 12px; color: #1f2937; }
        h1 { font-size: 20px; margin: 0 0 2px; }
        p.subtitle { color: #6b7280; margin: 0 0 16px; }
        h2.section { font-size: 13px; margin: 22px 0 8px; padding-bottom: 4px; border-bottom: 2px solid #172554; color: #172554; }
        .summary-row { width: 100%; margin-bottom: 6px; }
        .summary-box { display: inline-block; width: 32%; border: 1px solid #d1d5db; border-radius: 4px; padding: 8px 10px; margin-right: 1%; }
        .summary-box .label { color: #6b7280; font-size: 10px; }
        .summary-box .value { font-size: 18px; font-weight: bold; color: #172554; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #d1d5db; padding: 6px 8px; text-align: left; font-size: 11px; }
        th { background-color: #172554; color: #ffffff; }
        tbody tr:nth-child(even) { background-color: #f3f4f6; }
        .footer { margin-top: 24px; padding-top: 8px; border-top: 1px solid #d1d5db; color: #9ca3af; font-size: 9px; }
    </style>
</head>
<body>
    <h1>{{ __('လစဉ်စွမ်းဆောင်ရည် အစီရင်ခံစာ') }}</h1>
    <p class="subtitle">{{ __(config('app.name')) }} &middot; {{ $year }} - {{ str_pad($month, 2, '0', STR_PAD_LEFT) }}</p>

    <div class="summary-row">
        <div class="summary-box">
            <div class="label">{{ __('လက်ခံရရှိသည့် တိုင်ကြားစာ') }}</div>
            <div class="value">{{ $summary->total_received }}</div>
        </div>
        <div class="summary-box">
            <div class="label">{{ __('ဖြေရှင်းပြီးသည့် တိုင်ကြားစာ') }}</div>
            <div class="value">{{ $summary->total_resolved }}</div>
        </div>
        <div class="summary-box">
            <div class="label">{{ __('ဌာနအရေအတွက်') }}</div>
            <div class="value">{{ $stats->count() }}</div>
        </div>
    </div>

    <h2 class="section">{{ __('ဌာနအလိုက် စွမ်းဆောင်ရည်') }}</h2>
    <table>
        <thead>
            <tr>
                <th>{{ __('ဌာန') }}</th>
                <th>{{ __('လက်ခံရရှိသည့် တိုင်ကြားစာ') }}</th>
                <th>{{ __('ဖြေရှင်းပြီးသည့် တိုင်ကြားစာ') }}</th>
                <th>{{ __('ပျမ်းမျှ ဖြေရှင်းချိန် (နာရီ)') }}</th>
                <th>{{ __('ပျမ်းမျှ ကျေနပ်မှုအဆင့်') }}</th>
                <th>{{ __('အဆင့်ပေးသူ အရေအတွက်') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stats as $row)
                <tr>
                    <td>{{ $row->department->name }}</td>
                    <td>{{ $row->total_received }}</td>
                    <td>{{ $row->total_resolved }}</td>
                    <td>{{ $row->avg_resolution_hours ? number_format($row->avg_resolution_hours, 1) : '—' }}</td>
                    <td>{{ $row->avg_rating ? number_format($row->avg_rating, 1) . ' / 5' : '—' }}</td>
                    <td>{{ $row->rating_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="section">{{ __('အမျိုးအစားအလိုက် တိုင်ကြားစာအရေအတွက်') }}</h2>
    <table>
        <thead>
            <tr>
                <th>{{ __('အမျိုးအစား') }}</th>
                <th>{{ __('တိုင်ကြားစာအရေအတွက်') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoryBreakdown as $row)
                <tr>
                    <td>{{ $row->label }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        {{ __('ထုတ်ယူသည့်အချိန်') }}: {{ now()->format('Y-m-d H:i') }}
    </div>
</body>
</html>
