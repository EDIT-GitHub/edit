<?php
/**
 * The template for Generic Detalhe
 *
 * @package Edit
 */

?>
<div class="content">
    <!-- HEADER MODULE GENERIC BLOCKS -->
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
                                <h1><?php the_title(); ?></h1>
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
    <?php
    get_template_part( 'partials/partial', 'genericblocks');
    ?>
</div>
<script>
    jQuery(document).ready(function( $ ) {

        Edit.pageLoader.totalModules = 1;
        Edit.modules.shareLightbox('.block-share');
        Edit.modules.isoModuleResponsive.init();
    })
</script>
