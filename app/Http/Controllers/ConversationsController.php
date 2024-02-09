<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{
    public function index(){
        $user = Auth::user();
        return $user->conversations()->paginate();
    }


    public function show(Conversation $conversation){

        return $conversation->load('participants');
    }


    public function addParticipant(Request $request, Conversation $conversation){

        $request->validate([
            'tallker_id' => ['required', 'int', 'exists:tallkers,id']
        ]);


        $conversation->participants()->attach($request->post('tallker_id'),[
            'joined_at' => Carbon::now(),
        ]);
    }


    public function removeParticipant(Request $request, Conversation $conversation){

        $request->validate([
            'tallker_id' => ['required', 'int', 'exists:tallkers,id']
        ]);


        $conversation->participants()->detach($request->post('tallker_id'));
    }
}
