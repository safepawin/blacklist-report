<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $fillable = ['product','identity_bank','price','name','lastname','preview_img','detail'];

    public function blacklist_images(){
        return $this->hasMany(BlacklistImage::class,'blackllists_id');
    }
}
