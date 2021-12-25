@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-primary">
                Edit Teacher
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('teacher.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{ $teacher->id }}">
                        <div class="mb-3">
                            <input type="text" name="teacher_id" id="teacher_id" class="form-control{{ $errors->has('teacher_id') ? ' is-invalid' : '' }}" placeholder="Teacher ID" value="{{ $teacher->teacher_id }}">

                            @if($errors->has('teacher_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('teacher_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Teacher Name" value="{{ $teacher->name }}">

                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Teacher Address" value="{{ $teacher->address }}">

                            @if($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" onfocus="(this.type='date')" name="birth" id="birth" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" placeholder="Teacher Birth" value="{{ $teacher->birth }}">

                            @if($errors->has('birth'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birth') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Teacher Email" value="{{ $teacher->email }}">

                        @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class=" col">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
