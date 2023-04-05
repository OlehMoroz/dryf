<?php

function remove_wordpress_version_number()
{
	return '';
}

add_filter('the_generator', 'remove_wordpress_version_number');
function remove_version_from_scripts($src)
{
	if (strpos($src, '?ver='))
		$src = remove_query_arg('ver', $src);
	return $src;
}

add_filter('style_loader_src', 'remove_version_from_scripts');
add_filter('script_loader_src', 'remove_version_from_scripts');

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_enqueue_scripts', 'jquery_script_method');
add_action('wp_footer', 'scripts_theme');

/* 
*
* Enqueue script and style
*
*/

function style_theme()
{
	wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
	wp_enqueue_style('select', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/build/css/main.min.css');
	wp_enqueue_style('style', get_stylesheet_uri());
}

function scripts_theme()
{
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
	wp_enqueue_script('select', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js');
	wp_enqueue_script('main', get_template_directory_uri() . '/build/js/main.min.js');
}

add_action('after_setup_theme', function () {
	register_nav_menus([
		'header_menu' => 'Header menu',
		'footer_menu_info' => 'Footer menu Info page',
	]);
});

add_action('init', 'my_custom_init');
function my_custom_init()
{

	register_post_type('jobs', array(
		'labels'             => array(
			'name'               => 'Jobs',
			'singular_name'      => 'Jobs',
			'add_new'            => 'Add new job',
			'add_new_item'       => 'Add new job',
			'edit_item'          => 'Edit new job',
			'new_item'           => 'New jobs',
			'view_item'          => 'New jobs',
			'search_items'       => 'Find job',
			'not_found'          =>  'Job not found',
			'not_found_in_trash' => 'Job not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Jobs'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title', 'thumbnail', 'excerpt', 'editor'),
		'menu_icon'			 => 'dashicons-open-folder',
		'taxonomies'         => array('job_category', '')
	));

	register_post_type('team', array(
		'labels'             => array(
			'name'               => 'Team',
			'singular_name'      => 'Team',
			'add_new'            => 'Add new worker',
			'add_new_item'       => 'Add new worker',
			'edit_item'          => 'Edit new worker',
			'new_item'           => 'New worker',
			'view_item'          => 'New worker',
			'search_items'       => 'Find worker',
			'not_found'          =>  'Worker not found',
			'not_found_in_trash' => 'Worker not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Team'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title', 'thumbnail', 'excerpt', 'editor'),
		'menu_icon'			 => 'dashicons-open-folder',
	));

	register_post_type('reviews', array(
		'labels'             => array(
			'name'               => 'Reviews',
			'singular_name'      => 'Reviews',
			'add_new'            => 'Add new review',
			'add_new_item'       => 'Add new review',
			'edit_item'          => 'Edit new review',
			'new_item'           => 'New review',
			'view_item'          => 'New review',
			'search_items'       => 'Find review',
			'not_found'          =>  'Review not found',
			'not_found_in_trash' => 'Review not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Reviews'

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 4,
		'supports'           => array('title', 'thumbnail', 'excerpt', 'editor'),
		'menu_icon'			 => 'dashicons-open-folder',
	));

	register_taxonomy('job_category', ['jobs'], [
		'label' => __('Category', 'txtdomain'),
		'hierarchical' => false,
		'rewrite'      =>  array('slug' => '/job-category', 'with_front' => false),
		'show_admin_column' => true,
		'has_archive'       =>  true,
		'public'            =>  true,
        'publicly_queryable'=>  true,
        'show_ui'           =>  true, 
        'query_var'         =>  true,
        'show_in_nav_menus' =>  false,
        'capability_type'   =>  'jobs',
        'hierarchical'      =>  false,
		'labels' => [
			'singular_name' => __('Category', 'txtdomain'),
			'all_items' => __('All Category', 'txtdomain'),
			'edit_item' => __('Edit Category', 'txtdomain'),
			'view_item' => __('View Category', 'txtdomain'),
			'update_item' => __('Update Category', 'txtdomain'),
			'add_new_item' => __('Add New Category', 'txtdomain'),
			'new_item_name' => __('New Category Name', 'txtdomain'),
			'search_items' => __('Search Category', 'txtdomain'),
			'popular_items' => __('Popular Category', 'txtdomain'),
			'separate_items_with_commas' => __('Separate authors with comma', 'txtdomain'),
			'choose_from_most_used' => __('Choose from most used Authors', 'txtdomain'),
			'not_found' => __('No Authors found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('job_category', 'jobs');

	register_taxonomy('job_city', ['jobs'], [
		'label' => __('City', 'txtdomain'),
		'hierarchical' => false,
		'rewrite'      =>  array('slug' => '/job-city', 'with_front' => false),
		'show_admin_column' => true,
		'has_archive'       =>  true,
		'public'            =>  true,
        'publicly_queryable'=>  true,
        'show_ui'           =>  true, 
        'query_var'         =>  true,
        'show_in_nav_menus' =>  false,
        'capability_type'   =>  'jobs',
        'hierarchical'      =>  false,
		'labels' => [
			'singular_name' => __('City', 'txtdomain'),
			'all_items' => __('All City', 'txtdomain'),
			'edit_item' => __('Edit City', 'txtdomain'),
			'view_item' => __('View City', 'txtdomain'),
			'update_item' => __('Update City', 'txtdomain'),
			'add_new_item' => __('Add New City', 'txtdomain'),
			'new_item_name' => __('New City Name', 'txtdomain'),
			'search_items' => __('Search City', 'txtdomain'),
			'popular_items' => __('Popular City', 'txtdomain'),
			'separate_items_with_commas' => __('Separate authors with comma', 'txtdomain'),
			'choose_from_most_used' => __('Choose from most used Authors', 'txtdomain'),
			'not_found' => __('No Authors found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('job_city', 'jobs');
	
	register_taxonomy('job_feautered', ['jobs'], [
		'label' => __('Feautered', 'txtdomain'),
		'hierarchical' => false,
		'rewrite'      =>  array('slug' => '/job-feautered', 'with_front' => false),
		'show_admin_column' => true,
		'has_archive'       =>  true,
		'public'            =>  true,
        'publicly_queryable'=>  true,
        'show_ui'           =>  true, 
        'query_var'         =>  true,
        'show_in_nav_menus' =>  false,
        'capability_type'   =>  'jobs',
        'hierarchical'      =>  false,
		'labels' => [
			'singular_name' => __('Feautered', 'txtdomain'),
			'all_items' => __('All Feautered', 'txtdomain'),
			'edit_item' => __('Edit Feautered', 'txtdomain'),
			'view_item' => __('View Feautered', 'txtdomain'),
			'update_item' => __('Update Feautered', 'txtdomain'),
			'add_new_item' => __('Add New Feautered', 'txtdomain'),
			'new_item_name' => __('New Feautered Name', 'txtdomain'),
			'search_items' => __('Search Feautered', 'txtdomain'),
			'popular_items' => __('Popular Feautered', 'txtdomain'),
			'separate_items_with_commas' => __('Separate authors with comma', 'txtdomain'),
			'choose_from_most_used' => __('Choose from most used Authors', 'txtdomain'),
			'not_found' => __('No Authors found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('job_feautered', 'jobs');
}

add_theme_support('post-thumbnails', array('post', 'page', 'jobs', 'team'));
add_theme_support('widgets');

add_theme_support('custom-logo', [
	'height'      => 46,
	'width'       => 120,
	'flex-width'  => false,
	'flex-height' => false,
	'header-text' => 'Dryf',
]);



function jquery_script_method()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, null, true);
	wp_enqueue_script('jquery');
}


/**
 * Remove tag <span>.
 */

add_filter('wpcf7_form_elements', function ($content) {

	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	return $content;
});

add_filter('intermediate_image_sizes', 'delete_intermediate_image_sizes');
function delete_intermediate_image_sizes($sizes)
{

	return array_diff($sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	]);
}

add_filter('big_image_size_threshold', '__return_zero');

function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

		'product_grid'          => array(
			'default_rows'    => 3,
			'min_rows'        => 2,
			'max_rows'        => 8,
			'default_columns' => 4,
			'min_columns'     => 2,
			'max_columns'     => 5,
		),
	));
}

/*removing default submit tag*/
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');

/*adding action with function which handles our button markup*/
add_action('wpcf7_init', 'twentysixteen_child_cf7_button');

/*adding out submit button tag*/
if (!function_exists('twentysixteen_child_cf7_button')) {
	function twentysixteen_child_cf7_button()
	{
		wpcf7_add_form_tag('submit', 'twentysixteen_child_cf7_button_handler');
	}
}

/*out button markup inside handler*/
if (!function_exists('twentysixteen_child_cf7_button_handler')) {
	function twentysixteen_child_cf7_button_handler($tag)
	{
		$tag = new WPCF7_FormTag($tag);
		$class = wpcf7_form_controls_class($tag->type);
		$atts = array();
		$atts['class'] = $tag->get_class_option($class);
		$atts['class'] .= 'base-btn';
		$atts['id'] = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
		$value = isset($tag->values[0]) ? $tag->values[0] : '';
		if (empty($value)) {
			$value = esc_html__('Contact Us', 'twentysixteen');
		}
		$atts['type'] = 'submit';
		$atts = wpcf7_format_atts($atts);
		$html = sprintf('<button class="base-btn">%2$s</button>', $atts, $value);
		return $html;
	}
}


add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){
	$args = array(
		'post_type'   => 'services',
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);

	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'animal_category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);

	// create $args['meta_query'] array if one of the following fields is filled
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
		$args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true

	// if both minimum price and maximum price are specified we will use BETWEEN comparison
	if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
		$args['meta_query'][] = array(
			'key' => '_price',
			'value' => array( $_POST['price_min'], $_POST['price_max'] ),
			'type' => 'numeric',
			'compare' => 'between'
		);
	} else {
		// if only min price is set
		if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_min'],
				'type' => 'numeric',
				'compare' => '>'
			);

		// if only max price is set
		if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
			$args['meta_query'][] = array(
				'key' => '_price',
				'value' => $_POST['price_max'],
				'type' => 'numeric',
				'compare' => '<'
			);
	}


	// if post thumbnail is set
	if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
		$args['meta_query'][] = array(
			'key' => '_thumbnail_id',
			'compare' => 'EXISTS'
		);
	// if you want to use multiple checkboxed, just duplicate the above 5 lines for each checkbox

	$query = new WP_Query( $args );
	
	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			echo '<h2>' . $query->post->post_title . '</h2>';
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;
	
	die();
}