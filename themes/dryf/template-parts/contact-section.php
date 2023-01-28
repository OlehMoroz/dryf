<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="contact-section">
    <div class="contact-container">
        <div class="container-inner">
            <div class="contact-container-text">
                <p class="contact-container-p" >
                    Ми завжди на зв’язку, щоб знайти вам роботу!
                </p>
            </div>
            <div class="contacts">
                <div class="phone-number">
                    <a class="phone-circle" href="">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#phone-call"></use>
                        </svg>
                    </a>
                    <p class="phone-number-text">
                        +48 (515) 38-75-89
                    </p>
                </div>
                <div class="phone-number">
                        <a class="phone-circle" href="">
                            <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#phone-call"></use>
                            </svg>
                        </a>
                        <p class="phone-number-text">
                            +48 (504) 63-94-66
                        </p>

                </div>
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


