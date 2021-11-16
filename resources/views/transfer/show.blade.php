<div class="card bg-none card-box">
     {{Form::open(array('url'=>'transfer/changeaction','method'=>'post'))}}
    <div class="row">
        <input type="hidden" name="transfer_id" value="{{$transfer->id}}">
        <div class="col-12">
            <table class="footable-details table table-striped table-hover toggle-circle">
                <tbody>
                    <tr>
                    <td class="text-dark">{{__('Employee')}}</td>
                    <td style="display: table-cell;">{{ !empty($transfer->employee())?$transfer->employee()->name:'' }}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Branch')}}</td>
                    <td style="display: table-cell;">{{ !empty($transfer->branch())?$transfer->branch()->name:'' }}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Department')}}</td>
                    <td style="display: table-cell;">{{ !empty($transfer->department())?$transfer->department()->name:'' }}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Transfer Date')}}</td>
                    <td style="display: table-cell;">{{  \Auth::user()->dateFormat($transfer->transfer_date) }}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Description')}}</td>
                    <td style="display: table-cell;">{{ $transfer->description }}</td>
                </tr>
                </tbody>
            </table>
             @if(\Auth::user()->type == 'hr')
            @if($transfer->hod_transfer_approve!="0")
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
    </div>
     {{Form::close()}}
</div>

















