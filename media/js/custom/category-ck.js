/**
 * Created by tata on 30/03/14.
 */$(document).ready(function(){$(".filter-title i").click(function(){$(this).parents(".filter-block").find("ul").toggle();$(this).hasClass("plus")?$(this).removeClass("plus").addClass("minus"):$(this).removeClass("minus").addClass("plus")});$(".product").click(function(){$("#product-detail").removeClass("hide").css()})});