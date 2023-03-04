<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="team-section section">
    <div class="top-container">
        <div class="top-row">
            <div class="menu-column">
                <a class="menu-text">Головна</a>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a class="menu-text" id="active-menu">Наша команда</a>
                </div>
            </div>
        </div>
        <h2 class="base-title top-page-title heading">
            Команда професіоналів, які працюють в нашій компанії
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
                    <p class="employee-position"><?= get_field('position'); ?></p>
                    <h2 class="base-title employee-name"><?php the_title() ?></h2>
                    <?php the_excerpt()?>
                    <div class="contacts">
                        <div class="single-contact">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#phone"></use>
                            </svg>
                            <p class="contact-text">
                                <?= get_field('phone_number'); ?>
                            </p>
                        </div>
                        <div class="single-contact">
                            <svg class="email-svg" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <use xlink:href="#email2"></use>
                            </svg>
                            <p class="contact-text">
                                <?= get_field('email'); ?>
                            </p>
                        </div>
                    </div>
                </div>
        <?php } wp_reset_postdata(); ?>
    </div>
</section>
