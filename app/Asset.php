<?php

namespace App;

use App\Stock;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
      public function stocks(){
      	return $this->hasOne(Stock::class);
      }


      public function dangerLevel(){

      	if($this->danger_level >= $this->stock){

   
      		return $this->name;
      	}
      }

      public function hospital()
      {
      	return $this->belongsTo(Hospital::class);
      }
}
