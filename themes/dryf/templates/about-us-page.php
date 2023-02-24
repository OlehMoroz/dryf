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

    <div class="content-col">
        <?php get_template_part( 'template-parts/about-company-section' ); ?>
        <?php get_template_part( 'template-parts/description-section' ); ?>
        <?php get_template_part( 'template-parts/happy-woman-section' ); ?>
        <?php get_template_part( 'template-parts/employees-section' ); ?>
        <?php get_template_part( 'template-parts/description-scroll-section' ); ?>
        <?php get_template_part( 'template-parts/contact-section' ); ?>
    </div>
</div>


<?php get_footer(); ?>
