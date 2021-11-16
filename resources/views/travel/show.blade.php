<div class="card bg-none card-box">
     {{Form::open(array('url'=>'travel/changeaction','method'=>'post'))}}
    <div class="row">
        <input type="hidden" name="travel_id" value="{{$travel->id}}">
        <div class="col-12">
            <table class="footable-details table table-striped table-hover toggle-circle">
                <tbody>
                    <tr>
                    <td class="text-dark">{{__('Employee')}}</td>
                    <td style="display: table-cell;">{{ !empty($travel->employee())?$travel->employee()->name:'' }}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Start Date')}}</td>
                    <td style="display: table-cell;">{{$travel->start_date}}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('End Date')}}</td>
                    <td style="display: table-cell;">{{$travel->end_date}}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Purpose of Visit')}}</td>
                    <td style="display: table-cell;">{{$travel->purpose_of_visit}}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Place Of Visit')}}</td>
                    <td style="display: table-cell;">{{$travel->place_of_visit}}</td>
                </tr>
                <tr>
                    <td class="text-dark">{{__('Description')}}</td>
                    <td style="display: table-cell;">{{$travel->description}}</td>
                </tr>
                <tr>
                </tr>
                </tbody>
            </table>
             @if(\Auth::user()->type == 'hr')
            @if($travel->hod_travel_approve!="0")
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

















