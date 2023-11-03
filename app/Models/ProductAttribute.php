<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;


    public $table = 'product_attributes';
    public $timestamps = false;

    protected $fillable = [
        'value', 'product_id', 'attribute_id',
    ];
}
