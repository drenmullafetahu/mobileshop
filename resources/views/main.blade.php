<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
    <meta name="author" content="http://www.365bootstrap.com">

    <title>Mobile Shop</title>
     @include('layout.styles_and_scripts')
</head>

<body>
@include('layout.header')
<div id="page-content" class="home-page">
    <div class="container">
        @yield('content')
    </div>
</div>
@include('layout.footer')
</body>
</html>
