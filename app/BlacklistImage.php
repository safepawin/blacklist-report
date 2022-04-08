<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlacklistImage extends Model
{
    protected $fillable = [
        'image','blackllists_id'
    ];

    public function blacklist(){
        return $this->belongsTo(Blacklist::class);
    }
}
