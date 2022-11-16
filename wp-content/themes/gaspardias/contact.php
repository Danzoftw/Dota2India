<?php
/*

 * Template Name: Contact Template

*/
get_header();
?>

<section class="contact_section mt-5 pt-5 mb-5 pb-4">
  <div class="outer_container py-5">
    <div class="mt-5 pt-5">
      <div class="container">
        <div class="row align-items-end">
        <div class="col-md-6 order-md-2">
          <div class="form_content pl-md-5">
            <div class="title mb-5">
              <?php the_field('title_contact'); ?>
            </div>
            <div class="content mb-5">
              <?php the_field('content_contact'); ?>
            </div>
          </div>
        </div>
          <div class="col-md-6">
            <div class="form_container">
              <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 3, 'title' => false, 'description' => false ) ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>
