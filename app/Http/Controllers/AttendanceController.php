<?php

namespace App\Http\Controllers;

use App\Exports\AttendanceExport;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel;

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

    public function search(Request $request)
    {
        $request->validate([
            'class' => 'required',
        ]);

        $students = User::where('class', 'LIKE', "%{$request->class}%")
            ->where('role', 'student')->paginate(120);

        return view('teacher.attendance.index', compact('students'));
    }

    public function store(Request $request)
    {

//        dd($request->student_id[]);
//
//        $student_id = [];
//        foreach ($request->student_id as $student){
//            $student_id[] = $student;
//        }

//        $request->input("$student_id]");

//        dd($student_id);
//         dd($request->input("$student_id"));
        $students = User::where('class', $request->class)->get();

        $data = [];
        foreach ($students as $student){
            $data[] = array(
                'student_id' => $request->input($student->student_id),
                'name' => $request->input('name'.$student->student_id),
                'class' => $request->input('class'.$student->student_id),
                'attendance' => $request->input('radio'.$student->student_id),
            );
        }

//        $data->toJson;

//        dd($data);
        Attendance::insert($data);

//        Storage::put('storage/attendance.txt', $data);

//        dd($data);
//        $data->toJson();

//        $students->update($data);


//
//        $request->validate([
//            'student_id' => 'required',
//            'name' => 'required',
//            'attendance' => 'required',
//        ]);
//
//        User::where('student_id', $request->student_id)->update([
//            'attendance' => $request->attendance
//        ]);

        Redirect::back();
    }

    protected $class;

    public function export_excel($class){

        $this->class = $class;
        $attendance = new AttendanceExport($this->class);
        return $attendance->download('test.xlsx');
//        return (new AttendanceExport(Arr::except($this->class)))->download(''test.xlsx'');

//        return Excel::download(new AttendanceExport($this->class), 'attendance.xlsx');
    }
}
