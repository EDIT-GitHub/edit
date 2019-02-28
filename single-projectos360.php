<?php
/*
 * Formacao Single
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
    if (LANGUAGE == 'PT'):
        get_template_part( 'partials/partial', 'detalhe-360');
    else: 
        get_template_part( 'partials/partial', 'detalhe-360-es');
    endif;
    ?>
</div>

<?php
}else{
    if (LANGUAGE == 'PT'):
        $html = load_template_part('partials/partial', 'detalhe-360');
    else:
        $html = load_template_part('partials/partial', 'detalhe-360-es');
    endif;

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
