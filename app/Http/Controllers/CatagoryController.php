<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Product;
use App\Models\Logo;
use App\Models\Navbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = Catagory::all();
        return view('catagory',compact('catagories'));
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
        
        if($request->file('image'))
        {
        $file = $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        Image::make($file)->save('photos/'.$filename);
        $save_url = 'photos/'.$filename;
        $catagory = new Catagory();
        $catagory['catagoryName'] = $request->catagoryName;
        $catagory['image'] = $filename;
        $catagory['nav'] = $request->get('nav');
        $catagory->save();
    }
        
    $catagories = Catagory::all();
    return view('catagory',compact('catagories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory, $id)
    {
        $catagory = Catagory::find($id);
        $catagoryProducts = Product::where('catagory', $catagory->catagoryName)->paginate(12);
        $catagoryName =  $catagory->catagoryName;
        $catagories = Catagory::all();
        $logo = Logo::get()->last();
        $navigation = Navbar::all();
        return view('catagoryProduct', compact('catagoryProducts','catagoryName','catagories','logo','navigation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Catagory $catagory)
    {
        $id = $request->input('catagory_id');
        DB::table('catagories')->where('id',$id)->delete();
        $catagories = Catagory::all();
        return view('catagory',compact('catagories'));

    }

    public function updateCatagoryStatus(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');
        DB::table('catagories')->where('id',"=",$id)->update([
            'status' => $status
        ]);
        return response()->json(['ji'=>'hiiiiiiiiiiiiiiiiiiii']);
    }
}
