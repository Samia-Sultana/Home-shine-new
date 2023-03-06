<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Logo;
use App\Models\Navbar;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WishlistController extends Controller
{
    public function viewWishlist(Request $request)
    {
        return view('wishlist');
    }


    public function addToWishlist(Request $request)
    {
        $productId = $request->input('productId');
        $productSku = $request->input('productSku');
        $quantity = $request->input('quantity');
        $product = Product::find($productId);
        $wishlistProduct = (object) array(
            'id' => $product->id,
            'sku' => $productSku,
            'name' => $product->productName,
            'price' => $product->price,
            'thumbnail' => $product->image1,
            'qty' => $quantity
        );
        $oldWishlist  = $request->session()->has('wishlist') ? $request->session()->get('wishlist') : null;
        if ($oldWishlist) {
            $inWishlist = false;
            foreach ($oldWishlist as $item) {
                if ($item->id == $productId && $item->sku == $productSku) {
                    $item->qty++;
                    $inWishlist = true;
                    break;
                }
            }
            if ($inWishlist) {
                $newWishlist = $inWishlist;
            } else {

                $newWishlist = $oldWishlist;
                array_push($newWishlist, $wishlistProduct);
            }
        } else {
            $newWishlist = array($wishlistProduct);
        }

        $request->session()->put('wishlist', $newWishlist);
        $arr = array('success' => 'Product Added');
        return response()->json($arr);
    }
    


    public function removeWishlistProduct(Request $request)
    {
        $product_id = $request->get('productId');
        $productSku = $request->get('productSku');
       
        $wishlist = $request->session()->get('wishlist');
        
        foreach($wishlist as $key=>$item){
            if($wishlist[$key]->id == $product_id && $wishlist[$key]->sku == $productSku){
                unset($wishlist[$key]);
                $newWishlist = array_values($wishlist);
                $request->session()->put('wishlist', $newWishlist);
            }
        }
        $arr = array('success'=>'product removed');
        return response()->json($arr);
        
       
        
    }
}
