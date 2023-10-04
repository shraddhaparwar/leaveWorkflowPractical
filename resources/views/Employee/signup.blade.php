@include('layout.header')
    @yield('content')
    <form role="form" action="{{url('employee/post-signup')}}" method="" id="empSignupForm">
      @csrf
      <div class="mb-3">
        <label for="email">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
      </div>

      <div class="mb-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>

      <div class="mb-3">
        <label for="email">Team Lead:</label>
        <div class="mb-3">
        <select class="form-select" aria-label="Default select example" id="teamlead" name="teamlead" required>
          <option value="">Select team lead</option>
          @if($teamlead)
            @foreach($teamlead as $tl)
              <option value="{{$tl->id}}">{{$tl->name}}</option>
            @endforeach
          @endif
        </select>
      </div>
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('layout.footer')
