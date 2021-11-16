<div class="card bg-none card-box">
    {{Form::open(array('url'=>'complaint','method'=>'post','enctype' => "multipart/form-data"))}}
    <div class="row">
        @if(\Auth::user()->type !='employee')
        <div class="form-group col-md-6 col-lg-6 ">
            {{ Form::label('complaint_from', __('Complaint From'),['class'=>'form-control-label'])}}
            {{ Form::select('complaint_from', $employees,null, array('class' => 'form-control  select2','required'=>'required')) }}
        </div>
        @endif
        <div class="form-group col-md-6 col-lg-6">
            {{Form::label('complaint_against',__('Complaint Against'),['class'=>'form-control-label'])}}
            {{Form::select('complaint_against',$employees,null,array('class'=>'form-control select2'))}}
        </div>
        <div class="form-group col-md-6 col-lg-6">
            {{Form::label('title',__('Title'),['class'=>'form-control-label'])}}
            {{Form::text('title',null,array('class'=>'form-control'))}}
        </div>
        <div class="form-group col-md-6 col-lg-6">
            {{Form::label('complaint_date',__('Complaint Date'),['class'=>'form-control-label'])}}
            {{Form::text('complaint_date',null,array('class'=>'form-control datepicker'))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('description',__('Description'),['class'=>'form-control-label'])}}
            {{Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))}}
        </div>
        <div class="form-group col-md-12">
            {{Form::label('documents',__('Document'),['class'=>'form-control-label'])}}
            <div class="choose-file form-group">
                <label for="documents" class="form-control-label">
                    <div>{{__('Choose file here')}}</div>
                    <input type="file" class="form-control" name="documents" id="documents"
                        data-filename="document_create" required>
                </label>
                <p class="document_create"></p>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="{{__('Create')}}" class="btn-create badge-blue">
            <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    {{Form::close()}}
</div>