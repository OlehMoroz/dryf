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
	wp_enqueue_style('main-style', get_template_directory_uri() . '/build/css/main.min.css');
	wp_enqueue_style('style', get_stylesheet_uri());
}

function scripts_theme()
{
	wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
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

	register_post_type('services', array(
		'labels'             => array(
			'name'               => 'Послуги',
			'singular_name'      => 'Послуги',
			'add_new'            => 'Добавити послугу',
			'add_new_item'       => 'Добавити послугу',
			'edit_item'          => 'Редагувати послугу',
			'new_item'           => 'Нові послуги',
			'view_item'          => 'Подивитись послугу',
			'search_items'       => 'Знайти послугу',
			'not_found'          =>  'Послуг не знайдено',
			'not_found_in_trash' => 'В корзині послуг не знайдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Послуги'

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
		'taxonomies'         => array('animal_category', '')
	));

	register_taxonomy('animal_category', ['animal'], [
		'label' => __('Category', 'txtdomain'),
		'hierarchical' => false,
		'rewrite'      =>  array('slug' => '/animal-category', 'with_front' => false),
		'show_admin_column' => true,
		'has_archive'       =>  true,
		'public'            =>  true,
        'publicly_queryable'=>  true,
        'show_ui'           =>  true, 
        'query_var'         =>  true,
        'show_in_nav_menus' =>  false,
        'capability_type'   =>  'animal',
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
	register_taxonomy_for_object_type('animal_category', 'services');

	register_taxonomy('animal_category_new', ['animal'], [
		'label' => __('Category', 'txtdomain'),
		'hierarchical' => false,
		'rewrite'      =>  array('slug' => '/animal-category', 'with_front' => false),
		'show_admin_column' => true,
		'has_archive'       =>  true,
		'public'            =>  true,
        'publicly_queryable'=>  true,
        'show_ui'           =>  true, 
        'query_var'         =>  true,
        'show_in_nav_menus' =>  false,
        'capability_type'   =>  'animal',
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

	register_taxonomy_for_object_type('animal_category_new', 'services');
    register_post_type('feedback', array(
        'labels'             => array(
            'name'               => 'Фідбек',
            'singular_name'      => 'Фідбек',
            'add_new'            => 'Добавити фідбек',
            'add_new_item'       => 'Добавити фідбек',
            'edit_item'          => 'Редагувати фідбек',
            'new_item'           => 'Нові фідбеки',
            'view_item'          => 'Подивитись фідбеки',
            'search_items'       => 'Знайти фідбеки',
            'not_found'          =>  'Фідбек не знайдено',
            'not_found_in_trash' => 'В корзині фідбеків не знайдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Фідбек'
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
    register_taxonomy_for_object_type('animal_category_new', 'services');
    register_post_type('team', array(
        'labels'             => array(
            'name'               => 'Команда',
            'singular_name'      => 'Команда',
            'add_new'            => 'Добавити працівника',
            'add_new_item'       => 'Добавити працівника',
            'edit_item'          => 'Редагувати працівника',
            'new_item'           => 'Нові працівники',
            'view_item'          => 'Подивитись працівників',
            'search_items'       => 'Знайти працівника',
            'not_found'          =>  'Працівника не знайдено',
            'not_found_in_trash' => 'В корзині працівнкиків не знайдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Команда'
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
        'menu_position'      => 5,
        'supports'           => array('title', 'thumbnail', 'excerpt', 'editor'),
        'menu_icon'			 => 'dashicons-open-folder',
    ));
    register_taxonomy_for_object_type('animal_category_new', 'services');
    register_post_type('vacancies', array(
        'labels'             => array(
            'name'               => 'Вакансії',
            'singular_name'      => 'Вакансії',
            'add_new'            => 'Добавити вакансію',
            'add_new_item'       => 'Добавити вакансію',
            'edit_item'          => 'Редагувати вакансію',
            'new_item'           => 'Нові вакансії',
            'view_item'          => 'Подивитись вакансії',
            'search_items'       => 'Знайти вакансію',
            'not_found'          =>  'Вакансію не знайдено',
            'not_found_in_trash' => 'В корзині вакансії не знайдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Вакансії'
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
        'menu_position'      => 6,
        'supports'           => array('title', 'thumbnail', 'excerpt', 'editor'),
        'menu_icon'			 => 'dashicons-open-folder',
    ));
}

add_theme_support('post-thumbnails', array('post','feedback', 'vacancies', 'services', 'team',));
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