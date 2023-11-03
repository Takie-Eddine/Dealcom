<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SearchableTrait,  SoftDeletes;



    protected $fillable = [
        'name', 'description', 'country', 'city',
        'address', 'postal_code', 'email', 'mobile_phone',
        'office_phone', 'code', 'status',
    ];


    protected $searchable = [

        'columns' => [
            'brands.name' => 10,
            'brands.email' => 10,
            'brands.code' => 10,
            'brands.mobile_phone' => 10,
        ],
    ];


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('brands')
            ->singleFile();
    }


    public function scopeActive(Builder $builder){
        $builder->where('status','=' ,'active');
    }
}
