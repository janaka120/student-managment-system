<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatingStudentRequest;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use SIS\Repositories\StudentRepository;
use SIS\Services\StudentService;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(CreatingStudentRequest $request)
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
            $request->session()->flash('alert-success', 'Create student successfully.');
            return redirect('student');
        }else{
            $request->session()->flash('alert-danger', 'Create student failed.');
            return redirect()->back()->withInput();
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
            Session::flash('alert-success', 'Delete student successfully.');
            return redirect('student');
        }

        Session::flash('alert-danger', 'Delete student failed.');
        return redirect('student');
    }
}
