
import AOS from 'aos';
import headerService from './modules/header';

AOS.init.bind(this, {
    duration: 300,
    easing: 'ease-in-out',
    delay: 100,
}) 

headerService();
console.log("test");


var swiper = new Swiper(".swiper", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "1.5",
    autoplay: {
      delay: 2000
    }, 
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
  