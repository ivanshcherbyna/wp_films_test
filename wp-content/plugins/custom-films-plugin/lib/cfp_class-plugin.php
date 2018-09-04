<?php
/**
* 
*/
class CFP_Plugin{

	function __construct()
	{
		add_action('init', array($this,'films_post_type'));
	    add_action('init', array($this,'film_genre_taxonomies'));
	    add_action( 'init',array( $this,'film_year_taxonomies' ));
		add_action( 'init', array($this,'film_country_taxonomies' ));
		add_action( 'init', array($this,'film_actors_taxonomies' ));
		add_action('pre_get_posts',array($this,'custom_posts_per_page'));
		
		add_action('add_meta_boxes', array($this,'myplugin_add_custom_box'));
		add_action( 'save_post', array($this,'myplugin_save_postdata' ));
		add_action( 'show_six_films', array($this,'get_films' ));
	}

	function films_post_type() {
	$labels = array(
		'name'               =>  'Films' ,
		'singular_name'      =>  'Фильмы' ,
		'add_new'            =>  'Добавить фильм',
		'add_new_items'      =>  'Add Items',
		'all_items'  	     =>  'Фильмы',
		'edit_item'          =>  'Править позицию' ,
		'new_item'           =>  'Новая позиция' ,
		'view_item'          =>  'Просмотр позиции' ,
		'search_items'       =>  'Поиск Фильма' ,
		'featured_image'	 =>  true,
		'not_found'          =>  'Не найден',
		'not_found_in_trash' =>  'Не найден в корзине',
		'parent_item_colon'  =>  'Parent Singular Name:' ,
		'menu_name'          =>  'Все Фильмы',
		'featured_image'     =>  'Cover Image',
	);
	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-video-alt2',
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => 'films',
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'	          => array(
			'title',
			'editor',
			'thumbnail',
			//'trackbacks',
			//'custom-fields',
			'comments',
			'revisions',
			
		),
	);
	
	register_post_type( 'films', $args );
}
	
/**
	 * Create a taxonomy
	 *
	 * @uses  Inserts new taxonomy object into the list
	 * @uses  Adds query vars
	 *
	 * @param string  Name of taxonomy object
	 * @param array|string  Name of the object type for the taxonomy object.
	 * @param array|string  Taxonomy arguments
	 * @return null|WP_Error WP_Error if errors, otherwise null.
	 */
	function film_genre_taxonomies() {
	
		$labels = array(
			'name'                  => 'genre',
			'singular_name'         => 'Жанр' ,
			'search_items'          => 'Поиск категории',
			'all_items'             => 'Все категории' ,
			'parent_item'           => 'Родительская категория' ,
			'parent_item_colon'     => 'Родительская категория',
			'edit_item'             => 'Редактировать категорию' ,
			'update_item'           => 'Обновить категорию' ,
			'add_new_item'          => 'Добавить новую категорию' ,
			'new_item_name'         => 'Новое имя категории' ,
			'menu_name'             => 'Жанры' 
		);
	
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_menu'		=> true,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'query_var'         => true,
			//'rewrite'           => array('slug' => 'type' ),
		);
			
	register_taxonomy( 'genre', array('films'), $args );
}
	
	
	
function film_year_taxonomies() {
	
		$labels = array(
			'name'                  => __('year','custom-films-plugin'),
			'singular_name'         => __('Год' ,'custom-films-plugin'),
			'search_items'          => __('Поиск категории','custom-films-plugin'),
			'all_items'             => __('Все категории' ,'custom-films-plugin'),
			'parent_item'           => __('Родительская категория' ,'custom-films-plugin'),
			'parent_item_colon'     => __('Родительская категория','custom-films-plugin'),
			'edit_item'             => __('Редактировать категорию' ,'custom-films-plugin'),
			'update_item'           => __('Обновить категорию' ,'custom-films-plugin'),
			'add_new_item'          => __('Добавить новую категорию' ,'custom-films-plugin'),
			'new_item_name'         => __('Новое имя категории' ,'custom-films-plugin'),
			'menu_name'             => __('Год', 'custom-films-plugin'),
		);
	
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_menu'		=> true,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'query_var'         => true,
			//'rewrite'           => array('slug' => 'type' ),
			
			);
			
	register_taxonomy( 'year', array('films'), $args );
}
	
	
	
