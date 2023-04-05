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

	<main class="content-col">
		<?php get_template_part( 'template-parts/home-slider' ); ?>
		<?php
			$candidate_image = '/wp-content/themes/dryf/images/common/worker-1.png';
			$employer_image = '/wp-content/themes/dryf/images/common/businessman-2.png';
			$form_color = '';
			$candidate_form_shortcode = $candidate_form_shortcode;
			$employer_form_shortcode = $employer_form_shortcode;

			include get_template_directory() . '/template-parts/cta-form.php';
        ?>

		<?php get_template_part( 'template-parts/favorite-job-section' ); ?>

		<?php
			$heading = $home_popular_job_title;
			include get_template_directory() . '/template-parts/popular-job-section.php';
        ?>

		<?php
			$candidate_image = '/wp-content/themes/dryf/images/common/worker-2.png';
			$employer_image = '/wp-content/themes/dryf/images/common/businessman-1.png';
			$form_color = 'orange';
			$candidate_form_shortcode = $candidate_form_shortcode;
			$employer_form_shortcode = $employer_form_shortcode;

			include get_template_directory() . '/template-parts/cta-form.php';?>

		<?php get_template_part( 'template-parts/employees-section' ); ?>

        <?php get_template_part( 'template-parts/contact-section' ); ?>

        <?php
			$heading = $home_advantages_title;
			include get_template_directory() . '/template-parts/advantages-section.php';
        ?>

        <?php get_template_part( 'template-parts/feedback-section' ); ?>
		
		<?php get_template_part( 'template-parts/about-section' ); ?>
	</main>
</div>

<?php get_footer(); ?>
