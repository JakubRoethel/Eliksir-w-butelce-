<!doctype html>
<html lang="<?php bloginfo('language'); ?>">
<head>
  <!-- DOCUMENT SETTINGS -->
  <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' );?>" charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- PAGE META -->
  <title><?php bloginfo( 'name' ); ?> <?php wp_title(); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <!-- RESPONSIVE UTILITIES -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <script src="https://apis.google.com/js/api.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.5.0/tiny-slider.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.5.0/min/tiny-slider.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
 
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
 
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
  <?php get_template_part('views/common', 'header'); ?>
  <?php get_template_part('views/common', 'preloader'); ?>
