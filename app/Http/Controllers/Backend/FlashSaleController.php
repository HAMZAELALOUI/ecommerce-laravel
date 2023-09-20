<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use function Termwind\render;

class FlashSaleController extends Controller
{
    public function index(FlashItemDataTable $dataTable)
    {
        $flasheEndDate = FlashSale::first();
        $products = Product::where('is_approved', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        return $dataTable->render('admin.product.flash-sale.index', compact('flasheEndDate', 'products'));
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

    public function AddSaleProduct(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product' => ['required'],
            'show_at_home' => ['required'],
            'status' => ['required'],
        ]);

        $flasheEndDate = FlashSale::first();

        $flashSaleItem = new FlashSaleItem();

        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flasheEndDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();
        toastr('Added Succefully', 'success', 'success');
        return redirect()->back();
    }
}
