<?php 
	get_header();
?>

<div class="single-gameplay-updates-wrapper">
	<div class="container py-5">
		<div class="row px-3">
			<div class="col-12 page-title mb-4">
				<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
			</div>
			<?php
			    if(have_posts()) : while(have_posts()) : the_post();
			?>
				<div class="col-12 post-holder p-5 theme bg-light-black rounded box-shadow-light-black">
					<div class="post-content theme color-white">
						<p><?php echo get_the_content(); ?></p>
					</div>
				</div>
			<?php
		      	endwhile;
		      	endif;
	  		?>
	  	</div>
	</div>
	<p class="small">Source/Credits : https://www.dota2.com/patches/</p>
</div>

<?php
	get_footer();
?>