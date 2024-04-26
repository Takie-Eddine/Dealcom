<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, SearchableTrait, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    protected $searchable = [

        'columns' => [
            'users.name' => 10,
            'users.email' => 10,
        ],
    ];


    public function profile(){
        return $this->hasOne(Profile::class,'user_id' , 'id')
        ->withDefault();
    }


    public function request(){
        return $this->hasMany(Request::class);
    }


    public function tallker(){
        return $this->hasOne(Tallker::class,'user_id','id');
    }


    public function complaints(){
        return $this->hasMany(Complaint::class);
    }



    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    }
}
