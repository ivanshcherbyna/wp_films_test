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

require_once __DIR__ . '/lib/cfp_class-menu.php';
require_once __DIR__ . '/lib/cfp_class-plugin.php';

$film_posts = new CFP_Plugin();

endif;