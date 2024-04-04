<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Notifications\ComplaintNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index(){
        $complaints = Complaint::paginate();

        return view('admin.complaint.index',compact('complaints'));
    }



    public function answer($id){

        $complaint = Complaint::where('id','=',$id)->whereNull('answer')->firstOrFail();

        return view('admin.complaint.answer',compact('complaint'));
    }


    public function answerstore(Request $request, $id){

        $request->validate([
            'description' => ['required', 'min:10'],
        ]);


        $complaint = Complaint::findOrFail($id);

        $complaint->update([
            'admin_id' => Auth::user('admin')->id,
            'answer' => $request->description,
        ]);

        $complaint->user->notify(new ComplaintNotification($complaint));

        toastr()->success('Sent successfully!', 'Congrats', ['timeOut' => 6000]);
        return redirect()->route('admin.complaints.show',$complaint->id);

    }


    public function show($id){
        $complaint = Complaint::findOrFail($id);

        return view('admin.complaint.show',compact('complaint'));
    }
}
