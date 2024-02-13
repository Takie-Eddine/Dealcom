<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Tallker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($id = null){
        $user = Auth::user();

        $tallker = $user->tallker;

        $tallkers = Tallker::with(['user'])->where('type', '=', 'admin')->get();

        $chats = $tallker->conversations()->with([
            'lastMessage',
            'participants' => function($builder) use ($tallker){
                $builder->where('id', '<>', $tallker->id);
            }
        ])->get();

        $messages = [];
        $activeChat = null;

        if ($id) {
            $activeChat = $chats->where('id', $id)->first();
            $messages = $activeChat->messages()->with(['user'])->paginate();
        }

        return view('user.dashboard.chat.chat',compact('tallkers', 'messages', 'chats', 'activeChat'));
    }
}
