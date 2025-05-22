<?php
/*
 * Template: Single Post
 */
get_template_part('parts/header'); ?>

<div class="container page-container">
  <article>
    <div class="article-text">
      <div class="image-wrapper">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail('full', ['class' => 'img-fluid article-image', 'alt' => 'Featured image', 'style' => 'width: 30rem; height: 38rem; border-radius: 20px;']);
        }
        ?>
      </div>

      
      <h1 class="article-title"><?php the_title(); ?></h1>

      <div class="post-content">
        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
      </div>
    </div>
  </article>
</div>

<?php get_template_part('parts/footer'); ?>
