<?php include __DIR__ . '/../lang/language.php'; ?>
<?php
$posts = get_posts(array(
    'numberposts' => 1,
    'post_type'   => 'vacancies',
    'suppress_filters' => true,
));
foreach ($posts as $post) {
setup_postdata($post);
?>
<section class="about-vacancy-section section">
    <div class="about-vacancy-container" style="background: url('<?= get_the_post_thumbnail($post, 'large')?>') center/cover no-repeat;">
        <div class="menu-row">
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
                    <a class="menu-text" href="<?= $vacancies_page_url ?>"><?= _e( $vacancies_page_name ); ?></a>
                </div>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a id="active-menu" class="menu-text"><?php the_title() ?></a>
                </div>
            </div>
        </div>
        <div class="content-block">
            <h1 class="job-name">
                <?php the_title() ?>
            </h1>
            <p class="salary"><?= get_field('price'); ?> в місяць</p>
            <div class="locations">
                <p class="locations-text">
                    Локації:
                </p>
                <div class="places">
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p class="city-name">
                            Лодзь
                        </p>
                    </div>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p class="city-name">
                            Катовіце
                        </p>
                    </div>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p class="city-name">
                            Хшанув
                        </p>
                    </div>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p class="city-name">
                            Ополе
                        </p>
                    </div>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p class="city-name">
                            Жешнув
                        </p>
                    </div>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p class="city-name">
                            Сосновець
                        </p>
                    </div>
                    <div class="city">
                        <div class="city-svg">
                            <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#mark"></use>
                            </svg>
                        </div>
                        <p class="city-name">
                            Краків
                        </p>
                    </div>
                </div>
            </div>
            <div class="tag-block">
                <a class="tag-item">
                    <p class="tag-text">Офіційне працевлаштування</p>
                </a>
                <a class="tag-item">
                    <p class="tag-text">Фабрика</p>
                </a>
                <a class="tag-item">
                    <p class="tag-text">Повний робочий день</p>
                </a>
                <a class="tag-item">
                    <p class="tag-text">Без знання мови</p>
                </a>
                <a class="tag-item">
                    <p class="tag-text">З житлом</p>
                </a>
                <a class="tag-item">
                    <p class="tag-text">Безкоштовний обід</p>
                </a>
                <a class="tag-item">
                    <p class="tag-text">Робота увесь рік</p>
                </a>
            </div>

        </div>
        <a href="#" class="base-btn" data-event="learn-more">
            <?= _e( $respond ); ?>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </a>
    </div>
</section>
<?php } wp_reset_postdata(); ?>