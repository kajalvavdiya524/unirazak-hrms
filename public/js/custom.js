/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function () {
    if ($(".dataTable").length > 0) {
        $(".dataTable").dataTable({
            language: dataTabelLang,
        });
    }

    if ($(".datepicker").length > 0) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });
    }

    if ($(".timepicker_format").length > 0) {
        $('.timepicker_format').timepicker({
            showMeridian: false,
            minuteStep: 5,

        });
    }

    if ($(".select2").length > 0) {
        $(".select2").select2({
            disableOnMobile: false,
            nativeOnMobile: false
        });
    }

    if ($(".summernote-simple").length) {
        $('.summernote-simple').summernote();
    }

    // for Choose file
    $(document).on('change', 'input[type=file]', function () {
        var fileclass = $(this).attr('data-filename');
        var finalname = $(this).val().split('\\').pop();
        $('.' + fileclass).html(finalname);
    });
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function show_toastr(title, message, type) {
    var o, i;
    var icon = '';
    var cls = '';

    if (type == 'success') {
        icon = 'fas fa-check-circle';
        cls = 'success';
    } else {
        icon = 'fas fa-times-circle';
        cls = 'danger';
    }

    $.notify({icon: icon, title: " " + title, message: message, url: ""}, {
        element: "body",
        type: cls,
        allow_dismiss: !0,
        placement: {
            from: 'top',
            align: toster_pos
        },
        offset: {x: 15, y: 15},
        spacing: 10,
        z_index: 1080,
        delay: 2500,
        timer: 2000,
        url_target: "_blank",
        mouse_over: !1,
        animate: {enter: o, exit: i},
        template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
    });
}

$(document).on('click', 'a[data-ajax-popup="true"], button[data-ajax-popup="true"], div[data-ajax-popup="true"]', function () {

    // alert('asd');
    var title = $(this).data('title');
    var size = ($(this).data('size') == '') ? 'md' : $(this).data('size');
    var url = $(this).data('url');


    $("#commonModal .modal-title").html(title);
    $("#commonModal .modal-dialog").addClass('modal-' + size);
    $.ajax({
        url: url,
        success: function (data) {


            // alert(data);
            // return false;
            if (data.length) {
                $('#commonModal .modal-body').html(data);
                $("#commonModal").modal('show');
                common_bind();

                // common_bind_select();
            } else {
                show_toastr('Error', 'Permission denied', 'error');
                $("#commonModal").modal('hide');
            }
        },
        error: function (data) {

            data = data.responseJSON;
            show_toastr('Error', data.error, 'error');
        }
    });
});

