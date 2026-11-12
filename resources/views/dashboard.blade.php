@extends('index')

@push('styles')
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid tea-dashboard">
        <header class="dashboard-heading">
            <div>
                <h1>Dashboard</h1>
                <p>Welcome back! Here's what's happening at your tea shop today.</p>
            </div>
            <span class="sample-label"><i class="far fa-calendar-alt" aria-hidden="true"></i> Sample overview</span>
        </header>

        <div class="summary-grid">
            @foreach ([['Today’s Sales', '৳40,000', '12.5', 'mug-hot', 'blue'], ['Total Invoices', '215', '8.0', 'file-invoice', 'green'], ['Tea Cups Sold', '320', '10.3', 'coffee', 'gold'], ['Gross Profit', '৳28,500', '14.2', 'coins', 'purple']] as [$label, $value, $growth, $icon, $color])
                <article class="summary-card {{ $color }}">
                    <span class="summary-icon"><i class="fas fa-{{ $icon }}" aria-hidden="true"></i></span>
                    <div><h2>{{ $label }}</h2><strong>{{ $value }}</strong><p><span>▲ +{{ $growth }}%</span> vs. yesterday</p></div>
                </article>
            @endforeach
        </div>

        <div class="charts-grid">
            <section class="dashboard-panel">
                <div class="panel-heading">
                    <h2><i class="fas fa-chart-bar" aria-hidden="true"></i> Sales Overview</h2>
                    <div class="chart-tabs" role="group" aria-label="Sales chart period">
                        <button type="button" data-period="weekly" aria-pressed="false">Weekly</button>
                        <button type="button" data-period="monthly" aria-pressed="true" class="active">Monthly</button>
                        <button type="button" data-period="yearly" aria-pressed="false">Yearly</button>
                    </div>
                </div>
                <div class="sales-chart" id="myAreaChart">
                    <svg viewBox="0 0 650 220" role="img" aria-labelledby="sales-chart-title">
                        <title id="sales-chart-title">Sample monthly sales, January to December</title>
                        <defs><linearGradient id="sales-fill" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#2874ff" stop-opacity=".35"/><stop offset="100%" stop-color="#2874ff" stop-opacity=".05"/></linearGradient></defs>
                        @foreach ([0, 1, 2, 3, 4, 5] as $line)
                            <line x1="65" y1="{{ 20 + $line * 34 }}" x2="630" y2="{{ 20 + $line * 34 }}" stroke="#dce3f0" stroke-dasharray="2 2"/>
                            <text x="53" y="{{ 24 + $line * 34 }}" text-anchor="end">৳{{ number_format(50000 - $line * 10000) }}</text>
                        @endforeach
                        <path id="sales-area" fill="url(#sales-fill)"/>
                        <path id="sales-line" fill="none" stroke="#246bff" stroke-width="2.5" stroke-linejoin="round"/>
                        <g id="sales-points"></g><g id="sales-labels"></g>
                    </svg>
                </div>
            </section>
            <section class="dashboard-panel">
                <div class="panel-heading"><h2><i class="fas fa-chart-pie" aria-hidden="true"></i> Tea Category Sales</h2></div>
                <div class="category-content">
                    <div class="sales-donut" id="myPieChart" role="img" aria-label="Milk tea 60%, black tea 25%, lemon tea 15%">
                        <div><strong>৳40,000</strong><span>Total Sales</span></div>
                        <b class="donut-milk">60%</b><b class="donut-black">25%</b><b class="donut-lemon">15%</b>
                    </div>
                    <ul class="category-legend">
                        @foreach ([['Milk Tea', '24,000', 60, 'blue'], ['Black Tea', '10,000', 25, 'green'], ['Lemon Tea', '6,000', 15, 'gold']] as [$name, $amount, $percent, $color])
                            <li><span class="legend-dot {{ $color }}"></span><div><strong>{{ $name }}</strong><span>৳{{ $amount }} ({{ $percent }}%)</span></div></li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>

        <div class="details-grid">
            <section class="dashboard-panel">
                <div class="panel-heading"><h2><i class="fas fa-trophy" aria-hidden="true"></i> Top Selling Tea</h2></div>
                <div class="top-teas">
                    @foreach ([['Milk Tea', 192, 60, 'blue', '🥤'], ['Black Tea', 80, 25, 'green', '☕'], ['Lemon Tea', 48, 15, 'gold', '🍋']] as [$name, $cups, $percent, $color, $illustration])
                        <div class="tea-row"><span class="tea-illustration" aria-hidden="true">{{ $illustration }}</span><div class="tea-details"><div class="tea-title"><strong>{{ $name }}</strong><span>{{ $percent }}%</span></div><p>{{ $cups }} cups sold</p><div class="tea-progress" role="progressbar" aria-label="{{ $name }} sales share" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"><span class="{{ $color }}" style="width: {{ $percent }}%"></span></div></div></div>
                    @endforeach
                </div>
            </section>
            <section class="dashboard-panel">
                <div class="panel-heading"><h2><i class="fas fa-file-invoice" aria-hidden="true"></i> Recent Invoices</h2><span class="sample-label">Sample data</span></div>
                <div class="invoice-table-wrap">
                    <table class="invoice-table">
                        <thead><tr><th scope="col">Invoice #</th><th scope="col">Customer Phone</th><th scope="col">Amount</th><th scope="col">Status</th></tr></thead>
                        <tbody>
                            @foreach ([['0245', '01712-345678', 250, 'Paid'], ['0244', '01823-456789', 150, 'Paid'], ['0243', '01911-223344', 400, 'Paid'], ['0242', '01755-667788', 300, 'Cancelled'], ['0241', '01670-998877', 200, 'Paid']] as [$invoice, $phone, $amount, $status])
                                <tr><td class="invoice-number">INV-{{ $invoice }}</td><td>{{ $phone }}</td><td>৳{{ $amount }}</td><td><span class="invoice-status {{ $status === 'Paid' ? 'paid' : 'cancelled' }}">{{ $status }}</span></td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="dashboard-panel">
                <div class="panel-heading"><h2><i class="fas fa-bolt" aria-hidden="true"></i> Quick Actions</h2></div>
                <div class="quick-actions">
                    @foreach ([['New Sale', 'shopping-cart', 'pos.index', 'primary'], ['Add Product', 'cube', 'products.index', 'success'], ['View Reports', 'chart-bar', 'reports.index', ''], ['Customers', 'users', 'customers.index', '']] as [$label, $icon, $route, $style])
                        @if (Illuminate\Support\Facades\Route::has($route))
                            <a class="quick-action {{ $style }}" href="{{ route($route) }}"><i class="fas fa-{{ $icon }}" aria-hidden="true"></i>{{ $label }}</a>
                        @else
                            <button type="button" class="quick-action {{ $style }}" disabled title="Coming soon"><i class="fas fa-{{ $icon }}" aria-hidden="true"></i>{{ $label }}<small>Coming soon</small></button>
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
