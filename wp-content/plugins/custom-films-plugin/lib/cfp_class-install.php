<?php
/**
* 
*/
class CFP_Install 
{
	public static $test_films = array();
	public static $IDs = array();
	public static $post_type;
	function __construct()
	{
		self::$post_type = 'films';
	}
	static function cfp_get_install(){
		$IDs[] = array();
		$author = get_current_user_id();
		$post_type = self::$post_type = 'films';
		$films[]=array(
		  'post_author'=> $author,
		  // 'post_category' => [ array(<category id>, <...>) ] ,
		  'post_content' => 'Служебный роман смотреть онлайн <br>  https://www.youtube.com/watch?v=hR-1QGMK75c' ,
		  'post_status' => 'publish',
		  'post_title' => 'Служебный роман',
		  'post_type' => $post_type,
		  'meta_input'     => array( 'cfp_price'=>'60,00','cfp_date' => '2010-10-10'), 
		  'tax_input' => array('country' =>  'СССР' )/*,
		  			   array( 'genre' => array( 'комедия') ),
		  			   array( 'year' => array( '1977' ) ),
		  			   array( 'actors' => 
		  		       array( 'Андрей Мягков','Алиса Фрейндлих','Светлана Немоляева','Олег Басилашвили','Лия Ахеджакова' )
		  				   		)
		  			)*/
		);

		 $films[]=array(
		  'post_author'=> $author,
		  //'post_category' => [ array(<category id>, <...>) ] ,
		  'post_content' => 'Форсаж 8 смотреть онлайн <br> https://www.youtube.com/watch?v=p7T5Q_jxLJA' ,
		  'post_status' => 'publish',
		  'post_title' => 'Форсаж 8',
		  'post_type' => $post_type,
		  'meta_input'     =>  array('cfp_price'=>'40,00','cfp_date' => '2010-10-08' ), 
		  'tax_input' => [ 'taxonomy_name' => array( 'country' => array( 'США' ) ),
		  				   array( 'genre' => array( 'боевик' ) ),
		  				   /*array( 'year' => array( '2017' ) ),
		  				   array( 'actors' => array( 'Вин Дизель','Алиса Фрейндлих','Дуэйн Джонсон','Джейсон Стэйтем','Мишель Родригес' )
		  				   ) */] 
		);

		 $films[]=array(
		  'post_author'=> $author,
		  //'post_category' => [ array(<category id>, <...>) ] ,
		  'post_content' => 'Форсаж 3 смотреть онлайн <br> https://www.youtube.com/watch?v=p7T5Q_jxLJA' ,
		  'post_status' => 'publish',
		  'post_title' => 'Форсаж 3',
		  'post_type' => $post_type,
		  'meta_input'     =>  array('cfp_price'=>'43,00','cfp_date' => '2009-10-08' ), 
		  'tax_input' => [ 'taxonomy_name' => array( 'country' => array( 'США' ) ),
		  				   array( 'genre' => array( 'боевик' ) ),
		  				   /*array( 'year' => array( '2017' ) ),
		  				   array( 'actors' => array( 'Вин Дизель','Алиса Фрейндлих','Дуэйн Джонсон','Джейсон Стэйтем','Мишель Родригес' )
		  				   ) */] 
		);
		 $films[]=array(
		  'post_author'=> $author,
		  //'post_category' => [ array(<category id>, <...>) ] ,
		  'post_content' => 'Атлантида смотреть онлайн <br> https://www.youtube.com/watch?v=p7T5Q_jxLJA' ,
		  'post_status' => 'publish',
		  'post_title' => 'Атлантида',
		  'post_type' => $post_type,
		  'meta_input'     =>  array('cfp_price'=>'53,00','cfp_date' => '2018-01-08' ), 
		  'tax_input' => [ 'taxonomy_name' => array( 'country' => array( 'США' ) ),
		  				   array( 'genre' => array( 'фантастика	' ) ),
		  				   /*array( 'year' => array( '2017' ) ),
		  				   array( 'actors' => array( 'Вин Дизель','Алиса Фрейндлих','Дуэйн Джонсон','Джейсон Стэйтем','Мишель Родригес' )
		  				   ) */] 
		);
		 $i = 0;
		 foreach ($films as $item) {
		 	$i++;
		 	$IDs[$i] = wp_insert_post( $item, $wp_error = true ); 
			self::set_test_ids($item['ID']); 
		 }
		 
	}
	public static function set_test_ids($arg){
		array_push(self::$IDs, $arg);
	}

static function cfp_get_uninstall(){
	$films = get_posts([
  	'post_type' => 'films',
  	'post_status' => 'publish',
  	'numberposts' => -1]);

foreach ($films as $film) {

				wp_delete_post( $film->ID, $force_delete = true );
			
			}
		}
	
}

