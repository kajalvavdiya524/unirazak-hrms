<div class="card bg-none card-box">
    <?php echo e(Form::model($goalTracking,array('route' => array('goaltracking.update', $goalTracking->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('branch',__('Branch'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('branch',$brances,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('goal_type',__('GoalTypes'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('goal_type',$goalTypes,null,array('class'=>'form-control select2','required'=>'required'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('start_date',__('Start Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('start_date',null,array('class' => 'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('end_date',__('End Date'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('end_date',null,array('class' => 'form-control datepicker'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('subject',__('Subject'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('subject',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('target_achievement',__('Target Achievement'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::text('target_achievement',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('description',__('Description'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::textarea('description',null,array('class'=>'form-control'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('status',__('Status'),['class'=>'form-control-label'])); ?>

                <?php echo e(Form::select('status',$status,null,array('class'=>'form-control select2'))); ?>

            </div>
        </div>
        <div class="col-md-12">
            <fieldset id='demo1' class="rating">
                <input class="stars" type="radio" id="rating-5" name="rating" value="5" <?php echo e(($goalTracking->rating==5) ? 'checked':''); ?> >
                <label class="full" for="rating-5" title="Awesome - 5 stars"></label>
                <input class="stars" type="radio" id="rating-4" name="rating" value="4" <?php echo e(($goalTracking->rating==4) ? 'checked':''); ?>>
                <label class="full" for="rating-4" title="Pretty good - 4 stars"></label>
                <input class="stars" type="radio" id="rating-3" name="rating" value="3" <?php echo e(($goalTracking->rating==3) ? 'checked':''); ?>>
                <label class="full" for="rating-3" title="Meh - 3 stars"></label>
                <input class="stars" type="radio" id="rating-2" name="rating" value="2" <?php echo e(($goalTracking->rating==2) ? 'checked':''); ?>>
                <label class="full" for="rating-2" title="Kinda bad - 2 stars"></label>
                <input class="stars" type="radio" id="technical-1" name="rating" value="1" <?php echo e(($goalTracking->rating==1) ? 'checked':''); ?>>
                <label class="full" for="technical-1" title="Sucks big time - 1 star"></label>
            </fieldset>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="range" class="slider w-100 mb-0 " name="progress" id="myRange" value="<?php echo e($goalTracking->progress); ?>" min="1" max="100" oninput="ageOutputId.value = myRange.value">
                <output name="ageOutputName" id="ageOutputId"><?php echo e($goalTracking->progress); ?></output>
                %
            </div>
        </div>

        <div class="col-12">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /home/myunicr/public_html/resources/views/goaltracking/edit.blade.php ENDPATH**/ ?>