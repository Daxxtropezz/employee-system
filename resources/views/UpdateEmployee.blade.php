<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD Table</title>
</head>

<body class="mr-4">

    <h1 class="text-center mb-4">Update Employee</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name"
                                    value="{{ $data->first_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    value="{{ $data->last_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" maxlength="10" name="contact"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control"
                                        id="contact" placeholder="9123456789" value="{{ $data->contact }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" name="birthdate" class="form-control" id="birthdate"
                                    value="{{ $data->birthdate }}">
                            </div>
                            <select name="sex" class="form-select" id="sex">
                                <option selected disabled>{{ $data->sex }}</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
