<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="popular-job-section section">
    <div class="popular-job-slider slider">
        <div class="row row-cols-2">
            <div class="col-50">
                <h2 class="base-title heading">
                    <?= $heading; ?>
                </h2>
                <p class="underheading-text above-slider-text">
                    <?= $home_popular_sub_title; ?>
                </p>
            </div>
            <div class="col-50 cl2">
                <a href="<?= $job_page_url ?>" class="base-btn" data-event="learn-more">
                    <?= _e( $show_more_vacancies ); ?>
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
        <div class="swiper-wrapper">
        <?php
            $posts = get_posts(array(
                'numberposts' => 12,
                'post_type'   => 'jobs',
                'suppress_filters' => true,
            ));
            foreach ($posts as $post) {
                setup_postdata($post);
            ?>
            <div class="popular-job-column swiper-slide">
                <a href="<?= the_permalink(); ?>" class="popular-job-block">
                    <?= get_the_post_thumbnail($post, 'large', array('class' => 'vacancy-img'))?>
                    <div class="text-block">
                        <p class="vacancy-heading">
                            <?php the_title() ?>
                        </p>
                        <p class="price">
                            <?= get_field('salary_min'); ?> <?php if (get_field('salary_max') ) { echo ' - ' . get_field('salary_max'); } ?> <?= get_field('currency'); ?>
                        </p>
                        <div class="places">
                            <?php
                                $terms = get_the_terms( get_the_ID(), 'job_city' );
                                if ( $terms && ! is_wp_error( $terms ) ) {
                                    foreach ( $terms as $term ) { ?>
                                        <div class="city">
                                            <div class="city-svg">
                                                <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <use xlink:href="#mark"></use>
                                                </svg>
                                            </div>
                                            <p class="city-name">
                                                <?= $term->name; ?>
                                            </p>
                                        </div>
                                    <? }
                                }
                            ?>
                            <div class="more-cities one"><?= __( $one_city ); ?></div>
                            <div class="more-cities default"><?= __( $more_city ); ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </div>
</section>