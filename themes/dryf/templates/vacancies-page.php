<?php
/**
 * Template Name: Vacancies page template
 * The template for displaying the Vacancies template in the theme.
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
            <?php get_template_part( 'template-parts/many-vacancies-section' ); ?>
        </div>
    </div>

<?php get_footer(); ?>