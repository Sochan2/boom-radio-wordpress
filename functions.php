<?php
function my_custom_enqueue_scripts() {
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'my_custom_enqueue_scripts');


//thumbnail

add_theme_support( 'post-thumbnails' );


//bootstrap js
/*
function wp_enqueue_bootstrap_script(){
  wp_enqueue_script(
  'bootstrap-js',
  get_template_directory_uri() . '.wordpress/js/bootstrap.bundle.min.js', 
  array(),
  '5.3.0',
  true 
  );
}

add_action('wp_enqueue_scripts', 'wp_enqueue_bootstrap_script');
*/

function enqueue_swiper_assets() {
  // CSS
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

  // JS
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

