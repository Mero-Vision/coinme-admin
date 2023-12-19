/*******************************************
    File Name: custom.js
/*******************************************/

"use strict";

/**== wow animation ==**/
new WOW().init();


/**== loader js ==**/
$("body").prepend('<div id="preloader"><div class="spinner-sm spinner-sm-1" id="status"> </div></div>');
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({
    'overflow': 'visible'
  });
})


/**== mega menu ==**/
$(document).ready(function() {
  "use strict";
  $('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
  $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
  $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">&nbsp;</a>");
  $(".menu > ul > li").hover(function(e) {
    if ($(window).width() > 991) {
      $(this).children("ul").stop(true, false).fadeToggle(150);
      e.preventDefault();
    }
  });
  $(".menu > ul > li").on('click', function() {
    if ($(window).width() <= 991) {
      $(this).children("ul").fadeToggle(150);
    }
  });
  $(".menu-mobile").on('click', function(e) {
    $(".menu > ul").toggleClass('show-on-mobile');
    e.preventDefault();
  });
});
$(window).resize(function() {
  $(".menu > ul > li").children("ul").hide();
  $(".menu > ul").removeClass('show-on-mobile');
});


/**== video icon changes js ==**/
$('.video').parent().click(function() {
  if ($(this).children(".video").get(0).paused) {
    $(this).children(".video").get(0).play();
    $(this).children(".playpause").fadeOut();
  } else {
    $(this).children(".video").get(0).pause();
    $(this).children(".playpause").fadeIn();
  }
});


/**== CarouselTicker ==**/
var scroller = $('#logo-ticker div.footer-logo-slider');
var scrollerContent = scroller.children('ul');
scrollerContent.children().clone().appendTo(scrollerContent);
var sum_width_of_elem = 0;
scrollerContent.children().each(function() {
  var $this = $(this);
  $this.css('left', sum_width_of_elem);
  sum_width_of_elem += $this.outerWidth(true);
});

var fullW = sum_width_of_elem / 2;
var viewportW = scroller.width();

// Scrolling speed management
var controller = {
  curSpeed: 0,
  fullSpeed: 2
};
var $controller = $(controller);
var contSpeed = function(newSpeed) {
  var duration = 600;
  $controller.stop(false).animate({
    curSpeed: newSpeed
  });
};

// Pause on hover
scroller.hover(function() {
  contSpeed(0);
}, function() {
  contSpeed(controller.fullSpeed);
});

// Scrolling management; start the automatic scrolling//
var doScroll = function() {
  var curX = scroller.scrollLeft();
  var newX = curX + controller.curSpeed;
  if (newX > fullW * 2 - viewportW)
    newX -= fullW;
  scroller.scrollLeft(newX);
};
setInterval(doScroll, 20);
contSpeed(controller.fullSpeed);








/**== testimonial slider js ==**/
$(document).ready(function() {
  $(".testimonial .indicators li").click(function() {
    var i = $(this).index();
    var targetElement = $(".testimonial .tabs li");
    targetElement.eq(i).addClass('active');
    targetElement.not(targetElement[i]).removeClass('active');
  });
  $(".testimonial .tabs li").click(function() {
    var targetElement = $(".testimonial .tabs li");
    targetElement.addClass('active');
    targetElement.not($(this)).removeClass('active');
  });
});
$(document).ready(function() {
  $(".slider .swiper-pagination span").each(function(i) {
    $(this).text(i + 1).prepend("0");
  });
});


