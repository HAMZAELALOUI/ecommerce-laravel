@extends('vendor.layouts.master')


@section('content')
    <!--=============================-->
    <section id="wsus__dashboard">

        @include('vendor.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="mb-3">
                    <a href="{{ route('vendor.product-variant-item.index', ['productID' => $product->id, 'variantID' => $variant->id]) }}"
                        class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a>
                </div>
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i> Create Variant Item</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('vendor.product-variant-item.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="">Variant Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $variant->name }}"
                                        readonly>
                                </div>
                                <div class="form-group">

                                    <input type="hidden" class="form-control" name="product_id"
                                        value="{{ $product->id }}">
                                    <input type="hidden" class="form-control" name="variant_id"
                                        value="{{ $variant->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Item Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">Price<code class="">(Put 0 If you want to set it for
                                            free)</code></label>
                                    <input type="number" class="form-control" name="price">
                                </div>

                                <div class="form-group ">
                                    <label for="inputeState">Is Default </label>
                                    <select class="form-control" id="inputeState" name="is_default">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>

                                </div>
                                <div class="form-group ">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">inactive</option>
                                    </select>

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
