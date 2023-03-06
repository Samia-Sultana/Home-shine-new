<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\Productimage;
use App\Cart;

use App\Models\Logo;
use App\Models\Navbar;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    
    
    public function viewCart(Request $request){


        
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();

        $subTotal = 0;
        $shipping = 150;
        $grandTotal = 0;
        
        if($request->session()->has('cart')){
            
            $cart = $request->session()->get('cart');
            foreach($cart as $item){
                $subTotal = $subTotal + ($item->price * $item->qty);
            }
            $grandTotal = $subTotal + $shipping;
            return view('shopping_cart', compact('subTotal','shipping','grandTotal','catagories','logo','navigation'));
        }
        else{
            
            return view('shopping_cart', compact('subTotal','shipping','grandTotal','catagories','logo','navigation'));
        }
        
       
    }
    public function addToCart(Request $request){
        //$request->session()->forget('cart');
        $productId = $request->input('productId');
        $productSku = $request->input('productSku');
        $quantity = $request->input('quantity');
        $product = Product::find($productId);
        $cartProduct = (object) array(
            'id' => $product->id,
            'sku'=> $productSku,
            'name' =>$product->productName,
            'price' => $product->price,
            'thumbnail' => $product->image1,
            'qty' => $quantity
        );
        $oldCart  = $request->session()->has('cart')? $request->session()->get('cart'): null;
        if($oldCart){
            $inCart = false;
            foreach($oldCart as $item){
                if($item->id == $productId && $item->sku == $productSku){
                    $item->qty++;
                    $inCart = true;
                    break;
                }
            }
            if($inCart){
                $newCart = $oldCart;
            }
            else{

                $newCart = $oldCart;
                array_push($newCart,$cartProduct);

            }
        }
        else{
            $newCart = array($cartProduct);
        }
       
        $request->session()->put('cart', $newCart);
        $arr = array('success'=>'Product Added');
        return response()->json($arr);
        
    }
    public function updateCart(Request $request){
        $productId = $request->input('productId');
        $productSku = $request->input('productSku');
        $quantity = $request->input('newQuantity');
        $product = Product::find($productId);
        $cart  = $request->session()->get('cart');
        foreach($cart as $item){
            if($item->id == $productId && $item->sku == $productSku){
                $item->qty = $quantity ;
                break;
            }
        }
        $request->session()->put('cart', $cart);
        return response()->json(['cart'=>json_encode($cart)]);
        
        

    }
    public function removeCartProduct(Request $request){
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        $product_id = $request->input('product_id');
        $productSku = $request->input('product_sku');
       
        $cart = $request->session()->get('cart');
        foreach($cart as $key=>$item){
            
            if($cart[$key]->id == $product_id && $cart[$key]->sku == $productSku){
                unset($cart[$key]);
                $newcart = array_values($cart);
                $request->session()->put('cart', $newcart);
            }
        }

        //view cart
        $subTotal = 0;
        $shipping = 150;
        $grandTotal = 0;
        if($request->session()->has('cart')){
            $cart = $request->session()->get('cart');
            foreach($cart as $item){
                $subTotal = $subTotal + ($item->price * $item->qty);
            }
            $grandTotal = $subTotal + $shipping;
            return view('shopping_cart', compact('subTotal','shipping','grandTotal','catagories','logo','navigation'));
        }
        else{
            return view('shopping_cart', compact('subTotal','shipping','grandTotal','catagories','logo','navigation'));
        }
            
        
    }
}