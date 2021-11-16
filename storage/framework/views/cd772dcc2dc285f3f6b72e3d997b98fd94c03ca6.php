<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Job Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Job')): ?>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="<?php echo e(route('job.edit',$job->id)); ?>" data-title="<?php echo e(__('Edit Job')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-pencil-alt"></i></a>
            </div>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered mt-3">
                            <tbody>
                            <tr>
                                <td><?php echo e(__('Job Title')); ?></td>
                                <td class=""><?php echo e($job->title); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('Branch')); ?></td>
                                <td class=""><?php echo e(!empty($job->branches)?$job->branches->name:__('All')); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('Job Category')); ?></td>
                                <td class=""><?php echo e(!empty($job->categories)?$job->categories->title:'-'); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('Positions')); ?></td>
                                <td class=""><?php echo e($job->position); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('Status')); ?></td>
                                <td class="">
                                    <?php if($job->status=='active'): ?>
                                        <span class="badge badge-success"><?php echo e(App\Job::$status[$job->status]); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-danger"><?php echo e(App\Job::$status[$job->status]); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('Created Date')); ?></td>
                                <td class=""><?php echo e(\Auth::user()->dateFormat($job->created_at)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('Start Date')); ?></td>
                                <td class=""><?php echo e(\Auth::user()->dateFormat($job->start_date)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('End Date')); ?></td>
                                <td class=""><?php echo e(\Auth::user()->dateFormat($job->end_date)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(__('Skill')); ?></td>
                                <td class="">
                                    <?php $__currentLoopData = $job->skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-primary"><?php echo e($skill); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-fluid">
                <div class="card-body">
                    <div class="col-12">
                        <div class="row">

                            <?php if(($job->applicant)): ?>
                                <div class="col-6">
                                    <h6><?php echo e(__('Need to ask ?')); ?></h6>
                                    <ul class="">
                                        <?php $__currentLoopData = $job->applicant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e(ucfirst($applicant)); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($job->visibility)): ?>
                                <div class="col-6">
                                    <h6><?php echo e(__('Need to show option ?')); ?></h6>
                                    <ul class="">
                                        <?php $__currentLoopData = $job->visibility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visibility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e(ucfirst($visibility)); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>

                                </div>
                            <?php endif; ?>

                            <?php if(count($job->questions())>0): ?>
                                <div class="col-12">
                                    <h6><?php echo e(__('Custom Question')); ?></h6>
                                    <ul class="">
                                        <?php $__currentLoopData = $job->questions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($question->question); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="row ">
                            <div class="col-12 mt-3">
                                <h6><?php echo e(__('Job Description')); ?></h6>
                                <?php echo $job->description; ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <h6><?php echo e(__('Job Requirement')); ?></h6>
                                <?php echo $job->requirement; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myunicr/public_html/resources/views/job/show.blade.php ENDPATH**/ ?>