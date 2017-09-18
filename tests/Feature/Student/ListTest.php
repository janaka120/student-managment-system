<?php

namespace Tests\Feature\Student;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use SIS\Models\Student;

class ListTest extends TestCase
{
	use DatabaseTransactions;

    public function testTitle()
    {
        $this->get('/student')->assertSee('Students');
    }

    public  function testTable()
    {
		$student = factory(Student::class, 1)->create();
		
		$response = $this->get('/student?page=1');
		$student = $student[0];
		$response->assertStatus(200);
		$response->assertSee($student['name']);
		$response->assertSee($student['email']);
		$response->assertSee($student['gender']);
		$response->assertSee($student['address']);
		$response->assertSee($student['dob']->toDateString());
    }

    public function Pagination()
    {
    	$students = factory(Student::class, 11)->create();
    	$paginateBy = 10;
    	$queryParameters = 'page=2';

    	$response = $this->get('/student?'. queryParameters);
    	// last student
    	$student = $student[10];
		$response->assertStatus(200);
		$response->assertSee($student['name']);
		$response->assertSee($student['email']);
		$response->assertSee($student['gender']);
		$response->assertSee($student['address']);
		$response->assertSee($student['dob']->toDateString());

    }
}
