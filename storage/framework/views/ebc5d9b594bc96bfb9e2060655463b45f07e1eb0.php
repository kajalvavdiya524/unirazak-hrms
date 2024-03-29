<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo e(!empty($companySettings['title_text']) ? $companySettings['title_text']->value : config('app.name', 'HRMGo')); ?> - <?php echo e($job->title); ?></title>

    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/')).'/'.(isset($companySettings['company_favicon']) && !empty($companySettings['company_favicon'])?$companySettings['company_favicon']->value:'favicon.png')); ?>" type="image" sizes="16x16">

    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/job/css/site.css')); ?>" id="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>

<body>
<header class="header header-transparent" id="header-main">

    <nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light bg-white" id="navbar-main">
        <div class="container px-lg-0">
            <a class="navbar-brand mr-lg-5" href="#">
                <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/logo/')).'/'.(isset($companySettings['company_logo']) && !empty($companySettings['company_logo'])?$companySettings['company_logo']->value:'logo.png')); ?>" id="navbar-logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-main-collapse">

                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <div class="dropdown global-icon" data-toggle="tooltip" data-original-titla="<?php echo e(__('Choose Language')); ?>">
                            <a class="nav-link px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,10">
                                <i class="fas fa-globe-europe"></i>
                                <span class="d-none d-lg-inline-block"><?php echo e(\Str::upper($currantLang)); ?></span>
                            </a>

                            <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item <?php if($language == $currantLang): ?> text-danger <?php endif; ?>" href="<?php echo e(route('job.apply',[$job->code,$language])); ?>"><?php echo e(\Str::upper($language)); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php 
    $gobalcnt=1;
