<?php
class PageTemplater {
	
	/**
	* A reference to an instance of this class.
	*/
	private static $instance;
	/**
	* The array of templates that this plugin tracks.
	*/
	protected $templates;
	/**
	* Returns an instance of this class.
	*/
	public static function get_instance() {
	if( null == self::$instance ) {
		self::$instance = new PageTemplater();
	}
	return self::$instance;
	}
	/**
	* Initializes the plugin by setting filters and admin`istration functions.
	*/
	private function __construct() {
	add_filter( "single_template", array($this,"get_films_post_type_template"));
	add_action("template_redirect", array($this,'post_films_redirect'));
	//add_action('template_include', array($this,'my_template_include'));

}
function get_films_post_type_template($single_template) {
 global $post;

 if ($post->post_type == 'films') {
      $single_template = CFP_PLUGIN_PATH . '/templates/single-films.php';
 }
 return $single_template;
}


function post_films_redirect() {
    global $wp, $post, $wp_query;
    var_dump(CFP_PLUGIN_PATH );
    $plugindir = CFP_PLUGIN_PATH;
    //A Specific Custom Post Type
    if ($wp_query->query_vars['post_type'] == 'films') {
        $templatefilename = 'single-films.php';
        if (file_exists(CFP_PLUGIN_PATH . '/' . $templatefilename)) {
            $return_template = CFP_PLUGIN_PATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . 'templates/' . $templatefilename;
        }
       
        $this->do_theme_redirect($return_template);

    //A Custom Taxonomy Page
    } /*elseif ($wp->query_vars["taxonomy"] == 'product_categories') {
        $templatefilename = 'taxonomy-product_categories.php';
        if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
            $return_template = TEMPLATEPATH . '/' . $templatefilename;
        } else {
            $return_template = $plugindir . '/themefiles/' . $templatefilename;
        }
        $this->do_theme_redirect($return_template);

   */
}

function do_theme_redirect($url) {
    global $post, $wp_query;
    if (have_posts()) {
        include($url);
        die();
    } else {
        $wp_query->is_404 = true;
    }
  }

function my_template_include($template) {

    $file = CFP_PLUGIN_PATH.'/templates/single-'.get_post_type().'.php';
    if(file_exists($file)) {
        $template = $file;
    	}

    return $template;

	}
}
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );