<?php
function my_custom_enqueue_scripts()
{
  // Add Roboto and Archivo Black fonts
  wp_enqueue_style(
    'google-fonts',
    'https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700&family=Archivo+Black&display=swap',
    false
  );

  wp_enqueue_style(
    'bootstrap-css',
    get_template_directory_uri() . '/css/style.css',
    [],
    filemtime(get_template_directory() . '/css/style.css')
  );

  wp_enqueue_script(
    'custom-js',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    filemtime(get_template_directory() . '/assets/js/main.js'),
    true
  );
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
function get_spotify_access_token()
{
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




//Artist of the month post type 
function register_artist_of_the_month_cpt()
{
  register_post_type('artist_of_the_month', [
    'labels' => [
      'name' => 'Artists of the Month',
      'singular_name' => 'Artist of the Month',
    ],
    'public' => true,
    'has_archive' => false,
    'menu_icon' => 'dashicons-star-filled',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'artist-of-the-month'],
    'show_in_rest' => true,
  ]);

  // Register taxonomy for category (Local/International)
  register_taxonomy('artist_type', 'artist_of_the_month', [
    'labels' => [
      'name' => 'Artist Type',
      'singular_name' => 'Artist Type',
    ],
    'hierarchical' => true,
    'public' => true,
    'rewrite' => ['slug' => 'artist-type'],
    'show_in_rest' => true,
  ]);
}
add_action('init', 'register_artist_of_the_month_cpt');

// Updates post type
function register_update_post_type()
{
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

function add_my_menu()
{
  register_nav_menus(array(
    'main-menu' => 'BoomRadio Menu',
  ));
}
add_action('after_setup_theme', 'add_my_menu');

//custom icon

function add_menu_icons($title, $item, $args, $depth)
{

  if ($args->theme_location !== 'main-menu') {
    return $title;
  }


  $icon_map = [
    'home-icon'      => 'home-icon.svg',
    'podcasts-icon'  => 'podcast-icon.svg',
    'community-icon' => 'community-icon.svg',
  ];

  // Check for specific menu classes
  $classes = $item->classes;
  $icon_file = '';

  foreach ($classes as $class) {
    if (array_key_exists($class, $icon_map)) {
      $icon_file = $icon_map[$class];
      break;
    }
  }

  if (!$icon_file) {
    switch (strtolower(trim($title))) {
      case 'home':
        $icon_file = 'home-icon.svg';
        break;
      case 'podcasts':
        $icon_file = 'podcast-icon.svg';
        break;
      case 'community':
        $icon_file = 'community-icon.svg';
        break;
    }
  }


  if (!$icon_file) return $title;

  $icon_url = esc_url(get_template_directory_uri() . '/assets/img/' . $icon_file);
  $icon_img = '<img class="menu-icon" src="' . $icon_url . '" alt="" aria-hidden="true">';

  return $icon_img . '<span class="menu-label">' . esc_html($title) . '</span>';
}
add_filter('nav_menu_item_title', 'add_menu_icons', 10, 4);


//Custom search query
function customize_search_results($query)
{
  if ($query->is_search() && $query->is_main_query()) {
    $query->set('post_type', array('update', 'artist_of_the_month', 'post'));
  }
}
add_action('pre_get_posts', 'customize_search_results');

//for validation

function remove_speculationrules_script()
{
  remove_action('wp_head', 'wp_speculation_rules', 20);
}
add_action('wp_loaded', 'remove_speculationrules_script');

