<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    //
    protected $fillable =['type'];

    public function functions()
    {
        return $this->belongsToMany(Functions::class);
    }
}
