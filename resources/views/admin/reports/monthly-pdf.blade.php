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
        h1 { font-size: 18px; margin-bottom: 4px; }
        p.subtitle { color: #6b7280; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #d1d5db; padding: 6px 8px; text-align: left; }
        th { background-color: #f3f4f6; }
    </style>
</head>
<body>
    <h1>{{ __('လစဉ်စွမ်းဆောင်ရည် အစီရင်ခံစာ') }}</h1>
    <p class="subtitle">{{ $year }} - {{ str_pad($month, 2, '0', STR_PAD_LEFT) }}</p>

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
</body>
</html>
