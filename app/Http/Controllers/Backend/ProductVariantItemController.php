<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProdauctVariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProdauctVariantItemDataTable $dataTable, $productID, $variantID)
    {
        $variant = ProductVariant::findOrFail($variantID);
        $product = Product::findOrFail($productID);
        return $dataTable->render('admin.product.product-variant-items.index', compact('variant', 'product'));
    }
}
