<?php
/**
 * Template Name: Home page template
 * The template for displaying the Home template in the theme.
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
		<?php get_template_part( 'template-parts/home-slider' ); ?>
        <?php get_template_part( 'template-parts/contact-section' ); ?>
        <?php get_template_part( 'template-parts/advantages-section' ); ?>
		<?php get_template_part( 'template-parts/about-section' ); ?>
	</div>
</div>


<?php if( $field = get_field_object('') ): ?>
    <?= $field['']; ?>
<?php endif; ?>


<?php get_footer(); ?>
