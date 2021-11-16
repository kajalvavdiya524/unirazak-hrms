<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Join Training List')); ?>

    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('action-button'); ?>
    <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body py-0">
                    <?php if(\Auth::user()->type != 'employee'): ?>
                        <?php echo e(Form::open(array('route' => array('training.joinTrainingList'),'method'=>'get','id'=>'jointraining_filter'))); ?>

                        <div class="row d-flex justify-content-end mt-2">
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        <?php echo e(Form::label('Name',__('Name'),['class'=>'text-type'])); ?>

                                        <?php echo e(Form::text('name',isset($_GET['name'])?$_GET['name']:'',array('class'=>'month-btn form-control'))); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        <?php echo e(Form::label('start_date',__('Start Date'),['class'=>'text-type'])); ?>

                                        <?php echo e(Form::text('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'month-btn form-control datepicker'))); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3">
                                <div class="all-select-box">
                                    <div class="btn-box">
                                        <?php echo e(Form::label('end_date',__('End Date'),['class'=>'text-type'])); ?>

                                        <?php echo e(Form::text('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'month-btn form-control datepicker'))); ?>

                                    </div>
                                </div>
                            </div>
                        
                            <div class="col-auto my-auto">
                                <a href="#" class="apply-btn" onclick="document.getElementById('jointraining_filter').submit(); return false;" data-toggle="tooltip" data-original-title="<?php echo e(__('apply')); ?>">
                                    <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
                                </a>
                                <a href="<?php echo e(route('training.joinTrainingList')); ?>" class="reset-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('Reset')); ?>">
                                    <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
                                </a>

                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 dataTable" >
                            <thead>
                            <tr>
                                <th><?php echo e(__('Applied Date')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Program Title')); ?></th>
                                <th><?php echo e(__('Date Start')); ?></th>
                                <th><?php echo e(__('Date End')); ?></th>
                                <th><?php echo e(__('Organizer')); ?> </th>
                                <th><?php echo e(__('HOD Approved Status')); ?> </th>
                                <th><?php echo e(__('HR Verify Status')); ?> </th>
                                <?php if(\Auth::user()->type != 'employee'): ?>
                                    <th width="200px"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody class="font-style" id="customejointrainer">
                            <?php $__currentLoopData = $join_train; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(\Auth::user()->dateFormat($training->start_date)); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->id==$training->employee): ?>
                                                <?php echo e($item->name); ?>

                                                <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($training->program_title); ?> </td>
                                    <td><?php echo e(\Auth::user()->dateFormat($training->start_date)); ?> </th>
                                    <th><?php echo e(\Auth::user()->dateFormat($training->end_date)); ?></td>
                                    <th><?php echo e($training->organize); ?></td>
                                    <th>
                                        <?php if(\Auth::user()->type != 'employee'): ?>
                                            <?php if($training->hod_cost_approval==0): ?>
                                                    <?php echo e('new'); ?>

                                            <?php elseif($training->hod_cost_approval==1): ?>
                                                <?php echo e('verified'); ?>

                                            <?php elseif($training->hod_cost_approval==2): ?>
                                                <?php echo e('Rejected'); ?>

                                            <?php else: ?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if($training->hod_cost_approval==0): ?>
                                            <?php echo e('new'); ?>

                                            <?php elseif($training->hod_cost_approval==1): ?>
                                                <?php echo e('verified'); ?>

                                            <?php elseif($training->hod_cost_approval==2): ?>
                                                <?php echo e('Rejected'); ?>

                                            <?php else: ?>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                        
                                    </td>
                                    <th>
                                        <?php if(\Auth::user()->type != 'employee'): ?>
                                            <?php if($training->hr_cost_approval == "0"): ?>
                                                    <?php echo e('new'); ?>

                                            <?php elseif($training->hr_cost_approval == "1"): ?>
                                                <?php echo e('verified'); ?>

                                            <?php elseif($training->hr_cost_approval == "2"): ?>
                                                <?php echo e('Rejected'); ?>

                                             <?php else: ?>  
                                             <?php endif; ?> 
                                        <?php else: ?>
                                            <?php if($training->hod_cost_approval==0): ?>
                                            <?php echo e('new'); ?>

                                            <?php elseif($training->hod_cost_approval==1): ?>
                                                <?php echo e('verified'); ?>

                                            <?php elseif($training->hod_cost_approval==2): ?>
                                                <?php echo e('Rejected'); ?>

                                            <?php else: ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        
                                    </td>
                                   
                                   <?php if(\Auth::user()->type != 'employee'): ?>

                                    <th>
                                        <a href="#"  data-url="<?php echo e(route('training.approve-status',$training->user_id)); ?>" data-size="lg" data-ajax-popup="true" <?php if(\Auth::user()->type == 'hr'): ?> data-title="<?php echo e(__('HR Approved Amount Details')); ?>" <?php else: ?> data-title="<?php echo e(__('HOD Approved Amount Details')); ?>" <?php endif; ?>  data-toggle="tooltip"  data-original-title="<?php echo e(__('status ')); ?>" class="edit-icon"><i class="fas fa-eye"></i></a>

                                    </th>
                                    <?php endif; ?>
                                    
                                   
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/UniRazak/resources/views/training/joinTraingList.blade.php ENDPATH**/ ?>