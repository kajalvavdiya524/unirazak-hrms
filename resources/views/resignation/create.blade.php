<div class="card bg-none card-box">
    {{Form::open(array('url'=>'resignation','method'=>'post', 'id'=>'resignationform', 'enctype' => "multipart/form-data","onsubmit"=>"return confirm('Are you sure you want to submit?');"))}}
    <div class="row">
        @if(\Auth::user()->type!='employee')
            <div class="form-group col-lg-12">
                {{ Form::label('employee_id', __('Employee'),['class'=>'form-control-label'])}}
                {{ Form::select('employee_id', $employees,null, array('class' => 'form-control select2','required'=>'required')) }}
            </div>
        @endif
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('notice_date',__('Notice Date'),['class'=>'form-control-label'])}}
            {{Form::text('notice_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-lg-6 col-md-6">
            {{Form::label('resignation_date',__('Resignation Date'),['class'=>'form-control-label'])}}
            {{Form::text('resignation_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-lg-12">
            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))}}
        </div>
        <div class="col-md-6">
            <div class="choose-file form-group">
                <label for="document" class="form-control-label">
                    <div>{{__('Choose file here')}}</div>
                    <input type="file" class="form-control" name="document" id="document" data-filename="document_create" >
                </label>
                <p class="document_create"></p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="terms" value="0" id="checktermsdata" onclick="termscheckbox()">
            <label class="custom-control-label" for="checktermsdata">{{__('I agree to these')}}<a href="#">{{__('Terms and Conditions')}}</a> </label>
            </div>
          
        </div>
        <div class="col-md-12" id="hideDyanamicData" style="display: none">
            {{ Form::label('Terms','Terms and Conditions') }}
            {{ Form::textarea('Termsconditions',null,['class'=>'form-control']) }}
        </div>
        
        <div class="col-12">
           
          
            <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue" >
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" >
        </div>
    </div>
    {{Form::close()}}
</div>
