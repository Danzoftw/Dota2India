<?php
/*

 * Template Name: Downloads Template

*/
get_header();
?>
<?php
if ( have_posts() ) :

/* Start the Loop */
while ( have_posts() ) : the_post();
?>
<section class="downloads-section pt-5 mb-5 pb-4">
	<div class="container">
		<div class="outer-container">
			<div class="d-title"><?php the_title(); ?></div>
			<div class="row mt-4">
				<?php
				// check if the repeater field has rows of data
				if( have_rows('download_files_repeater') ):
					// loop through the rows of data
						while ( have_rows('download_files_repeater') ) : the_row();
								// display a sub field value
								?>
								<div class="col-md-6 pl-4 mt-2 mb-4">
									<div class="dc-wrapper">
										<div class="file-title"><?php the_sub_field('download_file_title'); ?></div>
										<a href="<?php the_sub_field('file_attachment'); ?>" class="button outline-none border-0 theme bg-dark-brown color-white text-uppercase font-bold d-inline-block" download target="_blank">DOWNLOAD</a>
									</div>
								</div>
								<?php
						endwhile;
				else :
						// no rows found
				endif;
				?>
			</div>
		</div>
	</div>
</section>
<?php
endwhile;

endif;
?>
<?php
get_footer();
?>
