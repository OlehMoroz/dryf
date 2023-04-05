<?php
/**
 * Template Name: Article page template
 * The template for displaying the Article template in the theme.
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
        <section class="article-section section">
            <div class="top-container">
                <div class="breadcrumbs-row top-row">
                    <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                </div>
                <div class="row-cols-2">
                    <div class="col-50">
                        <h2 class="base-title top-page-title">
                            <?php the_title(); ?>
                        </h2>
                    </div>
                    <div class="col-50 date-col">
                        <div class="article-date">
                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#date"></use>
                            </svg>
                            <p class="date-text">
                                <?= get_the_date('d.m.Y'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description">
                <?php the_content(); ?>
            </div>

            <div class="under-article-row">
                <div class="col-50 social-col">
                    <p class="article-social-text">
                        <?= __( $repost_text ); ?>
                    </p>
                    <div class="row">
                        <a class="social-circle" href="https://twitter.com/intent/tweet?url=<?= get_the_permalink(); ?>">
                            <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#twitter"></use>
                            </svg>
                        </a>
                        <a class="social-circle" href="https://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink(); ?>">
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#facebook"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-50 copy-col">
                    <button class="copy-article">
                        <div class="inner-div">
                            <div class="svg-container">
                                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use xlink:href="#copy"></use>
                                </svg>
                            </div>
                            <p class="copy-text">
                                <?= __( $copy_link ); ?>
                            </p>
                        </div>
                    </button>
                </div>
            </div>
        </section>

        <?php
			$candidate_image = '/wp-content/themes/dryf/images/common/worker-4.png';
			$employer_image = '/wp-content/themes/dryf/images/common/businessman-4.png';
			$form_color = 'orange';
			$candidate_form_shortcode = $candidate_form_shortcode;
			$employer_form_shortcode = $employer_form_shortcode;

			include get_template_directory() . '/template-parts/cta-form.php'; ?>
    </main>
</div>


<?php get_footer(); ?>
