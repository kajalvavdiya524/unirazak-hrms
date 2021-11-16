<div class="card bg-none card-box">
     <?php echo e(Form::open(array('url'=>'termination/changeaction','method'=>'post'))); ?>

    <div class="row">
        <input type="hidden" name="termination_id" value="<?php echo e($termination->id); ?>">
        <div class="col-12">
            <table class="footable-details table table-striped table-hover toggle-circle">
                <tbody>
                    <tr>
                    <td class="text-dark"><?php echo e(__('Employee')); ?></td>
                    <td style="display: table-cell;"><?php echo e(!empty($termination->employee())?$termination->employee()->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Termination Type')); ?></td>
                    <td style="display: table-cell;"><?php echo e(!empty($termination->terminationType())?$termination->terminationType()->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Notice Date')); ?></td>
                    <td style="display: table-cell;"><?php echo e(\Auth::user()->dateFormat($termination->notice_date)); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Termination Date')); ?></td>
                    <td style="display: table-cell;"><?php echo e(\Auth::user()->dateFormat($termination->termination_date)); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Description')); ?></td>
                    <td style="display: table-cell;"><?php echo e($termination->description); ?></td>
                </tr>
                </tbody>
            </table>
             <?php if(\Auth::user()->type == 'hr'): ?>
            <?php if($termination->hod_termination_approve!="0"): ?>
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
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/termination/show.blade.php ENDPATH**/ ?>