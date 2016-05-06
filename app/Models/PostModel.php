<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'posts_table';


    protected $fillable=['id','user_id','post_type','post_data'];
    public function user()
    {
        return $this->belongsTo('App\User')->select(array('name','email'));
    }
}
