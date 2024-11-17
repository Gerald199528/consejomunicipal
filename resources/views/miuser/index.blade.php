@extends('layouts.app')
@section('title')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM6zG1H6M5U3b0L5G5xH9V5D1H5L5G5xH5L5G5" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     @include('miuser.form.form')
    @include('miuser.alertas.sweetalert')   
   
  
    
     @endsection