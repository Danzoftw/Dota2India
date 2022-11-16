<?php
/*
 * Template Name: Whats new page
*/
	get_header();
?>

<div class="whats-new-wrapper">
	<section class="post-section py-4 my-5">
		<div class="container">
			<div class="row">
				<div class="page-title mb-4">
					<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
				</div>
				<?php
				 	query_posts(array('post_type' => 'news','orderby' => 'title','post_status'=>'publish','order'=>'DESC', 'orderby' => 'publish_date', 'posts_per_page'=>-1));
				      if(have_posts()) : while(have_posts()) : the_post();
				?>
				<div class="post-holder w-100 mb-5 p-5 theme bg-light-black color-white rounded">
					<div class="post-title mb-3">
						<h3 class="font-Larsseit-light sub-section-title title-top-line position-relative pt-3"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
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
					<div class="post-content mt-3">
						<p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
					</div>
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
