@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || variant item
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Items</h1>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div> --}}
        </div>
        <div class="mb-3">
            <a href="{{ route('admin.product-variant.index', ['product' => $product->id]) }}" class="btn btn-primary"><i
                    class="fas fa-long-arrow-alt-left"></i>
                Back</a>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Variant : {{ $variant->name }}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.product-variant-item.create', ['productID' => $product->id, 'variantID' => $variant->id]) }}"
                                    class="btn btn-primary"><i class="fas fa-plus-circle"></i> Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.product-variant-item.change-status') }}",
                    method: 'PUT',
                    data: {
                        isChecked: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
@if (session('reload'))
    <script>
        // Reload the page
        window.location.reload();
    </script>
@endif
