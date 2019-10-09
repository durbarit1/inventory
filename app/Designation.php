<?php

namespace App;
use App\Employee;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable=['deg_name'];





     public function employeee()
   {
   	        return $this->hasMany('App\Employee');

   }
}
