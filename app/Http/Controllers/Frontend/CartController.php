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
        $productPrice = 0;
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
            $productPrice = $product->offer_price;
        } else {
            $productPrice =  $product->price;
        }
        // $cartData = [];
        // $cartData['id'] = $product->id;
        // $cartData['name'] = $product->name;
        // $cartData['qty'] = $request->qty;
        // $cartData['price'] =  $productPrice * $request->qty;
        // $cartData['weight'] = 10;
        // $cartData['options']['variant'] = $variant;
        // $cartData['options']['image'] = $product->thumb_image;
        // $cartData['options']['slug'] = $product->slug;
        // $cartData['options']['Variant_total'] = $variantTotalAmount;
        $cartData = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $productPrice * $request->qty,
            'weight' => 10,
            'options' => [
                'variant' => $variant,
                'image' => $product->thumb_image,
                'slug' => $product->slug,
                'Variant_total' => $variantTotalAmount,
            ],
        ];
        Cart::add($cartData);
        return response(['status' => 'success', 'message' => 'Added to cart Successfully!!']);
    }


    /** Show Cart Page  */
    public function cartDeatails()
    {
        $cartItems = Cart::content();
        return view('frontend.pages.cart-details', compact('cartItems'));
    }

    /**Update Product Quantity */
    public function updateProductQTY(Request $request)
    {
        // dd($request->all());
        Cart::update($request->rowId, $request->quantity);
        $total = $this->updateTotalPrice($request->rowId);
        return response(['status' => 'success', 'message' => 'Quantity Updated Sucessfully', 'total_price' => $total]);
    }

    /** update Total Price */
    public function updateTotalPrice($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->Variant_total) * $product->qty;
        return $total;
    }

    public function clearCart()
    {
        Cart::destroy();
        return response(['status' => 'success', 'message' => 'Cart Cleared Successfully']);
    }

    public function RemoveItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function getCountCart()
    {
        return  Cart::content()->count();
    }

    public function addSideBarCartProduct()
    {
        return Cart::content();
    }

    public function removeSideBarCartProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return response(['status' => 'success', 'message' => 'product removed successfully']);
    }
}
