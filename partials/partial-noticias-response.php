<?php
/**
 * Template Name: Noticias Results
 * The template for Noticias Results
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
$post_type = 'noticias';
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
$area = '';


if(isset($_REQUEST['inputAno'])) {
    $ano = $_REQUEST['inputAno'];
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

        if($image != false){
            ?>
            <div class="block-<?php echo $size; ?> iso-block noticia grid-1-2" data-old="block-<?php echo $size; ?>">
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
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                    <g>
                                      <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4">
                                      </g>
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
                                    <p class="day">AD</p>
                                    <p class="month"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
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
            <h3><?php dictionary("Nao_foram_encontrados_Noticias") ?></h3>
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