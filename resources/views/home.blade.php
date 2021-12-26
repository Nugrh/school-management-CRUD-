@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center" style="height: 300px">
        <div class="col-8">
            <div class="alert alert-primary">Welcome!</div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body text-black-50">
                            <h5 class=""><i class="fas fa-users"></i> Student total {{ $students->count() }}</h5>
                            <a href="{{ route('student') }}" class="btn btn-primary mt-3">Student</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body text-black-50">
                            <h5 class=""><i class="fas fa-users"></i> Teacher total {{ $teacher->count() }}</h5>
                            <a href="{{ route('teacher') }}" class="btn btn-primary mt-3">Student</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
