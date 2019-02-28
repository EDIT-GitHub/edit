<?php
/**
 * The template for Campanhas
 *
 * @package Edit
 */

$servicesEnpoint = "/results/cursos/";

//if(LANGUAGE=="en") {
//    $childofMarcas = 40;
//    $servicesEnpoint = "/en/results/areas/";
//}
?>

<div class="content">
    <!-- SLIDER MODULE -->
    <div class="slider header flex small">
        <div class="wrapper">
            <div class="pane-scroll">
                <div class="slider-item header">
                    <div class="delayed">
                        <div class="background">
                            <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/escola/slider/slide-1.jpg)"></div>
                        </div>
                    </div>
                    <div class="slider-media">
                    </div>
                    <div class="grid-cont">
                        <div class="slider-description">
                            <div class="summary">
                                <h2><b>WE ARE </b><br><b>EDIT</b></h2><br>
                                <p>Disruptive <br>Digital <br>Culture</p>
                            </div>
                            <div class="icon-cont">
                                <div class="icon">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                        <path fill="#FFDD15" d="M0,0v50h50V0H0z M47.801,23.641H30.309V2.198h17.492V23.641z M28.11,2.198v21.443H2.199V2.198H28.11z
                                         M2.199,25.839h8.567v21.963H2.199V25.839z M12.965,47.803V25.839h34.836v21.963H12.965z"/>
                                    </svg>
                                </div>
                                <span class="icon-label">Curso</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-controls">
            <div class="controls">
                <div class="next-btn">
                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
                        <g>
                            <g>
                                <path fill="#FFFFFF" d="M5.75,0c0.128,0,0.256,0.049,0.354,0.146l10.5,10.5c0.094,0.094,0.146,0.221,0.146,0.354
                                    s-0.053,0.26-0.146,0.354l-10.5,10.5c-0.195,0.195-0.512,0.195-0.707,0s-0.195-0.512,0-0.707L15.543,11L5.396,0.854
                                    c-0.195-0.195-0.195-0.512,0-0.707C5.494,0.049,5.622,0,5.75,0z"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="separator"></div>
                <div class="prev-btn"> 
                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
                        <g>
                            <g>
                                <path fill="#FFFFFF" d="M16.249,22.001c-0.128,0-0.256-0.049-0.354-0.146l-10.5-10.5c-0.094-0.094-0.146-0.221-0.146-0.354
                                    s0.053-0.26,0.146-0.354l10.5-10.5c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707L6.456,11.001l10.146,10.146
                                    c0.195,0.195,0.195,0.512,0,0.707C16.505,21.952,16.377,22.001,16.249,22.001z"/>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="indicator">
                <div class="strip-display">
                    <div class="strip" style="transform:matrix(1,0,0,1,0,0)">
                        <p>1</p>
                        <p>2</p>
                    </div>
                </div>
                <div class="separator">/</div>
                <span class="total">2</span>
            </div>
        </div>
    </div>
    <script>
        jQuery(document).ready(function( $ ) { 
            Edit.modules.collection.push({type:'homeSlider',instance:new Edit.modules.homeSlider('.header')});
        })
    </script>
    <!-- END SLIDER MODULE -->
    <!-- CURSO MODULE -->
    <div class="js-iso-module filtered margin-50 js-cursos">
        <div class="grid-cont">
            <div class="block-medium iso-block team grid-1-2" data-old="block-medium">
                <div class="block-content">
                    <div class="image">
                        <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/escola/equipa/t1-grayed.jpg" />
                    </div>
                    <div class="block-description">
                        <div class="block-title">
                            <h2>Tobias <br>Van <br>Schnitzel</h2>
                            <h3>UI Designer & Developer</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-medium iso-block team grid-1-2" data-old="block-medium">
                <div class="block-content">
                    <div class="image">
                        <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/escola/equipa/t2-grayed.jpg" />
                    </div>
                    <div class="block-description">
                        
                        <div class="block-title">
                            <h2>Sérgio Henriques Santos</h2>
                            <h3>UI Designer & Developer</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-medium iso-block team grid-1-4" data-old="block-medium">
                <div class="block-content">
                    <div class="image">
                        <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/escola/equipa/t3.jpg" />
                    </div>
                    <div class="block-description">
                        <div class="block-title">
                            <h2>Ana Sofia Castanho</h2>
                            <h3>UI Designer & Developer</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function( $ ) {
                console.log('CREATED')
                Edit.modules.collection.push({type:'isoModule',instance:new Edit.modules.isoModule('.js-equipa')});
            })
        </script>
    </div>
    <!-- END CURSO MODULE -->

    <script>
        jQuery(document).ready(function( $ ) { 
            Edit.pageLoader.totalModules = 3;
            Edit.modules.mapModule.locations = [
                {
                    id:'lisboa',
                    location:{
                        lat:'38.710476', 
                        lng:'-9.134969'
                    }
                },
                {
                    id:'porto',
                    location:{
                        lat:'41.153556',
                        lng:'-8.611235'
                    }
                }
            ]
            // If exists n+ modules of isomodule call:
            Edit.modules.isoModuleResponsive.init();
        })
    </script>
</div>
<script>
    //alert('O mertinho e fix');
</script>