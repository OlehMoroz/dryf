<?php
/**
 * Template Name: Our team page template
 * The template for displaying Our team template in the theme.
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
            <section class="team-section section">
                <div class="top-container">
                    <div class="breadcrumbs-row top-row">
                        <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>
                    <h2 class="base-title top-page-title heading">
                        <?= __( $team_page_title ); ?>
                    </h2>
                </div>
                <div class="page-blocks">
                    <?php
                    $posts = get_posts(array(
                        'numberposts' => 6,
                        'post_type'   => 'team',
                        'suppress_filters' => true,
                    ));
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        ?>
                            <div class="single-block">
                                <div class="col">
                                    <p class="employee-position"><?= get_field('position'); ?></p>
                                    <h2 class="base-title employee-name"><?php the_title() ?></h2>
                                    <?php the_excerpt()?>
                                    <div class="contacts">
                                        <?php if (get_field('phone_number')) { ?>
                                            <a class="single-contact" href="tel:<?= get_field('phone_number'); ?>">
                                                <svg class="phone-svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <use xlink:href="#phone"></use>
                                                </svg>
                                                <span class="contact-text">
                                                    <?= get_field('phone_number'); ?>
                                                </span>
                                            </a>
                                        <?php } ?>
                                        <?php if (get_field('email')) { ?>
                                            <a class="single-contact" href="mailto:<?= get_field('email'); ?>">
                                                <svg class="email-svg" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <use xlink:href="#email2"></use>
                                                </svg>
                                                <span class="contact-text">
                                                    <?= get_field('email'); ?>
                                                </span>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <img class="post-img" src="<?= get_field('large_image'); ?>" alt="<?php the_title() ?>" loading="lazy">
                            </div>
                    <?php } wp_reset_postdata(); ?>
                </div>
            </section>

            <?php
                $candidate_image = '/wp-content/themes/dryf/images/common/worker-1.png';
                $employer_image = '/wp-content/themes/dryf/images/common/businessman-2.png';
                $form_color = '';
                $candidate_form_shortcode = $candidate_form_shortcode;
                $employer_form_shortcode = $employer_form_shortcode;

                include get_template_directory() . '/template-parts/cta-form.php';
            ?>
        </main>
    </div>

<?php get_footer(); ?>