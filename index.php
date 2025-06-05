<?php get_template_part('parts/header'); ?>

<main>
  <div class="container">


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



    <!-- lATEST EPISODES -->
    <h1 class="latest-episodes-title">Latest Episodes</h1>

    <div class="swiper latestEpisodesSwiper">
      <div class="swiper-wrapper">
        <?php
        $access_token = get_spotify_access_token();
        $show_id = '1q2IxKPA9EeoeRQkIqK5Vv';

        if ($access_token && $show_id) {
          $response = wp_remote_get("https://api.spotify.com/v1/shows/{$show_id}/episodes?market=US&limit=6", [
            'headers' => [
              'Authorization' => 'Bearer ' . $access_token,
            ],
          ]);

          if (!is_wp_error($response)) {
            $episodes = json_decode(wp_remote_retrieve_body($response), true)['items'];

            foreach ($episodes as $episode): ?>
              <div class="swiper-slide">
                <div class="podcast-flex">
                  <iframe style="border-radius:12px"
                    src="https://open.spotify.com/embed/episode/<?php echo esc_attr($episode['id']); ?>"
                    width="400" height="300" frameborder="0" allowfullscreen
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
        }
        ?>
      </div>

      <!-- Add navigation -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>



    <!-- Upcoming giveaways and events section -->

    <h1 class="slider-title">Upcoming Giveaways & Events</h1>
    <div class="swiper mySwiper">
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
            <div class="">
              <?php if (has_post_thumbnail()): ?>
                 <h5 class="artist-type text-center"><?php echo $type; ?></h5>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
              <?php endif; ?>
              <div class="card-body">
                <h3 class="card-title"><?php the_title(); ?></h3>
                <p class="card-text"><?php echo wp_trim_words(get_the_content(), 40); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
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
            <div class="slide-inner">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('medium', ['style' => 'border-radius: 20px; width: 19rem; height: 23rem;']);
                } ?>
                <h3 class="slide-title" style="font-weight: 700;"><?php the_title(); ?></h3>
                <p class="slide-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
                <span class="read-more-btn">Read On</span>
              </a>
            </div>
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
      spaceBetween: 100,
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

  // Swiper for latest episodes
  document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.latestEpisodesSwiper', {
      loop: true,
      spaceBetween: 20,
      slidesPerView: 3,
      navigation: {
        nextEl: '.latestEpisodesSwiper .swiper-button-next',
        prevEl: '.latestEpisodesSwiper .swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  });
</script>

<?php get_template_part('parts/footer'); ?>