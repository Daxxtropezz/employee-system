@extends('layout.access')

@section('content')
    <form action="/registerInsert" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="register-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            <div class="h1">Credentials</div>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="register-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            <div class="h1"><b>User</b>Info</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fa-solid fa-cake-candles"></span>
                                    </div>
                                </div>
                                <input type="date" class="form-control" placeholder="Birthdate">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                                <input type="text" maxlength="10" name="contact"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control"
                                    placeholder="Contact">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa-solid fa-venus-mars"></i>
                                    </div>
                                </div>
                                <select name="sex" class="form-control" id="sex">
                                    <option selected disabled>Select your Sex</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            {{-- <a href="/registerDetails" style="color: #FFFFFF; text-decoration: none;" data-bs-toggle="modal"
                                data-bs-target="#staticModal2" class="btn btn-primary d-flex justify-content-center"><i
                                    class="fa-solid fa-book-open-reader"></i> Open Sign-In
                                Credentials</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Centering the Register button between both boxes -->
        <div class="d-flex justify-content-center my-4">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        {{-- <center> --}}
        <a href="/login" class="text-center d-flex justify-content-center">I already have an account</a>
        {{-- </center> --}}
    </form>
    <!-- /.register-box -->
@endsection
