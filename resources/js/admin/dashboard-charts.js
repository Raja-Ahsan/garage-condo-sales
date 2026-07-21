/**
 * Themed dashboard ApexCharts — brand palette from ADMIN_THEME_AUDIT.md.
 * Replaces Cuba default.js chart colors (#7366FF) without redesigning layouts.
 */

const chartColors = {
    primary: '#d9b678',
    primaryDeep: '#a8823a',
    accent: '#2f9e8f',
    steel: '#a9aeb8',
    info: '#48a3d7',
    warning: '#ffb37c',
    danger: '#e0534a',
    grid: 'rgba(74, 78, 88, 0.45)',
    label: '#a9aeb8',
};

function syncCubaConfig() {
    window.CubaAdminConfig = {
        ...(window.CubaAdminConfig || {}),
        primary: chartColors.primary,
        secondary: chartColors.steel,
        success: chartColors.accent,
    };
}

function renderVisitorChart() {
    const el = document.querySelector('#visitor_chart');
    if (!el || typeof ApexCharts === 'undefined') {
        return;
    }

    const options = {
        series: [{ name: 'Growth', data: [9, 25, 18, 30, 9, 14, 26, 22, 28, 16, 9, 8, 16] }],
        chart: {
            height: 160,
            type: 'line',
            stacked: true,
            offsetY: -10,
            toolbar: { show: false },
        },
        colors: [chartColors.primary],
        stroke: { width: 3, curve: 'smooth' },
        xaxis: {
            type: 'category',
            categories: ['0', '', '10k', '', '20k', '', '30k', '', '40k', '', '50k', '', '60k'],
            labels: {
                style: {
                    fontFamily: 'Inter, Rubik, sans-serif',
                    fontWeight: 500,
                    colors: chartColors.label,
                },
            },
            axisTicks: { show: false },
            axisBorder: { show: false },
        },
        grid: {
            show: true,
            borderColor: chartColors.grid,
            strokeDashArray: 3,
            xaxis: { lines: { show: true } },
            yaxis: { lines: { show: false } },
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                colorStops: [
                    { offset: 0, color: chartColors.info, opacity: 1 },
                    { offset: 100, color: chartColors.primary, opacity: 1 },
                ],
            },
        },
        yaxis: { labels: { show: false } },
        responsive: [
            { breakpoint: 1400, options: { chart: { height: 310, offsetY: 0 } } },
            { breakpoint: 1200, options: { chart: { height: 130, offsetY: -20 } } },
            { breakpoint: 576, options: { chart: { height: 150, offsetY: -20 } } },
        ],
    };

    new ApexCharts(el, options).render();
}

function renderSalesChart() {
    const el = document.querySelector('#chart-currently');
    if (!el || typeof ApexCharts === 'undefined') {
        return;
    }

    const primary = window.CubaAdminConfig?.primary || chartColors.primary;

    const options = {
        series: [
            { name: 'Earning', data: [300, 150, 250, 270, 400, 420, 600, 420, 400, 700, 600, 200] },
            { name: 'Expense', data: [300, 750, 700, 840, 850, 999, 900, 999, 850, 470, 400, 500] },
        ],
        chart: {
            type: 'bar',
            height: 312,
            stacked: true,
            toolbar: { show: false },
            dropShadow: {
                enabled: true,
                top: 8,
                left: 0,
                blur: 8,
                color: primary,
                opacity: 0.15,
            },
        },
        plotOptions: {
            bar: { horizontal: false, columnWidth: '20%', borderRadius: 0 },
        },
        grid: {
            borderColor: chartColors.grid,
            yaxis: { lines: { show: true } },
        },
        dataLabels: { enabled: false },
        stroke: { width: 2, colors: ['#282c33'] },
        fill: { opacity: 1 },
        legend: { show: false },
        colors: [primary, chartColors.steel],
        yaxis: {
            tickAmount: 3,
            labels: {
                formatter: (value) => `${value}k`,
                style: {
                    fontFamily: 'Inter, Rubik, sans-serif',
                    fontWeight: 400,
                    colors: chartColors.label,
                    fontSize: 12,
                },
            },
            axisBorder: { show: false },
            axisTicks: { show: false },
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', ' Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                style: { fontFamily: 'Inter, Rubik, sans-serif', colors: chartColors.label },
            },
            axisBorder: { show: false },
            axisTicks: { show: false },
        },
        responsive: [
            { breakpoint: 1400, options: { chart: { height: 310 } } },
            { breakpoint: 1200, options: { chart: { height: 280 } } },
        ],
    };

    new ApexCharts(el, options).render();
}

function renderMonthlyTarget() {
    const el = document.querySelector('#monthly_target');
    if (!el || typeof ApexCharts === 'undefined') {
        return;
    }

    const options = {
        series: [75],
        chart: { height: 280, type: 'radialBar' },
        plotOptions: {
            radialBar: {
                hollow: { size: '60%' },
                track: { background: chartColors.grid },
                dataLabels: {
                    name: { show: true, color: chartColors.label, offsetY: -10 },
                    value: {
                        color: chartColors.primary,
                        fontSize: '22px',
                        fontFamily: 'Inter, Rubik, sans-serif',
                        show: true,
                    },
                },
            },
        },
        colors: [chartColors.primary],
        labels: ['Target'],
        stroke: { lineCap: 'round' },
    };

    new ApexCharts(el, options).render();
}

function renderSaleReport() {
    const el = document.querySelector('#sale_report');
    if (!el || typeof ApexCharts === 'undefined') {
        return;
    }

    const options = {
        series: [
            {
                name: 'Refunds',
                type: 'column',
                data: [25, 18, 15, 32, 16, 22, 18, 24, 15, 22, 19, 24],
            },
            {
                name: 'Earnings',
                type: 'line',
                data: [50, 66, 22, 40, 50, 79, 53, 66, 42, 19, 42, 63],
            },
            {
                name: 'Orders',
                type: 'line',
                data: [48, 33, 38, 32, 42, 33, 50, 22, 33, 48, 24, 35],
            },
        ],
        chart: {
            height: 315,
            type: 'line',
            stacked: false,
            toolbar: { show: false },
        },
        colors: [chartColors.accent, chartColors.warning, chartColors.primary],
        stroke: { width: [0, 2, 2], curve: 'smooth' },
        plotOptions: {
            bar: { columnWidth: '40%' },
        },
        fill: { opacity: [0.85, 1, 1] },
        grid: { borderColor: chartColors.grid },
        labels: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ],
        markers: { size: 0 },
        xaxis: {
            labels: {
                style: { colors: chartColors.label, fontFamily: 'Inter, Rubik, sans-serif' },
            },
            axisBorder: { show: false },
            axisTicks: { show: false },
        },
        yaxis: {
            labels: {
                style: { colors: chartColors.label, fontFamily: 'Inter, Rubik, sans-serif' },
            },
        },
        legend: {
            labels: { colors: chartColors.label },
        },
        tooltip: { theme: 'dark', shared: true },
    };

    new ApexCharts(el, options).render();
}

syncCubaConfig();

document.addEventListener('DOMContentLoaded', () => {
    syncCubaConfig();
    renderVisitorChart();
    renderSalesChart();
    renderMonthlyTarget();
    renderSaleReport();
});

export { chartColors };
