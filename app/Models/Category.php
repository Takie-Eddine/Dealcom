<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations, SoftDeletes, SearchableTrait;


    public $translatable = ['name','description'];

    protected $fillable = [
        'name', 'parent_id', 'description', 'status', 'slug', 'image',
    ];

    protected $searchable = [

        'columns' => [
            'categories.name' => 10,
            'categories.name' => 10,
            'categories.slug' => 10,
        ],
    ];


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('categories')
            ->singleFile();
    }


    public function scopeActive(Builder $builder){
        $builder->where('status','=' ,'active');
    }

    public function scopeParents($query){
        return $query -> whereNull('parent_id');
    }

    public function scopeChild($query){
        return $query -> whereNotNull('parent_id');
    }


    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id','id')
        ->with('parent')
        ->withDefault([
            'name' => '__'
        ]);
    }

    public function children(){
        return $this->hasMany(Category::class,'parent_id','id')->with('children');
    }


    public function suppliers(){
        return $this->belongsToMany(Supplier::class,'supplier_categories');
    }



    public static function tree(){

        $allCategories = Category::get();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::formatTree($rootCategories, $allCategories);

        return $rootCategories;
    }


    private static function formatTree($categories, $allCategories){

        foreach ($categories as $category) {
            $category->children = $allCategories->where('parent_id',$category->id)->values();

            if ($category->children->isNotEmpty()) {
                self::formatTree($category->children, $allCategories);
            }
        }

    }


    public function getImageUrlAttribute(){

        if(!$this->image){
            return asset('assets/media/svg/files/blank-image.svg');
        }

        if (Str::startsWith($this->image,['http://' , 'https://'])) {
            return $this->image;
        }

        return asset('assets/images/category_images/' .$this->image);

    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
