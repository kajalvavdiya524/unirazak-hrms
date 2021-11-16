<?php
    use App\Utility;
    $users=\Auth::user();
    $currantLang = $users->currentLanguage();
    $languages=Utility::languages();
    $profile=asset(Storage::url('uploads/avatar/'));

?>
<nav class="navbar navbar-main navbar-expand-lg navbar-border n-top-header" id="navbar-main">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-user d-lg-none ml-auto">
            <ul class="navbar-nav flex-row align-items-center">
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-icon" data-action="omnisearch-open" data-target="#omnisearch"><i class="fas fa-search"></i></a>
                </li>
                <?php if(\Auth::user()->type != 'super admin'): ?>


                    <li class="nav-item dropdown dropdown-animate ">
                        <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-envelope m-0"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow p-0">
                            <div class="py-3 px-3">
                                <h5 class="heading h6 mb-0"><?php echo e(__('Messages')); ?></h5>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group list-group-flush dropdown-list-message-msg">

                                </div>
                            </div>
                            <div class="py-3 text-center">
                                <a href="<?php echo e(url('messages')); ?>"><?php echo e(__('View All')); ?> <i class="fa fa-chevron-right"></i></a>
                                <a href="#" class="mark_all_as_read_message"><?php echo e(__('Mark All As Read')); ?></a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="avatar avatar-sm rounded-circle">
                            <img src="<?php echo e((!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')); ?>">
                          </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="dropdown-header px-0"><?php echo e(__('Hi')); ?>, <?php echo e(\Auth::user()->name); ?></h6>
                        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo e(__('My profile')); ?></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span><?php echo e(__('Logout')); ?></span>
                            <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse navbar-collapse-fade" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-center d-none d-lg-flex">
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-icon sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item dropdown dropdown-animate">
                    <a class="nav-link pr-lg-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media media-pill align-items-center">
                            <span class="avatar rounded-circle">
                              <img alt="Image placeholder" src="<?php echo e((!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')); ?>">
                            </span>
                            <div class="ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?php echo e(\Auth::user()->name); ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow">
                        <h6 class="dropdown-header px-0"><?php echo e(__('Hi')); ?>, <?php echo e(\Auth::user()->name); ?></h6>
                        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo e(__('My profile')); ?></span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span><?php echo e(__('Logout')); ?></span>
                            <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo e(csrf_field()); ?>

                            </form>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-lg-auto align-items-lg-center">
                <?php if(Auth::user()->type != 'super admin'): ?>
                <li class="nav-item dropdown dropdown-animate ">
                     <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell m-0"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow p-0">
                                <div class="py-3 px-3">
                                    <h5 class="heading h6 mb-0"><?php echo e(__('Notification')); ?></h5>
                                </div>
                                <div class="list-group list-group-flush">
                                    <div class="list-group list-group-flush notification-dropdown">

                                          <?php if(Auth::user()->type != 'employee'): ?>
                                          <?php

                                          $users = DB::table('hr_notification')
                                            ->select('hr_notification.body','hr_notification.created_at','hr_notification.id as idd','hr_notification.link','hr_notification.title')
                                            ->join('employees','employees.id','=','hr_notification.from_id')
                                            ->join('users','users.id','=','employees.user_id')->take(5)->orderBy('idd', 'DESC')->get();
                                          ?>
                                          <?php if($users): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="list-group list-group-flush "><a href="<?php echo e(url($value->link)); ?>" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="">
                                                    <div>
                                                        <img alt="image" src="http://localhost/UniRazak/storage/uploads/avatar/avatar.png" class="avatar rounded-circle">
                                                    </div>
                                                    <div class="flex-fill ml-3">
                                                        <div class="h6 text-sm mb-0"><?php echo e($value->title); ?> <small class="float-right text-muted"><?php echo e(\Carbon\Carbon::parse($value->created_at)->diffForHumans()); ?></small></div>
                                                        <p class="text-sm lh-140 mb-0 notify" >
                                                        <?php echo e($value->body); ?>

                                                        </p>
                                                    </div>
                                                </div>
                                                </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>

                                          <?php endif; ?>



                                        <?php if(Auth::user()->type == 'employee'): ?>
                                            <?php
                                            $id=Auth::user()->id;
                                            $users = DB::table('notification')
                                            ->select('notification.body','notification.created_at','notification.id as idd')
                                            ->join('employees','employees.id','=','notification.to_id')
                                            ->join('users','users.id','=','employees.user_id')
                                            ->where('users.id',$id)
                                            ->where('notification.seen','0')->take(5)->orderBy('idd', 'DESC')->get();
                                            ?>
                                            <?php if($users): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="list-group list-group-flush "><a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-center" data-toggle="tooltip" data-placement="right" data-title="2 hrs ago">
                                                    <div>
                                                        <img alt="image" src="http://localhost/UniRazak/storage/uploads/avatar/avatar.png" class="avatar rounded-circle">
                                                    </div>
                                                    <div class="flex-fill ml-3">
                                                        <div class="h6 text-sm mb-0"><?php echo e($value->body); ?> <small class="float-right text-muted"><?php echo e(\Carbon\Carbon::parse($value->created_at)->diffForHumans()); ?></small></div>
                                                        <p class="text-sm lh-140 mb-0">

                                                        </p>
                                                    </div>
                                                </div>
                                                </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="py-3 text-center">
                                    <!-- <a href="<?php echo e(url('messages')); ?>"><?php echo e(__('View All')); ?> <i class="fa fa-chevron-right"></i></a>
                                    <a href="#" class="mark_all_as_read_message"><?php echo e(__('Mark All As Read')); ?></a> -->
                                </div>
                        </div>
                </li>
                    <li class="nav-item dropdown dropdown-animate ">
                        <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-envelope m-0"></i></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg dropdown-menu-arrow p-0">
                            <div class="py-3 px-3">
                                <h5 class="heading h6 mb-0"><?php echo e(__('Messages')); ?></h5>
                            </div>
                            <div class="list-group list-group-flush dropdown-list-message-msg">

                            </div>
                            <div class="py-3 text-center">
                                <a href="<?php echo e(url('messages')); ?>"><?php echo e(__('View All')); ?> <i class="fa fa-chevron-right"></i></a>
                                <a href="#" class="mark_all_as_read_message"><?php echo e(__('Mark All As Read')); ?></a>
                            </div>
                        </div>
                    </li>

                <?php endif; ?>
                <li class="nav-item">
                    <div class="dropdown global-icon" data-toggle="tooltip" data-original-titla="<?php echo e(__('Choose Language')); ?>">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-globe-europe"></i>
                        </button>
                        <div class="dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Language')): ?>
                                <a class="dropdown-item" href="<?php echo e(route('manage.language',[$currantLang])); ?>"><?php echo e(__('Create & Customize')); ?></a>
                            <?php endif; ?>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="dropdown-item <?php if($language == $currantLang): ?> text-danger <?php endif; ?>" href="<?php echo e(route('change.language',$language)); ?>"><?php echo e(Str::upper($language)); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH C:\wamp64\www\UniRazak\resources\views/partial/Admin/header.blade.php ENDPATH**/ ?>