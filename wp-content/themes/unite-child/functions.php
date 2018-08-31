<?php
// function enable_custom_plugins() {
// 	if ( $active_plugins = get_option('active_plugins') ) { // get array with active plugins
// 		$activate_this = array( 
// 			'custom-films-plugin/plugin-index.php' 
// 		);
// 		foreach ( $activate_this as $plugin ) {
// 			if ( !in_array( $plugin, $active_plugins ) ) {
// 				array_push( $active_plugins, $plugin );
// 				update_option( 'active_plugins', $active_plugins );
// 			}
// 		}
 
// 	}
// }
 
// add_action( 'admin_init', 'enable_custom_plugins', 10 );
//require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
// if(!is_plugin_active( 'custom-films-plugin/index.php' )){
// 	echo '<h2 style="text-align:center">Please activate custom films plugin</h2>';
// }