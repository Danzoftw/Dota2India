<?php
/*
 * Template Name: Events page
*/
	get_header();
?>

<div class="events-wrapper py-5">
	<div class="container pt-5">
		<div class="row px-3">
			<div class="page-title mb-5">
				<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>

	<section class="upcoming mb-5">
		<div class="container">
			<div class="row px-3">
				<h3 class="theme color-black section-title font-Larsseit-thin mb-4">Upcoming tournaments</h3>
				<?php
				 	query_posts(array('post_type' => 'our_events','orderby' => 'title','post_status'=>'publish','order'=>'DESC', 'orderby' => 'publish_date', 'category_name' => 'Upcoming', 'posts_per_page'=>-1));
				      if(have_posts()) : while(have_posts()) : the_post();
				?>
					<div class="post-holder w-100 mb-4 p-3 theme bg-mid-black color-white rounded">
						<div class="post-title">
							<h5 class="font-Larsseit-light title-top-line position-relative pt-3"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
						</div>
						<?php
							if(get_the_post_thumbnail_url()){
						?>
							<div class="post-image overflow-hidden">
								<a href="<?php echo get_permalink(); ?>"><img class="w-100 rounded" src="<?php echo get_the_post_thumbnail_url();?>"></a>
							</div>
						<?php
							}
						?>
					</div>
				<?php
			      	endwhile;
			      	endif;
			      	wp_reset_query();
			  	?>
			</div>
		</div>
	</section>

	<section class="ongoing mb-5">
		<div class="container">
			<div class="row px-3">
				<h3 class="theme color-black section-title font-Larsseit-thin mb-4">Ongoing tournaments</h3>
				<?php
				 	query_posts(array('post_type' => 'our_events','orderby' => 'title','post_status'=>'publish','order'=>'DESC', 'orderby' => 'publish_date', 'category_name' => 'Ongoing', 'posts_per_page'=>-1));
				      if(have_posts()) : while(have_posts()) : the_post();
				?>
					<div class="post-holder w-100 mb-4 p-3 theme bg-dark-green color-white rounded">
						<div class="post-title">
							<h5 class="font-Larsseit-light title-top-line position-relative pt-3"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
						</div>
						<?php
							if(get_the_post_thumbnail_url()){
						?>
							<div class="post-image overflow-hidden">
								<a href="<?php echo get_permalink(); ?>"><img class="w-100 rounded" src="<?php echo get_the_post_thumbnail_url();?>"></a>
							</div>
						<?php
							}
						?>
					</div>
				<?php
			      	endwhile;
			      	endif;
			      	wp_reset_query();
			  	?>
			</div>
		</div>
	</section>

	<section class="recently-ended">
		<div class="container">
			<div class="row px-3">
				<h3 class="theme color-black section-title font-Larsseit-thin mb-4">Recently ended tournaments</h3>
				<?php
				 	query_posts(array('post_type' => 'our_events','orderby' => 'title','post_status'=>'publish','order'=>'ASC', 'orderby' => 'publish_date', 'category_name' => 'Ended', 'posts_per_page'=>-1));
				      if(have_posts()) : while(have_posts()) : the_post();
				?>
					<div class="post-holder w-100 mb-4 p-3 theme bg-dark-red color-white rounded">
						<div class="post-title">
							<h5 class="font-Larsseit-light title-top-line position-relative pt-3"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>
						</div>
						<?php
							if(get_the_post_thumbnail_url()){
						?>
							<div class="post-image overflow-hidden">
								<a href="<?php echo get_permalink(); ?>"><img class="w-100 rounded" src="<?php echo get_the_post_thumbnail_url();?>"></a>
							</div>
						<?php
							}
						?>
					</div>
				<?php
			      	endwhile;
			      	endif;
			      	wp_reset_query();
			  	?>
			</div>
		</div>
	</section>

</div>

<?php
	get_footer();
?>