


<div class="card bg-none card-box">
   
    <?php echo e(Form::open(array('url'=>'announcement','method'=>'post','enctype' => "multipart/form-data"))); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('title',__('Announcement Title'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Announcement Title')))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('branch_id',__('Branch'),['class'=>'form-control-label'])); ?>

                <select class="form-control select2" name="branch_id" id="branch_id" placeholder="Select Branch">
                    <option value=""><?php echo e(__('Select Branch')); ?></option>
                    <option value="0"><?php echo e(__('All Branch')); ?></option>
                    <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($branch->id); ?>"><?php echo e($branch->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('department_id',__('Department'),['class'=>'form-control-label'])); ?>

                <select class="form-control select2" name="department_id[]" id="department_id"
                    placeholder="Select Department" multiple>

                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('employee_id',__('Employee'),['class'=>'form-control-label'])); ?>

                <select class="form-control select2" name="employee_id[]" id="employee_id" placeholder="Select Employee"
                    multiple>

                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('start_date',__('Announcement start Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('start_date',null,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('end_date',__('Announcement End Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('end_date',null,array('class'=>'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">

                 <?php echo e(Form::label('description',__('Announcement Description'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::textarea('description',null,array('class'=>'form-control summernote-simple','id'=>'eventdescription', 'placeholder'=>__('Enter Announcement Title')))); ?>


            </div>
        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('documents',__('Document'),['class'=>'form-control-label'])); ?>

            <div class="choose-file form-group">
                <label for="documents" class="form-control-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="documents" id="documents"
                        data-filename="document_create" required>
                </label>
                <p class="document_create"></p>
            </div>
        </div>
        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<script>
    $('.summernote-simple').summernote();
</script> <?php /**PATH /var/www/html/UniRazak/resources/views/announcement/create.blade.php ENDPATH**/ ?>