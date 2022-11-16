<?php
/*
 * Template Name: Home Template
*/
get_header();
?>

<section class="home-banner position-relative mt-5">

	<div class="upcoming_events_banner position-absolute">
		<div class="upcoming_events_inner theme bg-dark-brown">
			<div class="container">
				<div class="upcoming_events_slider">
					<?php
					 $i=1;
					 query_posts(array('post_type' => 'events','post_status'=>'publish','orderby' => 'menu_order','order'=>'DESC','posts_per_page'=>5));
						if(have_posts()) : while(have_posts()) : the_post();
						?>
							<div class="custom_card d-flex flex-row align-items-center justify-content-between my-3">
								<div class="the_title">
									<?php the_title(); ?>
								</div>
								<div class="view-event-button text-center">
									<a class="d-inline-block theme border-white p-2 color-white text-uppercase decoration-none outline-none" href="<?php echo get_permalink(); ?>">VIEW</a>
								</div>
							</div>
						<?php
					$i++;
					endwhile;
					endif;
					wp_reset_query();
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="slider-holder">
		<?php
			if( have_rows('banner_section') ):while ( have_rows('banner_section') ) : the_row();
				$array1 = array();
				$array2 = array();
				$line1 = get_sub_field('title_line_1');
				$line2 = get_sub_field('title_line_2');
				$array1 = str_split($line1);
				$array2 = str_split($line2);
		?>
			<div class="single-slide position-relative d-flex justify-content-center align-items-center h-98vh" style="background-image: url('<?php the_sub_field('image'); ?>')">
				<div class="container offset-calc">
					<div class="opacity-shell position-absolute w-100 h-100 top left z-index-1">
					</div>
					<div class="banner-text position-relative z-index-2">
						<div class="slide-title-holder mr-auto ml-0 pl-0 ml-sm-5 pl-sm-5">
							<h2 class="section-title theme color-white">
								<?php
									foreach($array1 as $i){
										if($i == ' ') {
											echo '<span class="letter">&nbsp;</span>';
										}else {
											echo '<span class="letter">' .$i. '</span>';
										}
									}
								?>
							</h2>
							<h2 class="section-title theme color-white">
								<?php
									foreach($array2 as $i){
										if($i == ' ') {
											echo '<span class="letter">&nbsp;</span>';
										}else {
											echo '<span class="letter">' .$i. '</span>';
										}
									}
								?>
							</h2>
							<p class="sub-text theme color-white"><?php the_sub_field('sub_title'); ?></p>
						</div>
						<div class="slide-button text-center">
							<a class="theme border-white p-4 color-white text-uppercase decoration-none outline-none position-relative" href="<?php the_sub_field('url'); ?>">Discover More</a>
						</div>
					</div>
				</div>
			</div>
		<?php
			endwhile;
			endif;
		?>
	</div>
	<div class="slide-count-wrap position-absolute theme color-white">
    <div class="slide-count-spans d-flex">
       <div class="current mr-2"></div>
			<div class="midline">/</div>
       <div class="total ml-3"></div>
    </div>
	</div>
</section>

