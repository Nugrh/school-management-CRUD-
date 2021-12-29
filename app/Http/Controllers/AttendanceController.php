<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
//        $students = User::where('role', 'student')->paginate(30);
        $classes = Classroom::all();
        return view('teacher.attendance.search', compact('classes'));
    }

    public function find()
    {
        $lessons = Lesson::all();
        $classes = Classroom::all();
        return view('teacher.attendance.search', compact('lessons', 'classes'));
    }

    public function seach(Request $request)
    {
        $request->validate([
            'class' => 'required',
        ]);

        $students = User::where('class', 'LIKE', "%{$request->class}%")
            ->where('role', 'student') ->paginate(30);

        return view('teacher.attendance.index', compact('students'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        User::where('id', $request->id)->update([
            'attendance' => $request->attendance
        ]);
    }
}
