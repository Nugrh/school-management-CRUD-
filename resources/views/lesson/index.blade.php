@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <div class="alert alert-primary">10 Grade</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Time</th>
                            <th scope="col">Monday</th>
                            <th scope="col">Tuesday</th>
                            <th scope="col">Wednesday</th>
                            <th scope="col">Thursday</th>
                            <th scope="col">Friday</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>09:00</th>
                            <td>{{ $lessons[0]->lesson }}</td>
                            <td>{{ $lessons[1]->lesson }}</td>
                            <td>{{ $lessons[2]->lesson }}</td>
                            <td>{{ $lessons[3]->lesson }}</td>
                            <td>{{ $lessons[4]->lesson }}</td>
                        </tr>
                        <tr>
                            <th>11:00</th>
                            <td>{{ $lessons[5]->lesson }}</td>
                            <td>{{ $lessons[6]->lesson }}</td>
                            <td>{{ $lessons[7]->lesson }}</td>
                            <td>{{ $lessons[8]->lesson }}</td>
                            <td>No lesson</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="alert alert-primary">11 Grade</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Time</th>
                            <th scope="col">Monday</th>
                            <th scope="col">Tuesday</th>
                            <th scope="col">Wednesday</th>
                            <th scope="col">Thursday</th>
                            <th scope="col">Friday</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>09:00</th>
                            <td>{{ $lessons[2]->lesson }}</td>
                            <td>{{ $lessons[3]->lesson }}</td>
                            <td>{{ $lessons[4]->lesson }}</td>
                            <td>{{ $lessons[5]->lesson }}</td>
                            <td>{{ $lessons[6]->lesson }}</td>
                        </tr>
                        <tr>
                            <th>11:00</th>
                            <td>{{ $lessons[7]->lesson }}</td>
                            <td>{{ $lessons[8]->lesson }}</td>
                            <td>{{ $lessons[0]->lesson }}</td>
                            <td>{{ $lessons[1]->lesson }}</td>
                            <td>No lesson</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="alert alert-primary">12 Grade</div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Time</th>
                            <th scope="col">Monday</th>
                            <th scope="col">Tuesday</th>
                            <th scope="col">Wednesday</th>
                            <th scope="col">Thursday</th>
                            <th scope="col">Friday</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>09:00</th>
                            <td>{{ $lessons[4]->lesson }}</td>
                            <td>{{ $lessons[5]->lesson }}</td>
                            <td>{{ $lessons[6]->lesson }}</td>
                            <td>{{ $lessons[7]->lesson }}</td>
                            <td>{{ $lessons[8]->lesson }}</td>
                        </tr>
                        <tr>
                            <th>11:00</th>
                            <td>{{ $lessons[0]->lesson }}</td>
                            <td>{{ $lessons[1]->lesson }}</td>
                            <td>{{ $lessons[2]->lesson }}</td>
                            <td>{{ $lessons[3]->lesson }}</td>
                            <td>No lesson</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
