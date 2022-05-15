<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nomads Travel Website">
    <meta name="author" content="Yota Nehru">

    <title>Nomads Travel - {{ $title }}</title>
    @include('includes.auth.style')

</head>

<body class="bg-gradient-primary">

    <div class="container">

    @yield('content-auth')

    </div>

    @include('includes.auth.script')

</body>

</html>
