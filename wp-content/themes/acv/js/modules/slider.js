import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';

var mySwiper = new Swiper('.swiper-container', {
  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
