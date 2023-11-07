<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, HasTranslations, SoftDeletes, SearchableTrait;


    public $translatable = ['name','description'];

    protected $fillable = [
        'brand_id', 'supplier_id', 'category_id', 'name', 'code', 'slug',
        'description', 'price', 'quantity', 'sku', 'options', 'rating',
        'featured', 'approved', 'status', 'price_list', 'price_type',
    ];


    protected $searchable = [

        'columns' => [
            'products.name' => 10,
            'products.code' => 10,
        ],
    ];





    public function scopeActive(Builder $builder){
        $builder->where('status' , '=' , 'active');
    }


    // public function getApproved()
    // {
    //     return $this->approved == 0 ? {{__('master.not approved')}} : {{__('master.approved')}};
    // }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tags(){

        return $this->belongsToMany(Tag::class , 'product_tags' , 'product_id' , 'tag_id' , 'id' , 'id');
    }



    public function supplier(){
        return $this->belongsTo(Supplier::class)
        ->withDefault();
    }



    public function brand(){
        return $this->belongsTo(Brand::class)
        ->withDefault();
    }


    public function attributes(){
        return $this->belongsToMany(ProductAttribute::class, 'product_attributes')
            ->withPivot(['value'])
            ->as('option') ;
    }


    public function getImageUrlAttribute(){

        if(!$this->image){
            return 'https://icphso.org/global_graphics/default-store-350x350.jpg';
        }

        if (Str::startsWith($this->image,['http://' , 'https://'])) {
            return $this->image;
        }

        return asset('assets/images/product_images/' .$this->image);

    }

}
