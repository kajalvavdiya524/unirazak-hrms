
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
                <label><?php echo e(__('Budget Balance')); ?> : </label>

            </div>
        </div>


        <div class="form-group col-lg-12" id="remarks" style="display:none">
            <?php echo e(Form::label('Remarks',__('Remarks'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('remarks',null,array('class'=>'form-control','id'=>'remarksAll','placeholder'=>__('Description')))); ?>

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
            <?php if($status->hod_cost_approval=="1" || $status->hod_cost_approval=="2"): ?>
            <div class="col-12" id="mainsubmit">
                    <input type="submit" value="<?php echo e(__('Approved')); ?>" onclick="training_Approved(1,<?php echo e($status->id); ?>)" class="btn-create btn-success">
                    <input type="submit" value="<?php echo e(__('Reject')); ?>" onclick="traininng_reject(2,<?php echo e($status->id); ?>)" class="btn-create btn-danger">
                    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
            <div class="col-12 remarksSubmit" style="display:none">
                    <input type="submit" value="<?php echo e(__('Remarks Submit')); ?>" onclick="rejectRemarksSubmit(2,<?php echo e($status->id); ?>)" class="btn-create btn-success">
            </div>
            <?php else: ?>
            <?php echo e('First HOD Leave Approve After You can Access'); ?>

            <?php endif; ?>

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
                <div class="col-12" id="mainsubmit">
                    <input type="submit" value="<?php echo e(__('Approved')); ?>" onclick="training_Approved(1,<?php echo e($status->id); ?>)" class="btn-create btn-success">
                    <input type="submit" value="<?php echo e(__('Reject')); ?>" onclick="traininng_reject(2,<?php echo e($status->id); ?>)" class="btn-create btn-danger">
                    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
            </div>
            <div class="col-12 remarksSubmit" style="display:none">
                    <input type="submit" value="<?php echo e(__('Remarks Submit')); ?>" onclick="rejectRemarksSubmit(2,<?php echo e($status->id); ?>)" class="btn-create btn-success">
            </div>
            <?php endif; ?>

        <?php endif; ?>




        <br>
    </div>
</div>
</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/training/approvalStatus.blade.php ENDPATH**/ ?>