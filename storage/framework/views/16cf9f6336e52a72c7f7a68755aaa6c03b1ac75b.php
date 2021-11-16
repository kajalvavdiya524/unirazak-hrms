<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url'=>'leave/changeaction','method'=>'post'))); ?>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped mb-0 dataTable no-footer">
                <tr role="row">
                    <th><?php echo e(__('Employee')); ?></th>
                    <td><?php echo e(!empty($employee->name)?$employee->name:''); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Leave Type ')); ?></th>
                    <td><?php echo e(!empty($leavetype->title)?$leavetype->title:''); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Appplied On')); ?></th>
                    <td><?php echo e(\Auth::user()->dateFormat( $leave->applied_on)); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Start Date')); ?></th>
                    <td><?php echo e(\Auth::user()->dateFormat($leave->start_date)); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('End Date')); ?></th>
                    <td><?php echo e(\Auth::user()->dateFormat($leave->end_date)); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Leave Reason')); ?></th>
                    <td><?php echo e(!empty($leave->leave_reason)?$leave->leave_reason:''); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Status')); ?></th>
                    <td><?php echo e(!empty($leave->status)?$leave->status:''); ?></td>
                </tr>
                <tr>
                <th><?php echo e(__('HOD Leave status')); ?></th>
                                <td>
                                    <?php if($leave->hod_leave_approval=="0"): ?>
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    <?php elseif($leave->hod_leave_approval=="1"): ?>
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    <?php else: ?>
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    <?php endif; ?>
                                </td>
                </tr>
                <tr>
                <th><?php echo e(__('HR Leave status')); ?></th>
                                <td>
                                    <?php if($leave->hr_leave_approval=="0"): ?>
                                    <div class="badge badge-pill badge-warning">Pending</div>
                                    <?php elseif($leave->hr_leave_approval=="1"): ?>
                                    <div class="badge badge-pill badge-success">Approve</div>
                                    <?php else: ?>
                                    <div class="badge badge-pill badge-danger">Reject</div>
                                    <?php endif; ?>
                                </td>
                </tr>
                <input type="hidden" value="<?php echo e($leave->id); ?>" name="leave_id">
            </table>
        </div>
        <?php if(\Auth::user()->type == 'hr'): ?>
            <?php if($leave->hod_leave_approval!="0"): ?>
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
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/leave/action.blade.php ENDPATH**/ ?>