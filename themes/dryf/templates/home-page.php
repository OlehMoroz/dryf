<?php
/**
 * Template Name: Home page template
 * The template for displaying the Home template in the theme.
 * 
 *
 * @package WordPress
 */

get_header();
?>

<?php if( $field = get_field_object('') ): ?>
                    <?= $field['']; ?>
                <?php endif; ?>

                <?php echo do_shortcode('[post_taxonomy_filters]'); ?>

<!-- start services section -->

<?php get_template_part( '' ); ?>

<!-- end services section -->

<!-- start relax section -->

<?php get_footer();