<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
            
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('all_students')}}">All Students</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('take_attendance')}}">Attendance</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Take Attendance</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between"><b>Number Of Students:</b> {{ count($students) }}</li>
                                                <li class="list-group-item d-flex justify-content-between"><b>Teacher:</b> Mr. Tester</li>
                                                <li class="list-group-item d-flex justify-content-between"><b>Access:</b> Admin</li>
                                            </ul>
                                        </div>
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between"><b>Month:</b> {{ now()->setMonth(now()->month)->format('F') }}</li>
                                                <li class="list-group-item d-flex justify-content-between"><b>Year:</b> {{ now()->year }}</li>
                                                <li class="list-group-item d-flex justify-content-between"><b>days in Month:</b> {{ now()->daysInMonth }}</li>
                                                <li class="list-group-item d-flex justify-content-between"><b>Weekend This Month:</b> {{$weeklyHoliday}}</li>
                                                <li class="list-group-item d-flex justify-content-between"><b>Today's:</b> {{ date('d-m-Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <form action="{{ route('give_attendance') }}" method="POST">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="table table-success table-striped table-hover table-bordered border-info">
                                                <thead>
                                                    <th style="width: 85px">Students</th>
                                                    <th style="width: 85px">ID/Days</th>
                                                    @for($i = 0; $i < count($attendanceDates); $i++)
                                                        <th style="width: 5px">{{ $i+1 }}-{{ \App\Student_attendance::setDay($attendanceDates[$i]) }}</th>
                                                    @endfor
                                                </thead>
                                                <tbody>
                                                    @foreach($students as $student)
                                                        <tr>
                                                            <td>{{ $student->name }}</td>
                                                            <td>{{$student->id}}</td>
                                                            <input type="hidden" name="student_date" value="{{ date('Y-m-d') }}">
                                                            @for($j = 1; $j <= count($attendanceDates); $j++)
                                                                <td style="width: 5px">
                                                                    <input
                                                                        type="checkbox"
                                                                        name="student_ids[]" @if(count($attendanceDates) + count($checkAttendance) > $j + $weeklyHoliday){{"disabled"}} @endif
                                                                        value="{{ $student->id }}"
                                                                    >
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success float-end"><i class="fas fa-power-off"></i> Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    </body>
</html>
