<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    protected $fillable =['place_type','stage_size','price','fac_id','client_id'];


    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
