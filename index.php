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
<div id="multiItemCarousel" class="carousel slide">
  <div class="carousel-inner">
    <?php
    $args = [
    'category_name' => 'event', 
    'numberposts' => 8
  ];

    $custom_events = get_posts($args);
    foreach ($custom_events as $index => $customevent):
     
      if ($index % 4 === 0): ?>
        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
          <div class="container-fluid px-0">
            <div class="row justify-content-center gx-3 no-wrap">
      <?php endif; ?>

      <div class="col-10 col-sm-6 col-md-4">
     
          <?php if (has_post_thumbnail($customevent->ID)): ?>
            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url($customevent->ID, 'full'); ?>" alt="<?php echo esc_attr(get_the_title($customevent->ID)); ?>">
          <?php endif; ?>
         
      </div>

      <?php
    
      if (($index + 1) % 4 === 0 || $index + 1 === count($custom_events)): ?>
            </div>
          </div>
        </div>
      <?php endif;
    endforeach;
    ?>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#multiItemCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


<script src="wp-content/themes/boom-radio-wordpress/js/bootstrap.bundle.min.js"></script>
</body>
</html>
-