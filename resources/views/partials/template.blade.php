<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body>

    <!--Navbar-->
    @include('partials.navbar')
    <!--Navbar-->

    <!--Contents-->
    @yield('content')
    <!--Contents-->

    <!--Script-->

    @include('partials.script')

    <!--End Script-->
</body>
</html>
