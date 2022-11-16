<?php
  /*
   * Template Name: Members Template
  */
  $country = null;
  $state = null;
  $city = null;
  get_header();
?>

<section class="membership-plan-section mt-5 pt-5 mb-5 pb-5">
  <div class="container px-4 mt-4 mt-sm-5">
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h3 class="sub-section-title theme color-dark font-bold"><?php the_field('membership_plans_title'); ?></h3>
      </div>
      <div class="col-12">
        <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 5, 'title' => false, 'description' => false ) ); ?>
      </div>
    </div>
  </div>
</section>

<section class="membership-section mb-5 pb-5">
  <div class="container">
    <div class="row mx-md-5 px-3 px-sm-0">
      <h2 class="section-title theme color-dark px-3 mb-5"><?php the_field('membership_section_title'); ?></h2>
      <div class="data-container mb-5 pb-4 row mx-0">
        <div class="col-sm-7 pr-sm-4 pr-md-5 mb-4 mb-sm-0">
          <p><?php the_field('membership_section_content'); ?></p>
        </div>
        <div class="col-sm-5">
          <h3 class="sub-section-title theme color-dark-brown font-bold ml-0 ml-sm-4 mb-4 text-center text-sm-left">Benefits</h3>
          <div class="benefits-holder clearfix d-flex flex-wrap">
            <?php
              if(have_rows('benefits')):while (have_rows('benefits')) : the_row();
            ?>
              <div class="col-6 col-md-4 float-left">
                <div class="single-benefit text-center d-flex flex-column align-items-center mb-4">
                  <img class="mb-3" src="<?php the_sub_field('image'); ?>">
                  <p class="theme color-dark"><?php the_sub_field('title') ?></p>
                </div>
              </div>
            <?php
              endwhile;
              endif;
            ?>
          </div>
        </div>
      </div>
      <div class="percent-holder w-100 mx-auto">
        <div class="col-12 clearfix d-flex align-items-center">
          <div class="number-holder float-left d-flex align-items-center justify-content-center flex-column theme bg-dark-brown color-white">
            <h3 class="font-bold m-0">50%</h3>
            <p class="font-semi-bold">off</p>
          </div>
          <div class="text-holder float-left d-flex align-items-center theme bg-card-bottom px-3 px-lg-5 font-bold theme color-dark">
            <p><?php the_field('50%_offer'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="affiliations-section mb-5 mt-5">
  <div class="container">
    <div class="row">
      <div class="text-center w-100">
        <h3 class="sub-section-title theme color-dark font-bold mb-4"><?php the_field('affiliations_title'); ?></h3>
      </div>

      <div class="filter-holder col-12 d-flex flex-wrap">
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
          <div class="dropdown w-100">
            <select name="country" id="country" class="dropdown-toggle d-flex px-3 px-lg-3 py-3 theme border-light-brown button font-bold w-100 outline-none theme color-body-text">
              <option value="">FILTER BY COUNTRY</option>
              <?php
                $args=array(
                  'public'   => true,
                  '_builtin' => false
                );
                $output = 'names'; // or objects
                $operator = 'and';
                $taxonomies=get_taxonomies($args,$output,$operator); 
                if  ($taxonomies) {
                  foreach ($taxonomies  as $taxonomy ) {
                    $terms = get_terms([
                      'taxonomy' => $taxonomy,
                      'hide_empty' => false,
                    ]);
                    $first_level = array_filter($terms, function ($t) {
                      return $t->parent == 0;
                    });
                    foreach ( $first_level as $first_levels) {
              ?>
                <option value="<?php echo $first_levels->term_id; ?>"><?php echo $first_levels->name; ?></option>
              <?php
                  $country = $first_levels->name;
                    }
                  }
                }  
              ?>
            </select>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
          <div class="dropdown w-100">
            <select name="state" id="state" class="dropdown-toggle d-flex px-3 px-lg-3 py-3 theme border-light-brown button font-bold w-100 outline-none theme color-body-text">
              <option value="">FILTER BY STATE</option>
              <?php 
                $args=array(
                  'public'   => true,
                  '_builtin' => false
                );
                $output = 'names'; // or objects
                $operator = 'and';
                $taxonomies=get_taxonomies($args,$output,$operator); 
                if  ($taxonomies) {
                  foreach ($taxonomies  as $taxonomy ) {
                    $terms = get_terms([
                      'taxonomy' => $taxonomy,
                      'hide_empty' => false,
                    ]);
                    $second_level = array_filter($terms, function ($t) {
                      return $t->parent != 0 && get_term($t->parent, 'Location')->parent == 0;

                    });
                    foreach ( $second_level as $second_levels) {

              ?>
                <option class="single-state d-none" parent="<?php echo $second_levels->parent; ?>" value="<?php echo $second_levels->term_id; ?>"><?php echo $second_levels->name; ?></option>
              <?php 
                    }
                  }
                }  
              ?>
            </select>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
          <div class="dropdown w-100">
            <select name="city" id="city" class="dropdown-toggle d-flex px-3 px-lg-3 py-3 theme border-light-brown button font-bold w-100 outline-none theme color-body-text">
              <option value="">FILTER BY CITY</option>
              <?php 
                $args=array(
                  'public'   => true,
                  '_builtin' => false
                );
                $output = 'names'; // or objects
                $operator = 'and';
                $taxonomies=get_taxonomies($args,$output,$operator); 
                if  ($taxonomies) {
                  foreach ($taxonomies as $taxonomy ) {
                    $terms = get_terms([
                      'taxonomy' => $taxonomy,
                      'hide_empty' => false,
                    ]);
                    $third_level = array_filter($terms, function ($t) {
                      return $t->parent != 0 && get_term($t->parent, 'Location')->parent != 0;
                    });
                    foreach ( $third_level as $third_levels) {
              ?>
                <option class="d-none single-city" parent="<?php echo $third_levels->parent; ?>" value="<?php echo $third_levels->term_id; ?>"><?php echo $third_levels->name; ?></option>
              <?php 
                    }
                  }
                }  
              ?>
            </select>
          </div>
        </div>
        <div class="d-none col-12 col-sm-6 col-lg-3 mb-4">
          <div class="search-holder w-100 position-relative d-flex">
            <input type="text" name="search" placeholder="Search" class="search-field outline-none w-100 theme border-body-text px-3 px-lg-3 py-3 font-bold color-body-text">
            <i class="fa fa-search position-absolute right mr-3 align-self-center" aria-hidden="true"></i>
          </div>
        </div>
      </div>

      <div class="affiliations-holder col-12 d-flex flex-wrap">
        <?php
          if(have_rows('our_affiliations')):while (have_rows('our_affiliations')) : the_row();
        ?>

          <div class="col-12 col-sm-6 col-lg-4 mb-4 d-none affiliation" city="<?php the_sub_field('city') ?>" state="<?php the_sub_field('state') ?>" country="<?php the_sub_field('country') ?>" >
            <div class="single-affiliation theme border-light-brown px-4 py-4">
              <p class="theme color-dark font-bold smaller"><?php the_sub_field('title') ?></p>
              <div class="address-data px-3 small"><?php the_sub_field('address') ?></div>
            </div>
          </div>
        <?php
          endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
</section>

<section class="annual-report-section mb-5 mt-5">
  <div class="container">
    <div class="row mx-md-5 px-3">
      <h2 class="section-title theme color-dark px-3 mb-5"><?php the_field('annual_report_title'); ?></h2>
      <div class="content-container mb-5 pb-4 row mx-0">
        <div class="col-sm-7">
          <p><?php the_field('annual_report_content'); ?></p>
        </div>
        <div class="col-sm-5 text-center">
          <?php if( get_field('annual_report_date') ): ?>
            <p class="font-bold theme color-dark mb-4"><?php the_field('annual_report_date'); ?></p>
          <?php endif; ?>
          <?php if( get_field('upload_report') ): ?>
            <a class="button outline-none border-0 theme bg-dark-brown color-white text-uppercase font-bold d-inline-block" href="<?php the_field('upload_report'); ?>" download>DOWNLOAD</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="newsletter-section mb-5 mt-5">
  <div class="container">
    <div class="row mx-md-5 px-3">
      <h2 class="section-title theme color-dark px-3 mb-5">Newsletter of the month</h2>
      <div class="content-container mb-5 row mx-0 w-100">
        <div class="col-sm-5">
          <div class="img-holder theme border-body-text" style="background-image: url('<?php the_field('newsletter_image') ?>');">
          </div>
        </div>
        <div class="col-sm-7 text-center mt-4 mt-sm-0">
          <h3 class="sub-section-title theme color-dark font-bold text-left mb-4"><?php the_field('newsletter_title'); ?></h3>
          <div class="text-left"><?php the_field('newsletter_content'); ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  get_footer();
?>
