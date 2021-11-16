<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url'=>'importExcel','method'=>'post', 'enctype' => "multipart/form-data"))); ?>

        <div class="row">
          
            <div class="col-12">
                <?php echo e(Form::label('import_file',__('Import'),['class'=>'form-control-label'])); ?>

                <div class="choose-file form-group col-sm-6">
                    <label for="import_file" class="form-control-label">
                        <div><?php echo e(__('Choose file here')); ?></div>
                        <input type="file" class="form-control" name="import_file" id="import_file" data-filename="document_create" required>
                    </label>
                </div>
                <div class="m-3 col-sm-6 text-center">
                    <a href="<?php echo e(asset('/public/assets/csv/date.csv')); ?>"  style="color:blue;text-decoration: underline;">sample file</a>

                </div>
                <?php echo e(Form::close()); ?>

                <div class="row">
                    <div class=" form-group">
                        <input type="submit" value="<?php echo e(__('Import File')); ?>" class="btn-create badge-blue">
                        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
                    </div>        
                </div> 
            </div> 
        </div>
    <?php echo e(Form::close()); ?>

</div>
 <?php /**PATH /var/www/html/UniRazak/resources/views/holiday/import.blade.php ENDPATH**/ ?>