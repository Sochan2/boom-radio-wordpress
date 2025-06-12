<footer class="footer py-15 text-center">
  <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boom-logo.svg" alt="Logo" height="50" class="nav-logo"> -->
  <div class="container">
    <div class="flex-container">
      <div class="sub-container-1">
        <div class="menu-container">
        <h5>MENU</h5>
        <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container_class' => 'custom-menu-class'
                ));
                ?>
        <!--
          <ul class="list-inline">
          
            <li>Home</li>
            <li>Latest News</li>
            <li>Events</li>
            <li>Giveaways</li>
            <li>Contact</li>
          </ul>

-->
        </div>

        <div class="company-container">
        <h5>BOOM RADIO</h5>

          <ul class="list-inline">
            <li>Privacy Policy</li>
            <li>Terms & Conditions</li>
          </ul>
        </div>

      </div>

      <div class="sub-container-2">
        <div>
          <h5>JOIN OUR NEWSLETTER</h5>
          <div class="tnp tnp-subscription ">
            <form method="post" action="http://localhost/wordpress/wp-admin/admin-ajax.php?action=tnp&na=s">
              <div class="container" style="display: flex; gap: 1rem;">
                <div class="tnp-field tnp-field-email">
                  <input class="tnp-email" type="email" name="ne" id="tnp-1" value="" placeholder="youremail@example.com" required>
                </div>
                <div class="tnp-field tnp-field-button" style="text-align: left">
                  <input class="tnp-submit" type="submit" value="Subscribe" style="background-color:#fe6a34; padding: 1rem;">
                </div>

              </div>
            </form>
          </div>

          


          <div class="sub-container-3">

          <div class="sponsor-container">
          <h5>SPONSORS</h5>
          <div class="sponsor">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tafe-sponsor-logo.svg" alt="Logo" class="sponsor-logo"> 
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kayak-sponsor-logo.svg" alt="Logo" class="sponsor-logo"> 
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kyilla-sponsor-logo.svg" alt="Logo" class="sponsor-logo"> 
          </div>
          </div>
           
            <div class="socialMedia-container">
              <h6>FOLLOW US</h6>
              <a href="#" class="text-dark mx-2"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/boomradioau/" class="text-dark mx-2"><i class="bi bi-instagram"></i></a>
              <a href="https://www.facebook.com/boomradioau/" class="text-dark mx-2"><i class="bi bi-twitter-x"></i></a>
              <a href="http://tiktok.com/@boomradioau" class="text-dark mx-2"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/tiktok.svg" alt="Tiktok"></a>
              <a href="https://au.linkedin.com/company/boom-radio" class="text-dark mx-2"><i class="bi bi-linkedin"></i></a>

            </div>

          </div>


        </div>

      </div>

    </div>

    <!-- Copyright -->
    <p class="copyright">© <?php echo date("Y"); ?> Boom Radio. All rights reserved.</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>


</html>