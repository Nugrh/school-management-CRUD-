<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index', compact('teachers'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'teacher_id' => 'required|numeric|digits:10|unique:teachers,teacher_id',
            'name' => 'required',
            'birth' => 'required|date',
            'email' => 'required|unique:teachers,email',
            'address' => 'required',
        ]);

        Teacher::create([
            'student_id' => $request->teacher_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'email' => $request->email,
            'address' => $request->address,
//            'password' => Hash::make($request->password),
        ]);
        return Redirect::back();
    }
}
