@extends('admin.layouts.master')

@section('title')
    {{ $settings->site_name }} || Image Gallery
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Images</h1>
        </div>
        <div class="mb-3">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i>
                Back</a>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product: {{ $product->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Upload Images <code>(multiple Upload supported)</code></label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                    <input type="hidden" name="product_id">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>
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
@endpush
@if (session('reload'))
    <script>
        // Reload the page
        window.location.reload();
    </script>
@endif
