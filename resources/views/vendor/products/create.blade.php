@extends('vendor.layouts.master')
@section('title')
    {{ $settings->site_name }} || create product variant item
@endsection

@section('content')
    <!--=============================-->
    <section id="wsus__dashboard">

        @include('vendor.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i>Create Product</h3>
                    <div class="create_button container d-flex justify-content-end mt-4">
                        <a href="{{ route('vendor.products.create') }}" class="btn btn-primary  mb-4"><i
                                class="fas fa-plus"></i> Add New</a>
                    </div>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('vendor.products.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="">name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="inputeState">Category</label>
                                            <select class="form-control main-category" id="inputeState" name="category">
                                                <option value="">Select</option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="inputeState">subCategory</label>
                                            <select class="form-control sub-category" id="inputeState" name="sub_category">
                                                <option value="">Select</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="inputeState">Child Category</label>
                                            <select class="form-control child-category" id="inputeState"
                                                name="child_category">
                                                <option value="">Select</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="inputeState">Brand</label>
                                    <select class="form-control" id="inputeState" name="brand">
                                        <option value="">Select</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="">QTY</label>
                                    <input type="number" min="0" class="form-control" name="qty">
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea name="short_description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Long Description</label>
                                    <textarea name="long_description" class="form-control summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Video Link</label>
                                    <input type="text" class="form-control" name="video_link">
                                </div>
                                <div class="form-group">
                                    <label for="">SKU</label>
                                    <input type="text" class="form-control" name="sku">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" min="0" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="">Offer Price</label>
                                    <input type="number" min="0" class="form-control" name="offer_price">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Offer Start Date </label>
                                            <input type="text" min="0" class="form-control datepicker"
                                                name="offer_start_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Offer End Date </label>
                                            <input type="text" class="form-control datepicker" name="offer_end_date">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="inputeState">Product Type</label>
                                    <select class="form-control" id="inputeState" name="product_type">
                                        <option value="0">Select</option>
                                        <option value="new_arrival">New Arrival</option>
                                        <option value="featured_product">Featured</option>
                                        <option value="top_product">Top Product</option>
                                        <option value="best_product">Best Product</option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">inactive</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="">SEO Title</label>
                                    <input type="text" min="0" class="form-control" name="seo_title">
                                </div>


                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea name="seo_description" class="form-control"></textarea>
                                </div>


                                <Button type="submit" class="btn btn-primary">Create</Button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.main-category', function(e) {
                $('.child-category').html(
                    `<option value="0">--Select Sub Category --</option>`)
                let id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('vendor.products.getsubcategory') }}",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('.sub-category').html(
                            `<option value="0">--Select Sub Category --</option>`)
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, success, error) {
                        console.log(error)
                    }

                })



            });
        });

        //getchild Category
        $(document).ready(function() {
            $(document).on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('vendor.products.getChild-category') }}",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('.child-category').html(
                            `<option value="">--Select Sub Category --</option>`)
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, success, error) {
                        console.log(error)
                    }

                })



            });
        });
    </script>
@endpush
