<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
//        This says that Post has a relationship with a User and it belongs to User
        return $this->belongsTo('App\User');
    }
}
