@extends('index')

@push('styles')
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/products.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid tea-dashboard product-page">
        <header class="dashboard-heading">
            <div>
                <h1>Unit List</h1>
                <p>Manage measurement units used in your tea shop.</p>
            </div>
            <div class="product-heading-actions">
                <button class="product-button" id="export-units" type="button" disabled><i class="fas fa-upload"
                        aria-hidden="true"></i> Export</button>
                <button class="product-button product-button-primary" type="button" disabled
                    title="Unit creation is coming soon"><i class="fas fa-plus" aria-hidden="true"></i>
                    Add Unit</button>
            </div>
        </header>

        <div id="unit-list" data-url="{{ route('units.filter') }}" aria-busy="true">
            <p class="product-empty" role="status">Loading units...</p>
        </div>
    </div>

    <dialog id="unit-detail" class="product-detail">
        <div class="product-detail-heading">
            <h2 id="unit-detail-title">Unit details</h2>
            <button type="button" class="product-icon-button" id="close-unit-detail" aria-label="Close unit details">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>
        <dl id="unit-detail-content"></dl>
    </dialog>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/units.js') }}"></script>
@endpush
