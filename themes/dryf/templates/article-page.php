<?php
/**
 * Template Name: Article page template
 * The template for displaying the Article template in the theme.
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
        <?php get_template_part( 'template-parts/article-section' ); ?>
    </div>
</div>


<?php get_footer(); ?>
