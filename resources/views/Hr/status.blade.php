@if($status == '1')
    <a href="javascript:void(0)" onclick="changeStatus({{$user_id}},{{ $id }},'Approve',{{$status}})" id="" class="btn btn-info btn-sm"> Approve </a>
@elseif($status == '2')
    <a href="javascript:void(0)" class="btn btn-danger btn-sm" id="changeStatus-{{ $id }}-Reject">Reject</a>
@elseif($status == '3')
    <a href="javascript:void(0)" class="btn btn-success btn-sm" id="changeStatus-{{ $id }}-Confirmed">Confirmed</a>
@else
    <a href="javascript:void(0)" class="btn btn-warning btn-sm" id="changeStatus-{{ $id }}-Pending"> Pending</a>
@endif