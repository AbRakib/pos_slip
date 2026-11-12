<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unit List - Tea Shop POS</title>
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/products.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        @include('partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <main id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
                    aria-label="Page navigation">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" type="button"
                        aria-label="Toggle sidebar">
                        <i class="fas fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="product-topbar-search"><i class="fas fa-search" aria-hidden="true"></i><span>Tea Shop
                            POS / Units</span></div>
                    <a class="product-home-link" href="{{ route('dashboard') }}"><i class="fas fa-home"
                            aria-hidden="true"></i> Dashboard</a>
                </nav>

                <div class="container-fluid tea-dashboard product-page">
                    <header class="dashboard-heading">
                        <div>
                            <h1>Unit List</h1>
                            <p>Manage measurement units used in your tea shop.</p>
                        </div>
                        <div class="product-heading-actions">
                            <button class="product-button" id="export-units" type="button" disabled><i
                                    class="fas fa-upload" aria-hidden="true"></i> Export</button>
                            <button class="product-button product-button-primary" type="button" disabled
                                title="Unit creation is coming soon"><i class="fas fa-plus" aria-hidden="true"></i>
                                Add Unit</button>
                        </div>
                    </header>

                    <div id="unit-list" data-url="{{ route('units.index') }}" aria-busy="true">
                        <p class="product-empty" role="status">Loading units...</p>
                    </div>
                </div>
                <dialog id="unit-detail" class="product-detail">
                    <div class="product-detail-heading">
                        <h2 id="unit-detail-title">Unit
                            details</h2><button type="button" class="product-icon-button" id="close-unit-detail"
                            aria-label="Close unit details"><i class="fas fa-times" aria-hidden="true"></i></button>
                    </div>
                    <dl id="unit-detail-content"></dl>
                </dialog>
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/js/units.js') }}"></script>
</body>

</html>
