<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Employee')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(Form::model($employee, array('route' => array('employee.update', $employee->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data'))); ?>

<?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-12">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Personal Detail')); ?></h6></div>
                <div class="card-body employee-detail-edit-body">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('name', __('Name'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::text('username', $employee->name, ['class' => 'form-control','required' => 'required']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('phone', __('Phone'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo Form::number('userphone',$employee->phone, ['class' => 'form-control']); ?>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('userdob', $employee->dob, ['class' => 'form-control datepicker']); ?>

                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('gender', __('Gender'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_male" value="Male" name="gender" class="custom-control-input" <?php echo e(($employee->gender == 'Male')?'checked':''); ?>>
                                        <label class="custom-control-label" for="g_male"><?php echo e(__('Male')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="g_female" value="Female" name="gender" class="custom-control-input" <?php echo e(($employee->gender == 'Female')?'checked':''); ?>>
                                        <label class="custom-control-label" for="g_female"><?php echo e(__('Female')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('marital_status', __('Marital Status'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="m_married" value="Married" name="marital_status" class="custom-control-input"<?php echo e(($employee->marital_status == 'Married')?'checked':''); ?>>
                                        <label class="custom-control-label" for="m_married"><?php echo e(__('Married')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="m_unmarried" value="Unmarried" name="marital_status" class="custom-control-input"<?php echo e(($employee->marital_status == 'Unmarried')?'checked':''); ?>>
                                        <label class="custom-control-label" for="m_unmarried"><?php echo e(__('Unmarried')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <?php echo Form::label('title', __('Title'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('title', $employee->title, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('ic_number', __('IC Number'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('ic_number', $employee->ic_number, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('epf_number', __('EPF No.'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('epf_number', $employee->epf_number, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('race', __('Race'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('race', $employee->race, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('office_number', __('Office Phone'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('office_number',$employee->office_number, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('old_ic_number', __('Old IC Number'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('old_ic_number', $employee->old_ic_number, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('socso_number', __('SOCSO  No.'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('socso_number', $employee->socso_number, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('religion', __('Religion'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('religion', $employee->religion, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('extension', __('Extension'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('extension', $employee->extension, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Form::label('address', __('Address'),['class'=>'form-control-label']); ?>

                        <?php echo Form::textarea('address',$employee->address, ['class' => 'form-control','rows'=>2]); ?>

                    </div>
                    <?php if(\Auth::user()->type=='employee'): ?>
                        <?php echo Form::submit('Update', ['class' => 'btn-create btn-xs badge-blue radius-10px float-right']); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Employment Information')); ?></h6></div>
                <div class="card-body employee-detail-edit-body">

                    <div class="row">
                    <div class="form-group col-md-6">
                                <?php echo Form::label('Join Date', __('Join Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('join_date', @$EmploymentInformation->join_date, ['class' => 'form-control datepicker']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Staff Number', __('Staff Number'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('Staff_Number', @$EmploymentInformation->Staff_Number, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('Employmentdepartment_id', __('Department'),['class'=>'form-control-label'])); ?><span class="text-danger pl-1">*</span>
                                <?php echo e(Form::select('Emp_department_id', @$departments,@$EmploymentInformation->Emp_department_id, array('class' => 'form-control  select2','required'=>'required'))); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('centre', __('Centre'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('centre', @$EmploymentInformation->Centre, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Position', __('Position'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <!-- <?php echo Form::text('Position', @$EmploymentInformation->Position, ['class' => 'form-control']); ?> -->
                                <?php echo e(Form::select('Position', $designations,@$EmploymentInformation->Position, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('EmploymentType', __('Employment Type'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <!-- <?php echo Form::text('emp_type', @$EmploymentInformation->Employment_Type, ['class' => 'form-control']); ?> -->
                                <?php echo e(Form::select('emp_type', $emp_type,@$EmploymentInformation->Employment_Type, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Retirement Age', __('Retirement Age'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('Retirement_Age', @$EmploymentInformation->Retirement_Age, ['class' => 'form-control']); ?>

                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group ">
                                    <?php echo Form::label('Confirmation Status', __('Confirmation Status'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                    <div class="d-flex radio-check">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="conf_status" value="yes" name="emp_confimrationStatus" class="custom-control-input" <?php echo e((@$EmploymentInformation->Confirmation_Status == 'yes')?'checked':''); ?>>
                                            <label class="custom-control-label" for="conf_status">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="conf_status1" value="no" name="emp_confimrationStatus" class="custom-control-input" <?php echo e((@$EmploymentInformation->Confirmation_Status == 'no')?'checked':''); ?>>
                                            <label class="custom-control-label" for="conf_status1">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Confirmation Period', __('Confirmation Period'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::number('empConfirmation_Period', @$EmploymentInformation->Confirmation_Period, ['class' => 'form-control','min'=>0]); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Confirmation Date', __('Confirmation Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('empConfirmation_date', @$EmploymentInformation->Confirmation_Date, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('work Permit No', __('work Permit No'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::number('workPermitNO', @$EmploymentInformation->work_Permit_No, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('work permit Issued Date', __('work permit Issued Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('empWorkPermit_issuedate', @$EmploymentInformation->work_permit_Issued_Date, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('work permit Expiry Date', __('work permit Expiry Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('empWorkPermit_Expirydate', @$EmploymentInformation->work_permit_Expiry_Date, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Contract Start Date', __('Contract Start Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('ContractStartdate',  @$EmploymentInformation->Contract_Start_Date, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Contract Expiry Date', __('Contract Expiry Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('ContractExpirydate', @$EmploymentInformation->Contract_Expiry_Date, ['class' => 'datepicker form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Teching Permit No', __('Teching Permit No'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('TechingPermitNo', @$EmploymentInformation->Teching_Permit_No, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Teching Permit Expipry Date', __('Teching Permit Expipry Date'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('techingExpirydate', @$EmploymentInformation->Teching_Permit_Expipry_Date, ['class' => 'datepicker form-control']); ?>

                            </div>

                            <div class="form-group col-md-6">
                                <?php echo Form::label('Category Employee', __('Category Employee'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <!-- <?php echo Form::text('empCategory', @$EmploymentInformation->Category_Employee, ['class' => 'form-control']); ?> -->
                                <?php echo e(Form::select('empCategory', $category,@$EmploymentInformation->Category_Employee, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </div>
                            <div class="form-group col-md-6">
                            <?php echo Form::label('setting', __('Setting Employee'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                            <?php echo e(Form::select('emp_setting', $emp_addtype,@$EmploymentInformation->setting_emp, array('class' => 'form-control  select2','required'=>'required'))); ?>


                            </div>


                    </div>
                </div>
            </div>
        </div>

        <?php if(\Auth::user()->type!='employee'): ?>
            <div class="col-md-6 ">
                <div class="card card-fluid">
                    <div class="card-header"><h6 class="mb-0"><?php echo e(__('Company Detail')); ?></h6></div>
                    <div class="card-body employee-detail-edit-body">
                        <div class="row">
                            <?php echo csrf_field(); ?>
                            <div class="form-group col-md-12">
                                <?php echo Form::label('employee_id', __('Employee ID'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('employee_id',$employeesId, ['class' => 'form-control','disabled'=>'disabled']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('branch_id', __('Branch'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::select('branch_id', $branches,null, array('class' => 'form-control select2','required'=>'required'))); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('department_id', __('Department'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::select('department_id', $departments,null, array('class' => 'form-control select2','required'=>'required'))); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('designation_id', __('Designation'),['class'=>'form-control-label'])); ?>

                                <select class="select2 form-control select2-multiple" id="designation_id" name="designation_id" data-toggle="select2" data-placeholder="<?php echo e(__('Select Designation ...')); ?>">
                                    <option value=""><?php echo e(__('Select any Designation')); ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('company_doj', 'Company Date Of Joining',['class'=>'form-control-label']); ?>

                                <?php echo Form::text('company_doj', null, ['class' => 'form-control datepicker','required' => 'required']); ?>

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

                            <?php echo Form::text('spousename', @$spouse->name, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('nric', __('NRIC Number'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('nric', @$spouse->nric, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                           <?php echo Form::label('dob', __('Date of Birth'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('spousedob', @$spouse->dob, ['class' => 'form-control datepicker']); ?>

                        </div>
                        <div class="form-group col-md-6">
                           <?php echo Form::label('company_name', __('Company'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('company_name', @$spouse->company_name, ['class' => 'form-control ']); ?>

                        </div>
                         <div class="form-group col-md-6">
                           <?php echo Form::label('nationality', __('Nationality'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('nationality', @$spouse->nationality, ['class' => 'form-control ']); ?>

                        </div>
                         <div class="form-group col-md-6">
                            <?php echo Form::label('old_ic', __('Old IC Number'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('old_ic', @$spouse->old_ic, ['class' => 'form-control']); ?>

                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group ">
                                <?php echo Form::label('gender', __('Gender'),['class'=>'form-control-label']); ?>

                                <div class="d-flex radio-check">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gender_male" value="Male" name="spouse_gender" class="custom-control-input" <?php echo e((@$spouse->gender == 'Male')?'checked':''); ?>>
                                        <label class="custom-control-label" for="gender_male"><?php echo e(__('Male')); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="gender_female" value="Female" name="spouse_gender" class="custom-control-input" <?php echo e((@$spouse->gender == 'Female')?'checked':''); ?>>
                                        <label class="custom-control-label" for="gender_female"><?php echo e(__('Female')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <?php echo Form::label('positioin', __('Position'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('positioin', @$spouse->positioin, ['class' => 'form-control']); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-fluid">
                <div class="card-header"><h6 class="mb-0"><?php echo e(__('Famaily  Detail')); ?></h6></div>
                    <div class="card-body employee-detail-create-body">
                        <table  class="table table-striped mb-0 " id="dynamicAddRemove">
                            <tr>
                                <th><?php echo Form::label('name', __('Name'),['class'=>'form-control-label']); ?></th>
                                <th><?php echo Form::label('releation', __('Relation'),['class'=>'form-control-label']); ?></th>

                                <th><button type="button" name="add" id="dynamicedit-ar" class="btn btn-xs badge-blue ">Add</button></th>
                            </tr>
                            <?php
                            $i=0;
                            ?>

                            <?php if($family): ?>
                            <?php $__currentLoopData = $family; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++; ?>
                               <tr>
                                <td><input type="text" name="addMoreInputFields[<?php echo e($i); ?>][name]" value="<?php echo e($obj->name); ?>" placeholder="Enter name" class="form-control" />
                                </td>
                                <td><input type="text" name="addMoreInputFields[<?php echo e($i); ?>][relation]" value="<?php echo e($obj->relation); ?>" placeholder="Enter relation" class="form-control" />
                                </td>
                                <td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </table>

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
                                <?php echo Form::textarea('post_address',@$StaffAddress->post_address, ['class' => 'form-control','rows'=>2]); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('post_postcode', __('code'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('post_postcode', @$StaffAddress->post_postcode, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('post_state', __('State'),['class'=>'form-control-label']); ?><span class="text-danger pl-1">*</span>
                                <?php echo Form::text('post_state', @$StaffAddress->post_state, ['class' => 'form-control']); ?>

                            </div>
                        </div>
                        <?php echo Form::label('per_address', __('PermenantAddress'),['class'=>'form-control-label']); ?>

                        <div class="row">
                            <div class="form-group">
                                <?php echo Form::label('per_address', __('Address'),['class'=>'form-control-label']); ?>

                                <?php echo Form::textarea('per_address',@$StaffAddress->per_address, ['class' => 'form-control','rows'=>2]); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('per_postcode', __('code'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('per_postcode', @$StaffAddress->per_postcode, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('per_state', __('State'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('per_state', @$StaffAddress->per_state, ['class' => 'form-control']); ?>

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

                                <?php echo Form::text('name',@$emergency->name, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('relation',__('Relation'),['class'=>'form-control-label'])); ?>

                                <?php echo e(Form::select('relation',$options,@$emergency->relation,array('class'=>'form-control select2','required'=>'required'))); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('Country', __('Country'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('country', @$emergency->country, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('state', __('State'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('state', @$emergency->state, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('city', __('City'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('city', @$emergency->city, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::label('postcode', __('Postcode'),['class'=>'form-control-label']); ?>

                                <?php echo Form::text('postcode', @$emergency->postcode, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                    <?php echo Form::label('phone', __('Phone(H)'),['class'=>'form-control-label']); ?>

                                    <?php echo Form::number('phone',@$emergency->phone, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-6">
                                    <?php echo Form::label('phone_hp', __('Phone(HP)'),['class'=>'form-control-label']); ?>

                                    <?php echo Form::number('phone_hp',@$emergency->phone_hp, ['class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-md-12 ">
                                <?php echo Form::label('address', __('Address'),['class'=>'form-control-label']); ?>

                                <?php echo Form::textarea('address',@$emergency->address, ['class' => 'form-control','rows'=>2]); ?>

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

                                    <th><button type="button" name="add" id="dynamic-hr" class="btn btn-xs badge-blue ">Add</button></th>

                                </tr>

                                <?php if($EmploymentHistory): ?>

                         <?php $__currentLoopData = $EmploymentHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php $i++; ?>
                         <tr>

                                    <td><input type="text" value="<?php echo e($obj->company_name); ?>" name="historyadd[<?php echo e($i); ?>][company_name]" placeholder="Enter name" class="form-control" />
                                    </td>
                                    <td><?php echo e(Form::select('historyadd['.$i.'][position]', $designations,$obj->position, array('class' => 'form-control  select2','required'=>'required'))); ?>

                                        <!-- <input type="text" value="<?php echo e($obj->position); ?>" name="historyadd[<?php echo e($i); ?>][position]" placeholder="Enter relation" class="form-control" /> -->
                                    </td>
                                    <td><input class="form-control" value="<?php echo e($obj->start_date); ?>" type="date" name="historyadd[<?php echo e($i); ?>][start_date]"/>
                                    </td>
                                    <td><input class="form-control" value="<?php echo e($obj->end_date); ?>" type="date" name="historyadd[<?php echo e($i); ?>][end_date]"/>
                                    </td>
                                    <td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>


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
                                    <th><button type="button" name="add" id="dynamic-de" class="btn btn-xs badge-blue ">Add</button></th>

                                </tr>
                                <?php if($DependantInformation): ?>
                                <?php $__currentLoopData = $DependantInformation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++; ?>

                                <tr>
                                    <td><input type="text" value="<?php echo e($obj->name); ?>" name="informationadd[<?php echo e($i); ?>][name]" class="form-control" />
                                    </td>
                                    <td><input type="text" value="<?php echo e($obj->relation); ?>" name="informationadd[<?php echo e($i); ?>][relation]" class="form-control" />
                                    </td>
                                    <td><input class="form-control" value="<?php echo e($obj->dob); ?>" type="date" name="informationadd[<?php echo e($i); ?>][dob]"/>
                                    </td>
                                    <td><input type="text" value="<?php echo e($obj->status); ?>" name="informationadd[<?php echo e($i); ?>][status]" class="form-control" />
                                    </td>
                                    <td><input type="text" value="<?php echo e($obj->ic_number); ?>" name="informationadd[<?php echo e($i); ?>][ic_number]" class="form-control" />
                                    </td>
                                    <td><input type="text"  value="<?php echo e($obj->handicap); ?>" name="informationadd[<?php echo e($i); ?>][handicap]" class="form-control" />
                                    </td>
                                    <td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>


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
                                    <th><button type="button" name="add" id="dynamic-qu" class="btn btn-xs badge-blue ">Add</button></th>
                                </tr>
                                <?php if($Qualification): ?>

                                <?php $__currentLoopData = $Qualification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++; ?>
                                <tr>
                                    <td><input type="text" value="<?php echo e($obj->qualification); ?>" name="qualificationadd[<?php echo e($i); ?>][qualification]" class="form-control" />
                                    </td>
                                    <td><input type="text"  value="<?php echo e($obj->specialization); ?>" name="qualificationadd[<?php echo e($i); ?>][specialization]" class="form-control" />
                                    </td>
                                    <td><input type="text" value="<?php echo e($obj->insitution_name); ?>" name="qualificationadd[<?php echo e($i); ?>][insitution_name]" class="form-control" />
                                    </td>
                                    <td><input class="form-control" value="<?php echo e($obj->start_date); ?>" type="date" name="qualificationadd[<?php echo e($i); ?>][start_date]"/>
                                    </td>
                                    <td><input class="form-control" value="<?php echo e($obj->end_date); ?>" type="date" name="qualificationadd[<?php echo e($i); ?>][end_date]"/>
                                    </td>
                                    <td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                            </table>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row" id="position">
        <div class="card-header"><h6 class="mb-0"><?php echo e(__('Job Position')); ?></h6>
                <button type="button" name="add" id="dynamic-po" class="btn btn-xs badge-blue ">Add</button>
                </div>
                <?php if($dataJobPosition): ?>

                <?php $__currentLoopData = $dataJobPosition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++; ?>

                <div class="col-md-12" id="textbox<?php echo e($i); ?>">
                <button type="button" class="btn btn-xs badge-danger remove">Delete</button>
                <div class="card card-fluid">

                    <div class="card-body employee-detail-create-body">

                        <div class="row">
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label">Start date </label>
                                    <input type="text" class="form-control datepicker" value="<?php echo e($obj->start_date); ?>" id="" name="positionadd[<?php echo e($i); ?>][jobstart_date]">

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label">End date </label>
                                    <input type="text" class="form-control datepicker" value="<?php echo e($obj->end_date); ?>" id="" name="positionadd[<?php echo e($i); ?>][jobend_date]">

                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label">Department</label>
                                        <select class="form-control" name="positionadd[<?php echo e($i); ?>][jobdepartment_id]" id="department">
                                            <?php $__currentLoopData = $jobposition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($department->id); ?>"  <?php if($department->id == $obj->department_id): ?> selected <?php endif; ?>  ><?php echo e($department->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label">Position</label>
                                    <!-- <input type="text" class="form-control" value="<?php echo e($obj->position); ?>" id="" name="positionadd[<?php echo e($i); ?>][jobposition]"> -->
                                    <?php echo e(Form::select('positionadd['.$i.'][jobposition]', $designations,$obj->position, array('class' => 'form-control  select2','required'=>'required'))); ?>


                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label">EmploymentType</label>
                                    <input type="text" class="form-control" value="<?php echo e($obj->employment_type); ?>"  id="" name="positionadd[<?php echo e($i); ?>][jobemployment_type]">
                                </div>
                            <div class="form-group col-md-3 ">
                                    <label class="form-control-label">Salary Code</label>
                                        <div class="d-flex radio-check">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="code" value="Code" name="positionadd[<?php echo e($i); ?>][jobsalary_code]" <?php if($obj->salary_code=='Code'): ?> checked <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="code"><?php echo e(__('Code')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="class_a" value="ClassA" name="positionadd[<?php echo e($i); ?>][jobsalary_code]" <?php if($obj->salary_code=='ClassA'): ?> checked <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="class_a"><?php echo e(__('Class')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="grade" value="Grade" name="positionadd[<?php echo e($i); ?>][jobsalary_code]" <?php if($obj->salary_code=='Grade'): ?> checked <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="grade"><?php echo e(__('Grade')); ?></label>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label">Remark</label>
                                    <input type="text" class="form-control" value="<?php echo e($obj->remark); ?>" id="" name="positionadd[<?php echo e($i); ?>][jobremark]">
                                </div>
                                <div class="form-group col-md-3 ">
                                        <label class="form-control-label">Confirmation Status</label>
                                        <div class="d-flex radio-check">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="yes" value="Yes" name="positionadd[<?php echo e($i); ?>][jobconfirmation_status]" <?php if($obj->confirmation_status=='Yes'): ?> checked <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="yes"><?php echo e(__('Yes')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="no" value="No" name="positionadd[<?php echo e($i); ?>][jobconfirmation_status]" <?php if($obj->confirmation_status=='No'): ?> checked <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="no"><?php echo e(__('No')); ?></label>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label class="form-control-label">confirmation date </label>
                                    <input type="date" class="form-control datepicker" id="" value="<?php echo e($obj->confirmation_date); ?>" name="positionadd[<?php echo e($i); ?>][jobconfirmation_date]">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label">Confirmation Period</label>
                                    <input type="text" class="form-control" id="" value="<?php echo e($obj->confirmation_period); ?>" name="positionadd[<?php echo e($i); ?>][jobconfirmation_period]">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-control-label">Status</label>
                                    <input type="text" class="form-control" id=""  value="<?php echo e($obj->status); ?>" name="positionadd[<?php echo e($i); ?>][jobstatus]">
                                </div>
                        </div>

                    </div>
                </div>

        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

</div>
<hr>
 <!-- language -->
 <div class="row" id="LinguisticAbility">
 <div class="card-header"><h6 class="mb-0"><?php echo e(__('Linguistic Ability')); ?></h6>
                    <button type="button" name="add" id="dynamic-la" class="btn btn-xs badge-blue ">Add</button>
                    </div>
                    <?php if($LinguisticAbility): ?>

            <?php $__currentLoopData = $LinguisticAbility; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $i++; ?>
            <div class="col-md-12 " id="textbox<?php echo e($i); ?>">
            <button type="button" class="btn btn-xs badge-danger remove">Delete</button>
                <div class="card card-fluid">

                    <div class="card-body employee-detail-create-body">

                        <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label">Language</label>
                                    <input type="text" class="form-control" value="<?php echo e($obj->language); ?>" id="" name="languageadd[<?php echo e($i); ?>][position]">
                                </div>
                            <div class="form-group col-md-6 ">
                                    <label class="form-control-label">Spoken</label>
                                        <div class="d-flex radio-check">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="excellent" value="Excellent" name="languageadd[<?php echo e($i); ?>][spoken]" <?php if($obj->spoken=='Excellent'): ?> checked  <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="excellent"><?php echo e(__('Excellent')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="very_good" value="Very Good" name="languageadd[<?php echo e($i); ?>][spoken]" <?php if($obj->spoken=='Very Good'): ?> checked  <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="very_good"><?php echo e(__('Very Good')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="good" value="Good" name="languageadd[<?php echo e($i); ?>][spoken]" <?php if($obj->spoken=='Good'): ?> checked  <?php endif; ?>  class="custom-control-input">
                                                <label class="custom-control-label" for="good"><?php echo e(__('Good')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="poor" value="Poor" name="languageadd[<?php echo e($i); ?>][spoken]" <?php if($obj->spoken=='Poor'): ?> checked  <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="poor"><?php echo e(__('Poor')); ?></label>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label class="form-control-label">Written</label>
                                        <div class="d-flex radio-check">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="excellents" value="Excellent" name="languageadd[<?php echo e($i); ?>][written]"  <?php if($obj->written=='Excellent'): ?> checked  <?php endif; ?>  class="custom-control-input">
                                                <label class="custom-control-label" for="excellents"><?php echo e(__('Excellent')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="very_goods" value="Very Good" name="languageadd[<?php echo e($i); ?>][written]" <?php if($obj->written=='Very Good'): ?> checked  <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="very_goods"><?php echo e(__('Very Good')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="goods" value="Good" name="languageadd[<?php echo e($i); ?>][written]" <?php if($obj->written=='Good'): ?> checked  <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="goods"><?php echo e(__('Good')); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="poors" value="Poor" name="languageadd[<?php echo e($i); ?>][written]" <?php if($obj->written=='Poor'): ?> checked  <?php endif; ?> class="custom-control-input">
                                                <label class="custom-control-label" for="poors"><?php echo e(__('Poor')); ?></label>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>

        </div>

        <?php else: ?>
            <div class="col-md-6 ">
                <div class="employee-detail-wrap ">
                    <div class="card card-fluid">
                        <div class="card-header"><h6 class="mb-0"><?php echo e(__('Company Detail')); ?></h6></div>
                        <div class="card-body employee-detail-edit-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Branch')); ?></strong>
                                        <span><?php echo e(!empty($employee->branch)?$employee->branch->name:''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info font-style">
                                        <strong><?php echo e(__('Department')); ?></strong>
                                        <span><?php echo e(!empty($employee->department)?$employee->department->name:''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info font-style">
                                        <strong><?php echo e(__('Designation')); ?></strong>
                                        <span><?php echo e(!empty($employee->designation)?$employee->designation->name:''); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Date Of Joining')); ?></strong>
                                        <span><?php echo e(\Auth::user()->dateFormat($employee->company_doj)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if(\Auth::user()->type!='employee'): ?>
        <div class="row">
            <div class="col-md-6 ">
                <div class="card card-fluid">
                    <div class="card-header"><h6 class="mb-0"><?php echo e(__('Document')); ?></h6></div>
                    <div class="card-body employee-detail-edit-body">
                        <?php
                            $employeedoc = $employee->documents()->pluck('document_value',__('document_id'));
                        ?>

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
                                                <input class="form-control <?php if(!empty($employeedoc[$document->id])): ?> float-left <?php endif; ?> <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0" <?php if($document->is_required == 1 && empty($employeedoc[$document->id]) ): ?> required <?php endif; ?> name="document[<?php echo e($document->id); ?>]" type="file" id="document[<?php echo e($document->id); ?>]" data-filename="<?php echo e($document->id.'_filename'); ?>">
                                            </label>
                                            <p class="<?php echo e($document->id.'_filename'); ?>"></p>
                                        </div>

                                        <?php if(!empty($employeedoc[$document->id])): ?>
                                            <br> <span class="text-xs"><a href="<?php echo e((!empty($employeedoc[$document->id])?asset(Storage::url('uploads/document')).'/'.$employeedoc[$document->id]:'')); ?>" target="_blank"><?php echo e((!empty($employeedoc[$document->id])?$employeedoc[$document->id]:'')); ?></a>
                                                    </span>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-fluid">
                    <div class="card-header"><h6 class="mb-0"><?php echo e(__('Bank Account Detail')); ?></h6></div>
                    <div class="card-body employee-detail-edit-body">
                        <div class="row">
                        <div class="form-group col-md-6">
                            <?php echo Form::label('account_holder_name', __('Account Holder Name'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('account_holder_name', null, ['class' => 'form-control']); ?>


                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('account_number', __('Account Number'),['class'=>'form-control-label']); ?>

                            <?php echo Form::number('account_number', null, ['class' => 'form-control']); ?>


                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('bank_name', __('Bank Name'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('bank_name', null, ['class' => 'form-control']); ?>


                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('bank_identifier_code', __('Bank Identifier Code'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('bank_identifier_code',null, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('branch_location', __('Branch Location'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('branch_location',null, ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('tax_payer_id', __('Tax Payer Id'),['class'=>'form-control-label']); ?>

                            <?php echo Form::text('tax_payer_id',null, ['class' => 'form-control']); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- start -->

    <?php else: ?>
        <div class="row">
            <div class="col-md-6 ">
                <div class="employee-detail-wrap">
                    <div class="card card-fluid">
                        <div class="card-header"><h6 class="mb-0"><?php echo e(__('Document Detail')); ?></h6></div>
                        <div class="card-body employee-detail-edit-body">
                            <div class="row">
                                <?php
                                    $employeedoc = $employee->documents()->pluck('document_value',__('document_id'));
                                ?>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-12">
                                        <div class="info">
                                            <strong><?php echo e($document->name); ?></strong>
                                            <span><a href="<?php echo e((!empty($employeedoc[$document->id])?asset(Storage::url('uploads/document')).'/'.$employeedoc[$document->id]:'')); ?>" target="_blank"><?php echo e((!empty($employeedoc[$document->id])?$employeedoc[$document->id]:'')); ?></a></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="employee-detail-wrap">
                    <div class="card card-fluid">
                        <div class="card-header"><h6 class="mb-0"><?php echo e(__('Bank Account Detail')); ?></h6></div>
                        <div class="card-body employee-detail-edit-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Account Holder Name')); ?></strong>
                                        <span><?php echo e($employee->account_holder_name); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info font-style">
                                        <strong><?php echo e(__('Account Number')); ?></strong>
                                        <span><?php echo e($employee->account_number); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info font-style">
                                        <strong><?php echo e(__('Bank Name')); ?></strong>
                                        <span><?php echo e($employee->bank_name); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Bank Identifier Code')); ?></strong>
                                        <span><?php echo e($employee->bank_identifier_code); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Branch Location')); ?></strong>
                                        <span><?php echo e($employee->branch_location); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info">
                                        <strong><?php echo e(__('Tax Payer Id')); ?></strong>
                                        <span><?php echo e($employee->tax_payer_id); ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>



    <?php if(\Auth::user()->type != 'employee'): ?>
        <div class="row">
            <div class="col-12">
                <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create btn-xs badge-blue radius-10px float-right">
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            </div>
        </div>
        <?php echo e(Form::close()); ?>

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
        var i = 25;
        $("#dynamicedit-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields['+i+'][name]" placeholder="Enter name" class="form-control" /><td><input type="text" name="addMoreInputFields['+i+'][relation]" placeholder="Enter relation" class="form-control" /></td></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/javascript">

        function getDesignation(did) {
            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">Select any Designation</option>');
                    $.each(data, function (key, value) {
                        var select = '';
                        if (key == '<?php echo e($employee->designation_id); ?>') {
                            select = 'selected';
                        }

                        $('#designation_id').append('<option value="' + key + '"  ' + select + '>' + value + '</option>');
                    });
                }
            });
        }

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            var designation_id = '<?php echo e($employee->designation_id); ?>';
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        var l=100;
        var m=100;
        var n=100;
        var p = 100;
        var desi='<?php echo $store_designation ?>';

        // dynamic scripts start
        $("#dynamic-hr").click(function(){

            $("#history").append('<tr><td><input type="text" name="historyadd['+l+'][company_name]" placeholder="Enter name" class="form-control"/><td><select class="form-control" name="historyadd['+l+'][position]" id="department">'+desi+'</select><td><input   class="form-control" type="date" name="historyadd['+l+'][start_date]"  class="datepicker form-control" /><td><input type="date"  class=" form-control" name="historyadd['+l+'][end_date]"  class="datepicker form-control" /></td></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>');
            l++;
        });

        $("#dynamic-de").click(function(){
            $("#information").append('<tr><td><input type="text" name="informationadd['+m+'][name]" placeholder="Enter name" class="form-control"/></td><td><input type="text" name="informationadd['+m+'][relation]" placeholder="Enter relation" class="form-control" /></td><td><input   class="form-control" type="date" name="informationadd['+m+'][dob]"  class=" form-control" /></td><td><input type="text"  class=" form-control" name="informationadd['+m+'][status]"  class="form-control" /></td><td><input type="text" name="informationadd['+m+'][ic_number]"  class="form-control"/></td><td><input type="text" name="informationadd['+m+'][handicap]"  class="form-control"/></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>');
            m++;
        });

        $("#dynamic-qu").click(function(){
            $("#qualification").append('<tr><td><input type="text" name="qualificationadd['+n+'][qualification]" placeholder="Enter name" class="form-control"/></td><td><input type="text" name="qualificationadd['+n+'][specialization]" placeholder="Enter position" class="form-control" /></td><td><input type="text" name="qualificationadd['+n+'][insitution_name]" placeholder="Enter name" class="form-control"/></td><td><input   class="form-control" type="date" name="qualificationadd['+n+'][start_date]"  class="datepicker form-control" /></td><td><input type="date"  class=" form-control" name="qualificationadd['+n+'][end_date]"  class="datepicker form-control" /></td><td><button type="button" class="btn btn-xs badge-danger remove-input-field">Delete</button></td></tr>');
            n++;
        });

        var g ='<?php echo  $store_dept ?>';

        var desi='<?php echo $store_designation ?>';

$("#dynamic-po").click(function () {

    $("#position").append('<div class="row" id="textbox'+p+'"> <button type="button" class="btn btn-xs badge-danger remove ml-4">Delete</button><div class="col-md-12 "><div class="card card-fluid"><div class="card-header"></div><div class="card-body employee-detail-create-body"><div class="row">'+
    '<div class="form-group col-md-3 "><label class="form-control-label">Start date</label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][jobstart_date]"></div>'+
    '<div class="form-group col-md-3"><label class="form-control-label">End date </label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][jobend_date]"></div>'+
    '<div class="form-group col-md-3"><label class="form-control-label">Department</label> <select class="form-control" name="positionadd['+p+'][jobdepartment_id]" id="department">'+g+'</select></div>'+
    '<div class="form-group col-md-3"><label class="form-control-label">Position</label><select class="form-control" name="positionadd['+p+'][jobposition]" id="department">'+desi+'</select></div>'+
    '<div class="form-group col-md-3"><label class="form-control-label">EmploymentType</label><input type="text" class="form-control" id="" name="positionadd['+p+'][jobemployment_type]"></div>'+
    '<div class="form-group col-md-3 "><label class="form-control-label">Salary Code</label><div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline">'+
    '<input type="radio" id="code['+p+']" value="Coded" name="positionadd['+p+'][jobsalary_code]" class="custom-control-input"><label class="custom-control-label" for="code['+p+']">Code</label></div>'+
    '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="class['+p+']" value="ClassA" name="positionadd['+p+'][jobsalary_code]" class="custom-control-input"><label class="custom-control-label" for="class['+p+']">ClassA</label></div>'+
    '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="grade['+p+']" value="Grade" name="positionadd['+p+'][jobsalary_code]" class="custom-control-input"><label class="custom-control-label" for="grade['+p+']">Grade</label></div></div></div>'+
    '<div class="form-group col-md-3"><label class="form-control-label">Remark</label><input type="text" class="form-control" id="" name="positionadd['+p+'][jobremark]"></div><div class="form-group col-md-3 "><label class="form-control-label">Salary Code</label>'+
    '<div class="d-flex radio-check"><div class="custom-control custom-radio custom-control-inline"><input type="radio" id="yes['+p+']" value="Yes" name="positionadd['+p+'][jobconfirmation_status]" class="custom-control-input"><label class="custom-control-label"  for="yes['+p+']">Yes</label></div>'+
    '<div class="custom-control custom-radio custom-control-inline"><input type="radio" id="no['+p+']" value="No" name="positionadd['+p+'][jobconfirmation_status]" class="custom-control-input"><label class="custom-control-label" for="no['+p+']">No</label></div></div></div>'+
    '<div class="form-group col-md-3 "><label class="form-control-label">confirmation date </label><input type="date" class="form-control datepicker" id="" name="positionadd['+p+'][jobconfirmation_date]"></div>'+
    '<div class="form-group col-md-3"><label class="form-control-label">Confirmation Period</label><input type="text" class="form-control" id="" name="positionadd['+p+'][jobconfirmation_period]"></div>'+
    '<div class="form-group col-md-3"><label class="form-control-label">Status</label><input type="text" class="form-control" id="" name="positionadd['+p+'][jobstatus]"></div></div></div></div></div></div>');
    p++;
});


$(document).on('click', '.remove', function() {
        var del=$(this).parent().attr('id');
        $("#"+del).remove();
    });

var ij=190;
    $("#dynamic-la").click(function(){

        $("#LinguisticAbility").append('<div class="container card-header" id="textbox'+ij+'"><button type="button" class="btn btn-xs badge-danger remove">Delete</button> <div class="col-md-12 " >'+
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\UniRazak\resources\views/employee/edit.blade.php ENDPATH**/ ?>