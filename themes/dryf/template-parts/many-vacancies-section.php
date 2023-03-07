<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="many-vacancies-section section">
    <div class="top-container">
        <div class="top-row">
            <div class="menu-column">
                <a class="menu-text" href="<?= $home_page_url ?>"><?= _e( $home_page_name ); ?></a>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a class="menu-text" id="active-menu"><?= _e( $vacancies_page_name ); ?></a>
                </div>
            </div>
        </div>
        <div class="row-cols-2 vacancy-row">
            <div class="col-50">
                <h2 class="base-title top-page-title heading">
                    Обирайте вакансію, яка буде приносити вам задоволення
                </h2>
            </div>
            <div class="col-50 date-col">
                <div class="classify-container">
                    <button class="classify-btn">
                        <svg class="classify-svg" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#classify"></use>
                        </svg>
                            <?= _e( $classify_vacancies ); ?>
                    </button>
                    <button class="classify-btn">
                        <svg class="filter-svg" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#filter"></use>
                        </svg>
                            <?= _e( $show_filters ); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-blocks page-vacancy">
        <?php
        $posts = get_posts(array(
            'numberposts' => 15,
            'post_type'   => 'vacancies',
            'suppress_filters' => true,
        ));
        foreach ($posts as $post) {
            setup_postdata($post);
            ?>
            <div class="vacancy-column">
                <a href="<?= $vacancy_page_url ?>" class="vacancy-block">
                    <?= get_the_post_thumbnail($post, 'large', array('class' => 'vacancy-img'))?>
                    <div class="text-block">
                        <p class="vacancy-heading">
                            <?php the_title() ?>
                        </p>
                        <p class="price">
                            <?= get_field('price'); ?>
                        </p>
                        <div class="places">
                            <!-- <?php
                            if (get_field('group_city')) {
                                while (have_rows('group_city')) : the_row();
                                    $count = count(get_field('group_city'));
                                    if ($count > 3) {
                                        for ($i = 0; $i <= 3; $i++) { ?>
                                            <div class="city">
                                                <div class="city-svg">
                                                    <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <use xlink:href="#mark"></use>
                                                    </svg>
                                                </div>
                                                <p class="city-name">
                                                    <?= get_sub_field('place_' . $i); ?>
                                                </p>
                                            </div>
                                        <?php  };  echo ($count - 3); ?>
                                        city
                                        <?php
                                    } else {
                                        for ($i = 0; $i <= $count; $i++) { ?>
                                            <div class="city">
                                                <div class="city-svg">
                                                    <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <use xlink:href="#mark"></use>
                                                    </svg>
                                                </div>
                                                <p class="city-name">
                                                    <?= get_sub_field('place_' . $i); ?>
                                                </p>
                                            </div>
                                        <?php  };
                                    }; ?>
                             <?php  endwhile; } ?>-->
                        </div>
                    </div>
                </a>
            </div>
        <?php } wp_reset_postdata(); ?>
    </div>
    <div class="pagination">
        <div class="col-50 pages-navigation">

        </div>
        <div class="col-50 swiper-buttons page-swiper-buttons">
            <div class="swiper-button swiper-button-prev">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#triangle-right"></use>
                </svg>
            </div>
            <div class="swiper-button swiper-button-next">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#triangle-left"></use>
                </svg>
            </div>
        </div>
    </div>
</section>