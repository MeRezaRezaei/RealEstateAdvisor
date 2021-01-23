<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Panel</title>
    <!--<loading bootstrap from cdn>-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--</loading bootstrap from cdn>-->
    <!--<loading font-awesome from cdn>-->
    <script src="https://kit.fontawesome.com/33d42cfb1e.js" crossorigin="anonymous"></script>
    <!--</loading font-awesome from cdn>-->
{{-- loading more cdn libs if needed   --}}
    @yield('CDNLib')
    {{--    styles--}}
    {{--    More Styles If Needed--}}
    @yield('style')
{{--    <MainStyle>--}}
    <style>
        .FullWidth {
            border: 0;
            padding: 0;
            margin: 0;
            width: 100%;
        }
    </style>
{{--    </MainStyle>--}}
</head>
<body>
@yield('body')
</body>
</html>
{{--</scripts>--}}
{{--More Scripts If Needed--}}
@yield('script')
