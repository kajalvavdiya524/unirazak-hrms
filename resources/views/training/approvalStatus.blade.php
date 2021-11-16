
<div class="container">
<div class="card bg-none card-box">
    <div class="container">

        <div class="col-md-6 p-2">
            <div class="info text-sm">
            <input type="hidden" id="id" value="{{$status->id}}">
                <strong>{{__('Training Type')}} : </strong>
                <span>
                    @foreach ($trainingTypes as $item)
                            @if($item->id==$status->training_type)
                            {{$item->name}}
                            @endif
                    @endforeach
                </span>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <strong>{{__('Approved Annual Budget')}} : </strong>
                <span>
                    {{'RM'.$status->training_cost}}
                </span>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <strong>{{__('Commited To Date')}} : </strong>
                <span>
                    {{\Auth::user()->dateFormat($status->start_date) .' to '.\Auth::user()->dateFormat($status->end_date)}}
                </span>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <strong>{{__('Amount Required')}} : </strong>
                <span>
                    {{'RM'.$status->training_cost}}
                </span>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <label>{{__('Budget Balance')}} : </label>

            </div>
        </div>


        <div class="form-group col-lg-12" id="remarks" style="display:none">
            {{Form::label('Remarks',__('Remarks'),['class'=>'form-control-label'])}}
            {{Form::textarea('remarks',null,array('class'=>'form-control','id'=>'remarksAll','placeholder'=>__('Description')))}}
        </div>



        @if(\Auth::user()->type == 'hr')
            @if($status->hr_cost_approval=="1" || $status->hr_cost_approval=="2")
            <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="info text-sm">
                            <strong>HOD Approved Status:  </strong>
                            @if($status->hod_cost_approval=="1")
                                <span style="color: white" class="btn-success p-2">
                                    {{'Approved'}}
                                </span>
                                    @elseif($status->hod_cost_approval=="2")
                                <span style="color: white" class="btn-danger p-2">
                                    {{'Rejected'}}
                                </span>
                                    @else
                                <span style="color: white" class="btn-warning p-2">
                                    {{'Pending'}}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                            <div class="info text-sm">
                                <strong>HR Approved Status:  </strong>
                                @if($status->hr_cost_approval=="1")
                                        <span style="color: white" class="btn-success p-2">
                                            {{'Approved'}}
                                        </span>
                                        @else
                                        <span style="color: white" class="btn-success p-2">
                                            {{'Rejected'}}
                                        </span>
                                @endif
                            </div>
                    </div>
                </div>

            @else
            @if($status->hod_cost_approval=="1" || $status->hod_cost_approval=="2")
            <div class="col-12" id="mainsubmit">
                    <input type="submit" value="{{__('Approved')}}" onclick="training_Approved(1,{{$status->id}})" class="btn-create btn-success">
                    <input type="submit" value="{{__('Reject')}}" onclick="traininng_reject(2,{{$status->id}})" class="btn-create btn-danger">
                    <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
            <div class="col-12 remarksSubmit" style="display:none">
                    <input type="submit" value="{{__('Remarks Submit')}}" onclick="rejectRemarksSubmit(2,{{$status->id}})" class="btn-create btn-success">
            </div>
            @else
            {{'First HOD Leave Approve After You can Access'}}
            @endif

            @endif

        @endif
        @if(\Auth::user()->type == 'company')
            @if($status->hod_cost_approval=="1" || $status->hod_cost_approval=="2")
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="info text-sm">
                                <strong>HOD Approved Status:  </strong>
                                @if($status->hod_cost_approval=="1")
                                <span style="color: white" class="btn-success p-2">
                                    {{'Approved'}}
                                </span>
                                    @else
                                <span style="color: white" class="btn-success p-2">
                                    {{'Rejected'}}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info text-sm">
                                <strong>HR Approved Status:  </strong>
                                @if($status->hr_cost_approval=="1")
                                <span style="color: white" class="btn-success p-2">
                                    {{'Approved'}}
                                </span>
                                    @elseif($status->hr_cost_approval=="2")
                                <span style="color: white" class="btn-success p-2">
                                    {{'Rejected'}}
                                </span>
                                    @else
                                <span style="color: white" class="btn-success p-2">
                                    {{'Pending'}}
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>
            @else
                <div class="col-12" id="mainsubmit">
                    <input type="submit" value="{{__('Approved')}}" onclick="training_Approved(1,{{$status->id}})" class="btn-create btn-success">
                    <input type="submit" value="{{__('Reject')}}" onclick="traininng_reject(2,{{$status->id}})" class="btn-create btn-danger">
                    <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
            </div>
            <div class="col-12 remarksSubmit" style="display:none">
                    <input type="submit" value="{{__('Remarks Submit')}}" onclick="rejectRemarksSubmit(2,{{$status->id}})" class="btn-create btn-success">
            </div>
            @endif

        @endif




        <br>
    </div>
</div>
</div>
