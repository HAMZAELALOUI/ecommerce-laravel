@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || Vendor Profile
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Vendor Profile</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Vendor Profile </h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.vendor-profile.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Preview</label> <br>
                                    <img width="200" src="{{ asset($vendor->banner) }}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="form-group">
                                    <label for="">Shop Name</label>
                                    <input type="text" class="form-control" name="shop_name"
                                        value="{{ $vendor->shop_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $vendor->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $vendor->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Adress</label>
                                    <input type="text" class="form-control" name="adress" value="{{ $vendor->Adress }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Descreption</label>
                                    <textarea class="summernote" name="description">{{ $vendor->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" class="form-control" name="fb_link"
                                        value="{{ $vendor->fb_link }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter</label>
                                    <input type="text" class="form-control" name="tw_link"
                                        value="{{ $vendor->tw_link }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" class="form-control" name="insta_link"
                                        value="{{ $vendor->insta_link }}">
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
