<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Str;

class AdminProfile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $primaryKey = 'admin_id';


    protected $fillable = [
        'admin_id' , 'first_name' , 'last_name' , 'birthday' , 'gender' , 'street_address' ,
        'photo' , 'city' , 'state' , 'postal_code' , 'country' , 'locale' , 'phone',
    ];



    public function user(){
        return $this->belongsTo(Admin::class,'admin_id' , 'id');
    }


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatars')
            ->singleFile();
    }

    public function getImageUrlAttribute(){

        if(!$this->photo){
            return asset('assets/media/avatars/300-1.jpg');

        }

        if (Str::startsWith($this->photo,['http://' , 'https://'])) {
            return $this->photo;
        }

        return asset('assets/images/profile/' .$this->photo);
    }
}
