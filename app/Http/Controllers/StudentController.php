<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Paginator;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->paginate(8);
        return view('student.index', compact('students'));
    }

    public function edit($id)
    {
        $student = User::where('role', 'student')->find($id);
        return view('student.edit', compact('student'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'student_id' => 'nullable|numeric|digits:10|unique:users,student_id',
            'name' => 'required',
            'email' => 'nullable|email',
            'birth' => 'required|date',
            'class' => 'required',
            'address' => 'required',
        ]);

        if (empty($request->student_id)){
            $request->student_id = rand(1000000000, 9999999999);
        }

        User::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'role' => 'student',
            'class' => $request->class,
            'address' => $request->address,
            'password' => Hash::make($request->student_id),
        ]);
        return Redirect::back()->with('created', 'Record successfully created');
    }

    public function update(Request $request)
    {
        $student = User::where('id', $request->id);
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
        $student = User::where('role', 'student')->find($id);
        if ($student_id === "$student->student_id"){
            $student->where('id', $id)->delete();
            return Redirect::back()->with('deleted', 'Record successfully deleted');
        }
        return Redirect::back()->with('delete-fail', 'Student ID does not match with this record');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $students = User::where(
            'name', 'LIKE', "%{$keyword}%"
        )->where('role', 'student')->paginate(8);

        return view('student.index', compact('students'));
    }
}
