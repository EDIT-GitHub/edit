<?php
/**
* Template Formação Profissões
*
* @package Edit
*/
$tipoId = 0;
$areaId = 0;
$horarioId = 0;
$localizacaoId = 0;
if(isset($_REQUEST['inputCursos'])) {
    $tipoId = $_REQUEST['inputCursos'];
}

    $areaId = get_sub_field('tipo_de_formacao');

if(isset($_REQUEST['inputHorario'])) {
    $horarioId = $_REQUEST['inputHorario'];
}
if(isset($_REQUEST['inputLocalizacao'])) {
    $localizacaoId = $_REQUEST['inputLocalizacao'];
}
?>

<div id="<?php echo 'bloco' . $GLOBALS['count']; ?>" class="block-profissoes-formacao bloco-js content">
    <!-- HEADER MODULE -->
    <div class="header flex small item slider">
        <div class="wrapper">
            <div class="header-item">
                <div class="background">
                    <div class="img" draggable="false" style="background-image:url('<?php the_sub_field('imagem_de_fundo');?>')">
                    </div>
                    <div class="block-profissoes">
                        <div class="grid-cont">
                            <h2 class="title white reset pt-80">
                                <span class="numero white">
                                   <?php echo $GLOBALS['count']; ?>
                                </span>
                                <?php the_sub_field('bloco-titulo'); ?>
                                <span class="dot"></span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HEADER MODULE -->
    <!-- PAGE FILTERS MODULE -->
    <div class="filters filters-header pull-up">
        <div class="default-btn filter-btn">
            <span class="label"><?php echo dictionary('o_que_procuras'); ?></span>
            <div class="btn-icon">
                <div class="inner">
                    <div class="icon">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                        <path d="M21.81,11.189c-0.586-0.586-1.535-0.586-2.121,0l-4.689,4.689l-4.688-4.688c-0.586-0.586-1.535-0.586-2.121,0
                        c-0.586,0.585-0.586,1.535,0,2.121l5.656,5.657c0.293,0.293,0.677,0.439,1.061,0.439c0.032,0,0.063-0.017,0.095-0.019
                        c0.03,0.002,0.06,0.018,0.09,0.018c0.384,0,0.768-0.146,1.061-0.439l5.657-5.657C22.396,12.725,22.396,11.775,21.81,11.189z"/></svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="filters-holder js-filters pb-100">
            <div class="responsive-header">
                <div class="label">
                    <span><?php echo dictionary('o_que_procuras'); ?></span>
                </div>
                <div class="icon-cont">
                    <div class="icon">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                        <polygon fill="#000000" points="25,13 17,13 17,5 13,5 13,13 5,13 5,17 13,17 13,25 17,25 17,17 25,17 "/></svg>
                    </div>
                </div>
            </div>
            <div class="grid-cont">
                <div class="filter">
                    <select id="inputCursos" data-exterior-label="<?php _e('Tipo', 'edit'); ?>"  name="inputCursos">
                        <option value="0" <?php if($tipoId == 0): ?>selected<?php endif; ?>>Todos</option>
                        <?php
                        $arguments = array(
                            'offset'           => '',
                            'showposts'        => '-1',
                            's'                => '',
                            'category'         => '',
                            'tag'              => '',
                            'orderby'          => 'menu_order',
                            'include'          => '',
                            'exclude'          => '',
                            'meta_key'         => '',
                            'meta_value'       => '',
                            'post_type'        => 'formacao_tipo',
                            'post_mime_type'   => '',
                            'post_parent'      => '',
                            'post_status'      => '',
                            'suppress_filters' => '0'
                        );
                        $tipos = get_posts( $arguments );
                        foreach($tipos as $tipo):
                            $name = $tipo->ID;
                            switch($name){
                                case '54':
                                if(LANGUAGE == 'PT'):
                                    $name = 'Cursos/<br>Programas';
                                else:
                                 $name = 'Masters';
                             endif; 
                             break;
                             case '58':
                             $name = 'Cursos Intensivos';
                             break;
                             case '15271':
                             $name = 'Cursos Intensivos';
                             break;
                             case '60':
                             $name = 'Workshops';
                             break;
                             case '62':
                             $name = 'International Workshops';
                             break;
                             case '22223':
                             $name = 'International Workshops';
                             break;
                             case '33782':
                             $name = 'Pós-graduação';
                             break;
                         }
                         ?>
                         <option value="<?php echo $tipo->ID ?>" <?php if($tipoId == $tipo->ID): ?>selected<?php endif; ?>><?php echo $name; ?></option>
                         <?php
                     endforeach;
                     ?>
                 </select>
             </div>
             <div style="display: none;" class="filter">
                <select id="inputArea" data-exterior-label="<?php _e('Área', 'edit'); ?>" name="inputArea">
                <option value="0" <?php if($areaId == 0): ?>selected<?php endif; ?>>Todos</option>
                <?php
                $arguments = array(
                    'offset'           => '',
                    'showposts'        => '-1',
                    's'                => '',
                    'category'         => '',
                    'tag'              => '',
                    'orderby'          => 'menu_order',
                    'include'          => '',
                    'exclude'          => '',
                    'meta_key'         => '',
                    'meta_value'       => '',
                    'post_type'        => 'formacao_area',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'post_status'      => '',
                    'suppress_filters' => '0'
                );
                $areas = get_posts( $arguments );
                foreach($areas as $area):
                    ?>
                    <option value="<?php echo $area->ID ?>" <?php if($areaId == $area->ID): ?>selected<?php endif; ?>><?php echo $area->post_title; ?></option>
                    <?php
                endforeach;
                ?>
            </select>
            </div>
             <script>
                jQuery(document).ready(function( $ ) {
                    Edit.modules.collection.push({ type: 'filters', instance: new Edit.modules.filtersModule('.js-filters', '/results/formacao-profissoes-results/') })
                })
            </script>
        </div>
        <div class="responsive-interface">
            <div class="grid-cont">
                <div class="default-btn modal-btn disabled clear">
                    <span class="label"><?php dictionary("Limpar") ?></span>
                </div>
                <div class="default-btn modal-btn disabled okay">
                    <span class="label">Ok</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE FILTERS MODULE -->
<!-- CURSO MODULE -->
<div class="filtered-content">
    <div class="js-iso-module filtered margin-50 js-cursos">
        <div class="grid-cont">
            <div class="grid-sizer"></div>
            <?php get_template_part( 'partials/partial', 'formacao-profissoes-result' ); ?>
        </div>
        <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({type:'isoModule',instance:new Edit.modules.isoModule('.js-cursos')});
            })
        </script>
    </div>
</div>
<!-- END CURSO MODULE -->
<!--  LOAD MORE BUTTON  -->
<div class="block-profissoes block-formacao-info margin-50">
    <div class="grid-cont big flex-container flex-centered">
     <?php if(LANGUAGE == 'PT'):
         $link = '/formacao';
     else: 
         $link = '/formacion';
     endif; ?> 
     <a class="btn-more" href="<?php echo $link; ?>" >
        <div>
           <?php dictionary("botao_formacao"); ?>
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
</div>
</div>

<!-- END LOAD MORE BUTTON -->
</div>