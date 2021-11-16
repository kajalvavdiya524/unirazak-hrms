<div class="card bg-none card-box">
    <?php echo e(Form::model($interviewSchedule,array('route' => array('interview-schedule.update', $interviewSchedule->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('candidate',__('Interviewer'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::select('candidate', $candidates,null, array('class' => 'form-control select2','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('employee',__('Assign Employee'),['class'=>'form-control-label'])); ?>

            <?php 
            $selected = explode(",",$interviewSchedule->employee);
            ?>

            <select multiple="multiple" name="employee[]" id="employee" class="form-control select2">
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if(in_array($value->id, $selected)): ?> {
                    <option value="<?php echo e($value->id); ?>" selected="selected"><?php echo e($value->name); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('date',__('Interview Date'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('time',__('Interview Time'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::text('time',null,array('class'=>'form-control timepicker'))); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('comment',__('Comment'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('comment',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>

<?php /**PATH /var/www/html/UniRazak/resources/views/interviewSchedule/edit.blade.php ENDPATH**/ ?>