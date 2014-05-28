/**
 * Created by Tata on 3/25/14.
 */
$(document).ready(function () {
    //Must contain 8 characters or more
    var WeakPass = /(?=.{8,}).*/;
    //Must contain lower case letters and at least one digit.
    var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
    //Must contain at least one upper case letter, one lower case letter and one digit.
    var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
    //Must contain at least one upper case letter, one lower case letter, one symbol and one digit.
    var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;

    $('#password').on('keyup', function (e) {
        if (VryStrongPass.test($('#password').val())) {
            $('#password-info').html("Very Strong!");
            $('#password-meter').removeClass().addClass('very-strong-pass');
        } else if (StrongPass.test($('#password').val())) {
            $('#password-info').html("Strong!");
            $('#password-meter').removeClass().addClass('strong-pass');
        } else if (MediumPass.test($('#password').val())) {
            $('#password-info').html("Good!");
            $('#password-meter').removeClass().addClass('good-pass');
        } else if (WeakPass.test($('#password').val())) {
            $('#password-info').html("Still weak!");
            $('#password-meter').removeClass().addClass('weak-pass');
        } else if ($('#password').val() != '') {
            $('#password-info').html("Too weak!");
            $('#password-meter').removeClass().addClass('too-weak-pass');
        } else {
            $('#password-info').html('');
            $('#password-meter').removeClass();
        }

    });

    $('#confirm-password, #password').on('keyup', function (e) {
        if ($('#password').val() != '' && $('#confirm-password').val() != '' && $('#password').val() !== $('#confirm-password').val())
            $('#confirm-password').closest('.row').find('.notif-block').removeClass('check').addClass('wrong');
        else if ($('#password').val() != '' && $('#confirm-password').val() != '' && $('#password').val() == $('#confirm-password').val())
            $('#confirm-password').closest('.row').find('.notif-block').removeClass('wrong').addClass('check');
        else
            $('#confirm-password').closest('.row').find('.notif-block').removeClass('wrong check');
    });
});

$(document).ready(function () {
    $('#username').on('blur', function (e) {
        var _this = $(this),
            value = _this.val().trim();

        _this.parent().find('+ div span').remove();
        _this.parent().find('+ div .notif-block').removeClass('wrong check');

        if (value != '') {
            $.post('/register/usernameValidation', {username: value}, function (response) {
                if (response.error != undefined)
                    _this.parent().find('+ div .notif-block').addClass('wrong').parent().append(response.error);
                else if (response.success != undefined)
                    _this.parent().find('+ div .notif-block').addClass('check');
            }, 'json');
        }
    });

    $('#email').on('blur', function (e) {
        var _this = $(this),
            value = _this.val().trim();

        _this.parent().find('+ div span').remove();
        _this.parent().find('+ div .notif-block').removeClass('wrong check');

        if (value != '') {
            $.post('/register/emailValidation', {email: value}, function (response) {
                if (response.error != undefined)
                    _this.parent().find('+ div .notif-block').addClass('wrong').parent().append(response.error);
                else if (response.success != undefined)
                    _this.parent().find('+ div .notif-block').addClass('check');
            }, 'json');
        }
    });
});