
<div class="container">
<div class="card bg-none card-box">
    <div class="container">
              
        <div class="col-md-6 p-2">
            <div class="info text-sm">
            <input type="hidden" id="id" value="<?php echo e($status->id); ?>">
                <strong><?php echo e(__('Training Type')); ?> : </strong>
                <span>
                    <?php $__currentLoopData = $trainingTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->id==$status->training_type): ?>
                            <?php echo e($item->name); ?>

                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </span>
            </div>
        </div> 
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <strong><?php echo e(__('Approved Annual Budget')); ?> : </strong>
                <span>
                    <?php echo e('RM'.$status->training_cost); ?>

                </span>
            </div>
        </div> 
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <strong><?php echo e(__('Commited To Date')); ?> : </strong>
                <span>
                    <?php echo e(\Auth::user()->dateFormat($status->start_date) .' to '.\Auth::user()->dateFormat($status->end_date)); ?>

                </span>
            </div>
        </div> 
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <strong><?php echo e(__('Amount Required')); ?> : </strong>
                <span>
                    <?php echo e('RM'.$status->training_cost); ?>

                </span>
            </div>
        </div> 
        <div class="col-md-6 p-2">
            <div class="info text-sm">
                <strong><?php echo e(__('Budget Balance')); ?> : </strong>
                <span>
                    <?php echo e('RM'.$status->training_cost); ?>

                </span>
            </div>
        </div> 

        <?php if(\Auth::user()->type == 'hr'): ?>
            <?php if($status->hr_cost_approval=="1" || $status->hr_cost_approval=="2"): ?>
            <hr>
                <div class="row">
                    <div class="col-6">
                        <div class="info text-sm">
                            <strong>HOD Approved Status:  </strong>
                            <?php if($status->hod_cost_approval=="1"): ?>
                                <span style="color: white" class="btn-success p-2">
                                    <?php echo e('Approved'); ?>

                                </span>
                                    <?php elseif($status->hod_cost_approval=="2"): ?>
                                <span style="color: white" class="btn-danger p-2">
                                    <?php echo e('Rejected'); ?>

                                </span>
                                    <?php else: ?>
                                <span style="color: white" class="btn-warning p-2">
                                    <?php echo e('Pending'); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-6">
                            <div class="info text-sm">
                                <strong>HR Approved Status:  </strong>
                                <?php if($status->hr_cost_approval=="1"): ?>
                                        <span style="color: white" class="btn-success p-2">
                                            <?php echo e('Approved'); ?>

                                        </span>
                                        <?php else: ?>
                                        <span style="color: white" class="btn-success p-2">
                                            <?php echo e('Rejected'); ?>

                                        </span>
                                <?php endif; ?>
                            </div>
                    </div>
                </div>

            <?php else: ?>
                <div class="col-12">
                    <input type="submit" value="<?php echo e(__('Approved')); ?>" onclick="training_Approved(1,<?php echo e($status->id); ?>)" class="btn-create btn-success">
                    <input type="submit" value="<?php echo e(__('Reject')); ?>" onclick="training_Approved(2,<?php echo e($status->id); ?>)" class="btn-create btn-danger">
                    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
                </div>
            <?php endif; ?>

        <?php endif; ?>
        <?php if(\Auth::user()->type == 'company'): ?>
            <?php if($status->hod_cost_approval=="1" || $status->hod_cost_approval=="2"): ?>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="info text-sm">
                                <strong>HOD Approved Status:  </strong>
                                <?php if($status->hod_cost_approval=="1"): ?>
                                <span style="color: white" class="btn-success p-2">
                                    <?php echo e('Approved'); ?>

                                </span>
                                    <?php else: ?>
                                <span style="color: white" class="btn-success p-2">
                                    <?php echo e('Rejected'); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info text-sm">
                                <strong>HR Approved Status:  </strong>
                                <?php if($status->hr_cost_approval=="1"): ?>
                                <span style="color: white" class="btn-success p-2">
                                    <?php echo e('Approved'); ?>

                                </span>
                                    <?php elseif($status->hr_cost_approval=="2"): ?>
                                <span style="color: white" class="btn-success p-2">
                                    <?php echo e('Rejected'); ?>

                                </span>
                                    <?php else: ?>
                                <span style="color: white" class="btn-success p-2">
                                    <?php echo e('Pending'); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
            <?php else: ?>
                <div class="col-12">
                    <input type="submit" value="<?php echo e(__('Approved')); ?>" onclick="training_Approved(1,<?php echo e($status->id); ?>)" class="btn-create btn-success">
                    <input type="submit" value="<?php echo e(__('Reject')); ?>" onclick="training_Approved(2,<?php echo e($status->id); ?>)" class="btn-create btn-danger">
                    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
                </div>
            <?php endif; ?>

        <?php endif; ?>
       
        
        

        <br>
    </div>
</div>
</div>
<?php /**PATH /var/www/html/UniRazak/resources/views/training/approvalStatus.blade.php ENDPATH**/ ?>