<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;



    protected $fillable = [
        'request_id', 'user_id', 'admin_id', 'label', 'type',
    ];


    public function messages(){
        return $this->hasMany(ChatMessage::class,'chat_id','id');
    }


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function request(){
        return $this->belongsTo(Request::class);
    }
}
