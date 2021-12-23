<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:web,student,user,teacher');
//    }

    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'student_id' => 'required|numeric|digits:10|unique:students,student_id',
            'name' => 'required',
            'birth' => 'required|date',
            'class' => 'required',
            'address' => 'required',
        ]);

        Student::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'class' => $request->class,
            'address' => $request->address,
//            'password' => Hash::make($request->password),
        ]);
        return Redirect::back();
    }
}
