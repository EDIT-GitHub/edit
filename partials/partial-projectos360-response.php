<?php
/**
 * Template Name: Projectos 360 Results
 * The template for Projectos 360 Results
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
$orderBy = 'post_date';
$include = '';
$exclude = '';
$meta_key = '';
$meta_value = '';
$post_type = 'projectos360';
$post_mime_type = '';
$post_parent = '';
$post_status = 'publish';
$supress_filters = true;
$search = '';
$numberOfItens = 6;
$itemNumber = '';
$special = '';

//Products Stuff
$meta_query = array('relation' => 'AND');
$ano = '';
$cliente = '';

if(isset($_REQUEST['inputAno'])) {
    $ano = $_REQUEST['inputAno'];
}

if(isset($_REQUEST['inputCliente'])) {
    $cliente = $_REQUEST['inputCliente'];
}

if(isset($_REQUEST['pagenumber'])) {
    
    
    if($ano != '0' && $ano != ''):
        array_push(
            $meta_query, 
             array(
			'key' => 'home_data',
			'value' => array( $ano.'-01-01', $ano.'-12-31' ),
			'compare' => 'BETWEEN',
			'type' => 'date',
			)
        );
    endif;
   
    if($cliente != '0' && $cliente != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'cliente', // name of custom field
                'value' => '"' . $cliente . '"',
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
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters
    );    
} else {
    
    if($ano != '0' && $ano != ''):
        array_push(
            $meta_query, 
             array(
			'key' => 'home_data',
			'value' => array( $ano.'-01-01', $ano.'-12-31' ),
			'compare' => 'BETWEEN',
			'type' => 'date',
			)
        );
    endif;
    
    if($cliente != '0' && $cliente != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'cliente', // name of custom field
                'value' => '"' . $cliente . '"',
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
        //var_dump($post);
        $size = 'medium';
        
        if(get_field('tipo_destaque_homepage')){
            $size = get_field('tipo_destaque_homepage');
        }
        
        //Cliente
        $cliente = get_field('cliente');
        if($cliente)
        $cliente = $cliente[0];//First
        //End Cliente
        
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
                <div class="block-<?php echo $size; ?> iso-block project grid-1-2" data-old="block-<?php echo $size; ?>">
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
                                <div class="block-title">
                                	<div class="project-logo">
                                    	<img class="project-logo-image" src="<?php the_field('imagem', $cliente); ?>" />
                                    </div>
                                    <h2><?php the_field('home_titulo'); ?></h2>
                                    <h3><?php the_field('home_subtitulo'); ?></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
<?php
    endforeach;
?>

<?php else:?>
<div class="block iso-block block-full">
    <div class="not-found">
        <h3>Não foram encontradas Projectos!</h3>
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