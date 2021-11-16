<div class="card bg-none card-box">
    <?php echo e(Form::model($resignation,array('route' => array('resignation.update', $resignation->id), 'method' => 'PUT','enctype' => "multipart/form-data"))); ?>

    <div class="row">
        <?php if(\Auth::user()->type!='employee'): ?>
            <div class="form-group col-lg-12">
                <?php echo e(Form::label('employee_id', __('Employee'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('employee_id', $employees,null, array('class' => 'form-control select2','required'=>'required'))); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('notice_date',__('Notice Date'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('notice_date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('resignation_date',__('Resignation Date'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('resignation_date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))); ?>

        </div>
        <div class="col-md-6">
            <div class="choose-file form-group">
            <input type="hidden" name="filename" value="<?php echo e($resignation->document); ?>">
                <label for="document" class="form-control-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="document" id="document" data-filename="document_create" >
                </label>
                <p class="document_create"></p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="terms" value="0" id="checktermsdata" <?php echo e($resignation->terms_conditions == "" ? '' : 'checked'); ?> onclick="termscheckbox()">
                <label class="custom-control-label" for="checktermsdata">I agree to these <a href="#">Terms and Conditions</a> </label>
            </div>
          
        </div>
            <?php if($resignation->terms_conditions == ""): ?>
            <div class="col-md-12" id="hideDyanamicData" style="display: none">
                <?php echo e(Form::label('Terms','Terms and Conditions')); ?>

                <?php echo e(Form::textarea('Termsconditions',null,['class'=>'form-control'])); ?>

            </div>
            <?php else: ?> 
            <div class="col-md-12" id="hideDyanamicData">
                <?php echo e(Form::label('Terms','Terms and Conditions')); ?>

                <?php echo e(Form::textarea('Termsconditions',$resignation->terms_conditions,['class'=>'form-control'])); ?>

            </div>
            <?php endif; ?>
        
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/resignation/edit.blade.php ENDPATH**/ ?>