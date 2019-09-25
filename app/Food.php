<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable =['type','range','unit_price','fac_id','client_id'];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
