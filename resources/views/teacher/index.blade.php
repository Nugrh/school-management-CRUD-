@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="alert alert-info">Teacher table</div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birth</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                            </thead>
                            <tbody>
                            @forelse($teachers as $teacher)
                                <th>{{ $teacher->teacher_id }}</th>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->birth }}</td>
                                <td>{{ $teacher->Address }}</td>
                                <td>
                                    <a href="">Edit</a>
                                    <a href="">Delete</a>
                                </td>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="alert alert-info">Add new Teacher</div>
            <div class="card p-2">
                <form action="">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Teacher ID">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Teacher Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Teacher Birth">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Teacher Address">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
