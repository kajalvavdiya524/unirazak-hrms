<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Job Application Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link href="<?php echo e(asset('assets/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>" rel="stylesheet"/>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>

    <script src="<?php echo e(asset('assets/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>

    <script>
        var e = $('[data-toggle="tags"]');
        e.length && e.each(function () {
            $(this).tagsinput({tagClass: "badge badge-primary"})
        });

        $(document).ready(function () {

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function (e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function () {
                $(this).parent().children('li.star').each(function (e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function () {

                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                $.ajax({
                    url: '<?php echo e(route('job.application.rating',$jobApplication->id)); ?>',
                    type: 'POST',
                    data: {rating: ratingValue, "_token": $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {

                    },
                    error: function (data) {
                        data = data.responseJSON;
                        show_toastr('Error', data.error, 'error')
                    }
                });

            });


        });
        $(document).on('change', '.stages', function () {
            var id = $(this).val();
            var schedule_id = $(this).attr('data-scheduleid');

            $.ajax({
                url: "<?php echo e(route('job.application.stage.change')); ?>",
                type: 'POST',
                data: {
                    "stage": id, "schedule_id": schedule_id, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    show_toastr('Suceess', data.success, 'success');
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-fluid">
                <div class="card-header">
                    <div class="row">
                        <div class="col-auto">
                            <h6 class="text-muted"><?php echo e(__('Basic Details')); ?></h6>
                        </div>
                        <div class="col text-right">
                            <ul class="list-inline mb-0">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Job Application')): ?>
                                    <li class="list-inline-item">

                                        <a href="#" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('archive-form-<?php echo e($jobApplication->id); ?>').submit();">
                                            <?php if($jobApplication->is_archive==0): ?>
                                                <span class="badge badge-pill badge-soft-info"><?php echo e(__('Archive')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-soft-warning"><?php echo e(__('UnArchive')); ?></span>
                                            <?php endif; ?>
                                        </a>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['job.application.archive', $jobApplication->id],'id'=>'archive-form-'.$jobApplication->id]); ?>

                                        <?php echo Form::close(); ?>


                                    </li>
                                    <?php if($jobApplication->is_archive==0): ?>
                                        <li class="list-inline-item">
                                            <a href="#" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($jobApplication->id); ?>').submit();"><span class="badge badge-pill badge-soft-danger"><?php echo e(__('Delete')); ?></span></a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['job-application.destroy', $jobApplication->id],'id'=>'delete-form-'.$jobApplication->id]); ?>

                                            <?php echo Form::close(); ?>

                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <h5 class="h4">
                        <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="2 hrs ago" data-original-title="" title="">
                            <div>
                                <a href="#" class="avatar rounded-circle avatar-sm">
                                    <img src="<?php echo e(!empty($jobApplication->profile)? asset('/storage/uploads/job/profile/'.$jobApplication->profile):asset('/storage/uploads/avatar/avatar.png')); ?>" class="">
                                </a>
                            </div>
                            <div class="flex-fill ml-3">
                                <div class="h6 text-sm mb-0"> <?php echo e($jobApplication->name); ?></div>
                                <p class="text-sm lh-140 mb-0">
                                    <?php echo e($jobApplication->email); ?>

                                </p>
                            </div>
                        </div>
                    </h5>

                    <div class="py-2 my-4 border-top ">
                        <div class="row align-items-center my-3">
                            <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="stage_<?php echo e($stage->id); ?>" name="stage" data-scheduleid="<?php echo e($jobApplication->id); ?>" value="<?php echo e($stage->id); ?>" class="custom-control-input stages" <?php echo e(($jobApplication->stage==$stage->id)?'checked':''); ?>>
                                    <label class="custom-control-label" for="stage_<?php echo e($stage->id); ?>"><?php echo e($stage->title); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-12 text-right">
                            <a href="#" data-url="<?php echo e(route('job.on.board.create', $jobApplication->id)); ?>" data-ajax-popup="true" class="btn btn-xs btn-white btn-icon-only width-auto">  <?php echo e(__('Add to Job OnBoard')); ?></a>
                        </div>
                    </div>

                    <div class="py-4 my-4 border-top border-bottom">
                        <h6 class="text-sm"><?php echo e(__('Cover Letter')); ?>:</h6>
                        <p class="text-sm mb-0">
                            <?php echo e($jobApplication->cover_letter); ?>

                        </p>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Phone')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-sm"><?php echo e($jobApplication->phone); ?></span></dd>
                        <?php if(!empty($jobApplication->dob)): ?>
                            <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('DOB')); ?></span></dt>
                            <dd class="col-sm-9"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($jobApplication->dob)); ?></span></dd>
                        <?php endif; ?>
                        <?php if(!empty($jobApplication->gender)): ?>
                            <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Gender')); ?></span></dt>
                            <dd class="col-sm-9"><span class="text-sm"><?php echo e($jobApplication->gender); ?></span></dd>
                        <?php endif; ?>
                        <?php if(!empty($jobApplication->country)): ?>
                            <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Country')); ?></span></dt>
                            <dd class="col-sm-9"><span class="text-sm"><?php echo e($jobApplication->country); ?></span></dd>
                        <?php endif; ?>
                        <?php if(!empty($jobApplication->state)): ?>
                            <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('State')); ?></span></dt>
                            <dd class="col-sm-9"><span class="text-sm"><?php echo e($jobApplication->state); ?></span></dd>
                        <?php endif; ?>
                        <?php if(!empty($jobApplication->city)): ?>
                            <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('City')); ?></span></dt>
                            <dd class="col-sm-9"><span class="text-sm"><?php echo e($jobApplication->city); ?></span></dd>
                        <?php endif; ?>

                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Applied For')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-sm"><?php echo e(!empty($jobApplication->jobs)?$jobApplication->jobs->title:'-'); ?></span></dd>

                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Applied at')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($jobApplication->created_at)); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('CV / Resume')); ?></span></dt>
                        <dd class="col-sm-9">
                            <?php if(!empty($jobApplication->resume)): ?>
                                <span class="text-sm">
                                <a href="<?php echo e(asset(Storage::url('uploads/job/resume')).'/'.$jobApplication->resume); ?>" target="_blank"><i class="fas fa-download"></i></a>
                            </span>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </dd>

                    </dl>
                    <div class='rating-stars text-right'>
                        <ul id='stars'>
                            <li class='star <?php echo e((in_array($jobApplication->rating,[1,2,3,4,5])==true)?'selected':''); ?>' data-toggle="tooltip" data-title="Poor" data-value='1'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star <?php echo e((in_array($jobApplication->rating,[2,3,4,5])==true)?'selected':''); ?>' data-toggle="tooltip" data-title='Fair' data-value='2'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star <?php echo e((in_array($jobApplication->rating,[3,4,5])==true)?'selected':''); ?>' data-toggle="tooltip" data-title='Good' data-value='3'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star <?php echo e((in_array($jobApplication->rating,[4,5])==true)?'selected':''); ?>' data-toggle="tooltip" data-title='Excellent' data-value='4'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                            <li class='star <?php echo e((in_array($jobApplication->rating,[5])==true)?'selected':''); ?>' data-toggle="tooltip" data-title='WOW!!!' data-value='5'>
                                <i class='fa fa-star fa-fw'></i>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-8">
            <div class="card card-fluid">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-muted"><?php echo e(__('Additional Details')); ?></h6>
                        </div>
                        <div class="col text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Interview Schedule')): ?>
                                <a href="#" data-url="<?php echo e(route('interview-schedule.create',$jobApplication->id)); ?>" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="<?php echo e(__('Create New Interview Schedule')); ?>">
                                    <i class="fa fa-plus"></i> <?php echo e(__('Create Interview Schedule')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(!empty(json_decode($jobApplication->custom_question))): ?>
                        <div class="list-group list-group-flush mb-4">
                            <?php $__currentLoopData = json_decode($jobApplication->custom_question); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $que => $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($ans)): ?>
                                    <div class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <a href="#!" class="d-block h6 text-sm mb-0"><?php echo e($que); ?></a>
                                                <p class="card-text text-sm text-muted mb-0">
                                                    <?php echo e($ans); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::open(array('route'=>array('job.application.skill.store',$jobApplication->id),'method'=>'post'))); ?>

                    <div class="form-group">
                        <label class="form-control-label"><?php echo e(__('Skills')); ?></label>
                        <input type="text" class="form-control" value="<?php echo e($jobApplication->skill); ?>" data-toggle="tags" name="skill" placeholder="<?php echo e(__('Type here....')); ?>"/>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Add Job Application Skill')): ?>
                        <div class="form-group">
                            <input type="submit" value="<?php echo e(__('Add Skills')); ?>" class="btn-create badge-blue">
                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::close()); ?>



                    <?php echo e(Form::open(array('route'=>array('job.application.note.store',$jobApplication->id),'method'=>'post'))); ?>

                    <div class="form-group">
                        <label class="form-control-label"><?php echo e(__('Applicant Notes')); ?></label>
                        <textarea name="note" class="form-control" id="" rows="3"></textarea>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Add Job Application Note')): ?>
                        <div class="form-group">
                            <input type="submit" value="<?php echo e(__('Add Notes')); ?>" class="btn-create badge-blue">
                        </div>
                    <?php endif; ?>
                    <?php echo e(Form::close()); ?>


                    <div class="list-group list-group-flush mb-4">
                        <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="list-group-item px-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <a href="#!" class="d-block h6 text-sm mb-0"><?php echo e(!empty($note->noteCreated)?$note->noteCreated->name:'-'); ?></a>
                                        <p class="card-text text-sm text-muted mb-0">
                                            <?php echo e($note->note); ?>

                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#" class=""> <?php echo e(\Auth::user()->dateFormat($note->created_at)); ?></a>
                                    </div>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Job Application Note')): ?>
                                        <?php if($note->note_created==\Auth::user()->id): ?>
                                            <div class="col-auto text-right">
                                                <a class="delete-icon" href="#" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($note->id); ?>').submit();"> <i class="fas fa-trash"></i></a>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['job.application.note.destroy', $note->id],'id'=>'delete-form-'.$note->id]); ?>

                                                <?php echo Form::close(); ?>

                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myunicr/public_html/resources/views/jobApplication/show.blade.php ENDPATH**/ ?>