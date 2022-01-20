@extends('layouts.app')
@section('content')
    <div class="container-fluid ">
        <div class="row d-flex justify-content-center" style="height: 85vh">
            <div class="col-md-6 align-self-center">
                <div class="alert alert-primary">
                    Edit Student
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('student.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $student->id }}">
                            <div class="mb-3">
                                <input type="text" name="student_id" id="student_id" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" placeholder="Student ID" value="{{ $student->student_id }}">

                                @if($errors->has('student_id'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('student_id') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Student Name" value="{{ $student->name }}">

                                @if($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="text" name="address" id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Student Address" value="{{ $student->address }}">

                                @if($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <input type="text" onfocus="(this.type='date')" name="birth" id="birth" class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" placeholder="Student Birth" value="{{ $student->birth }}">

                                @if($errors->has('birth'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birth') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <select class="custom-select{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class" id="class" aria-label="Default select example">
                                    <option selected disabled>Student Class</option>
                                    <option value="10" {{ $student->class == 10 ? 'selected' : '' }}>10</option>
                                    <option value="11" {{ $student->class == 11 ? 'selected' : '' }}>11</option>
                                    <option value="12" {{ $student->class == 12 ? 'selected' : '' }}>12</option>
                                </select>

                                @if($errors->has('class'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('class') }}</strong>
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
    </div>

@endsection
