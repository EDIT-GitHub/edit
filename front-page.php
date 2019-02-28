<?php
/*
 * Template Name: Backbone
 * The Template for Backbone
 * @package Edit
 */

$headers = getHeaders();
$template = get_field('template');

if(!isset($headers['Custom-Ajax-Request'])){
    get_header(); 
}

if(!isset($headers['Custom-Ajax-Request'])){?>
<!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="container">
    <?php
    get_template_part( 'partials/partial', 'home');
    ?>
</div>

<?php
}else{
    $html = load_template_part('partials/partial', 'home');
    $pageTitle = wp_title('',false,'right');
       $json = json_encode(array(
        'html' => $html,
        'pageTitle' => $pageTitle
        ));
    
    echo $json;
}

if(!isset($headers['Custom-Ajax-Request']))
    get_footer(); 
?>


