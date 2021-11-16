<div class="card bg-none card-box">
    {{Form::open(array('url'=>'training','method'=>'post'))}}
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('Department',__('Department'),['class'=>'form-control-label'])}}
                {{Form::select('department',$department,null,array('class'=>'form-control select2','required'=>'required'))}}


            </div>
            <div class="form-group">
                {{Form::label('Designation',__('Designation'),['class'=>'form-control-label'])}}
                {{Form::select('Designation',$designations,null,array('class'=>'form-control select2','required'=>'required'))}}


            </div>
            <div class="form-group">
                {{Form::label('branch',__('Branch'),['class'=>'form-control-label'])}}
                {{Form::select('branch',$branches,null,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
            <div class="form-group">
                {{Form::label('ProgramTitle',__('Program Title'),['class'=>'form-control-label'])}}
                {{Form::text('ProgramTitle',null,array('class'=>'form-control'))}}

            </div>
            <div class="form-group">
                {{Form::label('ProgramVenue',__('Program Venue'),['class'=>'form-control-label'])}}
                {{Form::text('ProgramVenue',null,array('class'=>'form-control'))}}

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('trainer_option',__('Trainer Option'),['class'=>'form-control-label'])}}
                {{Form::select('trainer_option',$options,null,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('training_type',__('Training Type'),['class'=>'form-control-label'])}}
                {{Form::select('training_type',$trainingTypes,null,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('trainer',__('Trainer'),['class'=>'form-control-label'])}}
                {{Form::select('trainer',$trainers,null,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('training_cost',__('(RM)Training Cost'),['class'=>'form-control-label'])}}
                {{Form::number('training_cost',null,array('class'=>'form-control','step'=>'0.01','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6 ">
                            <div class="form-group ">
                                {!! Form::label('gender', __('Cost By'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="hr" name="costby" class="custom-control-input">
                                        <label class="custom-control-label" for="g_male">{{__('Hr')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_Employee" value="employee" name="costby" class="custom-control-input">
                                        <label class="custom-control-label" for="g_Employee">{{__('Employee')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('employee',__('Employee'),['class'=>'form-control-label'])}}
                {{Form::select('employee',$employees,null,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('employee_No',__('Employee No'),['class'=>'form-control-label'])}}
                {{Form::text('employee_No',null,array('class'=>'form-control'))}}

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])}}
                {{Form::text('start_date',null,array('class'=>'form-control datepicker'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('end_date',__('End Date'),['class'=>'form-control-label'])}}
                {{Form::text('end_date',null,array('class'=>'form-control datepicker'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('Organize',__('Organize'),['class'=>'form-control-label'])}}
                {{Form::text('Organize',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('contactPerson',__('Contact Person'),['class'=>'form-control-label'])}}
                {{Form::text('contactPerson',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group col-lg-12">
            {{Form::label('Address',__('Address'),['class'=>'form-control-label'])}}
            {{Form::textarea('Address',null,array('class'=>'form-control','placeholder'=>__('Description')))}}
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('city',__('City'),['class'=>'form-control-label'])}}
                {{Form::text('city',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('state',__('State'),['class'=>'form-control-label'])}}
                {{Form::text('state',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('country',__('Country'),['class'=>'form-control-label'])}}
                {{Form::text('country',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('postcode',__('Post Code'),['class'=>'form-control-label'])}}
                {{Form::text('postcode',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('phone',__('phone'),['class'=>'form-control-label'])}}
                {{Form::number('phone',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('fax',__('Fax'),['class'=>'form-control-label'])}}
                {{Form::text('fax',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('email',__('Email'),['class'=>'form-control-label'])}}
                {{Form::email('email',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('website',__('Web site'),['class'=>'form-control-label'])}}
                {{Form::text('website',null,array('class'=>'form-control'))}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('approved_status',__('Approved Status'),['class'=>'form-control-label'])}}
                {{ Form::select('approved_status', $is_required,null, array('class' => 'form-control select2','required'=>'required')) }}
            </div>
        </div>

        <div class="form-group col-lg-12">
            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Description')))}}
        </div>
        {{-- <div class="form-group col-lg-12">
            {{Form::label('reasonjoining',__('Justification for attending course'),['class'=>'form-control-label'])}}
            {{Form::textarea('reasonjoining',null,array('class'=>'form-control','placeholder'=>__('Reason for Joining the Training')))}}
        </div> --}}
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
</div>
