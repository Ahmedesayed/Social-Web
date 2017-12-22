<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
        'image','caption','user_id' 
    ];
    protected $table = 'posts';

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

}
