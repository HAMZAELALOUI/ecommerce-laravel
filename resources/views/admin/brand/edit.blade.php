@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || edit brand
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Brand</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">

                        <div class="card-header">
                            <h4>Update Brand </h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.update', $brand) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Preview</label>
                                    <br>
                                    <img src="{{ asset($brand->logo) }}" alt="" width="200px">
                                </div>
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $brand->name }}"">
                                </div>

                                <div class="form-group">
                                    <label for="inputeState">Is Featured</label>
                                    <select class="form-control" id="inputeState" name="is_featured">
                                        <option {{ $brand->is_featured == 1 ? 'selected' : '' }} value="1">Yes</option>
                                        <option {{ $brand->is_featured == 0 ? 'selected' : '' }} value="0">No</option>
                                    </select>

                                </div>
                                <div class="form-group ">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option {{ $brand->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $brand->status == 0 ? 'selected' : '' }} value="0">inactive</option>
                                    </select>

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
