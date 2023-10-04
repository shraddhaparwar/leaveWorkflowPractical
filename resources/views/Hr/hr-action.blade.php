@if($status == '3' || $status == '0')
<select class="" name="changeStatus" data-id="{{ $id }}" data-userid="{{ $user_id }}"  onchange="changeStatus(this);">
    <option value="">Select status</option>
    <option value="1">Approve</option>
    <option value="2">Reject</option>
    
</select>
@elseif($status == '1')
<label>Approved</label>
@elseif($status == '2')
<label>Rejected</label>
@endif