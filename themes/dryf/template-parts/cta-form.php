<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="cta-section">
    <div class="cta-container">
        <div class="col-50">
            <h2 class="base-title"><?= _e( $form_title ); ?></h2>
            <p class="subtitle advantages-p">
                <?= __($form_sub_title); ?>
            </p>
            <div class="form-tabs">
                <div class="form-tabs_text">
                    <?= __($form_tab_text); ?>
                </div>

                <div class="form-tabs_row">
                    <div class="form-tab active" data-tab="0">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#candidate"></use>
                        </svg>
                        <span><?= __($tab_candidate); ?></span>
                    </div>  
                    <div class="form-tab" data-tab="1">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#employer"></use>
                        </svg>
                        <span><?= __($tab_employer); ?></span>
                    </div>
                </div>
                <div class="form-content show">
                    <?= do_shortcode($candidate_form_shortcode); ?>
                </div>
                <div class="form-content">
                    <?= do_shortcode($employer_form_shortcode); ?>
                </div>
            </div>
        </div>
        <div class="col-50 pattern-container">
            <div class="text-box <?= $form_color; ?>">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.5 2.5V10L12.5 15L7.5 20V27.5H22.5V20L17.5 15L22.5 10V2.5H7.5Z" fill="white"/>
                </svg>
                <p class="text-box-text"><?= __($form_message); ?></p>
            </div>
            <img src="<?= $candidate_image; ?>" class="background-img cta-form-image show" alt="background image" loading="lazy">
            <img src="<?= $employer_image; ?>" class="background-img cta-form-image" alt="background image" loading="lazy">
        </div>
    </div>
</section>