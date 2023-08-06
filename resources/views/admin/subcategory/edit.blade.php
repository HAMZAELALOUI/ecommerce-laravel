@extends('admin.layouts.master')

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
                            <h4>Edit subCategory</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update', $subCategories->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group ">
                                    <label for="inputeState">Category</label>
                                    <select class="form-control" id="inputeState" name="category">
                                        <option value="">--Select Category--</option>
                                        @foreach ($categories as $category)
                                            <option {{ $category->id == $subCategories->category_id ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $subCategories->name }}">
                                </div>

                                <div class="form-group ">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option {{ $subCategories->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $subCategories->status == 0 ? 'selected' : '' }} value="0">inactive
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
