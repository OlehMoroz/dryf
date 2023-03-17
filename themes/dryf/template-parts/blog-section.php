<?php include __DIR__ . '/../lang/language.php'; ?>

<section class="blog-section section">
    <div class="top-container">
        <div class="top-row">
            <div class="menu-column">
                <a class="menu-text" href="<?= $home_page_url ?>"><?= _e( $home_page_name ); ?></a>
            </div>
            <div class="menu-column">
                <div class="inner-div">
                    <div class="menu-svg">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#menu-arrow"></use>
                        </svg>
                    </div>
                    <a class="menu-text" id="active-menu" ><?= _e( $blog_page_name ); ?></a>
                </div>
            </div>
        </div>
        <h2 class="base-title top-page-title heading">
            Новини нашої компанії
        </h2>
    </div>
    <div class="page-blocks page-blog">
        <?php
        $posts = get_posts(array(
            'numberposts' => 10,
            'post_type'   => 'blog',
            'suppress_filters' => true,
        ));
        foreach ($posts as $post) {
            setup_postdata($post);
            ?>
            <a class="single-block single-blog" href="<?= $article_page_url ?>">
               <div class="text-col">
                       <div class="article-date">
                           <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <use xlink:href="#date"></use>
                           </svg>
                           <p class="date-text">
                               <?php echo get_the_date('d.m.Y');?>
                           </p>
                       </div>
                   <h3 class="heading">
                        <?= the_title()?>
                   </h3>
                   <?= the_excerpt()?>
                   <div class="read-more-button">
                       <p class="read-more">
                           <?= _e( $reed_more ); ?>
                       </p>
                   </div>
               </div>
                <div class="img-col">
                    <?= get_the_post_thumbnail($post, 'large', array('class' => 'post-img'))?>
                </div>
            </a>
        <?php } wp_reset_postdata(); ?>
    </div>
    <div class="pagination">
        <div class="col-50 pages-navigation">

        </div>
        <div class="col-50 swiper-buttons page-swiper-buttons">
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
    </div>
</section>
