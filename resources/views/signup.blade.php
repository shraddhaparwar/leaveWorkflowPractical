<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>


  <div class="container mt-3">
    <h2>{{$title}}</h2>
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>
    <form role="form" action="{{url('post-signup')}}" method="" id="signupForm">

      <div class="mb-3 mt-3">
        <label for="email">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>

      <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>

      <div class="mb-3 mt-3">
        <label for="email">Role:</label>
        <select class="form-select form-select-lg" id="myselection" name="role" >
          <option value="emp">Employee</option>
          <option value="hr">Hr</option>
          <option value="tl">Team Lead</option>
        </select>
      </div>

      <div class="mb-3 mt-3" id="teamLead">
        <label for="email">Team Lead:</label>
        <input type="text" class="form-control" id="tl" placeholder="Enter teamlead" name="teamlead">
      </div>

      <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
      <!-- <div class="form-check mb-3">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div> -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"  type="text/javascript"></script>
  <script src="{{asset('js/form_validation.js')}}"  type="text/javascript"></script>


  <script>
    $(document).ready(function(){
      //$("#teamLead").hide();
      $('#myselection').on('change', function(){
        var role = $(this).val();
        if(role === 'emp'){
          $("#teamLead").show();
        }else{
          $("#teamLead").hide();
        }
      });
    });
  </script>
</body>
</html>
