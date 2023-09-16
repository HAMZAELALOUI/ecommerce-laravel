@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Variant Items</h1>
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
                            <h4>Update Variant Items</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product-variant-item.update', $variantItem->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Item Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $variantItem->variant->name }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="variant_id"
                                        value="{{ $variantItem->variant_id }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Price<code class="">(Put 0 If you want to set it for
                                            free)</code></label>
                                    <input type="number" class="form-control" name="price"
                                        value="{{ $variantItem->price }}">
                                </div>

                                <div class="form-group ">
                                    <label for="inputeState">Is Default </label>
                                    <select class="form-control" id="inputeState" name="is_default">
                                        <option value="">Select</option>
                                        <option {{ $variantItem->is_default == 1 ? 'selected' : '' }} value="1">Yes
                                        </option>
                                        <option {{ $variantItem->is_default == 0 ? 'selected' : '' }} value="0">No
                                        </option>
                                    </select>

                                </div>
                                <div class="form-group ">
                                    <label for="inputeState">Status</label>
                                    <select class="form-control" id="inputeState" name="status">
                                        <option {{ $variantItem->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $variantItem->status == 0 ? 'selected' : '' }} value="0">inactive
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
