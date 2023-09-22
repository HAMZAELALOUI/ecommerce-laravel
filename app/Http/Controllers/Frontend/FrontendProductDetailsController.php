<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendProductDetailsController extends Controller
{
    //product details
    public function showProductDeyails(string $slug)
    {
        return view('frontend.pages.product-details');
    }
}
