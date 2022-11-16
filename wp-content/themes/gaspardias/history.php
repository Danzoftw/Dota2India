<?php
  /*
   * Template Name: History Template
  */
  get_header();
?>

<section class="history-section position-relative mt-5 pt-5 mb-5">
  <div class="container mt-5">
    <div class="row text-center">
      <div class="col-12">
        <div class="top-image w-100 mb-3 mb-sm-4 mb-md-5">
          <img src="<?php the_field('crown_image'); ?>">
        </div>
        <div class="page-title w-100 text-uppercase mb-3 mb-sm-4 mb-md-5">
          <h2 class="section-title theme color-dark"><?php the_field('page_title'); ?></h2>
        </div>
        <div class="page-content mx-auto text-left">
          <?php the_field('page_content') ?>
        </div>
        <div class="bot-image w-100 mt-3 mt-sm-4 mt-md-5">
          <img src="<?php the_field('crown_image_upside_down'); ?>">
        </div>
      </div>
    </div>
  </div>
</section>


<?php
  get_footer();
?>