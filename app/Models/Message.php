<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'conversation_id', 'tallker_id', 'body', 'type',
    ];


    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function user(){
        return $this->belongsTo(Tallker::class, 'tallker_id', 'id')
                    ->withDefault([
                        'name' => __('User')
                    ]);
    }

    public function recipients(){
        return $this->belongsToMany(Tallker::class, 'recipients')
                    ->withPivot([
                        'read_at', 'deleted_at',
                    ]);
    }
}
