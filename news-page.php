<?php

/**
 * Template Name: Latest news page
 */

get_template_part('parts/header');
?>

<div class="container-lg py-5">
  <h1 class="latest-news-title">Latest News</h1>

  <div class="row g-4">
    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $grid_query = new WP_Query([
      'post_type' => 'update',
      'category_name' => 'News',
      'posts_per_page' => 8,
      'paged' => $paged,
    ]);

    while ($grid_query->have_posts()) : $grid_query->the_post(); ?>
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="card h-100">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail('medium', [
                'class' => 'card-img-top',
                'style' => 'border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; height: 18rem; object-fit: cover;',
              ]);
            } ?>
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

  <div class="pagination-wrapper mt-5">
    <?php
    echo paginate_links([
      'total' => $grid_query->max_num_pages,
      'current' => $paged,
      'prev_text' => '&laquo;',
      'next_text' => '&raquo;',
    ]);
    ?>
  </div>
</div>
<?php get_template_part('parts/footer'); ?>