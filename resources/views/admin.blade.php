<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Блог - Admin</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-admin.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/local.css') }}" />

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>

</head>
<body>
    <div id="admin">
        <router-view></router-view>
    </div>
    <script src="{{ asset('js/admin.js')}}"></script>
</body>
</html>