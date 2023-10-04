@include('layout.header')
    @yield('content')

    <form role="form" action="{{url('hr/post-login')}}" method="post" id="hrSigninForm">
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
          <a href="{{url('hr/signup')}}">Signup here</a>
          
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>


 
  


@include('layout.footer')
