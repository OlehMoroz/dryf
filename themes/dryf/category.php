<?php
/**
 * Template Name: Blog page template
 * The template for displaying the Blog template in the theme.
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
            <section class="blog-section section">
                <div class="top-container">
                    <div class="breadcrumbs-row top-row">
                        <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>
                    <h2 class="base-title top-page-title heading">
                        <?= __( $blog_page_title ); ?>
                    </h2>
                </div>
                <div class="page-blocks page-blog">

                <?php if ( have_posts() ) : ?>

                    <?php
                    while ( have_posts() ) :
                        the_post(); ?>
                        <a class="single-block single-blog" href="<?= get_the_permalink(); ?>">
                            <div class="text-col">
                                <div class="article-date">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#date"></use>
                                    </svg>
                                    <p class="date-text">
                                        <?php echo get_the_date('d.m.Y');?>
                                    </p>
                                </div>
                                <h3 class="heading">
                                    <?= the_title()?>
                                </h3>
                                <?= the_excerpt()?>
                                <div class="read-more-button">
                                    <p class="read-more">
                                        <?= _e( $reed_more ); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="img-col">
                                <?= get_the_post_thumbnail($post, 'large', array('class' => 'post-img'))?>
                            </div>
                        </a>
                    <?php endwhile;

                else :
                    echo 'no posts';
                endif;
                ?>
                </div>
                <div class="pagination">
                    <?php
                    global $wp_query;

                    $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base'    => get_pagenum_link(1) . '%_%',
                        'format'  => '/page/%#%',
                        'current' => max( 1, get_query_var( 'paged' ) ),
                        'total'   => $wp_query->max_num_pages,
                        'prev_text' => __( '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use xlink:href="#triangle-right"></use></svg>', 'textdomain' ),
                        'next_text' => __( '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use xlink:href="#triangle-left"></use></svg>', 'textdomain' ),
                        'mid_size' => 2,
                        'end_size' => 1,
                        'type' => 'block',
                        'add_args' => true
                    ) );
                    ?>
                </div>
            </section>

            <?php
                $candidate_image = '/wp-content/themes/dryf/images/common/worker-5.png';
                $employer_image = '/wp-content/themes/dryf/images/common/businessman-5.png';
                $form_color = 'orange';
                $candidate_form_shortcode = $candidate_form_shortcode;
                $employer_form_shortcode = $employer_form_shortcode;

                include get_template_directory() . '/template-parts/cta-form.php'; ?>
        </main>
    </div>

<?php get_footer(); ?>