<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Permission')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Permission')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4> <?php echo e(__('Manage Permission')); ?></h4>

                                    <a href="#" data-url="<?php echo e(route('permissions.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Add Permission')); ?>" data-original-title="<?php echo e(__('Add Permission')); ?>">

                                        <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.861 49.861"><path d="M45.963 21.035h-17.14V3.896C28.824 1.745 27.08 0 24.928 0s-3.896 1.744-3.896 3.896v17.14H3.895C1.744 21.035 0 22.78 0 24.93s1.743 3.895 3.895 3.895h17.14v17.14c0 2.15 1.744 3.896 3.896 3.896s3.896-1.744 3.896-3.896v-17.14h17.14c2.152 0 3.896-1.744 3.896-3.895a3.9 3.9 0 0 0-3.898-3.896z" fill="#010002"/></svg>
                                      </span>
                                        <?php echo e(__('Create')); ?>

                                    </a>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-sm-12 card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped dataTable" >
                                                        <thead class="">
                                                        <tr>
                                                            <th scope="col" style="width: 88%;"><?php echo e(__('title')); ?></th>
                                                            <th scope="col" style="width: 12%;"><?php echo e(__('Action')); ?></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr role="row">
                                                                <td><?php echo e($permission->name); ?></td>
                                                                <td>
                                                                    <a href="#" data-url="<?php echo e(route('permissions.edit',$permission->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Update permission')); ?>" class="btn btn-outline btn-sm blue-madison">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                    <a href="#" class="btn btn-outline btn-sm red" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($permission->id); ?>').submit();">
                                                                        <i class="far fa-trash-alt"></i></a>
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id],'id'=>'delete-form-'.$permission->id]); ?>

                                                                    <?php echo Form::close(); ?>

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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/UniRazak/resources/views/permission/index.blade.php ENDPATH**/ ?>