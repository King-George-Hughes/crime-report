<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Crime Report - Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<style>
    html,
    body {
        min-height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        min-width: 100%;
        padding: 15px;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    /* ///////////////////////////// */
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100%;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
</style>

<body>
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <a href="/"><img class="mb-4" src="{{ asset('assets/images/logo/gps_logo_blue.png') }}" alt="" width="200px"></a>
            <h1 class="h3 mb-3 fw-normal text-center">Sign Up Here</h1>

            <div>
                <div class="bd-example-snippet bd-code-snippet">
                    <div class="bd-example">
                        <form action="/users" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="first_name" id="floatingInput" placeholder="george" value="{{ old('first_name') }}">
                                    <label for="floatingInput">First Name</label>
                                </div>
                                @error('first_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="last_name" id="floatingInput" placeholder="hughes" value="{{ old('last_name') }}">
                                    <label for="floatingInput">Last Name</label>
                                </div>
                                @error('last_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="other_name" id="floatingInput" placeholder="clement" value="{{ old('other_name') }}">
                                    <label for="floatingInput">Other Names <span
                                            class="text-warning small">(optional)</span></label>
                                </div>
                                @error('other_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="gender" id="floatingSelect">
                                        <option selected value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="floatingSelect">Gender</label>
                                </div>
                                @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" name="dob" id="floatingInput" value="{{ old('dob') }}">
                                    <label for="floatingInput">Date of Birth</label>
                                </div>
                                @error('dob')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="contact" id="floatingInput" placeholder="contact" value="{{ old('contact') }}">
                                    <label for="floatingInput">Contact <span class="text-warning small">(eg.
                                            0573849441)</span></label>
                                </div>
                                @error('contact')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <input type="text" name="role" value="1" hidden> --}}
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="email" id="floatingInput"
                                        placeholder="me@example.com" value="{{ old('email') }}">
                                    <label for="floatingInput">Email</label>
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="password" id="floatingInput"
                                        placeholder="Password" value="{{ old('password') }}">
                                    <label for="floatingPassword">Password</label>
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password_confirmation" id="floatingPassword"
                                        placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                    <label for="floatingPassword">Confrim Password</label>
                                </div>
                                @error('password_confrimation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <button class="w-100 btn btn-lg btn-secondary" type="submit">Sign Up</button>
                                <p class="mt-5 mb-3 text-muted text-center">Already having an account, <a
                                        class="text-primary" href="/login">Login here</a></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script src="{{ asset('assets/js/all.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>