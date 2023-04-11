<?php

get_header('shop'); ?>
<h1 style="margin-top: 200px; color: black" class="page-title"><?php the_title() ?></h1>
<div class="main_wrapper">
<div class="popup_wrapper">
  <section class="left_conainer">
    <div class="wrapper">
      <p>Chcesz złożyć zamówienie telefonicznie? Zadzwoń do nas!</p>
      <img src="http://eliksir-w-butelce.local/wp-content/uploads/2023/04/Rectangle-312-1.png"/>
      <p>Ewa Betka</p>
      <p>+48 123 123 123</p>
      <p>ewa@eliksirwbutelce.pl</p>
    </div>
  </section>
  <section class="form_container b2b_offer">
    <form action="#" method="post">
      <p>Możesz też zamówić produkty przez formularz</p>
      <div class="container name">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="container surname">
        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required>
      </div>
      <div class="container email">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="container phone">
        <label for="phone">Phone number:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="wrapper">
        <div class="container product_selector">
          <label for="product">Product:</label>
          <select id="product" name="product" required>
            <option value="">Select a product</option>
            <?php
            $args = array(
              'post_type' => 'product',
              'posts_per_page' => -1, // set to -1 to retrieve all posts
            );

            $products = get_posts($args);

            foreach ($products as $product) {
              $product_title = $product->post_title; ?>
              <option value="<?php echo $product_title ?>"><?php echo $product_title ?></option>

            <?php } ?>
          </select>
        </div>
        <div class="container quantity">
          <label for="quantity">Quantity:</label>
          <input type="number" id="quantity" name="quantity" required>
        </div>
      </div>
      <div id="button-hook"></div>
      <div id="product-list"></div>
      <button id="order-button" type="submit">Order</button>
    </form>

  </section>
</div>
</div>



<?php get_footer();
