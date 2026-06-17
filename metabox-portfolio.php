<?php
/**
 * Portfolio Post Type Metaboxes
 * Requires CMB2 plugin to be installed and active.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load CMB2 only if not already loaded (e.g. by another plugin or the theme).
if ( ! defined( 'CMB2_LOADED' ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'cmb2/init.php';
}

// Custom Title
add_action( 'cmb2_admin_init', 'rs_register_header_banners_metabox' );

function rs_register_header_banners_metabox() {
	$cmb_demo = new_cmb2_box( array(
		'id'           => 'rs_demo_metabox',
		'title'        => esc_html__( 'Custom Title', 'rstheme-portfolio-post' ),
		'object_types' => array( 'portfolios' ),
	) );

	$cmb_demo->add_field( array(
		'name' => esc_html__( 'Product Type', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Enter Custom Text', 'rstheme-portfolio-post' ),
		'id'   => 'custom_type',
		'type' => 'textarea_small',
	) );
}

// Portfolio Images
add_action( 'cmb2_admin_init', 'rs_register_project_metabox' );

function rs_register_project_metabox() {
	$cmb_project = new_cmb2_box( array(
		'id'           => 'rs_metabox-project',
		'title'        => esc_html__( 'Project Images', 'rstheme-portfolio-post' ),
		'object_types' => array( 'portfolios' ),
	) );

	$cmb_project->add_field( array(
		'name' => esc_html__( 'Upload Project Images', 'rstheme-portfolio-post' ),
		'desc' => '',
		'id'   => 'Screenshot',
		'type' => 'file_list',
		'text' => array(
			'add_upload_files_text' => esc_html__( 'Upload Files', 'rstheme-portfolio-post' ),
			'remove_image_text'     => esc_html__( 'Remove Image', 'rstheme-portfolio-post' ),
			'file_text'             => esc_html__( 'File:', 'rstheme-portfolio-post' ),
			'file_download_text'    => esc_html__( 'Download', 'rstheme-portfolio-post' ),
			'remove_text'           => esc_html__( 'Remove', 'rstheme-portfolio-post' ),
		),
	) );

	$cmb_project->add_field( array(
		'name'             => esc_html__( 'Project Image Style', 'rstheme-portfolio-post' ),
		'desc'             => esc_html__( 'Choose your style', 'rstheme-portfolio-post' ),
		'id'               => 'image_select',
		'type'             => 'select',
		'show_option_none' => esc_html__( 'Default', 'rstheme-portfolio-post' ),
		'options'          => array(
			'slider'  => esc_html__( 'Slider', 'rstheme-portfolio-post' ),
			'gallery' => esc_html__( 'Gallery', 'rstheme-portfolio-post' ),
		),
	) );

	$cmb_project->add_field( array(
		'name'    => esc_html__( 'Recent Product Thumbnail', 'rstheme-portfolio-post' ),
		'desc'    => esc_html__( 'In Footer Recent Product Thumbnail', 'rstheme-portfolio-post' ),
		'id'      => 'recent_product_thumbnail',
		'type'    => 'file',
		'options' => array(
			'url' => false,
		),
		'text'    => array(
			'add_upload_file_text' => esc_html__( 'Add Product Thumbnail', 'rstheme-portfolio-post' ),
		),
	) );
}

// Project Information
add_action( 'cmb2_admin_init', 'rs_register_project_info_metabox' );

function rs_register_project_info_metabox() {
	$project_info = new_cmb2_box( array(
		'id'           => 'rsproject_metabox',
		'title'        => esc_html__( 'Project Information', 'rstheme-portfolio-post' ),
		'object_types' => array( 'portfolios' ),
	) );

	$project_info->add_field( array(
		'name'             => esc_html__( 'Select Product Types (Theme, Plugin)', 'rstheme-portfolio-post' ),
		'desc'             => esc_html__( 'Choose your product type theme or plugin (default: theme)', 'rstheme-portfolio-post' ),
		'id'               => 'product_type_theme_or_plugin_select',
		'type'             => 'select',
		'show_option_none' => esc_html__( 'Theme', 'rstheme-portfolio-post' ),
		'options'          => array(
			'theme'  => esc_html__( 'Theme', 'rstheme-portfolio-post' ),
			'plugin' => esc_html__( 'Plugin', 'rstheme-portfolio-post' ),
		),
	) );

	$project_info->add_field( array(
		'name'             => esc_html__( 'Product Types', 'rstheme-portfolio-post' ),
		'desc'             => esc_html__( 'Choose your product type', 'rstheme-portfolio-post' ),
		'id'               => 'type_select',
		'type'             => 'select',
		'show_option_none' => esc_html__( 'Default', 'rstheme-portfolio-post' ),
		'options'          => array(
			'option1' => esc_html__( 'Free', 'rstheme-portfolio-post' ),
			'option2' => esc_html__( 'Commercial', 'rstheme-portfolio-post' ),
		),
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Project Category', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add Category', 'rstheme-portfolio-post' ),
		'id'   => 'p_cat',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Product ID', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add Themeforest Product ID', 'rstheme-portfolio-post' ),
		'id'   => 'p_id',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Project Title', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add Project Title', 'rstheme-portfolio-post' ),
		'id'   => 'p_title',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Regular Price', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add regular price', 'rstheme-portfolio-post' ),
		'id'   => 'sales_price',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Sales Price', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add sales price', 'rstheme-portfolio-post' ),
		'id'   => 'price',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Total Sale (Fake)', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add total sale number', 'rstheme-portfolio-post' ),
		'id'   => 'total_sale',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Version', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add Version', 'rstheme-portfolio-post' ),
		'id'   => 'version',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Release Date', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add project release date', 'rstheme-portfolio-post' ),
		'id'   => 'release_date',
		'type' => 'text_date',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Update Date', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add project update date', 'rstheme-portfolio-post' ),
		'id'   => 'update_date',
		'type' => 'text_date',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Compatibility', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add compatibility', 'rstheme-portfolio-post' ),
		'id'   => 'compatitbility',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Compatible Browsers', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add supported browsers', 'rstheme-portfolio-post' ),
		'id'   => 'browsers',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Layout', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add layout type', 'rstheme-portfolio-post' ),
		'id'   => 'layout',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Buy Now Link', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add buy now link', 'rstheme-portfolio-post' ),
		'id'   => 'buynow',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Buy Now Code', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add buy now code', 'rstheme-portfolio-post' ),
		'id'   => 'buynowcode',
		'type' => 'textarea',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Download Link', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add download link', 'rstheme-portfolio-post' ),
		'id'   => 'download_url',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Documentation Link', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add documentation link', 'rstheme-portfolio-post' ),
		'id'   => 'docum_url',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Demo Link', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add demo link', 'rstheme-portfolio-post' ),
		'id'   => 'demo_url',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Feature Button Text', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add feature button text', 'rstheme-portfolio-post' ),
		'id'   => 'feature_btn_text',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Changelog Button Text', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add changelog button text', 'rstheme-portfolio-post' ),
		'id'   => 'changelog_btn_text',
		'type' => 'text_medium',
	) );

	$project_info->add_field( array(
		'name' => esc_html__( 'Sidebar Feature', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'After a line use a comma ( eg: line, line ) & it will separate lines with icon automatically. You can use Enter after comma.', 'rstheme-portfolio-post' ),
		'id'   => 'sidebar_feature',
		'type' => 'textarea',
	) );
}

// Project Short Description
add_action( 'cmb2_admin_init', 'rs_register_project_desc_metabox' );

function rs_register_project_desc_metabox() {
	$project_desc = new_cmb2_box( array(
		'id'           => 'rsdesc_short',
		'title'        => esc_html__( 'Project Short Description', 'rstheme-portfolio-post' ),
		'object_types' => array( 'portfolios' ),
	) );

	$project_desc->add_field( array(
		'name'    => esc_html__( 'Short Description', 'rstheme-portfolio-post' ),
		'desc'    => esc_html__( 'Short description', 'rstheme-portfolio-post' ),
		'id'      => 'short_description',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
}

// Project Feature List
add_action( 'cmb2_admin_init', 'rs_register_project_feature_metabox' );

function rs_register_project_feature_metabox() {
	$project_feature = new_cmb2_box( array(
		'id'           => 'rsdesc_list',
		'title'        => esc_html__( 'Project Feature List', 'rstheme-portfolio-post' ),
		'object_types' => array( 'portfolios' ),
	) );

	$project_feature->add_field( array(
		'name'    => esc_html__( 'Feature List', 'rstheme-portfolio-post' ),
		'id'      => 'feature_list',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
}

// Pricing Option
add_action( 'cmb2_admin_init', 'rs_register_pricing_option_metabox' );

function rs_register_pricing_option_metabox() {
	$pricing = new_cmb2_box( array(
		'id'           => 'rs_pricing_option_metabox',
		'title'        => esc_html__( 'Pricing Option', 'rstheme-portfolio-post' ),
		'object_types' => array( 'portfolios' ),
	) );

	$group_field_id = $pricing->add_field( array(
		'id'          => 'pricing_options',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => esc_html__( 'Pricing Option {#}', 'rstheme-portfolio-post' ),
			'add_button'    => esc_html__( 'Add Another Option', 'rstheme-portfolio-post' ),
			'remove_button' => esc_html__( 'Remove Option', 'rstheme-portfolio-post' ),
			'sortable'      => true,
		),
	) );

	$pricing->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Title', 'rstheme-portfolio-post' ),
		'id'   => 'title',
		'type' => 'text',
	) );

	$pricing->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Price', 'rstheme-portfolio-post' ),
		'id'         => 'price',
		'type'       => 'text',
		'attributes' => array(
			'type' => 'number',
		),
	) );

	$pricing->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Feature', 'rstheme-portfolio-post' ),
		'desc' => esc_html__( 'Add each feature on a new line.', 'rstheme-portfolio-post' ),
		'id'   => 'feature',
		'type' => 'textarea',
	) );

	$pricing->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Link', 'rstheme-portfolio-post' ),
		'id'   => 'link',
		'type' => 'text',
	) );
}

// Project Changelog
add_action( 'cmb2_admin_init', 'rs_register_project_changelog_metabox' );

function rs_register_project_changelog_metabox() {
	$project_changelog = new_cmb2_box( array(
		'id'           => 'rsdesc_changelog',
		'title'        => esc_html__( 'Project Changelog Description', 'rstheme-portfolio-post' ),
		'object_types' => array( 'portfolios' ),
	) );

	$project_changelog->add_field( array(
		'name'    => esc_html__( 'Changelog Description', 'rstheme-portfolio-post' ),
		'desc'    => esc_html__( 'Changelog description', 'rstheme-portfolio-post' ),
		'id'      => 'changelog_text',
		'type'    => 'wysiwyg',
		'options' => array(
			'textarea_rows' => 5,
		),
	) );
}
