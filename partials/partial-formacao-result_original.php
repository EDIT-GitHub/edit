<?php
/**
 * Template Name: Formacao Results
 * The template for Formacao Results
 *
 * @package Edit
 */
$firstTime = true;
$totalPages = '';
$pages = '';
$showposts = 6;
$category = '';
$tag = '';
$order = 'ASC';
$orderBy = 'meta_value';
//$order = 'ASC DESC';
//$orderBy = 'meta_value (meta_value IS NOT NULL)';
$include = '';
$exclude = '';
$meta_key = 'home_data';
$meta_value = '';
$post_type = 'formacao';
$post_mime_type = '';
$post_parent = '';
$post_status = 'publish';
$supress_filters = '0';
$search = '';
$numberOfItens = 6;
$itemNumber = '';
$special = '';

//Products Stuffs

$date = date('Ymd');

$meta_query = array('relation' => 'AND',
    array(
        'key'           => 'home_data',
        'compare'       => '!=',
        'value'         =>  '',
    ),
    array(
        'key'           => 'home_data',
        'compare'       => '>=',
        'value'         =>  $date,
    ),
);


$tipo = '';
$horario = '';
$localizacao = '';
$area = '';


#region Tipo

if(isset($_REQUEST['inputCursos'])) {
    $tipoRaw = $_REQUEST['inputCursos'];

    switch($tipoRaw){
        case 'curso-programa':
        case '54':
        $tipo = '54';
        break;
        case 'curso-intensivo':
        case '58':
        $tipo = '58';
        break;
        case 'workshop':
        case '60':
        $tipo = '60, 62';
        break;
        case 'International Workshops':
        case '62':
        $tipo = '62';
        break;
        default:
        $tipo = $tipoRaw;
        break;
    }
}

if(isset($_REQUEST['inputCursos'])) {
    $tipo = $_REQUEST['inputCursos'];
}

#endregion

#region Area

if(isset($_REQUEST['inputArea'])) {
    $areaRaw = $_REQUEST['inputArea'];

    switch($areaRaw){
        case 'marketing-digital':
        case '75':
        $area = '75';
        break;
        case 'design-digital':
        case '77':
        $area = '77';
        break;
        case 'mobile':
        case '79':
        $area = '79';
        break;
        case 'front-end-responsive':
        case '82':
        $area = '82';
        break;
        default:
        $area = $areaRaw;
        break;
    }
}


if(isset($_REQUEST['inputArea'])) {
    $area = $_REQUEST['inputArea'];
}

#endregion

#region Horario

if(isset($_REQUEST['inputHorario'])) {
    $horarioRaw = $_REQUEST['inputHorario'];

    switch($horarioRaw){
        case 'diurno':
        case '64':
        $horario = '54';
        break;
        case 'noturno':
        case '66':
        $horario = '66';
        break;
        case 'fim-de-semana':
        case '68':
        $horario = '68';
        break;
        case 'pos-laboral':
        case '385':
        $horario = '385';
        break;
        default:
        $horario = $horarioRaw;
        break;
    }
}

if(isset($_REQUEST['inputHorario'])) {
    $horario = $_REQUEST['inputHorario'];
}

#endregion

#region Localizacao

if(isset($_REQUEST['inputLocalizacao'])) {
    $localizacaoRaw = $_REQUEST['inputLocalizacao'];

    switch($localizacaoRaw){
        case 'porto':
        case '71':
        $localizacao = '71';
        break;
        case 'lisboa':
        case '73':
        $localizacao = '73';
        break;
        default:
        $localizacao = $localizacaoRaw;
        break;
    }
}

if(isset($_REQUEST['inputLocalizacao'])) {
    $localizacao = $_REQUEST['inputLocalizacao'];
}

#endregion

