<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Repositories\StudentRepository;
use SIS\Services\StudentService;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $students = StudentService::getAllStudents();
  
        if($students['success']) {
            $students = $students['data'];
            return view('student.studentsList', compact('students'));    
        }

        $students = $students['data'];
        return view('student.studentsList', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = null;
        return view('student.studentCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "address" => $request->input('address'),
            "dob" => $request->input('dob'),
            "gender" => $request->input('gender'),
        ];

        $student = StudentService::createStudent($data);
        if($student['success']) {
            return redirect('student');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = StudentService::findStudentById($id);
        
        if($result['success']) {
            $student = $result['data'];
            return view('student.studentCreate', compact('student'));
        }

        return view('student.studentsList');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "address" => $request->input('address'),
            "dob" => $request->input('dob'),
            "gender" => $request->input('gender'),
        ];

        $student = StudentService::updateStudent($id, $data);
        if($student['success']) {
            return redirect('student');
        }
        // TODO
        // show erro message box 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = StudentService::deleteStudent($id);

        if($result['success']) {
            return redirect('student');
        }

        return redirect('student');
    }
}
