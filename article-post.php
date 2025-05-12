<?php
/*
Template Name: Article Post Layout
*/
get_template_part('parts/header'); ?>

<main class="container page-container">
  <article>
    <div class="article-text">
      <!-- Featured image -->
      <div class="image-wrapper">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail('full', ['class' => 'img-fluid article-image', 'alt' => 'Featured image']);
        } else {
          echo '<img src="' . get_template_directory_uri() . '/assets/img/hero-image.png" alt="Featured image" class="img-fluid article-image" />';
        }
        ?>
      </div>

      <!-- Text content -->
      <p class="mb-1">
        <?php
        if (is_singular('post')) {
          the_category(', ');
        }
        ?>
      </p>
      <h1 class="article-title"><?php the_title(); ?></h1>
    

      <div class="post-content">
        <?php
        while (have_posts()) : the_post();
          the_content();
        endwhile;
        ?>
      </div>
    </div>
  </article>
</main>

<?php get_template_part('parts/footer'); ?>
