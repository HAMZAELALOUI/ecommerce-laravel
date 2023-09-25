@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || create brand
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
                            <h4>Create Brand </h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="form-group ">
                                    <label for="inputeState">Is Featured</label>
                                    <select class="form-control" id="inputeState" name="is_featured">
                                        <option value="1">Select</option>
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
    </section>
@endsection
