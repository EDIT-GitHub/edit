<?php
/*
 * Formacao Single
 * @package Edit
 */

// global $post;
$headers = getHeaders();
$template = get_field('template');

if(!isset($headers['Custom-Ajax-Request'])){
    get_header(); 
}

if(!isset($headers['Custom-Ajax-Request'])){?>
<!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<script>
        window.onload = function() {
            var layer = document.getElementById("loaderLayer")
            layer.className = 'remove'; 
        }
        </script>
<div id="container">

    <?php
    if( get_field('ingles') ) {
        get_template_part( 'partials/partial', 'detalhe-curso-en');
    }elseif (LANGUAGE == 'PT') {
        get_template_part( 'partials/partial', 'detalhe-curso');
    } else {
        get_template_part( 'partials/partial', 'detalhe-curso-es');
    }
    ?>
</div>

<?php
}else{
    if( get_field('ingles') ) {
        $html = load_template_part( 'partials/partial', 'detalhe-curso-en');
    }elseif (LANGUAGE == 'PT') {
        $html = load_template_part('partials/partial', 'detalhe-curso');
    }else{
        $html = load_template_part('partials/partial', 'detalhe-curso-es');
    }

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
