<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('description')) :
    while (have_rows('description')) : the_row(); ?>
<section class="description-section section">
        <div class="description">
            <h2 class="base-title heading">
                <?= get_sub_field('heading'); ?>
            </h2>
            <p class="text">
                <?= get_sub_field('text'); ?>
            </p>
        </div>
</section>
<?php endwhile; ?>
<?php endif; ?>