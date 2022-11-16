<?php
/*

 * Template Name: Contact us page

*/
get_header();
?>

<div class="contact-wrapper py-5">
	<div class="container py-5">
		<div class="row px-3">
			<div class="col-12 page-title mb-4">
				<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
			</div>
			<div class="col-12 form-holder">
				<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 1, 'title' => false, 'description' => false ) ); ?>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>