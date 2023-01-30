<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('advantages')) :
while (have_rows('advantages')) : the_row(); ?>
<section class="advantages-section">
    <div class="advantages-container">
        <?php if (get_sub_field('heading')) { ?>
            <p class="advantages-heading">
                <?= get_sub_field('heading'); ?>
            </p>
        <?php } ?>
        <?php if (get_sub_field('underheading-text')) { ?>
        <p class="advantages-p">
            <?= get_sub_field('underheading-text'); ?>
        </p>
        <?php } ?>
        <div class="row row-cols-5">
            <div class="col-20 cl-1">
                <div>
                    <?php if (get_sub_field('first-column-svg')) { ?>
                    <svg width="30" height="34" viewBox="0 0 30 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <?= get_sub_field('first-column-svg'); ?>
                    </svg>
                    <?php } ?>
                </div>
                <?php if (get_sub_field('first-column')) { ?>
                <p>
                    <?= get_sub_field('first-column'); ?>
                </p>
                <?php } ?>
            </div>
            <div class="col-20 cl-2">
                <div>
                    <?php if (get_sub_field('second-column-svg')) { ?>
                    <svg width="27" height="38" viewBox="0 0 27 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <?= get_sub_field('second-column-svg'); ?>
                    </svg>
                    <?php } ?>
                </div>
                <?php if (get_sub_field('second-column')) { ?>
                    <p>
                        <?= get_sub_field('second-column'); ?>
                    </p>
                <?php } ?>
            </div>
            <div class="col-20 cl-1">
                <div>
                    <?php if (get_sub_field('third-column-svg')) { ?>
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <?= get_sub_field('third-column-svg'); ?>
                    </svg>
                    <?php } ?>
                </div>
                <?php if (get_sub_field('third-column')) { ?>
                    <p>
                        <?= get_sub_field('third-column'); ?>
                    </p>
                <?php } ?>
            </div>
            <div class="col-20 cl-2">
                <div>
                    <?php if (get_sub_field('fourth-column-svg')) { ?>
                    <svg width="34" height="40" viewBox="0 0 34 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <?= get_sub_field('fourth-column-svg'); ?>
                    </svg>
                    <?php } ?>
                </div>
                <?php if (get_sub_field('fourth-column')) { ?>
                    <p>
                        <?= get_sub_field('fourth-column'); ?>
                    </p>
                <?php } ?>
            </div>
            <div class="col-20 cl-1">
                <div>
                    <?php if (get_sub_field('fifth-column-svg')) { ?>
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <?= get_sub_field('fifth-column-svg'); ?>
                    </svg>
                    <?php } ?>
                </div>
                <?php if (get_sub_field('fifth-column')) { ?>
                    <p>
                        <?= get_sub_field('fifth-column'); ?>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>