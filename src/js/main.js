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



headerService();
swiperService();
getOfferService();