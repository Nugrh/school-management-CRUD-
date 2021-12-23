@extends('layouts.app')

@section('content')
    <form action="" method="" id="update-form"></form>
    <div class="row">
        <div class="col-8">
            <div class="alert alert-info d-flex justify-content-between align-items-center">
                <strong class="my-1">Teacher table</strong>
                <form action="">
                    <input type="text" class="form-control form-control-sm m-0" placeholder="Search Student">
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
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>

                        </thead>
                        <tbody>
                        @forelse($teachers as $teacher)
                            <tr>
                                <th>{{ $teacher->teacher_id }}</th>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->birth }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td class="">
                                    <a href="" class="mr-1"><i class="fas fa-edit"></i></a>
                                    <a href="" class="ml-1"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        @empty
                            <td class="col" colspan="6"><b>Teacher is empty</b></td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert alert-info py-3">
                <strong class="">Add new Teacher</strong>
            </div>
            <div class="card p-2">
                <form action="{{ route('teacher.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="teacher_id" id="teacher_id" class="form-control{{ $errors->has('teacher_id') ? ' is-invalid' : '' }}" placeholder="Teacher ID" value="{{ old('teacher_id') }}">

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
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