function film_country_taxonomies() {
	
		$labels = array(
			'name'                  => __('country','custom-films-plugin'),
			'singular_name'         => __('Страна' ,'custom-films-plugin'),
			'search_items'          => __('Поиск категории','custom-films-plugin'),
			'all_items'             => __('Все категории' ,'custom-films-plugin'),
			'parent_item'           => __('Родительская категория' ,'custom-films-plugin'),
			'parent_item_colon'     => __('Родительская категория','custom-films-plugin'),
			'edit_item'             => __('Редактировать категорию' ,'custom-films-plugin'),
			'update_item'           => __('Обновить категорию' ,'custom-films-plugin'),
			'add_new_item'          => __('Добавить новую категорию' ,'custom-films-plugin'),
			'new_item_name'         => __('Новое имя категории' ,'custom-films-plugin'),
			'menu_name'             => __('Страны','custom-films-plugin'), 
		);
	
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_menu'		=> true,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'query_var'         => true,
			//'rewrite'           => array('slug' => 'type' ),
			
			);
			
	register_taxonomy( 'country', array('films'), $args );
}

	function film_actors_taxonomies() {
	
		$labels = array(
			'name'                  => __('actors','custom-films-plugin'),
			'singular_name'         => __('Актеры' ,'custom-films-plugin'),
			'search_items'          => __('Поиск категории','custom-films-plugin'),
			'all_items'             => __('Все категории' ,'custom-films-plugin'),
			'parent_item'           => __('Родительская категория' ,'custom-films-plugin'),
			'parent_item_colon'     => __('Родительская категория','custom-films-plugin'),
			'edit_item'             => __('Редактировать категорию' ,'custom-films-plugin'),
			'update_item'           => __('Обновить категорию' ,'custom-films-plugin'),
			'add_new_item'          => __('Добавить новую категорию' ,'custom-films-plugin'),
			'new_item_name'         => __('Новое имя категории' ,'custom-films-plugin'),
			'menu_name'             => __('Актеры','custom-films-plugin'),
		);
	
		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_in_menu'		=> true,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'hierarchical'      => true,
			'query_var'         => true,
			//'rewrite'           => array('slug' => 'type' ),
			
			);
			
	register_taxonomy( 'actors', array('films'), $args );
}
	
	/*-----------CUSTOM-META BOXES--------------*/
	
//добавляем шалон для использования вывода количества 6ти постов
function custom_posts_per_page($query){
if(is_home()|| ! $query->is_main_query()){  
	$query->set( 'posts_per_page', 6 );
	if( is_page(sanitize_title('список-всех-фильмов')) && is_subpage('true')){
		// Выводим только все посты не на главных страницах
		$query->set( 'posts_per_page', -1 );
			}
	if( $query->is_post_type_archive('films') ){
		// Выводим 50 записей если это архив типа записи 'films'
		$query->set( 'posts_per_page', 50 );
			}
		}
	}

function myplugin_add_custom_box(){
	$screens = array( 'films' );
	add_meta_box( 'myplugin_sectionid', __('ADD INFO ABOUT FILMS','custom-films-plugin'), array($this,'myplugin_meta_box_callback'), $screens );
}

// HTML 
function myplugin_meta_box_callback( $post, $meta ){
	$screens = $meta['args'];

	$price = !empty($_POST['cfp_price'])?$_POST['cfp_price'] : get_post_meta($post->ID, 'cfp_price', true );
	$date =!empty($_POST['cfp_date'])?$_POST['cfp_date'] :  get_post_meta($post->ID, 'cfp_date', true );
	
	// Use nonce for verify
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' );

	// HTML
	echo '<label for="cfp_price">' . __("Price of film", 'custom-films-plugin' ) . '</label> ';
	echo '<input type="text" id="cfp_price" name="cfp_price" value="'. $price .'" size="25"  required />';

	echo '<label for="cfp_date">' . __("Date of release", 'custom-films-plugin' ) . '</label> ';
	echo '<input type="date" id="cfp_date" name="cfp_date" value="'. $date .'"  required />';
}

function myplugin_save_postdata( $post_id ) {
	
	if ( ! isset( $_POST['cfp_price'] ) && ! isset( $_POST['cfp_date'] ))
		return;

	// check nonce, safety
	if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
		return;


	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return;

	// check user
	if( ! current_user_can( 'edit_post', $post_id ) )
		return;

	// ОК save in db. 
	$cfp_date = sanitize_text_field( $_POST['cfp_date'] );
	update_post_meta( $post_id, 'cfp_date', $cfp_date );

	$cfp_price = sanitize_text_field( $_POST['cfp_price'] );
	update_post_meta( $post_id, 'cfp_price', $cfp_price );
	}
	/*-----------END CUSTOM-META BOXES--------------*/

public static function get_films($category_slug=null)
{
    $args = array(
        'orderby' => 'date',
        'order' => 'DESC',
        'numberposts' => 6,
        'category_name' => $category_slug,
        'post_status' => 'publish',
        'post_type' => array('films')
    );
    $posts = get_posts($args);
    foreach ($posts as $post) {
        setup_postdata($post);
        $str = strpos($post->post_content, "\n");
        $subtitle = strpos($post->post_content,0,$str);
        $image=get_the_post_thumbnail_url($post,array(500,500));
		$price=get_post_meta( $post->ID, 'cfp_price',true);
		$date=get_post_meta( $post->ID, 'cfp_date',true);
        
        echo '<div class="mb-layout-cell layout-item-6" style="width: 25%">
                    <p style="text-align: left">
                        <img src="'.$image.'" width="208" height="142" style="float: left"><br>
                    </p>
                    <p style="text-align: left">
                        <a href="'.$post->guid.'" target="_self" class="mb-button">'.$post->post_title.'</a>&nbsp;<br>
                    </p>
                    <div class="col-sm-3">'.$price.' $</div> <div class="col-sm-3">'.$date.'</div>
              </div>
        ';
        // html
    }
wp_reset_postdata(); // reset
}


}