<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('admin.notification.notifications',[
            'notifications' => $user->notifications,
        ]);
    }


    public function read($id){
        $notification = auth()->user()->unreadNotifications()->findOrFail($id);
            $notification->markAsRead();

        return redirect()->route('admin.request');
    }
}
