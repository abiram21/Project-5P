<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shorteats extends Model
{
    protected $fillable =['type','range','unit_price','fac_id','client_id'];


    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
