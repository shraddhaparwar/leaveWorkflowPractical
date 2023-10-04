@include('layout.header')
    @yield('content')
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<!-- <div class="container"> -->

  <div class="box-header">
    <a class="btn btn-info btn-sm float-right m-1" href="{{url('employee/add-leave')}}">Add Leave</a>
  </div>

    <div class="col-12 table-responsive">
    <input type="hidden" name="table_name" id="table_name" value="casts">
    <input type="hidden" name="data_table_name" id="data_table_name" value="leavesList">
    <table class="table table-bordered data-table" id="leavesList" >         
        <thead>
          <tr>
            <th>#</th>
            <th>LeaveID</th>
            <th>Name</th>
            <th>Start From</th>
            <th>End Date</th>
            <th>No.Days</th>
            <th>Reason</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
<!-- </div> -->

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js" defer="defer"></script>
<script>

  $(document).ready(function() {
    $('#leavesList').DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": true, 
      processing: true,
      serverSide: true,
      language: {
        searchPlaceholder: "Search"
      },
      ajax: "{{ url('employee/leaves') }}",
      "bFilter":true,
      columns:[
        // { data: 'id', name: 'id', orderable: true, 'visible': false},
        { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false,searchable: false, 'visible': true},
        { data: 'leaveId', name: 'leaveId', orderable: true, searchable: true,'visible': true},
        { data: 'name', name: 'users.name', orderable: true, searchable: true,'visible': true},
        { data: 'start_date', name: 'start_date', orderable: true, searchable: true,'visible': true},
        { data: 'end_date', name: 'end_date', orderable: true, searchable: true,'visible': true},
        { data: 'no_days', name: 'no_days', orderable: true, searchable: true,'visible': true},
        { data: 'reason', name: 'reason', orderable: true, searchable: true,'visible': true},
        { data: 'status', name: 'status', 'visible': true, orderable: true, searchable: true},
        // {data: 'action', name: 'action'},
      ],
                
    });
  });

</script>
@include('layout.footer')