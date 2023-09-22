<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductDetailsController extends Controller
{
    //product details
    public function showProductDeyails(string $slug)
    {
        $product = Product::where('slug', $slug)->where('status', 1)->first();
        $flashSaleDate = FlashSale::first();
        return view('frontend.pages.product-details', compact('product', 'flashSaleDate'));
    }
}
