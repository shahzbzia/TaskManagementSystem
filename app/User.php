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
        'firstName', 'lastName', 'email', 'password', 'countryCode', 'number', 'isStudent', 'image', 'coverImage', 'theme_id', 'highcolors_id', 'lowcolors_id', 'mediumcolors_id',
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

    public function todos(){
        return $this->hasMany(ToDos::class);
    }

    public function theme(){
        return $this->belongsTo(Themes::class, 'theme_id');
    }

    public function highColor(){
        return $this->belongsTo(HighColors::class, 'highcolors_id');
    }

    public function mediumColor(){
        return $this->belongsTo(MediumColors::class, 'mediumcolors_id');
    }

    public function lowColor(){
        return $this->belongsTo(LowColors::class, 'lowcolors_id');
    }
}
