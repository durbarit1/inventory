<?php

namespace App;
use App\Designation;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  

     protected $fillable=['image'];

     public function designation()
   {
   	return $this->belongsTo('App\Designation');


   }

}
