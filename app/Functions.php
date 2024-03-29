<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    protected $fillable =['name'];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
}
