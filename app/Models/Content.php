<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory, HasTranslations, SearchableTrait;

    public $translatable = ['title','sub_title'];


    protected $fillable = [
        'title','sub_title','image','position',
        'page','status',
    ];



    protected $searchable = [

        'columns' => [
            'contents.title' => 10,
            'contents.sub_title' => 10,
        ],
    ];


    public function scopeActive(Builder $builder){
        $builder->where('status' , '=' , 'active');
    }

    public function scopeHome(Builder $builder){
        $builder->where('page' , '=' , 'home');
    }
    public function scopeBottom(Builder $builder){
        $builder->where('position' , '=' , 'bottom');
    }
    public function scopeCenter(Builder $builder){
        $builder->where('position' , '=' , 'center');
    }
    public function scopeTop(Builder $builder){
        $builder->where('position' , '=' , 'top');
    }
    public function scopeRequest(Builder $builder){
        $builder->where('page' , '=' , 'request');
    }


    public function getImageUrlAttribute(){

        if(!$this->image){
            return asset('assets/media/svg/files/blank-image.svg');

        }

        if (Str::startsWith($this->image,['http://' , 'https://'])) {
            return $this->image;
        }

        return asset('assets/images/content_images/' .$this->image);
    }


}
