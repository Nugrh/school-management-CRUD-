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
                <strong class="my-1">Teacher table</strong>
                <form action="{{ route('teacher.search') }}" method="get">
                    @csrf
                    <input type="text" name="keyword" class="form-control form-control-sm m-0" placeholder="Search Teacher">
                </form>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Lesson</th>
                            <th scope="col">Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($teachers as $teacher)
                            <tr>
                                <th>{{ $teacher->teacher_id }}</th>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ $teacher->lesson }}</td>
                                <td class="">
                                    <a href="{{ route('teacher') }}/edit/{{ $teacher->id }}/{{ $teacher->teacher_id }}" class="mr-1 fas fa-edit"></a>
                                    <a href="{{ route('teacher') }}/delete/{{ $teacher->id }}/{{ $teacher->teacher_id }}" onclick="return confirm('Are you sure want to delete this record')" class="ml-1 fas fa-trash"></a>
                                </td>
                            </tr>
                        @empty
                            <td class="col" colspan="6"><b>Teacher is empty</b></td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $teachers->links() }}
        </div>
        <div class="col-md">
            <div class="alert alert-primary py-3">
                <strong class="">Add new Teacher</strong>
            </div>
            <div class="card p-2">
                <form action="{{ route('teacher.store') }}" method="post" id="store">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="teacher_id" id="teacher_id" class="form-control{{ $errors->has('teacher_id') ? ' is-invalid' : '' }}" placeholder="Teacher ID (leave this empty for default value)" value="{{ old('teacher_id') }}">

                        @if($errors->has('teacher_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('teacher_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Teacher Name" value="{{ old('name') }}">

                        @if($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Teacher Email" value="{{ old('email') }}">

                        @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Teacher Address" value="{{ old('address') }}">

                        @if($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="text" onfocus="(this.type='date')" name="birth" id="birth" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" placeholder="Teacher Birth" value="{{ old('birth') }}">

                        @if($errors->has('birth'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('birth') }}</strong>
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
