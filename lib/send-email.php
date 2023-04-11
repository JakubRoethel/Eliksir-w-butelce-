<?php
// Load WordPress
$root_dir = dirname(dirname(dirname(dirname(dirname(__FILE__)))));

require_once $root_dir . '/wp-load.php';
// require_once dirname(__DIR__, 1) . ('/lib/get-product-by-cat.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the JSON data from the POST request
  $json_data = file_get_contents('php://input');

  // Decode the JSON data into a PHP array
  $data = json_decode($json_data, true);

  // Extract the customer information
  $name = $data['name'];
  $email = $data['email'];

  // Extract the product information
  $product_list = '';
  foreach ($data['products'] as $product) {
   
    $product_list .= "$product\n";
  }

  // Construct the email message
  $message = "Dear $name,\n\nThank you for your order. Your order details are as follows:\n\n";
  $message .= "Product List:\n";
  $message .= $product_list;

  // Set the email headers
  $headers = "From: Your Website <noreply@yourwebsite.com>\r\n";
  $headers .= "Reply-To: noreply@yourwebsite.com\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Send the email
  $to = $email;
  $subject = 'Your Order';
  $email_sent = mail($to, $subject, $message, $headers);

// Save the email activity data as post meta
if ($email_sent) { // If the email is sent successfully
  // Create a new post
  $post_args = array(
    'post_title' => $name,
    'post_type' => 'email_activity',
    'post_status' => 'publish',
  );

  $post_id = wp_insert_post($post_args, true);

  if ($post_id) { // If the post is created successfully
    // Save the email activity data as post meta
    update_post_meta($post_id, 'email', $email);
    update_post_meta($post_id, 'products', $data['products']);
    error_log('Email activity data saved successfully.'); // Debug message
  } else {
    error_log('Error creating email activity post.'); // Debug message
  }
} else {
  error_log('Error sending email.'); // Debug message
}
}


