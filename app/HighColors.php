<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighColors extends Model
{
    protected $fillable = [
        'color', 
    ];

	public function user(){
        return $this->hasMany(User::class);
    }
}
