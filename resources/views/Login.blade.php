<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD</title>
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="custom/login.styling.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="/login" method="POST" class="sign-in-form">
                    @csrf
                    <h2 class="title">Login</h2>
                    @if ($errors->any())
                        <script>
                            @foreach ($errors->all() as $error)
                                let errorMessages += '<p>{{ $error }}</p>';
                            @endforeach

                            if (errorMessages) {
                                toastr.error(errorMessages);
                                document.body.classList.add('has-errors');
                                setTimeout(function() {
                                    document.body.classList.remove('has-errors');
                                }, 3000);
                            }
                        </script>
                    @endif
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" autocomplete="username" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" autocomplete="current-password" placeholder="Password"
                            id="id_password">
                        <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                    </div>
                    <input type="submit" value="Sign in" class="btn solid">

                    {{-- <div class="social-media">
                        <a class="icon-mode" onclick="toggleTheme('dark');"><i class="fas fa-moon"></i></a>
                        <a class="icon-mode" onclick="toggleTheme('light');"><i class="fas fa-sun"></i></a>
                    </div>
                    <p class="text-mode">Change theme</p> --}}
                </form>
                <form action="/register" method="POST" class="sign-up-form">
                    @csrf
                    <h2 class="title">Register</h2>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <script>
                                toastr.error('<p>{{ $error }}</p>')
                                document.body.classList.add('has-errors');
                                setTimeout(function() {
                                    document.body.classList.remove('has-errors');
                                }, 3000);
                            </script>
                        @endforeach
                    @endif
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Username">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="form-control" id="id_rpassword" name="password"
                            placeholder="Password">
                        <i class="far fa-eye" id="toggleRPassword" style="cursor: pointer;"></i>
                    </div>
                    <h2 class="title"><b>User</b> Info</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-cake-candles"></i>
                        <input type="date" class="form-control" name="birthdate" id="birthdate">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" maxlength="10" name="contact"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control"
                            placeholder="9123456789">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-venus-mars"></i>
                        <select name="sex" id="sex">
                            <option selected disabled>Select your Sex</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    {{-- <a href="/registerDetails" style="color: #FFFFFF; text-decoration: none;" data-bs-toggle="modal"
                                data-bs-target="#staticModal2" class="btn btn-primary d-flex justify-content-center"><i
                                    class="fa-solid fa-book-open-reader"></i> Open Sign-In
                                Credentials</a>  --}}
                    <label class="check">
                        <input type="checkbox" checked="checked" name="checkbox">
                        <span class="checkmark">I accept the <a href="#">Terms and Conditions</a>.</span>
                    </label>
                    <input type="submit" value="Create account" class="btn solid">

                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>You don't have an account?</h3>
                    <p></p>
                    <button class="btn transparent" id="sign-up-btn">Register Here!</button>
                </div>
                {{-- <img src="img/log.svg" class="image" alt=""> --}}
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>Already have an account?</h3>
                    <p></p>
                    <button class="btn transparent" id="sign-in-btn">Login Here!</button>
                </div>
                {{-- <img src="img/register.svg" class="image" alt=""> --}}
            </div>
        </div>
        {{-- toastr() - > success('Data has been saved successfully!'); --}}
    </div>

    <script src="custom/login.function.js"></script>
</body>
