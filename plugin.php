<?php
/**
 * Plugin Name: Custom Post Type Projects
 * Plugin URI: http://azeemirza.com
 * Description: Manage projects
 * Version: 0.0.0
 * Author: Azeem Mirza
 * Author URI: http://azeemirza.com
 * Text Domain: custom-post-type-projects
 * Domain Path: /languages/
 * License: GPL2
 * User: Azeem Mirza
 * Date: 7/14/2018
 * Time: 10:48 PM
 * Created by PhpStorm.
 */
function scripts () {
	wp_register_style(
		'project-style',
		plugin_dir_url(__DIR__ ).'projects/assets/style.css'
	);
	wp_enqueue_style('thickbox');
	wp_enqueue_style( 'project-style' );

	wp_enqueue_script('jquery');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');

	wp_register_script(
		'project-script',
		plugin_dir_url(__DIR__ ).'projects/assets/script.js',
		array('jquery','media-upload','thickbox')
		);
	wp_enqueue_script('project-script');
}

add_action('admin_print_scripts', 'scripts');

require( 'classes/Project.php' );
if ( is_admin() )

	require( 'classes/Project_Admin.php' );