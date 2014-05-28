/**
 * Created by Tata on 3/25/14.
 */
$(document).ready(function () {
    initCarousel();

    var _carouselInterval = carouselInterval();

    $('.pagination a').click(function (e) {
        e.preventDefault();
        var _this = $(this);
        $('.pagination a.active').removeClass('active');
        _this.addClass('active');

        $('#carousel ul').stop().animate({ 'margin-left': -($('#carousel').width() * _this.parent().index()) + 'px'}, 500);
    });

    $('#carousel').mouseenter(function () {
        clearInterval(_carouselInterval);
    }).mouseleave(function () {
        _carouselInterval = carouselInterval();
    });
});

function initCarousel() {
    var _carousel = $('#carousel'),
        _carouselItemLength = _carousel.find('.carousel-item').length,
        _pagination = $('<ul id="carousel-pagination" class="bullet-pagination"></ul>');

    _carousel.find('.carousel-item').width(_carousel.width());
    _carousel.find('ul').width(_carousel.width() * _carouselItemLength);

    for (var i = 1; i <= _carouselItemLength; i++)
        _pagination.append('<li class="pagination"><a href="#" class="sprites bullet' + (i == 1 ? ' active' : '') + '">' + i + '</a></li>');

    _pagination.insertAfter(_carousel);
}

function carouselInterval() {
    return setInterval(function () {
        var _next = $('.pagination a.active').parent().next();

        if (_next.length > 0)
            _next.find('a').click();
        else
            $('.pagination').eq(0).find('a').click();
    }, 5000);
}