@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col">
            <div class="alert alert-primary">Attendance | Class {{ $students->first()->class }}</div>
            <a href="{{ route('attendance.export', $students->first()->class) }}">Export</a>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr class="">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Attend</th>
                            <th scope="col">Absent</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="{{ route('attendance.store') }}" id="attendance" method="post">
                            <input type="hidden" name="class" value="{{$students->first()->class}}">
                            @csrf
                            @forelse($students as $student)
                                <input type="hidden" name="student_id[]" value="{{ $student->student_id }}">
                                <tr>
                                    <input type="hidden" name="{{$student->student_id}}" value="{{ $student->student_id }}">
                                    <input type="hidden" name="name{{$student->student_id}}" value="{{ $student->name }}">
                                    <input type="hidden" name="class{{$student->student_id}}" value="{{ $student->class }}">

                                    <th class="col-1">{{ $student->student_id }}</th>
                                    <td>{{ $student->name }}</td>

                                    <td class="col-1 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" id="attendance" type="radio" name="radio{{$student->student_id}}" value="attend">
                                        </div>
                                    </td>
                                    <td class="col-1 text-center form-check-label">
                                        <div class="form-check ">
                                            <input class="form-check-input" id="attendance" type="radio" name="radio{{$student->student_id}}" value="absent">
                                        </div>
                                    </td>
                                </tr>
                        @empty
                            <td colspan="3">Student is empty</td>
                        @endforelse
                        </form>
                        </tbody>
                    </table>
                </div>
                <button type="submit" form="attendance" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>

@endsection
