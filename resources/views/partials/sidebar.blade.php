@php
    $navigationGroups = [
        'Workspace' => [
            ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'fa-tachometer-alt'],
            ['label' => 'New Sale', 'route' => 'pos.index', 'icon' => 'fa-cash-register'],
        ],
        'Shop management' => [
            ['label' => 'Tea Products', 'route' => 'products.index', 'icon' => 'fa-mug-hot'],
            ['label' => 'Customers', 'route' => 'customers.index', 'icon' => 'fa-users'],
            ['label' => 'Sales & Invoices', 'route' => 'sales.index', 'icon' => 'fa-receipt'],
        ],
        'Insights' => [
            ['label' => 'Sales Reports', 'route' => 'reports.index', 'icon' => 'fa-chart-line'],
        ],
    ];
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" aria-label="Main navigation">
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <span class="sidebar-brand-icon rotate-n-15"><i class="fas fa-mug-hot" aria-hidden="true"></i></span>
            <span class="sidebar-brand-text mx-3">Tea Shop POS</span>
        </a>
    </li>

    @foreach ($navigationGroups as $heading => $items)
        <li role="separator"><hr class="sidebar-divider"></li>
        <li class="sidebar-heading">{{ $heading }}</li>

        @foreach ($items as $item)
            @php
                $isAvailable = Illuminate\Support\Facades\Route::has($item['route']);
                $routePattern = str_contains($item['route'], '.') ? strstr($item['route'], '.', true).'.*' : $item['route'];
                $isActive = request()->routeIs($routePattern);
            @endphp
            <li class="nav-item {{ $isActive ? 'active' : '' }}">
                @if ($isAvailable)
                    <a class="nav-link" href="{{ route($item['route']) }}" @if ($isActive) aria-current="page" @endif>
                        <i class="fas fa-fw {{ $item['icon'] }}" aria-hidden="true"></i>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @else
                    <span class="nav-link" aria-disabled="true" title="This section is coming soon">
                        <i class="fas fa-fw {{ $item['icon'] }}" aria-hidden="true"></i>
                        <span>{{ $item['label'] }}</span>
                    </span>
                @endif
            </li>
        @endforeach
    @endforeach

    <li role="separator"><hr class="sidebar-divider d-none d-md-block"></li>
    <li class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" type="button" aria-label="Toggle sidebar"></button>
    </li>
</ul>
