<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SellerPendingProductDataTable;
use App\DataTables\SellerProductsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SellerProductsController extends Controller
{
    public function index(SellerProductsDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-products.index');
    }

    public function pendingProducts(SellerPendingProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-pending-products.index');
    }

    public function changeApproveStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->is_approved = $request->value;
        $product->save();
        return response(['status' => 'success', 'message' =>  $product->name . ' product approvel has been updated']);
    }
}