(function ($, window, i) {
    // Bootstrap 4 Modal
    $.fn.fireModal = function (options) {
        var options = $.extend({
            size: 'modal-md',
            center: false,
            animation: true,
            title: 'Modal Title',
            closeButton: false,
            header: true,
            bodyClass: '',
            footerClass: '',
            body: '',
            buttons: [],
            autoFocus: true,
            created: function () {
            },
            appended: function () {
            },
            onFormSubmit: function () {
            },
            modal: {}
        }, options);
        this.each(function () {
            i++;
            var id = 'fire-modal-' + i,
                trigger_class = 'trigger--' + id,
                trigger_button = $('.' + trigger_class);
            $(this).addClass(trigger_class);
            // Get modal body
            let body = options.body;
            if (typeof body == 'object') {
                if (body.length) {
                    let part = body;
                    body = body.removeAttr('id').clone().removeClass('modal-part');
                    part.remove();
                } else {
                    body = '<div class="text-danger">Modal part element not found!</div>';
                }
            }
            // Modal base template
            var modal_template = '   <div class="modal' + (options.animation == true ? ' fade' : '') + '" tabindex="-1" role="dialog" id="' + id + '">  ' +
                '     <div class="modal-dialog ' + options.size + (options.center ? ' modal-dialog-centered' : '') + '" role="document">  ' +
                '       <div class="modal-content">  ' +
                ((options.header == true) ?
                    '         <div class="modal-header">  ' +
                    '           <h5 class="modal-title mx-auto">' + options.title + '</h5>  ' +
                    ((options.closeButton == true) ?
                        '           <button type="button" class="close" data-dismiss="modal" aria-label="Close">  ' +
                        '             <span aria-hidden="true">&times;</span>  ' +
                        '           </button>  '
                        : '') +
                    '         </div>  '
                    : '') +
                '         <div class="modal-body text-center text-dark">  ' +
                '         </div>  ' +
                (options.buttons.length > 0 ?
                    '         <div class="modal-footer mx-auto">  ' +
                    '         </div>  '
                    : '') +
                '       </div>  ' +
                '     </div>  ' +
                '  </div>  ';
            // Convert modal to object
            var modal_template = $(modal_template);
            // Start creating buttons from 'buttons' option
            var this_button;
            options.buttons.forEach(function (item) {
                // get option 'id'
                let id = "id" in item ? item.id : '';
                // Button template
                this_button = '<button type="' + ("submit" in item && item.submit == true ? 'submit' : 'button') + '" class="' + item.class + '" id="' + id + '">' + item.text + '</button>';
                // add click event to the button
                this_button = $(this_button).off('click').on("click", function () {
                    // execute function from 'handler' option
                    item.handler.call(this, modal_template);
                });
                // append generated buttons to the modal footer
                $(modal_template).find('.modal-footer').append(this_button);
            });
            // append a given body to the modal
            $(modal_template).find('.modal-body').append(body);
            // add additional body class
            if (options.bodyClass) $(modal_template).find('.modal-body').addClass(options.bodyClass);
            // add footer body class
            if (options.footerClass) $(modal_template).find('.modal-footer').addClass(options.footerClass);
            // execute 'created' callback
            options.created.call(this, modal_template, options);
            // modal form and submit form button
            let modal_form = $(modal_template).find('.modal-body form'),
                form_submit_btn = modal_template.find('button[type=submit]');
            // append generated modal to the body
            $("body").append(modal_template);
            // execute 'appended' callback
            options.appended.call(this, $('#' + id), modal_form, options);
            // if modal contains form elements
            if (modal_form.length) {
                // if `autoFocus` option is true
                if (options.autoFocus) {
                    // when modal is shown
                    $(modal_template).on('shown.bs.modal', function () {
                        // if type of `autoFocus` option is `boolean`
                        if (typeof options.autoFocus == 'boolean')
                            modal_form.find('input:eq(0)').focus(); // the first input element will be focused
                        // if type of `autoFocus` option is `string` and `autoFocus` option is an HTML element
                        else if (typeof options.autoFocus == 'string' && modal_form.find(options.autoFocus).length)
                            modal_form.find(options.autoFocus).focus(); // find elements and focus on that
                    });
                }
                // form object
                let form_object = {
                    startProgress: function () {
                        modal_template.addClass('modal-progress');
                    },
                    stopProgress: function () {
                        modal_template.removeClass('modal-progress');
                    }
                };
                // if form is not contains button element
                if (!modal_form.find('button').length) $(modal_form).append('<button class="d-none" id="' + id + '-submit"></button>');
                // add click event
                form_submit_btn.click(function () {
                    modal_form.submit();
                });
                // add submit event
                modal_form.submit(function (e) {
                    // start form progress
                    form_object.startProgress();
                    // execute `onFormSubmit` callback
                    options.onFormSubmit.call(this, modal_template, e, form_object);
                });
            }
            $(document).on("click", '.' + trigger_class, function () {
                $('#' + id).modal(options.modal);
                return false;
            });
        });
    }
    // Bootstrap Modal Destroyer
    $.destroyModal = function (modal) {
        modal.modal('hide');
        modal.on('hidden.bs.modal', function () {
        });
    }
})(jQuery, this, 0);

$('[data-confirm]').each(function () {

    var me = $(this),
        me_data = me.data('confirm');

    me_data = me_data.split("|");
    me.fireModal({
        title: me_data[0],
        body: me_data[1],
        buttons: [
            {
                text: me.data('confirm-text-yes') || 'Yes',
                class: 'btn btn-sm btn-danger rounded-pill',
                handler: function () {
                    eval(me.data('confirm-yes'));
                }
            },
            {
                text: me.data('confirm-text-cancel') || 'Cancel',
                class: 'btn btn-sm btn-secondary rounded-pill',
                handler: function (modal) {
                    $.destroyModal(modal);
                    eval(me.data('confirm-no'));
                }
            }
        ]
    })
});


