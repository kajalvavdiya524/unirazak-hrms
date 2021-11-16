
<div class="container">
<div class="card bg-none card-box">
    <div class="container">

    <?php echo e(Form::open(array('url'=>'training/submit-evalution-form','method'=>'post'))); ?>


        <div class="col-md-12 p-2">
                <div class="col-md-12 mt-4">
                    <input type="hidden" name="id2" value="<?php echo e($status->id); ?>">
                        <div class="form-group">
                            <?php echo e(Form::label('performance',__('Performance'),['class'=>'form-control-label text-dark'])); ?>

                            <?php echo e(Form::select('performance',$performance,null,array('class'=>'form-control select2'))); ?>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('status',__('Status'),['class'=>'form-control-label text-dark'])); ?>

                            <?php echo e(Form::select('status',$statusdropdwon,null,array('class'=>'form-control select2'))); ?>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo e(Form::label('remarks',__('Remarks'),['class'=>'form-control-label text-dark'])); ?>

                            <?php echo e(Form::textarea('remarks',null,array('class'=>'form-control','placeholder'=>__('Remarks')))); ?>

                        </div>
                    </div>
            <div class="col-12">
                <input type="submit" value="<?php echo e(__('Submit')); ?>" class="btn-create badge-blue">
            </div>
        </div>
        <?php echo e(Form::close()); ?>


        <br>
    </div>
</div>
</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/training/Evaluation-Form.blade.php ENDPATH**/ ?>