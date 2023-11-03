<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Nicolaslopezj\Searchable\SearchableTrait;

class Supplier extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SearchableTrait,  SoftDeletes;


    protected $fillable = [
        'name', 'description', 'country', 'city',
        'address', 'postal_code', 'email', 'mobile_phone',
        'office_phone', 'code', 'status',
    ];

    protected $searchable = [

        'columns' => [
            'suppliers.name' => 10,
            'suppliers.email' => 10,
            'suppliers.code' => 10,
            'suppliers.mobile_phone' => 10,
        ],
    ];



    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('suppliers')
            ->singleFile();
    }


    public function scopeActive(Builder $builder){
        $builder->where('status','=' ,'active');
    }


}
