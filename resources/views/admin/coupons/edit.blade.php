@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || create coupons
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Coupon</h1>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div> --}}
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Coupon</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $coupon->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{ $coupon->code }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="text" class="form-control" name="quantity"
                                        value="{{ $coupon->quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Max Use Per Person</label>
                                    <input type="text" class="form-control" name="max_use"
                                        value="{{ $coupon->max_use }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Start Date</label>
                                            <input type="text" class="form-control datepicker" name="start_date"
                                                value="{{ $coupon->start_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">End Date</label>
                                            <input type="text" class="form-control datepicker" name="end_date"
                                                value="{{ $coupon->end_date }}">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="inputeState">Type of Discount</label>
                                        <select class="form-control" id="inputeState" name="discount_type">
                                            <option {{ $coupon->discount_type == 'percentage' ? 'selected' : '' }}
                                                value="percentage">Percentage (%)</option>
                                            <option {{ $coupon->discount_type == 'amount' ? 'selected' : '' }}
                                                value="amount">
                                                Amount ( {{ $settings->currency_icon }})</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="inputeState">Discount Value</label>
                                        <input type="text" class="form-control" name="discount"
                                            value="{{ $coupon->discount }}">

                                    </div>


                                </div>
                                <div class="form-group ">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option {{ $coupon->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $coupon->status == 0 ? 'selected' : '' }} value="0">inactive
                                        </option>
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
