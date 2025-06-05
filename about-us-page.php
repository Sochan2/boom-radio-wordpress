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
  <section class="about-section">
    <h2>Who We Are</h2>
    <p>
      We are Boom Radio in Leederville, WA. We value being local, entertaining, passionate, and current. We support local artists through interviews, social media promotion, and display. Also, we strengthen relationships with local businesses via contra-deal sponsorships, curated ads, and custom marketing campaigns.
    </p>
  </section>

  <!-- Mission Section -->
  <section class="about-section mission-section">
    <h2>Mission</h2>
    <div class="mission-content">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mission-image.png" alt="Mission Image" class="mission-img">
      <div class="mission-text">
        <p><em>"Through Boom Radio, we will push local artists and expand their opportunity to show their existence."</em></p>
        <p>We will provide a platform for underrepresented artists and foster a vibrant, inclusive space. We support the Australian music industry and aid local businesses.</p>
      </div>
    </div>
  </section>

  <!-- Member Section with Swiper Carousel -->
  <section class="about-section">
    <h2>Member</h2>

    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member1.jpg" alt="Member 1" class="member-photo" />
          <h3>John Doe</h3>
          <p>Radio Host</p>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member2.jpg" alt="Member 2" class="member-photo" />
          <h3>Jane Smith</h3>
          <p>Music Coordinator</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member3.jpg" alt="Member 3" class="member-photo" />
          <h3>Michael Brown</h3>
          <p>Marketing Manager</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member3.jpg" alt="Member 3" class="member-photo" />
          <h3>Michael Brown</h3>
          <p>Marketing Manager</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member3.jpg" alt="Member 3" class="member-photo" />
          <h3>Michael Brown</h3>
          <p>Marketing Manager</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide member-card">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/member3.jpg" alt="Member 3" class="member-photo" />
          <h3>Michael Brown</h3>
          <p>Marketing Manager</p>
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.mySwiper', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  });
</script>

<?php get_template_part('parts/footer'); ?>
