<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Kha Shi Han Rental</title>
    <link rel="icon" href="/image/logo.png" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>

    @include('layout.css')

</head>

<body>

    <div class="fh5co-loader"></div>

    <div id="page">
        @include('layout.navbar')

        @yield('content')

        <footer id="fh5co-footer" role="contentinfo" style="background-color:#fae3c9">
            @include('layout.footer')
        </footer>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    @include('layout.script')

</body>

</html>
