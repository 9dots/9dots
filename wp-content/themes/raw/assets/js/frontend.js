"use strict";

jQuery.browser = {msie: false};

if (!console) {
    var console = {};
    console.log = function (object) {
        return object;
    };
}

(function ($) {
    "use strict";

    //var wave_disable_header_easing = false;
    //var wave_disable_scroll_easing = true;

    if (!$.support.transition) {
        $.fn.transition = $.fn.animate;
    }

    var isMobile = (Modernizr.touch);

    if (window.devicePixelRatio !== undefined) {
        wave_update_dpr_image_src((window.devicePixelRatio > 1) ? 2 : 1);
    }
    else {
        wave_update_dpr_image_src(1);
    }

    function wave_update_dpr_image_src(dpr) {
        $('img[data-src-x' + dpr + ']').each(function () {
            $(this).attr('src', $(this).attr('data-src-x' + dpr));
        });
    }

    // Fix for iOS7
    var windowWidth = $(window).width();

    setInterval(function () {
        if (windowWidth != $(window).width()) {
            $(window).trigger('resize');
        }
    }, 1000);

    $('.full-width-section').each(function () {

        if ($(this).next().hasClass("clearboth") && $(this).next().next().length === 0) {
            $(this).addClass("last");
        }

    });

    function zoomDisable() {
        $('head meta[name=viewport]').remove();
        $('head').prepend('<meta name="viewport" content="user-scalable=0" />');
    }

    function zoomEnable() {
        $('head meta[name=viewport]').remove();
        $('head').prepend('<meta name="viewport" content="user-scalable=1" />');
    }

    $("input[type=text], textarea").mouseover(zoomDisable).mousedown(zoomEnable);

    function wave_fix_full_width_section() {
        var windowWidth = $(window).width();
        var columnWidth = $('section.page-section > div.column').width();
        var margin = (windowWidth - columnWidth) / 2;

        $('.full-width-section').css({
            marginLeft: -margin,
            width: windowWidth
        });
    }

    wave_fix_full_width_section();

    $(window).resize(wave_fix_full_width_section);

    $(window).resize();

    $('li.menu-item-cart').hoverIntent({
        over: function () {
            $('#panel-cart').css({
                top: $("#header").outerHeight(),
                left: $(this).offset().left
            });
            $('#panel-cart').show();
        },
        out: function () {

            $('#panel-cart').hide();

        },
        timeout: 1000

    });


    $('#nav li.nav-button-cart a').append('<div  />');


    $("#nav a").click(function () {
        if ($(this).attr("href") == "#") {
            return false;
        }
    });

    $('.popup .close-button').click(function () {
        $(this).parents('.popup').trigger('hide');
        return false;
    });

    $('.popup').bind('position', function () {

        var dialog = $(this).find('.popup-content-wrapper');

        if ($(window).width() >= 1100) {
            dialog.css({
                marginTop: (($(window).height() - dialog.height()) / 2),
                marginLeft: (($(window).width() - dialog.width()) / 2),
                width: dialog.attr("data-popup-width")
            });
        }
        else {
            dialog.css({
                marginTop: 0,
                marginLeft: 0,
                width: "100%"
            });
        }

    });

    $('.popup').bind('show', function () {


        $('body').addClass('show_popup');

        var popup = $(this);
        var dialog = popup.find('.popup-content-wrapper');

        if ($(window).width() >= 1100) {
            dialog.width(dialog.attr("data-popup-width"));
        }
        else {
            $(window).scrollTop(0);
        }

        dialog.transition({y: 20, opacity: 0}, 0);
        popup.css({opacity: 0});

        popup.transition({opacity: 1}, 1000);
        dialog.delay(300).transition({y: 0, opacity: 1}, 1000);

    });

    $('.popup').bind('hide', function () {
        $(this).transition({opacity: 0}, 500, function () {
            $(this).hide();
            $('body').removeClass('show_popup');
            $(window).trigger('resize');
        });
    });

    $(window).resize(function () {
        $('.popup').trigger('position');
    });

    $(".call-to-action").click(function () {

        var href = $(this).attr('href');
        var popup = $(href + '.popup');

        if (popup.length > 0) {
            popup.show();
            popup.trigger('show');
            popup.trigger('position');
        }

        return false;

    });

    $(document).bind('gform_page_loaded gform_confirmation_loaded', function () {
        $('.popup').trigger('position');
    });

    var scrolling = 2;

    $('#back-to-top').click(function () {
        scrolling = true;
        if(wave_disable_scroll_easing){
            $(window).scrollTop(0);
        }
        else{
            $("html, body").animate({scrollTop: 0}, 1000, 'easeOutQuart', function () {
                scrolling = false;
            });
        }
        return false;
    });

    $(window).load(function () {

        $(".page-template-page-onepager-php").each(function () {

            $('#header a#logo-anchor').click(function () {
                window.location.href = $("#header #mainmenu ul li a").first().attr("href");
                return false;
            });

            var lastHash = location.hash.length > 0 ? location.hash : null;
            var menuHash = '';

            setInterval(function () {
                if (menuHash != lastHash) {
                    menuHash = lastHash;
                    $('#nav a[href!=' + menuHash + ']').removeClass("active");
                    $('#nav a[href$=' + menuHash + ']').addClass("active");
                }
            }, 200);

            $("section.page-section").waypoint(function (direction) {

                if (direction != "down" || scrolling) {
                    return;
                }

                window.location.hash = lastHash = "#" + $(this).attr("id").substr(2);

            }, {offset: "50%"});

            $("section.page-section").waypoint(function (direction) {
                if (direction != "up" || scrolling) {
                    return;
                }

                window.location.hash = lastHash = "#" + $(this).attr("id").substr(2);

            }, {offset: function () {
                return -($(this).height() - 100);
            }});

            setInterval(function () {

                if (window.location.hash == "") {
                    window.location.hash = $("#main-content").children("section.page-section:first-child").attr("id").substr(2);
                }

                if (scrolling === 2) {
                    scrolling = false;
                }

                if (lastHash !== window.location.hash) {
                    lastHash = String(window.location.hash);
                    $('#nav a[href!=' + lastHash + ']').removeClass("active");
                    $('#nav a[href=' + lastHash + ']').addClass("active");
                    var section = $("#s-" + lastHash.substr(1));
                    if (section.length > 0) {
                        scrolling = true;
                        var scrollOffset = Math.round(section.index() < 1 ? 0 : section.offset().top - ($('#header').height() - 2));

                        if(wave_disable_scroll_easing){
                            $(window).scrollTop(scrollOffset);
                        }
                        else{
                            $("html, body").animate({scrollTop: scrollOffset}, 1000, 'easeOutQuart', function () {
                                scrolling = false;

                            });
                        }
                    }
                }
            }, 50);

        });
    });


    $('#header a.button-mobilemenu').click(function () {
        if ($('#mobilemenu').css('display') == "block") {
            $('#mobilemenu').css('display', "none");
            $('body').removeClass('show_mobilemenu');
            $(window).trigger('resize');
        }
        else {
            $('#mobilemenu').css('display', "block");
            $('body').addClass('show_mobilemenu');
            if (window.navigator.userAgent.indexOf("Android")) {
                window.location.hash = "#";
            }
        }
    });

    $('body').on('touchmove', function (event) {
        if ($('#mobilemenu').css('display') == "block") {
            return;
        }
    });

    $('#mobilemenu').scroll(function (event) {
        event.preventDefault();
        event.stopPropagation();
        return;
    });

    $('#mobilemenu a').click(function () {

        if ($(this).siblings(".sub-menu").length > 0) {

            if ($(this).siblings(".sub-menu").css("display") != "block") {
                $(this).siblings(".sub-menu").css("display", "block");
                return false;
            }
            else {
                $(this).siblings(".sub-menu").css("display", "none");
                return false;
            }

        }
        else {

            $('body').removeClass('show_mobilemenu');
            $(window).trigger('resize');

            if ($(this).attr("href").substr(0, 1) == "#") {
                window.location.hash = $(this).attr("href");
            }

            $('#mobilemenu').css('display', "none");
        }

    });


    $('#mobilemenu ul.sub-menu').siblings("a").append('<span class="sub"><i class="icon-chevron-down"></i></span>');


    $(".sf-menu").superfish({
        delay: 100,
        autoArrows: true,
        speed: 'fast',
        animation: {opacity: 'show'}
    });


    function wave_fix_submenu_offset() {
        $('a.sf-with-ul').each(function () {
            $(this).siblings("ul.sub-menu").css({
                top: $("#header").outerHeight(),
                left: $(this).offset().left
            });
        });
    }


    $('a.sf-with-ul').hoverIntent(wave_fix_submenu_offset);


    $('#mainmenu ul.sf-menu > li a.sf-with-ul').append('<span class="sub"><i class="icon-chevron-down"></i></span>');

    $('ul.sf-menu.menu-icons').mouseenter(function () {

        var buttons = $(this).find(".widget_shopping_cart_content a.button");

        if (!buttons.hasClass("plain")) {
            buttons.addClass("plain");
        }

    });


    if (!isMobile) {
        $("select:visible").chosen();
    }


    $('.woocommerce div.thumbnails:empty').remove();


    $('.woocommerce div.thumbnails').wrap('<div class="thumbnails-wrapper" />');
    $('.woocommerce a.button.show_review_form').addClass("small");
    $('.woocommerce div.thumbnails-wrapper').append('<a class="button-arrow button-arrow-left" href="#" />');
    $('.woocommerce div.thumbnails-wrapper').append('<a class="button-arrow button-arrow-right" href="#" />');

    $('.woocommerce div.buttons-wrapper a.product_type_variable').addClass("plain").prepend('<i class="icon icon-shopping-cart"></i> ');

    $('.woocommerce ul.page-numbers li a').addClass("button plain");

    $('.woocommerce-tabs').wrap('<div class="tabs-wrapper"/>');
    $('.woocommerce-tabs').addClass('tabs-container');
    $('.woocommerce-tabs .tabs li').attr("class", "").addClass("tab-button");
    $('.woocommerce-tabs .tabs li a').addClass("tab-button-anchor");
    $('.woocommerce-tabs .tabs').attr("class", "").addClass("tabs-buttons");

    $('.woocommerce-tabs').append('<ul class="tabs-contents">').show();

    $('.woocommerce-tabs div.panel').each(function () {
        $('.woocommerce-tabs ul.tabs-contents').append($('<li class="tab-content">').html($(this).html()));
        $(this).remove();
    });

    $(window).resize(function () {
        $('.woocommerce .products .product .catalog-image').each(function () {
            $(this).height($(this).width());
        });
    });

    $('.woocommerce-tabs').removeClass("woocommerce-tabs");


    $("div.tabs-wrapper ul.tabs-buttons").tabs("ul.tabs-contents li.tab-content", {
        tabs: "li.tab-button",
        effect: 'fade',
        current: "active"
    });


    $('.woocommerce div.thumbnails').carouFredSel({
        prev: '.woocommerce div.thumbnails-wrapper a.button-arrow-left',
        next: '.woocommerce div.thumbnails-wrapper a.button-arrow-right',
        circular: true,
        responsive: true,
        width: 424,
        items: {
            width: 116,
            height: 116,
            visible: {
                min: 1,
                max: 4
            }
        },
        swipe: {
            onTouch: true
        },
        scroll: {
            items: 1,
            easing: 'easeInOutCubic',
            duration: 1000,
            pauseOnHover: true
        },
        auto: {
            play: false
        }
    });

    $('input[type="number"]').spinner();

    $('.toggles.single').accordion({
        header: "h3"
    });

    $('.toggles.multi').accordion({
        header: "h3",
        collapsible: true,
        beforeActivate: function (event, ui) {
            if (ui.newHeader[0]) {
                var currHeader = ui.newHeader;
                var currContent = currHeader.next('.ui-accordion-content');
            } else {
                var currHeader = ui.oldHeader;
                var currContent = currHeader.next('.ui-accordion-content');
            }

            var isPanelSelected = currHeader.attr('aria-selected') == 'true';
            currHeader.toggleClass('ui-corner-all', isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top', !isPanelSelected).attr('aria-selected', ((!isPanelSelected).toString()));
            currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e', isPanelSelected).toggleClass('ui-icon-triangle-1-s', !isPanelSelected);
            currContent.toggleClass('accordion-content-active', !isPanelSelected)

            if (isPanelSelected) {
                currContent.slideUp();
            } else {
                currContent.slideDown();
            }

            return false;
        }
    });

    $(".woocommerce-message, .woocommerce-error, .woocommerce-info, .alert").click(function (event) {
        var alert = $(this);
        var x2 = alert.outerWidth() - (event.pageX - alert.offset().left);
        var y = event.pageY - alert.offset().top;

        if (x2 <= 34 && x2 >= 20 && y >= 20 && y <= 34) {
            alert.transition({opacity: 0}, 500, function () {
                alert.hide();
            });
        }

        return false;
    });


    $("i.icon").mouseenter(function () {
        var icon = $(this);
        var color = icon.attr("data-color");
        var bgcolor = icon.attr("data-bgcolor");
        var boxcolor = icon.attr("data-boxcolor");

        if (icon.hasClass("mouseover-no")) {
            return false;
        }

        if (icon.hasClass("inherit-color")) {
            icon.transition({backgroundColor: "rgba(0, 0, 0, 0.05)", color: bgcolor}, 500);
        }
        else if (icon.hasClass("inherit-bgcolor")) {
            icon.transition({backgroundColor: color, color: boxcolor}, 500);
        }
    });

    $("i.icon").mouseleave(function () {
        var icon = $(this);
        var color = icon.attr("data-color");
        var bgcolor = icon.attr("data-bgcolor");

        if (icon.hasClass("mouseover-no")) {
            return false;
        }

        icon.transition({backgroundColor: bgcolor, color: color}, 500);
    });

    $(document).bind('wave-prepare-icons', function () {
        $("i.icon.inherit-color, i.icon.inherit-bgcolor").each(function () {

            var icon = $(this);
            var box = icon.parents("div.box");
            var contentBox = icon.parents("div.content-box.boxed");
            var section = $(this).parents("section.page-section");

            var boxcolor = section.css("background-color");
            var sectioncolor = section.css("background-color");

            if (boxcolor == "transparent" || boxcolor == "rgba(0, 0, 0, 0)") {
                boxcolor = sectioncolor;
            }

            if (icon.hasClass("inherit-color")) {

                if (contentBox.length > 0) {
                    icon.css("color", contentBox.css("background-color"));
                }
                else {
                    icon.css("color", boxcolor);
                }
            }

            icon.attr("data-color", icon.css("color"));
            icon.attr("data-bgcolor", icon.css("background-color"));
            icon.attr("data-boxcolor", boxcolor);

        });
    });
    $(document).trigger('wave-prepare-icons');


    $("[data-animation]").each(function () {

        var element = $(this);
        var animation = element.attr("data-animation");

        switch (animation) {
            case "Fade In":
                $(this).transition({opacity: 0}, 0);
                break;
            case "Fade In Left":
                $(this).transition({opacity: 0, x: 20}, 0);
                break;
            case "Fade In Right":
                $(this).transition({opacity: 0, x: -20}, 0);
                break;
            case "Fade In Top":
                $(this).transition({opacity: 0, y: -20}, 0);
                break;
            case "Fade In Bottom":
                $(this).transition({opacity: 0, y: 20}, 0);
                break;
            case "Zoom":
                $(this).transition({scale: 0.1, opacity: 0}, 0);
                break;
        }

    });


    $("[data-animation]").waypoint(function () {

        var element = $(this);
        var animation = element.attr("data-animation");
        var animationTime = element.attr("data-animation-time");
        var animationDelay = element.attr("data-animation-delay");

        var transition = {};

        switch (animation) {
            case "Fade In":
                transition.opacity = 1;
                break;
            case "Fade In Left":
                transition.opacity = 1;
                transition.x = 0;
                break;
            case "Fade In Right":
                transition.opacity = 1;
                transition.x = 0;
                break;
            case "Fade In Top":
                transition.opacity = 1;
                transition.y = 0;
                break;
            case "Fade In Bottom":
                transition.opacity = 1;
                transition.y = 0;
                break;
            case "Zoom":
                transition.opacity = 1;
                transition.scale = 1;
                break;
        }

        element.delay(animationDelay).transition(transition, animationTime);


    }, {triggerOnce: true, offset: '70%'});


    $("#sidebar #searchform").each(function () {
        $(this).find("#s").width($(this).width() - 8 - $(this).find("#searchsubmit").outerWidth());
    });


    $('.flexslider').flexslider({
        animation: "fade",
        controlNav: false,
        directionNav: true,
        animationLoop: true,
        slideshow: !$('body').hasClass('archive'),
        start: function () {
            $(this).find('img').show();
        }
    });

    $('.flexslider .flex-direction-nav li a.flex-next').html('<i class="icon-chevron-right"></i>');
    $('.flexslider .flex-direction-nav li a.flex-prev').html('<i class="icon-chevron-left"></i>');

    if ($("body.admin-bar").length > 0) {
        $("#header").css("margin-top", 28);
    }


    $("#logo").data("height", $("#logo").height());
    $("#header a.call-to-action").data("height", $("#header a.call-to-action").height());

    var logoHeight = 40;

    $(window).bind("header-resize", function () {


        $("#header-content").css("visibility", "visible");

        var windowWidth = $(window).outerWidth();

        if (windowWidth < 1100) {

            $("#header-content-wrapper").css({height: 66});
            $("#logo").transition({scale: 0.9, marginTop: (66 - (logoHeight * 0.9)) / 2}, 0);
            $("#nav ul.sf-menu").css({lineHeight: "66px"});
            $("#header a.call-to-action").css({marginTop: 16, paddingTop: 7, paddingBottom: 7, paddingLeft: 12, paddingRight: 12});

            return;
        }
        else {
            $("#nav ul.sf-menu").css({lineHeight: "90px"});
        }

        if(wave_disable_header_easing){
            if ($(window).data("scrollState") == "large") {
                $(window).trigger("header-direct-expand");
                $(window).trigger("header-direct-topbar-expand");
            }
            else {
                $(window).trigger("header-direct-collapse");
                $(window).trigger("header-direct-topbar-collapse");
            }
        }
        else {
            if ($(window).data("scrollState") == "large") {
                $(window).trigger("header-easing-large");
                $(window).trigger("header-easing-topbar-expand");
            }
            else {
                $(window).trigger("header-easing-small");
                $(window).trigger("header-easing-topbar-collapse");
            }
        }

    });


    $(window).bind("header-easing-small", function () {


        $("#header-top-line").transition({opacity: 0}, 500, function () {
            $("#header-top-line").hide();
            wave_fix_submenu_offset();
        });
        $("#header-content-wrapper").transition({height: 66}, 500);
        $("#logo").transition({height: 30, marginTop: Math.round(66 - (logoHeight * 0.75)) / 2}, 500);
        $("#header a.call-to-action").transition({marginTop: 16, paddingTop: 7, paddingBottom: 7, paddingLeft: 12, paddingRight: 12}, 500);
        $('body').css({marginTop: 66});
        $('#back-to-top').show().css({opacity: 0}).transition({opacity: 1}, 500);

    });

    $(window).bind("header-easing-large", function () {

        var home_id = $("#main-content").children("section.page-section:first-child").attr("id");

        if (typeof home_id == "string" && $('body').hasClass('page-template-page-onepager-php')) {
            window.location.hash = home_id.substr(2);
        }

        var resizeInterval = setInterval(function () {
            $('body').css({marginTop: $('#header').height()});
        }, 10);

        $("#header-content-wrapper").transition({height: 90}, 500, function () {
            wave_fix_submenu_offset();
            clearInterval(resizeInterval);
            $(window).scroll();
        });
        $("#header-top-line").show();
        $("#header-top-line").transition({opacity: 1}, 500);
        $("#logo").transition({height: 40, marginTop: Math.round(90 - logoHeight) / 2}, 500);
        $("#header a.call-to-action").transition({marginTop: 23, paddingTop: 11, paddingBottom: 11, paddingLeft: 16, paddingRight: 16}, 500);
        $('#back-to-top').transition({opacity: 0}, 500, function () {
            $(this).hide();
        });
    });

    $(window).bind("header-easing-topbar-collapse", function () {
        $("#header-top, #header-top-left").transition({opacity: 0}, 250, function () {
            if ($(window).data("scrollState") == "small") {
                $("#header-top, #header-top-left").css({opacity: 0});
                $("#header-top-wrapper").transition({height: 0}, 250);
            }
        });
    });

    $(window).bind("header-easing-topbar-expand", function () {
        $("#header-top-wrapper").transition({height: 28}, 250, function () {
            if ($(window).data("scrollState") == "large") {
                $("#header-top, #header-top-left").transition({opacity: 1}, 250);
            }
        });
    });

    $(window).bind("header-direct-topbar-expand", function () {
        $("#header-top-wrapper").css({height: 28});
        $("#header-top, #header-top-left").css({opacity: 1});
    });

    $(window).bind("header-direct-topbar-collapse", function () {
        $("#header-top-wrapper").css({height: 0});
        $("#header-top-line").hide();
        $("#header-top, #header-top-left").css({opacity: 0});
    });

    $(window).bind("header-direct-expand", function () {

        var home_id = $("#main-content").children("section.page-section:first-child").attr("id");

        if (typeof home_id == "string" && $('body').hasClass('page-template-page-onepager-php')) {
            window.location.hash = home_id.substr(2);
        }

        $("#header-content-wrapper").css({height: 90});
        $('body').css({marginTop: $('#header').height()});

        wave_fix_submenu_offset();
        $(window).scroll();

        $("#header-top-line").show().css({opacity: 1});
        $("#logo").css({height: 40, marginTop: Math.round(90 - logoHeight) / 2});
        $("#header a.call-to-action").css({marginTop: 23, paddingTop: 11, paddingBottom: 11, paddingLeft: 16, paddingRight: 16});
        $('#back-to-top').css({opacity: 0});
        $(this).hide();

    });

    $(window).bind("header-direct-collapse", function () {
        $("#header-top-line").css({opacity: 0});
        $("#header-top-line").hide();
        wave_fix_submenu_offset();
        $("#header-content-wrapper").css({height: 66});
        $("#logo").css({height: 30, marginTop: Math.round(66 - (logoHeight * 0.75)) / 2});
        $("#header a.call-to-action").css({marginTop: 16, paddingTop: 7, paddingBottom: 7, paddingLeft: 12, paddingRight: 12});
        $('body').css({marginTop: 66});
    });


    $(window).data("scrollState", "large");


    $(window).scroll(function (event) {

        wave_fix_submenu_offset();

        var offset = 10;
        var windowWidth = $(window).outerWidth();

        if (windowWidth < 1100 && $(window).data("scrollState") == "large") {
            $(window).data("scrollState", "small");
            $(window).trigger("header-resize");
        }

        if (windowWidth < 1100) {
            return;
        }

        if ($(window).scrollTop() >= offset && $(window).data("scrollState") == "large") {
            $(window).data("scrollState", "small");
            $(window).trigger("header-resize");
        }
        else if ($(window).scrollTop() < offset && $(window).data("scrollState") == "small") {
            $(window).data("scrollState", "large");
            $(window).trigger("header-resize");
        }

    });

    $(window).resize(function () {
        $(window).scroll();

        if (!$('.right.right-mobile').is(":visible")) {
            $('#mobilemenu').hide();
        }

    });

    $(window).trigger("header-resize");

    $("a.lang_sel_sel .iclflag").replaceWith('<i class="icon icon-globe"></i>');


    $("a.lang_sel_sel").click(function () {
        return false;
    });

    $(window).resize(function () {

        var sliderChild = $('#slider > div');

        if (sliderChild.height() > 0) {
            $('#slider').height($('#slider > div').height());
        }

    });

    $(document).ready(function () {
        $(window).resize();
    });

    $(window).load(function () {

        $(window).resize();

        $(window).trigger("header-resize");

    });

    $('[data-parallax-background-ratio]').each(function () {

        var element = $(this);
        var source = element.attr('data-background-image');

        element.data('parallax-scale', element.attr('data-parallax-scale') == 'true');

        var image = new Image();
        image.onload = function () {
            element.data('background-image', this);
            element.attr('data-parallax-enabled', 1);
            element.css('background-image', 'url(' + this.src + ')');
        };
        image.src = source;

    });

    $(window).on('parallax-update', function () {

        var win = $(window);
        var windowHeight = win.innerHeight();
        var windowWidth = win.innerWidth();
        var windowTop = $(document).scrollTop() + windowHeight;
        var parallax_ratio = 1;

        $('[data-parallax-enabled]').each(function () {

            var element = $(this);
            var image = element.data('background-image');
            var height = element.height();
            var top = element.offset().top;
            var offset_start = (top < windowHeight ? windowHeight - top : -0.01);
            var offset = (windowTop - top > 0 ? windowTop - top : 0) - offset_start;
            var ratio = offset / ((windowHeight + height) - offset_start);
            var scale = element.data('parallax-scale');

            if (ratio > 1 || ratio < 0) {
                return;
            }

            if (scale) {
                var imageWidth = win.innerWidth();
                var imageHeight = image.height * (windowWidth / image.width);


                if (imageHeight < height) {
                    imageHeight = height;
                    imageWidth = image.width * (imageHeight / image.height);
                }

                element.css('background-size', imageWidth + 'px ' + imageHeight + 'px');
                element.css('background-position', '50% -' + (((imageHeight - height) * ratio) * parallax_ratio) + "px");
            }
            else {
                element.css('background-position', '50% -' + ((height * ratio) * parallax_ratio) + "px");
            }

        });

    });

    $(window).scroll(function () {
        $(window).trigger('parallax-update');
    });


})(jQuery);





