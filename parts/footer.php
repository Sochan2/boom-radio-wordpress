<footer class="footer py-15 text-center">
  <div class="container">
    <div class="flex-container">
      <div class="sub-container-1">
        <div class="menu-container">
          <h5>MENU</h5>
          <ul class="footer-menu">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'main-menu',
              'container' => false,
              'items_wrap' => '%3$s' // just the <li> elements
            ));
            ?>
          </ul>
        </div>

        <div class="company-container">
          <h5>BOOM RADIO</h5>
          <ul class="list-inline">
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>

      <div class="sub-container-2">
        <div>
          <h5>JOIN OUR NEWSLETTER</h5>
          <div class="tnp tnp-subscription">
            <form method="post" action="http://localhost/wordpress/wp-admin/admin-ajax.php?action=tnp&na=s">
              <div class="container d-flex gap-3">
                <div class="tnp-field tnp-field-email">
                  <input class="tnp-email" type="email" name="ne" id="tnp-1" placeholder="youremail@example.com" required>
                </div>
                <div class="tnp-field tnp-field-button">
                  <input class="tnp-submit" type="submit" value="Subscribe" style="background-color:#fe6a34; padding: 1rem;">
                </div>
              </div>
            </form>
          </div>

          <div class="sub-container-3">
            <div class="sponsor-container">
              <h5>SPONSORS</h5>
              <div class="sponsor">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tafe-sponsor-logo.svg" alt="TAFE Logo" class="sponsor-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kayak-sponsor-logo.svg" alt="Kayak Logo" class="sponsor-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kyilla-sponsor-logo.svg" alt="Kyilla Logo" class="sponsor-logo">
              </div>
            </div>

            <div class="socialMedia-container">
              <h6>FOLLOW US</h6>
              <a href="#" class="text-dark mx-2" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/boomradioau/" class="text-dark mx-2" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://www.facebook.com/boomradioau/" class="text-dark mx-2" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
              <a href="http://tiktok.com/@boomradioau" class="text-dark mx-2" aria-label="Tiktok">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tiktok.svg" alt="Tiktok Logo">
              </a>
              <a href="https://au.linkedin.com/company/boom-radio" class="text-dark mx-2" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <p class="copyright">© <?php echo date("Y"); ?> Boom Radio. All rights reserved.</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>