<?php

add_shortcode( 'show_six_films', array('CFP_Plugin','get_films') );
global $post;
$args = array('post_type' => 'films');

$query = new WP_Query( $args );