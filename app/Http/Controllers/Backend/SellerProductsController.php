<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SellerPendingProductDataTable;
use App\DataTables\SellerProductsDataTable;
use App\Http\Controllers\Controller;
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
}
