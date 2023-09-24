@extends('frontend.dashboard.layouts.master')

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <!--=============================
                                                                            DASHBOARD START
                                                                          ==============================-->
            <section id="wsus__dashboard">
                <div class="container-fluid">
                    <div class="dashboard_sidebar">
                        <span class="close_icon">
                            <i class="far fa-bars dash_bar"></i>
                            <i class="far fa-times dash_close"></i>
                        </span>
                        <a href="dsahboard.html" class="dash_logo"><img src="images/logo.png" alt="logo"
                                class="img-fluid"></a>
                        <ul class="dashboard_link">
                            <li><a href="dsahboard.html"><i class="fas fa-tachometer"></i>Dashboard</a></li>
                            <li><a href="dsahboard_order.html"><i class="fas fa-list-ul"></i> Orders</a></li>
                            <li><a href="dsahboard_download.html"><i class="far fa-cloud-download-alt"></i> Downloads</a>
                            </li>
                            <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
                            <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
                            <li><a href="dsahboard_profile.html"><i class="far fa-user"></i> My Profile</a></li>
                            <li><a class="active" href="dsahboard_address.html"><i class="fal fa-gift-card"></i>
                                    Addresses</a></li>
                            <li><a href="#"><i class="far fa-sign-out-alt"></i> Log out</a></li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                            <div class="dashboard_content">
                                <h3><i class="fal fa-gift-card"></i> Address</h3>
                                <div class="wsus__dashboard_add">
                                    <div class="row">
                                        @foreach ($address as $userAddress)
                                            <div class="col-xl-6">
                                                <div class="wsus__dash_add_single">
                                                    <h4>Billing Address </h4>
                                                    <ul>
                                                        <li><span>name :</span>{{ @$userAddress->name }}</li>
                                                        <li><span>Phone :</span>{{ @$userAddress->phone }}</li>
                                                        <li><span>email :</span>{{ @$userAddress->email }}</li>
                                                        <li><span>country :</span> {{ @$userAddress->country }}</li>
                                                        <li><span>city :</span>{{ @$userAddress->city }}</li>
                                                        <li><span>zip code :</span> {{ @$userAddress->zip_code }}</li>
                                                        {{-- <li><span>company :</span> N/A</li> --}}
                                                        <li><span>address :</span>{{ @$userAddress->address }}</li>
                                                    </ul>
                                                    <div class="wsus__address_btn">
                                                        <a href="{{ route('user.address.edit', $userAddress->id) }}"
                                                            class="edit"><i class="fal fa-edit"></i> edit</a>
                                                        <a href="{{ route('admin.slider.destroy', $userAddress->id) }}"
                                                            class="del delete-item"><i class="fal fa-trash-alt"></i>
                                                            delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="col-12">
                                            <a href="{{ route('user.address.create') }}"
                                                class="add_address_btn common_btn"><i class="far fa-plus"></i>
                                                add new address</a>
                                        </div>
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
        </div>
    </section>
@endsection
