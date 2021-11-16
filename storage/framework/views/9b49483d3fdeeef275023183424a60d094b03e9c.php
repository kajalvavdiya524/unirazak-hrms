<div class="card bg-none card-box">
    <?php echo e(Form::model($competencies,array('route' => array('competencies.update', $competencies->id), 'method' => 'PUT'))); ?>

    <div class="row ">
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('name',__('Name'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('name',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('type',__('Type'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('type',$types,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Updated')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /home/myunicr/public_html/resources/views/competencies/edit.blade.php ENDPATH**/ ?>