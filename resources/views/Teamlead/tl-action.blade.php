@if($user_id == auth('teamlead')->user()->id)
    @if($status == '0')
        <label>Pending</label>
    @elseif($status == '1')
        <label>Approved</label>
    @elseif($status == '2')
        <label>Rejected</label>
    @endif
@else
    @if($status == '0')
    <select class="" name="changeStatus" data-id="{{ $id }}" data-userid="{{ $user_id }}"  onchange="changeStatus(this);">
        <option value="">Select status</option>
        <option value="3">Confirm</option>
        <option value="2">Reject</option>        
    </select>
    @elseif($status == '1')
        <label>Approved</label>
    @elseif($status == '2')
        <label>Rejected</label>
    @elseif($status == '3')
        <label>Confirmed</label>
    @endif
@endif