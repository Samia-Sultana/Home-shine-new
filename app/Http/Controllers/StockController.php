<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::all();
        return view('stock', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $sku = $request->input('sku');
        $unitPrice = $request->input('price');
        $totalStock = $request->input('quantity');
        $productStock = new Stock();
        $productStock['product_id'] = $product_id;
        $productStock['sku'] = $sku;
        $productStock['unitPrice'] = $unitPrice;
        $productStock['totalStock'] = $totalStock;

        $productStock->save();

        $notification = array(
            'message' => 'Stock added!',
            'alert-type' => 'success'
        );

        return redirect()->route('stock')->with($notification);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
    public function editAddress(Request $request){
        $user_id = Auth::guard('web')->user()->id;
        $user =  User::find($user_id);
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->save();
    }
}
