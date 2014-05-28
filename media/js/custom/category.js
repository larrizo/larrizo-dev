/**
 * Created by tata on 30/03/14.
 */
$(document).ready(function(){
    $('.filter-title i').click(function(){
        $(this).parents('.filter-block').find('ul').toggle();
        if ($(this).hasClass('plus'))
            $(this).removeClass('plus').addClass('minus');
        else
            $(this).removeClass('minus').addClass('plus');
    });
});