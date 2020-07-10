<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function assets()
    {
    	return $this->hasMany(Asset::class);
    }
}
