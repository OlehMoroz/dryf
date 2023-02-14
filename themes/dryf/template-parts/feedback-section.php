<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="feedback-section">
    <div class="feedback-container feedback-slider">
        <div class="row row-cols-2">
            <div class="col-50 cl1">
                <p class="heading">
                    Відгуки від наших клієнтів, котрі вже працюють закордоном
                </p>
            </div>





            <div class="col-50 cl2">
                <a href="#" class="base-btn" data-event="learn-more">
                    Більше працівників
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>
                <div class="swiper-buttons">
                    <div class="swiper-button swiper-button-prev">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#triangle-right"></use>
                        </svg>
                    </div>
                    <div class="swiper-button swiper-button-next">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#triangle-left"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <p class="underheading-text">
            Та отримують бажаний заробіток
        </p>
        <div class="swiper-wrapper">
            <?php
            $posts = get_posts(array(
                'numberposts' => 6,
                'post_type'   => 'feedback',
                'suppress_filters' => true,
            ));

            foreach ($posts as $post) {
                setup_postdata($post);
                ?>
                <div class="swiper-slide feedback-column">
                    <div class="feedback-block">
                        <p class="heading">
                            <?php the_title() ?>
                        </p>
                        <div class="city">
                            <div class="city-svg">
                                <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 0.666992C2.74251 0.666992 0.916672 2.49283 0.916672 4.75033C0.916672 7.81283 5 12.3337 5 12.3337C5 12.3337 9.08334 7.81283 9.08334 4.75033C9.08334 2.49283 7.2575 0.666992 5 0.666992ZM5 6.20866C4.61323 6.20866 4.2423 6.05501 3.96881 5.78152C3.69532 5.50803 3.54167 5.1371 3.54167 4.75033C3.54167 4.36355 3.69532 3.99262 3.96881 3.71913C4.2423 3.44564 4.61323 3.29199 5 3.29199C5.38678 3.29199 5.75771 3.44564 6.0312 3.71913C6.30469 3.99262 6.45834 4.36355 6.45834 4.75033C6.45834 5.1371 6.30469 5.50803 6.0312 5.78152C5.75771 6.05501 5.38678 6.20866 5 6.20866Z"/>
                                </svg>
                            </div>
                            <p>
                                Ґданськ
                            </p>
                        </div>
                        <p class="feedback">
                            <?php the_content(); ?>
                        </p>
                        <p class="name">
                            Олександр
                        </p>
                    </div>
                </div>

                <!--<?php the_permalink(); ?>"><?php the_post_thumbnail() ?>-->

            <?php }
            wp_reset_postdata(); ?>
            <div class="feedback-column swiper-slide">
                <div class="feedback-block">
                    <p class="heading">
                        Завод LG
                    </p>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 0.666992C2.74251 0.666992 0.916672 2.49283 0.916672 4.75033C0.916672 7.81283 5 12.3337 5 12.3337C5 12.3337 9.08334 7.81283 9.08334 4.75033C9.08334 2.49283 7.2575 0.666992 5 0.666992ZM5 6.20866C4.61323 6.20866 4.2423 6.05501 3.96881 5.78152C3.69532 5.50803 3.54167 5.1371 3.54167 4.75033C3.54167 4.36355 3.69532 3.99262 3.96881 3.71913C4.2423 3.44564 4.61323 3.29199 5 3.29199C5.38678 3.29199 5.75771 3.44564 6.0312 3.71913C6.30469 3.99262 6.45834 4.36355 6.45834 4.75033C6.45834 5.1371 6.30469 5.50803 6.0312 5.78152C5.75771 6.05501 5.38678 6.20866 5 6.20866Z"/>
                            </svg>
                        </div>
                        <p>
                            Ґданськ
                        </p>
                    </div>
                    <p class="feedback">
                        Вакансія була підібрана так як і хотів. Робота нелегка, але добреоплачувана... На самому заводі де працював відношення супер не було якоїсь зневаги чи знущання бо українці, а навпаки допомагали чим могли.... Житло надавалося безкоштовно, тому там взагалі питань немає :)
                    </p>
                    <p class="name">
                        Олександр
                    </p>
                </div>
            </div>
            <div class="feedback-column swiper-slide">
                <div class="feedback-block">
                    <p class="heading">
                        Завод LG
                    </p>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 0.666992C2.74251 0.666992 0.916672 2.49283 0.916672 4.75033C0.916672 7.81283 5 12.3337 5 12.3337C5 12.3337 9.08334 7.81283 9.08334 4.75033C9.08334 2.49283 7.2575 0.666992 5 0.666992ZM5 6.20866C4.61323 6.20866 4.2423 6.05501 3.96881 5.78152C3.69532 5.50803 3.54167 5.1371 3.54167 4.75033C3.54167 4.36355 3.69532 3.99262 3.96881 3.71913C4.2423 3.44564 4.61323 3.29199 5 3.29199C5.38678 3.29199 5.75771 3.44564 6.0312 3.71913C6.30469 3.99262 6.45834 4.36355 6.45834 4.75033C6.45834 5.1371 6.30469 5.50803 6.0312 5.78152C5.75771 6.05501 5.38678 6.20866 5 6.20866Z"/>
                            </svg>
                        </div>
                        <p>
                            Ґданськ
                        </p>
                    </div>
                    <p class="feedback">
                        Вакансія була підібрана так як і хотів. Робота нелегка, але добреоплачувана... На самому заводі де працював відношення супер не було якоїсь зневаги чи знущання бо українці, а навпаки допомагали чим могли.... Житло надавалося безкоштовно, тому там взагалі питань немає :)
                    </p>
                    <p class="name">
                        Олександр
                    </p>
                </div>
            </div>
            <div class="feedback-column swiper-slide">
                <div class="feedback-block">
                    <p class="heading">
                        Завод LG
                    </p>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p>
                            Ґданськ
                        </p>
                    </div>
                    <p class="feedback">
                        Вакансія була підібрана так як і хотів. Робота нелегка, але добреоплачувана... На самому заводі де працював відношення супер не було якоїсь зневаги чи знущання бо українці, а навпаки допомагали чим могли.... Житло надавалося безкоштовно, тому там взагалі питань немає :)
                    </p>
                    <p class="name">
                        Олександр
                    </p>
                </div>
            </div>
            <div class="feedback-column swiper-slide">
                <div class="feedback-block">
                    <p class="heading">
                        Завод LG
                    </p>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p>
                            Ґданськ
                        </p>
                    </div>
                    <p class="feedback">
                        Вакансія була підібрана так як і хотів. Робота нелегка, але добреоплачувана... На самому заводі де працював відношення супер не було якоїсь зневаги чи знущання бо українці, а навпаки допомагали чим могли.... Житло надавалося безкоштовно, тому там взагалі питань немає :)
                    </p>
                    <p class="name">
                        Олександр
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>