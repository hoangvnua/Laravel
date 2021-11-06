<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/auth/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/auth/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/auth/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/auth/css/style.css">

    <title>HONO - @yield('title')</title>
    <style>
        h1 {
            font-weight: normal;
            font-size: 5rem;
            color: #6c63ff;
        }

        strong {
            font-weight: normal;
            font-size: 24px;
            line-height: 28px;
        }

    </style>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-top: 30px">
                    {{-- <img src="auth/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid"> --}}
                    <h1>Hono</h1>
                    <strong>Hono shop giúp căn nhà của bạn trở nên đẹp hơn, tạo cảm hứng và thư giãn.</strong>
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/auth/js/jquery-3.3.1.min.js"></script>
    <script src="/auth/js/popper.min.js"></script>
    <script src="/auth/js/bootstrap.min.js"></script>
    <script src="/auth/js/main.js"></script>
</body>

</html>
