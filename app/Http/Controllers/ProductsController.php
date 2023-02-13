<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\Leavelist;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves=Leavelist::all();
        $products = products::all();
        return view('products.products', compact('leaves','products'));
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
       

        products::create([
            'product_name' => $request->product_name,
            'leavelists_id' => $request->leavelists_id,
            'description' => $request->description,
        ]);
        session()->flash('Add', ' !succes d ajout    ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Leavelist::where('leave_name', $request->leave_name)->first()->id;

       $products = products::findOrFail($request->pro_id);

       $products->update([
       'product_name' => $request->product_name,
       'description' => $request->description,
       'leavelists_id' => $id,
       ]);

       session()->flash('Edit', '  ! Edit ok ');
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $products = products::findOrFail($request->pro_id);
         $products->delete();
         session()->flash('delete', ' Supprimer ok  ');
         return back();
    }
}
