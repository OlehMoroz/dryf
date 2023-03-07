<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="employees-section">
    <div class="employees-container employee-slider slider">
        <div class="row row-cols-2">
            <div class="col-50 cl1">
                <h2 class="base-title heading">
                    В нас працюють справжні професіонали, котрі знають що роблять
                </h2>
            </div>
            <div class="col-50 cl2">
                <a href="<?= $our_team_page_url ?>" class="base-btn" data-event="learn-more">
                    <?= _e( $more_employees ); ?>
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
            І вони допоможуть вам влаштуватися на омріяну посаду закордоном!
        </p>
        <div class="swiper-wrapper">
            <?php
            $posts = get_posts(array(
                'numberposts' => 6,
                'post_type'   => 'team',
                'suppress_filters' => true,
            ));
            foreach ($posts as $post) {
            setup_postdata($post);
            ?>
            <!-- Slides -->
            <div class="swiper-slide col-20">
                <?= get_the_post_thumbnail($post, 'large')?>
                <div class="name-container">
                    <p class="employee-name">
                        <?php the_title() ?>
                    </p>
                    <p class="employee-job">
                        <?= get_field('position'); ?>
                    </p>
                </div>
            </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
</section>
