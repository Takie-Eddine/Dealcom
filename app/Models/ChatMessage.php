<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatMessage extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'chat_id', 'user_id', 'admin_id', 'body', 'type',
    ];



    public function chat(){
        return $this->belongsTo(Chat::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function admin(){
        return $this->belongsTo(Admin::class);
    }



}
