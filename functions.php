<?php
define('THEME_NAME', 'StartupFunding');
$template_directory_uri = get_template_directory_uri();

// Remove unnecessary code
	remove_action('wp_head', 'feed_links', 2);  
	remove_action('wp_head', 'feed_links_extra', 3);  
	remove_action('wp_head', 'rsd_link');  
	remove_action('wp_head', 'wlwmanifest_link');  
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);  
	remove_action('wp_head', 'wp_generator'); 

// Enable Features
	add_theme_support( 'post-thumbnails' );
	add_editor_style('/css/editor-style.css');
	register_nav_menus(array(
		'header_top' => 'Top Header Menu',
		'header_main' => 'Main Header Menu',
		'footer_menu' => 'Footer Menu')
	);

// Image sizes
	// add_image_size( '', 300, 300, true );

// Functions

function custom_styles(){
	global $template_directory_uri;

	wp_enqueue_style('fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,400italic|Roboto+Slab:300|Montserrat:700' );
	wp_enqueue_style('main', $template_directory_uri . '/css/main.css');
}

function custom_scripts(){
	global $template_directory_uri;

	wp_localize_script( 'main', 'url', array(
		'template' => $template_directory_uri,
		'base' => site_url(),
	));
	
	wp_enqueue_script('modernizr', $template_directory_uri . '/js/vendor/modernizr-2.6.1.min.js', array('jquery'), '', true);
	wp_enqueue_script('main', $template_directory_uri . '/js/main.js', array('jquery'), '', true);
}

// Add Actions
	add_action( 'wp_enqueue_scripts', 'custom_styles', 30 );
	add_action( 'wp_enqueue_scripts', 'custom_scripts', 30 );

// Add Options Page

	if( function_exists('acf_add_options_page') ) acf_add_options_page();