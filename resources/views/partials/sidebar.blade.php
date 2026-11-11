<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" aria-label="Main navigation">
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <span class="sidebar-brand-icon rotate-n-15"><i class="fas fa-mug-hot" aria-hidden="true"></i></span>
            <span class="sidebar-brand-text mx-3">Tea Shop POS</span>
        </a>
    </li>

    <li role="separator"><hr class="sidebar-divider"></li>
    <li class="sidebar-heading">Workspace</li>

    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        @if (Illuminate\Support\Facades\Route::has('dashboard'))
            <a class="nav-link" href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) aria-current="page" @endif>
                <i class="fas fa-fw fa-tachometer-alt" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
        @else
            <span class="nav-link" aria-disabled="true" title="This section is coming soon">
                <i class="fas fa-fw fa-tachometer-alt" aria-hidden="true"></i>
                <span>Dashboard</span>
            </span>
        @endif
    </li>

    <li class="nav-item {{ request()->routeIs('pos.*') ? 'active' : '' }}">
        @if (Illuminate\Support\Facades\Route::has('pos.index'))
            <a class="nav-link" href="{{ route('pos.index') }}" @if (request()->routeIs('pos.*')) aria-current="page" @endif>
                <i class="fas fa-fw fa-cash-register" aria-hidden="true"></i>
                <span>New Sale</span>
            </a>
        @else
            <span class="nav-link" aria-disabled="true" title="This section is coming soon">
                <i class="fas fa-fw fa-cash-register" aria-hidden="true"></i>
                <span>New Sale</span>
            </span>
        @endif
    </li>

    <li role="separator"><hr class="sidebar-divider"></li>
    <li class="sidebar-heading">Shop management</li>

    <li class="nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
        @if (Illuminate\Support\Facades\Route::has('products.index'))
            <a class="nav-link" href="{{ route('products.index') }}" @if (request()->routeIs('products.*')) aria-current="page" @endif>
                <i class="fas fa-fw fa-mug-hot" aria-hidden="true"></i>
                <span>Tea Products</span>
            </a>
        @else
            <span class="nav-link" aria-disabled="true" title="This section is coming soon">
                <i class="fas fa-fw fa-mug-hot" aria-hidden="true"></i>
                <span>Tea Products</span>
            </span>
        @endif
    </li>

    <li class="nav-item {{ request()->routeIs('customers.*') ? 'active' : '' }}">
        @if (Illuminate\Support\Facades\Route::has('customers.index'))
            <a class="nav-link" href="{{ route('customers.index') }}" @if (request()->routeIs('customers.*')) aria-current="page" @endif>
                <i class="fas fa-fw fa-users" aria-hidden="true"></i>
                <span>Customers</span>
            </a>
        @else
            <span class="nav-link" aria-disabled="true" title="This section is coming soon">
                <i class="fas fa-fw fa-users" aria-hidden="true"></i>
                <span>Customers</span>
            </span>
        @endif
    </li>

    <li class="nav-item {{ request()->routeIs('sales.*') ? 'active' : '' }}">
        @if (Illuminate\Support\Facades\Route::has('sales.index'))
            <a class="nav-link" href="{{ route('sales.index') }}" @if (request()->routeIs('sales.*')) aria-current="page" @endif>
                <i class="fas fa-fw fa-receipt" aria-hidden="true"></i>
                <span>Sales & Invoices</span>
            </a>
        @else
            <span class="nav-link" aria-disabled="true" title="This section is coming soon">
                <i class="fas fa-fw fa-receipt" aria-hidden="true"></i>
                <span>Sales & Invoices</span>
            </span>
        @endif
    </li>

    <li role="separator"><hr class="sidebar-divider"></li>
    <li class="sidebar-heading">Insights</li>

    <li class="nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
        @if (Illuminate\Support\Facades\Route::has('reports.index'))
            <a class="nav-link" href="{{ route('reports.index') }}" @if (request()->routeIs('reports.*')) aria-current="page" @endif>
                <i class="fas fa-fw fa-chart-line" aria-hidden="true"></i>
                <span>Sales Reports</span>
            </a>
        @else
            <span class="nav-link" aria-disabled="true" title="This section is coming soon">
                <i class="fas fa-fw fa-chart-line" aria-hidden="true"></i>
                <span>Sales Reports</span>
            </span>
        @endif
    </li>

    <li role="separator"><hr class="sidebar-divider d-none d-md-block"></li>
    <li class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" type="button" aria-label="Toggle sidebar"></button>
    </li>
</ul>
