<?php
function my_custom_enqueue_scripts()
{
  // Add Roboto and Archivo Black fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700&family=Archivo+Black&display=swap',
    false
  );

  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/style.css');
  wp_enqueue_script('custom-js', get_template_directory_uri() . 'assets/js/main.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'my_custom_enqueue_scripts');

//Swiper.js 
function enqueue_swiper_assets()
{
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
  wp_enqueue_script('swiper-init', get_template_directory_uri() . 'assets/js/swiper-init.js', ['swiper-js'], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');




// Enable post thumbnails
add_theme_support('post-thumbnails');


function create_artist_categories()
{

  $parent = get_term_by('slug', 'artist', 'category');
  if (!$parent) {
    $parent = wp_insert_term('Artist', 'category', ['slug' => 'artist']);
    if (is_wp_error($parent)) return;
    $parent_id = $parent['term_id'];
  } else {
    $parent_id = $parent->term_id;
=======
// thumbnails 
add_theme_support( 'post-thumbnails' );

//monthly artists
function create_artist_categories() {
 
  $parent = get_term_by('slug', 'artist', 'category');
  if (!$parent) {
      $parent = wp_insert_term('Artist', 'category', ['slug' => 'artist']);
      if (is_wp_error($parent)) return;
      $parent_id = $parent['term_id'];
  } else {
      $parent_id = $parent->term_id;

  }

  // child category(if not exist)
  if (!term_exists('local', 'category')) {

    wp_insert_term('Local', 'category', ['slug' => 'local', 'parent' => $parent_id]);
  }
  if (!term_exists('international', 'category')) {
    wp_insert_term('International', 'category', ['slug' => 'international', 'parent' => $parent_id]);
=======
      wp_insert_term('Local', 'category', ['slug' => 'local', 'parent' => $parent_id]);
  }
  if (!term_exists('international', 'category')) {
      wp_insert_term('International', 'category', ['slug' => 'international', 'parent' => $parent_id]);

  }
}
add_action('init', 'create_artist_categories');



// spotify API
function get_spotify_access_token() {
  $client_id = '232ae4c160d34d578b9ae995e3f92e02';
  $client_secret = '9d9bc6eb006b44948c4e948cb2e16b94';

  $response = wp_remote_post('https://accounts.spotify.com/api/token', [
    'headers' => [
      'Authorization' => 'Basic ' . base64_encode($client_id . ':' . $client_secret),
    ],
    'body' => [
      'grant_type' => 'client_credentials',
    ],
  ]);

  if (is_wp_error($response)) return false;

  $body = json_decode(wp_remote_retrieve_body($response), true);
  return $body['access_token'] ?? false;
}
=======
