<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable =['name','address','description','email','phoneNo'];


    public function chairs()
    {
        return $this-hasMany(Chair::class);
    }
    public function foods()
    {
        return $this-hasMany(Food::class);
    }
    public function hallcovers()
    {
        return $this-hasMany(Hallcover::class);
    }
    public function lights()
    {
        return $this-hasMany(Light::class);
    }
    public function memorials()
    {
        return $this-hasMany(Memorial::class);
    }
    public function photographies()
    {
        return $this-hasMany(Photography::class);
    }

    public function shorteats()
    {
        return $this-hasMany(Shorteats::class);
    }
    public function sounds()
    {
        return $this-hasMany(Sound::class);
    }
}
