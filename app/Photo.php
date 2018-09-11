<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable=['album_id','photo','title','description'];

    public function Album(){
        return $this->belongsTo('App\Album');
    }

    public function getImage()
    {
        if (!$this->photo)
            return asset('no_image.png');
        return asset($this->photo);
    }
}
