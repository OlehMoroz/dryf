<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('about')) :
while (have_rows('about')) : the_row(); ?>
<section class="about-section section">
    <div class="about-container">
        <div class="col-50">
            <h2 class="base-title heading"><?= _e( $about_section_title ); ?></h2>
            <div class="scroll-box">
                <?php if (get_sub_field('text')) { ?>
                    <p><?= get_sub_field('text'); ?></p>
                <?php } ?>
            </div>
            <?php if (get_sub_field('link')) { ?>
                <a href="<?= get_sub_field('link'); ?>" class="base-btn about-button" data-event="learn-more">
                    <?= _e( $text_more ); ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#arrow-right"></use>
                    </svg>
                </a>
            <?php } ?>
        </div>
        <div class="col-50 pattern-container">
            <?php if (get_sub_field('message')) { ?>
            <div class="text-box">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#heart"></use>
                </svg>
                <p class="text-box-text"><?= get_sub_field('message'); ?></p>
            </div>
            <?php } ?>
            <img src="/wp-content/themes/dryf/images/common/about-section-background.png" class="background-img" alt="background image" loading="lazy">
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>