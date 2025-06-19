<?php

/**
 * Template Name: Giveaway page
 */

get_template_part('parts/header');
?>

<main>
  <h1 class="latest-news-title">Giveaways</h1>

  <div class="row">
    <?php
    $grid_query = new WP_Query([
      'post_type' => 'update',
      'category_name' => 'Giveaways',
      'posts_per_page' => 8,
    ]);

    while ($grid_query->have_posts()) : $grid_query->the_post(); ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <a href="<?php the_permalink(); ?>">
            <?php
      
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'medium');
            if ($thumbnail_url) : ?>
              <img
                src="<?php echo esc_url($thumbnail_url); ?>"
                alt="<?php the_title_attribute(); ?>"
                class="card-img-top"
                style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; height: 18rem; object-fit: cover;" />
            <?php endif; ?>
          </a>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text text-muted"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
            <div class="mt-auto">
              <a href="<?php the_permalink(); ?>" class="read-more-btn">Read On</a>
            </div>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php the_time('F j, Y'); ?>
          </div>
        </div>
      </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
  </div>
</main>
<!-- Live Radio Player -->
<div id="live-radio-player" class="live-radio">

  <iframe src="https://tunein.com/embed/player/s195836/" width="1000" height="100"></iframe>
</div>

<!-- Floating Toggle Button -->


<button id="radio-toggle" class="radio-toggle">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/radio-icon.svg" width="80" alt="radio-icon" class="img-fluid">
</button>
<?php get_template_part('parts/footer'); ?>