<section class="history-section position-relative mt-5 pt-3 pt-sm-5 mb-5">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <div class="top-image w-100 mb-3 mb-sm-4 mb-md-5" data-aos="fade-up">
          <img src="<?php the_field('crown_image', 72); ?>">
        </div>
        <div class="page-title w-100 text-uppercase section-title-spacing mb-3 mb-sm-4 mb-md-5" data-aos="fade-up">
          <h2 class="section-title theme color-dark"><?php the_field('page_title', 72); ?></h2>
        </div>
        <div class="page-content mx-auto text-left pb-0 pb-sm-3 pb-md-4" data-aos="fade-up">
          <?php the_field('history_content'); ?>
        </div>
        <div class="button-holder mt-5" data-aos="fade-up">
        	<a href="<?php echo get_page_link(72); ?>" class="outline-none theme border-dark px-4 py-3 text-uppercase color-dark decoration-none">Know more</a>
        </div>
        <div class="bot-image w-100 mt-3 mt-sm-4 mt-md-5 pt-4" data-aos="fade-up">
          <img src="<?php the_field('crown_image_upside_down', 72); ?>">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="services-section position-relative">
	<div class="services-slider">
		<?php
	   	query_posts(array('post_type' => 'services','orderby' => 'title','post_status'=>'publish','order'=>'DESC','posts_per_page'=>-1));
	      if(have_posts()) : while(have_posts()) : the_post();
	  ?>

	  	<a href="<?php echo get_permalink(); ?>" class="single-service" style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'large'); ?>')">
				<div class="dot_circle position-absolute">
					<div class="hover_circle position-absolute"></div>
					<div class="hover_line position-absolute"></div>
				</div>
	  		<div class="post-name">
	  			<h3 class="text-uppercase"><?php the_title(); ?></h3>
	  		</div>
	  	</a>
		<?php
			endwhile;
			endif;
			wp_reset_query();
		?>
	</div>
</section>

<section class="directions">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="content_box">
					<h1 class="the_title mt-4 mb-5" data-aos="fade-up">
						<?php the_field('directions_title'); ?>
					</h1>
					<div class="para_content" data-aos="fade-up">
						<?php the_field('directions_para'); ?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="img_outer_container mt-5 mt-md-0">
					<div class="img_container mx-auto position-relative" data-aos="fade-up">
						<img src="<?php echo get_template_directory_uri();?>/images/directions.png" class="img-fluid" />
						<div class="position-absolute dotted-line line"></div>
						<div class="position-absolute circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="managing_committee">
	<div class="container">
		<div class="subtitle">
			<?php the_field('sub_title_committee'); ?>
		</div>
		<div class="title text-uppercase mb-5">
			<?php the_field('title_committee'); ?>
		</div>
		<div class="commitee_images">

			<div class="row custom_row justify-content-center">
				<?php
					$i=1;
					if( have_rows('commitee_images_repeater') ):
						while ( have_rows('commitee_images_repeater') ) : the_row();
						if($i <= 4) {
							?>
							<div class="col-6 col-md-3 custom_md">
								<div class="img_outer position-relative mb-4 mb-md-5">
									<img src="<?php the_sub_field('committee_image'); ?>" class="img-fluid" />
									<div class="name_item position-absolute w-100 text-center">
										<div class="name"><?php the_sub_field('name_committee'); ?></div>
										<div class="designation"><?php the_sub_field('designation_committee'); ?></div>
									</div>
								</div>
							</div>
							<?php
							}
							$i++;
						endwhile;
					endif;
				?>
			</div>

			<div class="hidden_section">
				<div class="row custom_row justify-content-center">
					<?php
						$i=1;
						if( have_rows('commitee_images_repeater') ):
							while ( have_rows('commitee_images_repeater') ) : the_row();
							if(($i > 4)&&($i < 7)) {
								?>
								<div class="col-6 col-md-3 custom_md">
									<div class="img_outer position-relative mb-4 mb-md-5">
										<img src="<?php the_sub_field('committee_image'); ?>" class="img-fluid" />
										<div class="name_item position-absolute w-100 text-center">
											<div class="name"><?php the_sub_field('name_committee'); ?></div>
											<div class="designation"><?php the_sub_field('designation_committee'); ?></div>
										</div>
									</div>
								</div>
								<?php
								}
								$i++;
							endwhile;
						endif;
					?>
				</div>

				<div class="row custom_row justify-content-center">
					<?php
						$i=1;
						if( have_rows('commitee_images_repeater') ):
							while ( have_rows('commitee_images_repeater') ) : the_row();
							if(($i >= 7)&&($i <= 10)) {
								?>
								<div class="col-6 col-md-3 custom_md">
									<div class="img_outer mb-4 mb-md-5 position-relative">
										<img src="<?php the_sub_field('committee_image'); ?>" class="img-fluid" />
										<div class="name_item position-absolute w-100 text-center">
											<div class="name"><?php the_sub_field('name_committee'); ?></div>
											<div class="designation"><?php the_sub_field('designation_committee'); ?></div>
										</div>
									</div>
								</div>
								<?php
								}
								$i++;
							endwhile;
						endif;
					?>
				</div>
			</div>

			<?php
			$count = count(get_field('commitee_images_repeater'));
			if($count > 4) {
				?>
				<div class="show-button text-center">
					<a class="d-inline-block theme border-white p-4 color-white text-uppercase decoration-none outline-none">LOAD MORE</a>
				</div>
				<?php
			}
			?>

		</div>
	</div>
