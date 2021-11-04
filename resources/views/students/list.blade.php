<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                    <h3 class="card-title">All Students</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-success table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Department</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $stu)
                                            <tr>
                                                <td>{{ $stu->id }}</td>
                                                <td>{{ $stu->name }}</td>
                                                <td>{{ $stu->email }}</td>
                                                <td>{{ $stu->phone }}</td>
                                                <td>{{ $stu->department }}</td>
                                                <td>
                                                    <a class="btn btn-info">Edit</a>
                                                    <a class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer mx-auto">
                                    {{$students->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    </body>
</html>
