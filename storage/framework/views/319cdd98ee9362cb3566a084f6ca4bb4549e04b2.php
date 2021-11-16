
<div class="container">
<div class="card bg-none card-box">
    <div class="container">

    <?php echo e(Form::open(array('url'=>'training/join','method'=>'post'))); ?>


        <div class="col-md-12 p-2">
            <div class="info text-sm">
                <div class="form-group col-lg-12">
                <?php echo e(Form::label('reasonjoining',__('Justification for attending course'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::textarea('reasonjoining',null,array('class'=>'form-control','rows' => 2,'placeholder'=>__('Reason for Joining the Training')))); ?>

                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo e($status->id); ?>">
            <div class="col-12">
                <input type="submit" value="<?php echo e(__('Join')); ?>" class="btn-create badge-blue">
            </div>
        </div>
        <?php echo e(Form::close()); ?>






        <br>
    </div>
</div>
</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/training/JoinTrainingForm.blade.php ENDPATH**/ ?>