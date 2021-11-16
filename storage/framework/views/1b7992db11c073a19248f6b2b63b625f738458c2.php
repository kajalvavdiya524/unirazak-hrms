<div class="card bg-none card-box">
     <?php echo e(Form::open(array('url'=>'resignation/changeaction','method'=>'post'))); ?>

    <div class="row">
        <input type="hidden" name="resignation_id" value="<?php echo e($resignation->id); ?>">
        <div class="col-12">
            <table class="footable-details table table-striped table-hover toggle-circle">
                <tbody>
                    <tr>
                    <td class="text-dark"><?php echo e(__('Employee')); ?></td>
                    <td style="display: table-cell;"><?php echo e(!empty($resignation->employee())?$resignation->employee()->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Notice Date')); ?></td>
                    <td style="display: table-cell;"><?php echo e(\Auth::user()->dateFormat($resignation->notice_date)); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Resignation Date')); ?></td>
                    <td style="display: table-cell;"><?php echo e(\Auth::user()->dateFormat($resignation->resignation_date)); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Description')); ?></td>
                    <td style="display: table-cell;"><?php echo e($resignation->description); ?></td>
                </tr>
                </tbody>
            </table>
             <?php if(\Auth::user()->type == 'hr'): ?>
            <?php if($resignation->hod_resignation_approve!="0"): ?>
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
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/resignation/show.blade.php ENDPATH**/ ?>