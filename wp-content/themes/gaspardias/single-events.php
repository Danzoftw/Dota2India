<?php
	get_header();

	// Start the loop.
	while ( have_posts() ) :
		the_post();
?>

<section class="top_section mt-5 pt-5 mb-5 pb-4">
  <div class="container">
    <div class="outer_container pt-5 mx-auto">
      <div class="the_title mt-5 pt-5">
        <?php the_title(); ?>
      </div>

        <div class="custom_breadcrumbs">
          <a href="<?php echo get_home_url(); ?>" class="bread_a position-relative pr-4">Home</a>
          <a href="<?php the_field('event_page_link', 13); ?>" class="bread_a position-relative pr-4">Events</a>
          <a class="bread_a position-relative pr-4"><?php the_title(); ?></a>
        </div>

        <div class="latest_event mt-5">
          <div class="row">
            <div class="col-md-8">
              <div class="featured_card d-sm-flex">
                <div class="img_container pr-3">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid" />
                </div>
                <div class="info pt-4 pt-sm-0 pl-sm-4">
                  <div class="title mb-4">
                    <?php the_title(); ?>
                  </div>
                  <div class="content">
                    <?php the_content(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="details_card mt-5 mt-md-0 p-4">
                <div class="details_heading mt-2">
                  <div class="title">Details</div>
                  <img src="<?php echo get_template_directory_uri();?>/images/deco_down_white.png" />
                </div>
                <div class="detailed_info mt-4 mb-2">
                  <div class="wwo mb-1">
                    When: <?php echo date('jS F | g:i a', strtotime(get_field('when_event'))); ?>
                  </div>
                  <div class="wwo mb-1">
                    Where: <?php the_field('where_event'); ?>
                  </div>
                  <div class="wwo mb-1">
                    Occurs: <?php the_field('occurs_event'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>

  </div>
</section>


<section class="upcoming_events pb-5">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="main_title text-center mb-4 mt-5 pt-5">
          Upcoming Events
        </div>
      </div>
    </div>

    <div class="row">

      <?php
       $i=1;
       query_posts(array('post_type' => 'events','post_status'=>'publish','orderby' => 'menu_order','order'=>'DESC','posts_per_page'=>-1));
        if(have_posts()) : while(have_posts()) : the_post();
        ?>

      <div class="col-md-4">
        <a href="<?php echo get_permalink(); ?>" class="event_card d-block">
          <div class="custom_card d-flex align-items-start mb-4 p-4">
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
            <div class="info pl-4 pb-2">
              <div class="the_title mb-3">
                <?php the_title(); ?>
              </div>
              <div class="content">
                <?php the_excerpt(); ?>
              </div>
            </div>
          </div>
        </a>
      </div>

      <?php
      if($i==3) {
        ?>
      </div>
      <div class="row">
        <?php
        $i=0;
      }
      $i++;
      endwhile;
      endif;
      wp_reset_query();
      ?>


    </div>


  </div>
</section>

<?php
// End the loop.
endwhile;

	get_footer();
?>
