<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $product = Product::findOrFail($request->product_id);
        $variant = [];
        $variantTotalAmount = 0;
        $productTotalAmount = 0;
        if (!$request->has('vatiants_item')) {
            foreach ($request->variants_item as $item_id) {
                $variantItem = ProductVariantItem::findOrFail($item_id);
                $variant[$variantItem->variant->name]['name'] = $variantItem->name;
                $variant[$variantItem->variant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }
        /** Check The Discount  */
        if (checkDiscount($product)) {
            $productTotalAmount = ($variantTotalAmount + $product->offer_price);
        } else {
            $productTotalAmount = ($variantTotalAmount + $product->price);
        }
        // $cartData = [];
        // $cartData['id'] = $product->id;
        // $cartData['name'] = $product->name;
        // $cartData['qty'] = $request->qty;
        // $cartData['price'] = $productTotalAmount * $request->qty;
        // $cartData['weight'] = 10;
        // $cartData['options']['variant'] = $variant;
        // $cartData['options']['image'] = $product->thumb_image;
        // $cartData['options']['slug'] = $product->slug;
        $cartData = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $productTotalAmount * $request->qty,
            'weight' => 10,
            'options' => [
                'variant' => $variant,
                'image' => $product->thumb_image,
                'slug' => $product->slug,
            ],
        ];

        Cart::add($cartData);
        return response(['status' => 'success', 'message' => 'Added to cart Successfully!!']);
    }
}
