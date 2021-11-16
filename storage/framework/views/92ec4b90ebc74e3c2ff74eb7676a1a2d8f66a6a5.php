<div class="card bg-none card-box">
    <?php echo e(Form::model($termination,array('route' => array('termination.update', $termination->id), 'method' => 'PUT','enctype' => "multipart/form-data"))); ?>

    <div class="row">
        <div class="form-group  col-lg-6 col-md-6">
            <?php echo e(Form::label('employee_id', __('Employee'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('employee_id', $employees,null, array('class' => 'form-control select2','required'=>'required'))); ?>

        </div>
        <div class="form-group  col-lg-6 col-md-6">
            <?php echo e(Form::label('termination_type', __('Termination Type')),['class'=>'form-control-label']); ?>

            <?php echo e(Form::select('termination_type', $terminationtypes,null, array('class' => 'form-control select2','required'=>'required'))); ?>

        </div>
        <div class="form-group  col-lg-6 col-md-6">
            <?php echo e(Form::label('notice_date',__('Notice Date'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('notice_date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group  col-lg-6 col-md-6">
            <?php echo e(Form::label('termination_date',__('Termination Date'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('termination_date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group  col-lg-12">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))); ?>

        </div>
         <div class="form-groupcol-lg-12">
            <?php echo e(Form::label('documents',__('Document'),['class'=>'form-control-label'])); ?>

            <div class="choose-file form-group">
                <label for="documents" class="form-control-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="documents" id="documents"
                        data-filename="documents_update">
                </label>
                <p class="documents_update"></p>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /var/www/html/UniRazak/resources/views/termination/edit.blade.php ENDPATH**/ ?>