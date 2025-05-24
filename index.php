<?php get_template_part('parts/header'); ?>

<main>
  <div class="container">
  

    <!-- Hero Section with ACF Fields (No loop needed) -->
    <div class="row hero-container position-relative">
      <div class="hero-img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-image.png" alt="hero-image" class="img-fluid hero-img">
      </div>

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
  

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php
        $carousel_query = new WP_Query([
          'post_type' => 'update', // or your custom post type
          'category_name' => 'Updates & Giveaways',
          'posts_per_page' => 5,
        ]);

        while ($carousel_query->have_posts()) : $carousel_query->the_post(); ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium', ['style' => 'border-radius: 20px; width: 18rem; height: 18rem;']);
              } ?>
              <!-- <h3><?php the_title(); ?></h3> -->
            </a>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>

      <!-- Add navigation (optional) -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!-- <div class="swiper-pagination"></div> -->
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

    <h1 class="slider-title">Latest News</h1>
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php
        $carousel_query = new WP_Query([
          'post_type' => 'update', // or your custom post type
          'category_name' => 'News',
          'posts_per_page' => 5,
        ]);

        while ($carousel_query->have_posts()) : $carousel_query->the_post(); ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail('medium', ['style' => 'border-radius: 20px; width: 19rem; height: 22rem;']);
              } ?>
              <h3 style="padding-top: 1rem; color: black; text-decoration: none;"><?php the_title(); ?></h3>
              <p style="font-size: 0.9rem; color: #555; text-decoration: none;">
                <?php echo wp_trim_words(get_the_excerpt(), 50, '...'); ?>
              </p>
              <a href="<?php the_permalink(); ?>" class="read-more-btn">Read On</a>
            </a>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>

      <!-- Add navigation (optional) -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <!-- <div class="swiper-pagination"></div> -->
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

  document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.mySwiper', {
      loop: true,
      spaceBetween: 20,
      slidesPerView: 6,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 4,
        }
      }
    });
  });
</script>

<?php get_template_part('parts/footer'); ?>