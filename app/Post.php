<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    public $timestamps = true;
    
    protected $fillable = [
        'title', 'post', 'user_id',
        ];
    
    public function users () 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
