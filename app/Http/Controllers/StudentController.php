<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Paginator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(8);
        return view('student.index', compact('students'));
    }

    public function edit($id)
    {
        $student = Student::all()->find($id);
        return view('student.edit', compact('student'));
    }

    public function store(Request $request)
    {
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
        ]);
        return Redirect::back()->with('created', 'Record successfully created');
    }

    public function update(Request $request)
    {
        $student = Student::where('id', $request->id);
        $request->validate([
            'student_id' => ['required','digits:10',
                Rule::unique('students')->ignore($request->id)],
            'name' => 'required',
            'birth' => 'required|date',
            'class' => 'required',
            'address' => 'required',
        ]);

        $student->update([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'class' => $request->class,
            'address' => $request->address,
        ]);
        return Redirect::back()->with('updated', 'Record successfully updated');
    }

    public function destroy($id, $student_id)
    {
        $student = Student::all()->find($id);
        if ($student_id === "$student->student_id"){
            Student::where('id', $id)->delete();
            return Redirect::back()->with('deleted', 'Record successfully deleted');
        }
        return Redirect::back()->with('delete-fail', 'Student ID does not match with this record');
    }
}
