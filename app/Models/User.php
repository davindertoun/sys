<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'password',
        'dob',
        'profile_img',
        'department',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() 
    {
        return $this->belongsTo('App\Models\Role');
    }
    public function isUser() 
    {
        $user = strtolower($this->role->name);
        if($user =='user')
        {
           return true; 
        }
        return false;
    }
    public function isTL() 
    {
        $tl = strtolower($this->role->name);
        if($tl =='tl')
        {
           return true; 
        }
        return false;
    }
    public function isManager() 
    {
        $manager = strtolower($this->role->name);
        if($manager =='manager')
        {
           return true; 
        }
        return false;
    }
}