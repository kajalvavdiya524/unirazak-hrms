<div class="card bg-none card-box">
    <?php echo e(Form::model($complaint,array('route' => array('complaint.update', $complaint->id), 'method' => 'PUT','enctype' => "multipart/form-data"))); ?>

    <div class="row">
        <?php if(\Auth::user()->type !='employee'): ?>
        <div class="form-group col-md-6 col-lg-6">
            <?php echo e(Form::label('complaint_from', __('Complaint From'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('complaint_from', $employees,null, array('class' => 'form-control  select2','required'=>'required'))); ?>

        </div>
        <?php endif; ?>
        <div class="form-group col-md-6 col-lg-6">
            <?php echo e(Form::label('complaint_against',__('Complaint Against'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('complaint_against',$employees,null,array('class'=>'form-control select2'))); ?>

        </div>
        <div class="form-group col-md-6 col-lg-6">
            <?php echo e(Form::label('title',__('Title'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('title',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group col-md-6 col-lg-6">
            <?php echo e(Form::label('complaint_date',__('Complaint Date'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('complaint_date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))); ?>

        </div>
        <div class="form-group col-md-12">
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

</div><?php /**PATH C:\wamp64\www\UniRazak\resources\views/complaint/edit.blade.php ENDPATH**/ ?>