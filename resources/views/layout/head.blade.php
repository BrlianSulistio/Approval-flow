<title>SIAP</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<!-- <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css"> -->
<link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">

<!-- MAIN CSS -->
<!-- <link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css"> -->
<link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('assets/css/color_skins.css') }}" rel="stylesheet" type="text/css">

@stack('css')