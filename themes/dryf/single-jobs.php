<?php
/**
 * Template Name: Vacancy page template
 * The template for displaying the Vacancy template in the theme.
 *
 *
 * @package WordPress
 */
include __DIR__ . '/lang/language.php';

get_header();
?>

<div class="page-container width-container">
    <!-- Sidebar -->

    <?php get_template_part( 'template-parts/side-menu' ); ?>

    <!-- End Sidebar -->

    <main class="content-col">
        <section class="about-vacancy-section section">
            <div class="about-vacancy-container" style="background: url('<?= get_the_post_thumbnail_url($post, 'large')?>') center/cover no-repeat;">
                <div class="breadcrumbs-row menu-row">
                    <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                </div>
                <div class="content-block">
                    <h1 class="job-name">
                        <?php the_title() ?>
                    </h1>
                    <p class="salary"><?= get_field('salary_min'); ?> <?php if (get_field('salary_max') ) { echo ' - ' . get_field('salary_max'); } ?> <?= get_field('currency'); ?> <?= $in_month; ?></p>
                    <div class="locations">
                        <p class="locations-text">
                            <?= $locations; ?>
                        </p>
                        <div class="places">
                            <?php
                                $terms = get_the_terms( get_the_ID(), 'job_city' );
                                if ( $terms && ! is_wp_error( $terms ) ) {
                                    foreach ( $terms as $term ) { ?>
                                        <a class="city" href="/job-city/<?= $term->slug; ?>">
                                            <span class="city-svg">
                                                <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <use xlink:href="#mark"></use>
                                                </svg>
                                            </span>
                                            <span class="city-name">
                                                <?= $term->name; ?>
                                            </span>
                                        </a>
                                    <? }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="tag-block">
                        <?php
                            $terms = get_the_terms( get_the_ID(), 'job_feautered' );
                            if ( $terms && ! is_wp_error( $terms ) ) {
                                foreach ( $terms as $term ) { ?>
                                    <a class="tag-item" href="/job-feautered/<?= $term->slug; ?>">
                                        <span class="tag-text"><?= $term->name; ?></span>
                                    </a>
                                <? }
                            }
                        ?>
                    </div>

                </div>
                <a href="#job-form" class="base-btn" data-event="learn-more">
                    <?= _e( $respond ); ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>
            </div>
        </section>

        <?php get_field('conditions');
            if (have_rows('conditions')) : 
            while (have_rows('conditions')) : the_row(); ?>

            <section class="conditions-section section">
                <h2 class="base-title heading"><?= __($conditions); ?></h2>
                <div class="conditions-row">
                    <?php if (get_sub_field('rate')) { ?>
                        <div class="column">
                            <p class="conditions-heading">
                                <?= __($rate); ?>
                            </p>
                            <p class="text">
                                <?= get_sub_field('rate'); ?>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (get_sub_field('work_schedule')) { ?>
                        <div class="column">
                            <p class="conditions-heading">
                                <?= __($work_schedule); ?>
                            </p>
                            <p class="text">
                                <?= get_sub_field('work_schedule'); ?>
                            </p>
                        </div>
                    <?php } ?>

                    <?php if (get_sub_field('working_hours')) { ?>
                        <div class="column">
                            <p class="conditions-heading">
                                <?= __($work_hours); ?>
                            </p>
                            <p class="text">
                                <?= get_sub_field('working_hours'); ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </section>

        <?php
            endwhile; 
        endif; ?>
        
        <section class="about-employer-section section">
        <?php if (get_field('employer_description') || get_field('employer_phone') || get_field('employer_email')) { ?>
            <div class="about-employer-column">
                <div class="employer-info description">
                    <h2 class="base-title heading"><?= __( $about_employer ); ?></h2>
                    <?= get_field('employer_description'); ?>
                </div>
                <div class="contact-employer">
                    <h2 class="base-title heading"><?= __($contact_employer); ?></h2>
                    <div class="conditions-row">
                        <?php if (get_field('employer_phone')) { ?>
                            <div class="column">
                                <p class="conditions-heading">
                                    <?= __($phone_employer); ?>
                                </p>
                                <a href="tel:<?= get_field('employer_phone'); ?>" class="text">
                                    <?= get_field('employer_phone'); ?>
                                </a>
                            </div>
                        <?php } ?>
                        <?php if (get_field('employer_email')) { ?>
                            <div class="column">
                                <p class="conditions-heading">
                                    <?= __($email_employer); ?>
                                </p>
                                <a href="mailto:<?= get_field('employer_email'); ?>" class="text">
                                    <?= get_field('employer_email'); ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
            <div class="form-column" id='job-form'>
                <?= do_shortcode($job_page_form); ?>
            </div>
        </section>

        <?php
            $similar_vacancy = get_field('similar_vacancy');
            if( $similar_vacancy ): ?>
            <section class="popular-job-section section">
                <div class="popular-job-slider slider">
                    <div class="row row-cols-2">
                        <div class="col-50">
                            <h2 class="base-title heading">
                                <?= __( $recomended_vacancy ); ?>
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
                        <?php foreach( $similar_vacancy as $vacancy ): 
                            $permalink = get_permalink( $vacancy->ID );
                            $title = get_the_title( $vacancy->ID );
                            $custom_field = get_field( 'field_name', $vacancy->ID );
                            ?>


                            <div class="popular-job-column swiper-slide">
                                <a href="<?= $permalink ?>" class="popular-job-block">
                                    <?= get_the_post_thumbnail($vacancy, 'large', array('class' => 'vacancy-img'))?>
                                    <div class="text-block">
                                        <p class="vacancy-heading">
                                            <?= $title; ?>
                                        </p>
                                        <p class="price">
                                            <?= get_field('salary_min', $vacancy->ID); ?> <?php if (get_field('salary_max', $vacancy->ID) ) { echo ' - ' . get_field('salary_max', $vacancy->ID); } ?> <?= get_field('currency', $vacancy->ID); ?>
                                        </p>
                                        <div class="places">
                                            <?php
                                                $terms = get_the_terms( $vacancy->ID, 'job_city' );
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <div class="remainder-jobs_modal" data-id='<?= get_the_ID(); ?>'>
            <button class="remainder-close"></button>
            <div class="remainder-image">
                <img src="/wp-content/themes/dryf/images/common/clock.png" alt="dryf clock" loading="lazy">
            </div>
            <div class="remainder-content">
                <h4><?= __( $reminded_title ); ?></h4>
                <div class="remainder-count">
                    <?= __( $reminded_text_one ); ?> <span></span> <?= __( $reminded_text_two ); ?>
                </div>
                <a href="#job-form">
                    <?= __( $reminded_link ); ?>
                </a>
            </div>
        </div>
    </main>
</div>


<?php get_footer(); ?>
