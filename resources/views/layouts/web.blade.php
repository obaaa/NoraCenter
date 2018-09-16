<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  @include('layouts.asset')
</head>


<body>

  @include('layouts.header')

  @yield('content')

  <br>

  @include('layouts.footer')

  <script  src="{{ asset("website/js/index.js") }}"></script>

</body>

</html>
