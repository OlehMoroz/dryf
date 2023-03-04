<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('top_bar')) :
while (have_rows('top_bar')) : the_row(); ?>
<section class="about-company-section section">
    <div class="about-company-container">
        <div class="menu-row">
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
                    <a class="menu-text" id="active-menu">Про нас</a>
                </div>
            </div>
        </div>
        <h1 class="about-company-heading">
            <?= get_sub_field('heading'); ?>
        </h1>
        <p class="about-company-text">
            <?= get_sub_field('under-heading_text'); ?>
        </p>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>