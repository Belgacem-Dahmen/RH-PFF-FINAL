<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leavelist;
use Illuminate\Http\Request;
use App\Models\conges_details;
use App\Models\LeaveApplication;
use App\Models\conges_attachments;

use Illuminate\Support\Facades\DB;
use App\Notifications\StatusUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\UpdateDemandeConge;
use App\Notifications\AddNewCongeNotification;




class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conges=LeaveApplication::all();
        return view ('conges.conges',compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leavelist::all();
        return view('conges.add_conge', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LeaveApplication::create ([

            'employee_number'=>$request->employee_number,
            'conges_date'=>$request->conges_date,
            'products'=>$request->product,
            'leavelists_id'=>$request->leave,
            'reason'=>$request->conges_reason,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'half_day'=>$request->half_day,
            'total_days'=>$request->total_days,
            'unpaid_days'=>$request->unpaid_days,
            'total'=>$request->total_days,
            'reprise_date'=>$request->reprise_date,
            'status'=>'pending',
            'value_status'=>2,
            'note'=>$request->note,
            'user'=>(Auth::user()->email),



        ]);
        $LeaveApplication_id = LeaveApplication::latest()->first()->id;
        conges_details::create([
            'id_LeaveApplication' =>  $LeaveApplication_id,
            'employee_number' => $request->employee_number,
            'products' => $request->product,
            'leavelists' => $request->leave,
            'status' => 'pending',
            'value_status' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);


        if ($request->hasFile('pic')) {

            $LeaveApplication_id =  LeaveApplication::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $employee_number = $request->employee_number;

            $attachments = new conges_attachments();
            $attachments->file_name = $file_name;
            $attachments->employee_number = $employee_number;
            $attachments->created_by = Auth::user()->name;
            $attachments->LeaveApplication_id =  $LeaveApplication_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $employee_number), $imageName);
        }

        //$user = User::get();

        //$LeaveApplication =  LeaveApplication::latest()->first()
    
        //$user->notify(new \App\Notifications\AddNewCongeNotification( $LeaveApplication));
    
        //$user->notify(new AddNewCongeNotification($LeaveApplication));

        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['manager', 'owner']);
        })->get();
        $LeaveApplication =  LeaveApplication::latest()->first();
        foreach ($users as $user) {
            $user->notify(new AddNewCongeNotification($LeaveApplication));
        }

        session()->flash ('Add', '  Demande déposé avec succés ');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conges = LeaveApplication::where('id', $id)->first();
        return view('conges.status_update', compact('conges'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conges = LeaveApplication::where('id', $id)->first();
        $leaves = Leavelist::all();
        return view('conges.edit_conge', compact('leaves', 'conges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function getproducts($id)
    {
        $products = DB::table("products")->where("leavelists_id", $id)->pluck("product_name", "id");
        return json_encode($products);
    }





    public function update(Request $request)
    {
        $conges = LeaveApplication::findOrFail($request->conges_id);
        $conges->update([
            'employee_number'=>$request->employee_number,
            'conges_date'=>$request->conges_date,
            'products'=>$request->product,
            'leavelists_id'=>$request->leave,
            'reason'=>$request->conges_reason,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'half_day'=>$request->half_day,
            'total_days'=>$request->total_days,
            'unpaid_days'=>$request->unpaid_days,
            'total'=>$request->total_days,
            'reprise_date'=>$request->reprise_date,
                       
            'note'=>$request->note,
            
        ]);
       
        $user = User::where('email',  $conges->user )->first();
       

        if($user) {
            $user->notify(new  UpdateDemandeConge ($conges));}


$managers = User::whereHas('roles', function ($query) {
    $query->whereIn('name', ['manager', 'owner']);
})->get();
foreach ($managers as $manager) {
    $manager->notify(new UpdateDemandeConge ($conges));}



        session()->flash('edit', ' Modification faite avec succes');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->conge_id;
        $conges = LeaveApplication::where('id', $id)->first();
        $Details = conges_attachments::where('LeaveApplication_id', $id)->first();
        if (!empty($Details->employee_number)) {

            Storage::disk('public_uploads')->deleteDirectory($Details->employee_number);
        }



        $conges->Delete();
        session()->flash('delete_conge');
        return redirect('/conges');


    }

    
    
    public function status_update($id, Request $request)
    {
        $conges = LeaveApplication::findOrFail($id);
       
       


        if ($request->status === 'Accepted') {
            
            
            $conges->update([
                
            'value_status' => 1,
            'status' => $request->status,
            'status_date' => $request->status_date,
            ]);
            
            conges_details::create([
                'id_LeaveApplication' => $request->conges_id,
                'employee_number' => $request->employee_number,
                'products' => $request->products,
                'leavelists' => $request->leave,
                'status' => $request->status,
                'value_status' => 1,
                'status_date' => $request->status_date,
                'note' => $request->note,
                'user' => Auth::user()->name,
            ]);
        } else {
    
            $conges->update([
                'value_status' => 3,
                'status' => $request->status,
                'status_date' => $request->status_date,
            ]);
            conges_details::create([
                'id_LeaveApplication' => $request->conges_id,
                'employee_number' => $request->employee_number,
                'products' => $request->products,
                'leavelists' => $request->leave,
                'status' => $request->status,
                'value_status' => 3,
                'status_date' => $request->status_date,
                'note' => $request->note,
                'user' => Auth::user()->name,
            ]);
        }
        
        
        $user = User::where('email',  $conges->user )->first();
       

        if($user) {
            $user->notify(new StatusUpdate($conges));}
        
          
        session()->flash('status_update', 'Succes Changement Status');
        return redirect('/conges');
    }

    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= Auth::user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }



   

    
}
