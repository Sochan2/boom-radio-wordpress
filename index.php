<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php get_header(); ?>


<!--carousel-->
<!--carousel start-->
<h2> Upcoming Events & Giveaways</h2>

<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php
    $custom_events = get_posts([
      'category_name' => 'event',
      'numberposts' => 10
    ]);

    foreach ($custom_events as $event): ?>
      <div class="swiper-slide">
        <div class="translate">
          <?php if (has_post_thumbnail($event->ID)): ?>
            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url($event->ID,); ?>" alt="<?php echo esc_attr(get_the_title($event->ID)); ?>">
          <?php endif; ?>
        </div>
       
      </div>
    <?php endforeach; ?>
  </div>


  <!-- ナビゲーションボタン -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="wp-content/themes/boom-radio-wordpress/assets/js/main.js"></script>


<!--<script src="wp-content/themes/boom-radio-wordpress/js/bootstrap.bundle.min.js"></script>-->
</body>
</html>
-