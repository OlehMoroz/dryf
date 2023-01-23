<?php include __DIR__ . '/../lang/language.php'; ?>

<div class="side-bar">
	<?php wp_nav_menu(array(
		'theme_location' => 'header_menu',
		'container' => 'div',
		'menu_class' => 'header-menu-list',
		'menu_id' => 'header-menu-list',
	)); ?>

    <div class="social-menu">
        <h4><?= _e( $social_title ); ?></h4>

        <div class="social-menu_row">
        <?php if (have_rows('social', $contact_page_id)) : 
            while (have_rows('social', $contact_page_id)) : the_row();
                if (get_sub_field('telegram')) { ?>
                    <a href="<?= get_sub_field('telegram'); ?>">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#telegram-social"></use>
                        </svg>
                    </a>
                    <?php 
                }

                if (get_sub_field('viber')) { ?>
                        <a href="<?= get_sub_field('viber'); ?>">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#viber-social"></use>
                            </svg>
                        </a>
                    <?php 
                }

                if (get_sub_field('facebook')) { ?>
                    <a href="<?= get_sub_field('instagram'); ?>">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#facebook-social"></use>
                        </svg>
                    </a>
                <?php 
                }

                if (get_sub_field('instagram')) { ?>
                    <a href="<?= get_sub_field('instagram'); ?>">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#instagram-social"></use>
                        </svg>
                    </a>
                <?php 
                }
            endwhile; ?>
        <?php endif; ?>
        </div>
    </div>

    <div class="language-block">
        <ul>
            <?php pll_the_languages(array('show_flags' => 0, 'show_names' => 0,)); ?>
        </ul>
    </div>
</div>