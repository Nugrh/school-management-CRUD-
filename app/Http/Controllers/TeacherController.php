<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')->paginate(8);
        return view('teacher.index', compact('teachers'));
    }

    public function edit($id)
    {
        $teacher = User::all()->find($id);
        return view('teacher.edit', compact('teacher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'nullable|numeric|digits:10|unique:teachers,teacher_id',
            'name' => 'required',
            'birth' => 'required|date',
            'email' => 'required|unique:teachers,email',
            'address' => 'required',
        ]);

        if (empty($request->teacher_id)){
            $request->teacher_id = rand(1000000000, 9999999999);
        }

        User::create([
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'email' => $request->email,
            'address' => $request->address,
//            'password' => Hash::make($request->password),
        ]);
        return Redirect::back()->with('created', 'Record successfully created');
    }

    public function update(Request $request)
    {
        $teacher = User::where('id', $request->id);
        $request->validate([
            'teacher_id' => ['required','digits:10',
                Rule::unique('teachers')->ignore($request->id)],
            'name' => 'required',
            'birth' => 'required|date',
            'email' => 'required',
            'address' => 'required',
        ]);

        $teacher->update([
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'birth' => $request->birth,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        return Redirect::back()->with('updated', 'Record successfully updated');
    }

    public function destroy($id, $teacher_id)
    {
        $teacher = User::where('role', 'student')->find($id);
        if ($teacher_id === "$teacher->teacher_id"){
            User::where('id', $id)->delete();
            return Redirect::back()->with('deleted', 'Record successfully deleted');
        }
        return Redirect::back()->with('delete-fail', 'Teacher ID does not match with this record');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $teachers = User::where(
            'name', 'LIKE', "%{$keyword}%"
        )->where('role', 'teacher')->paginate(8);

        return view('teacher.index', compact('teachers'));
    }
}
