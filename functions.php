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
	add_image_size( 'slider', 600, 9999, false );

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
	
	wp_enqueue_script('modernizr', $template_directory_uri . '/js/plugins/modernizr-2.6.1.min.js', array('jquery'), '', true);
	wp_enqueue_script('slider', $template_directory_uri . '/js/plugins/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('main', $template_directory_uri . '/js/main.js', array('jquery'), '', true);
}

// Add Actions
	add_action( 'wp_enqueue_scripts', 'custom_styles', 30 );
	add_action( 'wp_enqueue_scripts', 'custom_scripts', 30 );
	add_action( 'init', 'create_post_type' );
	add_action( 'init', 'startup_category' );

// Add Options Page
	if( function_exists('acf_add_options_page') ) acf_add_options_page();

// Custom Post Type
function create_post_type() {
	register_post_type( 'startup',
		array(
			'labels' => array(
				'name' => __( 'Startups' ),
				'singular_name' => __( 'Startup' ),
				'add_new' => __('Add Startup'),
				'search_items' => __('Search Startups'),
				'not_found' => __('No Startups Found')
			),
		'public' => true,
		'hierarchical' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'page-attributes'
			)
		)
	);
}
// Register Taxonomy
function startup_category() {

	$labels = array(
		'name'					=> _x( 'Startup Categories', 'Taxonomy plural name', 'text-domain' ),
		'singular_name'			=> _x( 'Startup Category', 'Taxonomy singular name', 'text-domain' ),
		'search_items'			=> __( 'Search Startup Categories', 'text-domain' ),
		'popular_items'			=> __( 'Popular Startup Categories', 'text-domain' ),
		'all_items'				=> __( 'All Startup Categories', 'text-domain' ),
		'parent_item'			=> __( 'Parent Startup Category', 'text-domain' ),
		'parent_item_colon'		=> __( 'Parent Startup Category', 'text-domain' ),
		'edit_item'				=> __( 'Edit Startup Category', 'text-domain' ),
		'update_item'			=> __( 'Update Startup Category', 'text-domain' ),
		'add_new_item'			=> __( 'Add New Startup Category', 'text-domain' ),
		'new_item_name'			=> __( 'New Startup Category', 'text-domain' ),
		'add_or_remove_items'	=> __( 'Add or remove Startup Category', 'text-domain' ),
		'choose_from_most_used'	=> __( 'Choose from most used Startup Categories', 'text-domain' ),
		'menu_name'				=> __( 'Startup Category', 'text-domain' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_admin_column' => true,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => true,
		'query_var'         => true,
		'capabilities'      => array(),
	);

	register_taxonomy( 'startup-category', array( 'startup' ), $args );
}