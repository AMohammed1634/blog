<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo('App\role','roles_id','id');
    }
    public function reviews(){
        return $this->hasMany('App\review','users_id','id');
    }
    public function wishLists(){
        return $this->hasMany('App\wishList','users_id','id');
    }
    public function orders(){
        return $this->hasMany('App\order','users_id','id');
    }

    public function shoppingCart(){
        return $this->hasMany('App\shoppingCart','users_id','id');
    }
}
