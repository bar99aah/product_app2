<!doctype html>
<html lang="en">

<head>
  @include('layout.head')
</head>

<body>

  @include('layout.navbar')
  @yield('content')


  {{-- @yield('content2') --}}


  @include('layout.scripts')
</body>

</html>