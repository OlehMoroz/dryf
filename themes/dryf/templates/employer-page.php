<?php
/**
 * Template Name: Employer page template
 * The template for displaying the Employer template in the theme.
 *
 *
 * @package WordPress
 */
include __DIR__ . '/../lang/language.php';

get_header();
?>

    <main class="page-container width-container">
        <!-- Sidebar -->

        <?php get_template_part( 'template-parts/side-menu' ); ?>

        <!-- End Sidebar -->

        <div class="content-col">
            <section class="employer-info-section section">
                <div class="top-container">
                    <div class="breadcrumbs-row menu-row">
                        <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>
                    <h2 class="base-title top-page-title">
                        <?= __( $employer_page_title ); ?>
                    </h2>
                </div>
                <div class="description">
                    <?= get_field('text'); ?>
                </div>
                <?php if (have_rows('advantages')) :
                    while (have_rows('advantages')) : the_row(); 
                    $count_adventage = count(get_field('advantages'));?>
                    <div class="row row-cols-5">
                        <?php for ($x = 0; $x <= $count_adventage; ++$x) { 
                            if (get_sub_field('advantage_item_' . $x)) {
                                while (have_rows('advantage_item_' . $x)) : the_row();
                                    if (get_sub_field('advantage_text')) { ?>
                                        <div class="col-20 cl-1">
                                            <div>
                                                <?= get_sub_field('advantage_icon'); ?>
                                            </div>
                                            <p>
                                                <?= get_sub_field('advantage_text'); ?>
                                            </p>
                                        </div>
                                    <? }
                                endwhile; 
                            }
                        } ?>
                    </div>
                <? endwhile; 
                endif; ?>
            </section>

            <?php get_template_part( 'template-parts/employer-form-section' ); ?>

            <section class="employer-content-section section">
                <div class="description">
                    <p class="text">
                        <?php the_content()?>
                    </p>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>