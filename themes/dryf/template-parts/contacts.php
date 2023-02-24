<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="contacts-of-company section">
    <div class="top-container">
        <div class="top-row">
            <div class="menu-column">
                <a class="menu-text">Головна</a>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a class="menu-text" id="active-menu">Наші контакти</a>
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
                <div class="info">
                    <div class="contact-row">
                        <a class="phone-circle-column" href="tel:+48515387589">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#another-phone-call"></use>
                            </svg>
                        </a>
                        <div class="contact-info-column">
                            <p class="underheading-text">
                                Наталя
                            </p>
                            <p class="number-text">
                                +48515387589
                            </p>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="contact-row">
                        <a class="phone-circle-column" href="tel:+48504639466">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#another-phone-call"></use>
                            </svg>
                        </a>
                        <div class="contact-info-column">
                            <p class="underheading-text">
                                Ілля
                            </p>
                            <p class="number-text">
                                +48504639466
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="email-container social-col">
                <p class="underheading-text">
                    E-mail:
                </p>
                <div class="info">
                    <div class="contact-row">
                        <a class="phone-circle-column" href="mailto:hiringdryftpl@gmail.com">
                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#email"></use>
                            </svg>
                        </a>
                        <div class="contact-info-column">
                            <p class="underheading-text">
                                Для роботодавців
                            </p>
                            <p class="number-text">
                                hiringdryftpl@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="info">
                    <div class="contact-row">
                        <a class="phone-circle-column" href="mailto:dryf@rekrutacja.com">
                            <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#email"></use>
                            </svg>
                        </a>
                        <div class="contact-info-column">
                            <p class="underheading-text">
                                Для пошуку роботи
                            </p>
                            <p class="number-text">
                                dryf@rekrutacja.com
                            </p>
                        </div>
                    </div>
                </div>
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
                Надіслати запит
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </a>
        </div>
    </div>
</section>