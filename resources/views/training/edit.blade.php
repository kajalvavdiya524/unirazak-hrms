<div class="card bg-none card-box">
    {{Form::model($training,array('route' => array('training.update', $training->id), 'method' => 'PUT')) }}
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                {{Form::label('Department',__('Department'),['class'=>'form-control-label'])}}
                {{Form::select('department',$department,$training->department,array('class'=>'form-control select2','required'=>'required'))}}


            </div>
            <div class="form-group">
                {{Form::label('Designation',__('Designation'),['class'=>'form-control-label'])}}
                {{Form::select('Designation',$designations,$training->designation,array('class'=>'form-control select2','required'=>'required'))}}


            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::label('branch',__('Branch'),['class'=>'form-control-label'])}}
                    {{Form::select('branch',$branches,$training->branch,array('class'=>'form-control select2','required'=>'required'))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('ProgramTitle',__('Program Title'),['class'=>'form-control-label'])}}
                {{Form::text('ProgramTitle',$training->program_title,array('class'=>'form-control'))}}

            </div>
            <div class="form-group">
                {{Form::label('ProgramVenue',__('Program Venue'),['class'=>'form-control-label'])}}
                {{Form::text('ProgramVenue',$training->program_venue,array('class'=>'form-control'))}}

            </div>
</div>
            <div class="col-md-6">
            <div class="form-group">
                {{Form::label('trainer_option',__('Trainer Option'),['class'=>'form-control-label'])}}
                {{Form::select('trainer_option',$options,$training->trainer_option,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('training_type',__('Training Type'),['class'=>'form-control-label'])}}
                {{Form::select('training_type',$trainingTypes,$training->training_type,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('trainer',__('Trainer'),['class'=>'form-control-label'])}}
                {{Form::select('trainer',$trainers,$training->trainer,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('training_cost',__('(RM)Training Cost'),['class'=>'form-control-label'])}}
                {{Form::number('training_cost',$training->training_cost,array('class'=>'form-control','step'=>'0.01','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-6 ">
                            <div class="form-group ">
                                {!! Form::label('gender', __('Cost By'),['class'=>'form-control-label']) !!}<span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="hr" name="costby" class="custom-control-input" {{($training->costby == 'hr')?'checked':''}}>
                                        <label class="custom-control-label" for="g_male">{{__('Hr')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_Employee" value="employee" name="costby" class="custom-control-input" {{($training->costby == 'employee')?'checked':''}}>
                                        <label class="custom-control-label" for="g_Employee">{{__('Employee')}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('employee',__('Employee'),['class'=>'form-control-label'])}}
                {{Form::select('employee',$employees,$training->employee,array('class'=>'form-control select2','required'=>'required'))}}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('employee_No',__('Employee No'),['class'=>'form-control-label'])}}
                {{Form::text('employee_No',$training->employee_no,array('class'=>'form-control'))}}

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])}}
                {{Form::text('start_date',$training->start_date,array('class'=>'form-control datepicker'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('end_date',__('End Date'),['class'=>'form-control-label'])}}
                {{Form::text('end_date',$training->end_date,array('class'=>'form-control datepicker'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('Organize',__('Organize'),['class'=>'form-control-label'])}}
                {{Form::text('Organize',$training->organize,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('contactPerson',__('Contact Person'),['class'=>'form-control-label'])}}
                {{Form::text('contactPerson',$training->contact_person,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group col-lg-12">
            {{Form::label('Address',__('Address'),['class'=>'form-control-label'])}}
            {{Form::textarea('Address',$training->address,array('class'=>'form-control','placeholder'=>__('Description')))}}
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('city',__('City'),['class'=>'form-control-label'])}}
                {{Form::text('city',$training->city,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('state',__('State'),['class'=>'form-control-label'])}}
                {{Form::text('state',$training->state,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('country',__('Country'),['class'=>'form-control-label'])}}
                {{Form::text('country',$training->country,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('postcode',__('Post Code'),['class'=>'form-control-label'])}}
                {{Form::text('postcode',$training->postcode,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('phone',__('phone'),['class'=>'form-control-label'])}}
                {{Form::number('phone',$training->phone,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('fax',__('Fax'),['class'=>'form-control-label'])}}
                {{Form::text('fax',$training->fax,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('email',__('Email'),['class'=>'form-control-label'])}}
                {{Form::email('email',$training->email,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('website',__('Web site'),['class'=>'form-control-label'])}}
                {{Form::text('website',$training->website,array('class'=>'form-control'))}}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {{Form::label('approved_status',__('Approved Status'),['class'=>'form-control-label'])}}
                {{ Form::select('approved_status', $is_required,$training->approved_status, array('class' => 'form-control select2','required'=>'required')) }}
            </div>
        </div>


        <div class="form-group col-lg-12">
            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',$training->description,array('class'=>'form-control','placeholder'=>__('Description')))}}
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Update')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
</div>
