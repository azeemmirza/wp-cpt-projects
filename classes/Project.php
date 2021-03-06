<?php
/**
 * Created by PhpStorm.
 * User: Azeem Mirza
 * Date: 7/14/2018
 * Time: 11:00 PM
 */

/**
 * Security, checks if WordPress is running
 **/

if ( !function_exists( 'add_action' ) ) :
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
endif;

/**
 * Class Project
 */

final class Project {
	/**
	 * Constructor
	 *
	 * @access public
	 * @since v0.1.0
	 * @author Azeem Mirza
	 **/
	public function __construct()
	{
		add_action( 'init', array( $this, 'register_post_type' ) );
		//add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
		add_action('add_meta_boxes', array( $this, 'image_cmb' ));


	} // END __construct
	/**
	 * Scripts
	 *
	 * @access public
	 * @since v0.2.0
	 * @author Azeem Mirza
	 **/

	public function scripts () {
		wp_register_style(
			'project-style',
			plugin_dir_url(__DIR__ ).'assets/style.css'
		);
		wp_enqueue_style( 'project-style' );

		wp_register_script(
			'project-script',
			plugin_dir_url(__DIR__ ).'assets/script.js');
		wp_enqueue_script('project-script');
	}

	/**
	 * Load plugin textdomain
	 *
	 * @access public
	 * @since v0.1.0
	 * @author Azeem Mirza
	 **/
	public function load_plugin_textdomain()
	{
		load_plugin_textdomain( 'custom-post-type-projects', false, dirname( plugin_basename( __FILE__ ) ) . '/../languages/'  );
	} // END load_plugin_textdomain
	/**
	 * Register post type
	 *
	 * @access public
	 * @since v0.1.0
	 * @author Azeem Mirza
	 **/
	public function register_post_type()
	{
		register_post_type( 'project', array(
			'labels' => array(
				'name' => _x( 'Projects', 'post type general name', 'custom-post-type-projects' ),
				'singular_name' => _x( 'Project', 'post type singular name', 'custom-post-type-projects' ),
				'add_new' => _x( 'Add New', 'Project', 'custom-post-type-projects' ),
				'add_new_item' => __( 'Add New Project', 'custom-post-type-projects' ),
				'edit_item' => __( 'Edit Project', 'custom-post-type-projects' ),
				'new_item' => __( 'New Project', 'custom-post-type-projects' ),
				'view_item' => __( 'View Project', 'custom-post-type-projects' ),
				'search_items' => __( 'Search Projects', 'custom-post-type-projects' ),
				'not_found' =>	__( 'No Projects found', 'custom-post-type-projects' ),
				'not_found_in_trash' => __( 'No Projects found in Trash', 'custom-post-type-projects' ),
				'parent_item_colon' => '',
				'menu_name' => __( 'Projects', 'custom-post-type-projects' )
			),
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'query_var' => TRUE,
			'rewrite' => array( 'slug' => _x( 'projects', 'post type slug', 'custom-post-type-projects' ) ),
			'capability_type' => 'post',
			'has_archive' => TRUE,
			'hierarchical' => FALSE,
			'menu_position' => NULL,
			'menu_icon' => 'dashicons-clipboard',
			'supports' => array( 'title', /*'editor', 'author',*/ 'thumbnail', /*'excerpt', 'custom-fields'*/ )
		) );

	} // END register_post_type
	/**
	 * Register taxonomy
	 *
	 * @access public
	 * @since 0.1.0
	 * @author Azeem Mirza
	 */
	public function register_taxonomy()
	{
		add_action('wp_enqueue_scripts', array( $this, 'scripts' ));
		register_taxonomy( 'project-category', array( 'project' ), array(
			'hierarchical' => TRUE,
			'labels' => array(
				'name' => _x( 'Project Categories', 'taxonomy general name', 'custom-post-type-projects' ),
				'singular_name' => _x( 'Project Category', 'taxonomy singular name', 'custom-post-type-projects' ),
				'search_items' =>  __( 'Search Project Categories', 'custom-post-type-projects' ),
				'all_items' => __( 'All Project Categories', 'custom-post-type-projects' ),
				'parent_item' => __( 'Parent Project Category', 'custom-post-type-projects' ),
				'parent_item_colon' => __( 'Parent Project Category:', 'custom-post-type-projects' ),
				'edit_item' => __( 'Edit Project Category', 'custom-post-type-projects' ),
				'update_item' => __( 'Update Project Category', 'custom-post-type-projects' ),
				'add_new_item' => __( 'Add New Project Category', 'custom-post-type-projects' ),
				'new_item_name' => __( 'New Project Category Name', 'custom-post-type-projects' ),
				'menu_name' => __( 'Project Categories', 'custom-post-type-projects' ),
			),
			'show_ui' => TRUE,
			'query_var' => TRUE,
			'rewrite' => array( 'slug' => _x( 'project-category', 'Project Category Slug', 'custom-post-type-projects' ) ),
			'show_admin_column' => TRUE,
		));

	} // END register_taxonomy

	public function image_cmb () {
		add_meta_box(
			'project_image',
			__( 'Project Body', 'cpt_project'),
			array( $this, 'image_cmb_callback' ),
			'project',
			'advanced',
			'default'
		);
	}

	public  function image_cmb_callback ($post) {
		// Add nonce for security and authentication.
		wp_nonce_field( 'custom_nonce_action', 'custom_nonce' );
		require 'project-form.php';
/*echo plugin_dir_url(__DIR__ ).'assets/script.js';*/
		?>

		<?php

	}

} // END Custom_Post_Type_Project

/**
 * Instantiation of class Project
 */
new Project;