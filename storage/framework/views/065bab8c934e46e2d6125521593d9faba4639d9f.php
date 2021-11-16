<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=Utility::getValByName('company_logo');
    $company_small_logo=Utility::getValByName('company_small_logo');
    $company_favicon=Utility::getValByName('company_favicon');
?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '.email-template-checkbox', function () {
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {

                },
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="nav-tabs">
                <div class="col-lg-12 our-system">
                    <div class="row">
                        <ul class="nav nav-tabs my-4">
                            <li>
                                <a data-toggle="tab" class="active" id="contact-tab4" href="#business-setting"><?php echo e(__('Business Setting')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="contact-tab4" href="#system-setting"><?php echo e(__('System Setting')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="profile-tab3" href="#company-setting"><?php echo e(__('Company Setting')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="profile-tab2" href="#email-setting"><?php echo e(__('Email Notification Setting')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" id="profile-tab2" href="#ip-restrict-setting"><?php echo e(__('Ip Restrict Setting')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="business-setting">
                        <?php echo e(Form::model($settings,array('route'=>'business.setting','method'=>'POST','enctype' => "multipart/form-data"))); ?>

                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('Business settings')); ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title"><?php echo e(__('Logo')); ?></h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="logo-content">
                                        <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" class="big-logo">
                                    </div>
                                    <div class="choose-file mt-5">
                                        <label for="company_logo">
                                            <div><?php echo e(__('Choose file here')); ?></div>
                                            <input type="file" class="form-control" name="company_logo" id="company_logo" data-filename="edit-logo">
                                        </label>
                                        <p class="edit-logo"></p>
                                    </div>

                                    <?php $__errorArgs = ['company_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-logo" role="alert">
                                        <small class="text-danger"><?php echo e($message); ?></small>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title"><?php echo e(__('Favicon')); ?></h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="logo-content">
                                        <img src="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" class="small-logo">
                                    </div>
                                    <div class="choose-file mt-5">
                                        <label for="company_favicon">
                                            <div><?php echo e(__('Choose file here')); ?></div>
                                            <input type="file" class="form-control" name="company_favicon" id="company_favicon" data-filename="edit-favicon">
                                        </label>
                                        <p class="edit-favicon"></p>
                                    </div>
                                    <?php $__errorArgs = ['company_favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-logo" role="alert">
                                        <small class="text-danger"><?php echo e($message); ?></small>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6">
                                <h4 class="small-title"><?php echo e(__('Settings')); ?></h4>
                                <div class="card setting-card setting-logo-box">
                                    <div class="form-group">
                                        <?php echo e(Form::label('title_text',__('Title Text'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))); ?>

                                        <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-title_text" role="alert">
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-right">
                                <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create btn-xs radius-10px badge-blue">
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <div class="tab-pane" id="system-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('System Settings')); ?></h4>
                                </div>
                            </div>
                            <div class="card bg-none p-4">
                                <?php echo e(Form::model($settings,array('route'=>'system.settings','method'=>'post'))); ?>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('site_currency',__('Currency *'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('site_currency',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['site_currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-site_currency" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('site_currency_symbol',__('Currency Symbol *'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('site_currency_symbol',null,array('class'=>'form-control'))); ?>

                                        <?php $__errorArgs = ['site_currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-site_currency_symbol" role="alert">
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label text-dark" for="example3cols3Input"><?php echo e(__('Currency Symbol Position')); ?></label>
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">
                                                    <div class="d-flex radio-check">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="pre_symbol" name="site_currency_symbol_position" class="custom-control-input" value="pre" <?php if($settings['site_currency_symbol_position'] == 'pre'): ?> checked <?php endif; ?>>
                                                            <label class="custom-control-label" for="pre_symbol"><?php echo e(__('Pre')); ?></label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="post_symbol" name="site_currency_symbol_position" class="custom-control-input" value="post" <?php if($settings['site_currency_symbol_position'] == 'post'): ?> checked <?php endif; ?>>
                                                            <label class="custom-control-label" for="post_symbol"><?php echo e(__('Post')); ?></label>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="site_date_format" class="form-control-label text-dark"><?php echo e(__('Date Format')); ?></label>
                                        <select type="text" name="site_date_format" class="form-control select2" id="site_date_format">
                                            <option value="M j, Y" <?php if(@$settings['site_date_format'] == 'M j, Y'): ?> selected="selected" <?php endif; ?>>Jan 1,2015</option>
                                            <option value="d-m-Y" <?php if(@$settings['site_date_format'] == 'd-m-Y'): ?> selected="selected" <?php endif; ?>>d-m-y</option>
                                            <option value="m-d-Y" <?php if(@$settings['site_date_format'] == 'm-d-Y'): ?> selected="selected" <?php endif; ?>>m-d-y</option>
                                            <option value="Y-m-d" <?php if(@$settings['site_date_format'] == 'Y-m-d'): ?> selected="selected" <?php endif; ?>>y-m-d</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="site_time_format" class="form-control-label text-dark"><?php echo e(__('Time Format')); ?></label>
                                        <select type="text" name="site_time_format" class="form-control select2" id="site_time_format">
                                            <option value="g:i A" <?php if(@$settings['site_time_format'] == 'g:i A'): ?> selected="selected" <?php endif; ?>>10:30 PM</option>
                                            <option value="g:i a" <?php if(@$settings['site_time_format'] == 'g:i a'): ?> selected="selected" <?php endif; ?>>10:30 pm</option>
                                            <option value="H:i" <?php if(@$settings['site_time_format'] == 'H:i'): ?> selected="selected" <?php endif; ?>>22:30</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('employee_prefix',__('Employee Prefix'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('employee_prefix',null,array('class'=>'form-control'))); ?>

                                        <?php $__errorArgs = ['employee_prefix'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-employee_prefix" role="alert">
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-12 text-right">
                                        <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="company-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('Company Setting')); ?></h4>
                                </div>
                            </div>
                            <div class="card bg-none p-4">
                                <?php echo e(Form::model($settings,array('route'=>'company.settings','method'=>'post'))); ?>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_name *',__('Company Name *'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_name',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['company_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_name" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_address',__('Address'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_address',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['company_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_address" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_city',__('City'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_city',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['company_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_city" role="alert">
                                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                                </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_state',__('State'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_state',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['company_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_state" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_zipcode',__('Zip/Post Code'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_zipcode',null,array('class'=>'form-control'))); ?>

                                        <?php $__errorArgs = ['company_zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_zipcode" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <?php echo e(Form::label('company_country',__('Country'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_country',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['company_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_country" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_telephone',__('Telephone'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_telephone',null,array('class'=>'form-control'))); ?>

                                        <?php $__errorArgs = ['company_telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_telephone" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_email',__('System Email *'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_email',null,array('class'=>'form-control'))); ?>

                                        <?php $__errorArgs = ['company_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_email" role="alert">
                                                            <small class="text-danger"><?php echo e($message); ?></small>
                                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <?php echo e(Form::label('company_email_from_name',__('Email (From Name) *'),['class'=>'form-control-label text-dark'])); ?>

                                        <?php echo e(Form::text('company_email_from_name',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['company_email_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-company_email_from_name" role="alert">
                                                                <small class="text-danger"><?php echo e($message); ?></small>
                                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <?php echo e(Form::label('company_start_time',__('Company Start Time *'),['class'=>'form-control-label text-dark'])); ?>


                                                <?php echo e(Form::text('company_start_time',null,array('class'=>'form-control timepicker_format'))); ?>

                                                <?php $__errorArgs = ['company_start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-company_start_time" role="alert">
                                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?php echo e(Form::label('company_end_time',__('Company End Time *'),['class'=>'form-control-label text-dark'])); ?>

                                                <?php echo e(Form::text('company_end_time',null,array('class'=>'form-control timepicker_format'))); ?>

                                                <?php $__errorArgs = ['company_end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-company_end_time" role="alert">
                                                                    <small class="text-danger"><?php echo e($message); ?></small>
                                                                </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('timezone',__('Timezone'),['class'=>'form-control-label text-dark'])); ?>

                                        <select type="text" name="timezone" class="form-control select2" id="timezone">
                                            <option value=""><?php echo e(__('Select Timezone')); ?></option>
                                            <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>" <?php echo e((env('TIMEZONE')==$k)?'selected':''); ?>><?php echo e($timezone); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                    <div class="col-md-6 py-5">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="ip_restrict" id="ip_restrict" <?php echo e($settings['ip_restrict'] == 'on' ? 'checked="checked"' : ''); ?> >
                                            <label class="custom-control-label form-control-label" for="ip_restrict"><?php echo e(__('Ip Restrict')); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-right">
                                        <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="email-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('Email Notification Setting')); ?></h4>
                                </div>
                            </div>
                            <div class="card bg-none ">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0 dataTable">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('Module')); ?></th>
                                                <th class="text-right"><?php echo e(__('On/Off')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = \App\Utility::$emailStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="font-style odd" role="row">
                                                    <td class="sorting_1"><?php echo e($email); ?></td>
                                                    <td class="action text-right">
                                                        <label class="switch">
                                                            <input type="checkbox" class="email-template-checkbox" name="<?php echo e($key); ?>" <?php echo e(\App\Utility::getValByName("$key") ==1 ?'checked':''); ?> value="<?php echo e(\App\Utility::getValByName("$key") ==1 ?'1':'0'); ?>" data-url="<?php echo e(route('company.email.setting',$key)); ?>">
                                                            <span class="slider1 round"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="ip-restrict-setting">
                        <div class="col-md-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0">
                                    <h4 class="h4 font-weight-400 float-left pb-2"><?php echo e(__('Ip Restrict Setting')); ?></h4>
                                </div>
                                <div class="col-md-6 col-sm-6 mb-3 mb-md-0 text-right">
                                    <a href="#" data-url="<?php echo e(route('create.ip')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="<?php echo e(__('Create New IP')); ?>">
                                        <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                                    </a>
                                </div>
                            </div>
                            <div class="card bg-none ">
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0 dataTable">
                                            <thead>
                                            <tr>
                                                <th><?php echo e(__('IP')); ?></th>
                                                <th class=""><?php echo e(__('Action')); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $ips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="font-style odd" role="row">
                                                    <td class="sorting_1"><?php echo e($ip->ip); ?></td>
                                                    <td class="">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Company Settings')): ?>
                                                            <a href="#" data-url="<?php echo e(route('edit.ip',$ip->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit IP')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-pencil-alt"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Company Settings')): ?>
                                                            <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($ip->id); ?>').submit();"><i class="fas fa-trash"></i></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['destroy.ip', $ip->id],'id'=>'delete-form-'.$ip->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myunicr/public_html/resources/views/setting/company_settings.blade.php ENDPATH**/ ?>