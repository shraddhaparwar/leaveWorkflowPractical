@include('layout.header')
    @yield('content')

    <form role="form" action="{{url('employee/post-login')}}" method="" id="empSigninForm">
      @csrf
      <div class="mb-3 mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>

      <div class="mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      </div>
      <div class="form-check mb-3">
        <label class="form-check-label">
          <a href="{{url('employee/signup')}}">Signup here</a>
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="{{asset('js/jquery.validate.min.js')}}"  type="text/javascript"></script>
  <script src="{{asset('js/form_validation.js')}}"  type="text/javascript"></script>

@include('layout.footer')
