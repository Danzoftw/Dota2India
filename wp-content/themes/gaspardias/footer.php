    <footer class="footer-section position-relative py-0 py-sm-4 py-md-5 theme bg-semi-black mh-98vh d-flex align-items-center" style="background-image: url('<?php echo get_theme_mod('footer_bg'); ?>')">
      <div class="container py-5 my-5">
        <div class="row">
          <div class="newsletter-subscribe col-12">
            <h2 class="section-title theme color-white">Get updated</h2>
            <p class="theme color-white">Subscribe to our newsletters and stay updated about all the happenings at Clube Tennis de Gaspar Dias.</p>
            <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 2, 'title' => false, 'description' => false ) ); ?>
          </div>
          <div class="col-12 footer-info theme color-white mx-auto">
            <div class="row">
              <div class="col-sm-6 float-left">
                <div class="row">
                  <div class="col-sm-5 float-left">
                    <?php dynamic_sidebar('ADDRESS'); ?>
                  </div>
                  <div class="col-sm-7 float-left">
                    <?php dynamic_sidebar('EMAIL'); ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 float-left">
                <div class="row">
                  <div class="col-sm-6 float-left">
                    <?php dynamic_sidebar('PHONE'); ?>
                  </div>
                  <div class="col-sm-6 float-left">
                    <?php dynamic_sidebar('WEBSITE'); ?>
                  </div>
                  <div class="col-sm-12 float-left mt-2 mt-sm-4">
                    <p>© Copyright 2018 | All Rights Reserved | Designed & Developed by <a href="https://www.iodroplet.com/" target="_blank" class="montserrat-font theme color-white decoration-none">io<span class="theme color-droplet-blue">Droplet</span></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  	<?php wp_footer(); ?>
  </body>
</html>
