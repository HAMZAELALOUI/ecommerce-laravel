<?php

namespace App\Http\Controllers;

use App\DataTables\VendorProductVariantDataTable;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class VendorProductVarinatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VendorProductVariantDataTable $dtataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dtataTable->render('vendor.products.product-variant.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('vendor.products.product-variant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'product' => ['required', 'integer'],
            'name' => ['required', 'max:50'],
            'status' => ['required'],
        ]);

        $variant = new ProductVariant();
        $variant->product_id = $request->product;
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();

        toastr('Created Succefully!!', 'success', 'success');
        return redirect()->route('vendor.product-variant.index', ['product' => $request->product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        return view('vendor.products.product-variant.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'status' => ['required'],
        ]);

        $variant = ProductVariant::findOrFail($id);
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();

        toastr('Updated Succefully!!', 'success', 'success');
        return redirect()->route('vendor.product-variant.index', ['product' => $variant->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();
        return response(['status' => 'success', 'message' => 'varian Item Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $variant = ProductVariant::findOrFail($request->id);
        $variant->status = $request->isChecked == 'true' ? 1 : 0;
        $variant->save();
        return response(['status' => 'success', 'message' => $variant->name . ' Status has been updated']);
    }
}
