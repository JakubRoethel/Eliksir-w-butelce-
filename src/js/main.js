
import AOS from 'aos';
import headerService from './modules/header';

AOS.init.bind(this, {
    duration: 300,
    easing: 'ease-in-out',
    delay: 100,
}) 

// headerService();

let swiperNames = ['One', 'Two', 'Three'];
var swiper = new Swiper(".swiper", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "1", 
    spaceBetween: 20, 
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
  