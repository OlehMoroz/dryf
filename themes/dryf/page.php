<?php
/**
 * Template Name: Article page template
 * The template for displaying the Article template in the theme.
 *
 *
 * @package WordPress
 */
include __DIR__ . '/lang/language.php';

get_header();
?>

<div class="page-container width-container">
    <!-- Sidebar -->

    <?php get_template_part( 'template-parts/side-menu' ); ?>

    <!-- End Sidebar -->

    <main class="content-col">
        <section class="article-section section">
            <div class="top-container">
                <div class="breadcrumbs-row top-row">
                    <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                </div>
                <div class="row-cols-2">
                    <div class="col-50">
                        <h2 class="base-title top-page-title">
                            <?php the_title(); ?>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="description">
                <?php the_content(); ?>
            </div>
        </section>

        <?php
			$candidate_image = '/wp-content/themes/dryf/images/common/worker-4.png';
			$employer_image = '/wp-content/themes/dryf/images/common/businessman-4.png';
			$form_color = 'orange';
			$candidate_form_shortcode = $candidate_form_shortcode;
			$employer_form_shortcode = $employer_form_shortcode;

			include get_template_directory() . '/template-parts/cta-form.php'; ?>
    </main>
</div>


<?php get_footer(); ?>