</section>


<section class="events">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="upcoming">
					<div class="title_outer d-inline-block">
						<div class="title">
							<?php the_field('events_section_title'); ?>
						</div>
						<div class="bot_image my-3 text-center">
		          <img src="<?php the_field('crown_image_upside_down', 72); ?>">
		        </div>
					</div>
					<div class="events_list mt-2">
						<?php
		 				 $i=1;
		 				 query_posts(array('post_type' => 'events','post_status'=>'publish','orderby' => 'menu_order','order'=>'DESC','posts_per_page'=>2));
		 	 				if(have_posts()) : while(have_posts()) : the_post();
							?>
							<a href="<?php echo get_permalink(); ?>" class="event_card d-block">
								<div class="custom_card d-flex align-items-start mb-4">
									<div class="date_month">
										<div class="date_outer position-relative">
											<div class="date position-absolute">
												<?php echo date('j', strtotime(get_field('when_event'))); ?>
											</div>
										</div>
										<div class="month text-center py-1">
											<?php echo date('M', strtotime(get_field('when_event'))); ?>
										</div>
									</div>
									<div class="info pl-5 pb-2">
										<div class="the_title mb-3">
											<?php the_title(); ?>
										</div>
										<div class="content">
											<?php the_excerpt(); ?>
										</div>
									</div>
								</div>
							</a>
							<?php
						$i++;
						endwhile;
						endif;
						wp_reset_query();
						?>
						<div class="see_all text-center">
							<a href="<?php the_field('see_all_events_page_link'); ?>" class="d-inline-block theme border-black p-4 color-black text-uppercase decoration-none outline-none">SEE ALL EVENTS</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<!-- <div class="insta_outer">
					<?php dynamic_sidebar('Instagram Feed'); ?>
				</div> -->
				<div class="gallery mt-5 mt-md-3 mx-sm-3">
					<h4 class="widget-title"><?php the_field('gallery_title'); ?></h4>
					<div class="gallery-container mt-3">
						<div class="gallery-slider">
							<?php
			        // check if the repeater field has rows of data
			        if( have_rows('gallery_repeater') ):
			          // loop through the rows of data
			            while ( have_rows('gallery_repeater') ) : the_row();
			                // display a sub field value
			                ?>
			                  <div class="custom-width">
			                    <a href="<?php the_sub_field('gallery_image'); ?>" style="background-image: url('<?php the_sub_field('gallery_image'); ?>');"></a>
			                  </div>
			                <?php
			            endwhile;
			        else :
			            // no rows found
			        endif;
			        ?>
						</div>
						<!-- <div class="row">
							<?php
			        // check if the repeater field has rows of data
			        if( have_rows('gallery_repeater') ):
			          // loop through the rows of data
			            while ( have_rows('gallery_repeater') ) : the_row();
			                // display a sub field value
			                ?>
			                  <div class="col-sm-4 custom-width">
			                    <a href="<?php the_sub_field('gallery_image'); ?>" style="background-image: url('<?php the_sub_field('gallery_image'); ?>');"></a>
			                  </div>
			                <?php
			            endwhile;
			        else :
			            // no rows found
			        endif;
			        ?>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