if(isset($_REQUEST['pagenumber'])) {
    if($tipo != '0' && $tipo != '' && $tipo != '62'):
        array_push(
            $meta_query,
            array(
                'key' => 'tipo_formacao', // name of custom field
                'value' => '"' . $tipo . '"',
                'compare' => 'LIKE'
            )
        );
    endif;

    if($tipo == '62'):
     $orderBy = 'menu_order meta_value_num';
     $meta_query = array('relation' => 'AND');
     array_push(
        $meta_query,
        array(
                'key' => 'tipo_formacao', // name of custom field
                'value' => '"' . $tipo . '"',
                'compare' => 'LIKE'
            )
    );
 endif;

 if($horario != '0' && $horario != ''):
    array_push(
        $meta_query,
        array(
                'key' => 'horario', // name of custom field
                'value' => '"' . $horario . '"',
                'compare' => 'LIKE'
            )
    );
endif;

if($localizacao != '0' && $localizacao != ''):
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
                'key' => 'area_formacao', // name of custom field
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
    'meta_key'         => $meta_key,
    'orderby'          => $orderBy,
    'meta_query' => $meta_query,
    'post_type'        => $post_type,
    'post_mime_type'   => $post_mime_type,
    'post_parent'      => $post_parent,
    'post_status'      => $post_status,
    'suppress_filters' => $supress_filters
);

} else {

    if($tipo != '0' && $tipo != '' && $tipo != '62' ):
        array_push(
            $meta_query,
            array(
                'key' => 'tipo_formacao', // name of custom field
                'value' => '"' . $tipo . '"',
                'compare' => 'LIKE'
            )
        );
    endif;


    if($tipo == '62'): 
     $orderBy = 'menu_order meta_value_num';
     $meta_query = array('relation' => 'AND');
     array_push(
        $meta_query,
        array(
                'key' => 'tipo_formacao', // name of custom field
                'value' => '"' . $tipo . '"',
                'compare' => 'LIKE'
            )
    );
 endif;

 if($horario != '0' && $horario != ''):
    array_push(
        $meta_query,
        array(
                'key' => 'horario', // name of custom field
                'value' => '"' . $horario . '"',
                'compare' => 'LIKE'
            )
    );
endif;

if($localizacao != '0' && $localizacao != ''):
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
                'key' => 'area_formacao', // name of custom field
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
   'meta_key'         => $meta_key,
   'meta_query'       => $meta_query,
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
//echo $wpdb->last_query;
    ?>
    <?php    
    foreach ( $myposts as $post ) :
        setup_postdata( $post );
        
        //Tipo de formacao
        $tipoFormacao = get_field('tipo_formacao');

        $tipoFormacao =$tipoFormacao[0];//First
        $tipoHorario = get_field('horario');
        $tipoHorario =$tipoHorario[0];//First
        $icon = get_field('icon',$tipoFormacao);
        $cssClassType = get_field('class',$tipoFormacao);
        //End tipo de formacao
        
        //Localizacao
        $localizacaoObj = get_field('localizacao');
        $localizacaoObj = $localizacaoObj[0];//First
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

        //Colocar data a definir/TBA quando ultrapassa o dia da formação
        $dataInicio = get_field('home_data', false, false);
        $end = false;
        if($dataInicio != false):
            $hoje = date('Ymd');
            if($hoje > $dataInicio):
                $end = true;
            endif;
        endif;
        
        ?>
        <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>">
            <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="filter-linker">
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
                                <?php if(get_field('home_data') && !$end):
                                    $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                    $month = strftime("%B", $date->getTimestamp());
                                    ?>
                                    <p class="day"><?php echo $date->format('d'); ?></p>
                                    <p class="month"><?php echo $month; ?></p>
                                    <?php else: ?>
                                        <?php if( get_field('ingles') ): ?>    
                                            <p class="day" style="font-size: 3.5rem;">TBA</p>
                                            <p class="month ad" style="font-size: .95rem;">To be announced</p>
                                            <?php else: ?>
                                             <p class="day">AD</p>
                                             <p class="month ad"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
                                         <?php endif; ?>    
                                     <?php endif; ?>

                                 </div>
                                 <div class="icon-cont">
                                    <div class="icon">
                                        <?php if($icon != ''): ?>
                                            <img src="<?php echo $icon;?>" />
                                        <?php endif; ?>
                                    </div>
                                    
                                    <span class="icon-label">
                                        <?php 
                                        echo $tipoFormacao->post_title;
                                        ?>
                                    </span>
                                    <span style="margin-top: 2px;" class="icon-label">
                                        <?php 
                                        if( get_field('ingles') && $tipoHorario->post_title == 'Fim de Semana' ):  
                                            echo 'Weekend';
                                        else: 
                                            echo $tipoHorario->post_title;
                                        endif;
                                        ?>
                                    </span>
                                </div>
                                <div class="event-location">
                                    <p>
                                        <?php 
                                        if( get_field('ingles') && $localizacaoObj->post_title == 'Lisboa' ): 
                                            echo 'Lisbon';
                                        else: 
                                            echo $localizacaoObj->post_title;
                                        endif;
                                        ?>
                                    </p>
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

        <?php else:?>
            <div class="block iso-block block-full margin-100" data-old="block-full">
                <div class="not-found">
                    <h3><?php dictionary("Nao_foram_encontrados_ofertas") ?></h3>
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
                    <?php
                    if(isset($_REQUEST['tipo'])) {?>
                        $("#inputCursos").data('plugin_multifilter').setActive(<?php echo $tipo; ?>);
                        <?php
                    }
                    ?>

                    <?php
                    if(isset($_REQUEST['area'])) {?>
                        $("#inputArea").data('plugin_multifilter').setActive(<?php echo $area; ?>);
                        <?php
                    }
                    ?>

                    <?php
                    if(isset($_REQUEST['horario'])) {?>
                        $("#inputHorario").data('plugin_multifilter').setActive(<?php echo $horario; ?>);
                        <?php
                    }
                    ?>

                    <?php
                    if(isset($_REQUEST['localizacao'])) {?>
                        $("#inputLocalizacao").data('plugin_multifilter').setActive(<?php echo $localizacao; ?>);
                        <?php
                    }
                    ?>

                })
            </script>

            <?php endif; ?>