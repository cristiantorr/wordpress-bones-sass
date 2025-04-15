<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<?php // force Internet Explorer to use the latest rendering engine available ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(''); ?></title>

	<?php // mobile meta (hooray!) ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
	<?php // or, set /favicon.ico for IE10 win ?>
	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage"
		content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<meta name="theme-color" content="#121212">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php // wordpress head functions ?>
	<?php wp_head(); ?>
	<?php // end of wordpress head ?>

	<?php // drop Google Analytics Here ?>
	<?php // end analytics ?>

</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<header id="main-top" class="full clear-fix">
		<div class="line-top"></div>
		<!-- Menú hamburguesa -->
		<div id="nav-toogle">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="wrapper-main center flex flex-center">

			<?php

			if (has_nav_menu('main-en') || has_nav_menu('main-es')) {
				// Verifica si estamos en la página con ID 24
				$menu_location = is_page(24) ? 'main-en' : 'main-es';

				wp_nav_menu(array(
					'menu' => $menu_location,  // Establece el menú según la página
					'theme_location' => $menu_location,  // Usa la misma ubicación
					'container' => 'nav',
					'depth' => 1,
					'container_class' => '',
					'items_wrap' => '<ul id="%1s" class="%2s">%3s</ul>',
				));
			}


			?>
			<div class="main-multilenguaje">
				<?php

				if (has_nav_menu('main-social')) {
					// Verifica si estamos en la página con ID 24
				

					wp_nav_menu(array(
						'menu' => 'main-social',  // Establece el menú según la página
						'theme_location' => 'main-social',  // Usa la misma ubicación
						'container' => 'div',
						'depth' => 1,
						'container_class' => 'redes',
						'items_wrap' => '<ul id="%1s" class="%2s">%3s</ul>',
					));
				}
				; ?>
				<div class="multilenguaje">
					<ul>
						<li class="<?php echo !is_page(24) ? 'activo' : ' '; ?>">
							<a href="<?php echo site_url("en"); ?>">
								<img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/ic-3.png" alt="">

							</a>
						</li>
						<li class="<?php echo is_page(24) ? 'activo' : ' '; ?>">
							<a href="<?php echo home_url(); ?>">

								<img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/ic-3-hover.png" alt="">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php //echo get_search_form(); ?>
	</header>