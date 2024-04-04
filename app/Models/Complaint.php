<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id', 'admin_id', 'product_id', 'request_id',
        'text', 'answer', 'attachement',
    ];




    public function user(){
        return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function request(){
        return $this->belongsTo(Request::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
