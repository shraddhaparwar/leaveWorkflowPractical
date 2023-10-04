@if($status == '1')
    <a href="javascript:void(0)" id=""  class="btn btn-info btn-sm"> Approve </a>
@elseif($status == '2')
    <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="">Reject</a>
@elseif($status == '3')
    <a href="javascript:void(0)" class="btn btn-success btn-sm" id="">Confirmed</a>
@else
    <a href="javascript:void(0)" class="btn btn-warning btn-sm" id=""> Pending</a>

@endif