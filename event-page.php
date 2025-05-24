<?php

/**
 * Template Name: Community Page
 */

get_template_part('parts/header');
?>
<div class="community-container container py-10">

    <!-- Upcoming events section -->

    <div class="upcoming-events-slider">
        <h1 class="slider-title">Latest News</h1>
        <?php echo do_shortcode('[metaslider id="153"]'); ?>
    </div>


    <!-- News section -->
    <div class="news-slider">
        <h1 class="slider-title">Latest News</h1>
        <?php echo do_shortcode('[metaslider id="186"]'); ?>
    </div>
</div>

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