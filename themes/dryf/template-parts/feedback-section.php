<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="feedback-section section">
    <div class="feedback-container feedback-slider slider">
        <div class="row row-cols-2">
            <div class="col-50 cl1">
                <h2 class="base-title heading">
                    Відгуки від наших клієнтів, котрі вже працюють закордоном
                </h2>
            </div>
            <div class="col-50 cl2">
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
                        <div class="city margin-b-city">
                            <div class="city-svg">
                                <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#mark"></use>
                                </svg>
                            </div>
                            <p class="city-name">
                                <?= get_field('city'); ?>
                            </p>
                        </div>
                        <?php the_content() ?>
                        <p class="name">
                            <?= get_field('name'); ?>
                        </p>
                    </div>
                </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
</section>
