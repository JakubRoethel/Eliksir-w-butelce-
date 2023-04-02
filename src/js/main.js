
import AOS from 'aos';
import headerService from './modules/header';

// AOS.init.bind(this, {
//     duration: 300,
//     easing: 'ease-in-out',
//     delay: 100,
// }) 

headerService();



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

  var swiper = new Swiper(".swiper_featured", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "3.5", 
    spaceBetween: 50, 
    slidesOffsetBefore: 100,
    slidesOffsetAfter: 100,
    slideToClickedSlide: true,
    // shortSwipes: true,
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
    loop: false,
    autoplay: {
      delay: 4000,
    },
    setWrapperSize: true,
    // mousewheel: true,
    // releaseOnEdges: true,
    // forceToAxis: true,
    // freeMode: {
    //   enabled: true,
    //   sticky: true,
    // },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1.5,
        spaceBetween: 20
      },
      // when window width is >= 480px
      780: {
        slidesPerView: 2.5,
        spaceBetween: 30
      },
      // when window width is >= 640px
      940: {
        slidesPerView: 3.5,
        spaceBetween: 40
      }
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
  


  jQuery( document ).ajaxComplete(function( event,request, settings ) {
    var swiper = new Swiper(".swiper_featured", {
      effect: "slide",
      grabCursor: true,
      centeredSlides: false,
      slidesPerView: "3.5", 
      spaceBetween: 50, 
      slidesOffsetBefore: 100,
      slidesOffsetAfter: 100,
      loop: false,
      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
      },
      autoplay: {
        delay: 4000,
      },
      autoHeight: true, //enable auto height
      // mousewheel: true,
      forceToAxis: true,
      // freeMode: {
      //   enabled: true,
      //   sticky: false,
      // },
      
      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 1.5,
          spaceBetween: 20
        },
        // when window width is >= 480px
        780: {
          slidesPerView: 2.5,
          spaceBetween: 30
        },
        // when window width is >= 640px
        940: {
          slidesPerView: 3.5,
          spaceBetween: 40
        }
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
  });




  //call to action containers logic on hover
  let lastCallToAction = jQuery('.single_call_to_action:last-child');
  lastCallToAction.mouseenter(function() {
   jQuery('.single_call_to_action:first-child').addClass('margin-left-33');
  });

  lastCallToAction.mouseleave(function() {
    jQuery('.single_call_to_action:first-child').removeClass('margin-left-33');
   });



