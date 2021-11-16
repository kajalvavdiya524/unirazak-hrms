<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Training')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-fluid">
                <div class="card bg-none card-box">
                    <?php echo e(Form::open(array('url'=>'training/joinTraning','method'=>'post'))); ?>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="card-body employee-detail-body">
                                <div class="row">
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Department')); ?> : </strong>
                                            <span>
                                                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item->id==$createform->department): ?>
                                                        <?php echo e($item->name); ?>

                                                        <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div> 

                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Designation')); ?> : </strong>
                                            <span>
                                                <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item->id==$createform->designation): ?>
                                                        <?php echo e($item->name); ?>

                                                        <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Branch')); ?> : </strong>
                                            <span>
                                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item->id==$createform->branch): ?>
                                                        <?php echo e($item->name); ?>

                                                        <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Program Title')); ?> : </strong>
                                            <span>
                                                        <?php echo e($createform->program_title); ?>

                                            </span>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Program Venue')); ?> : </strong>
                                            <span>
                                                        <?php echo e($createform->program_venue); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Trainer Option')); ?> : </strong>
                                            <span>
                                                    <?php if($createform->trainer_option==0): ?>
                                                        <?php echo e('internal'); ?>

                                                    <?php else: ?>
                                                        <?php echo e('external'); ?>

                                                    <?php endif; ?>                                                
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Training Type')); ?> : </strong>
                                            <span>        
                                                <?php $__currentLoopData = $trainingTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->id==$createform->training_type): ?>
                                                    <?php echo e($item->name); ?>

                                                    <?php endif; ?>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Trainer')); ?> : </strong>
                                            <span>        
                                                <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->id==$createform->trainer): ?>
                                                    <?php echo e($item->firstname); ?>

                                                    <?php endif; ?>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Training Cost')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->training_cost); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Employee')); ?> : </strong>
                                            <span>        
                                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($item->id==$createform->employee): ?>
                                                    <?php echo e($item->name); ?>

                                                    <?php endif; ?>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Employee No')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->employee_no); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Start Date')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->start_date); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('End Date')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->end_date); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Organize')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->organize); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Contact Person')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->contact_person); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Address')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->address); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('City')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->city); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('State')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->state); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Country')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->country); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Post Code')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->postcode); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('phone')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->phone); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Fax')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->fax); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Email')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->email); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Web site')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->website); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Approved Status')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->approved_status); ?>

                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="info text-sm">
                                            <strong><?php echo e(__('Description')); ?> : </strong>
                                            <span>        
                                                <?php echo e($createform->description); ?>

                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        <input type="hidden" name="training_id" value="<?php echo e($createform->id); ?>">
                        <div class="form-group col-lg-12">
                            <?php echo e(Form::label('reasonjoining',__('Justification for attending course'),['class'=>'form-control-label'])); ?><span class="text-danger pl-1">*</span>
                            <?php echo e(Form::textarea('reason_joining',null,array('class'=>'form-control','placeholder'=>__('Reason for Joining the Training')))); ?>

                        </div>
                        
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('trainingTask', __('Training Task'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_m" value="database admin" name="traing_task" class="custom-control-input">
                                        <label class="custom-control-label" for="g_m"><?php echo e(__('Database Admin')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_f" value="oracle database knowlegde" name="traing_task" class="custom-control-input">
                                        <label class="custom-control-label" for="g_f"><?php echo e(__('Oracle database knowlegde')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-lg-12">
                            <?php echo e(Form::label('rate',__('In General, how do you rate yourself in executing your job'),['class'=>'form-control-label'])); ?><span class="text-danger pl-1">*</span>
                            <div class="d-flex radio-check">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="g_mrate" value="Competent" name="rate_yourself" class="custom-control-input">
                                    <label class="custom-control-label" for="g_mrate"><?php echo e(__('Competent')); ?></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="g_frate" value="satisfactory" name="rate_yourself" class="custom-control-input">
                                    <label class="custom-control-label" for="g_frate"><?php echo e(__('satisfactory')); ?></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="g_fs" value="Not satisfactory" name="rate_yourself" class="custom-control-input">
                                    <label class="custom-control-label" for="g_fs"><?php echo e(__('Not satisfactory')); ?></label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <?php echo e(Form::label('trainingCondition',__('Training Condition'),['class'=>'form-control-label'])); ?><span class="text-danger pl-1">*</span>
                            
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="gender" id="check-gr">
                                    <label class="custom-control-label" for="check-gr"><?php echo e(__('Knowledge')); ?> </label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="dob" id="check-knowledge">
                                    <label class="custom-control-label" for="check-knowledge"><?php echo e(__('lack of knowledge')); ?></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="country" id="check-Oracle">
                                    <label class="custom-control-label" for="check-Oracle"><?php echo e(__('More training and expose to Oracle')); ?></label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="training_condition[]" value="country" id="check-exersize">
                                    <label class="custom-control-label" for="check-exersize"><?php echo e(__('More training and exersize')); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <?php echo e(Form::label('improveworkdetails',__('How do you think the training can help you improve your work ?'),['class'=>'form-control-label'])); ?><span class="text-danger pl-1">*</span>
                            <?php echo e(Form::textarea('improve_your_work_details',null,array('class'=>'form-control','placeholder'=>__('how do you think the training can help you improve your work')))); ?>

                        </div>
                        <div class="form-group col-lg-12">
                            <?php echo e(Form::label('applyknowledge',__('How do you intend to apply the knowledge, skill or behaviours you have learned during the training.(Please indicate in a measurable or observable and attainable outcome/behaviour in next 6 months)'),['class'=>'form-control-label'])); ?><span class="text-danger pl-1">*</span>
                            <?php echo e(Form::textarea('apply_the_knowledge',null,array('class'=>'form-control','placeholder'=>__('How do you intend to apply the knowledge, skill or behaviours you have learned during the training.(Please indicate in a measurable or observable and attainable outcome/behaviour in next 6 months)')))); ?>

                        </div>

                        <div class="col-12">
                            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
                            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>









<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/UniRazak/resources/views/training/staffregisterTraining.blade.php ENDPATH**/ ?>