<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDos extends Model
{
    
	use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'date',
        'end_time',
        'date_reminder',
        'time_reminder',
        'priorities_id',
        'categories_id',
        'users_id',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function priority(){
        return $this->belongsTo('App\Priorities', 'priorities_id');
    }

    public function category(){
        return $this->belongsTo('App\Categories', 'categories_id');
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
