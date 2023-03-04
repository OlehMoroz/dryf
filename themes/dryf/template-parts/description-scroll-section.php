<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('large_text')) :
while (have_rows('large_text')) : the_row(); ?>
<section class="description-scroll-section section">
    <div class="description">
        <h2 class="base-title heading">
            <?= get_sub_field('heading'); ?>
        </h2>
        <div class="scroll-box">
            <p class="text">
                <?= get_sub_field('text'); ?>
            </p>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>