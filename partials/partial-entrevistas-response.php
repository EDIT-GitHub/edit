<?php
/**
 * Template Name: Entrevista Results
 * The template for Entrevista Results
 *
 * @package Edit
 */
$blockPaginator=0;
$firstTime = true;
$totalPages = '';
$pages = '';
$showposts = 6;
$category = '';
$tag = '';
$order = 'DESC';
$orderBy = 'date';
$include = '';
$exclude = '';
$meta_key = '';
$meta_value = '';
$post_type = 'entrevista';
$post_mime_type = '';
$post_parent = '';
$post_status = 'publish';
$supress_filters = '0';
$search = '';
$numberOfItens = 6;
$itemNumber = '';
$special = '';

//Products Stuff
$meta_query = array('relation' => 'AND');
$tipo = '';
$sobre = '';
$area = '';

//add_filter( 'posts_orderby', 'do_posts_orderby' );

//remove_filter( 'posts_orderby', 'do_posts_orderby' );

//function do_posts_orderby( $orderby )
//{
//    global $wpdb;
//    $orderby = $wpdb->postmeta . '.menu_order ASC, ' . $orderby;
//    return $orderby;
//}



if(isset($_REQUEST['inputTipo'])) {
    $tipo = $_REQUEST['inputTipo'];
}

if(isset($_REQUEST['inputSobre'])) {
    $sobre = $_REQUEST['inputSobre'];
}

if(isset($_REQUEST['inputArea'])) {
    $area = $_REQUEST['inputArea'];
}




$pageNumber = 1;
if(isset($_REQUEST['pagenumber'])){
    $pageNumber = $_REQUEST['pagenumber'];
}
if(isset($_REQUEST['pagenumber'])) {
    
    
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query, 
            array(
                'key'   => 'tipo', // name of custom field
                'value' => $tipo
            )
        );
    endif;
    
    if($sobre != '0' && $sobre != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'sobre', // name of custom field
                'value' => $sobre
            )
        );
    endif;
    
    if($area != '0' && $area != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'area', // name of custom field
                'value' => '"' . $area . '"',
                'compare' => 'LIKE'
            )
        );
    endif;
    
    /*
    'meta_key'         => 'tipo',
    'meta_value'       => $tipo, 
    */
    
    if($pageNumber == 1):
        //Count Number of Pages
        $args = array(
            'offset'           => '',
            'showposts'        => '-1',
            's'                => $search,
            'category'         => $category,
            'tag'              => $tag,
            'include'          => $include,
            'exclude'          => $exclude,
            'order'            => $order,
            'orderby'          => $orderBy,
            'meta_query'       => $meta_query,
            'post_type'        => $post_type,
            'post_mime_type'   => $post_mime_type,
            'post_parent'      => $post_parent,
            'post_status'      => $post_status,
            //'suppress_filters' => $supress_filters
        );
        $myposts = get_posts( $args );
        $produtosItens = count($myposts);
        $totalPages = ceil($produtosItens / $numberOfItens);
        //Count Number of Pages [END]
    endif;
    
    
    $offset = (($numberOfItens*$pageNumber)-$numberOfItens);    
    $args = array(
        'offset'           => $offset,
        'showposts'        => $numberOfItens,
        's'                => $search,
        'category'         => $category,
        'tag'              => $tag,
        'include'          => $include,
        'exclude'          => $exclude,
        'order'            => $order,
        'orderby'          => $orderBy,
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        //'suppress_filters' => $supress_filters
    );    
} else {
    
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query, 
            array(
                'key'   => 'tipo', // name of custom field
                'value' => $tipo
            )
        );
    endif;
    
    if($sobre != '0' && $sobre != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'sobre', // name of custom field
                'value' => $sobre
            )
        );
    endif;
    
    if($area != '0' && $area != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'area', // name of custom field
                'value' => '"' . $area . '"',
                'compare' => 'LIKE'
            )
        );
    endif;
    
    //Count Number of Pages
    //$args = array(
    //    'offset'           => '',
    //    'showposts'        => '-1',
    //    's'                => $search,
    //    'category'         => $category,
    //    'tag'              => $tag,
    //    'include'          => $include,
    //    'exclude'          => $exclude,
    //    'order'            => $order,
    //    'orderby'          => $orderBy,
    //    'meta_query' => $meta_query,
    //    'post_type'        => $post_type,
    //    'post_mime_type'   => $post_mime_type,
    //    'post_parent'      => $post_parent,
    //    'post_status'      => $post_status,
    //    //'suppress_filters' => $supress_filters
    //);

     $args = array(
        'offset'           => '',
        'showposts'        => -1,
        's'                => $search,
        'category'         => $category,
        'tag'              => $tag,
        'include'          => $include,
        'exclude'          => $exclude,
        'order'            => $order,
        'orderby'          => $orderBy,
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        //'suppress_filters' => $supress_filters
    );  

    $myposts = get_posts( $args );
    $produtosItens = count($myposts);
    $totalPages = ceil($produtosItens / $numberOfItens);
    //Count Number of Pages [END]
    
    
     
    $args = array(
        'offset'           => '',
        'showposts'        => $numberOfItens,
        's'                => $search,
        'category'         => $category,
        'tag'              => $tag,
        'include'          => $include,
        'exclude'          => $exclude,
        'order'            => $order,
        'orderby'          => $orderBy,
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        //'suppress_filters' => $supress_filters
    );
}

?>
<?php
$myposts = get_posts( $args );

if ($myposts):
    
?>
<?php

    foreach ( $myposts as $post ) :
        setup_postdata( $post );
        $size = 'medium';

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
            case 'randon':
                $image = get_field('home_image');
                $size = (rand(0, 10)) > 5?'medium':'small';
                break;
        }
        if($image != false){
?>
                <div class="block-<?php echo $size; ?> iso-block interview grid-1-2" data-imagebig="<?php get_field('home_image_big')?>"  data-imagemedium="<?php get_field('home_image')?>" data-old="block-<?php echo $size; ?>">
                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="filter-linker">
                        <div class="block-content">
                            <div class="image">
                                <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url'] ?>" />
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
                                         <span class="icon-label">
                                        <?php echo (get_field('ingles'))?'Interview':the_field('tipo'); ?>
                                    </span>
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
                        </div>
                    </a>
                </div>
<?php
        }
    endforeach;
?>

<?php else:?>
<div class="block iso-block block-full">
    <div class="not-found">
        <h3><?php dictionary("Nao_foram_encontrados_entrevistas") ?></h3>
    </div>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.contentTotalpages = "1";
    })
</script>
<?php
endif;
wp_reset_postdata();
?>

<?php if($totalPages != ''): ?>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.contentTotalpages = "<?php print(intval($totalPages)); ?>";
   })
</script>

<?php endif; ?>