<?php
/**
 * Template Name: Autocomplete Results
 * The template for Autocomplete Results
 *
 * @package Edit
 */

$orderby = 'post_date';
$order = 'DESC';
$post_type = array('formacao','noticias','eventos','entrevista');
$post_status = 'publish';
$supress_filters = '0';

$arguments = array(
    'showposts'        => '-1',
	'orderby'          => $orderby,
	'order'            => $order,
	'post_type'        => $post_type,
	'post_status'      => $post_status,
	'suppress_filters' => $supress_filters,
    'post__not_in' => array(149,2925,153,993,995,997,151,156)
);

$myposts = get_posts( $arguments );

$str = '[';

foreach($myposts as $post){
    
    $item = array(
        "titulo" =>  get_field('home_titulo'),
        "link" => str_replace( home_url(), '', get_permalink() )
        );
    
    $str .= ''. json_encode($item) .',';
}

$str .= '""]';

echo $str;
//var_dump($myposts);
?>
