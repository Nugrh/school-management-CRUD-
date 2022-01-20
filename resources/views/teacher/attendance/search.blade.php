@extends('layouts.app')
@section('content')
    <div class="row justify-content-center align-items-center" style="height: 360px">
        <div class="col-6">
            <div class="alert alert-primary">
                <strong>Select Lesson and Class to enter Attendance</strong>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('attendance.search') }}" method="get">
                        <div class="mb-3">
                            <select class="custom-select{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class" id="class" aria-label="Default select example">
                                <option selected disabled>Select Classroom</option>
                                @forelse($classes as $class)
                                <option value="{{ $class->class }}">{{ $class->class }}</option>
                                @empty
                                @endforelse
                            </select>

                            @if($errors->has('class'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class') }}</strong>
                            </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
