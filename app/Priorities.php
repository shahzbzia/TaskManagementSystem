<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priorities extends Model
{
    
	protected $fillable = [
        'name',
    ];

	public function todo(){
    	return $this->hasMany('App\ToDos');
    }

}
