<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','CONCEJO MUNICIPAL')</title>

  <!-- css APIS -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="{{ asset('menu/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('menu/dist/css/adminlte.min.css') }}" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <style>
    .main-header {
      background-color: #ffffff;
      color: rgb(231, 232, 240);
    }
    .main-sidebar {
      background-color: #0d3d6d;
    }
    .main-sidebar a {
      color: white;
    }
    .content-wrapper {
      padding: 20px;
    }
  </style>
<!-- Includes -->
  @include('home.nav')
  @include('home.sidebar')
  @include('home.main')

  <div class="container-fluid">   
    @yield('container')

</div>
</div>





<!-- REQUIRED SCRIPTS -->

{!! Html::script('menu/plugins/jquery/jquery.min.js') !!}
{!! Html::script('menu/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}
{!! Html::script('menu/dist/js/adminlte.min.js') !!}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
