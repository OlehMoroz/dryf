<?php include __DIR__ . '/../lang/language.php'; ?>

<?php if (have_rows('advantages')) :
    while (have_rows('advantages')) : the_row(); 
    $count_adventage = count(get_field('advantages'));?>
    <section class="advantages-section">
        <div class="advantages-container">
            <h2 class="base-title advantages-heading">
                <?= __($advantage_title); ?>
            </h2>
            <p class="subtitle advantages-p">
                <?= __($advantage_sub_title); ?>
            </p>
            <div class="row row-cols-5">
                <?php for ($x = 0; $x <= $count_adventage; ++$x) { 
                    if (get_sub_field('advantage_item_' . $x)) {
                        while (have_rows('advantage_item_' . $x)) : the_row();
                            if (get_sub_field('advantage_text')) { ?>
                                <div class="col-20 cl-1">
                                    <div>
                                        <?= get_sub_field('advantage_icon'); ?>
                                    </div>
                                    <p>
                                        <?= get_sub_field('advantage_text'); ?>
                                    </p>
                                </div>
                            <? }
                        endwhile; 
                    }
                } ?>
            </div>
        </div>
    </section>
<? endwhile; 
endif; ?>