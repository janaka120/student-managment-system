<?php

namespace SIS\Models;

use Illuminate\Database\Eloquent\Model;

/**
* 
*/
class Student extends Model
{

	protected $fillable = ['name', 'gender', 'dob', 'address', 'email'];

	protected $dates = ['created_at', 'updated_at', 'dob'];
	
	protected $appends = ['age'];

	protected function getAgeAttribute() {
		return $this->dob->age;
	}
}