<?php 
	get_header();
?>

<div class="single-news-wrapper">
	<div class="container py-sm-5">
		<div class="row px-3 py-5">
			<div class="col-12 page-title mb-5">
				<h1 class="font-SalteryAlternate extra-large-title theme color-dark-gray"><?php the_title(); ?></h1>
			</div>

			<?php
			    if(have_posts()) : while(have_posts()) : the_post();
			?>
			<div class="col-12 post-holder mb-5">
				<div class="post-image mb-4 text-center mx-md-5 px-lg-4 float-left">
					<a href="<?php the_field('link'); ?>" target="_blank">
						<img class="w-100" src="<?php echo the_field('image'); ?>">
					</a>
				</div>
				<div class="post-content">
					<p><?php echo get_the_content(); ?></p>
				</div>
			</div>
			<?php
		      	endwhile;
		      	endif;
	  		?>

	  		<div class="teams-holder">
	  			<h2 class="theme color-black section-title font-Larsseit-thin mb-5">Teams</h2>
	  			<div class="col-12 px-0 d-flex flex-wrap">
		  			<?php
						if( have_rows('teams') ):while ( have_rows('teams') ) : the_row();
					?>
						<div class="team-wrapper col-12 col-sm-4 col-lg-3 text-center mb-5">
							<div class="team-title">
								<h4><?php the_sub_field('name'); ?></h4>
							</div>
							<div class="team-image">
								<img class="w-100 px-3" src="<?php the_sub_field('logo'); ?>">
							</div>
						</div>
					<?php
						endwhile;
						endif;
					?>
	  			</div>
	  		</div>

	  		<div class="winner-holder col-12 px-0">
	  			<h2 class="theme color-black section-title font-Larsseit-thin mb-5">Results</h2>
	  			<div class="d-flex flex-wrap">
	  				<div class="col-6 col-sm-4 mb-4">
		  				<h4 class="border-bottom theme color-black">Date</h4>
		  				<p><?php the_field('date'); ?></p>
		  			</div>
		  			<div class="col-6 col-sm-4 mb-4">
		  				<h4 class="border-bottom theme color-black">Prize pool</h4>
		  				<p>$<?php the_field('price'); ?></p>
		  			</div>
		  			<div class="col-6 col-sm-4 mb-4">
		  				<h4 class="border-bottom theme color-black">Winner</h4>
		  				<a href="<?php the_field('winner_team_link'); ?>">
		  					<h4><?php the_field('winner_team'); ?></h4>
		  				</a>
		  				<a href="<?php the_field('winner_team_link'); ?>">
		  					<img src="<?php the_field('winner_team_logo'); ?>">
		  				</a>
		  			</div>
	  			</div>

	  		</div>
	  	</div>
	</div>
</div>

<?php
	get_footer();
?>