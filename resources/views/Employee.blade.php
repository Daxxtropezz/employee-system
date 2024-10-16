<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/843de94b3e.js" crossorigin="anonymous"></script>
    <title>CRUD Table</title>
</head>

<body class="mr-4">
    {{-- Modal --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <h1 class="text-center mb-4">Employee</h1>

    <div class="container">
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><a
                href="/add" style="color: #FFFFFF; text-decoration: none;"><i class="fa-solid fa-user"></i> New
                Employee </a></button>
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Fullname</th>
                        <th>Birthdate</th>
                        <th>Age</th>
                        <th>Contact</th>
                        <th>Date/Time Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        use Carbon\Carbon;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <th>{{ $row->id }}</th>
                            <td>{{ $row->first_name . ' ' . $row->last_name }}</td>
                            <td>{{ date('M d, Y', strtotime($row->birthdate)) }}</td>
                            <td>{{ Carbon::parse($row->birthdate)->age }}</td>
                            <td>{{ $row->contact }}</td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="/edit/{{ $row->id }}" class="btn btn-success">Edit</a>
                                <button type="button" class="btn btn-danger">Disable</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>
