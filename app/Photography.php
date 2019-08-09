<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    protected $fillable =['time_duration','price','fac_id','client_id'];


    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
