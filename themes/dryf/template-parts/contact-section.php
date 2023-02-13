<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="contact-section">
    <div class="contact-container">
        <div class="container-inner">
            <div class="contact-container-text">
                <p class="contact-container-p" >
                    <?= _e( $contact_section_title ); ?>
                </p>
            </div>
            <div class="contacts">
            <?php if (have_rows('phones', $contact_page_id)) : 
                $count_phones = count(get_field('phones', $contact_page_id)); ?>
                <?php  while (have_rows('phones', $contact_page_id)) : the_row();
                    if ($count_phones > 1) { ?>
                        <?php for ($x = 0; $x <= $count_phones; ++$x) {
                            if (get_sub_field('phone_' . $x)) { 
                                while (have_rows('phone_' . $x)) : the_row(); ?>
                                <div class="phone-number">
                                    <a class="phone-circle" href="tel:<?= get_sub_field('phone_number'); ?>">
                                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use xlink:href="#phone-call"></use>
                                        </svg>
                                    </a>
                                    <a href="tel:<?= get_sub_field('phone_number'); ?>" class="phone-number-text">
                                        <?= get_sub_field('phone_number'); ?>
                                    </a>
                                </div>
                        <?php endwhile; } 
                    } ?>
                <?php 
                } endwhile; ?>
            <?php endif; ?>
                <div class="contact-social">
                    <?php if (have_rows('social', $contact_page_id)) :
                        while (have_rows('social', $contact_page_id)) : the_row();
                            if (get_sub_field('telegram')) { ?>
                                <a class="contact-social-links" href="<?= get_sub_field('telegram'); ?>">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#telegram-social"></use>
                                    </svg>
                                </a>
                                <?php
                            }
                    if (get_sub_field('viber')) { ?>
                        <a class="contact-social-links" href="<?= get_sub_field('viber'); ?>">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#viber-social"></use>
                            </svg>
                        </a>
                        <?php } endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


