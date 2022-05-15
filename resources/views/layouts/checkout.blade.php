<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Nomads Travel - {{ $title }}</title>

   @include('includes.style')
   @stack('addons-css')

</head>

<body>
    
    @include('includes.nav_checkout')

    @yield('content-checkout')

    @include('includes.footer')

   @include('includes.script')
   @stack('addons-script')
    
</body>

</html>
