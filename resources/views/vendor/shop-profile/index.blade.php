@extends('vendor.layouts.master')


@section('content')
    <!--=============================
                                        DASHBOARD START
                                      ==============================-->
    <section id="wsus__dashboard">

        @include('vendor.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="far fa-user"></i>Shop profile</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">

                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Preview</label> <br>
                                    <img width="200" src="{{ asset($profile->banner) }}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Banner</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $profile->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Adress</label>
                                    <input type="text" class="form-control" name="adress"
                                        value="{{ $profile->Adress }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Descreption</label>
                                    <textarea class="summernote" name="description">{{ $profile->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" class="form-control" name="fb_link"
                                        value="{{ $profile->fb_link }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter</label>
                                    <input type="text" class="form-control" name="tw_link"
                                        value="{{ $profile->tw_link }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" class="form-control" name="insta_link"
                                        value="{{ $profile->insta_link }}">
                                </div>

                                <Button type="submit" class="btn btn-primary">Update</Button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--=============================
                                        DASHBOARD START
                                      ==============================-->
@endsection
