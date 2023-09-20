@extends('admin.layouts.master')

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
                            <form action="">
                                <div class="form-group">
                                    <label>Add flash sale</label>
                                    <select class="form-control select2 ">
                                        <option>Option 1</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
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
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.product.change-status') }}",
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
