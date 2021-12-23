@extends('layouts.app')

@section('content')
    <form action="" method="" id="update-form"></form>
    <div class="row">
        <div class="col-8">
            <div class="alert alert-info">Student table</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Birth</th>
                        <th scope="col">Class</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <th>{{ $student->student_id }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->birth }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ $student->address }}</td>
                            <td>
                                <button id="edit">Edit</button>
                                <a href="">Delete</a>
                            </td>
                        @empty
                            <div class="col">Student is empty</div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-info">Add new Student</div>
            <div class="card p-2">
                <form action="">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Student ID">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Student Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Student Birth">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Student Class">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Student Address">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
