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

<div class="page-container width-container">
	<!-- Sidebar -->

	<?php get_template_part( 'template-parts/side-menu' ); ?>

	<!-- End Sidebar -->

	<div class="content-col">

	</div>
</div>


<?php if( $field = get_field_object('') ): ?>
    <?= $field['']; ?>
<?php endif; ?>


<?php get_footer(); ?>