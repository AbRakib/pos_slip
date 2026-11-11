<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tea Products - Tea Shop POS</title>
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        @include('partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <main id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" aria-label="Page navigation">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" type="button" aria-label="Toggle sidebar">
                        <i class="fas fa-bars" aria-hidden="true"></i>
                    </button>
                    <span class="text-gray-800">Tea Shop POS</span>
                </nav>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Tea Products</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h2 class="h6 m-0 font-weight-bold text-primary">Product Management</h2>
                        </div>
                        <div class="card-body">
                            <p class="mb-0 text-gray-600">Product management is not available yet.</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
