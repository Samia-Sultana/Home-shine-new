<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\Orderdetail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Invoice::all();
        return view('order',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
    public function viewInvoice($id){

         $invoice = DB::table('invoices')->find($id);
         $orderDetail = DB::table('orderdetails')->where('orderinvoice_id', '=', $id)->get();
         $user_ids = DB::table('orderdetails')->select('user_id')->where('orderinvoice_id', '=', $id)->get();
         $user = DB::table('users')->select('name')->where('id', '=', $user_ids[0]->user_id)->get();
         $products = [];
         $total = 0;
         foreach($orderDetail as $item){
            $product = DB::table('products')->find($item->product_id);
            array_push($products,$product);
            $total = $total + ($product->price * $item->quantity);
         }
         $data = array(
            "user"=>$user[0],
            "invoice"=>$invoice,
            "products"=>$products,
            "orderDetail"=>$orderDetail,
            "total"=>$total
        );
        return view('generate_invoice',compact('data'));
        
    }
    public function generateInvoice($id){
        $invoice = DB::table('invoices')->find($id);
         $orderDetail = DB::table('orderdetails')->where('orderinvoice_id', '=', $id)->get();
         $user_ids = DB::table('orderdetails')->select('user_id')->where('orderinvoice_id', '=', $id)->get();
         $user = DB::table('users')->select('name')->where('id', '=', $user_ids[0]->user_id)->get();
         $products = [];
         $total = 0;
         foreach($orderDetail as $item){
            $product = DB::table('products')->find($item->product_id);
            array_push($products,$product);
            $total = $total + ($product->price * $item->quantity);
         }
        // dd($orderDetail[0]);
         $data = array(
            "user"=>$user[0],
            "invoice"=>$invoice,
            "products"=>$products,
            "orderDetail"=>$orderDetail,
            "total"=>$total
        );
        $pdf = Pdf::loadView('generate_invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
