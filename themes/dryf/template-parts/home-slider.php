<?php include __DIR__ . '/../lang/language.php'; ?>

<!-- Slider main container -->
<?php if (have_rows('slider')) :
    while (have_rows('slider')) : the_row();
    $count = count(get_field('slider')); ?>
<section class="main-slider_section">
    <div class="main-slider">
        <div class="swiper-wrapper">
        <?php for ($x = 0; $x <= $count; ++$x) { 
                if (get_sub_field('slide_' . $x)) {
                    while (have_rows('slide_' . $x)) : the_row();
                        if (get_sub_field('slide_title')) { ?>
                            <div class="swiper-slide" style="background: url('<?= get_sub_field('slide_image'); ?>') center/cover no-repeat;">
                                <div class="slide-caption">
                                    <h2><?= get_sub_field('slide_title'); ?></h2>
                                    <p><?= get_sub_field('slide_text'); ?></p>
                                    <svg width="62" height="63" viewBox="0 0 62 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <use xlink:href="#slide-arrow"></use>
                                    </svg>
                                    <?php if (get_sub_field('slide_link_text')) { ?>
                                        <a  href="<?= get_sub_field('slide_link'); ?>" class="base-btn base-btn_white">
                                            <?= get_sub_field('slide_link_text'); ?>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="#arrow-right"></use>
                                            </svg>
                                        </a>
                                    <?php } else { ?>
                                        <button class="base-btn base-btn_white" data-event="open-modal">
                                            <?= $call_form_text; ?>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="#arrow-right"></use>
                                            </svg>
                                        </button>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } endwhile; } 
                } ?>
        </div>
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
</section>
<?php  endwhile; endif; ?>