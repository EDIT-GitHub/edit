<?php
/**
 * The template for Artigos Relacionados
 *
 * @package Edit
 */

?>

 <!-- Artigos Relacionados MODULE -->
<div class="js-iso-module artigos-relacionados block-formacao-info gray o-hidden no-border">
    <div class="content">
        <h2>
            <?php if (get_field('titulo_artigos_relacionados')):
              the_field('titulo_artigos_relacionados');
              ?>
          <?php elseif (get_field('ingles')):
            echo "Related Articles";
        else:
         echo "<span class='box-shadow'>Temas</span><br><span class='box-shadow'>relacionados</span>";
     endif; ?>
 </h2>
</div>
<div class="grid-cont">
    <div class="grid-sizer"></div>
    <?php     
    $ordenacaoRelacionados = get_field('ordenacao_relacionados');                
    if(!($ordenacaoRelacionados == 'escolher')){
        $artigos = get_field('artigos_relacionados');
        if($artigos):
           foreach($artigos as $post): 
               setup_postdata($post);
               $tipo = get_post_type();
               switch($tipo){
                case 'noticias':
                $size = 'medium';
                if(get_field('tipo_destaque_homepage'))
                  $size = get_field('tipo_destaque_homepage');
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
            ?>
            <div class="iso-block news grid-1-2 block-<?php echo $size; ?>" data-old="block-<?php echo $size; ?>">
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
                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                  <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                              </svg>
                              <?php if(get_field('home_data')){
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
                                <img src="<?php bloginfo('template_url'); ?>/images/assets/svg/categorias/<?php the_field('tipo'); ?>.svg" />
                            </div>
                            <span class="icon-label"><?php the_field('tipo'); ?></span>
                        </div>
                    </div>
                    <div class="block-title">
                        <div>
                            <h2><?php the_field('home_titulo'); ?></h2>
                            <h3><?php the_field('home_subtitulo'); ?></h3>
                            <p><?php the_field('home_description'); ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
        break;
        case 'entrevista':
        $size = 'medium';
        if(get_field('tipo_destaque_homepage'))
            $size = get_field('tipo_destaque_homepage');
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
        ?>
        <div class="iso-block interview grid-1-2 block-<?php echo $size; ?>" data-old="block-<?php echo $size; ?>">
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
                            <svg version="1.0" id="Layer_1" preserveAspectRatio='xMinYMin' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 90 90" xml:space="preserve">
                                    <rect fill="transparent" width="30" height="30" stroke="#FFDF00" stroke-width="4" />
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
                                <h3><?php the_field('home_subtitulo'); ?></h3>
                                <p><?php the_field('home_description'); ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            break;
            case 'profissoes':
            $size = 'medium';
            if(get_field('tipo_destaque_homepage'))
                $size = get_field('tipo_destaque_homepage');
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
            ?>
            <div class="iso-block profissao grid-1-2 block-<?php echo $size; ?>" data-old="block-<?php echo $size; ?>">
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
                        <div class="block-title">
                            <div class="project-logo">
                                <img class="project-logo-image" src="<?php the_field('imagem'); ?>" />
                            </div>
                            <h2><?php the_field('home_titulo'); ?></h2>
                            <h3><?php the_field('home_subtitulo'); ?></h3>
                            <div class="hide">
                                <span class="button">
                                    <?php dictionary("button_saber_mais") ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
        break;
        case 'blog':
        $cssClassType = 'blog-clear-css';
        $icon = get_template_directory_uri() . '/images/assets/svg/categorias/noticias-blog.svg';
        $size = 'medium';
        if(get_field('tipo_destaque_homepage'))
            $size = get_field('tipo_destaque_homepage');
        $image = '';
        switch($size){
            case 'small':
            $image = get_field('home_image_small');
            break;
            case 'medium':
            $image = get_field('home_image');
            break;
            case 'full':
            if (get_field('imagem_blog_homepage_medium')):
                $image = get_field('imagem_blog_homepage_medium');
                $size = 'medium'; 
            elseif (get_field('imagem_blog_homepage_small')):
                $image = get_field('imagem_blog_homepage_small');
                $size = 'small'; 
            else:                 
                $image = get_field('home_image_big');
            endif;
            break;
        }
        ?>
        <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>">
            <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
                <div class="block-content">
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

                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
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
case 'formacao':

    //Tipo de formacao
$tipoFormacao = get_field('tipo_formacao');
$tipoFormacao =$tipoFormacao[0];
$tipoHorario = get_field('horario');
$tipoHorario =$tipoHorario[0];
$icon = get_field('icon',$tipoFormacao);
$cssClassType = get_field('class',$tipoFormacao);
    //End tipo de formacao

    //Localizacao
$localizacao = get_field('localizacao');
    $localizacao = $localizacao[0];//First
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
    $end = false;
    $dataInicio = get_field('home_data', false, false);
    if($dataInicio != false):
	$hoje = date('Ymd');
	if($hoje > $dataInicio):
		//Colocar data a definir e vagas disponíveis quando ultrapassa o dia atual
		$end = true;
	endif;
    endif;
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
                            <?php if(get_field('home_data') && !$end):
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
                                <?php if($icon != ''): ?>
                                    <img src="<?php echo $icon;?>" />
                                <?php endif; ?>
                            </div>
                            <span class="icon-label">
                                <?php echo $tipoFormacao->post_title; ?>
                            </span>
                            <span class="icon-label horario">
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
                            <p><?php echo $localizacao->post_title; ?></p>
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
    break;
}
endforeach;
wp_reset_postdata();
endif;
}else{

    $blocos = get_field('artigos_relacionados_com_tamanho');

    if($blocos):
        while ( have_rows('artigos_relacionados_com_tamanho') ) :
            the_row();

            $artigos = get_sub_field('artigo_relacionado');

            if(get_sub_field('tipo_destaque_homepage'))
             $size = get_sub_field('tipo_destaque_homepage');
         $image = '';
         $size = 'medium';
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

         foreach($artigos as $post): 
            setup_postdata($post);
            $tipo = get_post_type();

            switch($tipo){
                case 'noticias':
                ?>
                <div class="iso-block news grid-1-2 block-<?php echo $size; ?>" data-old="block-<?php echo $size; ?>">
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
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                    <g>
                                      <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                  </g>
                              </svg>
                              <?php if(get_field('home_data')){
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
                            <img src="<?php bloginfo('template_url'); ?>/images/assets/svg/categorias/<?php the_field('tipo'); ?>.svg" />
                        </div>
                        <span class="icon-label"><?php the_field('tipo'); ?></span>
                    </div>
                </div>
                <div class="block-title">
                    <div>
                        <h2><?php the_field('home_titulo'); ?></h2>
                        <h3><?php the_field('home_subtitulo'); ?></h3>
                        <p><?php the_field('home_description'); ?></p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php
    break;
    case 'entrevista':
    $size = 'medium';
    if(get_field('tipo_destaque_homepage'))
        $size = get_field('tipo_destaque_homepage');
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
    ?>
    <div class="iso-block interview grid-1-2 block-<?php echo $size; ?>" data-old="block-<?php echo $size; ?>">
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
                        <svg version="1.0" id="Layer_1" preserveAspectRatio='xMinYMin' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 90 90" xml:space="preserve">
                                <rect fill="transparent" width="30" height="30" stroke="#FFDF00" stroke-width="4" />
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
                            <h3><?php the_field('home_subtitulo'); ?></h3>
                            <p><?php the_field('home_description'); ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
        break;
        case 'formacao':

        //Tipo de formacao
        $tipoFormacao = get_field('tipo_formacao');
        $tipoFormacao =$tipoFormacao[0];//First
        $tipoHorario = get_field('horario');
        $tipoHorario =$tipoHorario[0];//First
        $icon = get_field('icon',$tipoFormacao);
        $cssClassType = get_field('class',$tipoFormacao);
        //End tipo de formacao
        
        //Localizacao
        $localizacao = get_field('localizacao');
        $localizacao = $localizacao[0];
        //End Localizacao

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

        ?>
        <div class="block-<?php echo $size; ?> iso-block <?php echo $cssClassType; ?> grid-1-2" data-old="block-<?php echo $size; ?>">
            <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>">
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
                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                    <g>
                                        <rect fill="transparent" width="90" height="90" stroke="#FFFFFF" stroke-width="4" />
                                    </g>
                                </svg>
                                <?php if(get_field('home_data' && !$end )){
                                  $date = DateTime::createFromFormat('Ymd', get_field('home_data'));
                                  ?>
                                  <p class="day"><?php echo $date->format('d'); ?></p>
                                  <p class="month"><?php echo $date->format('F'); ?></p>
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
                            <span class="icon-label">
                                <?php echo $tipoFormacao->post_title; ?>
                            </span>
                            <span class="icon-label horario">
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
                            <p><?php echo $localizacao->post_title; ?></p>
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
    break;
}
endforeach;
wp_reset_postdata();
endwhile;
endif;
}
?>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({ type: '', instance: new Edit.modules.isoModule('.artigos-relacionados') });

    })
</script>
</div>
