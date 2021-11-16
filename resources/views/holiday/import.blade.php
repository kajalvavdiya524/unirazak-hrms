<div class="card bg-none card-box">
    {{Form::open(array('url'=>'importExcel','method'=>'post', 'enctype' => "multipart/form-data"))}}
        <div class="row">
          
            <div class="col-12">
                {{Form::label('import_file',__('Import'),['class'=>'form-control-label'])}}
                <div class="choose-file form-group col-sm-6">
                    <label for="import_file" class="form-control-label">
                        <div>{{__('Choose file here')}}</div>
                        <input type="file" class="form-control" name="import_file" id="import_file" data-filename="document_create" required>
                    </label>
                </div>
                <div class="m-3 col-sm-6 text-center">
                    <a href="{{asset('/public/assets/csv/sample_file.csv')}}"  style="color:blue;text-decoration: underline;">sample file</a>

                </div>
                {{Form::close()}}
                <div class="row">
                    <div class=" form-group">
                        <input type="submit" value="{{__('Import File')}}" class="btn-create badge-blue">
                        <input type="button" value="{{__('Cancel')}}" class="btn-create bg-gray" data-dismiss="modal">
                    </div>        
                </div> 
            </div> 
        </div>
    {{Form::close()}}
</div>
 