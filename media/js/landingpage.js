/**
 * Created with JetBrains PhpStorm.
 * User: Tata
 * Date: 2/25/14
 * Time: 10:21 PM
 * To change this template use File | Settings | File Templates.
 */

// PNG Fallback for SVG
$(document).ready(function() {
    if(!Modernizr.svg) {
        $('img[src*="svg"]').attr('src', function() {
            return $(this).attr('src').replace('.svg', '.png');
        });
    }
});

// Ticker
/*$(document).ready(function() {
 var $container = $(".example--ticker"),
 $ceHours = $container.find('.ce-hours'),
 $ceMinutes = $container.find('.ce-minutes'),
 $ceSeconds = $container.find('.ce-seconds');

 $container.find(".countdown").countEverest({
 day: 1,
 month: 1,
 year: 2015
 });

 function countEverestAnimate($el) {

 }
 });*/

// Paper
/*$(document).ready(function() {
 var $container = $(".example--paper"),
 $ceHours = $container.find('.ce-hours'),
 $ceMinutes = $container.find('.ce-minutes'),
 $ceSeconds = $container.find('.ce-seconds');

 $container.find(".countdown").countEverest({
 day: 1,
 month: 1,
 year: 2015
 });
 });*/

$(document).ready(function() {
    $(".countdown").countEverest({
        //Set your target date here!
        day: 1,
        month: 1,
        year: 2015,
        leftHandZeros: false,
        onChange: function() {
            drawCircle(document.getElementById('days'), this.days, 365);
            drawCircle(document.getElementById('hours'), this.hours, 24);
            drawCircle(document.getElementById('minutes'), this.minutes, 60);
            drawCircle(document.getElementById('seconds'), this.seconds, 60);
        }
    });

    function deg(v) {
        return (Math.PI/180) * v - (Math.PI/2);
    }

    function drawCircle(canvas, value, max) {
        var	circle = canvas.getContext('2d');

        circle.clearRect(0, 0, canvas.width, canvas.height);
        circle.lineWidth = 4;

        circle.beginPath();
        circle.arc(
            canvas.width / 2,
            canvas.height / 2,
            canvas.width / 2 - circle.lineWidth,
            deg(0),
            deg(360 / max * (max - value)),
            false);
        circle.strokeStyle = '#282828';
        circle.stroke();

        circle.beginPath();
        circle.arc(
            canvas.width / 2,
            canvas.height / 2,
            canvas.width / 2 - circle.lineWidth,
            deg(0),
            deg(360 / max * (max - value)),
            true);
        circle.strokeStyle = '#ffa500';
        circle.stroke();
    }
});