function common_bind() {


    if ($(".datepicker").length) {
        $('.datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'yyyy-mm-dd',
            locale: date_picker_locale,
        });
    }


    if (jQuery().select2) {
        $(".select2").select2({
            disableOnMobile: false,
            nativeOnMobile: false
        });
    }

    $('.timepicker').timepicker({
        showMeridian: false,
        minuteStep: 5,
    });


    if ($(".custom-datepicker").length) {
        $('.custom-datepicker').daterangepicker({
            singleDatePicker: true,
            format: 'Y-MM',
            locale: {
                format: 'Y-MM'
            }
        });

    }


}
    var jsonObj = [];
    var subarray=[];
    var gobalcnt=0;
    var cnt=0;
    function customeQuestion(CustomeSelect){
        // customeQuestionFileds
         $(".customeQuestionFileds").html(' ');
        gobalcnt++;
        if(CustomeSelect==1)
        {
            $(".createTextboxdata").css('display','block');


        }
        if(CustomeSelect==2)
        {
                $(".createTextboxdata").css('display','none');

            $(".customeQuestionFileds").append('<div class=""><label>Add CheckBox</label><input type="text" name="checkboxtitle['+gobalcnt+'][]" class="form-control col-sm-12" id="check-gender" required /> <a href="#" class="btn btn-primary btn-sm" for="check-gender" id="addcheckbox'+cnt+'" onclick="checkboxplusedata('+cnt+')" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br> <div class="custom-control custom-checkbox" id="textbo1"> <input type="checkbox" class="custom-control-input" name="checkboxvalue[]" id="addcheck" ><label class="custom-control-label" for="addcheck"><input type="text" name="checkboxoptionname['+gobalcnt+'][]" value="option" class="form-control" required /> </label><span class="remove m-5" id="fristcheckbox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  </div><div class="custom-control custom-checkbox secondcheckbox'+cnt+'"></div>   </div>');
        }
        if(CustomeSelect==3)
        {
                $(".createTextboxdata").css('display','none');

            $(".customeQuestionFileds").append('<div class=""><label>Add Radio Button</label><input type="text" name="radiobtntitle['+gobalcnt+'][]" class="form-control col-sm-12" value="Untitled Question" required /> <a href="#" class="btn btn-primary btn-sm" id="addradiobtn'+cnt+'"  onclick="radioplusedata('+cnt+')" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br> <div class="custom-control custom-radio" id="radiobo1"> <input type="radio" class="custom-control-input" name="radiovalue[]" id="radiobo1" ><label class="custom-control-label" for="radiobo1"><input type="text" name="radiobtnoptionname['+gobalcnt+'][]" value="option" class="form-control" required /> </label><span class="remove m-5" id="fristradiobox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  </div><div class="custom-control custom-radio secondcheckbox'+cnt+'"></div>   </div>');
        }
        if(CustomeSelect==4){
                $(".createTextboxdata").css('display','none');

            $(".customeQuestionFileds").append('<div class=""><label>Add DropDown</label><input type="text" name="dropdowntitle['+gobalcnt+'][]" class="form-control col-sm-12" value="Untitled Question" required /> <a href="#" class="btn btn-primary btn-sm" id="adddropdownbtn'+cnt+'" onclick="dropwonplusedata('+cnt+')" style="padding: 2px 8px 0 9px;" ><i class="fa fa-plus" aria-hidden="true"></i></a><br> <div class="custom-control custom-radio" id="radiobo1"> <input type="text" class="custom-control-input" name="dropdownvalue[]" id="dropdown"  ><label class="custom-control-label"><input type="text" name="dropdownoptionname['+gobalcnt+'][]" value="option" class="form-control" required /> </label><span class="remove m-5" id="fristradiobox" style="cursor: pointer;" ><i class="fas fa-times"></i></span>  </div><div class="custom-control secondcheckbox'+cnt+'"></div>   </div>');
        }
        cnt++;

        // var jsonString = JSON.stringify(jsonObj);
        // var jsonString = JSON.stringify(jsonObj);
    }

    var i=0;
    //dynamic delete checkbox
    $(document).on('click', '.remove', function() {
        var del=$(this).parent().attr('id');
        $("#"+del).remove();
    });

  function termscheckbox(){
    if($('[type="checkbox"]').is(":checked")){
        $("#hideDyanamicData").css('display','block');
    }else{
        $("#hideDyanamicData").css('display','none');
     }
}

var manicnt=0;
function checkboxplusedata(value)
{
    $(".secondcheckbox"+value).append('<div class="custom-checkbox" id="textbox'+manicnt+'"> <input type="checkbox" class="custom-control-input" name="checkbox['+manicnt+'][]" id="'+manicnt+'"><label class="custom-control-label" for="'+manicnt+'"><input type="text" name="checkboxoptionname['+gobalcnt+'][]" value="option" class="form-control" required /> </label> <span class="remove m-5" style="cursor: pointer;"><i class="fas fa-times"></i></span> </div>');
    manicnt++;

    console.log(jsonObj);


}
var radiocnt=101;
function radioplusedata(value)
{
    $(".secondcheckbox"+value).append('<div class="custom-radio" id="textbox'+radiocnt+'"> <input type="checkbox" class="custom-control-input" name="radio[]" id="g_radio'+radiocnt+'" value="'+radiocnt+'"><label class="custom-control-label" for="g_radio'+radiocnt+'"><input type="text" name="radiobtnoptionname['+gobalcnt+'][]" value="option" class="form-control" required/> </label> <span class="remove m-5" style="cursor: pointer;"><i class="fas fa-times"></i></span> </div>');

    radiocnt++;
}

