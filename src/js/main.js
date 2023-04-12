import AOS from "aos";
import headerService from "./modules/header";
import swiperService from "./modules/swiper-objects";
import getOfferService from "./modules/b2b-offer-popup";

// AOS.init.bind(this, {
//     duration: 300,
//     easing: 'ease-in-out',
//     delay: 100,
// })



var postID = acf.get("post_id");
var acfVersion = acf.get("acf_version");

//call to action containers logic on hover
let lastCallToAction = jQuery(".single_call_to_action:last-child");
lastCallToAction.mouseenter(function () {
  jQuery(".single_call_to_action:first-child").addClass("margin-left-33");
});

lastCallToAction.mouseleave(function () {
  jQuery(".single_call_to_action:first-child").removeClass("margin-left-33");
});

acf.add_action("ready", function () {
  var currentPageID = acf.get("post_id");
  console.log(currentPageID);
  var myCustomFieldValue = acf.getField("my_custom_field", currentPageID).val();
  console.log(myCustomFieldValue);
});

window.onload = function () {
  var currentPageID = parseInt(acf.get("post_id"));
  console.log(acf);
  var myCustomFieldValue = acf.getField("my_custom_field", currentPageID).val();
  console.log(myCustomFieldValue);
};

var currentPageID = parseInt(acf.get("post_id"));
console.log(currentPageID);



let faq_list = jQuery(".faq_list .wrapper");

faq_list.click(function () {
  jQuery(this).toggleClass("active");
});


jQuery(document).ready(function($){
  // Get the element you want to animate
  var $element = $('.glass_overlay');
  console.log($element);
  $(window).scroll(function() {
    // Get the position of the element relative to the top of the window
    var elementTop = $element.offset().top;
    var elementHeight = $element.outerHeight();
    var windowHeight = $(window).height();
    var windowScrollTop = $(this).scrollTop();
    var visibleStart = windowScrollTop + windowHeight;
    var visibleEnd = windowScrollTop;
    // Check if the element is in view
    if ((elementTop + elementHeight >= visibleEnd) && (elementTop <= visibleStart)) {
      // Calculate the amount to move the element based on the scroll position
      var distance = windowScrollTop - elementTop;
      var translateY = 'translateY(' + distance + 'px)';
      // Add the transform to the element's CSS
      $element.css('transform', translateY);
    }
  });
});



headerService(myAjax);
swiperService();
getOfferService();


