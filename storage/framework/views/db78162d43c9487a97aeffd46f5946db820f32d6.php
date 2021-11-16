<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Holiday')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-button'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Holiday')): ?>
        <div class="all-button-box row d-flex justify-content-end mt-2">
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-12">
                <a href="#" data-url="<?php echo e(route('holiday.create')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto" data-ajax-popup="true" data-title="<?php echo e(__('Create New Holiday')); ?>">
                    <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                </a>
            </div>
            <div class="col-auto">
                <a href="<?php echo e(route('holiday.index')); ?>" class="action-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('List View')); ?>">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row d-flex justify-content-end">
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
            <?php echo e(Form::open(array('route' => array('holiday.calender'),'method'=>'get','id'=>'holiday_filter'))); ?>

            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('start_date',__('Start Date'),['class'=>'text-type'])); ?>

                    <?php echo e(Form::text('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'month-btn form-control datepicker'))); ?>

                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
            <div class="all-select-box">
                <div class="btn-box">
                    <?php echo e(Form::label('end_date',__('End Date'),['class'=>'text-type'])); ?>

                    <?php echo e(Form::text('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'month-btn form-control datepicker'))); ?>

                </div>
            </div>
        </div>
        <div class="col-auto my-custom">
            <a href="#" class="apply-btn" onclick="document.getElementById('holiday_filter').submit(); return false;" data-toggle="tooltip" data-original-title="<?php echo e(__('apply')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-search"></i></span>
            </a>
            <a href="<?php echo e(route('holiday.calender')); ?>" class="reset-btn" data-toggle="tooltip" data-original-title="<?php echo e(__('Reset')); ?>">
                <span class="btn-inner--icon"><i class="fas fa-trash-restore-alt"></i></span>
            </a>
        </div>
    </div>
    <div class="page-title">
        <div class="row justify-content-between align-items-center full-calender">
            <div class="col d-flex align-items-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="fullcalendar-btn-prev btn btn-sm btn-neutral">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a href="#" class="fullcalendar-btn-next btn btn-sm btn-neutral">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
                <h5 class="fullcalendar-title h4 d-inline-block font-weight-400 mb-0"></h5>
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0 text-lg-right">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="month"><?php echo e(__('Month')); ?></a>
                    <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicWeek"><?php echo e(__('Week')); ?></a>
                    <a href="#" class="btn btn-sm btn-neutral" data-calendar-view="basicDay"><?php echo e(__('Day')); ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- Fullcalendar -->
            <div class="card overflow-hidden widget-calendar">
                <div class="calendar e-height" data-toggle="event_calendar" id="event_calendar"></div>
            </div>
            <!-- Modal - Add new event -->
            <!--* Modal header *-->
            <div class="modal fade" id="new-event" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="new-event--form">
                                <div class="form-group">
                                    <label class="form-control-label">Event title</label>
                                    <input type="text" class="form-control form-control-alternative new-event--title" placeholder="Event Title">
                                </div>
                                <div class="form-group mb-0">
                                    <label class="form-control-label d-block mb-3">Status color</label>
                                    <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                                        <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" checked></label>
                                        <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning"></label>
                                        <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger"></label>
                                        <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success"></label>
                                        <label class="btn bg-secondary"><input type="radio" name="event-tag" value="bg-default"></label>
                                        <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary"></label>
                                    </div>
                                </div>
                                <input type="hidden" class="new-event--start"/>
                                <input type="hidden" class="new-event--end"/>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-sm btn-primary rounded-pill float-right new-event--add">Create event</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal - Edit event -->
            <div class="modal fade" id="edit-event" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="edit-event--form">
                                <div class="form-group">
                                    <label class="form-control-label">Event title</label>
                                    <input type="text" class="form-control form-control-alternative edit-event--title" placeholder="Event Title">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label d-block mb-3">Status color</label>
                                    <div class="btn-group btn-group-toggle btn-group-colors event-tag mb-0" data-toggle="buttons">
                                        <label class="btn bg-info active"><input type="radio" name="event-tag" value="bg-info" checked></label>
                                        <label class="btn bg-warning"><input type="radio" name="event-tag" value="bg-warning"></label>
                                        <label class="btn bg-danger"><input type="radio" name="event-tag" value="bg-danger"></label>
                                        <label class="btn bg-success"><input type="radio" name="event-tag" value="bg-success"></label>
                                        <label class="btn bg-secondary"><input type="radio" name="event-tag" value="bg-default"></label>
                                        <label class="btn bg-primary"><input type="radio" name="event-tag" value="bg-primary"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <textarea class="form-control form-control-alternative edit-event--description textarea-autosize" placeholder="Event Desctiption"></textarea>
                                    <i class="form-group--bar"></i>
                                </div>
                                <input type="hidden" class="edit-event--id">
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-link" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-sm btn-primary rounded-pill float-right" data-calendar="update">Update</button>
                            <button type="button" class="btn btn-sm btn-danger rounded-pill float-right" data-calendar="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('theme-script'); ?>
    <script src="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        // load chart data using these
        // event_calendar (not working now)
        var e, t, a = $('[data-toggle="event_calendar"]');
        a.length && (t = {
            header: {right: "", center: "", left: ""},
            buttonIcons: {prev: "calendar--prev", next: "calendar--next"},
            theme: !1,
            selectable: !0,
            selectHelper: !0,
            editable: !0,
            events: <?php echo $arrHolidays; ?> ,
            eventStartEditable: !1,
            locale: '<?php echo e(basename(App::getLocale())); ?>',

            eventResize: function (event) {
                var eventObj = {
                    start: event.start.format(),
                    end: event.end.format(),
                };

                $.ajax({
                    url: event.resize_url,
                    method: 'PUT',
                    data: eventObj,
                    success: function (response) {
                    },
                    error: function (data) {
                        data = data.responseJSON;
                    }
                });
            },
            viewRender: function (t) {
                e.fullCalendar("getDate").month(), $(".fullcalendar-title").html(t.title)
            },
            eventClick: function (e, t) {
                var title = e.title;
                var url = e.url;

                if (typeof url != 'undefined') {
                    $("#commonModal .modal-title").html(title);
                    $("#commonModal .modal-dialog").addClass('modal-md');
                    $("#commonModal").modal('show');
                    $.get(url, {}, function (data) {
                        $('#commonModal .modal-body').html(data);
                    });
                    return false;
                }
            }
        }, (e = a).fullCalendar(t),
            $("body").on("click", "[data-calendar-view]", function (t) {
                t.preventDefault(), $("[data-calendar-view]").removeClass("active"), $(this).addClass("active");
                var a = $(this).attr("data-calendar-view");
                e.fullCalendar("changeView", a)
            }), $("body").on("click", ".fullcalendar-btn-next", function (t) {
            t.preventDefault(), e.fullCalendar("next")
        }), $("body").on("click", ".fullcalendar-btn-prev", function (t) {
            t.preventDefault(), e.fullCalendar("prev")
        }));


    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/myunicr/public_html/resources/views/holiday/calender.blade.php ENDPATH**/ ?>