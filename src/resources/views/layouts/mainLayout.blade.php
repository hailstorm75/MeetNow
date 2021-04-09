<!DOCTYPE html>

<html lang="en">
<head>
    <title>MeetNow - @yield('title')</title>
</head>
<body>
@include('layouts.nav')

<div class="container">
    @yield('content')
</div>

@include('layouts.footer')
</body>
</html>
