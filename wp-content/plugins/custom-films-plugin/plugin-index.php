<?php
/*
Plugin Name: Custom films plugin
Description: View any films by custom posts
Version: 1.0
Author: Ivan Shcherbyna
Text Domain: custom-films-plugin
License: GPLv3
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}


if ( !class_exists( 'CFP_Plugin' ) ) :

define('CFP_PLUGIN_URL',plugin_dir_url (__FILE__));
define('CFP_PLUGIN_PATH',plugin_dir_path(__FILE__));


require_once __DIR__ . '/lib/cfp_class-PageTemplater.php';
require_once __DIR__ . '/lib/cfp_class-plugin.php';
require_once __DIR__ . '/lib/cfp_class-install.php';
	
	
	 	 $film_posts = new CFP_Plugin();
	 	// $install = new CFP_Install();
	 	 
register_deactivation_hook( __FILE__, array('CFP_Install','cfp_get_uninstall') );
register_activation_hook( __FILE__, array('CFP_Install', 'cfp_get_install') );
endif;