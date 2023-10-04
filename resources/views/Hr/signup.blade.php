@include('layout.header')
    @yield('content')
    <form role="form" action="{{url('hr/post-signup')}}" method="post" id="hrSignupForm">
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

 
@include('layout.footer')
