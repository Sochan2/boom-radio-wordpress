<?php
function my_custom_enqueue_scripts() {
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'my_custom_enqueue_scripts');
