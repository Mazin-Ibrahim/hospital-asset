<?php

namespace App;

use App\Stock;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
      public function stocks(){
      	return $this->hasOne(Stock::class);
      }
}
