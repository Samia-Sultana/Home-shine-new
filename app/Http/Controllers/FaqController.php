<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFaq = Faq::all();
        return view('faqView', compact('allFaq'));
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
        $faq = new Faq();
        $faq['question'] = $request->input('question');
        $faq['answer'] = $request->input('answer');
        $faq->save();
        $notification = array(
            'message' => 'Question and anser added!',
            'alert-type' => 'success'
        );

        return redirect()->route('viewFaq')->with($notification);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Faq $faq)
    {
        $faq = Faq::find($request->input('faq_id'));
        $faq->delete();
        $notification = array(
            'message' => 'Question and anser deleted!',
            'alert-type' => 'success'
        );

        return redirect()->route('viewFaq')->with($notification);
        
    }
    public function viewServices(){
        $faqs = Faq::all();
        return view('services', compact('faqs'));
    }
}
