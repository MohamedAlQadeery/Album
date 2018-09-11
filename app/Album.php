<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //

    protected $fillable=['name','description','cover_image','user_id'];

    public $with=['photos'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function photos(){
        return $this->hasMany('App\Photo');
    }

    public function getImage()
    {
        if (!$this->cover_image)
            return asset('no_image.png');
        return asset($this->cover_image);
    }
}
