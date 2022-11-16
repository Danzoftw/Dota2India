<?php 
	get_header();
?>

<div class="single-news-wrapper">
	<div class="container py-5">
		<div class="row px-3 py-5">
			<div class="col-12 page-title mb-5">
				<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
			</div>

			<?php
			    if(have_posts()) : while(have_posts()) : the_post();
			?>
			<div class="post-holder">
				<div class="post-image mb-4 text-center mx-5 px-5">
					<img class="w-100" src="<?php echo get_the_post_thumbnail_url();?>">
				</div>
				<div class="post-content">
					<p><?php echo get_the_content(); ?></p>
				</div>
			</div>
			<?php
		      	endwhile;
		      	endif;
	  		?>
	  	</div>
	</div>
	<p class="small">Source/Credits : https://blog.dota2.com/</p>
</div>

<?php
	get_footer();
?>