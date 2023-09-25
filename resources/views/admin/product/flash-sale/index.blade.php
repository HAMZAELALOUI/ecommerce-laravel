@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || flash Sale
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Flash Sale </h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Flash Sale End Date</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.flash-sale.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="text" min="0" class="form-control datepicker" name="end_date"
                                        value="{{ @$flasheEndDate->end_date }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Flash sale Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.flash-sale.update.add-sale-product') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Add product</label>
                                    <select class="form-control select2 " name="product">
                                        <option>select</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Show at Home?</label>
                                            <select class="form-control select2 " name="show_at_home">
                                                <option value="">select</option>
                                                <option value="1"> Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2 " name="status">
                                                <option value="">select</option>
                                                <option value="1"> Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Flash Sale Products</h4>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@push('script')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            // status
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.flash-sale.change-status') }}",
                    method: 'PUT',
                    data: {
                        isChecked: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });

            //show ata home status
            $('body').on('click', '.show-home-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.flash-sale.show-home-status') }}",
                    method: 'PUT',
                    data: {
                        isChecked: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });


        });
    </script>
@endpush

@if (session('reload'))
    <script>
        // Reload the page
        window.location.reload();
    </script>
@endif
