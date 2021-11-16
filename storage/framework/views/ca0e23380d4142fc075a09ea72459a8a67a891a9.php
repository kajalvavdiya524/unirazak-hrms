<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Employee')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

        <?php echo e(Form::open(array('route'=>array('employee.store'),'method'=>'post','enctype'=>'multipart/form-data'))); ?>

        
        

 <div class="row">
        <div class="col-md-6 ">
             <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Personal Detail')); ?></h6></div>
                <div class="card-body ">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('name', __('Name'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::text('username', old('name'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('phone', __('Phone'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::number('phone',old('phone'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('dob', old('dob'), ['class' => 'datepicker form-control']); ?>

                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('gender', __('Gender'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="Male" name="gender" checked class="custom-control-input">
                                        <label class="custom-control-label" for="g_male"><?php echo e(__('Male')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_female" value="Female" name="gender" class="custom-control-input">
                                        <label class="custom-control-label" for="g_female"><?php echo e(__('Female')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('email', __('Email'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::email('email',old('email'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('password', __('Password'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::password('password', ['class' => 'form-control']); ?>

                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('marital_status', __('Marital Status'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="m_married" value="Married" name="marital_status"  class="custom-control-input">
                                        <label class="custom-control-label" for="m_married"><?php echo e(__('Married')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="m_unmarried" value="Unmarried" name="marital_status" checked class="custom-control-input">
                                        <label class="custom-control-label" for="m_unmarried"><?php echo e(__('Unmarried')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <?php echo Form::label('title', __('Title'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('title', old('title'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('ic_number', __('IC Number'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('ic_number', old('ic_number'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('epf_number', __('EPF No.'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('epf_number', old('epf_number'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('race', __('Race'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('race', old('race'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('office_number', __('Office Phone'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('office_number',old('office_number'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('old_ic_number', __('Old IC Number'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('old_ic_number', old('old_ic_number'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('socso_number', __('SOCSO  No.'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('socso_number', old('socso_number'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('religion', __('Religion'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('religion', old('religion'), ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('extension', __('Extension'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('extension', old('extension'), ['class' => 'form-control']); ?>

                        </div>
                    </div>
                        <div class="form-group">
                            <?php echo Form::label('address', __('Address'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::textarea('address',old('address'), ['class' => 'form-control','rows'=>2]); ?>

                        </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid">
                    <div class="card-header"><h6 class="mb-0"><?php echo e(__('Employment Information')); ?></h6></div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Join Date', __('Join Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('join_date', null, ['class' => 'form-control datepicker']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Staff Number', __('Staff Number'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('Staff_Number', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('Employmentdepartment_id', __('Department'),['class'=>'form-control-label'])); ?><span class="text-danger pl-1">*</span>
                                <?php echo e(Form::select('Emp_department_id', $departments,null, array('class' => 'form-control  select2','required'=>'required'))); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('centre', __('Centre'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('centre', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Position', __('Position'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <!-- <?php echo Form::text('Position', null, ['class' => 'form-control']); ?> designations -->
                                <?php echo e(Form::select('Position', $designations,null, array('class' => 'form-control  select2','required'=>'required'))); ?>



                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('EmploymentType', __('Employment Type'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo e(Form::select('emp_type', $emp_type,null, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Retirement Age', __('Retirement Age'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('Retirement_Age', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group ">
                                    <?php echo Form::label('Confirmation Status', __('Confirmation Status'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="conf_status" value="yes" name="emp_confimrationStatus" checked class="custom-control-input">
                                            <label class="custom-control-label" for="conf_status">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="conf_status1" value="no" name="emp_confimrationStatus" class="custom-control-input">
                                            <label class="custom-control-label" for="conf_status1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Confirmation Period', __('Confirmation Period'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::number('empConfirmation_Period', null, ['class' => 'form-control','min'=>0]); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Confirmation Date', __('Confirmation Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('empConfirmation_date', null, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('work Permit No', __('work Permit No'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::number('workPermitNO', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('work permit Issued Date', __('work permit Issued Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('empWorkPermit_issuedate', null, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('work permit Expiry Date', __('work permit Expiry Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('empWorkPermit_Expirydate', null, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Contract Start Date', __('Contract Start Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('ContractStartdate', null, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Contract Expiry Date', __('Contract Expiry Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('ContractExpirydate', null, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Teching Permit No', __('Teching Permit No'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('TechingPermitNo', null, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Teching Permit Expipry Date', __('Teching Permit Expipry Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('techingExpirydate', null, ['class' => 'datepicker form-control']); ?>

                            </div>

                            <div class="form-group col-md-6">
                                <?php echo Form::label('Category Employee', __('Category Employee'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <!-- <?php echo Form::select('empCategory', $category,null, ['class' => 'form-control']); ?> -->
                                <?php echo e(Form::select('empCategory', $category,null, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </div>
                            <div class="form-group col-md-6">
                            <?php echo Form::label('setting', __('Setting Employee'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo e(Form::select('emp_setting', $emp_addtype,null, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </div>

                        </div>
                    </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Company Detail')); ?></h6></div>
                <div class="card-body employee-detail-create-body">
                    <div class="row">

                        <div class="form-group col-md-12">
                            <?php echo Form::label('employee_id', __('Employee ID'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('employee_id', $employeesId, ['class' => 'form-control','disabled'=>'disabled']); ?>

                        </div>

                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('branch_id', __('Branch'),['class'=>'form-control-label'])); ?>

                            <?php echo e(Form::select('branch_id', $branches,null, array('class' => 'form-control  select2','required'=>'required'))); ?>

                        </div>

                        <div class="form-group col-md-6">
                            <?php echo e(Form::label('department_id', __('Department'),['class'=>'form-control-label'])); ?>

                            <?php echo e(Form::select('department_id', $departments,null, array('class' => 'form-control  select2','id'=>'department_id','required'=>'required'))); ?>

                        </div>

                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('designation_id', __('Designation'),['class'=>'form-control-label'])); ?>

                            <select class="select2 form-control select2-multiple" id="designation_id" name="designation_id" data-toggle="select2" data-placeholder="<?php echo e(__('Select Designation ...')); ?>">
                                <option value=""><?php echo e(__('Select any Designation')); ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 ">
                            <?php echo Form::label('company_doj', __('Company Date Of Joining'),['class'=>'form-control-label']); ?>

                            <?php echo Form::date('company_doj', null, ['class' => 'form-control datepicker','required' => 'required']); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Spouse Detail')); ?></h6></div>
            <div class="card-body employee-detail-create-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <?php echo Form::label('name', __('Name'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('name', old('name'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('nric', __('NRIC Number'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('nric', old('nric'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('dob', old('dob'), ['class' => 'form-control datepicker']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('company_name', __('Company'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('company_name', old('company_name'), ['class' => 'form-control ']); ?>

                    </div>
                        <div class="form-group col-md-6">
                        <?php echo Form::label('nationality', __('Nationality'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('nationality', old('nationality'), ['class' => 'form-control ']); ?>

                    </div>
                        <div class="form-group col-md-6">
                        <?php echo Form::label('old_ic', __('Old IC Number'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('old_ic', old('old_ic'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group ">
                            <?php echo Form::label('gender', __('Gender'),['class'=>'form-control-label']); ?>

                            <div class="d-flex radio-check">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="gender_male" value="Male" name="spouse_gender" checked class="custom-control-input">
                                    <label class="custom-control-label" for="gender_male"><?php echo e(__('Male')); ?></label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="gender_female" value="Female" name="spouse_gender" class="custom-control-input">
                                    <label class="custom-control-label" for="gender_female"><?php echo e(__('Female')); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('positioin', __('Position'),['class'=>'form-control-label']); ?>

                        <!-- <?php echo Form::text('positioin', old('positioin'), ['class' => 'form-control']); ?> -->
                        <?php echo e(Form::select('positioin', $designations,null, array('class' => 'form-control  select2','required'=>'required'))); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Family  Detail')); ?></h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="dynamicAddRemove">
                        <tr>
                            <th><?php echo Form::label('name', __('Name'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('relation', __('Relation'),['class'=>'form-control-label']); ?></th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="addMoreInputFields[0][name]" placeholder="Enter name" class="form-control" />
                            </td>
                            <td><input type="text" name="addMoreInputFields[0][relation]" placeholder="Enter relation" class="form-control" />
                            </td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
</div>

  <div class="row">
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Document')); ?></h6></div>
            <div class="card-body employee-detail-create-body">
                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="form-group col-12">
                            <div class="float-left col-4">
                                <label for="document" class="float-left pt-1 form-control-label"><?php echo e($document->name); ?> <?php if($document->is_required == 1): ?> <span class="text-danger">*</span> <?php endif; ?></label>
                            </div>
                            <div class="float-right col-8">
                                <input type="hidden" name="emp_doc_id[<?php echo e($document->id); ?>]" id="" value="<?php echo e($document->id); ?>">
                                <div class="choose-file form-group">
                                    <label for="document[<?php echo e($document->id); ?>]">
                                        <div><?php echo e(__('Choose File')); ?></div>
                                        <input class="form-control  <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0" <?php if($document->is_required == 1): ?> required <?php endif; ?> name="document[<?php echo e($document->id); ?>]" type="file" id="document[<?php echo e($document->id); ?>]" data-filename="<?php echo e($document->id.'_filename'); ?>">
                                    </label>
                                    <p class="<?php echo e($document->id.'_filename'); ?>"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Bank Account Detail')); ?></h6></div>
            <div class="card-body employee-detail-create-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <?php echo Form::label('account_holder_name', __('Account Holder Name'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control']); ?>


                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('account_number', __('Account Number'),['class'=>'form-control-label']); ?>

                        <?php echo Form::number('account_number', old('account_number'), ['class' => 'form-control']); ?>


                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('bank_name', __('Bank Name'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('bank_name', old('bank_name'), ['class' => 'form-control']); ?>


                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('bank_identifier_code', __('Bank Identifier Code'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('bank_identifier_code',old('bank_identifier_code'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('branch_location', __('Branch Location'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('branch_location',old('branch_location'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('tax_payer_id', __('Tax Payer Id'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('tax_payer_id',old('tax_payer_id'), ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Staff Address')); ?></h6></div>
            <div class="card-body employee-detail-create-body">
                <?php echo Form::label('post_address', __('PostAddress'),['class'=>'form-control-label']); ?>

                <div class="row">
                    <div class="form-group">
                        <?php echo Form::label('post_address', __('Address'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                        <?php echo Form::textarea('post_address',old('post_address'), ['class' => 'form-control','rows'=>2]); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('post_postcode', __('code'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                        <?php echo Form::text('post_postcode', old('post_postcode'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('post_state', __('State'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                        <?php echo Form::text('post_state', old('post_state'), ['class' => 'form-control']); ?>

                    </div>
                </div>
                <?php echo Form::label('per_address', __('PermenantAddress'),['class'=>'form-control-label']); ?>

                <div class="row">
                    <div class="form-group">
                        <?php echo Form::label('per_address', __('Address'),['class'=>'form-control-label']); ?>

                        <?php echo Form::textarea('per_address',old('per_address'), ['class' => 'form-control','rows'=>2]); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('per_postcode', __('code'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('per_postcode', old('per_postcode'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('per_state', __('State'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('per_state', old('per_state'), ['class' => 'form-control']); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-md-6 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Emergency Contact')); ?></h6></div>
            <div class="card-body employee-detail-create-body">
                <div class="row">
                    <div class="form-group col-md-12">
                          <?php echo Form::label('name', __('Name'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('name', old('name'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo e(Form::label('relation',__('Relation'),['class'=>'form-control-label'])); ?>

                        <?php echo e(Form::select('relation',$options,null,array('class'=>'form-control select2','required'=>'required'))); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('Country', __('Country'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('country', old('country'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('state', __('State'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('state', old('state'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('city', __('City'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('city', old('city'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                        <?php echo Form::label('postcode', __('Postcode'),['class'=>'form-control-label']); ?>

                        <?php echo Form::text('postcode', old('postcode'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                            <?php echo Form::label('phone', __('Phone(H)'),['class'=>'form-control-label']); ?>

                            <?php echo Form::number('phone',old('phone'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-6">
                            <?php echo Form::label('phone_hp', __('Phone(HP)'),['class'=>'form-control-label']); ?>

                            <?php echo Form::number('phone_hp',old('phone_hp'), ['class' => 'form-control']); ?>

                    </div>
                    <div class="form-group col-md-12 ">
                         <?php echo Form::label('address', __('Address'),['class'=>'form-control-label']); ?>

                        <?php echo Form::textarea('address',old('address'), ['class' => 'form-control','rows'=>2]); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Employment  History')); ?></h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="history">
                        <tr>
                            <th><?php echo Form::label('company_name', __('Company Name'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('position', __('Position'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('start_date', __('StartDate'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('end_date', __('EndDate'),['class'=>'form-control-label']); ?></th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><div class="form-group"><input type="text" name="historyadd[0][company_name]" placeholder="Enter name" class="form-control" /></div>
                            </td>
                            <td>
                            <?php echo e(Form::select('historyadd[0][position]', $designations,null, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </td>
                            <td><div class="form-group"><input class="form-control" type="date" name="historyadd[0][start_date]"/></div>
                            </td>
                            <td><div class="form-group"><input class="form-control" type="date" name="historyadd[0][end_date]"/></div>
                            </td>
                            <td><button type="button" name="add" id="dynamic-hr" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Dependant  information')); ?></h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="information">
                        <tr>
                            <th><?php echo Form::label('name', __('Name'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('relation', __('relation'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('dob', __('Dob'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('status', __('Status'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('ic_number', __('Icnumber'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('handicap', __('Handicap'),['class'=>'form-control-label']); ?></th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><div class="form-group"><input type="text" name="informationadd[0][name]" class="form-control" /></div>
                            </td>
                            <td><div class="form-group"><input type="text" name="informationadd[0][relation]" class="form-control" /></div>
                            </td>
                            <td><div class="form-group"><input class="form-control" type="date" name="informationadd[0][dob]"/></div>
                            </td>
                            <td><div class="form-group"><input type="text" name="informationadd[0][status]" class="form-control" /></div>
                            </td>
                            <td><div class="form-group"><input type="text" name="informationadd[0][ic_number]" class="form-control" /></div>
                            </td>
                             <td><div class="form-group"><input type="text" name="informationadd[0][handicap]" class="form-control" /></div>
                            </td>
                            <td><button type="button" name="add" id="dynamic-de" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Qualification')); ?></h6></div>
                <div class="card-body employee-detail-create-body">
                    <table  class="table table-striped mb-0 " id="qualification">
                        <tr>
                            <th><?php echo Form::label('qualification', __('Qualification'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('specialization', __('Specialization'),['class'=>'form-control-label']); ?></th>
                             <th><?php echo Form::label('insitution_name', __('InsitutionName'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('start_date', __('StartDate'),['class'=>'form-control-label']); ?></th>
                            <th><?php echo Form::label('end_date', __('EndDate'),['class'=>'form-control-label']); ?></th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td><div class="form-group"><input type="text" name="qualificationadd[0][qualification]" class="form-control" /></div>
                            </td>
                            <td><div class="form-group"><input type="text" name="qualificationadd[0][specialization]" class="form-control" /></div>
                            </td>
                            <td><div class="form-group"><input type="text" name="qualificationadd[0][insitution_name]" class="form-control" /></div>
                            </td>
                            <td><div class="form-group"><input class="form-control" type="date" name="qualificationadd[0][start_date]"/></div>
                            </td>
                            <td><div class="form-group"><input class="form-control" type="date" name="qualificationadd[0][end_date]"/></div>
                            </td>
                            <td><button type="button" name="add" id="dynamic-qu" class="btn btn-xs badge-blue ">Add</button></td>
                        </tr>
                    </table>
                </div>
            </div>
    </div>
</div>
<div class="row" id="position">
    <div class="col-md-12 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Job Position')); ?></h6>
            <button type="button" name="add" id="dynamic-po" class="btn btn-xs badge-blue ">Add</button>
            </div>
            <div class="card-body employee-detail-create-body">

                <div class="row">
                        <div class="form-group col-md-6 ">
                             <label class="form-control-label">Start date </label>
                             <input type="date" class="form-control datepicker" id="" name="positionadd[0][start_date]">

                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">End date </label>
                             <input type="date" class="form-control datepicker" id="" name="positionadd[0][end_date]">

                        </div>
                         <div class="form-group col-md-6">
                              <label class="form-control-label">Department</label>
                                                        <select class="form-control" name="positionadd[0][department_id]" id="department">
                                                             <?php $__currentLoopData = $jobposition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($department->id); ?>"><?php echo e($department->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Position</label>
                             <?php echo e(Form::select('positionadd[0][position]', $designations,null, array('class' => 'form-control  select2','required'=>'required'))); ?>


                        </div>
                        <div class="form-group col-md-6">
                             <label class="form-control-label">Employment Type</label>
                             <!-- <input type="text" class="form-control" id="" name="positionadd[0][employment_type]"> -->
                             <?php echo e(Form::select('positionadd[0][employment_type]', $emp_type,null, array('class' => 'form-control  select2','required'=>'required'))); ?>


                        </div>
                       <div class="form-group col-md-6 ">
                               <label class="form-control-label">Salary Code</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="code" value="Code" name="positionadd[0][salary_code]" checked class="custom-control-input">
                                        <label class="custom-control-label" for="code"><?php echo e(__('Code')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="class_a" value="ClassA" name="positionadd[0][salary_code]" class="custom-control-input">
                                        <label class="custom-control-label" for="class_a"><?php echo e(__('Class')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="grade" value="Grade" name="positionadd[0][salary_code]" class="custom-control-input">
                                        <label class="custom-control-label" for="grade"><?php echo e(__('Grade')); ?></label>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Remark</label>
                             <input type="text" class="form-control" id="" name="positionadd[0][remark]">
                        </div>
                        <div class="form-group col-md-6 ">
                                <label class="form-control-label">Salary Code</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="yes" value="Yes" name="positionadd[0][confirmation_status]" checked class="custom-control-input">
                                        <label class="custom-control-label" for="yes"><?php echo e(__('Yes')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="no" value="No" name="positionadd[0][confirmation_status]" class="custom-control-input">
                                        <label class="custom-control-label" for="no"><?php echo e(__('No')); ?></label>
                                    </div>
                                </div>
                        </div>
                         <div class="form-group col-md-6 ">
                             <label class="form-control-label">confirmation date </label>
                             <input type="date" class="form-control datepicker" id="" name="positionadd[0][confirmation_date]">
                        </div>
                        <div class="form-group col-md-6">
                             <label class="form-control-label">Confirmation Period</label>
                             <input type="text" class="form-control" id="" name="positionadd[0][confirmation_period]">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Status</label>
                            <input type="text" class="form-control" id="" name="positionadd[0][status]">
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row" id="language">
    <div class="col-md-12 ">
        <div class="card card-fluid">
            <div class="card-header"><h6 class="mb-0"><?php echo e(__('Linguistic Ability')); ?></h6>
            <button type="button" name="add" id="dynamic-la" class="btn btn-xs badge-blue ">Add</button>
            </div>
            <div class="card-body employee-detail-create-body">

                <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-control-label">Language</label>
                             <input type="text" class="form-control" id="" name="languageadd[0][position]">
                        </div>
                       <div class="form-group col-md-6 ">
                               <label class="form-control-label">Spoken</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="excellent" value="Excellent" name="languageadd[0][spoken]" checked class="custom-control-input">
                                        <label class="custom-control-label" for="excellent"><?php echo e(__('Excellent')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="very_good" value="Very Good" name="languageadd[0][spoken]" class="custom-control-input">
                                        <label class="custom-control-label" for="very_good"><?php echo e(__('Very Good')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="good" value="Good" name="languageadd[0][spoken]" class="custom-control-input">
                                        <label class="custom-control-label" for="good"><?php echo e(__('Good')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="poor" value="Poor" name="languageadd[0][spoken]" class="custom-control-input">
                                        <label class="custom-control-label" for="poor"><?php echo e(__('Poor')); ?></label>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group col-md-6 ">
                               <label class="form-control-label">Written</label>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="excellents" value="Excellent" name="languageadd[0][written]" checked class="custom-control-input">
                                        <label class="custom-control-label" for="excellents"><?php echo e(__('Excellent')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="very_goods" value="Very Good" name="languageadd[0][written]" class="custom-control-input">
                                        <label class="custom-control-label" for="very_goods"><?php echo e(__('Very Good')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="goods" value="Good" name="languageadd[0][written]" class="custom-control-input">
                                        <label class="custom-control-label" for="goods"><?php echo e(__('Good')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="poors" value="Poor" name="languageadd[0][written]" class="custom-control-input">
                                        <label class="custom-control-label" for="poors"><?php echo e(__('Poor')); ?></label>
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <?php echo Form::submit('Create', ['class' => 'btn btn-xs badge-blue float-right radius-10px']); ?>

            
        <?php echo e(Form::close()); ?>

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php $__env->stopSection(); ?>

 <?php
    $test=$jobposition;
    $store_dept='';
    foreach($jobposition as $value)
    {
        $store_dept.="<option value=".$value->id.">$value->name</option>";
    }

    $store_designation='';
    $i=0;
    foreach($designations as $value)
    {
        $store_designation.="<option value=".$i." >$value</option>";
        $i++;
    }


    ?>

<?php $__env->startPush('script-page'); ?>

    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields['+i+'][name]" placeholder="Enter name" class="form-control" /><td><input type="text" name="addMoreInputFields['+i+'][relation]" placeholder="Enter relation" class="form-control" /></td></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });

    </script>
     <script type="text/javascript">
        var desi='<?php echo $store_designation ?>';
        var l = 1;
        $("#dynamic-hr").click(function () {
            ++l;
            $("#history").append('<tr><td><input type="text" name="historyadd['+l+'][company_name]" placeholder="Enter name" class="form-control"/><td><select class="form-control" name="historyadd['+l+'][position]" id="department">'+desi+'</select></td><td><input   class="form-control" type="date" name="historyadd['+l+'][start_date]"  class="datepicker form-control" /><td><input type="date"  class=" form-control" name="historyadd['+l+'][end_date]"  class="datepicker form-control" /></td></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/javascript">
        var m = 0;
        $("#dynamic-de").click(function () {
            ++m;
            $("#information").append('<tr><td><input type="text" name="informationadd['+m+'][name]" placeholder="Enter name" class="form-control"/></td><td><input type="text" name="informationadd['+m+'][relation]" placeholder="Enter relation" class="form-control" /></td><td><input   class="form-control" type="date" name="informationadd['+m+'][dob]"  class=" form-control" /></td><td><input type="text"  class=" form-control" name="informationadd['+m+'][status]"  class="form-control" /></td><td><input type="text" name="informationadd['+m+'][ic_number]"  class="form-control"/></td><td><input type="text" name="informationadd['+m+'][handicap]"  class="form-control"/></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
     <script type="text/javascript">
        var n = 0;
        $("#dynamic-qu").click(function () {
            ++n;
            $("#qualification").append('<tr><td><input type="text" name="qualificationadd['+n+'][qualification]" placeholder="Enter name" class="form-control"/></td><td><input type="text" name="qualificationadd['+n+'][specialization]" placeholder="Enter position" class="form-control" /></td><td><input type="text" name="qualificationadd['+n+'][insitution_name]" placeholder="Enter name" class="form-control"/></td><td><input   class="form-control" type="date" name="qualificationadd['+n+'][start_date]"  class="datepicker form-control" /></td><td><input type="date"  class=" form-control" name="qualificationadd['+n+'][end_date]"  class="datepicker form-control" /></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/javascript">
        var n = 0;
        var p=1;
      $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/javascript">

        var g ='<?php echo  $store_dept ?>';


        var p = 1;
        $("#dynamic-po").click(function () {

            $("#position").append('<div class="row" id="textbox'+manicnt+'"><button type="button" class="btn btn-xs badge-danger remove">Delete</button><div class="col-md-12 "><div class="card card-fluid"><div class="card-header"></div><div class="card-body employee-detail-create-body"><div class="row">'+
            '<div class="form-group col-md-6 "><label class="form-control-label">Start date</label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][start_date]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">End date </label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][end_date]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Department</label> <select class="form-control" name="positionadd['+p+'][department_id]" id="department">'+g+'</select></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Position</label><select class="form-control" name="positionadd['+l+'][position]" id="department">'+desi+'</select></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">EmploymentType</label><input type="text" class="form-control" id="" name="positionadd['+p+'][employment_type]"></div>'+
            '<div class="form-group col-md-6 "><label class="form-control-label">Salary Code</label><div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline">'+
            '<input type="radio" id="code['+p+']" value="Coded" name="positionadd['+p+'][salary_code]" class="custom-control-input"><label class="custom-control-label" for="code['+p+']">Code</label></div>'+
            '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="class['+p+']" value="ClassA" name="positionadd['+p+'][salary_code]" class="custom-control-input"><label class="custom-control-label" for="class['+p+']">ClassA</label></div>'+
            '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="grade['+p+']" value="Grade" name="positionadd['+p+'][salary_code]" class="custom-control-input"><label class="custom-control-label" for="grade['+p+']">Grade</label></div></div></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Remark</label><input type="text" class="form-control" id="" name="positionadd['+p+'][remark]"></div><div class="form-group col-md-6 "><label class="form-control-label">Salary Code</label>'+
            '<div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="yes['+p+']" value="Yes" name="positionadd['+p+'][confirmation_status]" class="custom-control-input"><label class="custom-control-label"  for="yes['+p+']">Yes</label></div>'+
            '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="no['+p+']" value="No" name="positionadd['+p+'][confirmation_status]" class="custom-control-input"><label class="custom-control-label" for="no['+p+']">No</label></div></div></div>'+
            '<div class="form-group col-md-6 "><label class="form-control-label">confirmation date </label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][confirmation_date]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Confirmation Period</label><input type="text" class="form-control" id="" name="positionadd['+p+'][confirmation_period]"></div>'+
            '<div class="form-group col-md-6"><label class="form-control-label">Status</label><input type="text" class="form-control" id="" name="positionadd['+p+'][status]"></div></div></div></div></div></div>'

            );
            p++;
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
        $(document).on('click', '.remove', function() {
        var del=$(this).parent().attr('id');
        $("#"+del).remove();
    });
    </script>
    <script>

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value=""><?php echo e(__('Select any Designation')); ?></option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }



var ij=190;
    $("#dynamic-la").click(function(){

        $("#language").append('<div class="container card-header" id="textbox'+ij+'"><button type="button" class="btn btn-xs badge-danger remove">Delete</button> <div class="col-md-12 " >'+
                '<div class="card card-fluid"><div class="card-body employee-detail-create-body">'+
                '<div class="row"><div class="form-group col-md-6"><label class="form-control-label">Language</label>'+
                '<input type="text" class="form-control" id="" name="languageadd['+ij+'][position]"></div>'+
                '<div class="form-group col-md-6 "><label class="form-control-label">Spoken</label><div class="d-flex radio-check">'+
                '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="excellent'+ij+'" value="Excellent" name="languageadd['+ij+'][spoken]" class="custom-control-input">'+
                '<label class="custom-control-label" for="excellent'+ij+'">Excellent</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="very_good'+ij+'" value="Very Good" name="languageadd['+ij+'][spoken]"  class="custom-control-input">'+
                '<label class="custom-control-label" for="very_good'+ij+'">Very Good</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="good'+ij+'" value="Good" name="languageadd['+ij+'][spoken]"   class="custom-control-input">'+
                '<label class="custom-control-label" for="good'+ij+'">Good</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="poor'+ij+'" value="Poor" name="languageadd['+ij+'][spoken]"  class="custom-control-input">'+
                '<label class="custom-control-label" for="poor'+ij+'">Poor</label></div></div></div><div class="form-group col-md-6 "><label class="form-control-label">Written</label>'+
                '<div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="excellents'+ij+'" value="Excellent" name="languageadd['+ij+'][written]"    class="custom-control-input">'+
                '<label class="custom-control-label" for="excellents'+ij+'">Excellent</label></div><div class="custom-control custom-radio custom-control-inline">'+
                '<input type="radio" id="very_goods'+ij+'" value="Very Good" name="languageadd['+ij+'][written]" class="custom-control-input">'+
                '<label class="custom-control-label" for="very_goods'+ij+'">Very Good</label></div><div class="custom-control custom-radio custom-control-inline">'+
        '<input type="radio" id="goods'+ij+'" value="Good" name="languageadd['+ij+'][written]"  class="custom-control-input">'+
            '<label class="custom-control-label" for="goods'+ij+'">Good</label></div><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="poors'+ij+'" value="Poor" name="languageadd['+ij+'][written]"  class="custom-control-input">'+
                '<label class="custom-control-label" for="poors'+ij+'">Poor</label></div></div></div></div></div></div></div></div>');
                ij++;
    });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\UniRazak\resources\views/employee/create.blade.php ENDPATH**/ ?>