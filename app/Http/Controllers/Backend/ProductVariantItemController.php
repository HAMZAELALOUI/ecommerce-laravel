<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProdauctVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProdauctVariantItemDataTable $dataTable, $productID, $variantID)
    {
        $variant = ProductVariant::findOrFail($variantID);
        $product = Product::findOrFail($productID);
        return $dataTable->render('admin.product.product-variant-items.index', compact('variant', 'product'));
    }
    public function create(string $productID, string $variantID)
    {
        $variant = ProductVariant::findOrFail($variantID);
        $product = Product::findOrFail($productID);

        return view('admin.product.product-variant-items.create', compact('variant', 'product'));
    }
    public function store(Request $request)
    {
        // return dd($request->all());
        $request->validate([
            'variant_id' => ['required', 'integer'],
            'name' => ['required', 'max:200'],
            'price' => ['required'],
            'is_default' => ['required'],
            'status' => ['required'],
        ]);

        $variantItem = new ProductVariantItem();
        $variantItem->variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();
        toastr('Items Created Successfully ', 'success', 'success');
        return redirect()->route('admin.product-variant-item.index', ['productID' => request()->product_id, 'variantID' => request()->variant_id]);
    }

    public function edit(string $variantItemID)
    {

        $variantItem = ProductVariantItem::findOrFail($variantItemID);

        return view('admin.product.product-variant-items.edit', compact('variantItem'));
    }

    public function update(Request $request, string $variantItemID)
    {
        // return dd($request->all());
        $request->validate([
            'variant_id' => ['integer'],
            'name' => ['required', 'max:200'],
            'price' => ['required'],
            'is_default' => ['required'],
            'status' => ['required'],
        ]);

        $variantItem = ProductVariantItem::findOrFail($variantItemID);
        $variantItem->variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();
        toastr('Items Updated Successfully ', 'success', 'success');
        return redirect()->route('admin.product-variant-item.index', ['productID' =>  $variantItem->variant->product_id, 'variantID' => $variantItem->variant_id]);
    }

    public function destroy(string $variantItemID)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemID);
        $variantItem->delete();
        return response(['status' => 'success', 'message' => 'variant Item Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $variantItem = ProductVariantItem::findOrFail($request->id);
        $variantItem->status = $request->isChecked == 'true' ? 1 : 0;
        $variantItem->save();
        return response(['status' => 'success', 'message' =>  $variantItem->name . ' variant item status has been updated']);
    }
}
