<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class Brand extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SearchableTrait,  SoftDeletes;



    protected $fillable = [
        'name', 'description', 'country', 'city',
        'address', 'postal_code', 'email', 'mobile_phone',
        'office_phone', 'code', 'status', 'image',
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


    public function getImageUrlAttribute(){

        if(!$this->image){
            return asset('assets/media/svg/files/blank-image.svg');

        }

        if (Str::startsWith($this->image,['http://' , 'https://'])) {
            return $this->image;
        }

        return asset('assets/images/brand_images/' .$this->image);
    }


    public function products(){
        return $this->hasMany(Product::class);
    }
}
