
import AOS from 'aos';
import headerService from './modules/header';

AOS.init.bind(this, {
    duration: 300,
    easing: 'ease-in-out',
    delay: 100,
}) 

// headerService();



var postID = acf.get('post_id');
var acfVersion = acf.get('acf_version');



let swiperNames = ['Basil smash', 'Orange Classic', 'Cherry Cuba', 'Lime sour', 'Old Fashioned', 'Spritz'];
var swiper = new Swiper(".swiper", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "1", 
    spaceBetween: 0, 
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true, renderBullet: function (index, className) {
        return `<span class="dot swiper-pagination-bullet">${swiperNames[index]}</span>`;
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
  