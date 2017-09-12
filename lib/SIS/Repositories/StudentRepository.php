<?php
/**
* 
*/
namespace SIS\Repositories;

// use Illuminate\Validation\validate;
use SIS\Models\Student;

class StudentRepository
{

	public static function createStudent($data)
	{
		$student = new Student;

        // $this->validate($data, [
        //     'name'=>'required',
        //     'email'=>'required',
        //     'address'=>'required',
        //     'dob'=>'required|date',
        //     'gender'=>'required',
        // ]);

        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->dob = $data['dob'];
        $student->gender = $data['gender'];
        $student->address = $data['address'];
        
        $student->save();
        return $student;
	}

	public static function getStudentsList()
	{
		$student = Student::all();
		return $student;
	}

	public static function deleteStudent($id) 
	{ 
		return Student::destroy($id); 
	}

	public static function findStudentById($id)
	{
		return Student::Find($id);
	}

	public static function updateStudent($student, $data)
	{
		return $student->update($data);
	}
}