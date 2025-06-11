<?php

/**
 * Template Name: About Us Page
 */
get_template_part('parts/header');
?>

<main class="about-us-page">

  <!-- Hero Section -->
  <div class="about-hero-container">
    <div class="hero-img-wrapper">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-us-image.png" alt="About Us Hero Image" class="about-us-hero-img">
    </div>
  </div>

  <!-- Who We Are Section -->
  <section class="about-section-text">
    <h2>Who We Are</h2>
    <p>
      We are Boom Radio in Leederville, WA. We value being local, entertaining, passionate, and current. We support local artists through interviews, social media promotion, and display. Also, we strengthen relationships with local businesses via contra-deal sponsorships, curated ads, and custom marketing campaigns.
    </p>
  </section>

  <!-- Mission Section -->
  <section class="about-section mission-section">
    <h2>Mission</h2>
    <div class="mission-content">
      
    
    <div class="mission-item">
      <div class="image-container">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/talent-people.png" alt="talent person image" class="mission-image">
      </div>
      <div class="mission-text">
        <p><em>"Through Boom Radio, we will push local artists and expand their opportunity to show their existence."</em></p>
      </div>
    </div>

    <div class="mission-item">
      <div class="image-container">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/support.png" alt="support people picture" class="mission-image">
      </div>
      <div class="mission-text">
        <p><em>We will provide a platform for underrepresented artists and foster a vibrant, inclusive space. We support the Australian music industry and aid local businesses.</em></p>
      </div>
    </div>

    <div class="mission-item">
      <div class="image-container">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/business.png" alt="business support picture" class="mission-image">
      </div>
      <div class="mission-text">
        <p><em>"We will support the Australian music industry and aid local businesses."</em></p>
      </div>
    </div>
    </div>
  </section>

  <!-- Member Section with Swiper Carousel -->
  <section class="about-section">
    <h2>Our team</h2>

    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-1.jpg" alt="Member 1" class="member-photo" />
          <h3>Rhylan</h3>
          <p>Promotions Manag</p>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-2.jpg" alt="Member 2" class="member-photo" />
          <h3>Chris</h3>
          <p>Operations Manager</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-3.jpg" alt="Member 3" class="member-photo" />
          <h3>Asha</h3>
          <p>Digital Director</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-4.jpg" alt="Member 3" class="member-photo" />
          <h3>George</h3>
          <p>Assistant News Director and Podcasting Director</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-5.jpg" alt="Member 3" class="member-photo" />
          <h3>Angus</h3>
          <p>Podcasting and Website Assistant</p>
        </div>

      </div>

      <!-- Pagination -->
      <div class="swiper-pagination"></div>

      <!-- Navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>

  </section>

</main>

<?php get_template_part('parts/footer'); ?>