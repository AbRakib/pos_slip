<nav class="sidebar shop-sidebar" id="accordionSidebar" aria-label="Main navigation">
    <a class="shop-brand" href="{{ route('dashboard') }}" aria-label="Tea Shop POS home">
        <span class="shop-brand-name">TEA</span>
        <span class="shop-brand-mark"><i class="fi fi-rr-mug-hot" aria-hidden="true"></i></span>
        <span class="shop-brand-caption">SHOP<br>POS</span>
    </a>
    <button id="sidebarToggle" class="shop-sidebar-toggle" type="button" aria-label="Toggle sidebar"><i class="fi fi-rr-angle-left" aria-hidden="true"></i></button>

    <ul class="shop-menu">
        <li>
            <a class="shop-menu-link {{ request()->routeIs('dashboard') ? 'is-active' : '' }}" href="{{ route('dashboard') }}" title="Dashboard" @if (request()->routeIs('dashboard')) aria-current="page" @endif>
                <i class="fi fi-rr-dashboard" aria-hidden="true"></i><span>Dashboard</span>
            </a>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('pos.index', 'sales.index')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('pos.index', 'sales.index') ? 'is-current-group' : '' }}" title="Sell">
                    <i class="fi fi-rr-arrow-circle-up" aria-hidden="true"></i><span>Sell</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('pos.index'))
                            <a class="{{ request()->routeIs('pos.index') ? 'is-active' : '' }}" href="{{ route('pos.index') }}" title="POS Sell" @if (request()->routeIs('pos.index')) aria-current="page" @endif>
                                POS Sell
                            </a>
                        @else
                            <span aria-disabled="true" title="POS Sell — Coming soon">
                                POS Sell
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('sales.index'))
                            <a class="{{ request()->routeIs('sales.index') ? 'is-active' : '' }}" href="{{ route('sales.index') }}" title="Sales & Invoices" @if (request()->routeIs('sales.index')) aria-current="page" @endif>
                                Sales & Invoices
                            </a>
                        @else
                            <span aria-disabled="true" title="Sales & Invoices — Coming soon">
                                Sales & Invoices
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('purchases.index', 'purchases.create')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('purchases.index', 'purchases.create') ? 'is-current-group' : '' }}" title="Purchases">
                    <i class="fi fi-rr-arrow-circle-down" aria-hidden="true"></i><span>Purchases</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('purchases.index'))
                            <a class="{{ request()->routeIs('purchases.index') ? 'is-active' : '' }}" href="{{ route('purchases.index') }}" title="List Purchases" @if (request()->routeIs('purchases.index')) aria-current="page" @endif>
                                List Purchases
                            </a>
                        @else
                            <span aria-disabled="true" title="List Purchases — Coming soon">
                                List Purchases
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('purchases.create'))
                            <a class="{{ request()->routeIs('purchases.create') ? 'is-active' : '' }}" href="{{ route('purchases.create') }}" title="Add Purchase" @if (request()->routeIs('purchases.create')) aria-current="page" @endif>
                                Add Purchase
                            </a>
                        @else
                            <span aria-disabled="true" title="Add Purchase — Coming soon">
                                Add Purchase
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('products.index', 'products.create', 'products.labels', 'variations.index', 'products.import', 'price-groups.index', 'units.index', 'categories.index', 'brands.index', 'warranties.index')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('products.index', 'products.create', 'products.labels', 'variations.index', 'products.import', 'price-groups.index', 'units.index', 'categories.index', 'brands.index', 'warranties.index') ? 'is-current-group' : '' }}" title="Products">
                    <i class="fi fi-rr-boxes" aria-hidden="true"></i><span>Products</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('products.index'))
                            <a class="{{ request()->routeIs('products.index') ? 'is-active' : '' }}" href="{{ route('products.index') }}" title="List Products" @if (request()->routeIs('products.index')) aria-current="page" @endif>
                                List Products
                            </a>
                        @else
                            <span aria-disabled="true" title="List Products — Coming soon">
                                List Products
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('products.create'))
                            <a class="{{ request()->routeIs('products.create') ? 'is-active' : '' }}" href="{{ route('products.create') }}" title="Add Product" @if (request()->routeIs('products.create')) aria-current="page" @endif>
                                Add Product
                            </a>
                        @else
                            <span aria-disabled="true" title="Add Product — Coming soon">
                                Add Product
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('products.labels'))
                            <a class="{{ request()->routeIs('products.labels') ? 'is-active' : '' }}" href="{{ route('products.labels') }}" title="Print Labels" @if (request()->routeIs('products.labels')) aria-current="page" @endif>
                                Print Labels
                            </a>
                        @else
                            <span aria-disabled="true" title="Print Labels — Coming soon">
                                Print Labels
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('variations.index'))
                            <a class="{{ request()->routeIs('variations.index') ? 'is-active' : '' }}" href="{{ route('variations.index') }}" title="Variations" @if (request()->routeIs('variations.index')) aria-current="page" @endif>
                                Variations
                            </a>
                        @else
                            <span aria-disabled="true" title="Variations — Coming soon">
                                Variations
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('products.import'))
                            <a class="{{ request()->routeIs('products.import') ? 'is-active' : '' }}" href="{{ route('products.import') }}" title="Import Open Stock" @if (request()->routeIs('products.import')) aria-current="page" @endif>
                                Import Open Stock
                            </a>
                        @else
                            <span aria-disabled="true" title="Import Open Stock — Coming soon">
                                Import Open Stock
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('price-groups.index'))
                            <a class="{{ request()->routeIs('price-groups.index') ? 'is-active' : '' }}" href="{{ route('price-groups.index') }}" title="Selling Price Group" @if (request()->routeIs('price-groups.index')) aria-current="page" @endif>
                                Selling Price Group
                            </a>
                        @else
                            <span aria-disabled="true" title="Selling Price Group — Coming soon">
                                Selling Price Group
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('units.index'))
                            <a class="{{ request()->routeIs('units.index') ? 'is-active' : '' }}" href="{{ route('units.index') }}" title="Units" @if (request()->routeIs('units.index')) aria-current="page" @endif>
                                Units
                            </a>
                        @else
                            <span aria-disabled="true" title="Units — Coming soon">
                                Units
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('categories.index'))
                            <a class="{{ request()->routeIs('categories.index') ? 'is-active' : '' }}" href="{{ route('categories.index') }}" title="Categories" @if (request()->routeIs('categories.index')) aria-current="page" @endif>
                                Categories
                            </a>
                        @else
                            <span aria-disabled="true" title="Categories — Coming soon">
                                Categories
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('brands.index'))
                            <a class="{{ request()->routeIs('brands.index') ? 'is-active' : '' }}" href="{{ route('brands.index') }}" title="Brands" @if (request()->routeIs('brands.index')) aria-current="page" @endif>
                                Brands
                            </a>
                        @else
                            <span aria-disabled="true" title="Brands — Coming soon">
                                Brands
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('warranties.index'))
                            <a class="{{ request()->routeIs('warranties.index') ? 'is-active' : '' }}" href="{{ route('warranties.index') }}" title="Warranties" @if (request()->routeIs('warranties.index')) aria-current="page" @endif>
                                Warranties
                            </a>
                        @else
                            <span aria-disabled="true" title="Warranties — Coming soon">
                                Warranties
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('transfers.index', 'transfers.create')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('transfers.index', 'transfers.create') ? 'is-current-group' : '' }}" title="Stock Transfers">
                    <i class="fi fi-rr-truck-side" aria-hidden="true"></i><span>Stock Transfers</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('transfers.index'))
                            <a class="{{ request()->routeIs('transfers.index') ? 'is-active' : '' }}" href="{{ route('transfers.index') }}" title="List Transfers" @if (request()->routeIs('transfers.index')) aria-current="page" @endif>
                                List Transfers
                            </a>
                        @else
                            <span aria-disabled="true" title="List Transfers — Coming soon">
                                List Transfers
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('transfers.create'))
                            <a class="{{ request()->routeIs('transfers.create') ? 'is-active' : '' }}" href="{{ route('transfers.create') }}" title="Add Transfer" @if (request()->routeIs('transfers.create')) aria-current="page" @endif>
                                Add Transfer
                            </a>
                        @else
                            <span aria-disabled="true" title="Add Transfer — Coming soon">
                                Add Transfer
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('adjustments.index', 'adjustments.create')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('adjustments.index', 'adjustments.create') ? 'is-current-group' : '' }}" title="Stock Adjustment">
                    <i class="fi fi-rr-layers" aria-hidden="true"></i><span>Stock Adjustment</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('adjustments.index'))
                            <a class="{{ request()->routeIs('adjustments.index') ? 'is-active' : '' }}" href="{{ route('adjustments.index') }}" title="List Adjustments" @if (request()->routeIs('adjustments.index')) aria-current="page" @endif>
                                List Adjustments
                            </a>
                        @else
                            <span aria-disabled="true" title="List Adjustments — Coming soon">
                                List Adjustments
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('adjustments.create'))
                            <a class="{{ request()->routeIs('adjustments.create') ? 'is-active' : '' }}" href="{{ route('adjustments.create') }}" title="Add Adjustment" @if (request()->routeIs('adjustments.create')) aria-current="page" @endif>
                                Add Adjustment
                            </a>
                        @else
                            <span aria-disabled="true" title="Add Adjustment — Coming soon">
                                Add Adjustment
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('expenses.index', 'expenses.create')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('expenses.index', 'expenses.create') ? 'is-current-group' : '' }}" title="Expenses">
                    <i class="fi fi-rr-minus-circle" aria-hidden="true"></i><span>Expenses</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('expenses.index'))
                            <a class="{{ request()->routeIs('expenses.index') ? 'is-active' : '' }}" href="{{ route('expenses.index') }}" title="List Expenses" @if (request()->routeIs('expenses.index')) aria-current="page" @endif>
                                List Expenses
                            </a>
                        @else
                            <span aria-disabled="true" title="List Expenses — Coming soon">
                                List Expenses
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('expenses.create'))
                            <a class="{{ request()->routeIs('expenses.create') ? 'is-active' : '' }}" href="{{ route('expenses.create') }}" title="Add Expense" @if (request()->routeIs('expenses.create')) aria-current="page" @endif>
                                Add Expense
                            </a>
                        @else
                            <span aria-disabled="true" title="Add Expense — Coming soon">
                                Add Expense
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('reports.index')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('reports.index') ? 'is-current-group' : '' }}" title="Reports">
                    <i class="fi fi-rr-chart-histogram" aria-hidden="true"></i><span>Reports</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('reports.index'))
                            <a class="{{ request()->routeIs('reports.index') ? 'is-active' : '' }}" href="{{ route('reports.index') }}" title="Sales Reports" @if (request()->routeIs('reports.index')) aria-current="page" @endif>
                                Sales Reports
                            </a>
                        @else
                            <span aria-disabled="true" title="Sales Reports — Coming soon">
                                Sales Reports
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('users.index', 'roles.index')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('users.index', 'roles.index') ? 'is-current-group' : '' }}" title="User Management">
                    <i class="fi fi-rr-users" aria-hidden="true"></i><span>User Management</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('users.index'))
                            <a class="{{ request()->routeIs('users.index') ? 'is-active' : '' }}" href="{{ route('users.index') }}" title="Users" @if (request()->routeIs('users.index')) aria-current="page" @endif>
                                Users
                            </a>
                        @else
                            <span aria-disabled="true" title="Users — Coming soon">
                                Users
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('roles.index'))
                            <a class="{{ request()->routeIs('roles.index') ? 'is-active' : '' }}" href="{{ route('roles.index') }}" title="Roles" @if (request()->routeIs('roles.index')) aria-current="page" @endif>
                                Roles
                            </a>
                        @else
                            <span aria-disabled="true" title="Roles — Coming soon">
                                Roles
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('customers.index', 'suppliers.index')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('customers.index', 'suppliers.index') ? 'is-current-group' : '' }}" title="Contacts">
                    <i class="fi fi-rr-user" aria-hidden="true"></i><span>Contacts</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('customers.index'))
                            <a class="{{ request()->routeIs('customers.index') ? 'is-active' : '' }}" href="{{ route('customers.index') }}" title="Customers" @if (request()->routeIs('customers.index')) aria-current="page" @endif>
                                Customers
                            </a>
                        @else
                            <span aria-disabled="true" title="Customers — Coming soon">
                                Customers
                            </span>
                        @endif
                    </li>
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('suppliers.index'))
                            <a class="{{ request()->routeIs('suppliers.index') ? 'is-active' : '' }}" href="{{ route('suppliers.index') }}" title="Suppliers" @if (request()->routeIs('suppliers.index')) aria-current="page" @endif>
                                Suppliers
                            </a>
                        @else
                            <span aria-disabled="true" title="Suppliers — Coming soon">
                                Suppliers
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('notifications.index')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('notifications.index') ? 'is-current-group' : '' }}" title="Notification Templates">
                    <i class="fi fi-rr-bell" aria-hidden="true"></i><span>Notification Templates</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('notifications.index'))
                            <a class="{{ request()->routeIs('notifications.index') ? 'is-active' : '' }}" href="{{ route('notifications.index') }}" title="Templates" @if (request()->routeIs('notifications.index')) aria-current="page" @endif>
                                Templates
                            </a>
                        @else
                            <span aria-disabled="true" title="Templates — Coming soon">
                                Templates
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
        <li>
            <details class="shop-menu-group" @if (request()->routeIs('settings.index')) open @endif>
                <summary class="shop-menu-link {{ request()->routeIs('settings.index') ? 'is-current-group' : '' }}" title="Settings">
                    <i class="fi fi-rr-settings" aria-hidden="true"></i><span>Settings</span><i class="fi fi-rr-angle-small-down shop-menu-chevron" aria-hidden="true"></i>
                </summary>
                <ul class="shop-submenu">
                    <li>
                        @if (Illuminate\Support\Facades\Route::has('settings.index'))
                            <a class="{{ request()->routeIs('settings.index') ? 'is-active' : '' }}" href="{{ route('settings.index') }}" title="Shop Settings" @if (request()->routeIs('settings.index')) aria-current="page" @endif>
                                Shop Settings
                            </a>
                        @else
                            <span aria-disabled="true" title="Shop Settings — Coming soon">
                                Shop Settings
                            </span>
                        @endif
                    </li>
                </ul>
            </details>
        </li>
    </ul>
</nav>
