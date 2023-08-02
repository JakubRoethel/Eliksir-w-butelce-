export default function swiperService() {
  var labels_list_var = labels_list.nav_labels_list;
  console.log(labels_list_var);

  var swiper1 = new Swiper(".swiper", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "1",
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return `<span class="dot swiper-pagination-bullet">${labels_list_var[index].slider_button_text}</span>`;
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });


  var swiper1_mobile = new Swiper(".swiper_mobile", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "1",
    spaceBetween: 0,
    loop: true,
    autoplay: {
      delay: 3000,
    },
  });

  var swiper2 = new Swiper(".swiper_featured", {
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
      el: ".swiper-scrollbar",
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
        slidesPerView: 1.3,
        spaceBetween: 20,
        slidesOffsetBefore: 0,
        slidesOffsetAfter: 0,
      },
      // when window width is >= 640px
      740: {
        slidesPerView: 2.5,
        spaceBetween: 40,
        slidesOffsetBefore: 48,
        slidesOffsetAfter: 48,
      },
      1200: {
        slidesPerView: 3.5,
        spaceBetween: 40,
        slidesOffsetBefore: 100,
        slidesOffsetAfter: 100,
      },


    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  console.log("after-swiper");

  var swiper3 = new Swiper(".swiper_single_product", {
    effect: "slide",
    grabCursor: true,
    spaceBetween: 0,
    centeredSlides: false,
    loop: true,
    direction: "horizontal",
    slidesPerView: "1",
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  jQuery(document).ajaxComplete(function (event, request, settings) {
    var swiper3 = new Swiper(".swiper_featured", {
      effect: "slide",
      grabCursor: true,
      centeredSlides: false,
      slidesPerView: "3.5",
      spaceBetween: 50,
      slidesOffsetBefore: 100,
      slidesOffsetAfter: 100,
      loop: false,
      scrollbar: {
        el: ".swiper-scrollbar",
        draggable: true,
      },
      autoplay: {
        delay: 4000,
      },
      autoHeight: true, //enable auto height
      forceToAxis: true,
      breakpoints: {
        320: {
          slidesPerView: 1.3,
          spaceBetween: 20,
          slidesOffsetBefore: 0,
          slidesOffsetAfter: 0,
        },
        // when window width is >= 640px
        740: {
          slidesPerView: 2.5,
          spaceBetween: 40,
          slidesOffsetBefore: 48,
          slidesOffsetAfter: 48,
        },
        1200: {
          slidesPerView: 3.5,
          spaceBetween: 40,
          slidesOffsetBefore: 100,
          slidesOffsetAfter: 100,
        },
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  });

  var swiper4 = new Swiper(".swiper_product_set", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "4.2",
    spaceBetween: 50,
    slidesOffsetBefore: 150,
    slidesOffsetAfter: 150,
    slideToClickedSlide: true,
    // shortSwipes: true,
    scrollbar: {
      el: ".swiper-scrollbar",
      draggable: true,
    },
    loop: false,
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
        spaceBetween: 20,
      },
      // when window width is >= 480px
      780: {
        slidesPerView: 2.5,
        spaceBetween: 30,
      },
      // when window width is >= 640px
      940: {
        slidesPerView: 4.8,
        spaceBetween: 40,
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var swiper5 = new Swiper(".swiper_logo", {
    effect: "slide",
    grabCursor: true,
    centeredSlides: false,
    slidesPerView: "4",
    spaceBetween: 50,
    speed: 400,
    slideToClickedSlide: true,
    autoplay: {
      delay: 1000,
    },
    loop: true,
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2,
        spaceBetween: 50,
        speed: 800,
      },
      780: {
        slidesPerView: 7,
        spaceBetween: 50,
      },
    },
  });
}
