<div class="card bg-none card-box">
    <?php echo e(Form::model($training,array('route' => array('training.update', $training->id), 'method' => 'PUT'))); ?>

    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('Department',__('Department'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('department',$department,$training->department,array('class'=>'form-control select2','required'=>'required'))); ?>



            </div>
            <div class="form-group">
                <?php echo e(Form::label('Designation',__('Designation'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('Designation',$designations,$training->designation,array('class'=>'form-control select2','required'=>'required'))); ?>



            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('branch',__('Branch'),['class'=>'form-control-label'])); ?>

                    <?php echo e(Form::select('branch',$branches,$training->branch,array('class'=>'form-control select2','required'=>'required'))); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo e(Form::label('ProgramTitle',__('Program Title'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('ProgramTitle',$training->program_title,array('class'=>'form-control'))); ?>


            </div>
            <div class="form-group">
                <?php echo e(Form::label('ProgramVenue',__('Program Venue'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('ProgramVenue',$training->program_venue,array('class'=>'form-control'))); ?>


            </div>
</div>
            <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('trainer_option',__('Trainer Option'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('trainer_option',$options,$training->trainer_option,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('training_type',__('Training Type'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('training_type',$trainingTypes,$training->training_type,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('trainer',__('Trainer'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('trainer',$trainers,$training->trainer,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('training_cost',__('Training Cost(RM)'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::number('training_cost',$training->training_cost,array('class'=>'form-control','step'=>'0.01','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('gender', __('Cost By'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="hr" name="costby" class="custom-control-input" <?php echo e(($training->costby == 'hr')?'checked':''); ?>>
                                        <label class="custom-control-label" for="g_male"><?php echo e(__('Hr')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_Employee" value="employee" name="costby" class="custom-control-input" <?php echo e(($training->costby == 'employee')?'checked':''); ?>>
                                        <label class="custom-control-label" for="g_Employee"><?php echo e(__('Employee')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('employee',__('Employee'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('employee',$employees,$training->employee,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('employee_No',__('Employee No'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('employee_No',$training->employee_no,array('class'=>'form-control'))); ?>


            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('start_date',$training->start_date,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('end_date',__('End Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('end_date',$training->end_date,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('Organize',__('Organize'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('Organize',$training->organize,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('contactPerson',__('Contact Person'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('contactPerson',$training->contact_person,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('Address',__('Address'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('Address',$training->address,array('class'=>'form-control','placeholder'=>__('Description')))); ?>

        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('city',__('City'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('city',$training->city,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('state',__('State'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('state',$training->state,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('country',__('Country'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('country',$training->country,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('postcode',__('Post Code'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('postcode',$training->postcode,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('phone',__('phone'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::number('phone',$training->phone,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('fax',__('Fax'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('fax',$training->fax,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('email',__('Email'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::email('email',$training->email,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('website',__('Web site'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('website',$training->website,array('class'=>'form-control'))); ?>

            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('approved_status',__('Approved Status'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('approved_status', $is_required,$training->approved_status, array('class' => 'form-control select2','required'=>'required'))); ?>

            </div>
        </div>


        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-control-label'])); ?>

            <?php echo e(Form::textarea('description',$training->description,array('class'=>'form-control','placeholder'=>__('Description')))); ?>

        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/training/edit.blade.php ENDPATH**/ ?>