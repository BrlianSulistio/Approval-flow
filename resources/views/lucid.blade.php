<!doctype html>
<html lang="en">

<head>
  @include('layout.head')
</head>

<body class="theme-blue">

  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="m-t-30"><img src="{{ URL::asset('assets/images/logo.png') }}" width="200" alt="Lucid"></div>
      <p>Please wait...</p>
    </div>
  </div>
  <!-- Overlay For Sidebars -->

  <div id="wrapper">

    @include('layout.header')

    @include('layout.sidebar')

    <div id="main-content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>

  </div>

  <!-- Javascript -->
  @include('layout.script')
</body>

</html>