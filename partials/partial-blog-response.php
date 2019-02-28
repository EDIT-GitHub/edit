<?php
/**
 * Template Name: Blog Results
 * The template for Blog Results
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
$meta_key = 'home_data';
$meta_value = '';
$post_type = 'blog';
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

$ano = '';
$tipo = '';
$area = '';


if(isset($_REQUEST['inputAno'])) {
    $ano = $_REQUEST['inputAno'];
}

if(isset($_REQUEST['inputTipo'])) {
    $tipo = $_REQUEST['inputTipo'];
}

if(isset($_REQUEST['inputArea'])) {
    $area = $_REQUEST['inputArea'];
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
    
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'tipo', // name of custom field
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
    
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query, 
            array(
                'key' => 'tipo', // name of custom field
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
<?php
$myposts = get_posts( $args );
if ($myposts):
?>
<?php
    //var_dump($myposts);
    
    foreach ( $myposts as $post ) :
        setup_postdata( $post );
        //var_dump($post);
        $size = 'medium';
        
        //Categoria
        $tipo = get_field('tipo');
        if($tipo && sizeof($tipo) > 0){
            $tipo = $tipo[0]->post_title;;//First
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
                   <!-- END PAGE FILTERS MODULE -->
        <div class="block-full iso-block blog" data-old="block-full">
                <div class="block-content">
                    <div class="image">
                        <a  href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="filter-linker">
                            <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url']; ?>" />
                        </a>
                        <div class="block-hover">
                            <div class="border"></div>
                            <div class="bg"></div>
                        </div>
                    </div>
                    <div class="inner">
                        <div class="block-description">
                        <div class="event-details">
                            <div class="square">
                                <?php if(get_field('home_data')){
                                    $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                    $month = $date->format('F');
                                        $mes = '';

                                        switch($month){
                                            case 'January':
                                                $mes = dictionaryString('Janeiro');
                                                break;
                                            case 'February':
                                                $mes = dictionaryString('Fevereiro');
                                                break;
                                            case 'March':
                                                $mes = dictionaryString('Março');
                                                break;
                                            case 'April':
                                                $mes = dictionaryString('Abril');
                                                break;
                                            case 'May':
                                                $mes = dictionaryString('Maio');
                                                break;
                                            case 'May':
                                                $mes = dictionaryString('Maio');
                                                break;
                                            case 'June':
                                                $mes = dictionaryString('Junho');
                                                break;
                                            case 'July':
                                                $mes = dictionaryString('Julho');
                                                break;
                                            case 'August':
                                                $mes = dictionaryString('Agosto');
                                                break;
                                            case 'September':
                                                $mes = dictionaryString('Setembro');
                                                break;
                                            case 'October':
                                                $mes = dictionaryString('Outubro');
                                                break;
                                            case 'November':
                                                $mes = dictionaryString('Novembro');
                                                break;
                                            case 'December':
                                                $mes = dictionaryString('Dezembro');
                                                break;
                                            default:
                                                $mes = $month;
                                        }
                                ?>
                                            <p class="day"><?php echo $date->format('d'); ?></p>
                                            <p class="month"><?php echo $mes; ?></p>
                                            <p class="year"><?php echo $date->format('y'); ?></p>
                                            <?php }else{ ?>
                                        <p class="day">AD</p>
                                        <p class="month"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
                                    <?php }?>
                            </div>
                            <div class="icon-cont">
                                <span class="icon-label"><?php echo $tipo; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="block-text">
                        <h2><?php the_field('home_titulo'); ?></h2>
                        <div class="blockquote">
                            <p class="date"><?php the_field('home_subtitulo'); ?></p>
                        </div>
                    </div>
                    <div class="block-text text">
                        <div class="block-formacao-info">
                            <h3><?php the_field('home_description'); ?></h3>
                            <div class="separator-coment">
                                <div class="icon-coment">
                                    <div class="num-coments">
                                        <span><?php echo get_comments_number($post->ID); ?></span>
                                    </div>
                                    <span>COMENTÁRIOS</span>
                                </div>
                                <div class="border-sep"></div>
                                <a class="btn-more filter-linker" href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
                                    <div>
                                        <?php dictionary("Mais_info") ?>
                                        <div class="btn-icon">
                                            <div class="inner">
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
                                    </div>
                                </a>
                            </div>
                            <?php
                            if(have_rows('tags')):
                                ?>
                            <div class="tags">
                            <?php
                                while ( have_rows('tags') ) :
                                the_row();
                                ?>

                                <a href="/?s=<?php the_sub_field('tag'); ?>" class="tag no-route"><span></span><?php the_sub_field('tag'); ?></a>

                            <?php
                            endwhile;
                            ?>
                                </div>
                                <?php
                            endif;
                                ?>
                        </div>
                    </div>
                    </div>

                </div>
        </div>
    <!-- START LOAD MORE MODULE -->
<?php
    endforeach;
?>

<?php else:?>
<div class="block iso-block block-full">
    <div class="not-found">
        <h3><?php dictionary("Nao_foram_encontrados_blog") ?></h3>
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
