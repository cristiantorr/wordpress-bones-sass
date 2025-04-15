<footer class="full">
	<div class="wrapper-main center relative">
		<p><?php echo (is_page(24)) ? 'All rights reserved
' : 'derechos reservados ©'; ?> <?php echo date('Y'); ?></p>
		<?php

		if (has_nav_menu('main-social')) {
			// Verifica si estamos en la página con ID 24
			$menu_location = is_page(24) ? 'Follow us on' : 'Síguenos';

			wp_nav_menu(array(
				'menu' => 'main-social',  // Establece el menú según la página
				'theme_location' => 'main-social',  // Usa la misma ubicación
				'container' => 'div',
				'depth' => 1,
				'container_class' => 'redes',
				'items_wrap' => '<h6>' . $menu_location . ':</h6><ul id="%1s" class="%2s">%3s</ul>',

			));
		}
		; ?>
		<div class="line-bottom"></div>
	</div>
</footer>

<a href="#main-top" class="fixed-top-home">
	<img src="<?php echo get_stylesheet_directory_uri() . '/library/' ?>images/top.png" alt="">
</a>


<?php // all js scripts are loaded in library/bones.php ?>
<?php wp_footer(); ?>

</body>

</html> <!-- end of site. what a ride! -->