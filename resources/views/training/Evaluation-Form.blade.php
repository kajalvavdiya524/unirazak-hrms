
<div class="container">
<div class="card bg-none card-box">
    <div class="container">

    {{Form::open(array('url'=>'training/submit-evalution-form','method'=>'post'))}}

        <div class="col-md-12 p-2">
                <div class="col-md-12 mt-4">
                    <input type="hidden" name="id2" value="{{$status->id}}">
                        <div class="form-group">
                            {{Form::label('performance',__('Performance'),['class'=>'form-control-label text-dark'])}}
                            {{Form::select('performance',$performance,null,array('class'=>'form-control select2'))}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('status',__('Status'),['class'=>'form-control-label text-dark'])}}
                            {{Form::select('status',$statusdropdwon,null,array('class'=>'form-control select2'))}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('remarks',__('Remarks'),['class'=>'form-control-label text-dark'])}}
                            {{Form::textarea('remarks',null,array('class'=>'form-control','placeholder'=>__('Remarks')))}}
                        </div>
                    </div>
            <div class="col-12">
                <input type="submit" value="{{__('Submit')}}" class="btn-create badge-blue">
            </div>
        </div>
        {{Form::close()}}

        <br>
    </div>
</div>
</div>
