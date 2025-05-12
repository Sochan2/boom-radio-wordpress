<?php get_template_part('parts/header'); ?>

<main>
  <div class="container">
    <div class="row hero-container position-relative">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-image.jpg" alt="hero-image" class="img-fluid hero-img">

      <div class="hero-text col-12 col-md-6">
        <h2>Now playing:</h2>
        <h1>Boom’s Big Breakfast</h1>
        <p>On Every Morning from 7–10am, excludes weekends.</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/play-button.svg" alt="play button icon" class="play-button-icon">
      </div>
    </div>
    <h2 class="slider-title"> Upcoming Events & Giveaways </h2>

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
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>

</main>

<?php get_template_part('parts/footer'); ?>