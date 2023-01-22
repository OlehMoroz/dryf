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

<?php get_template_part( '' ); ?>



<?php get_footer(); ?>