<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use function Termwind\render;

class FlashSaleController extends Controller
{
    public function index(FlashItemDataTable $dataTable)
    {
        $flasheEndDate = FlashSale::first();
        return $dataTable->render('admin.product.flash-sale.index', compact('flasheEndDate'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'end_date' => ['required']
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date]
        );

        toastr('Updated Succesfully', 'success', 'success');
        return redirect()->back();
    }
}
