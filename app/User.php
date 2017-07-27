<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        'full_name', 'email', 'facebook_id','google_id', 'avatar', 'password', 'phone', 'handle', 'github_id', 'twitter_id'
    ];
    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function comment()
    {
        return $this->hasMany('App\Comment','idUser','id');
    }
    // public function addNew($input)
    // {
    // $check = static::where('facebook_id',$input['facebook_id'])->first();

    // if(is_null($check)){
    //     return static::create($input);
    // }

    // return $check;
    
    // }
}
