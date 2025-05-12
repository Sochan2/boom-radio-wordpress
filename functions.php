<?php
function my_custom_enqueue_scripts() {
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700&display=swap', false );
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'my_custom_enqueue_scripts');

// swiper.js
function enqueue_swiper_assets() {
  // Swiper CSS
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  
  // Swiper JS
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

// thumbnails 
add_theme_support( 'post-thumbnails' );



