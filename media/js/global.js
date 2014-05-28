/**
 * Created by Tata on 3/22/14.
 */

$(document).ready(function(){
    $('.form').submit(function(e){
        e.preventDefault();
        e.stopPropagation();

        var _this = $(this);

        _this.find('.response').html('');

        if (checkRequiredFields(_this)) {
            $.post(_this.attr('action'), _this.serialize(), function(resp){
                if (resp.notif != undefined) {
                    _this.find('.response').html(resp.notif).hide().fadeIn();
                } else if (resp.reload != undefined) {
                    window.location.reload();
                } else if (resp.url != undefined) {
                    window.location = resp.url;
                } else if (resp.alert != undefined) {
                    alert(resp.alert);
                }
            }, 'json');
        }
    });

    $('#main-menu section li a').mouseenter(function(){
        $('#main-menu section li a.hover').removeClass('hover');
        $('.subcategory').hide();
        $(this).addClass('hover');

        if ($('#submenu-'+$(this).attr('id').substr(9)).length > 0)
            $('#submenu-'+$(this).attr('id').substr(9)).show();
    });

    $('#main-menu').mouseleave(function(){
        $('#main-menu section li a.hover').removeClass('hover');
        $('.subcategory').hide();
    });

    $('#footer .social-media a').hover(function(){
        $(this).find('i').addClass('hover');
    }, function(){
        $(this).find('i').removeClass('hover');
    });

    $('.popup .close').click(function(e){
        e.stopImmediatePropagation();
        $(this).parents('.popup').addClass('hide');
    });

    $('.popover-trigger').click(function(e){
        e.preventDefault();

        if ($(this).attr('href') != '')
            $($(this).attr('href')).toggle();
    });
});

function checkRequiredFields(form) {
    form.find('input[type="text"].required, input[type="email"].required,' +
            'input[type="password"].required, textarea.required').each(function(){
        $(this).removeClass('error');

        if ($(this).val().trim() == '')
            $(this).addClass('error');
    });

    form.find('input[type="checkbox"].required, input[type="radio"].required').each(function(){
            $(this).removeClass('error');

            if (!$(this).is(':checked'))
                $(this).addClass('error');
        });

    if (form.find('.required.error').length > 0)
        return false;

    return true;
}

function previewImage(_this, minSize) {
    var formdata = false;

    if (window.FormData)
        formdata = new FormData();

    var i = 0, len = _this.files.length, file;
    for (; i < len; i++) {
        file = _this.files[i];

        if (!!file.type.match(/image.*/)) {
            if (formdata) {
                formdata.append("userfile", file);
                if (minSize.length > 0)
                    formdata.append("size", minSize);
            }
        } else {
            alert('Please upload image in the right format.');
        }

        if (formdata) {
            $.ajax({
                url: "/main/upload",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (res) {
                    if (res.error != undefined) {
//                        loading('hide');
                        alert(res.error);
                    } else {
                        $(_this).parent().find('.uploaded-id').val(res.id);
                        var _img = $(_this).parent().parent().parent().find('img');
                        _img.attr('src', res.filepath);
                    }
                }
            });
        }
    }
}
