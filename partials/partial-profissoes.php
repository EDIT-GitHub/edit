<?php
/**
 * The template for Profissoes
 *
 * @package Edit
 */

$inputAnoId = "0";
$inputClienteId = "0"; 


if(isset($_REQUEST['inputAno'])) {
    $inputAnoId = $_REQUEST['inputAno'];
}
if(isset($_REQUEST['inputCliente'])) {
    $inputClienteId = $_REQUEST['inputCliente'];
}
?>

<div class="content profissoes">
    <!-- HEADER MODULE -->
    <div class="header js-header flex small" style="min-height: 600px;">
        <div class="wrapper">
            <div class="header-item">
                <div class="background" style="min-height: 450px;">
                    <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/bg.jpg)"></div>
                    <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)"></div>
                    <div class="grid-cont">
                        <div class="header-description">
                            <div class="square">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="70px" height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve">
                                <polygon fill="#FFFFFF" points="67,60 67,67 3,67 3,3 67,3 67,10 70,10 70,0 0,0 0,70 70,70 70,60 "/>
                            </svg>
                        </div>
                        <div class="summary" style="width: 91%;">
                            <h1><?php the_title(); ?></h1>
                            <div class="slider-description" style="margin-top: 18px;">
                                <p class="subtitulo"><?php echo dictionary("subtitulo_profissoes") ?></p>
                            </div>
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
        Edit.modules.collection.push({type:'header',instance:new Edit.modules.smallHeader('.js-header')})
    })
</script>
<!-- END HEADER MODULE -->

<!-- CURSO MODULE -->
<div class="filtered-content">
    <div class="js-iso-module filtered margin-50 js-cursos">
        <div class="grid-cont">
            <div class="grid-sizer"></div>
            <?php get_template_part( 'partials/partial', 'profissoes-response' ); ?>
        </div>
        <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({type:'isoModule',instance:new Edit.modules.isoModule('.js-cursos')});
            })
        </script>
    </div>
</div>
<!-- END CURSO MODULE -->
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
                    <path d="M15,25c-1.104,0-2-0.995-2-2.223V7.223C13,5.995,13.896,5,15,5s2,0.995,2,2.223v15.555C17,24.005,16.104,25,15,25z"/>
                </g>
                <g>
                    <path d="M22.777,17H7.223C5.995,17,5,16.104,5,15s0.995-2,2.223-2h15.555C24.005,13,25,13.896,25,15S24.005,17,22.777,17z"/>
                </g>
            </g>
        </svg>
    </div>
    <div class="line"></div>
</div>
<script>
    jQuery(document).ready(function( $ ) {

        Edit.modules.collection.push({ type: 'loadMore', instance: new Edit.modules.loadMore('.js-loadmore', true, '/results/projectos-360/') });
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