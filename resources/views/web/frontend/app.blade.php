<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/logo.svg') }}" type="image/x-icon" />
    <title>@yield('title')</title>
    @include('web.frontend.partials.styles')
</head>

<body>

    <!-- header -->
    @include('web.frontend.partials.header')

    <!-- body -->
    @yield('content')

    <!-- footer -->
    @include('web.frontend.partials.footer')

    @include('web.frontend.partials.scripts')

</body>

</html>
