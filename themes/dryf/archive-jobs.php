<?php
/**
 * Template Name: Vacancies page template
 * The template for displaying the Vacancies template in the theme.
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
            <section class="many-vacancies-section section">
                
                <div class="top-container">
                    <div class="breadcrumbs-row top-row">
                        <?= do_shortcode('[wpseo_breadcrumb]'); ?>
                    </div>
                    <div class="row-cols-2 vacancy-row">
                        <div class="col-50">
                            <h2 class="base-title top-page-title heading">
                                <?= __( $vacancy_page_title ); ?>
                            </h2>
                        </div>
                        <?php
                        // set default sort value
                        $current_sort = 'newest';

                        // check if sort value is set in the query string
                        if(isset($_GET['sort'])) {
                            $current_sort = $_GET['sort'];
                        }

                        // set default orderby value based on the current sort value
                        if($current_sort == 'oldest') {
                            $orderby = 'date';
                            $order = 'ASC';
                        } else if($current_sort == 'salary_low_high') {
                            $orderby = 'meta_value_num';
                            $meta_key = 'salary_min';
                            $order = 'ASC';
                        } else if($current_sort == 'salary_high_low') {
                            $orderby = 'meta_value_num';
                            $meta_key = 'salary_min';
                            $order = 'DESC';
                        } else {
                            $orderby = 'date';
                            $order = 'DESC';
                        }

                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>
                            <?php

                            $args = array(
                                'post_type' => 'jobs',
                                'posts_per_page' => 12,
                                'paged' => $paged,
                                'orderby' => $orderby,
                                'order' => $order,
                                'meta_key' => $meta_key
                            );

                            // create the query
                            $jobs_query = new WP_Query($args); ?>
                        <div class="col-50 date-col">
                            <div class="classify-container">
                                <div class="sort-drpdown">
                                    <button class="classify-btn">
                                        <svg class="classify-svg" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use xlink:href="#classify"></use>
                                        </svg>
                                        <?= _e( $classify_vacancies ); ?>
                                    </button>
                                    <form method="get" id="sort-form">
                                        <label>
                                            <input type="radio" name="sort" value="salary_high_low"<?php selected($current_sort, 'salary_high_low'); ?> onchange="document.getElementById('sort-form').submit();">
                                            <span><?= $sort_salary_max; ?></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="sort" value="salary_low_high"<?php selected($current_sort, 'salary_low_high'); ?> onchange="document.getElementById('sort-form').submit();">
                                            <span><?= $sort_salary_min; ?></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="sort" value="newest"<?php selected($current_sort, 'newest'); ?> onchange="document.getElementById('sort-form').submit();">
                                            <span><?= __($newest); ?></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="sort" value="oldest"<?php selected($current_sort, 'oldest'); ?> onchange="document.getElementById('sort-form').submit();">
                                            <span><?= __($oldest); ?></span>
                                        </label>
                                    </form>
                                </div>
                                <!--<button class="classify-btn">
                                    <svg class="filter-svg" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#filter"></use>
                                    </svg>
                                    <?= _e( $show_filters ); ?>
                                </button>-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-blocks page-vacancy">
                            <?php if($jobs_query->have_posts()) :
                                while($jobs_query->have_posts()) : $jobs_query->the_post(); ?>
                                <a href="<?= the_permalink(); ?>" class="popular-job-block vacancy-block">
                                            <?= get_the_post_thumbnail($post, 'large', array('class' => 'vacancy-img'))?>
                                            <div class="text-block">
                                                <p class="vacancy-heading">
                                                    <?php the_title() ?>
                                                </p>
                                                <p class="price">
                                                    <?= get_field('salary_min'); ?> <?php if (get_field('salary_max') ) { echo ' - ' . get_field('salary_max'); } ?> <?= get_field('currency'); ?>
                                                </p>
                                                <div class="places">
                                                    <?php
                                                        $terms = get_the_terms( get_the_ID(), 'job_city' );
                                                        if ( $terms && ! is_wp_error( $terms ) ) {
                                                            foreach ( $terms as $term ) { ?>
                                                                <div class="city">
                                                                    <div class="city-svg">
                                                                        <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <use xlink:href="#mark"></use>
                                                                        </svg>
                                                                    </div>
                                                                    <p class="city-name">
                                                                        <?= $term->name; ?>
                                                                    </p>
                                                                </div>
                                                            <? }
                                                        }
                                                    ?>
                                                    <div class="more-cities one"><?= __( $one_city ); ?></div>
                                                    <div class="more-cities default"><?= __( $more_city ); ?></div>
                                                </div>
                                            </div>
                                        </a>
            <?php endwhile;
                wp_reset_postdata();
                $current_url = get_pagenum_link();
                $current_url = strtok($current_url, '?');
                $paginate_links_args = array(
                    'base' => $current_url . '%_%',
                    'format' => '?paged=%#%&sort=' . $current_sort,
                    'total' => $jobs_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => __( '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use xlink:href="#triangle-right"></use></svg>', 'textdomain' ),
                    'next_text' => __( '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><use xlink:href="#triangle-left"></use></svg>', 'textdomain' ),
                    'type' => 'array'
                );
                $paginate_links = paginate_links($paginate_links_args);

                if($paginate_links) :
                    echo '<div class="pagination">';
                    foreach($paginate_links as $link) {
                        echo '<div>' . $link . '</div>';
                    }
                    echo '</div>';
                endif;
                else :
                    echo '<h1>No jobs</h1>';
            endif; ?>
            </section>

            <?php
                $candidate_image = '/wp-content/themes/dryf/images/common/worker-3.png';
                $employer_image = '/wp-content/themes/dryf/images/common/businessman-3.png';
                $form_color = '';
                $candidate_form_shortcode = $candidate_form_shortcode;
                $employer_form_shortcode = $employer_form_shortcode;

                include get_template_directory() . '/template-parts/cta-form.php';
            ?>
        </main>
    </div>

<?php get_footer(); ?>