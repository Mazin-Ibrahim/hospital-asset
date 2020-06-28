<?php

namespace App;
use App\Asset;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function asset(){

    	return $this->belongsTo(Asset::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function operation(){

    	if($this->operation == 1){

    		return "Add";
    	} else{

    		return "Remove";
    	}
    }
}
