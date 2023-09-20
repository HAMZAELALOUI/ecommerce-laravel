<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashItemDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Termwind\render;

class FlashSaleController extends Controller
{
    public function index(FlashItemDataTable $dataTable)
    {
        return $dataTable->render('admin.product.flash-sale.index');
    }
}
