@extends('vendor.layouts.master')


@section('content')
    <!--=============================-->
    <section id="wsus__dashboard">

        @include('vendor.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="mb-3">
                    <a href="{{ route('vendor.product-variant.index', ['product' => $product->id]) }}"
                        class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a>
                </div>
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i> Product Variant Item</h3>
                    <h4> Variant : {{ $variant->name }}</h4>
                    <div class="create_button container d-flex justify-content-end mt-4">
                        <a href="{{ route('vendor.product-variant-item.create', ['productID' => $product->id, 'variantID' => $variant->id]) }}"
                            class="btn btn-primary  mb-4"><i class="fas fa-plus"></i> Add Variant Item</a>
                    </div>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            {{ $dataTable->table() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('vendor.product-variant-item.change-status') }}",
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
