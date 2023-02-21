<?php
/**
 * Template Name: Vacancy page template
 * The template for displaying the Vacancy template in the theme.
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
        <?php get_template_part( 'template-parts/about-vacancy-section' ); ?>
        <?php get_template_part( 'template-parts/conditions-section' ); ?>
        <?php get_template_part( 'template-parts/about-employer-section' ); ?>
    </div>
</div>


<?php get_footer(); ?>
