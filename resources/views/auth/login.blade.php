<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('bootstrap') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('icons') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('icons') }}/css/all.css">

    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body class="antialiased">




    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>



                            </div>

                            <div class="card-body">
                                @if (Session::has('msg'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('msg') }}
                                    </div>
                                @endif
                                <form method="POST" action="/login" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <div class="input-group">
                                            <input id="Username" type="text" class="form-control" name="username"
                                                tabindex="1" required autofocus>
                                            <div class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cursor-pointer"
                                                        style="cursor: pointer" id="basic-addon1"><i
                                                            class="fa fa-user"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in your username
                                        </div>
                                        @error('username')
                                            <div class="invalid">
                                                {$message}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control" name="password"
                                                tabindex="2" required>
                                            <div onclick="showHidePass(this)" class="input-group-prepend">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text cursor-pointer"
                                                        style="cursor: pointer" id="basic-addon1"><i
                                                            class="fa fa-eye"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('popper') }}/poper.js"></script>
    <script src="{{ asset('nisecroll') }}/nise.min.js"></script>
    <script src="{{ asset('template') }}/assets/js/stisla.js"></script>





    <!-- JS Libraies -->
    <script src="{{ asset('select2') }}/dist/js/select2.min.js"></script>
    <script src="{{ asset('chart') }}/Chart.bundle.min.js"></script>
    <script src="{{ asset('chart') }}/Chart.extension.js"></script>
    <script src="{{ asset('bootstrap') }}/js/bootstrap.min.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('template') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('template') }}/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('template') }}/assets/js/page/index.js"></script>

    <script>
        function showHidePass(el) {
            let icon = el.querySelector('i')
            if (icon.classList.contains('fa-eye')) {
                $('input[name=password]').attr('type', 'text').focus()
                let icon = el.querySelector('i').classList.replace('fa-eye', 'fa-eye-slash')
            } else {
                $('input[name=password]').attr('type', 'password').focus()

                let icon = el.querySelector('i').classList.replace('fa-eye-slash', 'fa-eye')

            }
        }
    </script>



</body>

</html>
