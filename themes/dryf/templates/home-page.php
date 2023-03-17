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
        <?php get_template_part( 'template-parts/favorite-job-section' ); ?>
        <?php
        $heading = 'Найпопулярніші вакансії на сьогодні';
        include get_template_directory() . '/template-parts/popular-job-section.php';
        ?>
        <?php get_template_part( 'template-parts/employees-section' ); ?>
        <?php get_template_part( 'template-parts/contact-section' ); ?>
        <?php
        $heading = 'Чому варто обирати нашу компанію для пошуку роботи закордоном?';
        include get_template_directory() . '/template-parts/advantages-section.php';
        ?>
        <?php get_template_part( 'template-parts/feedback-section' ); ?>
		<?php get_template_part( 'template-parts/about-section' ); ?>
	</div>
</div>


<?php if( $field = get_field_object('') ): ?>
    <?= $field['']; ?>
<?php endif; ?>


<?php get_footer(); ?>
