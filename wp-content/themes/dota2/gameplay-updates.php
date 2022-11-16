<?php
/*
 * Template Name: Gameplay updates page
*/
get_header();
?>

<div class="gameplay-updates-wrapper py-5">
	<div class="container py-5">
		<div class="row px-3">
			<div class="col-12 page-title mb-5">
				<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
			</div>

			<div class="col-12">
				<div class="row px-3">
					<?php
					 	query_posts(array('post_type' => 'patch_updates','orderby' => 'title','post_status'=>'publish','order'=>'DESC', 'orderby' => 'publish_date', 'posts_per_page'=>-1));
					      if(have_posts()) : while(have_posts()) : the_post();
					?>
					<div class="post-holder w-100 mb-3 col-6 col-sm-4">
						<div class="post-title">
							<h3 class="font-Larsseit-light sub-section-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div>
					<?php
				      	endwhile;
				      	endif;
				      	wp_reset_query();
				  	?>
			  	</div>
			</div>
		</div>
	</div>
</div>


<?php
	get_footer();
?>