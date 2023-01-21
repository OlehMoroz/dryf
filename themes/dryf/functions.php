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
	wp_enqueue_style('swiper', 'https://unpkg.com/swiper@8/swiper-bundle.min.css');
	wp_enqueue_style('main-style', get_template_directory_uri() . '/build/css/main.min.css');
	wp_enqueue_style('style', get_stylesheet_uri());
}

function scripts_theme()
{
	wp_enqueue_script('swiper', '//unpkg.com/swiper@8/swiper-bundle.min.js');
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
		'taxonomies'         => array('')
	));
}

add_theme_support('post-thumbnails', array('post', 'services',));
add_theme_support('widgets');

add_theme_support('custom-logo', [
	'height'      => 29.95,
	'width'       => 137,
	'flex-width'  => false,
	'flex-height' => false,
	'header-text' => 'Nashe relax',
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
