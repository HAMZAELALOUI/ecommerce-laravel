@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || create shipping rule
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>create Shipping rule</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4> Shipping rule</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.shipping-rule.store') }}" method="POST">
                                @csrf


                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>

                                <div class="form-group ">
                                    <label for="inputeState">Type</label>
                                    <select class="form-control shipping-type" id="" name="type">
                                        <option value="">select</option>
                                        <option value="flat_cost">Flat Cost</option>
                                        <option value="min_cost">Minimum Order Amount</option>
                                    </select>

                                </div>
                                <div class="form-group min_cost">
                                    <label for="">Minimum Amount </label>
                                    <input type="text" class="form-control" name="min_cost" value="">
                                </div>
                                <div class="form-group">
                                    <label for="">cost</label>
                                    <input type="text" class="form-control" name="cost" value="">
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
@push('script')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.shipping-type', function() {
                let val = $(this).val();
                $('.min_cost').toggleClass('d-none', val === 'min_cost');
                if (val != 'min_cost') {
                    $('.min_cost').addClass('d-none')
                } else {
                    $('.min_cost').removeClass('d-none')

                }

            });
        });
    </script>
@endpush
