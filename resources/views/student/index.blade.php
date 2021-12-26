@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="feedback">
                @if(\Illuminate\Support\Facades\Session::has('created'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Success!</strong> {{ \Illuminate\Support\Facades\Session::get('created', '') }}
                    </div>
                @elseif(\Illuminate\Support\Facades\Session::has('updated'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Success!</strong> {{ \Illuminate\Support\Facades\Session::get('updated', '') }}
                    </div>
                @elseif(\Illuminate\Support\Facades\Session::has('deleted'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Success!</strong> {{ \Illuminate\Support\Facades\Session::get('deleted', '') }}
                    </div>
                @elseif(\Illuminate\Support\Facades\Session::has('delete-fail'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Fail!</strong> {{ \Illuminate\Support\Facades\Session::get('delete-fail', '') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="alert alert-primary d-flex justify-content-between align-items-center">
                <strong class="my-1">Student table</strong>
                <form action="{{ route('student.search') }}" method="get">
                    @csrf
                    <input type="text" name="keyword" class="form-control form-control-sm m-0" placeholder="Search Student">
                </form>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birth</th>
                            <th scope="col">Class</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr>
                                <th>{{ $student->student_id }}</th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->birth }}</td>
                                <td>{{ $student->class }}</td>
                                <td>{{ $student->address }}</td>
                                <td class="">
                                    <a href="{{ route('student') }}/edit/{{ $student->id }}/{{ $student->student_id }}" class="mr-1 fas fa-edit"></a>
                                    <a href="{{ route('student') }}/delete/{{ $student->id }}/{{ $student->student_id }}" onclick="return confirm('Are you sure want to delete this record')" class="ml-1 fas fa-trash"></a>
                                </td>
                            </tr>
                        @empty
                            <td class="col"><b>Student is empty</b></td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $students->links() }}
        </div>
        <div class="col-md">
            <div class="alert alert-primary py-3">
                <strong class="">Add new Student</strong>
            </div>
            <div class="card p-2">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="student_id" id="student_id" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" placeholder="Student ID (leave this empty for default value)" value="{{ old('student_id') }}">

                        @if($errors->has('student_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('student_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Student Name" value="{{ old('name') }}">

                        @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Student Address" value="{{ old('address') }}">

                        @if($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" onfocus="(this.type='date')" name="birth" id="birth" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" placeholder="Student Birth" value="{{ old('birth') }}">

                        @if($errors->has('birth'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('birth') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <select class="custom-select{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class" id="class" aria-label="Default select example">
                            <option selected disabled>Student Class</option>
                            <option value="10" {{ old('class') == 10 ? 'selected' : '' }}>10</option>
                            <option value="11" {{ old('class') == 11 ? 'selected' : '' }}>11</option>
                            <option value="12" {{ old('class') == 12 ? 'selected' : '' }}>12</option>
                        </select>

                        @if($errors->has('class'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
