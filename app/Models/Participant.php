<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;


    public $timestamps = false;


    protected $casts = [
        'joined_at' => 'datetime'
    ];


    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function user(){
        return $this->belongsTo(Tallker::class);
    }
}
