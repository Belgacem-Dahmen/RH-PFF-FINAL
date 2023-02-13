<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\conges_details;
use App\Models\LeaveApplication;
use App\Models\conges_attachments;
use Illuminate\Support\Facades\Storage;


class CongesDetailsController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\conges_details  $conges_details
     * @return \Illuminate\Http\Response
     */
    public function show(conges_details $conges_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\conges_details  $conges_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $conge =LeaveApplication::where ('id',$id)->first();
       $details = conges_details::where ('id_LeaveApplication',$id)->get();
       $attachments = conges_attachments::where ('LeaveApplication_id',$id)->get();
       return view('conges.details_conges',compact('conge','details','attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\conges_details  $conges_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conges_details $conges_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\conges_details  $conges_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $conge = conges_attachments::findOrFail($request->id_file);
        $conge->delete();
        Storage::disk('public_uploads')->delete($request->employee_number.'/'.$request->file_name);
        session()->flash('delete', ' Suppression faite avec succes');
        return back();
    }
public function get_file($employee_number, $file_name)
{
    $path = $employee_number . '/' . $file_name;
    if (Storage::disk('public_uploads')->exists($path)) {
        $contents = Storage::disk('public_uploads')->get($path);
        return response()->download($contents);
    } else {
        return response()->json(['message' => 'File not found'], 404);
    }
}




public function open_file($employee_number, $file_name)
{
    $path = $employee_number . '/' . $file_name;
    if (Storage::disk('public_uploads')->exists($path)) {
        return response()->file(Storage::disk('public_uploads')->get($path));
    } else {
        return response()->json(['message' => 'File not found'], 404);
    }
}


    

}
