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
        'name', 'email', 'password','phone'
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

    public function updatedProducts(){
        return $this->hasMany('App\updatedProduct','user_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messagesFromMe(){
        return $this->hasMany('App\message','message_from','id');
    }
    public function messagesToMe(){
        return $this->hasMany('App\message','message_to','id');
    }

    public function unseenMessages(){
        return
            $this->hasMany(message::class,"message_from")
                ->where([
                    ["readed",0],
                    ["message_to" , auth()->user()->id]
                ]);
    }
    public function messages_between(User $user){
        return message::where([
                    ["message_to",$this->id],
                    ["message_from",$user->id]
                ])->orWhere([
                    ["message_from",$this->id],
                    ["message_to",$user->id]
                ])->orderBy("id","ASC")->get();
    }
}
