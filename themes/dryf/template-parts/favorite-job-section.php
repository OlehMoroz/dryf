<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="favorite-job-section section">
    <div class="favorite-job-container favorite-job-slider slider">
        <div class="row row-cols-2">
            <div class="col-50 cl1">
                <h2 class="base-title heading">
                    Обирайте вакансію, яка буде приносити вам задоволення
                </h2>
            </div>
            <div class="col-50 cl2">
                <a href="<?= $vacancies_page_url ?>" class="base-btn" data-event="learn-more">
                    <?= _e( $show_more_vacancies ); ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>
                <div class="swiper-buttons">
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
        </div>
        <p class="underheading-text above-slider-text">
            Знайдіть себе в улюбленій справі.
        </p>
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide col-20">
                    <a href="<?= $vacancies_page_url ?>">
                        <img class="vacancy-img" src="/wp-content/themes/dryf/images/common/na-zavodi.png" alt="vacancy picture" loading="lazy">
                        <div class="name-container">
                            <div class="number-div">
                                <p class="number-of-vacancies">
                                    15 вакансій
                                </p>
                            </div>
                            <p class="vacancy-name">
                                На заводі
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide col-20">
                    <a href="<?= $vacancies_page_url ?>">
                        <img class="vacancy-img" src="/wp-content/themes/dryf/images/common/na-fabrytsi.png" alt="vacancy picture" loading="lazy">
                        <div class="name-container">
                            <div class="number-div">
                                <p class="number-of-vacancies">
                                    15 вакансій
                                </p>
                            </div>
                            <p class="vacancy-name">
                                На фабриці
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide col-20">
                    <a href="<?= $vacancies_page_url ?>">
                        <img class="vacancy-img" src="/wp-content/themes/dryf/images/common/na-skladi.png" alt="vacancy picture" loading="lazy">
                        <div class="name-container">
                            <div class="number-div">
                                <p class="number-of-vacancies">
                                    15 вакансій
                                </p>
                            </div>
                            <p class="vacancy-name">
                                На складі
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide col-20">
                    <a href="<?= $vacancies_page_url ?>">
                        <img class="vacancy-img" src="/wp-content/themes/dryf/images/common/na-budivnytstvi.png" alt="vacancy picture" loading="lazy">
                        <div class="name-container">
                            <div class="number-div">
                                <p class="number-of-vacancies">
                                    15 вакансій
                                </p>
                            </div>
                            <p class="vacancy-name">
                                На будівництві
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide col-20">
                    <a href="<?= $vacancies_page_url ?>">
                        <img class="vacancy-img" src="/wp-content/themes/dryf/images/common/na-kuhni.png" alt="vacancy picture" loading="lazy">
                        <div class="name-container">
                            <div class="number-div">
                                <p class="number-of-vacancies">
                                    15 вакансій
                                </p>
                            </div>
                            <p class="vacancy-name">
                                На кухні
                            </p>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide col-20">
                    <a href="<?= $vacancies_page_url ?>">
                        <img class="vacancy-img" src="/wp-content/themes/dryf/images/common/na-zavodi.png" alt="vacancy picture" loading="lazy">
                        <div class="name-container">
                            <div class="number-div">
                                <p class="number-of-vacancies">
                                    15 вакансій
                                </p>
                            </div>
                            <p class="vacancy-name">
                                На заводі
                            </p>
                        </div>
                    </a>
                </div>
            </div>
    </div>
</section>
