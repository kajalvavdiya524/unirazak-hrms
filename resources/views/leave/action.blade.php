<div class="card bg-none card-box">
    {{Form::open(array('url'=>'leave/changeaction','method'=>'post'))}}
    <div class="row">
        <div class="col-12">
            <table class="table table-striped mb-0 dataTable no-footer">
                <tr role="row">
                    <th>{{__('Employee')}}</th>
                    <td>{{ !empty($employee->name)?$employee->name:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Leave Type ')}}</th>
                    <td>{{ !empty($leavetype->title)?$leavetype->title:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Appplied On')}}</th>
                    <td>{{\Auth::user()->dateFormat( $leave->applied_on) }}</td>
                </tr>
                <tr>
                    <th>{{__('Start Date')}}</th>
                    <td>{{ \Auth::user()->dateFormat($leave->start_date) }}</td>
                </tr>
                <tr>
                    <th>{{__('End Date')}}</th>
                    <td>{{ \Auth::user()->dateFormat($leave->end_date) }}</td>
                </tr>
                <tr>
                    <th>{{__('Leave Reason')}}</th>
                    <td>{{ !empty($leave->leave_reason)?$leave->leave_reason:'' }}</td>
                </tr>
                <tr>
                    <th>{{__('Status')}}</th>
                    <td>{{ !empty($leave->status)?$leave->status:'' }}</td>
                </tr>
                <tr>
                <th>{{__('HOD Leave status')}}</th>
                                <td>
                                    @if($leave->hod_leave_approval=="0")
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($leave->hod_leave_approval=="1")
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    @else($leave->hod_leave_approval=="2")
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    @endif
                                </td>
                </tr>
                <tr>
                <th>{{__('HR Leave status')}}</th>
                                <td>
                                    @if($leave->hr_leave_approval=="0")
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    @elseif($leave->hr_leave_approval=="1")
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    @else($leave->hr_leave_approval=="2")
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    @endif
                                </td>
                </tr>
                <input type="hidden" value="{{ $leave->id }}" name="leave_id">
            </table>
        </div>
        @if(\Auth::user()->type == 'hr')
            @if($leave->hod_leave_approval!="0")
            <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>
            @else
                <div class="col-12">
                {{'First HOD Leave Approve After You can Access'}}
                </div>
            @endif
        @else
        <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>

        @endif

    </div>
    {{Form::close()}}
</div>
