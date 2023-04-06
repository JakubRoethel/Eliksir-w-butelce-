
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
var swiper1 = new Swiper(".swiper", {
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



   var swiper3 = new Swiper(".swiper_single_product", {
    effect: "slide",
    grabCursor: true,
    spaceBetween: 0,
    centeredSlides: false,
    loop:true,
    direction: 'horizontal',
    slidesPerView: "1", 
    autoplay: {
      delay: 4000,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
  


  jQuery( document ).ajaxComplete(function( event,request, settings ) {
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


   acf.add_action('ready', function() {
    var currentPageID = acf.get('post_id');
    console.log(currentPageID);
    var myCustomFieldValue = acf.getField('my_custom_field', currentPageID).val();
    console.log(myCustomFieldValue);
  });

  window.onload = function() {
    var currentPageID = parseInt(acf.get('post_id'));
    console.log(acf);
    var myCustomFieldValue = acf.getField('my_custom_field', currentPageID).val();
    console.log(myCustomFieldValue);
  };


  var currentPageID = parseInt(acf.get('post_id'));
console.log(currentPageID);











//test form 

const productSelect = document.getElementById("product");
const quantityInput = document.getElementById("quantity");
const productList = document.getElementById("product-list");
console.log("TEst form");
const addProduct = () => {
  const productValue = productSelect.value;
  const quantityValue = quantityInput.value;

  if (productValue !== "" && quantityValue !== "") {
    const productItem = document.createElement("div");
    productItem.innerHTML = `${productValue} - ${quantityValue}`;
    productList.appendChild(productItem);

    productSelect.value = "";
    quantityInput.value = "";
  }
};

// document.addEventListener("DOMContentLoaded", () => {
//   console.log("TEst form 2");
//   // const addButton = document.createElement("button");
//   addButton.textContent = "Add another product";
//   addButton.addEventListener("click", addProduct);
//   // document.body.appendChild(addButton);
// });



// jQuery(function($) {
//   $('.cart-icon').click(function(e) {
//      e.preventDefault();
//      $('.mini-cart-container').toggleClass('minicart-show');
//   });
// });


jQuery(function($) {
  $('.cart-icon').click(function(e) {
     e.preventDefault();
     $('.mini-cart-container').toggleClass('minicart-show');
     if ($('.mini-cart-container').hasClass('minicart-show')) {
        $('html').addClass('noscroll');
     } else {
      $('html').removeClass('noscroll');
     }
  });

  $(document).on('click', function(event) {
     if (!$(event.target).closest('.cart-icon-container').length && !$(event.target).closest('.mini-cart-container').length) {
        $('.mini-cart-container').removeClass('minicart-show');
        $('html').removeClass('noscroll');
     }
  });
});


