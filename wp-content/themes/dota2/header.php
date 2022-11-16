<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title(''); ?></title>
	<script data-ad-client="pub-1817674289532448" async src="https://pagead2.googlesyndication.com/
pagead/js/adsbygoogle.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<?php wp_head(); ?>

<body class="theme bg-white-smoke color-dark-gray">
	<header data-homeurl="<?php echo get_home_url(); ?>/">
		<div class="loader">
			<div class="loader-shell">
				<img src="<?php echo get_theme_mod('loading_screen'); ?>" >
				<div id="loading">
				</div>
			</div>
		</div>
		<nav class="navbar navbar-default py-4 theme bg-mid-black box-shadow-light-black">
			<div class="header-bg" style="background-image:url(<?php echo get_theme_mod('header_image')?>);">
			</div>
			<!--Brand and toggle get grouped for better mobile display-->
			<div  class="container">
				<div class="row w-100">
					<div class="navbar-header d-flex w-100 justify-content-between">
						<button class="menu navbar-toggle collapsed outline-none d-sm-none" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				      <svg width="45" height="45" viewBox="0 0 100 100">
				        <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
				        <path class="line line2" d="M 20,50 H 80" />
				        <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
				      </svg>
				    </button>
						<div class="img-holder clearfix">
							<a class="navbar-brand mobile clearfix" href="<?php echo get_home_url();?>">
			          <img src="<?php echo get_theme_mod('logo_img'); ?>" >
			        </a>
						</div>
						<div class="ul-holder d-flex justify-content-end">
							<?php
								wp_nav_menu(array(
								'theme_location'=>'primary',
								'container' => false,
								'menu_class' => 'nav flex-row',)
								);
							?>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="ul-holder clearfix">
							<?php 
								wp_nav_menu(array(
								'theme_location'=>'primary',
								'container' => false,
								'menu_class' => 'nav navbar-nav navbar-right',)
								);
							?>
						</div>
					</div>
				</div>
			</div>	
		</nav>

		<input type="hidden" id="home-dir" data-homedir="<?php echo get_template_directory_uri(); ?>">
		<script>
		    var admin_ajax="<?php echo admin_url('admin-ajax.php'); ?>";
		</script>
	</header>