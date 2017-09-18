<?php

use Faker\Generator as Faker;
use SIS\Models\Student;

$factory->define(Student::class, function (Faker $faker) {
	$gender = ['m', 'f'];
	$value = $gender[array_rand($gender)];
    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'dob' => $faker->DateTime,
        'gender' => $value,
    ];
});
