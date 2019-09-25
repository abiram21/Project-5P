<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    protected $fillable =['type','extension','range','unit_price','fac_id','client_id'];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
