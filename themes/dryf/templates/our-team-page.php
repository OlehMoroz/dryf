<?php
/**
 * Template Name: Our team page template
 * The template for displaying Our team template in the theme.
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
            <?php get_template_part( 'template-parts/team-section' ); ?>
        </div>
    </div>

<?php get_footer(); ?>