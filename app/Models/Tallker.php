<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tallker extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'user_id', 'admin_id', 'name', 'type',
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }


    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }


    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'participants')
            ->latest('last_message_id')
            ->withPivot([
                'role', 'joined_at'
            ]);
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'user_id', 'id');
    }

    public function receivedMessages()
    {
        return $this->belongsToMany(Message::class, 'recipients')
            ->withPivot([
                'read_at', 'deleted_at',
            ]);
    }
}
