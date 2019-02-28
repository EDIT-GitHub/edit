<?php
/**
 * The template for Blog
 *
 * @package Edit
 */


$inputAnoId = "0";
$inputTipoId = "0"; 
$inputAreaId = "0";

if(isset($_REQUEST['inputAno'])) {
    $inputAnoId = $_REQUEST['inputAno'];
}
if(isset($_REQUEST['inputTipo'])) {
    $inputTipoId = $_REQUEST['inputTipo'];
}
if(isset($_REQUEST['inputArea'])) {
    $inputAreaId = $_REQUEST['inputArea'];
}


?>

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
                                    <polygon fill="#FFFFFF" points="67,60 67,67 3,67 3,3 67,3 67,10 70,10 70,0 0,0 0,70 70,70 70,60 " />
                                </svg>
                            </div>
                            <div class="summary">
                                <h1>Blog</h1>
                            </div>
                            <div class="icon-cont">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function( $ ) {
            Edit.modules.collection.push({ type: 'header', instance: new Edit.modules.smallHeader('.js-header') })
        })
    </script>
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
                            c0.03,0.002,0.06,0.018,0.09,0.018c0.384,0,0.768-0.146,1.061-0.439l5.657-5.657C22.396,12.725,22.396,11.775,21.81,11.189z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="filters-holder js-filters pull-up margin-50">
            <div class="responsive-header">
                <div class="label">
                    <span>O que procuras?</span>
                </div>
                <div class="icon-cont">
                    <div class="icon">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                        <polygon fill="#000000" points="25,13 17,13 17,5 13,5 13,13 5,13 5,17 13,17 13,25 17,25 17,17 25,17 "/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="grid-cont">
                <div class="filter">
                        <select id="inputAno" data-exterior-label="<?php dictionary("Ano") ?>" name="inputAno">
                            <option value="0" <?php if($inputAnoId == "0"): ?>selected<?php endif; ?>>Todos</option>
                            <?php
                                $thisYear = date("Y");


                                for($i = 0; $i < 5 ; $i++){
                                    $year = $thisYear -$i
                                ?>
                                <option value="<?php echo $year; ?>" <?php if($inputAnoId == $year): ?>selected<?php endif; ?>><?php echo $year; ?></option>
                                <?php
                                }
                            ?>
                        </select>
                </div>
                <div class="filter">
                    <select id="inputTipo" data-exterior-label="<?php _e('Tipo', 'edit'); ?>" name="inputTipo">
                        <option value="0" <?php if($inputTipoId == "0"): ?>selected<?php endif; ?>>Todos</option>
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
                            'post_type'        => 'categorias_blog',
                            'post_mime_type'   => '',
                            'post_parent'      => '',
                            'post_status'      => '',
                            'suppress_filters' => '0'
                        );

                        $areas = get_posts( $arguments );

                        foreach($areas as $area):
                        ?>
                        <option value="<?php echo $area->ID ?>" <?php if($inputTipoId == $area->ID): ?>selected<?php endif; ?>><?php echo $area->post_title; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
                <div class="filter">
                    <select id="inputArea" data-exterior-label="<?php _e('Área', 'edit'); ?>" name="inputArea">
                        <option value="0" <?php if($inputAreaId == "0"): ?>selected<?php endif; ?>>Todos</option>
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
                        <option value="<?php echo $area->ID ?>" <?php if($inputAreaId == $area->ID): ?>selected<?php endif; ?>><?php echo $area->post_title; ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>

                <script>
                    jQuery(document).ready(function( $ ) {
                        Edit.modules.collection.push({ type: 'filters', instance: new Edit.modules.filtersModule('.js-filters', '/results/blog-result/') })
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
    <div class="filtered-content">
        <div class="js-iso-module blog-module filtered margin-50 js-blog">
            <div class="grid-cont">
                <div class="grid-sizer"></div>
                <?php get_template_part( 'partials/partial', 'blog-response' ); ?>
            </div>
            <script>
                jQuery(document).ready(function( $ ) {
                    Edit.modules.collection.push({type:'isoModule',instance:new Edit.modules.isoModule('.js-blog')});
                })
            </script>
        </div>
    </div>
    <!-- END PAGE FILTERS MODULE -->
    <!-- BLOG MODULE 
    <div class="filtered-content">
        <div class="blog-module filtered margin-50 js-cursos">
            <div class="grid-cont">
                <div class="block-full blog" data-old="block-full">
                        <div class="block-content">
                            <div class="image">
                                <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/entrevistas/entrevista-1.jpg" />
                                <div class="block-hover">
                                    <div class="border"></div>
                                    <div class="bg"></div>
                                </div>
                            </div>
                            <div class="inner">
                                <div class="block-description">
                                <div class="event-details">
                                    <div class="square">
                                        <p class="day">25</p>
                                        <p class="month">Março</p>
                                        <p class="year">2015</p>
                                    </div>
                                    <div class="icon-cont">
                                        <span class="icon-label">Entrevista</span>
                                    </div>
                                </div>
                            </div>
                            <div class="block-text title">
                                <h2>DIGITAL AGENCIES
                                        <br>
                                    IN TOKYO: A LOOK AT
	                                    <br>
                                    JAPANESE WEB DESIGN
                                </h2>
                                <div class="blockquote">
                                    <p class="date">ESCRITO POR ANABELA COSTA</p>
                                </div>
                            </div>
                            <div class="block-text">
                                <div class="block-formacao-info">
                                    <h3>Em termos práticos o serviço de branding é destinado a novos empresários e novos negócios ou a Brand Managers de empresas que necessitem de criar uma nova marca de consumo ou re-estruturar uma marca já no mercado</h3>
                                    <div class="separator-coment">
                                        <div class="icon-coment">
                                            <div class="num-coments">
                                                <span>2</span>
                                            </div>
                                            <span class="margin">COMENTÁRIOS</span>
                                        </div>
                                        <div class="border-sep"></div>
                                        <a class="btn-more" href="https://generalassemb.ly" target="_blank">
                                            <div>
                                                Mais Info
                                            </div>
                                        </a>
                                    </div>
                                    <div class="tags">
                                        <a href="#" class="tag no-route"><span></span>DIGITAL DESIGN</a>
                                        <a href="#" class="tag no-route"><span></span>USER INTERFACE</a>
                                        <a href="#" class="tag no-route"><span></span>DIGITAL</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END BLOG MODULE -->
    <!-- START LOAD MORE MODULE -->
    <div class="load-more-container js-loadmore margin-50">
        <div class="load-more-btn">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="inner">
                <div class="border"></div>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M15,25c-1.104,0-2-0.995-2-2.223V7.223C13,5.995,13.896,5,15,5s2,0.995,2,2.223v15.555C17,24.005,16.104,25,15,25z" />
                        </g>
                        <g>
                            <path d="M22.777,17H7.223C5.995,17,5,16.104,5,15s0.995-2,2.223-2h15.555C24.005,13,25,13.896,25,15S24.005,17,22.777,17z" />
                        </g>
                    </g>
                </svg>
            </div>
            <div class="line"></div>
        </div>
        <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({ type: 'loadMore', instance: new Edit.modules.loadMore('.js-loadmore', true, '/results/blog-result/') });
            })
        </script>
    </div>
    <!-- END LOAD MORE MODULE -->
    <script>
        jQuery(document).ready(function( $ ) {
            Edit.pageLoader.totalModules = 2;
            Edit.modules.isoModuleResponsive.init();

            
        })
    </script>
</div>



