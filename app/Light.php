<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $fillable =['stage_size','price','fac_id','client_id'];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
