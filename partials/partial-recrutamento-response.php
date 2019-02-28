<?php
/**
* Template Name: Recrutamento Results
* The template for Recrutamento Results
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
$orderBy = 'meta_value';
$include = '';
$exclude = '';
$meta_key = 'data';
$meta_value = '';
$post_type = 'recrutamento';
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
$distrito = '';
$tipo = '';
$area = '';
if(isset($_REQUEST['inputPais'])) {
    $pais = $_REQUEST['inputPais'];
}
if(isset($_REQUEST['inputDistrito'])) {
    $distrito = $_REQUEST['inputDistrito'];
}
if(isset($_REQUEST['inputProvincia'])) {
    $provincia = $_REQUEST['inputProvincia'];
}
if(isset($_REQUEST['inputTipo'])) {
    $tipo = $_REQUEST['inputTipo'];
}
if(isset($_REQUEST['inputArea'])) {
    $area = $_REQUEST['inputArea'];
}
if(isset($_REQUEST['pagenumber'])) {
//if($pais != '0' && $pais != ''):
//    array_push(
//        $meta_query,
//        array(
//            'key'   => 'pais', // name of custom field
//            'value' => $pais,
//        )
//    );
//endif;
    if($pais == "Espanha"){
        if($pais != '0' && $pais != ''):
            array_push(
                $meta_query,
                array(
'key'   => 'pais', // name of custom field
'value' => $pais,
)
            );
        endif;
        if($provincia != '0' && $provincia != ''):
            array_push(
                $meta_query,
                array(
'key'   => 'localizacao_es', // name of custom field
'value' => $provincia,
)
            );
        endif;
    }else{
        if($distrito != '0' && $distrito != ''):
            array_push(
                $meta_query,
                array(
'key'   => 'localizacao', // name of custom field
'value' => $distrito,
)
            );
        endif;
    }
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query,
            array(
'key'   => 'tipo', // name of custom field
'value' => $tipo,
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
if($_REQUEST['pagenumber'] == 1):
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
        'meta_key'         => $meta_key,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters
    );
    $myposts = get_posts( $args );
    $produtosItens = count($myposts);
    $totalPages = ceil($produtosItens / $numberOfItens);
//Count Number of Pages [END]
endif;
$pageNumber = $_REQUEST['pagenumber'];
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
    'meta_query'       => $meta_query,
    'meta_key'         => $meta_key,
    'post_type'        => $post_type,
    'post_mime_type'   => $post_mime_type,
    'post_parent'      => $post_parent,
    'post_status'      => $post_status,
    'suppress_filters' => $supress_filters
);
} else {
    if($distrito != '0' && $distrito != ''):
        array_push(
            $meta_query,
            array(
'key'   => 'localizacao', // name of custom field
'value' => $distrito,
)
        );
    endif;
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query,
            array(
'key'   => 'tipo', // name of custom field
'value' => $tipo,
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
        'meta_key'         => $meta_key,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters
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
        'meta_key'         => $meta_key,
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters
    );
}
?>
<style>
.recrutment_link {
    text-decoration: none;
    color: black;
}
</style>
<?php
$myposts = get_posts( $args );
if ($myposts):
    ?>
    <?php
//var_dump($myposts);

    foreach ( $myposts as $post ) :
        setup_postdata( $post );

//Empresa
        $empresa = get_field('empresa');
        if($empresa)
$empresa = $empresa[0];//First
//End Empresa
//var_dump($empresa);
if (get_field('estado') == "aberto"){
    ?>
    <div class="block-full iso-block recruitment autoHeight" data-old="block-full ">
        <a class="recrutment_link filter-linker" href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
            <div class="grid-content">
                <div class="left-bar" draggable="false" style="background-image:url(<?php the_field('logo',$empresa);?>)">
                </div>
                <div class="center-bar">
                    <span><?php the_field('local'); ?>
                    <p><?php
                    $date = DateTime::createFromFormat('Ymd', get_field('data'));
                    echo $date->format('d/m/Y');
                    ?></p>
                </span>
            </div>
            <div class="detail-bar" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/assets/background-more.png)">

                <div class="btn-icon">
                    <div class="inner"></div>
                    <div class="icon">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                    C16.5,22.828,15.828,23.5,15,23.5z">
                                </path>
                            </g>
                            <g>
                                <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"></path>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            
        </div>
        <div class="right-bar">
            <span><?php the_field('titulo'); ?></span>
        </div>
    </div>
</a>
</div>
<?php
}
endforeach;
?>
<?php else:?>
    <div class="block iso-block block-full not-found" data-old="block-full">
        <div class="not-found">
            <h3><?php dictionary("Nao_foram_encontrados_anuncios") ?></h3>
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