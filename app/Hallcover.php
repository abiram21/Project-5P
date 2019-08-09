<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hallcover extends Model
{
    protected $fillable =['hallsize','colors','price','fac_id','client_id'];


    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
