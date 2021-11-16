<div class="card bg-none card-box">
     <?php echo e(Form::open(array('url'=>'travel/changeaction','method'=>'post'))); ?>

    <div class="row">
        <input type="hidden" name="travel_id" value="<?php echo e($travel->id); ?>">
        <div class="col-12">
            <table class="footable-details table table-striped table-hover toggle-circle">
                <tbody>
                    <tr>
                    <td class="text-dark"><?php echo e(__('Employee')); ?></td>
                    <td style="display: table-cell;"><?php echo e(!empty($travel->employee())?$travel->employee()->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Start Date')); ?></td>
                    <td style="display: table-cell;"><?php echo e($travel->start_date); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('End Date')); ?></td>
                    <td style="display: table-cell;"><?php echo e($travel->end_date); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Purpose of Visit')); ?></td>
                    <td style="display: table-cell;"><?php echo e($travel->purpose_of_visit); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Place Of Visit')); ?></td>
                    <td style="display: table-cell;"><?php echo e($travel->place_of_visit); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Description')); ?></td>
                    <td style="display: table-cell;"><?php echo e($travel->description); ?></td>
                </tr>
                <tr>
                </tr>
                </tbody>
            </table>
             <?php if(\Auth::user()->type == 'hr'): ?>
            <?php if($travel->hod_travel_approve!="0"): ?>
            <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>
            <?php else: ?>
                <div class="col-12">
                <?php echo e('First HOD Leave Approve After You can Access'); ?>

                </div>
            <?php endif; ?>
        <?php else: ?>
        <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>
        <?php endif; ?>
        </div>
    </div>
     <?php echo e(Form::close()); ?>

</div>

















<?php /**PATH C:\wamp64\www\UniRazak\resources\views/travel/show.blade.php ENDPATH**/ ?>