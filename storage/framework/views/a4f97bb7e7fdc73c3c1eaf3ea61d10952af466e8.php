<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url'=>'training','method'=>'post'))); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('Department',__('Department'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('department',$department,null,array('class'=>'form-control select2','required'=>'required'))); ?>



            </div>
            <div class="form-group">
                <?php echo e(Form::label('Designation',__('Designation'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('Designation',$designations,null,array('class'=>'form-control select2','required'=>'required'))); ?>



            </div>
            <div class="form-group">
                <?php echo e(Form::label('branch',__('Branch'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('branch',$branches,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
            <div class="form-group">
                <?php echo e(Form::label('ProgramTitle',__('Program Title'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('ProgramTitle',null,array('class'=>'form-control'))); ?>


            </div>
            <div class="form-group">
                <?php echo e(Form::label('ProgramVenue',__('Program Venue'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('ProgramVenue',null,array('class'=>'form-control'))); ?>


            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('trainer_option',__('Trainer Option'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('trainer_option',$options,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('training_type',__('Training Type'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('training_type',$trainingTypes,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('trainer',__('Trainer'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('trainer',$trainers,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('training_cost',__('(RM)Training Cost'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::number('training_cost',null,array('class'=>'form-control','step'=>'0.01','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('gender', __('Cost By'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="hr" name="costby" class="custom-control-input">
                                        <label class="custom-control-label" for="g_male"><?php echo e(__('Hr')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_Employee" value="employee" name="costby" class="custom-control-input">
                                        <label class="custom-control-label" for="g_Employee"><?php echo e(__('Employee')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('employee',__('Employee'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('employee',$employees,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('employee_No',__('Employee No'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('employee_No',null,array('class'=>'form-control'))); ?>


            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('start_date',null,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('end_date',__('End Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('end_date',null,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('Organize',__('Organize'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('Organize',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('contactPerson',__('Contact Person'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('contactPerson',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('Address',__('Address'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('Address',null,array('class'=>'form-control','placeholder'=>__('Description')))); ?>

        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('city',__('City'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('city',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('state',__('State'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('state',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('country',__('Country'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('country',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('postcode',__('Post Code'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('postcode',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('phone',__('phone'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::number('phone',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('fax',__('Fax'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('fax',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('email',__('Email'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::email('email',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('website',__('Web site'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('website',null,array('class'=>'form-control'))); ?>

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('approved_status',__('Approved Status'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('approved_status', $is_required,null, array('class' => 'form-control select2','required'=>'required'))); ?>

            </div>
        </div>

        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Description')))); ?>

        </div>
        
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/training/create.blade.php ENDPATH**/ ?>