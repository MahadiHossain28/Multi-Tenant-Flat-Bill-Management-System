(function ($) {
    $.fn.cus_toast_auto = function (options) {
        let settings = $.extend(
            {
                cus_toast_time: 5000,
                cus_toast_top: "25px",
                cus_toast_bg: "#f2f2f2",
                cus_toast_border: "#008080",
                cus_toast_check_bg: "#198754",
                cus_toast_check_icon: "#ffffff",
                cus_toast_error_bg: "#dc3545",
                cus_toast_error_icon: "#ffffff",
                cus_toast_text: "#666666",
            },
            options
        );

        let progress_time = 300;
        let end_time = settings.cus_toast_time + progress_time;
        let progress_css_time = settings.cus_toast_time / 1000;
        $(".cus_toast").toggleClass("active");
        $(".progress").toggleClass("active");

        $(":root").css({
            "--cus_toast_time": progress_css_time + "s",
            "--cus_toast_top": settings.cus_toast_top,
            "--cus_toast_bg": settings.cus_toast_bg,
            "--cus_toast_border": settings.cus_toast_border,
            "--cus_toast_check_bg": settings.cus_toast_check_bg,
            "--cus_toast_check_icon": settings.cus_toast_check_icon,
            "--cus_toast_error_bg": settings.cus_toast_error_bg,
            "--cus_toast_error_icon": settings.cus_toast_error_icon,
            "--cus_toast_text": settings.cus_toast_text,
        });
        let action_class = $(".cus_toast");
        let timer1, timer2;
        timer1 = setTimeout(() => {
            $(".cus_toast").removeClass("active");
        }, settings.cus_toast_time); //1s = 1000 milliseconds

        timer2 = setTimeout(() => {
            $(".progress").removeClass("active");
            $(".progress").remove();
            $(".cus_toast").remove();
        }, end_time);

        $(".cus_toast").mouseover(function () {
            clearTimeout(timer1);
            clearTimeout(timer2);
            $(".progress").removeClass("active");

        });

        $(".cus_toast").mouseout(function () {
            $(".progress").addClass("active");
            timer1 = setTimeout(() => {
                $(".cus_toast").removeClass("active");
            }, settings.cus_toast_time); //1s = 1000 milliseconds

            timer2 = setTimeout(() => {
                $(".progress").removeClass("active");
                $(".progress").remove();
                $(".cus_toast").remove();
            }, end_time);
        });

        $(".sami_close").on("click", function () {
            action_class.removeClass("active");
            setTimeout(() => {
                $(".progress").removeClass("active");
                $(".progress").remove();
                $(".cus_toast").remove();
            }, progress_time);

            clearTimeout(timer1);
            clearTimeout(timer2);
        });
    };
})(jQuery);

(function ($) {
    $.fn.sami_Toast_Append = function (options) {
        let settings = $.extend(
            {
                cus_toast_status: 'success',
                cus_toast_time: 5000,
                cus_toast_msg: "Hello",
            },
            options
        );
        if (settings.cus_toast_status == 'success') {
            $("body").prepend(
                '\
                    <div class="cus_toast1">\
                        <div class="cus_toast-content">\
                            <i class="fas fa-solid fa-check check"></i>\
                            <div class="message">\
                                <span class="cus_success">Success</span>\
                                <span class="text text-2">' + settings.cus_toast_msg + '</span>\
                            </div>\
                        </div>\
                        <i class="fa-solid fa-xmark sami_close1"></i>\
                        <div class="progress"></div>\
                    </div>\
                '
            );
        } else {
            $("body").prepend(
                '\
                    <div class="cus_toast1">\
                        <div class="cus_toast-content">\
                            <i class="fas fa-solid fa-xmark error"></i>\
                            <div class="message">\
                                <span class="cus_error">Error</span>\
                                <span class="text text-2">' + settings.cus_toast_msg + '</span>\
                            </div>\
                        </div>\
                        <i class="fa-solid fa-xmark sami_close1"></i>\
                        <div class="progress"></div>\
                    </div>\
                '
            );
        }
        $(".cus_toast1").toggleClass("active");
        $(".progress").toggleClass("active");

        let progress_time = 300;
        let end_time = settings.cus_toast_time + progress_time;
        let progress_css_time = settings.cus_toast_time / 1000;

        $(":root").css({
            "--cus_toast_time": progress_css_time + "s",
        });
        let t_timer1, t_timer2;
        t_timer1 = setTimeout(() => {
            $(".cus_toast1").removeClass("active");
            $(".cus_toast1").remove();
        }, settings.cus_toast_time); //1s = 1000 milliseconds

        t_timer2 = setTimeout(() => {
            $(".progress").removeClass("active");
            $(".progress").remove();
            $(".cus_toast1").remove();
        }, end_time);

        $(".cus_toast1").mouseover(function () {
            clearTimeout(t_timer1);
            clearTimeout(t_timer2);
            $(".progress").removeClass("active");
        });

        $(".cus_toast1").mouseout(function () {
            $(".progress").addClass("active");
            t_timer1 = setTimeout(() => {
                $(".cus_toast1").removeClass("active");
                $(".cus_toast1").remove();
            }, settings.cus_toast_time); //1s = 1000 milliseconds

            t_timer2 = setTimeout(() => {
                $(".progress").removeClass("active");
                $(".progress").remove();
                $(".cus_toast1").remove();
            }, end_time);
        });

        $(".sami_close1").on("click", function () {
            $(".cus_toast1").removeClass("active");
            $(".cus_toast1").remove();
            setTimeout(() => {
                $(".progress").removeClass("active");
                $(".progress").remove();
                $(".cus_toast1").remove();
            }, progress_time);

            clearTimeout(t_timer1);
            clearTimeout(t_timer2);
        });
    };
})(jQuery);

