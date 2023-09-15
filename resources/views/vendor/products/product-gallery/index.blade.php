@extends('vendor.layouts.master')


@section('content')
    <!--=============================-->
    <section id="wsus__dashboard">

        @include('vendor.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <a href="{{ route('vendor.products.index') }}" class="btn btn-primary m-4"><i class="fas fa-angle-left"></i>
                    Back</a>
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-images"></i> Product : {{ $product->name }}</h3>

                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload Images <code>(multiple Upload supported)</code></label>
                                    <input type="file" name="image[]" class="form-control mt-2" multiple>
                                    <input type="hidden" name="product_id">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-images"></i>Image Gallery </h3>

                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
