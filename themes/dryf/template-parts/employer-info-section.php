<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('employer_info')) :
while (have_rows('employer_info')) : the_row(); ?>
<section class="employer-info-section section">
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
                    <a class="menu-text" id="active-menu">Роботодавцю</a>
                </div>
            </div>
        </div>
        <h2 class="base-title top-page-title">
            Інформація для роботодавців
        </h2>
    </div>
    <div class="description">
        <p class="text description-text">
            <?= get_sub_field('text'); ?>
        </p>
    </div>
    <div class="row row-cols-5">
        <div class="col-20 cl-1">
            <?php if (get_sub_field('first-column')) {
                while (have_rows('first-column')) : the_row();?>
            <div>
                <svg id="black" width="34" height="36" viewBox="0 0 34 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <?= get_sub_field('first-column-svg'); ?>
                </svg>
            </div>
            <p>
                <?= get_sub_field('first-column-text'); ?>
            </p>
            <?php endwhile;} ?>
            <?php ?>
        </div>
        <div class="col-20 cl-2">
            <?php if (get_sub_field('second-column')) {
                while (have_rows('second-column')) : the_row();?>
            <div>
                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <?= get_sub_field('second-column-svg'); ?>
                </svg>
            </div>
                <p>
                    <?= get_sub_field('second-column-text'); ?>
                </p>
                <?php endwhile;} ?>
            <?php ?>
        </div>
        <div class="col-20 cl-1">
            <?php if (get_sub_field('third-column')) {
                while (have_rows('third-column')) : the_row();?>
            <div>
                <svg id="black" width="40" height="24" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <?= get_sub_field('third-column-svg'); ?>
                </svg>
            </div>
                <p>
                    <?= get_sub_field('third-column-text'); ?>
                </p>
                <?php endwhile;} ?>
            <?php ?>
        </div>
        <div class="col-20 cl-2">
            <?php if (get_sub_field('fourth-column')) {
                while (have_rows('fourth-column')) : the_row();?>
            <div>
                <svg id="black" width="40" height="36" viewBox="0 0 40 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <?= get_sub_field('fourth-column-svg'); ?>
                </svg>
            </div>
                <p>
                    <?= get_sub_field('fourth-column-text'); ?>
                </p>
                <?php endwhile;} ?>
            <?php ?>
        </div>
        <div class="col-20 cl-1">
            <?php if (get_sub_field('fifth-column')) {
                while (have_rows('fifth-column')) : the_row();?>
            <div>
                <svg width="27" height="38" viewBox="0 0 27 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <?= get_sub_field('fifth-column-svg'); ?>
                </svg>
            </div>
                <p>
                    <?= get_sub_field('fifth-column-text'); ?>
                </p>
                <?php endwhile;} ?>
            <?php ?>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>