(function ($) {
    $.fn.image_preview = function () {
        this.on("click", function (options) {
            $("body,html").append(
                '\
                <div id="FullImageView">\
                    <img id="FullImage" />\
                    <span id="CloseBtn">&times;</span>\
                </div>\
            '
            );
            let img_src = $(this).attr("src");
            $("#FullImage").attr("src", img_src);
            $("#FullImageView").css("display", "flex");

            $("#CloseBtn").on("click", function () {
                $("#FullImageView").css("display", "none");
            });
        });
    };
})(jQuery);

(function ($) {
    $.fn.modal_image_preview = function () {
        $("body,html").append(
            '\
            <div id="FullImageView">\
                <img id="FullImage" />\
                <span id="CloseBtn">&times;</span>\
            </div>\
        '
        );
        let img_src = $(this).attr("src");
        $("#FullImage").attr("src", img_src);
        $("#FullImageView").css("display", "flex");

        $("#CloseBtn").on("click", function () {
            $("#FullImageView").css("display", "none");
        });
    };
})(jQuery);

(function ($) {
    $.fn.GetData = function (options) {
        let settings = $.extend({
            url: '',
            modalId: null,
            callback: null
        }, options);

        // let url = settings.url;
        let url = $(this).val();

        if (settings.modalId) {
            $('#' + settings.modalId).modal('show');
        }

        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                settings.callback(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ', error);
            }
        });
    };
})(jQuery);


(function ($) {
    $.fn.handleEdit = function (options) {
        let settings = $.extend({
            modalId: null,
            valuesId: {},
            ReturnFromApi: '',
            imagePrev: false,
            cloudImagePrev: false,
            dbImgColName: '',
            imagePath: '',
            imagePrevClass: 'w-100'
        }, options);
        let url = $(this).val();
        $('#' + settings.modalId).modal('show');
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                if (settings.imagePrev == true) {
                    $('.prev_image_view').addClass("text-center");
                    $('.prev_image_view').html("");
                    $('.prev_image_view').append('\
                        <img src="' + settings.imagePath + response[settings.ReturnFromApi][settings.dbImgColName] + '" alt="prev_image" class="prev_image ' + settings.imagePrevClass + '">\
                    ');
                }
                if (settings.cloudImagePrev == true) {
                    $('.prev_image_view').addClass("text-center");
                    $('.prev_image_view').html("");
                    $('.prev_image_view').append('\
                        <img src="' + response[settings.ReturnFromApi][settings.dbImgColName] + '" alt="prev_image" class="prev_image ' + settings.imagePrevClass + '">\
                    ');
                }

                function getNestedValue(obj, path) {
                    return path.split('.').reduce((o, p) => (o && o[p] !== undefined ? o[p] : undefined), obj);
                }

                for (let key in settings.valuesId) {
                    if (settings.valuesId.hasOwnProperty(key)) {
                        const fieldId = settings.valuesId[key];
                        const value = getNestedValue(response[settings.ReturnFromApi], key);
                        if (value !== undefined) {
                            $('#' + fieldId).val(value);
                        }
                    }
                }
            },
            error: function (xhr, status, error) {
                $(document).sami_Toast_Append({
                    cus_toast_status: 'error',
                    cus_toast_time: 3000,
                    cus_toast_msg: `${xhr.status} : ${error}`
                });
            }
        });
    };
})(jQuery);

