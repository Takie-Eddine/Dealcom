<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    use HasFactory;


    protected $fillable = [
        'request_id','category','quantity',
        'unit','country','shipping_type','description',
    ];



    public function request(){
        return $this->belongsTo(Request::class);
    }
}
