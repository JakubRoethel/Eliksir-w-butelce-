<?php

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
  mail($to, $subject, $message, $headers);
}
