@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Product </h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.update', $products->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Preview</label><br>
                                    <img src="{{ asset($products->thumb_image) }}" alt="" width="100px">
                                </div>
                                <div class="form-group">
                                    <label for="">image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="">name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $products->name }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="inputeState">Category</label>
                                            <select class="form-control main-category" id="inputeState" name="category">
                                                @foreach ($categories as $category)
                                                    <option {{ $category->id == $products->category_id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="inputeState">subCategory</label>
                                            <select class="form-control sub-category" id="inputeState" name="sub_category">
                                                @foreach ($subCategories as $subCategory)
                                                    <option
                                                        {{ $subCategory->id == $products->sub_category_id ? 'selected' : '' }}
                                                        value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="inputeState">Child Category</label>
                                            <select class="form-control child-category" id="inputeState"
                                                name="child_category">
                                                @foreach ($childCategories as $childCategory)
                                                    <option
                                                        {{ $childCategory->id == $products->child_category_id ? 'selected' : '' }}
                                                        value="{{ $childCategory->id }}">{{ $childCategory->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="inputeState">Brand</label>
                                    <select class="form-control" id="inputeState" name="brand">
                                        <option value="">Select</option>
                                        @foreach ($brands as $brand)
                                            <option {{ $brand->id == $products->brand_id ? 'selected' : '' }}
                                                value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="">QTY</label>
                                    <input type="number" min="0" class="form-control" name="qty"
                                        value="{{ $products->qty }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea name="short_description" class="form-control">{{ $products->short_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Long Description</label>
                                    <textarea name="long_description" class="form-control summernote">{{ $products->long_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Video Link</label>
                                    <input type="text" class="form-control" name="video_link"
                                        value="{{ $products->video_link }}">
                                </div>
                                <div class="form-group">
                                    <label for="">SKU</label>
                                    <input type="text" class="form-control" name="sku" value="{{ $products->sku }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="number" min="0" class="form-control" name="price"
                                        value="{{ $products->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Offer Price</label>
                                    <input type="number" min="0" class="form-control" name="offer_price"
                                        value="{{ $products->offer_price }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Offer Start Date </label>
                                            <input type="text" min="0" class="form-control datepicker"
                                                name="offer_start_date" value="{{ $products->offer_start_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Offer End Date </label>
                                            <input type="text" class="form-control datepicker" name="offer_end_date"
                                                value="{{ $products->offer_end_date }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="inputeState">Product Type</label>
                                    <select class="form-control" id="inputeState" name="product_type">
                                        <option value="0">Select</option>
                                        <option {{ $products->product_type == 'new_arrival' ? 'selected' : '' }}
                                            value="new_arrival">New Arrival</option>
                                        <option {{ $products->product_type == 'featured_product' ? 'selected' : '' }}
                                            value="featured_product">Featured</option>
                                        <option {{ $products->product_type == 'top_product' ? 'selected' : '' }}
                                            value="top_product">Top Product</option>
                                        <option {{ $products->product_type == 'best_product' ? 'selected' : '' }}
                                            value="best_product">Best Product</option>
                                    </select>
                                </div>




                                <div class="form-group ">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option {{ $products->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $products->status == 0 ? 'selected' : '' }} value="0">inactive
                                        </option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="">SEO Title</label>
                                    <input type="text" min="0" class="form-control" name="seo_title"
                                        value="{{ $products->seo_title }}">
                                </div>


                                <div class="form-group">
                                    <label for="">SEO Description</label>
                                    <textarea name="seo_description" class="form-control">{{ $products->seo_description }}</textarea>
                                </div>


                                <Button type="submit" class="btn btn-primary">Update</Button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.main-category', function(e) {
                $('.child-category').html(
                    `<option value="0">--Select Sub Category --</option>`)
                let id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.product.getsubcategory') }}",
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
                    url: "{{ route('admin.product.get-child-category') }}",
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
