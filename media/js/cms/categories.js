/**
 * Created by Tata on 3/23/14.
 */

$(document).ready(function () {
    $('#category-table').on('click', '.category-collapse', function (e) {
        e.preventDefault();

        var _this = $(this),
            _attrID = _this.parents('tr').attr('id');

        if ($('#sub'+_attrID).length == 0)
            $.post($(this).attr('href'), {}, function (resp) {
                $('#'+_attrID).after(resp);
            });
        else
            $('#sub'+_attrID).remove();
    });
});

function publish(id, value) {
    $.post('/cms/categories/updateFlag', {id: id, value: value, flag: 'published'});
}

function order(_this, id) {
    _this = $(_this);

    $.post('/cms/categories/updateFlag', {id: id, value: _this.val(), flag: 'order'});
}