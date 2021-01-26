import Swiper from 'swiper/bundle';

let homeBannerSlideCount = document.querySelector('.HomeBanner-slider .swiper-wrapper')
    .childElementCount;
let options = null;
if (homeBannerSlideCount > 1) {
    options = {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
    };
}

var mySwiper = new Swiper('.HomeBanner-slider', options);
