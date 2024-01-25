<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Request extends Model
{
    use HasFactory, SearchableTrait;


    protected $fillable = [
        'user_id', 'product_id', 'admin_id', 'status',
    ];



    public function details(){
        return $this->hasOne(RequestDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
