<div class="side-bar">
	<?php wp_nav_menu(array(
		'theme_location' => 'header_menu',
		'container' => 'div',
		'menu_class' => 'header-menu-list',
		'menu_id' => 'header-menu-list',
	)); ?>

    <div class="social-menu">
        <h4><?= _e( 'Ми в соц.мережах:' ); ?></h4>

        <div class="social-menu_row">
            <a href="">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#telegram-social"></use>
                </svg>
            </a>
            <a href="">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#viber-social"></use>
                </svg>
            </a>
            <a href="">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#facebook-social"></use>
                </svg>
            </a>
            <a href="">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#instagram-social"></use>
                </svg>
            </a>
        </div>
    </div>

    <div class="language-block">
        <ul>
            <?php pll_the_languages(array('show_flags' => 0, 'show_names' => 0,)); ?>
        </ul>
    </div>
</div>