@extends('admin.layouts.master')

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
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('phone') }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Adress</label>
                                    <input type="text" class="form-control" name="adress" value="{{ old('adress') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Descreption</label>
                                    <textarea class="summernote" name="description" value="{{ old('description') }}"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" class="form-control" name="fb_link" value="{{ old('fb_link') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter</label>
                                    <input type="text" class="form-control" name="tw_link" value="{{ old('tw_link') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" class="form-control" name="insta_link"
                                        value="{{ old('insta_link') }}">
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
