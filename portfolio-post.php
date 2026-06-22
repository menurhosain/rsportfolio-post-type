<?php

/**
 * Plugin Name: RSTheme Portfolio Post 
 * Description: Create portfolio custom post type. 
 * Version: 1.0.0
 * Author URI: http://rstheme.com
 * Plugin URI: 
 * Author: RSTheme
 * License: GPL v2 or later
 * License URI:http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: rstheme-portfolio-post 
 * Domain Path: /languages
 * Requires PHP: 7.4
 * Requires at least: 6.3
 */

if ( file_exists( plugin_dir_path( __FILE__ ) . 'metabox-portfolio.php' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'metabox-portfolio.php';
}

add_action( 'init', 'rs_portfolio_register_post_type');
add_action( 'init', 'tr_create_portfolio');			

function rs_portfolio_register_post_type() {
	$labels = array(
		'name'               => esc_html__( 'Portfolio', 'rsaddons'),
		'singular_name'      => esc_html__( 'Portfolio', 'rsaddons'),
		'add_new'            => esc_html_x( 'Add New Portfolio', 'rsaddons'),
		'add_new_item'       => esc_html__( 'Add New Portfolio', 'rsaddons'),
		'edit_item'          => esc_html__( 'Edit Portfolio', 'rsaddons'),
		'new_item'           => esc_html__( 'New Portfolio', 'rsaddons'),
		'all_items'          => esc_html__( 'All Portfolio', 'rsaddons'),
		'view_item'          => esc_html__( 'View Portfolio', 'rsaddons'),
		'search_items'       => esc_html__( 'Search Portfolio', 'rsaddons'),
		'not_found'          => esc_html__( 'No Portfolio found', 'rsaddons'),
		'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash', 'rsaddons'),
		'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'rsaddons'),
		'menu_name'          => esc_html__( 'Portfolio', 'rsaddons'),
	);
	$args = array(
		'labels'             => $labels,
		'public'             => true,	
		'show_in_menu'       => true,
		'show_in_admin_bar'  => true,
		'can_export'         => true,
		'has_archive'        => false,
		'rewrite' => array(
			'slug' => 'product',
			'with_front' => false,
		),
		'hierarchical'       => false,
		'menu_position'      => 20,		
		'supports'           => array( 'title', 'thumbnail','editor' ),		
	);
	register_post_type( 'portfolios', $args );
}

function tr_create_portfolio() {
	register_taxonomy(
		'portfolio-category',
		'portfolios',
		array(
			'label' => esc_html__( 'Portfolio Categories','rsaddons'),			
			'hierarchical' => true,
			'show_admin_column' => true,
		)
	);
}

add_image_size( 'rs_portfolio-slider', 600, 360, true );

add_action( 'wp_enqueue_scripts', 'rs_portfolio_enqueue_fluent_form_styles' );

function rs_portfolio_enqueue_fluent_form_styles() {
	wp_enqueue_style(
		'rsportfolio-fluent-form-custom',
		plugin_dir_url( __FILE__ ) . 'widgets/fluent-form/fluent-form-custom.css'
	);
}

add_action( 'elementor/widgets/register', 'rs_portfolio_register_fluent_form_widget' );

function rs_portfolio_register_fluent_form_widget( $widgets_manager ) {
	if ( ! class_exists( '\FluentForm\App\Helpers\Helper' ) ) {
		return;
	}
	require_once plugin_dir_path( __FILE__ ) . 'widgets/fluent-form/FluentFormWidget.php';
	$widgets_manager->register( new \rs__FluentFormWidget() );
}

add_action( 'admin_enqueue_scripts', 'rs_enqueue_admin_scripts' );

function rs_enqueue_admin_scripts( $hook ) {
	global $post;
	if ( ( 'post.php' === $hook || 'post-new.php' === $hook ) && isset( $post ) && 'portfolios' === $post->post_type ) {
		wp_enqueue_script(
			'rs-admin-group-duplicate',
			plugin_dir_url( __FILE__ ) . 'assets/js/admin-group-duplicate.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);
	}
}

