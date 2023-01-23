<?php
    include __DIR__ . '/lang/language.php';
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
            <?php if (have_rows('phones', $contact_page_id)) : 
                $count_phones = count(get_field('phones', $contact_page_id)); ?>

                <div class="phone-dropdown">
                    <?php  while (have_rows('phones', $contact_page_id)) : the_row();
                        if (get_sub_field('phone_0')) { 
                            while (have_rows('phone_0')) : the_row(); ?>
                            <div class="phone-toogle">
                                <div class="phone-name">
                                    <?= get_sub_field('account_name'); ?>
                                </div>
                                <a href="tel:<?= get_sub_field('phone_number'); ?>">
                                    <?= get_sub_field('phone_number'); ?>
                                </a>
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#arrow-down"></use>
                                </svg>
                            </div>
                        <?php endwhile; };

                        if ($count_phones > 1) { ?>
                            <div class="phone-list">
                                <?php for ($x = 0; $x <= $count_phones; ++$x) {
                                    if (get_sub_field('phone_' . $x)) { 
                                        while (have_rows('phone_' . $x)) : the_row(); ?>
                                            <div class="phone-list_item">
                                                <div class="phone-name">
                                                    <?= get_sub_field('account_name'); ?>
                                                </div>
                                                <a href="tel:<?= get_sub_field('phone_number'); ?>">
                                                <?= get_sub_field('phone_number'); ?>
                                                </a>
                                            </div>
                                <?php endwhile; } 
                                } ?>
                            </div>
                        <?php 
                        } endwhile; ?>
                </div>

            <?php endif; ?>

            <?php if (have_rows('emails', $contact_page_id)) : 
                $count_emails = count(get_field('emails', $contact_page_id)); 
                while (have_rows('emails', $contact_page_id)) : the_row();
                    for ($x = 0; $x <= $count_emails; ++$x) {
                        if (get_sub_field('email_' . $x)) { ?>
                                <div class="mail-link">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#mail"></use>
                                    </svg>
                                    <a href="mailto:<?= get_sub_field('email_' . $x); ?>">
                                        <?= get_sub_field('email_' . $x); ?>
                                    </a>
                                </div>
                            <?php 
                        } 
                    } 
                endwhile; ?>
            <?php endif; ?>
                
                <button class="base-btn" data-event="call">
                    <?= _e( $button_text ); ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </button>
                <div class="messenger-block">
                    <?php if (have_rows('social', $contact_page_id)) : 
                        while (have_rows('social', $contact_page_id)) : the_row();
                            if (get_sub_field('telegram')) { ?>
                                <a href="<?= get_sub_field('telegram'); ?>">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#telegram"></use>
                                    </svg>
                                </a>
                                <?php 
                            }

                            if (get_sub_field('viber')) { ?>
                                    <a href="<?= get_sub_field('viber'); ?>">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use xlink:href="#viber"></use>
                                        </svg>
                                    </a>
                                <?php 
                            }
                        endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- end header -->