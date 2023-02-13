<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conges_attachments;
use Illuminate\Support\Facades\Auth;

class CongesAttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',
    
            ], [
                'file_name.mimes' => 'file extentions Only   pdf, jpeg , png , jpg',
            ]);
            
            $image = $request->file('file_name');
            $file_name = $image->getClientOriginalName();
    
            $attachments =  new conges_attachments();
            $attachments->file_name = $file_name;
            $attachments->employee_number = $request->employee_number;
            $attachments->LeaveApplication_id = $request->LeaveApplication_id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->save();
               
            // move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('Attachments/'. $request->employee_number), $imageName);
            
            session()->flash('Add', 'Succes D`ajout PJ');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\conges_attachments  $conges_attachments
     * @return \Illuminate\Http\Response
     */
    public function show(conges_attachments $conges_attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\conges_attachments  $conges_attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(conges_attachments $conges_attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\conges_attachments  $conges_attachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conges_attachments $conges_attachments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\conges_attachments  $conges_attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy(conges_attachments $conges_attachments)
    {
        //
    }
}
