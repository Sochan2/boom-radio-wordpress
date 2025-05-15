<?php get_template_part('parts/header'); ?>

<main>
  <div class="container">

    <!-- Hero Section with ACF Fields (No loop needed) -->
    <div class="row hero-container position-relative">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-image.jpg" alt="hero-image" class="img-fluid hero-img">

      <div class="hero-text col-12 col-md-6">
        <h2><?php the_field('now_playing_title'); ?></h2>
        <h1><?php the_field('show_name'); ?></h1>
        <p><?php the_field('show_description'); ?></p>
        <button class="play-button">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/play-icon.svg" alt="play-button" class="img-fluid">
        </button>
      </div>
    </div>

    <!-- Upcoming giveaways and events section -->

    <h1 class="slider-title">Upcoming Giveaways & Events</h1>

    <div class="upcoming-events-slider">
      <?php echo do_shortcode('[metaslider id="153"]'); ?>
    </div>

    <!-- Monthly Artists Section -->
    <h1 class="slider-title">Artist of the Month</h1>
    <div class="article-container">

      <div class="container artist-container">
        <div class="artist-container">

          <!-- Artist 1 -->
          <div class="col-12 col-md-6 artists">
            <h3><?php the_field('artist_1_type'); ?></h3>
            <?php
            $image1 = get_field('artist_1_image');
            if ($image1): ?>
              <img class="artist-card" src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>">
            <?php endif; ?>
            <h4><?php the_field('artist_1_name'); ?></h4>
            <p><?php the_field('artist_1_description'); ?></p>
          </div>

          <!-- Artist 2 -->
          <div class="col-12 col-md-6 artists">
            <h3><?php the_field('artist_2_type'); ?></h3>
            <?php
            $image2 = get_field('artist_2_image');
            if ($image2): ?>
              <img class="artist-card" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
            <?php endif; ?>
            <h4><?php the_field('artist_2_name'); ?></h4>
            <p><?php the_field('artist_2_description'); ?></p>
          </div>

        </div>
      </div>
    </div>

    <!-- News section -->
    <div class="news-slider">
      <h1 class="slider-title">Latest News</h1>
      <?php echo do_shortcode('[metaslider id="186"]'); ?>
    </div>

  </div>
</main>

<!-- Live Radio Player -->
<div id="live-radio-player" class="live-radio">
  <iframe src="https://tunein.com/embed/player/s195836/" width="100%" height="100" scrolling="no" frameborder="no"></iframe>
</div>

<!-- Floating Toggle Button -->
<button id="radio-toggle" class="radio-toggle">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/radio-icon.svg" width="80" alt="radio-icon" class="img-fluid">
</button>

<!-- Script for radio player -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const player = document.getElementById("live-radio-player");
    const toggleBtn = document.getElementById("radio-toggle");
    const playButton = document.querySelector(".play-button");

    function togglePlayer() {
      if (player) {
        player.classList.toggle("visible");
      }
      if (toggleBtn) {
        toggleBtn.classList.toggle("radio-active");
      }
    }

    if (toggleBtn) {
      toggleBtn.addEventListener("click", togglePlayer);
    }

    if (playButton) {
      playButton.addEventListener("click", togglePlayer);
    }
  });
</script>

<?php get_template_part('parts/footer'); ?>