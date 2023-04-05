<?php 

get_header('shop'); ?>
<h1 style="margin-top: 200px; color: black" class="page-title"><?php the_title() ?></h1>
<section class="form_container">
<form action="#" method="post">
  <div>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div>
    <label for="surname">Surname:</label>
    <input type="text" id="surname" name="surname" required>
  </div>
  <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  </div>
  <div>
    <label for="phone">Phone number:</label>
    <input type="tel" id="phone" name="phone" required>
  </div>
  <div>
    <label for="product">Product:</label>
    <select id="product" name="product" required>
      <option value="">Select a product</option>
      <option value="Product 1">Product 1</option>
      <option value="Product 2">Product 2</option>
      <option value="Product 3">Product 3</option>
    </select>
  </div>
  <div>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" required>
  </div>
  <div id="product-list"></div>
  <button type="submit">Order</button>
</form>

</section>

<?php get_footer();