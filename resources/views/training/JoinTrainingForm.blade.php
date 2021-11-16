
<div class="container">
<div class="card bg-none card-box">
    <div class="container">

    {{Form::open(array('url'=>'training/join','method'=>'post'))}}

        <div class="col-md-12 p-2">
            <div class="info text-sm">
                <div class="form-group col-lg-12">
                {{Form::label('reasonjoining',__('Justification for attending course'),['class'=>'form-control-label'])}}
                {{Form::textarea('reasonjoining',null,array('class'=>'form-control','rows' => 2,'placeholder'=>__('Reason for Joining the Training')))}}
                </div>
            </div>
            <input type="hidden" name="id" value="{{$status->id}}">
            <div class="col-12">
                <input type="submit" value="{{__('Join')}}" class="btn-create badge-blue">
            </div>
        </div>
        {{Form::close()}}





        <br>
    </div>
</div>
</div>
