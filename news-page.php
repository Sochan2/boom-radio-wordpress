<?php
/**
 * Template Name: Latest news page
 */

get_template_part('parts/header');
?>

<div class="container py-5">
  <h1 class="slider-title mb-4">Latest News</h1>

  <div class="row">
    <?php
    $grid_query = new WP_Query([
      'post_type' => 'update',
      'category_name' => 'News',
      'posts_per_page' => 6,
    ]);

    while ($grid_query->have_posts()) : $grid_query->the_post(); ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) {
              the_post_thumbnail('medium', ['class' => 'card-img-top', 'style' => 'border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; height: 18rem; object-fit: cover;']);
            } ?>
          </a>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text text-muted"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
            <div class="mt-auto">
              <a href="<?php the_permalink(); ?>" class="read-more-btn">Read On</a>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
  </div>
</div>

<style>
  .read-more-btn {
    display: inline-block;
    background: black;
    color: white;
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
  }

  .read-more-btn:hover {
    background: #333;
    color: white;
  }
</style>

<?php get_template_part('parts/footer'); ?>
