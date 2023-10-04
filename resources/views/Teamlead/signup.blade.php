@include('layout.header')
    @yield('content')
    <form role="form" action="{{url('team-lead/post-signup')}}" method="post" id="tlSignupForm">
      @csrf
      <div class="mb-3 mt-3">
        <label for="email">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>

      <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>

      <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"  type="text/javascript"></script>
  <script src="{{asset('js/form_validation.js')}}"  type="text/javascript"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('layout.footer')
