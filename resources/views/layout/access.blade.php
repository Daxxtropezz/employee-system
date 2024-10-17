<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ 'template/plugins/fontawesome-free/css/all.min.css' }}"> --}}
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ 'template/plugins/icheck-bootstrap/icheck-bootstrap.min.css' }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ 'template/dist/css/adminlte.min.css' }} ">
    <!-- Include Bootstrap CSS and JS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</head>

<body class="hold-transition dark-mode login-page register-page">

    @yield('content')

    <script src="https://kit.fontawesome.com/843de94b3e.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="{{ 'template/plugins/jquery/jquery.min.js' }} "></script>
    <!-- Bootstrap 4 -->
    <script src="{{ 'template/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ 'template/dist/js/adminlte.min.js' }}"></script>
</body>

</html>