?>
<div class="main-content">
    <!-- Spotlight -->
    <section class="slice slice-xl bg-section-secondary" data-offset-top="#header-main">
        <div class="container pt-6">
            <div class="row row-grid justify-content-center">
                <div class="col-lg-10">
                    <h2 class="h1 mb-4"><?php echo e($job->title); ?></h2>
                    <p class="lead lh-180 text-muted">
                        <?php $__currentLoopData = explode(',',$job->skill); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge badge-secondary"> <?php echo e($skill); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                    <p class="lead lh-180"><i class="fas fa-map-marker-alt"></i> <?php echo e(!empty($job->branches)?$job->branches->name:''); ?> </p>

                </div>
            </div>
        </div>
    </section>

    <section class="slice slice-lg ">
        <div class="container">
            <div class="mb-5 text-center">
                <h3 class=" mt-4"><?php echo e(__('Apply for this job')); ?></h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php echo e(Form::open(array('route'=>array('job.apply.data',$job->code),'method'=>'post', 'enctype' => "multipart/form-data"))); ?>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('name',__('Name'),['class'=>'form-control-label'])); ?>

                            <?php echo e(Form::text('name',null,array('class'=>'form-control name','required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('email',__('Email'),['class'=>'form-control-label'])); ?>

                            <?php echo e(Form::text('email',null,array('class'=>'form-control','required'=>'required'))); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('phone',__('Phone'),['class'=>'form-control-label'])); ?>

                            <?php echo e(Form::text('phone',null,array('class'=>'form-control','required'=>'required'))); ?>

                        </div>
                        <?php if(!empty($job->applicant) && in_array('dob',explode(',',$job->applicant))): ?>
                            <div class="form-group col-md-6 ">
                                <?php echo Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('dob', old('dob'), ['class' => 'form-control datepicker','required'=>'required']); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(!empty($job->applicant) && in_array('gender',explode(',',$job->applicant))): ?>
                            <div class="form-group col-md-6 ">
                                <?php echo Form::label('gender', __('Gender'),['class'=>'form-control-label']); ?>

                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="Male" name="gender" class="custom-control-input" >
                                        <label class="custom-control-label" for="g_male"><?php echo e(__('Male')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_female" value="Female" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="g_female"><?php echo e(__('Female')); ?></label>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($job->applicant) && in_array('country',explode(',',$job->applicant))): ?>
                            <div class="form-group col-md-6 ">
                                <?php echo e(Form::label('country',__('Country'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::text('country',null,array('class'=>'form-control','required'=>'required'))); ?>

                            </div>
                            <div class="form-group col-md-6 country">
                                <?php echo e(Form::label('state',__('State'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::text('state',null,array('class'=>'form-control','required'=>'required'))); ?>

                            </div>
                            <div class="form-group col-md-6 country">
                                <?php echo e(Form::label('city',__('City'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::text('city',null,array('class'=>'form-control','required'=>'required'))); ?>

                            </div>
                        <?php endif; ?>
                        <?php if(!empty($job->visibility) && in_array('profile',explode(',',$job->visibility))): ?>
                            <div class="form-group col-md-6 ">
                                <?php echo e(Form::label('profile',__('Profile'),['class'=>'form-control-label'])); ?>

                                <div class="choose-file form-group">
                                    <label for="profile" class="form-control-label">
                                        <div><?php echo e(__('Choose file here')); ?></div>
                                        <input type="file" class="form-control" name="profile" id="profile" data-filename="profile_create">
                                    </label>
                                    <p class="profile_create"></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($job->visibility) && in_array('resume',explode(',',$job->visibility))): ?>
                            <div class="form-group col-md-6 ">
                                <?php echo e(Form::label('resume',__('CV / Resume'),['class'=>'form-control-label'])); ?>

                                <div class="choose-file form-group">
                                    <label for="resume" class="form-control-label">
                                        <div><?php echo e(__('Choose file here')); ?></div>
                                        <input type="file" class="form-control" name="resume" id="resume" data-filename="resume_create" required>
                                    </label>
                                    <p class="resume_create"></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($job->visibility) && in_array('letter',explode(',',$job->visibility))): ?>
                            <div class="form-group col-md-12 ">
                                <?php echo e(Form::label('cover_letter',__('Cover Letter'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::textarea('cover_letter',null,array('class'=>'form-control','rows'=>'3'))); ?>

                            </div>
                        <?php endif; ?>
                       
                            <?php 
                                $selected_question=explode(',',$job->custom_question);
                                

                            ?>

                        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                <?php if(in_array($question->id, $selected_question)): ?>

                                <?php if($question->custome_question==1): ?>

                                <div class="form-group col-md-12  question question_<?php echo e($question->id); ?>">
                                    <?php echo e(Form::label($question->question,$question->question,['class'=>'form-control-label'])); ?>

                                    <input type="text" class="form-control" name="CustomeQuestion[<?php echo e($question->question); ?>]" <?php echo e(($question->is_required=='yes')?'required':''); ?>>
                                </div>
                                <?php elseif($question->custome_question==2): ?>

                                <?php if($question->checkbox_title): ?> 
                                <?php 
                                $array=json_decode($question->checkbox_title);
                                $optiondata=json_decode($question->checkbox_option);

                                $test= (array) $array;
                                $i=0;
                                ?>
                                    <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <div class="form-group col-md-12 ">
                                        <?php echo e(Form::label($value[$i],__($value[$i]),['class'=>'form-control-label'])); ?>

                                        
                                        <?php $__currentLoopData = $optiondata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                     
                                                    <div class="custom-control custom-checkbox ml-5">
                                                        <input type="checkbox" class="custom-control-input" name="CustomeQuestion[<?php echo e($value[$i]); ?>][]" value="<?php echo e($val); ?>" id="check-<?php echo e($val); ?>">
                                                        <label class="custom-control-label" for="check-<?php echo e($val); ?>"><?php echo e($val); ?> </label>
                                                    </div>
                            
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  <?php endif; ?>     
                                          
                                           
                                <?php elseif($question->custome_question==3): ?>

                                <?php if($question->checkbox_title): ?> 
                                <?php 
                                $array=json_decode($question->radio_title);
                                $optiondata=json_decode($question->radio_option);

                                $test= (array) $array;
                                $i=0;
                                ?>
                                    <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <div class="form-group col-md-12 ">
                                        <?php echo e(Form::label($value[$i],__($value[$i]),['class'=>'form-control-label'])); ?>

                                        
                                        <?php $__currentLoopData = $optiondata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                     
                                                    <div class="custom-control custom-radio ml-5">
                                                        <input type="radio" class="custom-control-input" name="CustomeQuestion[<?php echo e($value[$i]); ?>][]" value="<?php echo e($val); ?>" id="check-<?php echo e($val); ?>">
                                                        <label class="custom-control-label" for="check-<?php echo e($val); ?>"><?php echo e($val); ?> </label>
                                                    </div>
                            
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  <?php endif; ?>  


                                <?php elseif($question->custome_question==4): ?>
                                    
                                    <?php if($question->dropdown_title): ?> 
                                    <?php 
                                    $array=json_decode($question->dropdown_title);
                                    $optiondata=json_decode($question->dropdown_option);

                                    $test= (array) $array;
                                    $i=0;
                                    ?>
                                        <?php $__currentLoopData = $test; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <div class="form-group col-md-12 ">
                                            <?php echo e(Form::label($value[$i],__($value[$i]),['class'=>'form-control-label'])); ?>

                                            <select name="CustomeQuestion[<?php echo e($value[$i]); ?>][]" id="inputbox" class="form-control select2">

                                                <?php $__currentLoopData = $optiondata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ky => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                                
                                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                    <option value="<?php echo e($val); ?>"><?php echo e($val); ?></option>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>  
                                <?php endif; ?>

                             <?php endif; ?>               

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-12">
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-dark rounded-pill"><?php echo e(__('Submit your application')); ?></button>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>


                </div>
            </div>
        </div>
    </section>
</div>

<footer id="footer-main">
    <div class="footer-dark">
        <div class="container">
            <div class="row align-items-center justify-content-md-between py-4 mt-4 delimiter-top">
                <div class="col-md-6">
                    <div class="copyright text-sm font-weight-bold text-center text-md-left">
                        <?php echo e(!empty($companySettings['footer_text']) ? $companySettings['footer_text']->value : ''); ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo e(asset('assets/js/site.core.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/autosize/dist/autosize.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/site.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo.js')); ?> "></script>


<script>
    function show_toastr(title, message, type) {
        var o, i;
        var icon = '';
        var cls = '';

        if (type == 'success') {
            icon = 'fas fa-check-circle';
            cls = 'success';
        } else {
            icon = 'fas fa-times-circle';
            cls = 'danger';
        }

        $.notify({icon: icon, title: " " + title, message: message, url: ""}, {
            element: "body",
            type: cls,
            allow_dismiss: !0,
            placement: {from: 'top', align: 'right'},
            offset: {x: 15, y: 15},
            spacing: 10,
            z_index: 1080,
            delay: 2500,
            timer: 2000,
            url_target: "_blank",
            mouse_over: !1,
            animate: {enter: o, exit: i},
            template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
        });
    }
    if ($(".datepicker").length) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
        });
    }

</script>
<?php if($message = Session::get('success')): ?>
    <script>
        show_toastr('Success', '<?php echo $message; ?>', 'success');
    </script>
<?php endif; ?>
<?php if($message = Session::get('error')): ?>
    <script>
        show_toastr('Error', '<?php echo $message; ?>', 'error');
    </script>
<?php endif; ?>
</body>

</html>
<?php /**PATH /var/www/html/UniRazak/resources/views/job/apply.blade.php ENDPATH**/ ?>