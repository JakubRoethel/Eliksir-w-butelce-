export default function headerService(myAjax) {
    const header = document.querySelector('.header');
    const headerOverlay = document.querySelector('.navigation__overlay');
    const doc = document.documentElement;
    console.log("Test geaderJS");
    window.addEventListener('scroll', () => {
      const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
  
      if (top > 20) {
        header.classList.add('header--scrolled');
      } else {
        header.classList.remove('header--scrolled');
      }
    });
  
  
    const burger = document.querySelector('.header__toggle');
  
    burger.addEventListener('click', () => {
      if(header.classList.contains('header--navigation-open')){
        header.classList.remove('header--navigation-open');
      } else {
        header.classList.add('header--navigation-open');
      }
    });
  
    // headerOverlay.addEventListener('click', () => {
    //     header.classList.remove('header--navigation-open');
    // });






//minicart buttons logic
jQuery(function ($) {
  $(".cart-icon").click(function (e) {
    e.preventDefault();
    $(".mini-cart-container").toggleClass("minicart-show");
  });

  $(".close-icon").click(function (e) {
    e.preventDefault();
    $(".mini-cart-container").toggleClass("minicart-show");
  });

  $(document).on("click", function (event) {
    if (
      !$(event.target).closest(".cart-icon-container").length &&
      !$(event.target).closest(".mini-cart-container").length
    ) {
      $(".mini-cart-container").removeClass("minicart-show");
    }
  });
});

jQuery(function ($) {
  var typingTimer;
  var doneTypingInterval = 500;
  var ajaxUrl = myAjax.ajaxurl; // Fetch the AJAX URL from server using wp_localize_script
  

  $("body").on("change", ".woocommerce-mini-cart .quantity input.qty", function (e) {
    e.stopImmediatePropagation();
    console.log(myAjax);
    var item_hash = $(this)
      .attr("name")
      .replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
    var item_quantity = $(this).val();
    var currentVal = parseFloat(item_quantity);

    clearTimeout(typingTimer);
    typingTimer = setTimeout(function () {
      $.ajax({
        type: "POST",
        url: myAjax.ajaxurl,
        data: {
          action: "update_item_from_cart",
          cart_item_key: item_hash,
          qty: currentVal,
        },
        success: function (data) {
          jQuery(document.body).trigger("wc_fragment_refresh");
          jQuery(document.body).trigger("wc_fragments_refreshed");
          $(".cart-icon i").addClass("shake-cart");
          setTimeout(() => {
            $('.cart-icon i').removeClass('shake-cart');
            
          }, 900);
         
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error: " + errorThrown);
        },
      });
    }, doneTypingInterval);


    
  });
});


 // show the mini cart here
jQuery(document).on('added_to_cart', function(event, fragments, cart_hash) {
   jQuery(".mini-cart-container").addClass("minicart-show");
   jQuery(".cart-icon i").addClass("shake-cart");
   setTimeout(() => jQuery('.cart-icon i').removeClass('shake-cart'), 1000);
   console.log(fragments);
});


  }
  