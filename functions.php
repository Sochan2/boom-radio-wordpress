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
  }

  // child category(if not exist)
  if (!term_exists('local', 'category')) {
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

// Updates post type
function register_update_post_type() {
  register_post_type('update', [
    'labels' => [
      'name' => 'Updates',
      'singular_name' => 'Update',
      'add_new_item' => 'Add New Update',
      'edit_item' => 'Edit Update',
      'new_item' => 'New Update',
      'view_item' => 'View Update',
      'search_items' => 'Search Updates',
      'not_found' => 'No Updates found',
      'not_found_in_trash' => 'No Updates found in Trash',
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'updates'],
    'menu_position' => 5,
    'menu_icon' => 'dashicons-megaphone', 
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'taxonomies' => ['category'], 
    'show_in_rest' => true,
  ]);
}
add_action('init', 'register_update_post_type');


//Menu
function add_my_menu() {
  register_nav_menus(array(
      'main-menu' => 'BoomRadio Menu',
  ));
}
add_action('after_setup_theme', 'add_my_menu');

//custom icon

function add_menu_icons($menu_title, $menu_item, $menu_args) {

  if ($menu_args->theme_location == 'main-menu') {

      switch (trim($menu_title)) {
          case 'Home':
              $menu_icon = '<img src="' . get_template_directory_uri() . '/assets/img/home-icon.svg" alt="home-icon" width="20" style="vertical-align:middle; margin-right:5px;">';
              $menu_title = $menu_icon . $menu_title;
              break;
          case 'podcasts':
              $menu_icon = '<img src="' . get_template_directory_uri() . '/assets/img/podcast-icon.svg" alt="podcast-icon" width="20" style="vertical-align:middle; margin-right:5px;">';
              $menu_title = $menu_icon . $menu_title;
              break;
          case 'Community':
              $menu_icon = '<img src="' . get_template_directory_uri() . '/assets/img/community-icon.svg" alt="community-icon" width="20" style="vertical-align:middle; margin-right:5px;">';
              $menu_title = $menu_icon . $menu_title;
              break;
      }
  }
  return $menu_title;
}
add_filter('nav_menu_item_title', 'add_menu_icons', 10, 4);
