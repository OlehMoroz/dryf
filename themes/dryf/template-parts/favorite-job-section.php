<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="favorite-job-section section">
    <div class="favorite-job-container favorite-job-slider slider">
        <div class="row row-cols-2">
            <div class="col-50 cl1">
                <h2 class="base-title heading">
                    <?= __($fovorite_job_title); ?>
                </h2>
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
        <p class="underheading-text above-slider-text">
            <?= __($fovorite_job_sub_title); ?>
        </p>
            <div class="swiper-wrapper">
                <!-- Slides -->

                <?php
                    $terms = get_terms( array(
                        'taxonomy' => 'job_category',
                        'hide_empty' => false,
                    ) );

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                    foreach ( $terms as $term ) { 
                        $count = $term->count;
                    ?>
                    
                    <div class="swiper-slide col-20">
                        <a href="<?= get_term_link( $term ); ?>">
                            <img class="vacancy-img" src="<?= get_field( 'image_featured', $term ); ?>" alt="<?= $term->name ?>" loading="lazy" >
                            <div class="name-container">
                                <div class="number-div">
                                    <p class="number-of-vacancies">
                                        <?= $count; ?> <?php if ($count == 0 || $count >= 5) { 
                                            echo $job; 
                                        } else if ($count >= 2 && $count <= 4) {
                                            echo $job_2; 
                                        } else {
                                            echo $job_1; 
                                        }?>
                                    </p>
                                </div>
                                <p class="vacancy-name">
                                    <?= $term->name ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <? }
                }
                ?>
            </div>
    </div>
</section>
