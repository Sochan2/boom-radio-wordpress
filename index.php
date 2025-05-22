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
=======

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

   <!--carousel-->
<!--carousel start-->
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


  <!-- navigation button-->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>

<!--monthly artists-->

<div class=article-container>

<h2>Artist of the Month </h2>


<?php
//get the category id
$artist_category_id = 6;
//get the category id
$child_categories = get_categories([
  'child_of' => $artist_category_id,
  'hide_empty' => false,
]);

//get term id from $child_categories and make new array

$child_category_ids = wp_list_pluck($child_categories, 'term_id');

//get the post from $child_category_ids
$artist_argument = array(
  'category__in'=> $child_category_ids,
  'posts_per_page' => 2,
);
//get posting data(title, content, thumbnail, date, url and so on )
$artistQuery = new WP_Query($artist_argument);

if($artistQuery -> have_posts()){
  ?>
  <div class="container">
    <div class="row">
      <?php
      //loop each posting
  while($artistQuery->have_posts()){
    $artistQuery->the_post();
    $categories = get_the_category();
    $sub_category_name = '';
  

    foreach ($categories as $category) {
      if (in_array($category->term_id, $child_category_ids)) {
        $sub_category_name = $category->name; //put the name in sub category
    
        break;
      }
    }
?>

<div class="col-12 col-md-6 artists"> 
  <h3><?php echo esc_html($sub_category_name) ?></h3>
    <?php if (has_post_thumbnail()): ?>
    <img class="artist-card" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
  <?php endif; ?>
    <h4><?php the_title()?></h4>
    <p><?php echo get_the_excerpt(); ?> </p> <!--summary-->
 </div>
<?php
    }
?>
    </div> 
  </div> 

<?php
wp_reset_postdata();
  }

else {
  echo '<p>No artist posts found.</p>';  
}
?>
</div>

</main>
<?php get_template_part('parts/footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="wp-content/themes/boom-radio-wordpress/assets/js/main.js"></script>
</body>
</html>

