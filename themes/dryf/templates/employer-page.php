<?php
/**
 * Template Name: Employer page template
 * The template for displaying the Employer template in the theme.
 *
 *
 * @package WordPress
 */

get_header();
?>

    <div class="page-container width-container">
        <!-- Sidebar -->

        <?php get_template_part( 'template-parts/side-menu' ); ?>

        <!-- End Sidebar -->

        <div class="content-col">
            <?php get_template_part( 'template-parts/employer-info-section' ); ?>
            <?php get_template_part( 'template-parts/employer-form-section' ); ?>
            <?php get_template_part( 'template-parts/employer-content-section' ); ?>
        </div>
    </div>

<?php get_footer(); ?>