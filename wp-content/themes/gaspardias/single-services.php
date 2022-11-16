<?php
	get_header();

	// Start the loop.
	while ( have_posts() ) :
		the_post();
?>

<?php
$rows = get_field('image_gallery' ); // get all the rows
$first_row = $rows[0]; // get the first row
$first_row_image = $first_row['image_services' ];

?>

<section class="services_banner pt-5 position-relative" style="background-image: url('<?php echo $first_row_image; ?>')">
  <div class="container">
    <div class="spacer"></div>
    <div class="section-title position-relative text-center text-uppercase">
      <?php the_title(); ?>
    </div>
    <div class="spacer"></div>
  </div>
</section>

<section class="the_content">
  <div class="container">
    <div class="content_box text-center mt-5">
      <?php the_content(); ?>
    </div>

    <div class="gallery_section py-5">
      <div class="icon_container text-center">
        <img src="<?php the_field('crown_image', 72); ?>" class="img-fluid" />
      </div>

      <div class="gallery_slider_top">
        <div class="gallery_slider_for">
          <?php
            if( have_rows('image_gallery') ):
              while ( have_rows('image_gallery') ) : the_row();
                ?>
                <div class="image_outer position-relative my-4">
                  <img src="<?php the_sub_field('image_services'); ?>" class="img-fluid" />
									<?php $value = get_sub_field( "image_caption" );

									if( $value ) { ?>
										<div class="image_caption position-absolute py-2 px-4 w-100 text-right">
											<?php the_sub_field('image_caption') ?>
										</div>
									<?php } else { ?>

									<?php } ?>
                </div>
                <?php
              endwhile;
            endif;
          ?>
        </div>
      </div>

      <div class="icon_container text-center">
        <img src="<?php the_field('crown_image_upside_down', 72); ?>" class="img-fluid" />
      </div>

      <div class="gallery_slider_bottom mx-auto">
        <div class="gallery_slider_nav">
          <?php
            if( have_rows('image_gallery') ):
              while ( have_rows('image_gallery') ) : the_row();
                ?>
                <div class="image_outer_nav my-4">
                  <div class="img_bg" style="background-image: url('<?php the_sub_field('image_services'); ?>')">

                  </div>
                </div>
                <?php
              endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="download_form_section text-center mb-5">
	<?php $value = get_field( "download_file_title" );

	if( $value ) {

	} else { ?>
		<div class="container">
			<div class="file-title"><?php the_field('download_form_title'); ?></div>
			<a href="<?php the_field('download_file_attachment'); ?>" class="button outline-none border-0 theme bg-dark-brown color-white text-uppercase font-bold d-inline-block" download target="_blank">DOWNLOAD</a>
		</div>
	<?php } ?>
</section>


<section class="access">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="the_access_title mb-5">
          <?php the_field('bottom_section_title'); ?>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
        if( have_rows('content_repeater') ):
          while ( have_rows('content_repeater') ) : the_row();
            ?>
            <div class="col-md-2">
              <div class="access_content">
                <?php the_sub_field('content_single'); ?>
              </div>
            </div>
            <?php
          endwhile;
        endif;
      ?>
    </div>
  </div>
</section>

<?php if ( get_field( 'service_details' ) ): ?>

<section class="service_details py-5">
	<div class="container">
		<div class="service_details_list">
			<div class="row justify-content-center">

				<?php
					if( have_rows('services_details_repeater') ):
						while ( have_rows('services_details_repeater') ) : the_row();

							?>
							<div class="col-md-3">
								<div class="service_details_inner position-relative mb-4">
									<div class="image_outer">
										<img src="<?php the_sub_field('service_detail_image'); ?>" class="img-fluid" />
									</div>
									<div class="the_title py-2">
										<?php the_sub_field('service_detail_title'); ?>
									</div>
									<div class="the_description">
										<?php the_sub_field('service_detail_description'); ?>
									</div>
									<?php $value = get_sub_field( "service_detail_rates_+_tax" );

									if( $value ) { ?>
										<div class="the_rate py-2">
											<?php the_sub_field('service_detail_rates_+_tax'); ?>
										</div>
									<?php } else { ?>

									<?php } ?>
								</div>
							</div>
							<?php

						endwhile;
					endif;
				?>

			</div>
		</div>
	</div>
</section>

<?php else: // field returned false ?>

<?php endif; // end of if logic ?>

<?php
// End the loop.
endwhile;

	get_footer();
?>
