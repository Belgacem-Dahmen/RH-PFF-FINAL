<?php

namespace App\Http\Controllers;

use App\Models\Leavelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeavelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //dd('aaaa');
         $leaves=Leavelist::all();
         return view('leaves.leaves',compact('leaves'));
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
       $validatedData = $request->validate([
        'leave_name' => 'required|unique:Leavelists,leave_name|max:255',
            'description' => 'required',
        ],[

            'leave_name.required' =>' Veuillez ajouter le Titre',
            'leave_name.unique' =>'Ce Titre existe deja !   ',
            'description.required' =>'Veuillez ajouter  la description  ',

        ]);

        Leavelist::create([
                'leave_name' => $request->leave_name,
                'description' => $request->description,
                'created_by' => (Auth::user()->name),

            ]);
            session()->flash('Add', 'SUCCES!');
            return redirect('/leaves');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leavelist  $leavelist
     * @return \Illuminate\Http\Response
     */
    public function show(Leavelist $leavelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leavelist  $leavelist
     * @return \Illuminate\Http\Response
     */
    public function edit(Leavelist $leavelist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leavelist  $leavelist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this ->validate($request,[
            'leave_name' => 'required|unique:Leavelists,leave_name|max:255',
                'description' => 'required',
            ],[
    
                'leave_name.required' =>' Veuillez ajouter le Titre',
                'leave_name.unique' =>'Ce Titre existe deja !   ',
                'description.required' =>'Veuillez ajouter  la description  ',
    
            ]);
     $sections = Leavelist::find($id);
     $sections->update([
                    'leave_name' => $request->leave_name,
                    'description' => $request->description,
                    'created_by' => (Auth::user()->name),
    
                ]);
                session()->flash('edit', 'SUCCES edit');
                return redirect('/leaves');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leavelist  $leavelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $id = $request->id;
        Leavelist::find($id)->delete();
        session()->flash('delete','SUCCES supprime');
        return redirect('/leaves');
    }
}