var dropdowncnt=501;
function dropwonplusedata(value)
{
    $(".secondcheckbox"+value).append('<div class="custom-radio" id="textbox'+dropdowncnt+'"> <label class="custom-control-label" for="g_radio'+dropdowncnt+'"><input type="text" name="dropdownoptionname['+gobalcnt+'][]" value="option" class="form-control" required /> </label> <span class="remove m-5" style="cursor: pointer;"><i class="fas fa-times"></i></span> </div>');

    dropdowncnt++;
}

// new checkbox
function checkboxplusedataEdit(value,newgobal)
{
    $(".secondcheckbox"+value).append('<div class="custom-checkbox" id="textbox'+value+'"> <input type="checkbox" class="custom-control-input" name="checkbox['+value+'][]" id="'+value+'"><label class="custom-control-label" for="'+value+'"><input type="text" name="checkboxoptionname['+newgobal+'][]" value="option" class="form-control" /> </label> <span class="remove m-5" style="cursor: pointer;"><i class="fas fa-times"></i></span> </div>');

}

function radioplusedataEdit(value,newgobal)
{
    $(".secondcheckbox"+value).append('<div class="custom-radio" id="textbox'+value+'"> <input type="checkbox" class="custom-control-input" name="radio[]" id="g_radio'+value+'" value="'+value+'"><label class="custom-control-label" for="g_radio'+value+'"><input type="text" name="radiobtnoptionname['+newgobal+'][]" value="option" class="form-control" /> </label> <span class="remove m-5" style="cursor: pointer;"><i class="fas fa-times"></i></span> </div>');

}

function dropwonplusedataEdit(value,newgobal)
{
    $(".secondcheckbox"+value).append('<div class="custom-radio" id="textbox'+value+'"> <label class="custom-control-label" for="g_radio'+value+'"><input type="text" name="dropdownoptionname['+newgobal+'][]" value="option" class="form-control" /> </label> <span class="remove m-5" style="cursor: pointer;"><i class="fas fa-times"></i></span> </div>');

}
function training_Approved(status,id){

        $.ajax({
        url: 'submitStatusApprove',
        type:'post',
        data:{
            status:status,
            id:id,
            remaks:''
        },
        success: function (data) {
            show_toastr('success', 'Training status successfully updated', 'success');
            $("#commonModal").modal('hide');
            setTimeout(location.reload.bind(location), 1000);

        },
        error: function (data) {
            data = data.responseJSON;
            show_toastr('Error', data.error, 'error');
        }
    });

}

// training reject time remarks add
function traininng_reject(status,id)
{
    $("#mainsubmit").css('display','none');
    $(".remarksSubmit").css('display','none');
    $("#remarks").css('display','block');
    $(".remarksSubmit").css('display','block');
}

function rejectRemarksSubmit(status,id)
{
    var remaks=$("#remarksAll").val();
        if(remaks)
        {
            $.ajax({
                url: 'submitStatusApprove',
                type:'post',
                data:{
                    status:status,
                    id:id,
                    remaks:remaks
                },
                success: function (data) {
                    show_toastr('success', 'Training status successfully updated', 'success');
                    $("#commonModal").modal('hide');
                    setTimeout(location.reload.bind(location), 1000);

                },
                error: function (data) {
                    data = data.responseJSON;
                    show_toastr('Error', data.error, 'error');
                }
            });
            return true;
        }
        else{
            show_toastr('error', 'Remarks required', 'error');
            return false;
        }

}


function Filterjointariner()
{
    var name=$("#name").val();
    var start=$("#from").val();
    var end=$("#to").val();

    $.ajax({
        url: 'filter-join-trainerList',
        type:'post',
        data:{
            name:name,
            start:start,
            end:end,
        },
        success: function (data) {


        },
        error: function (data) {
            data = data.responseJSON;
            show_toastr('Error', data.error, 'error');
        }
    });

}
function loadEditore() {
    setTimeout(function () {
        $('.summernote-simple').summernote();
    }, 200);
}
