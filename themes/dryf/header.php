<?php

?>

<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<?php wp_head(); ?>

    </head>
	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

    <!-- header -->

    <header>
        <div class="container width-container">
            <div class="header-logo">
                <?php the_custom_logo(); ?>
            </div>
            
            <div class="header-container">
                <div class="phone-dropdown">
                    <div class="phone-toogle">
                        <div class="phone-flag">
                            <img src="" alt="">
                        </div>
                        <a href="tel:+38099999999999">
                            +38099999999999
                        </a>
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#arrow-down"></use>
                        </svg>
                    </div>
                    <div class="phone-list">
                        <div class="phone-list_item">
                            <div class="phone-flag">
                                <img src="" alt="">
                            </div>
                            <a href="tel:+38099999999999">
                                +38099999999999
                            </a>
                        </div>
                        <div class="phone-list_item">
                            <div class="phone-flag">
                                <img src="" alt="">
                            </div>
                            <a href="tel:+38099999999999">
                                +38099999999999
                            </a>
                        </div>
                        <div class="phone-list_item">
                            <div class="phone-flag">
                                <img src="" alt="">
                            </div>
                            <a href="tel:+38099999999999">
                                +38099999999999
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mail-link">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#mail"></use>
                    </svg>
                    <a href="mailto:robota@dryf.com.ua">
                        robota@dryf.com.ua
                    </a>
                </div>
                
                <button class="base-btn" data-event="call">
                    <?= _e( 'Замовити дзвінок' ); ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </button>
                <div class="messenger-block">
                    <a href="">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#telegram"></use>
                        </svg>
                    </a>
                    <a href="">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#viber"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- end header -->