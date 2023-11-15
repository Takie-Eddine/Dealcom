<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'supplier_id', 'name', 'status',
    ];

    public function scopeActive(Builder $builder){
        $builder->where('status' , '=' , 'active');
    }


    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

}
