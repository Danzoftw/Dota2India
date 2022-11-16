	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCd_7IFdjaL9fd5VGzEF31faoSulQEqdMI"></script>
		<footer>
			<div class="footer-class clearfix theme bg-mid-black color-white py-5">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="ul-holder d-flex mb-4 mb-sm-0">
								<?php
									wp_nav_menu(array(
									'theme_location'=>'footer',
									'container' => false,
									'menu_class' => 'nav flex-row',)
									);
								?>
							</div>
						</div>
						<div class="col-12 col-sm-6 text-section text-sm-right">
							<p class="copyright">Copyright© Dota 2 India 2020. All Rights Reserved.</p>
							<!-- <p class="font-Montserrat">Powered by<a target="_blank" href="http://iodroplet.com/"> ioDroplet</a></p> -->
						</div>
					</div>


					
					<div class="social-media-section">
						<?php
							if(get_theme_mod('facebook_link')){
						?>
							<a href="<?php echo get_theme_mod('facebook_link'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<?php 
							}
						?>
						<?php
							if(get_theme_mod('insta_link')){
						?>
							<a href="<?php echo get_theme_mod('insta_link'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<?php 
							}
						?>
						<?php
							if(get_theme_mod('twitter_link')){
						?>
							<a href="<?php echo get_theme_mod('twitter_link'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<?php 
							}
						?>
					</div>
					
				</div>
			</div>
		</footer>
		
		<?php wp_footer(); ?>
	</body>
</html>