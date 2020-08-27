<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['name','courses'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

}

