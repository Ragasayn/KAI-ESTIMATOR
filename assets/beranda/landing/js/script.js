$(document).ready(function () {

    $('#katalog .card-katalog, #artikel .card-artikel').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });

    $('#main .tagline').slick({
        vertical: true,
        arrows: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 1024,
            settings: {
                vertical: false
            }
        }]
    });

    $('#client .clients-logo').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });



    $('.signup a.estimatorlogin').click(function () {
        $(this).addClass('pilih');
        $('.signup a.suplierlogin').removeClass('pilih');
    });

    $('.signup a.suplierlogin').click(function () {
        $(this).addClass('pilih');
        $('.signup a.estimatorlogin').removeClass('pilih');
    });

    $(window).scroll(function () {
        if (!$('.navbar').hasClass('navbar-gradien')) {
            if ($(this).scrollTop() > 0) {
                $('.navbar').addClass('scrolled');
                $('.navbar-brand img').attr('src', "<?php echo base_url('assets/beranda/landing/images/logocolor.png') ?>");
            } else {
                $('.navbar').removeClass('scrolled');
                $('.navbar-brand img').attr('src', "<?php echo base_url('assets/beranda/landing/images/logowhite.png') ?>");
            };
        };
    });

    $('#testimonial .slick-testimonee').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        dots: true,
        arrows: false
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('.rocket img').fadeIn('slow');
        } else {
            $('.rocket img').fadeOut('slow');
        }
    });

    $('.rocket a').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 2000);
        return false;
    });

    $('#brand .brand-slide').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });

    $('.discount .sale a').on('click', function (e) {
        var x = $('.discount').position();
        if (x.left < 0) {
            $('.discount').animate({
                'left': '0px'
            });
        } else {
            $('.discount').animate({
                'left': '-118px'
            });
        }
        return e.preventDefault();
    });

    // kondisi ketika memiliki sidebar
    if ($('.sidebar').length) {
        var sidebar = new StickySidebar('#pencarian', {
            topSpacing: 95,
            bottomSpacing: 50
        });
    }

    // Jquery Mobile size -----------------------------------------------------------------------------------
    function checkWidth() {
        var windowsize = $(window).width();
        if (windowsize < 700) {
            $('.isi-aktifitas .sidebar, .navbar .navbar-nav .nav-item.featured').hide();
        } else {
            $('.isi-aktifitas .sidebar, .navbar .navbar-nav .nav-item.featured').show();
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);

});