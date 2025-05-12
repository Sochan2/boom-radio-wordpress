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
  </div>
  
</main>


<?php get_template_part('parts/footer'); ?>