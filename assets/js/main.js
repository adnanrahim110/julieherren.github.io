(function ($) {
    "use strict";
    $('.testimonials-slides-5').owlCarousel({
        loop: true,
        dots: true,
        nav: true,
        margin: 10,
        autoplayHoverPause: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
                nav: false
            },
            576: {
                items: 1,
                dots: true,
                nav: false
            },
            768: {
                items: 1,
            },
            1000: {
                items: 1,
            },
            1200: {
                items: 1,
            }
        }
    });

    $(window).scroll(function () {
        var window_top = $(window).scrollTop() + 1;
        if (window_top > 50) {
            $('.navbar-sticky').addClass('menu_fixed animated fadeInDown');
        } else {
            $('.navbar-sticky').removeClass('menu_fixed animated fadeInDown');
        }
    });

    $(window).scroll(function () {
        var window_top = $(window).scrollTop() + 1;

        if (window_top > 50) {
            $('.fixed-btm-top').addClass('reveal');
        } else {
            $('.fixed-btm-top').removeClass('reveal');
        }
    });

    //  Sticky Menu

    $(window).scroll(function () {
        var window_top = $(window).scrollTop() + 1;
        if (window_top > 50) {
            $('.navbar-sticky').addClass('menu_fixed animated fadeInDown');
        } else {
            $('.navbar-sticky').removeClass('menu_fixed animated fadeInDown');
        }
    });

    $('a.smooth-scroll').on('click', function (e) {
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top - 100
        }, 1000);
        e.preventDefault();
    })

    var offSetTop = 100;
    var $scrollToTopButton = $('.scroll-to-top');
    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > offSetTop) {
            $scrollToTopButton.fadeIn();
        } else {
            $scrollToTopButton.fadeOut();
        }
    });

    //Click event to scroll to top
    $scrollToTopButton.click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

}(jQuery));

gsap.to(".aboutimg > img", {
    scrollTrigger: {
        trigger: ".about-sec",
        start: "-30% top",
        end: "bottom bottom",
        delay: 3,
    },
    x: 0,
    duration: 1.5,
});
gsap.to(".about-overlay", {
    scrollTrigger: {
        trigger: ".about-sec",
        start: "-30% top",
        end: "bottom bottom",
        delay: 3,
    },
    x: 0,
    duration: 1.5,
});
gsap.to(".banner-img-round img", {
    x: 0,
    duration: 1.5,
});

gsap.to(".ab-img-item img", {
    scrollTrigger: {
        trigger: ".author-sec",
        start: "-30% top",
        end: "bottom bottom",
        delay: 3,
    },
    x: 0,
    duration: 1.5,
});
