<?php get_template_part('parts/header'); ?>

<main>
  <div class="container">

    <!-- Hero Section -->
    <div class="row hero-container position-relative">
      <div class="hero-img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boom-banner.png" alt="hero-image" class="hero-img">
      </div>

      <div class="welcome-text col-12 col-md-3">
        <h2 class="bold">Welcome to Boom Radio</h2>
        <p>We have been operating for over 10 years providing a platform for students to learn and grow within the radio industry.</p>
        <?php
        $about_page = get_page_by_path('about');
        if ($about_page) {
          $url = get_permalink($about_page->ID);
        ?>
          <p>Learn more <a href="<?php echo esc_url($url); ?>">About Us</a></p>
        <?php } ?>

      </div>
      <div class="radio-text col-12 col-md-4">
        <h5><?php the_field('now_playing_title'); ?></h5>
        <h2 id="show-title"></h2>
        <h3 id="show-host"></h3>
        <p id="show-description"></p>
        <div class="listen-live-button">
          <p class="listen">Listen Live</p>
          <button class="play-button">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/play-icon.svg" alt="play-button" class="img-fluid">
          </button>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/listening-icon-white.png" alt="listen-symbol" class="listen-symbol img-fluid">
      </div>
      <div class="explore-text col-12 col-md-3">
        <h2 class="bold">Our Latest Content</h2>
        <p>Explore the latest news, events, giveaways, and Artists of the Month by scrolling down!</p>
        <div class="explore-arrow">
          <p class="bold">Scroll Down</p>
          <a href="#latest-episodes">&dArr;</a>
        </div>

      </div>
    </div>
  </div>



  <!-- Latest Episodes -->
  <h1 class="latest-episodes-title" id="latest-episodes">Latest Episodes</h1>
  <div class="swiper-wrapper latestEpisodesWrapper">
    <div class="swiper latestEpisodesSwiper" data-space="300">
      <div class="swiper-wrapper">
        <?php
        $access_token = get_spotify_access_token();
        $show_id = '1q2IxKPA9EeoeRQkIqK5Vv';
        if ($access_token && $show_id) {
          $response = wp_remote_get("https://api.spotify.com/v1/shows/{$show_id}/episodes?market=US&limit=6", [
            'headers' => ['Authorization' => 'Bearer ' . $access_token],
          ]);
          if (!is_wp_error($response)) {
            $episodes = json_decode(wp_remote_retrieve_body($response), true)['items'];
            foreach ($episodes as $episode): ?>
              <div class="swiper-slide">
                <div class="podcast-flex">
                  <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/episode/<?php echo esc_attr($episode['id']); ?>"
                    width="350" height="300" allowfullscreen
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy">
                  </iframe>
                </div>
              </div>
        <?php endforeach;
          } else {
            echo '<p>Error fetching episodes.</p>';
          }
        } else {
          echo '<p>Spotify access token failed.</p>';
        } ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>

  <!-- Events & Giveaways -->
  <h1 class="slider-title">Upcoming Giveaways & Events</h1>
  <div class="swiper-wrapper eventsWrapper">
    <div class="swiper eventsSwiper" data-space="100">
      <div class="swiper-wrapper">
        <?php
        $carousel_query = new WP_Query([
          'post_type' => 'update',
          'category_name' => 'Events, Giveaways',
          'posts_per_page' => 5,
        ]);
        while ($carousel_query->have_posts()) : $carousel_query->the_post(); ?>
          <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>">
              <?php
              // Manually get image without auto-generated sizes
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'medium');
              if ($thumbnail_url) : ?>
                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" style="border-radius: 20px; width: 18rem; height: 18rem;" />
              <?php endif; ?>
            </a>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>


  <!-- Artists of the month -->

  <div class="container artist-container py-5">
    <h2 class="artist-container-heading text-center mb-4">Artist of the Month</h2>
    <div class="row g-4">
      <?php
      $artist_query = new WP_Query([
        'post_type' => 'artist_of_the_month',
        'posts_per_page' => 2,
        'tax_query' => [[
          'taxonomy' => 'artist_type',
          'field'    => 'slug',
          'terms'    => ['local', 'international'],
        ]]
      ]);

      while ($artist_query->have_posts()) : $artist_query->the_post();
        $terms = get_the_terms(get_the_ID(), 'artist_type');
        $type = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
      ?>
        <div class="col-md-5">
          <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
            <div class="">
              <?php if (has_post_thumbnail()): ?>
                <h5 class="artist-type text-center"><?php echo esc_html($type); ?></h5>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="artist-thumbnail" alt="<?php the_title(); ?>">
              <?php endif; ?>
              <div class="card-body">
                <h3 class="card-title"><?php the_title(); ?></h3>
                <p class="card-text"><?php echo wp_trim_words(get_the_content(), 40); ?></p>
              </div>
            </div>
          </a>
        </div>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
  </div>

  <!-- Latest News -->
  <h1 class="slider-title">Latest News</h1>
  <div class="swiper-wrapper newsWrapper">
    <div class="swiper newsSwiper" data-space="100">
      <div class="swiper-wrapper">
        <?php
        $carousel_query = new WP_Query([
          'post_type' => 'update',
          'category_name' => 'News',
          'posts_per_page' => 5,
        ]);
        while ($carousel_query->have_posts()) : $carousel_query->the_post(); ?>
          <div class="swiper-slide">
            <div class="slide-inner">
              <a href="<?php the_permalink(); ?>">
                <?php
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'medium');
                if ($thumbnail_url) : ?>
                  <img
                    src="<?php echo esc_url($thumbnail_url); ?>"
                    alt="<?php the_title_attribute(); ?>"
                    style="border-radius: 20px; width: 19rem; height: 23rem; object-fit: cover;" />
                <?php endif; ?>

                <h3 class="slide-title" style="font-weight: 700;"><?php the_title(); ?></h3>
                <p class="slide-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
                <span class="read-more-btn">Read On</span>
              </a>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
      </div>

      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
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