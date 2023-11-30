<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vedio extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'sub_title', 'image', 'link',
        'status',
    ];

    public function scopeActive(Builder $builder){
        $builder->where('status' , '=' , 'active');
    }




    public function getImageUrlAttribute(){

        if(!$this->image){
            return 'https://icphso.org/global_graphics/default-store-350x350.jpg';
        }

        if (Str::startsWith($this->image,['http://' , 'https://'])) {
            return $this->image;
        }

        return asset('assets/images/slider_images/' .$this->image);

    }
}
