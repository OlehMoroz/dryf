<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="popular-job-section section">
    <div class="popular-job-slider slider">
        <div class="row row-cols-2">
            <div class="col-50">
                <h2 class="base-title heading">
                    Найпопулярніші вакансії на сьогодні
                </h2>
            </div>
            <div class="col-50 cl2">
                <a href="#" class="base-btn" data-event="learn-more">
                    Показати всі вакансії
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
        <p class="underheading-text above-slider-text">
            Обери гідну роботу для себе
        </p>
        <div class="swiper-wrapper">
            <?php
            $posts = get_posts(array(
                'numberposts' => 6,
                'post_type'   => 'vacancies',
                'suppress_filters' => true,
            ));
            foreach ($posts as $post) {
            setup_postdata($post);
            ?>
            <div class="popular-job-column swiper-slide">
                <a href="http://localhost:10029/vacancy-page/" class="popular-job-block">
                    <?= get_the_post_thumbnail($post, 'large', array('class' => 'vacancy-img'))?>
                    <div class="text-block">
                        <p class="vacancy-heading">
                            <?php the_title() ?>
                        </p>
                        <p class="price">
                            <?= get_field('price'); ?>
                        </p>
                        <div class="places">
                                <div class="city">
                                    <div class="city-svg">
                                        <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use xlink:href="#mark"></use>
                                        </svg>
                                    </div>
                                    <p class="city-name">
                                        <?= get_field('city_0'); ?>
                                    </p>
                                </div>
                            <div class="city">
                                <div class="city-svg">
                                    <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#mark"></use>
                                    </svg>
                                </div>
                                <p class="city-name">
                                    <?= get_field('city_1'); ?>
                                </p>
                            </div>
                            <div class="city">
                                <div class="city-svg">
                                    <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#mark"></use>
                                    </svg>
                                </div>
                                <p class="city-name">
                                    <?= get_field('city_2'); ?>
                                </p>
                            </div>
                                <div class="city">
                                    <div class="city-svg">
                                        <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use xlink:href="#mark"></use>
                                        </svg>
                                    </div>
                                    <p class="city-name more-cities">
                                        ще +5 локацій
                                    </p>
                                </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } wp_reset_postdata(); ?>
    </div>
</section>