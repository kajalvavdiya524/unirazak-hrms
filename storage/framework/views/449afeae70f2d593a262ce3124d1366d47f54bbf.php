<div class="card bg-none card-box">
     <?php echo e(Form::open(array('url'=>'transfer/changeaction','method'=>'post'))); ?>

    <div class="row">
        <input type="hidden" name="transfer_id" value="<?php echo e($transfer->id); ?>">
        <div class="col-12">
            <table class="footable-details table table-striped table-hover toggle-circle">
                <tbody>
                    <tr>
                    <td class="text-dark"><?php echo e(__('Employee')); ?></td>
                    <td style="display: table-cell;"><?php echo e(!empty($transfer->employee())?$transfer->employee()->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Branch')); ?></td>
                    <td style="display: table-cell;"><?php echo e(!empty($transfer->branch())?$transfer->branch()->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Department')); ?></td>
                    <td style="display: table-cell;"><?php echo e(!empty($transfer->department())?$transfer->department()->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Transfer Date')); ?></td>
                    <td style="display: table-cell;"><?php echo e(\Auth::user()->dateFormat($transfer->transfer_date)); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Description')); ?></td>
                    <td style="display: table-cell;"><?php echo e($transfer->description); ?></td>
                </tr>
                </tbody>
            </table>
             <?php if(\Auth::user()->type == 'hr'): ?>
            <?php if($transfer->hod_transfer_approve!="0"): ?>
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

















<?php /**PATH C:\wamp64\www\UniRazak\resources\views/transfer/show.blade.php ENDPATH**/ ?>