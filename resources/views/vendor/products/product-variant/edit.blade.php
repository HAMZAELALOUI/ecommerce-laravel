@extends('vendor.layouts.master')

@section('title')
    {{ $settings->site_name }} || edit product variant
@endsection
@section('content')
    <!--=============================-->
    <section id="wsus__dashboard">

        @include('vendor.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="mb-3">
                    <a href="{{ route('vendor.product-variant.index', ['product' => $variant->product_id]) }}"
                        class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i>
                        Back</a>
                </div>
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i> Update Variant</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <form action="{{ route('vendor.product-variant.update', $variant->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $variant->name }}">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option {{ $variant->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $variant->status == 0 ? 'selected' : '' }} value="0">inactive
                                        </option>
                                    </select>

                                </div>
                                <Button type="submit" class="btn btn-primary mt-4">Update</Button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
