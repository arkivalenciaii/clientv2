<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'limit', 'address', 'birthday','phone_number'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // function subjects()
    // {
    //     return $this->belongsToMany('App\Subject');
    // }

    public function slots()
    {
        return $this->hasMany('App\Slot');
    }

    public function rankings()
    {
        return $this->hasMany('App\Ranking');
    }

    public function limit()
    {
        if($this->slots()->count() >= 20)
        {
            return 0;
        }
        else
        {
            return (20 - $this->slots()->count());
        }
    }

    public function attachBank($bid)
    {
        $this->verif_id = $bid;
        $this->save();
    }

    public function bank()
    {
        return $this->hasOne('App\Bank');
    }

    public function hasBank()
    {
        if($this->bank())
        {
            return true;
        }
    }
}
