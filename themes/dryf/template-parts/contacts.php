<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="contacts-of-company section">
    <div class="top-container">
        <div class="top-row">
            <div class="menu-column">
                <a class="menu-text" href="<?= $home_page_url ?>"><?= _e( $home_page_name ); ?></a>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a class="menu-text" id="active-menu"><?= _e( $contact_page_name ); ?></a>
                </div>
            </div>
        </div>
        <h2 class="base-title top-page-title">
            Контакти нашої компанії
        </h2>
    </div>
    <div class="company-contacts">
        <div class="contacts-column">
            <div class="phone-container social-col">
                <p class="underheading-text">
                    Телефони:
                </p>
                <?php if (have_rows('phones', $contact_page_id)) :
                $count_phones = count(get_field('phones', $contact_page_id)); ?>
                    <?php  while (have_rows('phones', $contact_page_id)) : the_row();
                    if ($count_phones > 1) { ?>
                    <?php for ($x = 0; $x <= $count_phones; ++$x) {
                    if (get_sub_field('phone_' . $x)) {
                    while (have_rows('phone_' . $x)) : the_row(); ?>
                <div class="info">
                    <div class="contact-row">
                        <a class="phone-circle-column" href="tel:<?= get_sub_field('phone_number'); ?>">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#another-phone-call"></use>
                            </svg>
                        </a>
                        <div class="contact-info-column">
                            <p class="underheading-text">
                                <?= get_sub_field('account_name'); ?>
                            </p>
                            <p class="number-text">
                                <?= get_sub_field('phone_number'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                    <?php endwhile; }
                    } ?>
                <?php
                } endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="social-col">
                <p class="underheading-text">
                    Email:
                </p>
                <?php if (have_rows('emails', $contact_page_id)) :
                    $count_emails = count(get_field('emails', $contact_page_id));
                $text_0 = 'Для роботодавців';
                $text_1 = 'Для пошуку роботи';
                    while (have_rows('emails', $contact_page_id)) : the_row();
                        for ($x = 0; $x <= $count_emails; ++$x) {
                            if (get_sub_field('email_' . $x)) { ?>
                                <div class="info">
                                    <div class="contact-row">
                                        <a class="phone-circle-column" href="mailto:<?= get_sub_field('email_' . $x); ?>">
                                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="#email"></use>
                                            </svg>
                                        </a>
                                        <div class="contact-info-column">
                                            <?php if ($x == 0) { ?>
                                            <p class="underheading-text">
                                                <?= __( $text_0); ?>
                                            </p>
                                            <?php } else { ?>
                                            <p class="underheading-text">
                                                <?= __( $text_1); ?>
                                            </p>
                                            <?php } ?>
                                            <p class="number-text">
                                                <?= get_sub_field('email_' . $x); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="social-menu">
                <div class="social-menu_row">
                    <h4>Ми в соціальних мережах</h4>
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
        </div>
        <div class="form-column">
            <h2 class="base-title heading">Обрали вакансію та не знаєте що робити далі?</h2>
            <p class="form-text">Заповніть форму і ми вам зателефонуємо!</p>
            <div class="form-section">

            </div>
            <a href="#" class="base-btn form-btn" data-event="learn-more">
                <?= _e( $send_request2 ); ?>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </a>
        </div>
    </div>
</section>