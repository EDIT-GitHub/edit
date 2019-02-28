<?php
/**
 * Template Name: Equipa Results
 * The Template for Equipa Ajax
 *
 * @package Edit
 */

$firstTime = true;
$totalPages = '';
$pages = '';
$showposts = 12;
$category = '';
$tag = '';
$order = 'DESC';
$orderBy = 'modified';
$include = '';
$exclude = '';
$meta_key = '';
$meta_value = '';
$post_type = 'equipa';
$post_mime_type = '';
$post_parent = '';
$post_status = 'publish';
$supress_filters = '0';
$search = '';
$numberOfItens = 12;
$itemNumber = '';
$special = '';

//Products Stuff
$meta_query = array('relation' => 'AND');
$tipo = '';
$horario = '';
$localizacao = '';
$area = '';


if(isset($_REQUEST['inputCursos'])) {
    $tipo = $_REQUEST['inputCursos'];
}

if(isset($_REQUEST['inputArea'])) {
    $area = $_REQUEST['inputArea'];
}

//array_push(
//            $meta_query, 
//            array(
//                'key' => 'orador', // name of custom field
//                'value' => 'tutor',
//            )
//        );

array_push(
            $meta_query, 
            array(
                'relation' => 'OR',
                array(
                    'key' => 'orador',
                    'value' => 'tutor',
                ),

                array(
                    'key' => 'orador',
                    'compare' => 'NOT EXISTS'
                ) 
            )
        );

if(isset($_REQUEST['pagenumber'])) {
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'tipo_formacao', // name of custom field
                'value' => '"' . $tipo . '"',
                'compare' => 'LIKE'
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
            'meta_query'        => $meta_query,
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
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters
    );    
    
} else {
    
    if($tipo != '0' && $tipo != '' ):
        array_push(
            $meta_query, 
            array(
                'key' => 'tipo_formacao', // name of custom field
                'value' => '"' . $tipo . '"',
                'compare' => 'LIKE'
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
        'meta_query' => $meta_query,
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
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters
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
                        <img alt="<?php echo $foto['alt']; ?>" draggable="false" src="<?php echo $foto['url']; ?>" />
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

<?php else:?>
<div class="block iso-block block-full">
    <div class="not-found">
        <h3><?php dictionary("Nao_foram_encontrados_resultados") ?></h3>
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