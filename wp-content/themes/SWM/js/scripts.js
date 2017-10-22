jQuery(document).ready(function ($) {
    var windowWidth = $( document ).width();
	$('html').removeClass('no-js');


    if ( windowWidth <  576) {
        $('.faculty-single .content-separation').addClass('accordion__title active');
        $('#program-structure').addClass('accordion__title active');
    }
    $('.accordion__title').click(function(e) {
        var target = $(this);
        target.next().slideToggle(350);
        target.toggleClass('active');
    });

    $('.menu-wrap .menu-toggle').click(function () {
    	$('#header').toggleClass('menu-active');
    	$('body').toggleClass('menu-active');
    });
    $('#header .navigation-top').click(function () {
    	$('#header').removeClass('menu-active');
    	$('body').removeClass('menu-active');
    });
    $('#site-navigation').click(function (e) {
    	e.stopImmediatePropagation();
    });
    //alert(window.innerWidth);

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("Trident/");

    if (msie > 0) {
        var css = 'body .track-item {display: block;}',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        if (style.styleSheet){
          style.styleSheet.cssText = css;
        } else {
          style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);
    }
});