<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 */

?>

<!--footer-->

                        <?php esc_html_e( 'Про нас' ); ?>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer_menu_info',
                            'container' => 'div',
                            'menu_class' => 'footer-menu-list',
                            'menu_id' => 'footer-menu-list-info',
                        )); ?>

            
<!-- end footer -->

	<?php wp_footer(); ?>

        <div style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg">
                <g id="arrow-right">
                    <path d="M23 -3.49691e-07C23 3 24.6 6 31 6" stroke-width="2"/>
                    <path d="M23 13C23 10 24.6 7 31 7" stroke-width="2"/>
                    <line y1="6" x2="19" y2="6" stroke-width="2"/>
                </g>
            </svg>
        </div>
	</body>
</html>

