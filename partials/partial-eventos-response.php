<?php
/**
 * Template Name: Eventos Results
 * The template for Eventos Results
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
$order = 'ASC';
$orderBy = 'menu_order';
$include = '';
$exclude = '';
$meta_key = '';
$meta_value = '';
$post_type = 'eventos';
$post_mime_type = '';
$post_parent = '';
$post_status = 'publish';
$supress_filters = '0';
$search = '';
$numberOfItens = 6;
$itemNumber = '';
$special = '';

//Products Stuff
$end = date("Ymd");
$meta_query = array('relation' => 'AND',
    array(
        'key'           => 'home_data',
        'compare'       => '!=',
        'value'         =>  '',
    ),
    array(
        'key'           => 'home_data',
        'compare'       => '>=',
        'value'         =>  $end,
    ),
);

$localizacao = '';
$area = '';


if(isset($_REQUEST['inputLocalizacao'])) {
    $localizacao = $_REQUEST['inputLocalizacao'];
}

if(isset($_REQUEST['inputArea'])) {
    $area = $_REQUEST['inputArea'];
}

if(isset($_REQUEST['pagenumber'])) {


    if($localizacao != '0' && $localizacao != ''):
        array_push(
            $meta_query, 
            array(
                'key'   => 'localizacao', // name of custom field
                'value' => '"' . $localizacao . '"',
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

    if($localizacao != '0' && $localizacao != '' ):
        array_push(
            $meta_query, 
            array(
                'key' => 'localizacao', // name of custom field
                'value' => '"' . $localizacao . '"',
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
        
        //Localizacao
        $localizacao = get_field('localizacao');
        $localizacao = $localizacao[0];//First
        $hasLabel = (trim(get_field('texto_icon')) == "") ? "" : "hasLabel";
        //End Localizacao
        ?>
        <div class="block-<?php echo $size; ?> iso-block evento grid-1-2 <?php echo $hasLabel; ?>" data-old="block-<?php echo $size; ?>">
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
                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                        <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                    </svg>
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
                                    <?php }else{ ?>
                                    <p class="month"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
                                    <?php }?>
                                </div>
                                <div class="icon-cont">
                                    <div class="icon">
                                        <img src="<?php bloginfo('template_url'); ?>/images/assets/svg/categorias/eventos.svg" />
                                    </div>
                                    <span class="icon-label">
                                    <?php 
                                    if (get_field('texto_icon')):
                                        the_field('texto_icon');
                                    else:
                                        echo "Evento";
                                    endif;
                                    ?>
                                </span>
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
    endforeach;
    ?>

<?php else:?>
    <div class="block iso-block" style="width: 100%;">
        <div class="not-found">
            <h3><?php dictionary("Nao_foram_encontrados_eventos") ?></h3>
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