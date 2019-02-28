var profissoesItem = document.querySelectorAll('.profissoes-slider__item');

var swiper = new Swiper('.profissoes-slider', {
    effect: 'coverflow',
    simulateTouch: false,
    watchOverflow: true,
    initialSlide: 1,
    loop: true,
    centeredSlides: true,
    keyboard: true,
    spaceBetween: 0,
    slidesPerView: 'auto',
    speed: 300,
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 3,
        slideShadows: false
    },
    breakpoints: {
        480: {
            spaceBetween: 0,
            centeredSlides: true
        }
    },
   
    // navigation: {
    //     nextEl: '.profissoes-slider-next',
    //     prevEl: '.profissoes-slider-prev'
    // },
    pagination: {
        el: '.profissoes-slider__pagination',
        clickable: true
    },
    on: {
        init: function () {
            jQuery('.swiper-slide-active').addClass('active');
        }
    }
});

swiper.on('touchEnd', function () {
    jQuery('.swiper-slide-active').addClass('active');
});

swiper.on('slideChange', function () {
    jQuery('.swiper-slide-active').removeClass('active');
});

swiper.on('slideChangeTransitionEnd', function () {
    jQuery('.swiper-slide-active').addClass('active');
});



if(jQuery(window).width() > 800) {
    jQuery(document).on("mouseover", ".profissoes-slider__item", function (_event, _element) {
        
        profissoesItem.forEach(function (element) {
            element.addEventListener('mouseover', function () {
                jQuery('.swiper-slide-active').removeClass('active');
                jQuery(element).addClass('active');
                
            });

            element.addEventListener('mouseleave', function () {
                jQuery(element).removeClass('active');
            });
        });
    });
}