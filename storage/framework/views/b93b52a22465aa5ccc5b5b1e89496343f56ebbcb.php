<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url'=>'promotion/changeaction','method'=>'post'))); ?>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped mb-0 dataTable no-footer">
                <tr role="row">
                    <th><?php echo e(__('Employee')); ?></th>
                    <td style="display: table-cell;"><?php echo e(!empty($promotion->employee())?$promotion->employee()->name:''); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Designation')); ?></th>
                    <td style="display: table-cell;"><?php echo e(!empty($promotion->designation())?$promotion->designation()->name:''); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Promotion Date')); ?></th>
                    <td><?php echo e(!empty($promotion->promotion_date)?$promotion->promotion_date:''); ?></td>
                </tr>
                <tr>
                <th><?php echo e(__('HOD promotion status')); ?></th>
                                <td>
                                    <?php if($promotion->hod_promotions_approve=="0"): ?>
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    <?php elseif($promotion->hod_promotions_approve=="1"): ?>
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    <?php else: ?>
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    <?php endif; ?>
                                </td>
                </tr>
                <tr>
                <th><?php echo e(__('HR promotion status')); ?></th>
                                <td>
                                    <?php if($promotion->hr_promotions_approve=="0"): ?>
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    <?php elseif($promotion->hr_promotions_approve=="1"): ?>
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    <?php else: ?>
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    <?php endif; ?>
                                </td>
                </tr>
                <input type="hidden" value="<?php echo e($promotion->id); ?>" name="promotion_id">
            </table>
        </div>
        <?php if(\Auth::user()->type == 'hr'): ?>
            <?php if($promotion->hod_promotions_approve!="0"): ?>
            <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>
            <?php else: ?>
                <div class="col-12">
                <?php echo e('First HOD promotion Approve After You can Access'); ?>

                </div>
            <?php endif; ?>
        <?php else: ?>
        <div class="col-12">
                <input type="submit" class="btn-create badge-success" value="Approval" name="status">
                <input type="submit" class="btn-create bg-danger" value="Reject" name="status">
            </div>

        <?php endif; ?>

    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/promotion/show.blade.php ENDPATH**/ ?>