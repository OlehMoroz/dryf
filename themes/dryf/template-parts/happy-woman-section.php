<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('creed_section')) :
while (have_rows('creed_section')) : the_row(); ?>
<section class="happy-woman-section section">
    <div class="text-col">
        <p class="credo">
            <?= get_sub_field('short_text_at_top'); ?>
        </p>
        <h2 class="base-title heading">
            <?= get_sub_field('heading'); ?>
        </h2>
        <p class="underheading-text happy-woman-text">
            <?= get_sub_field('under-heading_text'); ?>
        </p>
        <a href="<?= $vacancies_page_url ?>" class="base-btn form-btn" data-event="learn-more">
            <?= _e( $find_vacancy ); ?>
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </a>
    </div>
    <div class="img-col">
        <div class="text-box">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use xlink:href="#heart"></use>
            </svg>
            <p class="text-box-text">
                <?= get_sub_field('message'); ?>
            </p>
        </div>
        <img src="/wp-content/themes/dryf/images/common/happy-woman.png" class="background-img" alt="background image" loading="lazy">
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>