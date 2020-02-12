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
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
