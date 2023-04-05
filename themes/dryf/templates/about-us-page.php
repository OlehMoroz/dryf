<?php
/**
 * Template Name: About us page template
 * The template for displaying the About us template in the theme.
 *
 *
 * @package WordPress
 */
include __DIR__ . '/../lang/language.php';

get_header();
?>

<div class="page-container width-container">
    <!-- Sidebar -->

    <?php get_template_part( 'template-parts/side-menu' ); ?>

    <!-- End Sidebar -->

    <main class="content-col">
        <section class="about-company-section section">
            <div class="about-company-container" style="background-image: linear-gradient(90deg, #272930 0%, rgba(39, 41, 48, 0) 100%), url('<?= get_the_post_thumbnail_url($post, 'large'); ?>');">
                <div class="breadcrumbs-row menu-row">
                    <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                </div>
                <h1 class="about-company-heading">
                    <?= get_field('page_title'); ?>
                </h1>
                <p class="about-company-text">
                    <?= get_field('page_subtitle'); ?>
                </p>
            </div>
        </section>

        <?php
            $heading = $about_us_advantages;
            include get_template_directory() . '/template-parts/advantages-section.php';
        ?>

        <section class="description-section section">
                <div class="description">
                    <h2 class="base-title heading">
                        <?= get_field('text_title'); ?>
                    </h2>
                    <p class="text">
                        <?= get_field('text_content'); ?>
                    </p>
                </div>
        </section>

        <section class="happy-woman-section section">
            <div class="text-col">
                <p class="credo">
                    <?= get_field('banner_sub_title'); ?>
                </p>
                <h2 class="base-title heading">
                    <?= get_field('banner_title'); ?>
                </h2>
                <p class="underheading-text happy-woman-text">
                    <?= get_field('banner_content'); ?>
                </p>
                <a href="<?= get_field('banner_link'); ?>" class="base-btn form-btn" data-event="learn-more">
                    <?= get_field('banner_link_text'); ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>
            </div>
            <div class="img-col">
                <div class="text-box">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#heart"></use>
                    </svg>
                    <p class="text-box-text">
                        <?= get_field('banner_image_text'); ?>
                    </p>
                </div>
                <img src="<?= get_field('banner_image'); ?>" class="background-img" alt="<?= get_field('banner_title'); ?>" loading="lazy">
            </div>
        </section>

        <?php get_template_part( 'template-parts/employees-section' ); ?>

        <section class="description-scroll-section section">
            <div class="description">
                <h2 class="base-title heading">
                    <?= get_field('long_text_title'); ?>
                </h2>
                <div class="scroll-box">
                    <?= get_field('long_text'); ?>
                </div>
            </div>
        </section>

        <?php get_template_part( 'template-parts/contact-section' ); ?>
    </main>
</div>


<?php get_footer(); ?>
