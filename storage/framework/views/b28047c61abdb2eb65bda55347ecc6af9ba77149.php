<div class="card bg-none card-box">
    <?php echo e(Form::model($companyPolicy,array('route' => array('company-policy.update', $companyPolicy->id), 'method' => 'PUT','enctype' => "multipart/form-data"))); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('branch',__('Branch'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('branch',$branch,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('title',__('Title'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('title',null,array('class'=>'form-control','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('description', __('Description'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::textarea('description',null, array('class' => 'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('Category', 'Category', ['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('category',$catgory,$companyPolicy->category,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <?php echo e(Form::label('attachment',__('Attachment'),['class'=>'form-control-label'])); ?>

            <div class="choose-file form-group">
                <label for="attachment" class="form-control-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="attachment" id="attachment" data-filename="attachment_create">
                </label>
                <p class="attachment_create"></p>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/companyPolicy/edit.blade.php ENDPATH**/ ?>