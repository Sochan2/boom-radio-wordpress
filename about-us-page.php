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
      Boom Radio is a non-profit, student run radio station out of North Metropolitan Tafe in Leederville. We have been operating for over 10 years providing a platform for students to learn and grow within the radio industry.

      We work hard to support local businesses and up-coming artists, by using our platforms to help promote them. As well as providing a learning environment for future radio broadcasters, BOOM Radio has become a platform for graduates to build solid careers within the professional radio and media industry.

      Keeping up with the hottest in local, Australian and international music, entertainment, news, sport and current affairs, BOOM Radio caters for varying tastes and interests to ensure our audience is consistently entertained, informed and actively engaged.

      With a strong focus on local, relevant, youth content. BOOM Radio prides itself on the strong connection with the local Perth community, creating trust and a positive rapport with listeners, sponsors and all other stakeholders.

      BOOM Radio aims to build a positive community culture with a passion to deliver quality, creative content underpinned by our solid brand values and adhering to the highest of community standards team.
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

        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-6.jpg" alt="Member 3" class="member-photo" />
          <h3>April</h3>
          <p>Music Director</p>
        </div>

        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-7.jpg" alt="Member 3" class="member-photo" />
          <h3>Jordan</h3>
          <p>Podcasting Director</p>
        </div>

        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member-8.jpg" alt="Member 3" class="member-photo" />
          <h3>Jev</h3>
          <p>Director Of Team Morale and News Director</p>
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

<!-- Live Radio Player -->
<div id="live-radio-player" class="live-radio">

  <iframe src="https://tunein.com/embed/player/s195836/" width="1000" height="100"></iframe>
</div>

<!-- Floating Toggle Button -->


<button id="radio-toggle" class="radio-toggle">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/radio-icon.svg" width="80" alt="radio-icon" class="img-fluid">
</button>

<?php get_template_part('parts/footer'); ?>