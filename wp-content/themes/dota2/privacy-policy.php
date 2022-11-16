<?php
/*
 * Template Name: Privacy policy page
*/
	get_header();
?>

<div class="privacy-policy-wrapper py-5">
	<div class="container pt-5">
		<div class="row px-3">
			<div class="page-title mb-5">
				<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
			</div>

			<div class="page-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>
