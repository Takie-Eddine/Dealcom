<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';


    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'photo', 'phone',
        'country', 'address',
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id' , 'id');
    }


    public function getImageUrlAttribute(){

        if(!$this->photo){
            return asset('assets/media/avatars/300-1.jpg');

        }

        if (Str::startsWith($this->photo,['http://' , 'https://'])) {
            return $this->photo;
        }

        return asset('assets/images/user_images/' .$this->photo);
    }
}