(function ($) {
    $.fn.handleSubmit = function (formData, options, callback) {
        let settings = $.extend({
            modalId: null,
            listName: null,
            classWithId: null,
            dataTable: false,
            methodType: 'POST',
        }, options);
        let url = $(this).attr('action');
        $.ajax({
            url: url,
            type: settings.methodType,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                if (response.msg) {
                    $('#' + settings.modalId).modal('hide');
                    $(document).sami_Toast_Append({
                        cus_toast_status: 'success',
                        cus_toast_time: 3000,
                        cus_toast_msg: response.msg
                    });
                    $('#' + settings.modalId).load(location.href + " #" + settings.modalId + ">*", "");
                    if (settings.dataTable){
                        $('.' + settings.listName).DataTable().ajax.reload(null, false);
                    }else{
                        $('.' + settings.listName).load(location.href + " ." + settings.listName + ">*", "");
                    }
                } else {
                    callback(response);
                }
            },
            error: function (xhr, error) {
                $('.error_message').html('');
                $('.form-control').removeClass('is-invalid');
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    for (const key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            $(`#${key}`).addClass('is-invalid');
                            $(`.${key}_error`).html(errors[key][0]);
                        }
                    }
                } else {
                    $(document).sami_Toast_Append({
                        cus_toast_status: 'error',
                        cus_toast_time: 3000,
                        cus_toast_msg: `${xhr.status} : ${error}`
                    });
                }
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false);
                $('.submitBtnLoading').hide();
                $('.submitBtnDetails').show();
            }
        });
    };
})(jQuery);


(function ($) {
    $.fn.handleDelete = function (options) {
        let settings = $.extend({
            // url: '',
            modalId: null,
            msg: null,
            actionBtn: true,
            buttonLabel: 'Yes, Delete',
            buttonColorClass: 'btn-danger',
            imagePrevClass: 'w-100'
        }, options);

        let url = $(this).val();
        let showValue = $(this).attr('data-value-name') || '';
        let showImage = $(this).attr('data-value-image') || '';

        let showMsg;
        console.log(showValue);

        if (settings.msg === null) {
            showMsg = 'Are You Sure To Delete  <span class= "text-dark fw-bold"> ' + showValue + ' </span>  ?';
        } else {
            showMsg = settings.msg + ' <span class= "text-dark fw-bold">' + showValue + ' </span> ?';
        }

        if(settings.actionBtn === false){
            actionBtn = '';
        }else {
            actionBtn = '\
            <div class="mb-4">\
                <button type="button" class="btn btn-secondary delete_alert" data-bs-dismiss="modal">No, Close</button>\
                <a href="' + url + '" class="btn '+ settings.buttonColorClass +'">'+ settings.buttonLabel +'</a>\
            </div>';
        }

        $('#' + settings.modalId).modal('show');

        if (showImage !== '') {
            $('.prev_image_view').addClass("text-center");
            $('.prev_image_view').html("");
            $('.prev_image_view').append('\
                        <img src="' + showImage + '" alt="prev_image" class="prev_image ' + settings.imagePrevClass + '">\
                    ');
        }

        $('.delete_alert_div').html("");
        $('.delete_alert_div').append('\
            <h5 class="text-danger mb-4 text-capitalize">' + showMsg + '</h5>\
            ' + actionBtn + '\
        ');
    };
})(jQuery);

(function ($) {
    $.fn.handleDependentSelect = function (options) {
        let settings = $.extend({
            className: null,
            attributeName: null
        }, options);

        let id = $(this).val();
        let classAttrName = '.' + settings.className + '[' + settings.attributeName + ']';
        let classAttrName2 = '.' + settings.className + '[' + settings.attributeName + '="' + id + '"]';

        $(classAttrName).each(function () {
            $(this).prop('selected', false);
            $(this).attr('selected', false);
            $(this).attr('hidden', true);
        });

        $(classAttrName2).removeAttr('hidden');
    };
})(jQuery);
