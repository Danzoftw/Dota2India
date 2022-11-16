<?php get_header(); ?>
<div class="error-page">
	<div class="side-class">
		<div class="container">
	    	<div class="content_404" >
<!-- 	        	<p><?php _e('Error', 'one-page-pro'); ?></p>
 -->	        	<h1><?php _e('404', 'one-page-pro'); ?></h1>
	        	<h3><?php _e('Page not found', 'one-page-pro'); ?></h3>
	        	<p><?php _e('The page you requested did not exist or has moved.', 'one-page-pro'); ?></p>
	        	<a href="<?php echo get_home_url(); ?>">Back to home</a>
	    	</div>
	    </div>
	</div>
	<div id="particles-home"></div>
</div>

<?php get_footer(); ?>