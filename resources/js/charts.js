import Chart from 'chart.js/auto';

function chartColors() {
    const isDark = document.documentElement.classList.contains('dark');

    return {
        bar: isDark ? '#3987e5' : '#2a78d6',
        grid: isDark ? '#2c2c2a' : '#e1e0d9',
        text: isDark ? '#a8a6a0' : '#898781',
    };
}

async function renderCharts() {
    const el = document.getElementById('admin-dashboard-charts');
    if (!el) return;

    const response = await fetch(el.dataset.chartDataUrl);
    const data = await response.json();

    const { bar: BAR_COLOR, grid: GRID_COLOR, text: TEXT_COLOR } = chartColors();

    const commonScales = {
        x: { grid: { color: GRID_COLOR }, ticks: { color: TEXT_COLOR } },
        y: { grid: { color: GRID_COLOR }, ticks: { color: TEXT_COLOR }, beginAtZero: true },
    };

    new Chart(document.getElementById('volume-by-month-chart'), {
        type: 'bar',
        data: {
            labels: data.volumeByMonth.map((row) => row.month),
            datasets: [{ label: 'တိုင်ကြားစာအရေအတွက်', data: data.volumeByMonth.map((row) => row.total), backgroundColor: BAR_COLOR }],
        },
        options: {
            plugins: { legend: { display: false } },
            scales: commonScales,
        },
    });

    new Chart(document.getElementById('by-category-chart'), {
        type: 'bar',
        data: {
            labels: data.byCategory.map((row) => row.label),
            datasets: [{ label: 'တိုင်ကြားစာအရေအတွက်', data: data.byCategory.map((row) => row.total), backgroundColor: BAR_COLOR }],
        },
        options: {
            plugins: { legend: { display: false } },
            scales: commonScales,
        },
    });
}

renderCharts();
