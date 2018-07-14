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

require( 'classes/Project.php' );
if ( is_admin() )
	require( 'classes/Project_Admin.php' );