@extends('admin.layouts.master')
@section('title')
    {{ $settings->site_name }} || create Child Category
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>subCategory</h1>
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
                            <h4>Create subCategory</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.store') }}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <label for="inputeState"> Category</label>
                                    <select class="form-control main-category" id="inputeState" name="category">
                                        <option value="">--Select Category--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="inputeState"> subCategory</label>
                                    <select class="form-control sub-category" id="inputeState" name="subcategory">
                                        <option value="">--Select subCategory--</option>
                                        {{-- @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="">
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
            $(document).on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.get-subcategory') }}",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        $('.sub-category').html(
                            `<option value="">--Select Sub Category --</option>`)
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, success, error) {
                        console.log(error)
                    }

                })



            });
        });
    </script>
@endpush
