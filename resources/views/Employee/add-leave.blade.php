@include('layout.header')
    @yield('content')
                <form action="{{url('employee/post-leave')}}" method="POST" id="empAddLeaveForm">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" value="{{auth('emp')->user()->name}}" readonly>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Reason</label>
                        <input type="textarea" class="form-control" id="reason" name="reason" value="">
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="exampleInputdate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" value="">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="exampleInputdate" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" value="">
                        </div>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @include('layout.footer')