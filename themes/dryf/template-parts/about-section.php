<?php if (have_rows('about')) :
while (have_rows('about')) : the_row(); ?>
<section class="about-section">
    <div class="about-container">
        <p class="heading">Розповімо детальніше про нашу компанію</p>
        <div class="scroll-box">
            <?php if (get_sub_field('text')) { ?>
            <p> <?= get_sub_field('text'); ?></p>
                    <?php
                } ?>
        </div>
        <?php if (get_sub_field('link')) { ?>
        <a href="<?= get_sub_field('link'); ?>" class="base-btn about-button" data-event="learn-more">
            Дізнатися більше
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </a>
            <?php
        } ?>
        <div class="pattern-container">
            <img src="/wp-content/themes/dryf/images/common/about-section-pattern.png" alt="background pattern" class="background-pattern">
        </div>
        <?php if (get_sub_field('massage')) { ?>
        <div class="text-box">
            <svg class="text-box-svg" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#heart"></use>
            </svg>
            <p class="text-box-text"><?= get_sub_field('massage'); ?></p>
        </div>
            <?php
            } ?>
        <img src="/wp-content/themes/dryf/images/common/about-section-background.png" alt="background image" class="background-img">
        <div class="arrow-down"></div>
    </div>
</section>
    <?php endwhile; ?>
<?php endif; ?>
