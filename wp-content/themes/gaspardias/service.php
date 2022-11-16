<?php
/*

 * Template Name: Service Template

*/
get_header();
while ( have_posts() ) :
  the_post();
?>

<section class="top_section_services mt-5 pt-5 mb-5 pb-5">
  <div class="container mt-5">
		<div class="row align-items-end px-4">
			<div class="col-md-5">
				<div class="img_container mr-md-5 mb-4 mb-md-0 theme box-shadow-dark" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
				</div>
			</div>
			<div class="col-md-7">
				<div class="content_container">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="list_services py-5">
	<div class="container">
		<div class="title_outer text-center">
			<div class="top-image w-100 mb-3 mt-3 mb-sm-4">
				<img src="<?php the_field('crown_image', 72); ?>">
			</div>
			<div class="page-title w-100 text-uppercase section-title-spacing mb-3 mb-sm-4 mb-md-5">
				<h2 class="section-title theme color-dark"><?php the_field('services_title'); ?></h2>
			</div>
		</div>

		<div class="services_list d-none">
			<div class="row justify-content-center">

				<?php
					$i=1;
					if( have_rows('list_of_services') ):
						while ( have_rows('list_of_services') ) : the_row();
						if($i <= 4) {
							?>
							<div class="col-md-3">
								<div class="service_inner position-relative mb-4">
									<div class="image_outer">
										<img src="<?php the_sub_field('service_image'); ?>" class="img-fluid" />
									</div>
									<div class="overlay position-absolute"></div>
									<div class="the_title position-absolute text-center px-3">
										<?php the_sub_field('service_title'); ?>
									</div>
								</div>
							</div>
							<?php
						}else {
							?>
							</div>
							<div class="row justify-content-center">
								<div class="col-md-3">
									<div class="service_inner position-relative mb-4">
										<div class="image_outer">
											<img src="<?php the_sub_field('service_image'); ?>" class="img-fluid" />
										</div>
										<div class="overlay position-absolute"></div>
										<div class="the_title position-absolute text-center px-3">
											<?php the_sub_field('service_title'); ?>
										</div>
									</div>
								</div>
							<?php
							$i=0;
						}
							$i++;
						endwhile;
					endif;
				?>

			</div>
		</div>

    <div class="services_list">
			<div class="row justify-content-center">

        <?php
    	   	query_posts(array('post_type' => 'services','orderby' => 'title','post_status'=>'publish','order'=>'DESC','posts_per_page'=>-1));
    	      if(have_posts()) : while(have_posts()) : the_post();
    	  ?>
          <div class="col-md-3">
            <a href="<?php echo get_permalink(); ?>">
              <div class="service_inner position-relative mb-4">
                <div class="image_outer" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                <div class="overlay position-absolute"></div>
                <div class="the_title position-absolute text-center px-3">
                  <?php the_title(); ?>
                </div>
              </div>
            </a>
          </div>
    		<?php
    			endwhile;
    			endif;
    			wp_reset_query();
    		?>

			</div>
		</div>

    <div class="download_form_section text-center mb-5">
    	<?php $value = get_field( "service_download_form_title" );

    	if( $value ) { ?>
        <div class="container">
          <div class="file-title"><?php the_field('service_download_form_title'); ?></div>
          <a href="<?php the_field('service_download_file'); ?>" class="button outline-none border-0 theme bg-dark-brown color-white text-uppercase font-bold d-inline-block" download target="_blank">DOWNLOAD</a>
        </div>
    	<?php } else { ?>

    	<?php } ?>
    </div>

	</div>
</section>


<?php
// End the loop.
endwhile;
get_footer();
