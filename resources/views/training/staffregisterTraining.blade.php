@extends('layouts.admin')

@section('page-title')
    {{__('Create Training')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fluid">
                <div class="card bg-none card-box">
                    {{Form::open(array('url'=>'training/joinTraning','method'=>'post'))}}
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card-body employee-detail-body">
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Department')}} : </strong>
                                            <span>
                                                @foreach ($department as $item)
                                                        @if($item->id==$createform->department)
                                                        {{$item->name}}
                                                        @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div> 

                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Designation')}} : </strong>
                                            <span>
                                                @foreach ($designations as $item)
                                                        @if($item->id==$createform->designation)
                                                        {{$item->name}}
                                                        @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Branch')}} : </strong>
                                            <span>
                                                @foreach ($branches as $item)
                                                        @if($item->id==$createform->branch)
                                                        {{$item->name}}
                                                        @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Program Title')}} : </strong>
                                            <span>
                                                        {{$createform->program_title}}
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Program Venue')}} : </strong>
                                            <span>
                                                        {{$createform->program_venue}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Trainer Option')}} : </strong>
                                            <span>
                                                    @if($createform->trainer_option==0)
                                                        {{'internal'}}
                                                    @else
                                                        {{'external'}}
                                                    @endif                                                
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Training Type')}} : </strong>
                                            <span>        
                                                @foreach ($trainingTypes as $item)
                                                    @if($item->id==$createform->training_type)
                                                    {{$item->name}}
                                                    @endif
                                                 @endforeach
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Trainer')}} : </strong>
                                            <span>        
                                                @foreach ($trainers as $item)
                                                    @if($item->id==$createform->trainer)
                                                    {{$item->firstname}}
                                                    @endif
                                                 @endforeach
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Training Cost')}} : </strong>
                                            <span>        
                                                {{$createform->training_cost}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Employee')}} : </strong>
                                            <span>        
                                            @foreach ($employees as $item)
                                                    @if($item->id==$createform->employee)
                                                    {{$item->name}}
                                                    @endif
                                             @endforeach
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Employee No')}} : </strong>
                                            <span>        
                                                {{$createform->employee_no}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Start Date')}} : </strong>
                                            <span>        
                                                {{$createform->start_date}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('End Date')}} : </strong>
                                            <span>        
                                                {{$createform->end_date}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Organize')}} : </strong>
                                            <span>        
                                                {{$createform->organize}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Contact Person')}} : </strong>
                                            <span>        
                                                {{$createform->contact_person}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Address')}} : </strong>
                                            <span>        
                                                {{$createform->address}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('City')}} : </strong>
                                            <span>        
                                                {{$createform->city}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('State')}} : </strong>
                                            <span>        
                                                {{$createform->state}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Country')}} : </strong>
                                            <span>        
                                                {{$createform->country}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Post Code')}} : </strong>
                                            <span>        
                                                {{$createform->postcode}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('phone')}} : </strong>
                                            <span>        
                                                {{$createform->phone}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Fax')}} : </strong>
                                            <span>        
                                                {{$createform->fax}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Email')}} : </strong>
                                            <span>        
                                                {{$createform->email}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Web site')}} : </strong>
                                            <span>        
                                                {{$createform->website}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Approved Status')}} : </strong>
                                            <span>        
                                                {{$createform->approved_status}}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong>{{__('Description')}} : </strong>
                                            <span>        
                                                {{$createform->description}}
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <input type="hidden" name="training_id" value="{{$createform->id}}">
                        <div class="form-group col-lg-12">
                            {{Form::label('reasonjoining',__('Justification for attending course'),['class'=>'form-control-label'])}}<span class="text-danger pl-1">*</span>
                            {{Form::textarea('reason_joining',null,array('class'=>'form-control','placeholder'=>__('Reason for Joining the Training')))}}
                        </div>
                        
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                {!! Form::label('trainingTask', __('Training Task'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_m" value="database admin" name="traing_task" class="custom-control-input">
                                        <label class="custom-control-label" for="g_m">{{__('Database Admin')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_f" value="oracle database knowlegde" name="traing_task" class="custom-control-input">
                                        <label class="custom-control-label" for="g_f">{{__('Oracle database knowlegde')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-lg-12">
                            {{Form::label('rate',__('In General, how do you rate yourself in executing your job'),['class'=>'form-control-label'])}}<span class="text-danger pl-1">*</span>
                            <div class="d-flex radio-check">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="g_mrate" value="Competent" name="rate_yourself" class="custom-control-input">
                                    <label class="custom-control-label" for="g_mrate">{{__('Competent')}}</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="g_frate" value="satisfactory" name="rate_yourself" class="custom-control-input">
                                    <label class="custom-control-label" for="g_frate">{{__('satisfactory')}}</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="g_fs" value="Not satisfactory" name="rate_yourself" class="custom-control-input">
                                    <label class="custom-control-label" for="g_fs">{{__('Not satisfactory')}}</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-lg-12">
                            {{Form::label('trainingCondition',__('Training Condition'),['class'=>'form-control-label'])}}<span class="text-danger pl-1">*</span>
                            
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="gender" id="check-gr">
                                    <label class="custom-control-label" for="check-gr">{{__('Knowledge')}} </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="dob" id="check-knowledge">
                                    <label class="custom-control-label" for="check-knowledge">{{__('lack of knowledge')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="country" id="check-Oracle">
                                    <label class="custom-control-label" for="check-Oracle">{{__('More training and expose to Oracle')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="country" id="check-exersize">
                                    <label class="custom-control-label" for="check-exersize">{{__('More training and exersize')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            {{Form::label('improveworkdetails',__('How do you think the training can help you improve your work ?'),['class'=>'form-control-label'])}}<span class="text-danger pl-1">*</span>
                            {{Form::textarea('improve_your_work_details',null,array('class'=>'form-control','placeholder'=>__('how do you think the training can help you improve your work')))}}
                        </div>
                        <div class="form-group col-lg-12">
                            {{Form::label('applyknowledge',__('How do you intend to apply the knowledge, skill or behaviours you have learned during the training.(Please indicate in a measurable or observable and attainable outcome/behaviour in next 6 months)'),['class'=>'form-control-label'])}}<span class="text-danger pl-1">*</span>
                            {{Form::textarea('apply_the_knowledge',null,array('class'=>'form-control','placeholder'=>__('How do you intend to apply the knowledge, skill or behaviours you have learned during the training.(Please indicate in a measurable or observable and attainable outcome/behaviour in next 6 months)')))}}
                        </div>

                        <div class="col-12">
                            <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
                            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
@endsection








