<div class="card bg-none card-box">
    <div class="row py-4">
        <div class="col-md-12">
            <div class="info text-sm">
                <strong><?php echo e(__('Branch')); ?> : </strong>
                <span><?php echo e(!empty($appraisal->branches)?$appraisal->branches->name:''); ?></span>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="info text-sm font-style">
                <strong><?php echo e(__('Employee')); ?> : </strong>
                <span><?php echo e(!empty($appraisal->employees)?$appraisal->employees->name:''); ?></span>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="info text-sm font-style">
                <strong><?php echo e(__('Appraisal Date')); ?> : </strong>
                <span><?php echo e($appraisal->appraisal_date); ?></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <h6><?php echo e(__('Technical Competencies')); ?></h6>
            <hr class="mt-0">
        </div>
        <?php $__currentLoopData = $technicals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $technical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-6">
                <?php echo e($technical->name); ?>

            </div>
            <div class="col-6">
                <fieldset id='demo1' class="rating">
                    <input class="stars" type="radio" id="technical-5-<?php echo e($technical->id); ?>" name="rating[<?php echo e($technical->id); ?>]" value="5" <?php echo e((isset($ratings[$technical->id]) && $ratings[$technical->id] == 5)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-5-<?php echo e($technical->id); ?>" title="Awesome - 5 stars"></label>
                    <input class="stars" type="radio" id="technical-4-<?php echo e($technical->id); ?>" name="rating[<?php echo e($technical->id); ?>]" value="4" <?php echo e((isset($ratings[$technical->id]) && $ratings[$technical->id] == 4)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-4-<?php echo e($technical->id); ?>" title="Pretty good - 4 stars"></label>
                    <input class="stars" type="radio" id="technical-3-<?php echo e($technical->id); ?>" name="rating[<?php echo e($technical->id); ?>]" value="3" <?php echo e((isset($ratings[$technical->id]) && $ratings[$technical->id] == 3)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-3-<?php echo e($technical->id); ?>" title="Meh - 3 stars"></label>
                    <input class="stars" type="radio" id="technical-2-<?php echo e($technical->id); ?>" name="rating[<?php echo e($technical->id); ?>]" value="2" <?php echo e((isset($ratings[$technical->id]) && $ratings[$technical->id] == 2)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-2-<?php echo e($technical->id); ?>" title="Kinda bad - 2 stars"></label>
                    <input class="stars" type="radio" id="technical-1-<?php echo e($technical->id); ?>" name="rating[<?php echo e($technical->id); ?>]" value="1" <?php echo e((isset($ratings[$technical->id]) && $ratings[$technical->id] == 1)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-1-<?php echo e($technical->id); ?>" title="Sucks big time - 1 star"></label>
                </fieldset>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <h6><?php echo e(__('Organizational Competencies')); ?></h6>
            <hr class="mt-0">
        </div>
        <?php $__currentLoopData = $organizationals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organizational): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6">
                <?php echo e($organizational->name); ?>

            </div>
            <div class="col-6">
                <fieldset id='demo1' class="rating">
                    <input class="stars" type="radio" id="technical-5-<?php echo e($organizational->id); ?>" name="rating[<?php echo e($organizational->id); ?>]" value="5" <?php echo e((isset($ratings[$organizational->id]) && $ratings[$organizational->id] == 5)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-5-<?php echo e($organizational->id); ?>" title="Awesome - 5 stars"></label>
                    <input class="stars" type="radio" id="technical-4-<?php echo e($organizational->id); ?>" name="rating[<?php echo e($organizational->id); ?>]" value="4" <?php echo e((isset($ratings[$organizational->id]) && $ratings[$organizational->id] == 4)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-4-<?php echo e($organizational->id); ?>" title="Pretty good - 4 stars"></label>
                    <input class="stars" type="radio" id="technical-3-<?php echo e($organizational->id); ?>" name="rating[<?php echo e($organizational->id); ?>]" value="3" <?php echo e((isset($ratings[$organizational->id]) && $ratings[$organizational->id] == 3)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-3-<?php echo e($organizational->id); ?>" title="Meh - 3 stars"></label>
                    <input class="stars" type="radio" id="technical-2-<?php echo e($organizational->id); ?>" name="rating[<?php echo e($organizational->id); ?>]" value="2" <?php echo e((isset($ratings[$organizational->id]) && $ratings[$organizational->id] == 2)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-2-<?php echo e($organizational->id); ?>" title="Kinda bad - 2 stars"></label>
                    <input class="stars" type="radio" id="technical-1-<?php echo e($organizational->id); ?>" name="rating[<?php echo e($organizational->id); ?>]" value="1" <?php echo e((isset($ratings[$organizational->id]) && $ratings[$organizational->id] == 1)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-1-<?php echo e($organizational->id); ?>" title="Sucks big time - 1 star"></label>
                </fieldset>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <h6><?php echo e(__('Behavioural Competencies')); ?></h6>
            <hr class="mt-0">
        </div>
        <?php $__currentLoopData = $behaviourals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $behavioural): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6">
                <?php echo e($behavioural->name); ?>

            </div>
            <div class="col-6">
                <fieldset id='demo1' class="rating">
                    <input class="stars" type="radio" id="technical-5-<?php echo e($behavioural->id); ?>" name="rating[<?php echo e($behavioural->id); ?>]" value="5" <?php echo e((isset($ratings[$behavioural->id]) && $ratings[$behavioural->id] == 5)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-5-<?php echo e($behavioural->id); ?>" title="Awesome - 5 stars"></label>
                    <input class="stars" type="radio" id="technical-4-<?php echo e($behavioural->id); ?>" name="rating[<?php echo e($behavioural->id); ?>]" value="4" <?php echo e((isset($ratings[$behavioural->id]) && $ratings[$behavioural->id] == 4)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-4-<?php echo e($behavioural->id); ?>" title="Pretty good - 4 stars"></label>
                    <input class="stars" type="radio" id="technical-3-<?php echo e($behavioural->id); ?>" name="rating[<?php echo e($behavioural->id); ?>]" value="3" <?php echo e((isset($ratings[$behavioural->id]) && $ratings[$behavioural->id] == 3)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-3-<?php echo e($behavioural->id); ?>" title="Meh - 3 stars"></label>
                    <input class="stars" type="radio" id="technical-2-<?php echo e($behavioural->id); ?>" name="rating[<?php echo e($behavioural->id); ?>]" value="2" <?php echo e((isset($ratings[$behavioural->id]) && $ratings[$behavioural->id] == 2)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-2-<?php echo e($behavioural->id); ?>" title="Kinda bad - 2 stars"></label>
                    <input class="stars" type="radio" id="technical-1-<?php echo e($behavioural->id); ?>" name="rating[<?php echo e($behavioural->id); ?>]" value="1" <?php echo e((isset($ratings[$behavioural->id]) && $ratings[$behavioural->id] == 1)? 'checked':''); ?> disabled>
                    <label class="full" for="technical-1-<?php echo e($behavioural->id); ?>" title="Sucks big time - 1 star"></label>
                </fieldset>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h6><?php echo e(__('Remark')); ?></h6>
        </div>
        <div class="col-md-12 mt-3">
            <p class="text-sm"><?php echo e($appraisal->remark); ?></p>
        </div>
    </div>

</div>
<?php /**PATH /home/myunicr/public_html/resources/views/appraisal/show.blade.php ENDPATH**/ ?>