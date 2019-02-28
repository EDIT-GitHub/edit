<?php
/**
 * The template for Detalhe Eventos
 *
 * @package Edit
 */

?>

<div class="content">
   <!-- HEADER MODULE -->
    <div class="header js-header flex full no-margin">
        <div class="header-item not-found">
            <div class="background">
                <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/assets/404.jpg)"></div>
            </div>
            <div class="grid-cont">
                <div class="header-description">
                    <div class="summary">
                        <!-- <h1>Aqui não se aprende nada</h1> -->
                        <a href="/" class="default-btn btn-icon not-found">
                            <div class="border"></div>
                            <p class="label">Voltar à homepage</p>
                            <div class="inner">
                                <div class="icon">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                        <path fill="#000" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                                        c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                                        c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"/>
                                    </svg>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({ type: 'header', instance: new Edit.modules.smallHeader('.js-header') })
            })
        </script>
        
    </div>

</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.pageLoader.totalModules = 1;
        Edit.modules.isoModuleResponsive.init();
    });
</script>


