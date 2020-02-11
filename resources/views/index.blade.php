<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Блог</title>
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
            <a class="navbar-brand" href="/">Блог</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Головна
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        <router-view></router-view>
        <footer class="py-5 bg-dark">
            <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
