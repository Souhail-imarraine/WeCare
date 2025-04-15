<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header-welcome')
</head>
<body class="bg-white">
    @include('partials.navbar-welcome')

    <main>
        @yield('content')
    </main>

    @include('partials.footer-welcome')
</body>
</html>
