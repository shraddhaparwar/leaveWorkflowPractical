<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$title}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  
  <link href="{{ asset('sweetalert/sweetalert.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var BASE_URL = "{{ url('/')}}";
  </script>
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container-fluid">
      <ul class="navbar-nav">
        @if(!auth('teamlead')->user() && !auth('hr')->user() && !auth('emp')->user() )
          <li class="nav-item">
            <a class="nav-link active" href="{{url('employee/signin')}}">Employee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('hr/signin')}}">Hr</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('team-lead/signin')}}">Team Lead</a>
          </li>
        @elseif(auth('teamlead')->user())
          <li class="nav-item">
            <a class="nav-link" href="{{url('team-lead/logout')}}">Logout</a>
          </li>
        @elseif(auth('emp')->user())
          <li class="nav-item">
            <a class="nav-link" href="{{url('employee/logout')}}">Logout</a>
          </li>
        @elseif(auth('hr')->user())
          <li class="nav-item">
            <a class="nav-link" href="{{url('hr/logout')}}">Logout</a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="container mt-3">
          <h2>{{$title}}</h2>

        </div>