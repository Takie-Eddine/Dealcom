<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('user.dashboard.notifications',[
            'notifications' => $user->notifications,
        ]);
    }


    public function read($id){
        $notification = auth()->user()->unreadNotifications()->findOrFail($id);
            $notification->markAsRead();

            return redirect()->to($notification->data['url']);
    }
}
