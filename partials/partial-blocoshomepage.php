<?php
$homeblocks = $GLOBALS['homeblocks'];
if($homeblocks):
    foreach($homeblocks as $post):
        setup_postdata($post);
        $tipoBloco = get_field('tipo_de_bloco');
        switch ($tipoBloco):
            case 'agenda':
            if(get_field('itens_de_agenda')):
                ?>
                <div class="js-iso-module agenda margin-100">
                    <div class="grid-cont">
                        <div class="grid-sizer"></div>
                        <div class="module-title iso-block block-medium agenda">
                            <div class="title-cont">
                                <h2>
                                    A<b>genda</b>
                                </h2>
                            </div>
                        </div>
                        <?php
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
                        $ids = get_field('itens_de_agenda', false, false);
                        $the_query = new WP_Query(array(
                            'post_type'         => array('formacao','entrevista','eventos'),
                            'post__in'          => $ids,
                            'post_status'       => 'publish',
                            'orderby'           => 'meta_value',
                            'meta_query'        => $meta_query,
                            'meta_key'          => 'home_data',
                            'order'             => 'ASC'
                        ));

                        $posts = $the_query->get_posts();
                        foreach ($posts as $post):
                            setup_postdata( $post );
                            $size = 'medium';
                            if(get_field('tipo_destaque_homepage')){
                                $size = get_field('tipo_destaque_homepage');
                            }
                            $icon = '';
                            $cssClassType = '';
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
                            switch ( $post->post_type):
                                case 'formacao':
                                $url = str_replace( home_url(), '', get_permalink() );
                                $tipoFormacao = get_field('tipo_formacao');
                                $icon = get_field('icon',$tipoFormacao[0]);
                                $cssClassType = get_field('class',$tipoFormacao[0]);
                                $localizacao = get_field('localizacao');
                                $localizacao = $localizacao[0];
                                ?>
                                <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>" data-home-data="<?php the_field('home_data'); ?>" data-region="<?php echo $localizacao->post_title; ?>">
                                    <a href="<?php echo $url;  ?>" class="block-content">
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
                                                        <g>
                                                            <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                                        </g>
                                                    </svg>
                                                    <?php
                                                    if(get_field('home_data')){
                                                        $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                        $month = strftime("%B", $date->getTimestamp());
                                                        ?>
                                                        <p class="day"><?php echo $date->format('d'); ?></p>
                                                        <p class="month"><?php echo $month; ?></p>
                                                    <?php }else{ ?>
                                                        <p class="day">AD</p>
                                                        <p class="month ad"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
                                                    <?php }?>
                                                </div>
                                                <div class="icon-cont">
                                                    <div class="icon">
                                                        <?php if($icon != ''): ?>
                                                            <img src="<?php echo $icon;?>" />
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php
                                                    if(get_field('tipo_formacao')):
                                                        $tipo_formacao_array = get_field('tipo_formacao');
                                                        $tipoHorario_array = get_field('horario');
                                                        ?>
                                                        <span class="icon-label">
                                                            <?php echo $tipo_formacao_array[0]->post_title;  ?>
                                                        </span>
                                                        <span style="margin-top: 2px;" class="icon-label">
                                                            <?php if( get_field('ingles') && $tipoHorario_array[0]->post_title == 'Fim de Semana' ):
                                                                echo 'Weekend';
                                                            else:
                                                                echo $tipoHorario_array[0]->post_title;
                                                            endif; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="event-location">
                                                    <p>
                                                        <?php
                                                        if( get_field('ingles') && $localizacao->post_title == 'Lisboa' ):
                                                            echo 'Lisbon';
                                                        else:
                                                            echo $localizacao->post_title;
                                                        endif;
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="block-title">
                                                <h2><?php the_field('home_titulo'); ?></h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                break;
                                case 'eventos':
                                $icon = get_template_directory_uri() . '/images/assets/svg/categorias/eventos.svg';
                                $cssClassType = 'evento';
                                $localizacao = get_field('localizacao');
                                $localizacao = $localizacao[0];
                                $hasLabel = (trim(get_field('texto_icon')) == "") ? "" : "hasLabel";
                                ?>
                                <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> <?php echo $hasLabel; ?> grid-1-2" data-old="block-<?php echo $size; ?>" data-home-data="<?php the_field('home_data'); ?>" data-region="<?php echo $localizacao->post_title; ?>">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="block-content">
                                        <div class="image">
                                            <img width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>" />
                                            <div class="block-hover">
                                                <div class="border"></div>
                                                <div class="bg"></div>
                                            </div>
                                        </div>
                                        <div class="block-description">
                                            <div class="event-details">
                                                <div class="square">
                                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                                        <g>
                                                            <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                                        </g>
                                                    </svg>
                                                    <?php
                                                    if(get_field('home_data')){
                                                        $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                        $month = $date->format('F');
                                                        $month = strftime("%B", $date->getTimestamp());
                                                        ?>
                                                        <p class="day"><?php echo $date->format('d'); ?></p>
                                                        <p class="month"><?php echo $month; ?></p>
                                                    <?php }else{ ?>
                                                        <p class="day">AD</p>
                                                        <p class="month ad"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
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
                                    </a>
                                </div>
                                <?php
                                break;
                                case 'entrevista':
                                $icon = get_template_directory_uri() . '/images/assets/svg/categorias/entrevista.svg';
                                $cssClassType = 'interview';
                                ?>
                                <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>" data-home-data="<?php the_field('home_data'); ?>" data-region="">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="block-content">
                                        <div class="image">
                                            <img width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>" />
                                            <div class="block-hover">
                                                <div class="border"></div>
                                                <div class="bg"></div>
                                            </div>
                                        </div>
                                        <div class="block-description">
                                            <div class="event-details">
                                                <div class="square">
                                                    <svg version="1.0" id="Layer_1" preserveAspectRatio='xMinYMin' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 90 90" xml:space="preserve">
                                                        <g>
                                                            <rect fill="transparent" width="30" height="30" stroke="#FFDF00" stroke-width="4" />
                                                        </g>
                                                    </svg>
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
                                                    <p><?php the_field('home_description'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                break;
                                default:
                                ?>
                                <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>" data-home-data="<?php the_field('home_data'); ?>" data-region="">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="block-content">
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
                                                        <g>
                                                            <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                                        </g>
                                                    </svg>
                                                    <?php
                                                    if(get_field('home_data')){
                                                        $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                        $month = strftime("%B", $date->getTimestamp());
                                                        ?>
                                                        <p class="day"><?php echo $date->format('d'); ?></p>
                                                        <p class="month"><?php echo $month; ?></p>
                                                    <?php }else{ ?>
                                                        <p class="day">AD</p>
                                                        <p class="month ad"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
                                                    <?php }?>
                                                </div>
                                                <div class="icon-cont">
                                                    <div class="icon">
                                                        <?php if($icon != ''): ?>
                                                            <img src="<?php echo $icon;?>" />
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php
                                                    if(get_field('tipo_formacao')):
                                                        $tipo_formacao_array = get_field('tipo_formacao');
                                                        ?>
                                                        <span class="icon-label"><?php echo $tipo_formacao_array[0]->post_title;  ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="block-title">
                                                <h2><?php the_field('home_titulo'); ?></h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endswitch; ?>
                            <?php
                        endforeach;
                    endif;
                    wp_reset_query(); 
                    ?>
                </div>
                <script>
                    jQuery(document).ready(function( $ ) {
                        Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.agenda') });
                    })
                </script>
            </div>
            <?php
            break;
            case 'latest':
            ?>
<div class="block-profissoes">
<div class="grid-cont big">
    <div class="title-block aligncenter pb-50">
        <h2 class="title-big reset">
            <?php echo dictionary("profissoes"); ?><span class="dot">.</span>
        </h2>
    </div>
</div>

<div class="profissoes-module wrapper mb-80 pt-50 pb-80">
    <div class="grid-cont big">
        <p class="profissoes__subtitulo pb-40">
        <?php echo dictionary("subtitulo_profissoes"); ?>
        </p>
    </div>
    
    <div class="profissoes-slider profissoes-slider-js">
    <div class="profissoes-slider__wrp swiper-wrapper">
        

        <?php

        $the_query = new WP_Query(array(
            'post_type'      => 'profissoes',
            'meta_query'     => '',
            //'post__in'       => $ids,
            'posts_per_page' => -1, 
            'post_status'    => 'publish',
            'orderby'        => '',
            'order'          => 'DESC'
        ));



        $posts = $the_query->get_posts();

        foreach ( $posts as $post ) :
            setup_postdata( $post );
            //var_dump($post);
            $size = 'medium';
            $fundo_amarelo = ''; 

            if(get_field('tipo_destaque_homepage')){
                $size = get_field('tipo_destaque_homepage');
            }

            //profissao
            $profissao = get_field('profissao');
            $profissao = $profissao[0];//First
            //End profissao
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
            } ?>
             <div class="profissoes-slider__item swiper-slide">

                <span class="profissoes__rectangle "></span>
                <?php if(LANGUAGE == 'PT'): ?>
                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="profissoes__item no-route" onClick="ga('send', 'event', 'clique_profissoes', 'HP_click_profissao', 'ClickProfissao');">
                <?php else: ?>
                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="profissoes__item no-route">
                <?php endif; ?>
                    <div class="profissoes__img">
                        <img alt="" draggable="false" src="<?php echo $image['url']; ?>">       
                    </div>
                    <div class="profissoes__title">
                        <?php the_field('home_titulo'); ?>
                    </div>
                    <p class="profissoes__txt">
                        <?php the_field('home_subtitulo'); ?>
                    </p>
                    <div class="profissoes__button">
                        <?php dictionary("button_saber_mais") ?>                        
                    </div>
                </a>
             </div>
        <?php
        endforeach;
        ?>

    </div>

    <div class="profissoes-slider__ctr">

        <div class="profissoes-slider__arrows">
        <button class="profissoes-slider__arrow profissoes-slider-prev">
            <span class="icon-font">
            <svg class="icon icon-arrow-left"><use xlink:href="#icon-arrow-left"></use></svg>
            </span>
        </button>
        <button class="profissoes-slider__arrow profissoes-slider-next">
            <span class="icon-font">
            <svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>
            </span>
        </button>
        </div>

        <div class="profissoes-slider__pagination"></div>

    </div>

    </div>

</div>
<svg hidden="hidden">
<defs>
  <symbol id="icon-arrow-left" viewBox="0 0 32 32">
    <title>arrow-left</title>
    <path d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
  </symbol>
  <symbol id="icon-arrow-right" viewBox="0 0 32 32">
    <title>arrow-right</title>
    <path d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
  </symbol>
</defs>
</svg>

</div>

    <script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({ type: 'swiperHome', instance: new Edit.modules.swiperHome('.profissoes-slider-js') });
    })
    </script>
 <!-- end destaque profissões  -->

            <div class="js-iso-module latest margin-100">
                <div class="grid-cont">
                    <div class="grid-sizer"></div>
                    <div class="module-title iso-block block-medium agenda">
                        <div class="title-cont">
                            <h2>
                                Latest
                                <br>
                                <b>Edit</b>
                            </h2>
                        </div>
                    </div>
                    <?php
                    $ids = get_field('noticias_destacadas', false, false);
                    $the_query = new WP_Query(array(
                        'post_type'         => array('noticias', 'blog', 'entrevista'),
                        'post__in'          => $ids,
                        'post_status'       => 'publish',
                        'orderby'           => 'meta_value home_data',
                        'meta_key'          => 'home_data',
                        'order'             => 'DESC'
                    ));
                   // var_dump($the_query);
                    $posts = $the_query->get_posts();
                    foreach ($posts as $post):
                        setup_postdata( $post );
                        $size = 'medium';
                        if(get_field('tipo_destaque_homepage')){
                            $size = get_field('tipo_destaque_homepage');
                        }
                        $icon = '';
                        $cssClassType = '';
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
                            case 'randon':
                            $image = get_field('home_image');
                            $size = (rand(0, 10)) > 5?'medium':'small';
                            break;
                        }
                        switch ( $post->post_type):
                            case 'noticias':
                            $icon = get_template_directory_uri() . '/images/assets/svg/categorias/noticias-blog.svg';
                            $cssClassType = 'noticia';
                            ?>
                            <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>">
                                <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
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
                                                        <g>
                                                            <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                                        </g>
                                                    </svg>
                                                    <?php
                                                    if(get_field('home_data')):
                                                        $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                        $month = strftime("%B", $date->getTimestamp());
                                                        ?>
                                                        <p class="day"><?php echo $date->format('d'); ?></p>
                                                        <p class="month"><?php echo $month; ?></p>
                                                        <?php else: ?>
                                                            <p class="day">AD</p>
                                                            <p class="month ad"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="icon-cont">
                                                        <div class="icon">
                                                            <img src="<?php echo $icon; ?>" />
                                                        </div>
                                                        <span class="icon-label">
                                                            <?php the_field('tipo'); ?>
                                                        </span>
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
                                break;
                                case 'blog':
                                $icon = get_template_directory_uri() . '/images/assets/svg/categorias/noticias-blog.svg';
                                $cssClassType = 'blog-clear-css';
                                if (get_field('imagem_blog_homepage_medium')):
                                    $image = get_field('imagem_blog_homepage_medium');
                                    $size = 'medium';
                                elseif (get_field('imagem_blog_homepage_small')):
                                    $image = get_field('imagem_blog_homepage_small');
                                    $size = 'small';
                                endif; ?>
                                <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
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
                                                            <g>
                                                                <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                                            </g>
                                                        </svg>
                                                        <?php
                                                        if(get_field('home_data')){
                                                            $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                                            $month = strftime("%B", $date->getTimestamp());
                                                            ?>
                                                            <p class="day"><?php echo $date->format('d'); ?></p>
                                                            <p class="month"><?php echo $month; ?></p>
                                                        <?php }else{ ?>
                                                            <p class="day">AD</p>
                                                            <p class="month ad"><?php echo strtoupper(dictionary("Data_a_definir"));?></p>
                                                        <?php }?>
                                                    </div>
                                                    <div class="icon-cont">
                                                        <div class="icon">
                                                            <?php if($icon != ''): ?>
                                                                <img src="<?php echo $icon;?>" />
                                                            <?php endif; ?>
                                                        </div>
                                                        <span class="icon-label">BLOG</span>
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
                                break;
                                case 'entrevista':
                                ?>
                                <div class="block-<?php echo $size; ?> iso-block interview grid-1-2" data-old="block-<?php echo $size; ?>" data-home-data="<?php the_field('home_data'); ?>" data-region="">
                                    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="block-content">
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
                                                    <svg version="1.0" id="Layer_1" preserveAspectRatio='xMinYMin' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 90 90" xml:space="preserve">
                                                        <g>
                                                            <rect fill="transparent" width="30" height="30" stroke="#FFDF00" stroke-width="4" />
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="icon-cont">
                                                    <div class="icon">
                                                        <img src="<?php bloginfo('template_url'); ?>/images/assets/svg/categorias/<?php the_field('tipo'); ?>.svg" />
                                                    </div>
                                                    <span class="icon-label">
                                                        <?php echo (get_field('ingles'))?'Interview':the_field('tipo'); ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="block-title">
                                                <div>
                                                    <h2><?php the_field('home_titulo'); ?></h2>
                                                    <h3><?php the_field('home_subtitulo'); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                break;
                            endswitch;
                        endforeach;
                        wp_reset_query(); 
                        ?>
                    </div>
                    <script>
                        jQuery(document).ready(function( $ ) {
                            Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.latest') });
                        })
                    </script>
                </div>
                <?php
                break;
                case 'slider_profissoes':
                ?>
                <div class="title-block aligncenter pb-40">
                    <h2 class="title-big reset">
                        WHAT <br>
                        THEY SAY
                        <span class="dot">.</span>
                    </h2>
                </div>
                <div class="slider flex media profissoes <?php get_field('margem') == 'nenhuma' ? ' ' : the_field('margem') ?>">
                    <?php echo file_get_contents( get_template_directory_uri() . '/images/dummy/slider-video/svgs.svg' ); ?>
                    <div class="grid-cont big">
                        <div class="wrapper">
                            <div class="pane-scroll">
                                <?php
                                $rows = get_field('medias');
                                if(have_rows('medias')):
                                    $videoCount = 0;
                                    foreach($rows as $row):
                                        the_row();
                                        $videoCount++;
                                        $next_row_title = '';
                                        if ($videoCount < sizeof($rows)):
                                            $next_row = $rows[$videoCount];
                                            if (get_sub_field('title_prev')):
                                                $next_row_title = $next_row['title_prev'];
                                            endif;
                                        endif;
                                        ?>
                                        <div id="slider-<?php echo get_row_index(); ?>" class="slider-item slider-profissoes-item">
                                            <div class="blockquote-block home">
                                                <div class="grid-cont m-auto">
                                                    <blockquote class="blockquote reset">
                                                        <?php if (get_sub_field('slider_quote')): ?>
                                                            <q class="quote">
                                                                <?php the_sub_field('slider_quote') ?>
                                                            </q>
                                                        <?php endif;?>
                                                        <i class="quote-autor"><?php the_sub_field('slider_quote_autor') ?></i>
                                                    </blockquote>
                                                </div>
                                            </div>
                                            <div class="grid-cont">
                                                <div class="embed-container ">
                                                    <?php
                                                    $videoLink = get_sub_field('video_link');
                                                    $videoLink = str_replace('https:','',$videoLink);
                                                    $videoLink = str_replace('http:','',$videoLink);
                                                    ?>
                                                    <?php if(get_sub_field('video_link')): ?>
                                                        <iframe class="lazy" id="vimeoPlayer_<?php echo $videoCount; ?>"  data-src="<?php echo $videoLink; ?>?portrait=0&color=ffdf00&api=1&player_id=vimeoPlayer_<?php echo $videoCount; ?>" width="860" height="484" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if(get_sub_field('title_prev')): ?>
                                                    <p class="title-prev bg-yellow2"><?php the_sub_field('title_prev') ?></p>
                                                <?php endif; ?>
                                                <?php if ($next_row_title != ''): ?>
                                                    <p class="title-next bg-white">
                                                        <?php echo $next_row_title; ?>
                                                    </p>
                                                <?php endif;?>
                                                <div class="description">
                                                    <h3 class="subtitulo">
                                                        <?php the_sub_field('titulo');  ?>
                                                    </h3>
                                                    <div class="rectangle"></div>
                                                    <p class="texto">
                                                        <?php the_sub_field('descricao'); ?>
                                                    </p>
                                                </div>
                                                <div class="flex-container flex-centered pt-30">
                                                    <a class="btn-more no-route solid bg-white" href="/profissoes">
                                                        Profissões
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                wp_reset_query(); 
                                ?>
                            </div>
                        </div>
                        <div class="slider-controls left">
                            <div class="controls">
                                <div class="prev-btn">
                                    <svg class="svg-prev" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="12px" height="12px" viewBox="0 0 22 22" xml:space="preserve">
                                    <g>
                                        <path class="svg-prev-path" d="M16.249,22.001c-0.128,0-0.256-0.049-0.354-0.146l-10.5-10.5c-0.094-0.094-0.146-0.221-0.146-0.354
                                        s0.053-0.26,0.146-0.354l10.5-10.5c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707L6.456,11.001l10.146,10.146
                                        c0.195,0.195,0.195,0.512,0,0.707C16.505,21.952,16.377,22.001,16.249,22.001z" /></g>
                                    </svg>
                                </div>
                            </div>
                            <div class="indicator">
                                <div class="strip-display">
                                    <div class="strip">
                                        <p class="indicator-left current">1</p>
                                        <p class="indicator-left">2</p>
                                        <p class="indicator-left">3</p>
                                        <p class="indicator-left">4</p>
                                    </div>
                                </div>
                                <div class="separator">/</div>
                                <span class="total"></span>
                            </div>
                        </div>
                        <div class="slider-controls right">
                            <div class="controls">
                                <div class="next-btn">
                                    <svg class="svg-next" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="12px" height="12px" viewBox="0 0 22 22"  xml:space="preserve">
                                    <g>
                                        <path class="svg-next-path" d="M5.75,0c0.128,0,0.256,0.049,0.354,0.146l10.5,10.5c0.094,0.094,0.146,0.221,0.146,0.354
                                        s-0.053,0.26-0.146,0.354l-10.5,10.5c-0.195,0.195-0.512,0.195-0.707,0s-0.195-0.512,0-0.707L15.543,11L5.396,0.854
                                        c-0.195-0.195-0.195-0.512,0-0.707C5.494,0.049,5.622,0,5.75,0z" /></g>
                                    </svg>
                                </div>
                            </div>
                            <div class="indicator">
                                <div class="strip-display">
                                    <div class="strip" >
                                        <p class="indicator-right current">2</p>
                                        <p class="indicator-right">3</p>
                                        <p class="indicator-right">4</p>
                                        <p class="indicator-right">5</p>
                                    </div>
                                </div>
                                <div class="separator">/</div>
                                <span class="total"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    jQuery(document).ready(function( $ ) {
                        Edit.modules.collection.push({ type: 'homeMediaSlider', instance: new Edit.modules.homeMediaSlider('.media') });
                    });
                </script>
                <?php
                break;
                case 'slider':
                ?>
                <div class="slider flex media default <?php get_field('margem') == 'nenhuma' ? ' ' : the_field('margem') ?>">
                    <div class="wrapper">
                        <div class="pane-scroll">
                            <?php
                            if(have_rows('medias')):
                                $videoCount = 0;
                                while(have_rows('medias')):
                                    the_row();
                                    $videoCount++;
                                    ?>
                                    <div class="slider-item">
                                        <div class="delayed">
                                            <div class="background">
                                                <div class="img" draggable="false" style="background-image:url('<?php the_sub_field('imagem');?>')"></div>
                                            </div>
                                        </div>
                                        <div class="grid-cont">
                                            <div class="slider-description">
                                                <div class="square">
                                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                                        <g>
                                                            <defs>
                                                                <polygon id="SVGID_1_" points="90,0 35,0 0,0 0,20 0,90 35,90 35,20 90,20" />
                                                            </defs>
                                                            <clipPath id="SVGID_2_">
                                                                <use xlink:href="#SVGID_1_" overflow="visible" />
                                                            </clipPath>
                                                            <rect x="1.5" y="1.5" clip-path="url(#SVGID_2_)" fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" width="87" height="87" />
                                                        </g>
                                                    </svg>
                                                </div>
                                                <h2 class="title"><?php the_sub_field('titulo');  ?></h2>
                                                <h3 class="description"><?php the_sub_field('descricao');  ?></h3>
                                            </div>
                                            <div class="slider-media">
                                                <?php if(get_sub_field('video_link')): ?>
                                                    <iframe class="lazy" id="vimeoPlayer_<?php echo $videoCount; ?>" data-src="<?php the_sub_field('video_link');  ?>" width="860" height="484" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="slider-controls">
                        <div class="controls">
                            <div class="next-btn">
                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
                                    <path fill="#FFFFFF" d="M5.75,0c0.128,0,0.256,0.049,0.354,0.146l10.5,10.5c0.094,0.094,0.146,0.221,0.146,0.354
                                    s-0.053,0.26-0.146,0.354l-10.5,10.5c-0.195,0.195-0.512,0.195-0.707,0s-0.195-0.512,0-0.707L15.543,11L5.396,0.854
                                    c-0.195-0.195-0.195-0.512,0-0.707C5.494,0.049,5.622,0,5.75,0z" />
                                </svg>
                            </div>
                            <div class="separator"></div>
                            <div class="prev-btn">
                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
                                    <path fill="#FFFFFF" d="M16.249,22.001c-0.128,0-0.256-0.049-0.354-0.146l-10.5-10.5c-0.094-0.094-0.146-0.221-0.146-0.354
                                    s0.053-0.26,0.146-0.354l10.5-10.5c0.195-0.195,0.512-0.195,0.707,0s0.195,0.512,0,0.707L6.456,11.001l10.146,10.146
                                    c0.195,0.195,0.195,0.512,0,0.707C16.505,21.952,16.377,22.001,16.249,22.001z" />
                                </svg>
                            </div>
                        </div>
                        <div class="indicator">
                            <div class="strip-display">
                                <div class="strip" style="transform: matrix(1,0,0,1,0,-30)">
                                    <p>1</p>
                                    <p class="current">2</p>
                                    <p>3</p>
                                    <p>4</p>
                                </div>
                            </div>
                            <div class="separator">/</div>
                            <span class="total">4</span>
                        </div>
                    </div>
                    <script>
                        jQuery(document).ready(function( $ ) {
                            Edit.modules.collection.push({ type: 'homeMediaSlider', instance: new Edit.modules.homeMediaSlider('.media') });
                            function videoContainerAjust() {
                                var viewportWidth = jQuery(window).width();
                                if (viewportWidth > 860 && viewportWidth >= 748) {
                                    var width = jQuery(".slider .slider-item .slider-media iframe").width();
                                    var height = jQuery(".slider .slider-item .slider-media iframe").height();
                                    jQuery(".slider .slider-item .slider-media iframe").css("width", "calc(100% - 15%)");
                                }
                            }
                            videoContainerAjust();
                            $(window).resize(videoContainerAjust);
                        });
                    </script>
                </div>
                <?php
                break;
                case 'parceiros_pais':
                if(get_field('parceiros')):
                    if( have_rows('parceiros') ):
                        $pt = $es = $br = [];
                        while ( have_rows('parceiros') ) :
                            the_row();
                            $imageLogo = get_sub_field('logotipo');
                            $alt = $imageLogo['alt'];
                            if($imageLogo!= false):
                                $link = "";
                                if(get_sub_field('link')):
                                    $link = get_sub_field('link');
                                endif;
                                if(get_sub_field('pais')):
                                    $pais = get_sub_field('pais');
                                    if($pais == "Portugal"):
                                        $pt[] = array('image' => $imageLogo, 'link' => $link, 'alt' => $alt);
                                    elseif ($pais == "Espanha"):
                                        $es[] = array('image' => $imageLogo, 'link' => $link, 'alt' => $alt);
                                    else:
                                        $br[] = array('image' => $imageLogo, 'link' => $link, 'alt' => $alt);
                                    endif;
                                else:
                                    $pt[] = array('image' => $imageLogo, 'link' => $link, 'alt' => $alt);
                                endif;
                            endif;
                        endwhile;
                        ?>
                        <div class="partners-module <?php get_field('margem') == 'nenhuma' ? ' ' : the_field('margem') ?>">
                            <div class="grid-cont">
                                <h2 class="title">
                                    <?php the_field('titulo') ?>
                                </h2>
                                <p class="text">
                                    <?php the_field('description') ?>
                                </p>
                                <div class="wrapper mt-40">
                                    <?php if(LANGUAGE == 'PT') { ?>
                                        <input id="tab1" class="input-partners" type="radio" name="tabs" checked>
                                        <label class="label-partners" for="tab1">Portugal</label>
                                        <input id="tab2" class="input-partners" type="radio" name="tabs">
                                        <label class="label-partners" for="tab2">Espanha</label>
                                        <input id="tab-br" class="input-partners" type="radio" name="tabs">
                                        <label class="label-partners" for="tab-br">Brasil</label>
                                    <?php } else { ?>
                                        <input id="tab2" class="input-partners" type="radio" name="tabs" checked>
                                        <label class="label-partners" for="tab2">España</label>
                                        <input id="tab1" class="input-partners" type="radio" name="tabs">
                                        <label class="label-partners" for="tab1">Portugal</label>
                                        <input id="tab-br" class="input-partners" type="radio" name="tabs">
                                        <label class="label-partners" for="tab-br">Brasil</label>
                                    <?php } ?>
                                    <section id="partners-pt" class="section-partners">
                                        <?php
                                        $i = 0;
                                        foreach ($pt as $partner):
                                            $i++;
                                            ?>
                                            <div class="grid-1-8 <?php if($i >= 11){echo "mobile-item-hide-pt";}?>">
                                                <div class="partner-logo">
                                                    <?php if($partner['link'] != ""):?>
                                                        <a class="link" href="<?php echo $partner['link'] ?>" class="no-route" target="_blank">
                                                        <?php endif; ?>
                                                        <img class="lazy" width="<?php echo $partner['image']['width']; ?>" height="<?php echo $partner['image']['height']; ?>" alt="<?php echo $partner['image']['title']; ?>"
                                                        data-src="<?php echo $partner['image']['url'];?>"  />
                                                        <?php if($partner['link'] != ""):?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php if($i >= 11):?>
                                            <div class="load-mobile-item-hide-pt load-more-container js-loadmore margin-50">
                                                <div class="load-more-btn">
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                    <div class="inner">
                                                        <div class="border"></div>
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewbox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                                            <g>
                                                                <path d="M15,25c-1.104,0-2-0.995-2-2.223V7.223C13,5.995,13.896,5,15,5s2,0.995,2,2.223v15.555C17,24.005,16.104,25,15,25z" />
                                                                <path d="M22.777,17H7.223C5.995,17,5,16.104,5,15s0.995-2,2.223-2h15.555C24.005,13,25,13.896,25,15S24.005,17,22.777,17z" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="line"></div>
                                                </div>
                                                <script>
                                                    jQuery(".load-mobile-item-hide-pt").click(function () {
                                                        jQuery(".mobile-item-hide-pt").removeClass("mobile-item-hide-pt");
                                                        jQuery(".load-mobile-item-hide-pt").hide();
                                                    });
                                                </script>
                                            </div>
                                        <?php endif; ?>
                                    </section>
                                    <section id="partners-es" class="section-partners">
                                        <?php
                                        $i = 0;
                                        foreach ($es as $partner):
                                            $i++;
                                            ?>
                                            <div class="grid-1-8 <?php if($i >= 11){echo "mobile-item-hide-es";}?>">
                                                <div class="partner-logo">
                                                    <?php if($partner['link'] != ""):?>
                                                        <a class="link" href="<?php echo $partner['link'] ?>" class="no-route" target="_blank">
                                                        <?php endif; ?>
                                                        <img class="lazy" width="<?php echo $partner['image']['width']; ?>" height="<?php echo $partner['image']['height']; ?>" alt="<?php echo $partner['image']['title']; ?>"
                                                        data-src="<?php echo $partner['image']['url'];?>"  />
                                                        <?php if($partner['link'] != ""):?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php if($i >= 11):?>
                                            <div class="load-mobile-item-hide-es load-more-container js-loadmore margin-50">
                                                <div class="load-more-btn">
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                    <div class="line"></div>
                                                    <div class="inner">
                                                        <div class="border"></div>
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewbox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                                            <g>
                                                                <path d="M15,25c-1.104,0-2-0.995-2-2.223V7.223C13,5.995,13.896,5,15,5s2,0.995,2,2.223v15.555C17,24.005,16.104,25,15,25z" />
                                                                <path d="M22.777,17H7.223C5.995,17,5,16.104,5,15s0.995-2,2.223-2h15.555C24.005,13,25,13.896,25,15S24.005,17,22.777,17z" />
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="line"></div>
                                                </div>
                                                <script>
                                                    jQuery(".load-mobile-item-hide-es").click(function () {
                                                        jQuery(".mobile-item-hide-es").removeClass("mobile-item-hide-es");
                                                        jQuery(".load-mobile-item-hide-es").hide();
                                                    });
                                                </script>
                                            </div>
                                        <?php endif; ?>
                                    </section>
                                    <section id="partners-br" class="section-partners">
                                        <div class="grid-1-8>">
                                            <div class="partner-logo">
                                                <div class="partners-module">
                                                    <?php if (LANGUAGE == 'PT'){ ?>
                                                        <h2 class="title">BREVEMENTE</h2>
                                                    <?php } else {  ?>
                                                        <h2 class="title">Próximamente</h2>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                endif;
                break;
                case 'parceiros':
                if(get_field('parceiros')):
                    if( have_rows('parceiros') ):
                        $parceiro = array();
                        $parceiro_recrutamento = array();
                        while ( have_rows('parceiros') ) :
                            the_row();
                            $imageLogo = get_sub_field('logotipo');
                            $alt = $imageLogo['alt'];
                            if($imageLogo!= false){
                                $link = "";
                                if(get_sub_field('link')){
                                    $link = get_sub_field('link');
                                }
                                if(get_sub_field('tipo_de_parceiro')){
                                    $tipo_de_parceiro = get_sub_field('tipo_de_parceiro');
                                    if($tipo_de_parceiro == "parceiro"){
                                        $parceiro[] = array('image' => $imageLogo, 'link' => $link, 'alt' => $alt);
                                    }else{
                                        $parceiro_recrutamento[] = array('image' => $imageLogo, 'link' => $link, 'alt' => $alt);
                                    }
                                }else{
                                    $parceiro[] = array('image' => $imageLogo, 'link' => $link, 'alt' => $alt);
                                }
                            }
                        endwhile;
                        ?>
                        <div class="partners-module x2 <?php get_field('margem') == 'nenhuma' ? ' ' : the_field('margem') ?>">
                            <div class="grid-cont">
                                <h2 class="title"><?php the_field('titulo') ?></h2>
                                <p class="text"><?php the_field('description') ?></p>
                                <div class="wrapper mt-40">
                                    <input id="tab4" class="input-partners" type="radio" name="tabs2" checked>
                                    <label class="label-partners" for="tab4">Partners</label>
                                    <input id="tab3" class="input-partners" type="radio" name="tabs2">
                                    <label class="label-partners" for="tab3">Recruitment Partners</label>
                                    <section id="content3" class="section-partners2">
                                        <?php
                                        foreach ($parceiro_recrutamento as $partner):
                                            ?>
                                            <div class="grid-1-8">
                                                <div class="partner-logo">
                                                    <?php if($partner['link'] != ""):?>
                                                        <a class="link" href="<?php echo $partner['link'] ?>" class="no-route" target="_blank">
                                                        <?php endif; ?>
                                                        <img class="lazy" width="<?php echo $partner['image']['width']; ?>" height="<?php echo $partner['image']['height']; ?>" alt="<?php echo $partner['image']['title']; ?>"
                                                        data-src="<?php echo $partner['image']['url'];?>"  />
                                                        <?php if($partner['link'] != ""):?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </section>
                                    <section id="content4" class="section-partners2">
                                        <?php
                                        foreach ($parceiro as $partner):
                                            ?>
                                            <div class="grid-1-8">
                                                <div class="partner-logo">
                                                    <?php if($partner['link'] != ""):?>
                                                        <a class="link" href="<?php echo $partner['link'] ?>" class="no-route" target="_blank">
                                                        <?php endif; ?>
                                                        <img class="lazy" width="<?php echo $partner['image']['width']; ?>" height="<?php echo $partner['image']['height']; ?>" alt="<?php echo $partner['image']['title']; ?>"
                                                        data-src="<?php echo $partner['image']['url'];?>"  />
                                                        <?php if($partner['link'] != ""):?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                endif;
                break;
            endswitch;
            ?>
            <?php
        endforeach;
    endif;
    wp_reset_query(); 
    ?>

<script src="<?php echo bloginfo('template_url'); ?>/dist/js/intersection-observer-polyfill.js"></script>


    <script>
    // Listen to the Initialized event
    window.addEventListener('LazyLoad::Initialized', function (e) {
    // Get the instance and puts it in the lazyLoadInstance variable
    lazyLoadInstance = e.detail.instance;
    //console.log(lazyLoadInstance);
}, false);

    // Set the lazyload options for async usage
    lazyLoadOptions = {
        /* your lazyload options */
        elements_selector: ".lazy",
        threshold: 1000    
    };
</script>


<script  src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@10.19.0/dist/lazyload.min.js"></script>
