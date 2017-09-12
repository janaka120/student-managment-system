<?php

namespace SIS\Models;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Student extends Model
{

	protected $fillable = ['name', 'gender', 'dob', 'address', 'email'];
	
}