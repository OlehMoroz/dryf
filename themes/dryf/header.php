<?php

?>

<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<?php wp_head(); ?>

    </head>
    <script>
        $("html").css('overflow-y', 'hidden');
        (function counter() {
            var count = setInterval(function () {
                var c = parseInt($(".progress-bar_percent").text());
                if (c !== 100) {
                $(".progress-bar_percent").text((++c).toString() + '%');
                $(".progress-bar div").css('width', `${(++c).toString()}%`);
                } else {
                $(".progress-bar_percent").text(100 + '%');
                $(".progress-bar div").css('width', '100%');
                $( "#preloader" ).fadeOut(500, function() {
                    $( "html" ).css('overflow-y', 'auto');
                    $( "#preloader" ).remove();
                });
                clearInterval(count);
                }
            }, 25);
        })();
    </script>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

    <!-- header -->

    <?php the_custom_logo(); ?>

    <?php wp_nav_menu(array(
        'theme_location' => 'header_menu',
        'container' => 'div',
        'menu_class' => 'header-menu-list',
        'menu_id' => 'header-menu-list',
    )); ?>

    <!-- end header -->