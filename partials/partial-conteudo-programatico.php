<?php
$tipoFormacao = get_field('tipo_formacao');
$tipoFormacao =$tipoFormacao[0];
$cssClassType = get_field('class',$tipoFormacao);
?>
<!-- BLOCK SPACE -->
<div class="block-formacao-info curso <?php echo $cssClassType; ?> margin-top-100">
    <div class="grid-cont big no-padding-bottom">
    </div>
</div>
<!-- END BLOCK SPACE -->
<!-- CONTEUDO PROGRAMATICO MODULE -->
<div class="block-formacao-info programa js-programa <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
    <div class="bg curso <?php echo $cssClassType; ?>"></div>
    <div class="programa-content curso">
        <div class="grid-cont">
            <h2>
                <?php if( get_field('ingles') ):
                    echo "Programme";
                else:
                    echo dictionary("Conteudo_Programatico");
                endif;
                ?>
            </h2>
            <?php
            if(have_rows('conteudo_programatico')):
                $i=0;
                $alinhamento = 'right';
                while ( have_rows('conteudo_programatico') ) :
                    the_row();
                    $i++;
                    if(get_sub_field('tipo') == 'modulo'):
                        if( $alinhamento == 'left'):
                            $alinhamento = 'right';
                        else:
                            $alinhamento = 'left';
                        endif;
                        $css = "";
                        if(get_sub_field('blocos_programatico_alinhamento_ultimo')):
                            $css = 'small';
                        endif;
                        switch($alinhamento){
                            case 'left':?>
                            <div class="modulo left">
                                <div class="col graphics">
                                    <div class="vertical-graph"></div>
                                    <div class="num">
                                        <div class="ring"></div>
                                        <div class="ring-marked"></div>
                                        <div class="inner">
                                            <p><span>#</span><?php echo $i; ?></p>
                                            <?php if( get_field('ingles') ):
                                                echo '<span>Module</span>';
                                            else:
                                                echo '<span>Módulo</span>';
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col text">
                                    <div class="vertical-graph"></div>
                                    <div class="modulo-content">
                                        <?php
                                        if( have_rows('blocos_programatico_modulo') ):
                                            while ( have_rows('blocos_programatico_modulo') ) : the_row();
                                                $template = get_row_layout() ;
                                                switch($template):
                                                    case 'titulo':?>
                                                    <h3 class="title"><?php the_sub_field('titulo'); ?></h3>
                                                    <?php
                                                    break;
                                                    case 'linha':
                                                    $linha = get_sub_field('linha');
                                                    $linha = richTextCustom($linha);
                                                    ?>
                                                    <p><?php echo $linha; ?></p>
                                                    <?php
                                                    break;
                                                    case 'itens':?>
                                                    <ul>
                                                        <?php
                                                        if( have_rows('itens') ):
                                                            while ( have_rows('itens') ) : the_row();?>
                                                                <li><?php the_sub_field('item'); ?></li>
                                                                <?php
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </ul>
                                                    <?php
                                                    break;
                                                endswitch;
                                                ?>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="col placeholder"></div>
                            </div>
                            <div class="horiz-graph left <?php echo $css; ?>">
                                <div class="corner"></div>
                                <div class="middle"></div>
                                <div class="corner"></div>
                            </div>
                            <?php
                            break;
                            case 'right':?>
                            <div class="modulo right">
                                <div class="col placeholder"></div>
                                <div class="col text">
                                    <div class="vertical-graph"></div>
                                    <div class="modulo-content">
                                        <?php
                                        if( have_rows('blocos_programatico_modulo') ):
                                            while ( have_rows('blocos_programatico_modulo') ) : the_row();
                                                $template = get_row_layout() ;
                                                switch($template):
                                                    case 'titulo':?>
                                                    <h3 class="title"><?php the_sub_field('titulo'); ?></h3>
                                                    <?php
                                                    break;
                                                    case 'linha':
                                                    $linha = get_sub_field('linha');
                                                    $linha = richTextCustom($linha);
                                                    ?>
                                                    <p><?php echo $linha; ?></p>
                                                    <?php
                                                    break;
                                                    case 'itens':?>
                                                    <ul>
                                                        <?php
                                                        if( have_rows('itens') ):
                                                            while ( have_rows('itens') ) : the_row();?>
                                                                <li><?php the_sub_field('item'); ?></li>
                                                                <?php
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </ul>
                                                    <?php
                                                    break;
                                                endswitch;
                                                ?>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="col graphics">
                                    <div class="vertical-graph"></div>
                                    <div class="num">
                                        <div class="ring"></div>
                                        <div class="ring-marked"></div>
                                        <div class="inner">
                                            <p><span>#</span><?php echo $i; ?></p>
                                            <?php
                                            if( get_field('ingles') ):
                                                echo '<span>Module</span>';
                                            else:
                                                echo '<span>Módulo</span>';
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="horiz-graph right <?php echo $css; ?>">
                                <div class="corner"></div>
                                <div class="middle"></div>
                                <div class="corner"></div>
                            </div>
                            <?php
                            break;
                            case 'block-text-and-text':?>
                            <div class="block-text-and-text">
                                <div class="inner">
                                    <div class="text block-medium">
                                        <?php
                                        if( have_rows('blocos_programatico_modulo') ):
                                            while ( have_rows('blocos_programatico_modulo') ) : the_row();
                                                $template = get_row_layout() ;
                                                switch($template):
                                                    case 'titulo':?>
                                                    <h3><?php the_sub_field('blocos_programatico_modulo_titulo'); ?></h3>
                                                    <?php
                                                    break;
                                                    case 'linha':?>
                                                    <h4><?php the_sub_field('blocos_programatico_modulo_linha'); ?></h4>
                                                    <?php
                                                    break;
                                                endswitch;
                                                ?>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                    <?php
                                    break;
                                    case 'block-text-and-text-right':?>
                                    <?php
                                    if( have_rows('blocos_programatico_modulo') ):
                                        while ( have_rows('blocos_programatico_modulo') ) : the_row();
                                            $template = get_row_layout() ;
                                            switch($template):
                                                case 'linha':?>
                                                <div class="text block-medium">
                                                    <p><?php the_sub_field('blocos_programatico_modulo_linha'); ?></p>
                                                </div>
                                                <?php
                                                break;
                                            endswitch;
                                            ?>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <?php
                            break;
                        }
                    else:
                        if( have_rows('texto') ):
                            while ( have_rows('texto') ) : the_row(); ?>
                                <div class="block-text-and-text">
                                    <div class="inner">
                                        <div class="text block-medium">
                                            <h3><?php the_sub_field('titulo'); ?></h3>
                                            <h4><?php the_sub_field('subtitulo'); ?></h4>
                                            <?php
                                            $info = get_sub_field('mais_info');
                                            if($info):
                                                ?>
                                                <a href="<?php the_sub_field('info'); ?>" >
                                                    <div class="btn-more">
                                                        <?php dictionary("Mais_info") ?> <div class="btn-icon">
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
                                            <?php endif; ?>
                                        </div>
                                        <div class="text block-medium">
                                            <p><?php the_sub_field('texto'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        elseif (get_sub_field('url_video')):
                            $videoLink = get_sub_field('url_video');
                            $videoLink = str_replace('https:','',$videoLink);
                            $videoLink = str_replace('http:','',$videoLink);
                            if (strpos($videoLink, 'vimeo') > 0):
                                $color = '?color=ffdd00';
                            endif;
                            ?>
                            <div class="slider-media">
                                <iframe src="<?php echo $videoLink, $color; ?>" width="100%" frameborder="0" height="560" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                            <?php
                        endif;
                    endif;
                endwhile;
            endif;
            ?>
            <?php if (get_sub_field('add_workshop')): ?>
                <div class="horiz-graph right" style="display: block;">
                    <div class="corner"></div>
                    <div class="middle"></div>
                    <div class="corner"></div>
                </div>
                <div class="modulo single">
                    <div class="col graphics">
                        <div class="vertical-graph"></div>
                    </div>
                </div>
                <div class="workshop">
                    <svg class="workshop-svg" width="155" height="121" viewBox="0 0 155 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.53674e-08 1L62.7 40.1L47.1 3.05176e-06L9.53674e-08 1Z" transform="translate(4.8999 74.8)" fill="white"/>
                        <path d="M144.4 0H0V66.8H144.4V0Z" transform="translate(4.69995 5.59998)" fill="#5CBBAA"/>
                        <path d="M154.5 0H0V77.9L72.3 120.3L57.3 78H154.6V0H154.5ZM62.1 108L10.9 77.9H51.5L62.1 108ZM149 72.5H5.5V5.6H149V72.5Z" fill="black"/>
                        <path d="M75.8 0H-3.05176e-06V70.8H75.8V0Z" transform="translate(74.7 3.59998)" fill="black"/>
                        <path d="M38.3 0H0V38.3H38.3V0Z" transform="translate(94.1001 17.7999)" stroke="#5CBBAA" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M-1.52588e-06 7.62939e-07H38.4" transform="translate(94.1001 36.7)" stroke="#5CBBAA" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M3.05176e-06 3.8147e-07V38.3" transform="translate(113.3 17.6)" stroke="#5CBBAA" stroke-width="2" stroke-miterlimit="10"/>
                    </svg>
                    <p class="subtitle">
                        <?php the_sub_field('subtitle'); ?>
                    </p>
                    <p class="title">
                        <?php the_sub_field('title'); ?>
                    </p>
                    <div class="text">
                        <?php the_sub_field('text'); ?>
                    </div>
                    <div class="workshop-duration">
                        <div class="block-formacao-info">
                            <div class="class-duration">
                                <div class="total">
                                    <div>
                                        <?php
                                        $total = 0;
                                        if (have_rows('componentes_workshop')):
                                            while (have_rows('componentes_workshop')):
                                                the_row();
                                                $horas = get_sub_field('componente_horas');
                                                $total += $horas;
                                            endwhile;
                                            ?>
                                        <?php endif; ?>
                                        <div class="total">
                                            <?php echo $total; ?>h
                                            <span>
                                                <?php the_sub_field('texto_duracao'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- RADIAL GRAPH MODULE -->
                <div class="class-duration js-radialmodule2">
                    <?php
                    if (have_rows('componentes_workshop')):
                        while (have_rows('componentes_workshop')):
                            the_row();
                            $horas = get_sub_field('componente_horas');
                            ?>
                            <div class="graph curso workshop" data-hours="<?php echo $horas; ?>">
                                <div class="content-svg">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="220px" height="220px" viewBox="0 0 220 220" enable-background="new 0 0 220 220" xml:space="preserve">
                                    <g>
                                        <path class="bg-white" fill="none" stroke="#fff" stroke-width="10" stroke-miterlimit="10" d="M110,10C54.771,10,10,54.771,10,110s44.771,100,100,100s100-44.771,100-100S165.229,10,110,10L110,10z" />
                                        <path class="radial-svg-workshop" fill="none" stroke="#fff" stroke-width="10" stroke-miterlimit="10" d="M110,10C54.771,10,10,54.771,10,110s44.771,100,100,100s100-44.771,100-100S165.229,10,110,10L110,10z" />
                                    </g>
                                </svg>
                            </div>
                            <div class="content-circle content-circle-js">
                                <div class="circle">
                                </div>
                            </div>
                            <div class="graph-text">
                                <?php echo $horas; ?>h
                                <span><?php the_sub_field('componente_titulo'); ?></span>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>
            <script>
                jQuery(document).ready(function( $ ) {
                    Edit.modules.collection.push({ type: 'radialGraph2', instance: new Edit.modules.radialGraph2('.js-radialmodule2', '.radial-svg-workshop') });
                })
            </script>
            <!-- END RADIAL GRPAH MODULE -->
        <?php endif; ?>
    </div>
</div>
<div class="bg margin-bottom"></div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({type:'courseProgram',instance:new Edit.modules.courseProgram('.js-programa')});
    })
</script>
</div>
<!-- END CONTEUDO PROGRAMATICO MODULE -->