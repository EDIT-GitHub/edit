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
    <div id="container">
    <?php
        
    get_template_part( 'partials/partial', $template);
    ?>
    </div>
    <?php
}else{
    $html = load_template_part('partials/partial', $template);
    
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
