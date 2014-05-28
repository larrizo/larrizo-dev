/**
 * Created by tata on 25/05/14.
 */

function validateCreditCard(_this) {
    _this = $(_this);

    _this.parent().find('+ div span').remove();
    _this.parent().find('+ div i').removeAttr('class').addClass('notif-block sprites');

    if (_this.val().trim() != '') {
        $.post('/user/creditcard-validation', {cc_number: _this.val(), print: true}, function(response) {
            if (response.error != undefined)
                _this.parent().find('+ div .notif-block').addClass('wrong');
            else if (response.matched != undefined)
                _this.parent().find('+ div .notif-block').addClass('check');
        }, 'json');
    }
}