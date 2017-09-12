<?php
/**
* 
*/
namespace SIS\Services;

use SIS\Repositories\StudentRepository;

class StudentService
{

	public static function createStudent($data)
	{
        $student = StudentRepository::createStudent($data);

        if($student->id) {
        	return ['success' => true, 'data' => $student];
        }

        return ['success' => false, 'data' => null];
	}

	public static function getAllStudents()
	{
		$students = StudentRepository::getStudentsList();

		if($students) {
			return ['success' => true, 'data' => $students];	
		}

		return ['success' => false, 'data' => null];
	}

	public static function deleteStudent($id) 
	{
		$result = StudentRepository::deleteStudent($id);

		if($result) {
			return ['success' => true, 'data' => null];	
		}

		return ['success' => false, 'data' => null];
	}

	public static function findStudentById($id) 
	{
		if(!$id) {
			return ['success' => false, 'data' => null];
		}

		$student = StudentRepository::findStudentById($id);

		if($student) {
			return ['success' => true, 'data' => $student];
		}

		return ['success' => false, 'data' => null];
	}

	public static function updateStudent($id, $data)
	{
		if(!$id) {
			return ['success' => false, 'data' => null];
		}

		$student = StudentRepository::findStudentById($id);

		if($student) {
			$result = StudentRepository::updateStudent($student, $data);

			if($result) {
				return ['success' => true, 'data' => null];
			}
		}

		return ['success' => false, 'data' => null];	
	}
}