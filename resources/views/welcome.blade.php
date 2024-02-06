<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Логин</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Логин</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('loginStore') }}" class="needs-validation"
                                    novalidate="">
                                    <div class="form-group">
                                        @csrf
                                        <label for="text">Логин</label>
                                        <input id="text" type="text" class="form-control" name="login"
                                            value="{{ old('login') }}" tabindex="1"autofocus>
                                        @error('login')
                                            <li style="color:red">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Пароль</label>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            value="{{ old('password') }}" tabindex="2">
                                        @error('password')
                                            <li style="color:red">{{ $message }}</li>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary btn-lg btn-block" tabindex="4" type="submit"
                                            value="Login">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

</html>
