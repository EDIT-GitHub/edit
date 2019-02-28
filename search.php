<?php
/*
* The Template for Pesquisa
* @package edit
*/
get_header();
global $query_string;
global $wp_query;
$search = get_search_query();
$orderby = 'post_date';
$order = 'DESC';
$post_type = array('formacao','noticias', 'eventos','entrevista','page', 'blog');
$post_status = 'publish';
$supress_filters = '0';
$modulesCount = 1;
$numberOfItens = 6;
$type = '';
$url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$total = 0;
if(isset($_REQUEST['tipo'])) {
    $type = $_REQUEST['tipo'];
    $numberOfItens = '-1';
}
function getTagedPosts($search, $postType){
    global $wpdb;

    $querystr = "
    SELECT $wpdb->postmeta.post_id
    FROM $wpdb->postmeta INNER JOIN $wpdb->posts
    ON $wpdb->posts.ID = $wpdb->postmeta.post_id
    WHERE $wpdb->postmeta.meta_value LIKE '%$search%' AND $wpdb->posts.post_type = '$postType'
    GROUP BY $wpdb->postmeta.post_id
    ";
    $pageposts = $wpdb->get_results($querystr, OBJECT);
    $ids = array();
    foreach($pageposts as $post){
        $ids[] = intval($post->post_id);
    }
//var_dump($ids);
    return $ids;
}
?>
<div id="container">
    <div class="content">
        <!-- HEADER MODULE -->
        <div class="header js-header flex small">
            <div class="wrapper">
                <div class="header-item">
                    <div class="background">
                        <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/bg.jpg)"></div>
                        <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)"></div>
                        <div class="grid-cont">
                            <div class="header-description">
                                <div class="square">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="70px" height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve">
                                    <polygon fill="#FFFFFF" points="67,60 67,67 3,67 3,3 67,3 67,10 70,10 70,0 0,0 0,70 70,70 70,60 "/>
                                </svg>
                            </div>
                            <div class="summary">
                                <h1><?php echo dictionary("Pesquisa"); ?></h1>
                            </div>
                            <div class="icon-cont">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-input js-search-module">
            <div class="grid-cont">
                <form method="get">
                    <div class="row">
                        <input type="text" name="s" value="<?php echo $search; ?>" placeholder="Pesquisa" />
                        <div class="btn-icon">
                            <div class="border"></div>
                            <div class="inner">
                                <div class="icon">
                                    <button type="submit" class="submit-icon">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script>
                jQuery(document).ready(function( $ ) {
                    Edit.modules.collection.push({ type: 'searchModule', instance: new Edit.modules.searchModule('.js-search-module') })
                })
            </script>
        </div>
    </div>
    <script>
        jQuery(document).ready(function( $ ) {
            Edit.modules.collection.push({ type: 'header', instance: new Edit.modules.smallHeader('.js-header') })
        })
    </script>
    <!-- END HEADER MODULE -->
    <?php
    $ids = getTagedPosts($search, "formacao");
    if(sizeof($ids) > 0){
        $args = array(
            'post_type' => 'formacao',
            'post__in' => $ids
        );
        $posts = query_posts($args);
    }else{
        $posts = array();
    }
    $arguments = array(
        'showposts'        => '-1',
        's'                => $search,
        'orderby'          => $orderby,
        'order'            => $order,
        'post_type'        => 'formacao',
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters,
        'post__not_in'     => $ids
    );
    $myposts = get_posts($arguments);
    if(sizeof($ids) > 0)
        $myposts = array_merge($myposts, $posts);
    $total_results = count($myposts);
    $total += $total_results;
    if($numberOfItens != '-1'){
        $arguments = array(
            'showposts'        => $numberOfItens,
            's'                => $search,
            'orderby'          => $orderby,
            'order'            => $order,
            'post_type'        => 'formacao',
            'post_status'      => $post_status,
            'suppress_filters' => $supress_filters,
            'post__not_in'     => $ids
        );
        $myposts = get_posts($arguments);
        if(sizeof($ids) > 0)
            $myposts = array_merge((array) $myposts, (array) $posts);
    }
    if($type == 'formacao' || $type == '')
        if(sizeof($myposts) > 0):
            $modulesCount++;
            ?>
            <div class="cursos search-result-module margin-100">
                <div class="grid-cont">
                    <div class="module-title">
                        <div class="title-cont">
                            <a href="<?php echo $url; ?>&tipo=formacao" class="no-route">
                                <h2><?php echo dictionary("formacao") ?> (<?php echo $total_results; ?>)</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="js-iso-module cursos">
                    <div class="grid-cont">
                        <?php
                        foreach($myposts as $post):
                            setup_postdata($post);
                            //Tipo de formacao
                            $tipoFormacao = get_field('tipo_formacao');
                            $tipoFormacao =$tipoFormacao[0];
                            $icon = get_field('icon',$tipoFormacao);
                            $cssClassType = get_field('class',$tipoFormacao);
                            //End tipo de formacao
                            //Localizacao
                            $localizacao = get_field('localizacao');
                            $localizacao = $localizacao[0];
                            //End Localizacao
                            $size = 'medium';
                            if(get_field('tipo_destaque_homepage')){
                                $size = get_field('tipo_destaque_homepage');
                            }
                            $image = '';
                            switch($size){
                                case 'small':
                                $image = get_field('home_image_small');
                                $rwd_image = 'medium';
                                break;
                                case 'medium':
                                $image = get_field('home_image');
                                $rwd_image = 'medium_large';
                                break;
                                case 'full':
                                $image = get_field('home_image_big');
                                $rwd_image = 'full';
                                break;
                            }
                            ?>
                            <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>">
                                <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
                                    <div class="block-content">
                                        <div class="image">
                                         <?php 
                                         $neat_responsive_image_array = $image;
                                         echo wp_get_attachment_image( $neat_responsive_image_array['id'], $rwd_image );
                                         ?>
                                         <div class="block-hover">
                                            <div class="border"></div>
                                            <div class="bg"></div>
                                        </div>
                                    </div>
                                    <div class="block-description">
                                        <div class="event-details">
                                            <div class="square">
                                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                                    <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                                </svg>
                                                <?php if(get_field('home_data')){
                                                    $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                    $month = strftime("%B", $date->getTimestamp());
                                                    ?>
                                                    <p class="day"><?php echo $date->format('d'); ?></p>
                                                    <p class="month"><?php echo $month; ?></p>
                                                <?php }else{ ?>
                                                    <p class="day">AD</p>
                                                    <p class="month ad"><?php echo strtoupper('Data a definir');?></p>
                                                <?php }?>
                                            </div>
                                            <div class="icon-cont">
                                                <div class="icon">
                                                    <?php if($icon != ''): ?>
                                                        <img src="<?php echo $icon;?>" />
                                                    <?php endif; ?>
                                                </div>
                                                <span class="icon-label"><?php echo $tipoFormacao->post_title; ?></span>
                                            </div>
                                            <div class="event-location">
                                                <p><?php echo $localizacao->post_title; ?></p>
                                            </div>
                                        </div>
                                        <div class="block-title">
                                            <h2><?php the_field('home_titulo'); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <script>
                    jQuery(document).ready(function( $ ) {
                        Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-iso-module.cursos') });
                    })
                </script>
            </div>
            <?php if($total_results > 6 && $type == ''): ?>
                <a href="<?php echo $url; ?>&tipo=formacao" class="no-route">
                    <div class="btn-more default-btn">
                        <span class="label"><?php echo dictionary("button_ver_mais") ?></span>
                        <div class="btn-icon">
                            <div class="inner">
                                <div class="icon">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                                C16.5,22.828,15.828,23.5,15,23.5z"></path>
                                            </g>
                                            <g>
                                                <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endif; ?>
        </div>
        <?php
    endif;
    $ids = getTagedPosts($search, "noticias");
    $ids2 = getTagedPosts($search, "eventos");
    $ids = array_merge((array) $ids, $ids2);
    if(sizeof($ids) > 0){
        $args = array(
        'post_type' => array('noticias','eventos'),//or whatever type
        'post__in' => $ids
    );
        $posts = query_posts($args);
    }else{
        $posts = array();
    }
    $arguments = array(
        'showposts'        => '-1',
        's'                => $search,
        'orderby'          => $orderby,
        'order'            => $order,
        'post_type'        =>  array('noticias','eventos'),
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters,
        'post__not_in'     => $ids
    );
    $myposts = get_posts($arguments);
    if(sizeof($ids) > 0)
        $myposts = array_merge($myposts, $posts);
    $total_results = count($myposts);
    $total += $total_results;
    if($numberOfItens != '-1'){
        $arguments = array(
            'showposts'        => $numberOfItens,
            's'                => $search,
            'orderby'          => $orderby,
            'order'            => $order,
            'post_type'        =>  array('noticias','eventos'),
            'post_status'      => $post_status,
            'suppress_filters' => $supress_filters,
            'post__not_in'     => $ids
        );
        $myposts = get_posts($arguments);
        if(sizeof($ids) > 0)
            $myposts = array_merge((array) $myposts, (array) $posts);
    }
    if($type == 'noticias-eventos' || $type == '')
        if(sizeof($myposts) > 0):
            $modulesCount++;
            ?>
            <div class="eventos search-result-module margin-100 gray">
                <div class="grid-cont">
                    <div class="module-title">
                        <div class="title-cont">
                            <a href="<?php echo $url; ?>&tipo=noticias-eventos" class="no-route">
                                <h2>Noticias & Eventos (<?php echo $total_results; ?>)</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="js-iso-module eventos">
                    <div class="grid-cont">
                        <?php
                        foreach($myposts as $post):
                            setup_postdata($post);
                            $tipo = get_post_type();
                            switch($tipo){
                                case 'noticias':
                                $size = 'medium';
                                if(get_field('tipo_destaque_homepage'))
                                    $size = get_field('tipo_destaque_homepage');
                                $image = '';
                                switch($size){
                                    case 'small':
                                    $image = get_field('home_image_small');
                                    break;
                                    case 'medium':
                                    $image = get_field('home_image');
                                    break;
                                    case 'full':
                                    $image = get_field('home_image_big');
                                    break;
                                }
                                ?>
                                <div class="iso-block news grid-1-2 block-<?php echo $size; ?>" data-old="block-<?php echo $size; ?>">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="block-content">
                                        <div class="image">
                                            <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url'] ?>">
                                            <div class="block-hover">
                                                <div class="border"></div>
                                                <div class="bg"></div>
                                            </div>
                                        </div>
                                        <div class="block-description">
                                            <div class="event-details">
                                                <div class="square">
                                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                                    <g>
                                                        <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4">
                                                        </g>
                                                    </svg>
                                                    <?php if(get_field('home_data')){
                                                        $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                        $month = strftime("%B", $date->getTimestamp());
                                                        ?>
                                                        <p class="day"><?php echo $date->format('d'); ?></p>
                                                        <p class="month"><?php echo $month; ?></p>
                                                    <?php }else{ ?>
                                                        <p class="day">AD</p>
                                                        <p class="month ad"><?php echo strtoupper('Data a definir');?></p>
                                                    <?php }?>
                                                </div>
                                                <div class="icon-cont">
                                                    <div class="icon">
                                                        <img src="<?php bloginfo('template_url'); ?>/images/assets/svg/categorias/<?php the_field('tipo'); ?>.svg" />
                                                    </div>
                                                    <span class="icon-label"><?php the_field('tipo'); ?></span>
                                                </div>
                                            </div>
                                            <div class="block-title">
                                                <div>
                                                    <h2><?php the_field('home_titulo'); ?></h2>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                break;
                                case 'eventos':
                                $size = 'medium';
                                if(get_field('tipo_destaque_homepage'))
                                    $size = get_field('tipo_destaque_homepage');
                                $image = '';
                                switch($size){
                                    case 'small':
                                    $image = get_field('home_image_small');
                                    break;
                                    case 'medium':
                                    $image = get_field('home_image');
                                    break;
                                    case 'full':
                                    $image = get_field('home_image_big');
                                    break;
                                }
                                $localizacao = get_field('localizacao');
                                $localizacao = $localizacao[0];
                                $hasLabel = (trim(get_field('texto_icon')) == "") ? "" : "hasLabel";
                                ?>
                                <div class="block-<?php echo $size; ?> iso-block evento grid-1-2 <?php echo $hasLabel; ?>" data-old="block-<?php echo $size; ?>">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
                                        <div class="block-content">
                                            <div class="image">
                                                <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url'] ?>">
                                                <div class="block-hover">
                                                    <div class="border"></div>
                                                    <div class="bg"></div>
                                                </div>
                                            </div>
                                            <div class="block-description">
                                                <div class="event-details">
                                                    <div class="square">
                                                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                                                <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                                            
                                                            <?php if(get_field('home_data')){
                                                                $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                                $month = strftime("%B", $date->getTimestamp());
                                                                ?>
                                                                <p class="day"><?php echo $date->format('d'); ?></p>
                                                                <p class="month"><?php echo $month; ?></p>
                                                            <?php }else{ ?>
                                                                <p class="month"><?php echo strtoupper('Data a definir');?></p>
                                                            <?php }?>
                                                        </div>
                                                        <div class="icon-cont">
                                                            <div class="icon">
                                                                <img src="<?php bloginfo('template_url'); ?>/images/assets/svg/categorias/eventos.svg" />
                                                            </div>
                                                            <span class="icon-label"><?php the_field('texto_icon'); ?></span>
                                                        </div>
                                                        <div class="event-location">
                                                            <p><?php echo $localizacao->post_title; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="block-title">
                                                        <div>
                                                            <h2><?php the_field('home_titulo'); ?></h2>
                                                            <h3><?php the_field('home_description'); ?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    break;
                                }
                            endforeach;
                            ?>
                        </div>
                        <script>
                            jQuery(document).ready(function( $ ) {
                                Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-iso-module.eventos') });
                            })
                        </script>
                    </div>
                    <?php if($total_results > 6 && $type == ''): ?>
                        <a href="<?php echo $url; ?>&tipo=noticias-eventos" class="no-route">
                            <div class="btn-more default-btn">
                                <span class="label"><?php echo dictionary("button_ver_mais") ?></span>
                                <div class="btn-icon">
                                    <div class="inner">
                                        <div class="icon">
                                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                                        C16.5,22.828,15.828,23.5,15,23.5z"></path>
                                                    </g>
                                                    <g>
                                                        <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                <?php
            endif;
    $ids = getTagedPosts($search, "entrevista"); //'post___in'        => getTagedPosts($search, "formacao")
    
    if(sizeof($ids) > 0){
        $args = array(
    'post_type' => 'entrevista',//or whatever type
    'post__in' => $ids
);
        $posts = query_posts($args);
    }else{
        $posts = array();
    }
    
    $arguments = array(
        'showposts'        => '-1',
        's'                => $search,
        'orderby'          => $orderby,
        'order'            => $order,
        'post_type'        =>  array('entrevista'),
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters,
        'post__not_in'     => $ids
    );
    $myposts = get_posts($arguments);
    
    if(sizeof($ids) > 0)
        $myposts = array_merge($myposts,$posts);
    
    $total_results = count($myposts);
    $total += $total_results;
    
    if($numberOfItens != '-1'){
        $arguments = array(
            'showposts'        => $numberOfItens,
            's'                => $search,
            'orderby'          => $orderby,
            'order'            => $order,
            'post_type'        =>  array('entrevista'),
            'post_status'      => $post_status,
            'suppress_filters' => $supress_filters,
            'post__not_in'     => $ids
        );
        $myposts = get_posts($arguments);
        if(sizeof($ids) > 0)
            $myposts = array_merge((array) $myposts, (array) $posts);
    }
    if($type == 'entrevistas' || $type == '')
        if(sizeof($myposts) > 0):
            $modulesCount++;
            ?>
            <div class="eventos search-result-module margin-100">
                <div class="grid-cont">
                    <div class="module-title">
                        <div class="title-cont">
                            <a href="<?php echo $url; ?>&tipo=entrevistas" class="no-route">
                                <h2>Entrevistas (<?php echo $total_results; ?>)</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="js-iso-module entrevista">
                    <div class="grid-cont">
                        <?php
                        foreach($myposts as $post):
                            setup_postdata($post);
                            $tipo = get_post_type();
                            switch($tipo){
                                case 'entrevista':
                                $size = 'medium';
                                if(get_field('tipo_destaque_homepage'))
                                    $size = get_field('tipo_destaque_homepage');
                                $image = '';
                                switch($size){
                                    case 'small':
                                    $image = get_field('home_image_small');
                                    break;
                                    case 'medium':
                                    $image = get_field('home_image');
                                    break;
                                    case 'full':
                                    $image = get_field('home_image_big');
                                    break;
                                }
                                ?>
                                <div class="iso-block interview grid-1-2 block-<?php echo $size; ?>" data-old="block-<?php echo $size; ?>">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="block-content">
                                        <div class="image">
                                            <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url'] ?>">
                                            <div class="block-hover">
                                                <div class="border"></div>
                                                <div class="bg"></div>
                                            </div>
                                        </div>
                                        <div class="block-description">
                                            <div class="event-details">
                                                <div class="square">
                                                    <svg version="1.0" id="Layer_1" preserveAspectRatio='xMinYMin' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 90 90" xml:space="preserve">
                                                            <rect fill="transparent" width="30" height="30" stroke="#FFDF00" stroke-width="4" />
                                                        </svg>
                                                    </div>
                                                    <div class="icon-cont">
                                                        <div class="icon">
                                                            <img src="<?php bloginfo('template_url'); ?>/images/assets/svg/categorias/<?php the_field('tipo'); ?>.svg" />
                                                        </div>
                                                        <span class="icon-label"><?php the_field('tipo'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="block-title">
                                                    <div>
                                                        <h2><?php the_field('home_titulo'); ?></h2>
                                                        <h3><?php the_field('home_subtitulo'); ?></h3>
                                                        <p><?php the_field('home_description'); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                    break;
                                }
                            endforeach;
                            ?>
                        </div>
                        <script>
                            jQuery(document).ready(function( $ ) {
                                Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-iso-module.entrevista') });
                            })
                        </script>
                    </div>
                    <?php if($total_results > 6 && $type == ''): ?>
                        <a href="<?php echo $url; ?>&tipo=entrevistas" class="no-route">
                            <div class="btn-more default-btn">
                                <span class="label"><?php echo dictionary("button_ver_mais") ?></span>
                                <div class="btn-icon">
                                    <div class="inner">
                                        <div class="icon">
                                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                                        C16.5,22.828,15.828,23.5,15,23.5z"></path>
                                                    </g>
                                                    <g>
                                                        <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                <?php
            endif;
$ids = getTagedPosts($search, "equipa"); //'post___in'        => getTagedPosts($search, "formacao")

if(sizeof($ids) > 0){
    $args = array(
'post_type' => 'equipa',//or whatever type
'post__in' => $ids
);
    $posts = query_posts($args);
}else{
    $posts = array();
}
$arguments = array(
    'showposts'        => '-1',
    's'                => $search,
    'orderby'          => $orderby,
    'order'            => $order,
    'post_type'        => 'equipa',
    'post_status'      => $post_status,
    'suppress_filters' => $supress_filters,
    'post__not_in'     => $ids
);

$myposts = get_posts($arguments);

if(sizeof($ids) > 0)
    $myposts = array_merge($myposts, $posts);

$total_results = count($myposts);
$total += $total_results;

if($numberOfItens != '-1'){
    $arguments = array(
        'showposts'        => $numberOfItens,
        's'                => $search,
        'orderby'          => $orderby,
        'order'            => $order,
        'post_type'        => 'equipa',
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters,
        'post__not_in'     => $ids
    );
    $myposts = get_posts($arguments);

    if(sizeof($ids) > 0)
        $myposts = array_merge((array) $myposts, (array) $posts);
}

if($type == 'tutores' || $type == '')
    if(sizeof($myposts) > 0):
        $modulesCount++;
        ?>
        <div class="tutores search-result-module margin-100">
            <div class="grid-cont">
                <div class="module-title">
                    <div class="title-cont">
                        <a href="<?php echo $url; ?>&tipo=tutores" class="no-route">
                            <h2>Tutores (<?php echo $total_results; ?>)</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="js-iso-module tutores">
                <div class="grid-cont">
                    <?php
                    foreach($myposts as $post):
                        setup_postdata($post);
                        $size = 'medium';
                        if(get_field('tamanho_imagem'))
                            $size = get_field('tamanho_imagem');
                        ?>
                        <div class="block-<?php echo $size; ?> iso-block team grid-1-2" data-old="block-<?php echo $size; ?>">
                            <?php
                            if(get_field('link')):?>
                                <a href="<?php echo str_replace( home_url(), '', get_field('link') ); ?>" class="filter-linker no-route">
                                <?php endif;?>
                                <div class="block-content">
                                    <?php if(get_field('foto')):
                                        $foto = get_field('foto');
                                        ?>
                                        <div class="image">
                                            <img draggable="false" alt="$foto['alt']" src="<?php echo $foto['url']; ?>" />
                                            <?php
                                            if(get_field('link')):?>
                                                <div class="block-hover">
                                                    <div class="border"></div>
                                                    <div class="bg"></div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="block-description">
                                        <div class="block-title">
                                            <h2><?php the_field('nome'); ?><br /><?php the_field('sobrenome'); ?></h2>
                                            <h3><?php the_field('cargo'); ?></h3>
                                            <p><?php the_field('descricao_elemento'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if(get_field('link')):?>
                                </a>
                            <?php endif;?>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <script>
                    jQuery(document).ready(function( $ ) {
                        Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-iso-module.tutores') });
                    })
                </script>
            </div>
            <?php if($total_results > 6 && $type == ''): ?>
                <a href="<?php echo $url; ?>&tipo=tutores" class="no-route" >
                    <div class="btn-more default-btn">
                        <span class="label"><?php echo dictionary("button_ver_mais") ?></span>
                        <div class="btn-icon">
                            <div class="inner">
                                <div class="icon">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                                C16.5,22.828,15.828,23.5,15,23.5z"></path>
                                            </g>
                                            <g>
                                                <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endif; ?>
        </div>
        <?php
    endif;
    ?>
    <?php
    $ids = getTagedPosts($search, "blog");
    if(sizeof($ids) > 0){
        $args = array(
'post_type' => 'blog',//or whatever type
'post__in' => $ids
);
        $posts = query_posts($args);
    }else{
        $posts = array();
    }
    $arguments = array(
        'showposts'        => '-1',
        's'                => $search,
        'orderby'          => $orderby,
        'order'            => $order,
        'post_type'        =>  array('blog'),
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters,
        'post__not_in'     => $ids
    );
    $myposts = get_posts($arguments);
    if(sizeof($ids) > 0)
        $myposts = array_merge($myposts,$posts);
    $total_results = count($myposts);
    $total += $total_results;
    if($numberOfItens != '-1'){
        $arguments = array(
            'showposts'        => $numberOfItens,
            's'                => $search,
            'orderby'          => $orderby,
            'order'            => $order,
            'post_type'        =>  array('blog'),
            'post_status'      => $post_status,
            'suppress_filters' => $supress_filters,
            'post__not_in'     => $ids
        );
        $myposts = get_posts($arguments);
        if(sizeof($ids) > 0)
            $myposts = array_merge((array) $myposts, (array) $posts);
    }
    if($type == 'blog' || $type == '')
        if(sizeof($myposts) > 0):
            $modulesCount++;
            ?>
            <div class="eventos search-result-module gray">
                <div class="grid-cont">
                    <div class="module-title">
                        <div class="title-cont">
                            <a href="<?php echo $url; ?>&tipo=noticias-eventos" class="no-route">
                                <h2>Blog (<?php echo $total_results; ?>)</h2>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="js-iso-module blog">
                    <div class="grid-cont">
                        <?php
                        foreach($myposts as $post):
                            setup_postdata($post);
                            $tipo = get_post_type();
                            switch($tipo){
                                case 'blog':
                                $size = 'medium';
        //Categoria
                                $tipo = get_field('tipo');
                                if($tipo && sizeof($tipo) > 0){
                                    $tipo = $tipo[0]->post_title;;
                                }else{
                                    $tipo = '';
                                }
        //Categoria
                                if(get_field('tipo_destaque_homepage')){
                                    $size = get_field('tipo_destaque_homepage');
                                }
                                $image = '';
                                switch($size){
                                    case 'small':
                                    $image = get_field('home_image_small');
                                    break;
                                    case 'medium':
                                    $image = get_field('home_image');
                                    break;
                                    case 'full':
                                    $image = get_field('home_image_big');
                                    break;
                                }
                                ?>
                                <div class="iso-block news grid-1-2 block-full" data-old="block-full">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="block-content">
                                        <div class="image">
                                            <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url'] ?>">
                                            <div class="block-hover">
                                                <div class="border"></div>
                                                <div class="bg"></div>
                                            </div>
                                        </div>
                                        <div class="block-description">
                                            <div class="event-details">
                                                <div class="square">
                                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                                    <g>
                                                        <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4">
                                                        </g>
                                                    </svg>
                                                    <?php if(get_field('home_data')){
                                                        $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                        $month = strftime("%B", $date->getTimestamp());
                                                        ?>
                                                        <p class="day"><?php echo $date->format('d'); ?></p>
                                                        <p class="month"><?php echo $month; ?></p>
                                                    <?php }else{ ?>
                                                        <p class="day">AD</p>
                                                        <p class="month ad"><?php echo strtoupper('Data a definir');?></p>
                                                    <?php }?>
                                                </div>
                                                <div class="icon-cont">
                                                    <span class="icon-label"><?php echo $tipo; ?></span>
                                                </div>
                                            </div>
                                            <div class="block-title">
                                                <h2><?php the_field('home_titulo'); ?></h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                break;
                            }
                        endforeach;
                        ?>
                    </div>
                    <script>
                        jQuery(document).ready(function( $ ) {
                            Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-iso-module.blog') });
                        })
                    </script>
                </div>
                <?php if($total_results > 6 && $type == ''): ?>
                    <a href="<?php echo $url; ?>&tipo=noticias-eventos" class="no-route">
                        <div class="btn-more default-btn">
                            <span class="label"><?php echo dictionary("button_ver_mais") ?></span>
                            <div class="btn-icon">
                                <div class="inner">
                                    <div class="icon">
                                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                                    C16.5,22.828,15.828,23.5,15,23.5z"></path>
                                                </g>
                                                <g>
                                                    <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <?php
        endif;
        if($total == 0):
            ?>
            <!-- SE NAO TIVER RESULTADOS -->
            <div class="no-search-results block-text margin-100 margin-top-100">
                <div class="grid-cont">
                    <h2><?php echo dictionary("Nao_foram_encontrados") ?></h2>
                </div>

            </div>
            <!-- END SE NAO TIVER RESULTADOS -->
            <?php
        endif;
        ?>
    </div>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.pageLoader.totalModules = <?php echo $modulesCount; ?>;;
        Edit.modules.isoModuleResponsive.init();
    });
</script>
<?php get_footer(); ?>