<div class="card bg-none card-box">
     <?php echo e(Form::open(array('url'=>'comment/add','method'=>'post'))); ?>

    <div class="row">
        <div class="col-12">
                    <h6>Display Comments</h6>
                    <?php $__currentLoopData = $warning->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e($warning); ?>

                        <div class="display-comment">
                            <strong><?php echo e($comment->user->name); ?></strong>
                            <p><?php echo e($comment->body); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr />
              <hr />
                    <h6>Add comment</h6>
                        <div class="form-group">
                            <input type="text" name="comment_body" class="form-control" />
                            <input type="hidden" name="warning_id" value="<?php echo e($warning->id); ?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn-create badge-success" value="Add Comment" />
                        </div>
        </div>
    </div>
     <?php echo e(Form::close()); ?>

</div>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/warning/show.blade.php ENDPATH**/ ?>