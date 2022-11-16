<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="" type="image/x-icon" />
	<title><?php wp_title(''); ?></title>
	<?php wp_head();?>
</head>
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>


<body <?php body_class(); ?>>
	<header class="d-lg-flex align-items-center position-fixed w-100 left top theme bg-white z-index-2">
		<div class="container">
			<div class="menu">
				<nav class="navbar navbar-expand-lg navbar-light p-3 p-lg-0 py-lg-4">
					<a class="navbar-brand p-0 position-relative z-index-1" href="<?php echo get_home_url(); ?>">
						 <img src="<?php echo get_theme_mod('logo_url'); ?>" class="img-fluid" />
						 <img src="<?php echo get_theme_mod('footer_logo_url'); ?>" class="img-fluid text-logo" />
					</a>
					<button class="wrapper-menu navbar-toggler border-0 outline-none d-flex flex-column justify-content-between d-lg-none z-index-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<div class="line-menu half start theme bg-dark"></div>
						<div class="line-menu theme bg-dark"></div>
						<div class="line-menu half end theme bg-dark"></div>
					</button>
					<div class="collapse navbar-collapse text-center theme bg-light-brown bg-lg-transparent z-index-1" id="navbarSupportedContent">
						<?php
							if (has_nav_menu('primary')) {
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'container' => false,
									'menu_class' => 'menu-section navbar-nav ml-auto h-100 justify-content-center',
									)
								);
							}
					   ?>
					</div>
				</nav>
			</div>
		</div>
	</header>

	<div id="home_url" data-url="<?php echo get_template_directory_uri();?>"></div>
