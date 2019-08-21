<?php
/**
* The template for Genericblocks
*
* @package Edit
*/
/* Helpers */
function richTextCustom($text){
// Act as external link
    $text = str_replace('<a',"<a class='no-route'",$text);
    
    //Retirar o dominio corrente
    //$text=  str_replace( home_url(), '', $text );
    
    //Custom bullets
    $text = str_replace('<li>',"<li><span>",$text);
    $text = str_replace('</li>',"</span></li>",$text);
    return $text;
}
?>
<?php
if(have_rows('blocos')):
    while ( have_rows('blocos') ) :
        the_row();
        ?>
        <?php
        if(have_rows('tipo_de_bloco')):
            while ( have_rows('tipo_de_bloco') ) :
                the_row();
                $template = get_row_layout();
                ?>
                <?php
                switch($template) {
                    case 'titulo':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="grid-cont">
                            <h1><?php the_sub_field('titulo'); ?></h1>
                        </div>
                    </div>
                    <?php
                    break;
                    case 'texto':
                    ?>
                    <div class="block-text text<?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="grid-cont">
                            <?php the_sub_field('texto'); ?>
                        </div>
                    </div>
                    <?php
                    break;
                    case 'subtitulo':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="grid-cont">
                            <h3><?php the_sub_field('subtitulo'); ?></h3>
                        </div>
                    </div>
                    <?php
                    break;
                    case 'subtitulo':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="grid-cont">
                            <h3><?php the_sub_field('subtitulo'); ?></h3>
                        </div>
                    </div>
                    <?php
                    break;
                    case 'texto_entrevista':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="grid-cont">
                            <?php
                            $line = get_sub_field('texto');
                            $line = richTextCustom($line);
                            ?>
                            <p><?php echo $line; ?></p>
                        </div>
                    </div>
                    <?php
                    break;
                    case 'data_autor_entrevista':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="grid-cont">
                            <p class="date">
                                <?php if(get_sub_field('data')):
                                    $date = DateTime::createFromFormat('Ymd', get_sub_field('data'));
                                    $month = strftime("%B", $date->getTimestamp());
                                    ?>
                                    <?php echo $date->format('d').' '.$month.' '.$date->format('y'); ?>
                                </p>
                            <?php endif; ?>
                            <p class="author"><?php the_sub_field('autor'); ?></p>
                        </div>
                    </div>
                    <?php
                    break;
                    case 'imagem':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>"">
                        <div class="grid-cont">
                            <img class="margin-100" src="<?php the_sub_field('imagem'); ?>" />
                        </div>
                    </div>
                    <?php
                    break;
                    case 'video':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="video-block margin-50">
                            <?php
                            $videoLink = get_sub_field('url_video');
                            $videoLink = str_replace('https:','',$videoLink);
                            $videoLink = str_replace('http:','',$videoLink);
                            $color = '';

                            if (strpos($videoLink, 'vimeo') > 0)
                                $color = '?color=ffdd00';
                            ?>
                            <iframe src="<?php echo $videoLink,$color; ?>" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                    </div>
                    <?php
                    break;
                    case 'iframe_video':
                    ?>
                    <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                        <div class="grid-cont">
                            <div class="video-block">
                                <?php
                                $videoUrl = get_sub_field('url_player');
                                $videoLink = get_sub_field('url_video');
                                ?>
                                <video style="width: 100%; height: 100%;" controls>
                                    <source src="<?php echo $videoUrl; echo $videoLink; ?>">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'blockquote':
                        ?>
                        <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont">
                                <blockquote>
                                    <img src="<?php bloginfo('template_url');?>/images/assets/svg/quotes-square.svg" />
                                    <p><?php the_sub_field('blockquote'); ?></p>
                                </blockquote>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'perguntas_respostas':
                        ?>
                        <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont">
                                <?php
                                if(have_rows('perguntas_respostas')){
                                    while ( have_rows('perguntas_respostas') ) {
                                        the_row();
                                        ?>
                                        <div class="q-a-block">
                                            <div class="question">
                                                <span class="id">E.</span>
                                                <div class="question-content">
                                                    <?php
                                                    $line = get_sub_field('pergunta');
                                                    $line = richTextCustom($line);
                                                    ?>
                                                    <p><?php echo $line; ?></p>
                                                </div>
                                            </div>
                                            <div class="answer">
                                                <span class="id"><?php the_sub_field('inicial_entrevistado'); ?></span>
                                                <div class="answer-content">
                                                    <?php
                                                    $line = get_sub_field('resposta');
                                                    $line = richTextCustom($line);
                                                    ?>
                                                    <?php echo $line; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'titulo_curso':
                        ?>
                        <div class="block-formacao-info <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont text">
                                <h2><?php the_sub_field("titulo"); ?></h2>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'subtitulo_curso':
                        ?>
                        <div class="block-formacao-info <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont text">
                                <p class="subtitle"><?php the_sub_field("subtitulo"); ?></p>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'texto_curso':
                        ?>
                        <div class="block-formacao-info <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont text">
                                <?php the_sub_field("texto"); ?>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'bloco_avatar_curso':
    //Tipo de formacao
                        $tipoFormacao = get_field('tipo_formacao');
                        $tipoFormacao =$tipoFormacao[0];
                        $icon = get_field('icon',$tipoFormacao);
                        $cssClassType = get_field('class',$tipoFormacao);
                        ?>
                        <div class="block-formacao-info curso <?php echo $cssClassType; ?> <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont big no-padding-bottom">
                                <div class="avatar">
                                    <img src="<?php the_sub_field('imagem'); ?>"/>
                                </div>
                                <div class="text">
                                    <span><img src="<?php bloginfo('template_url'); ?>/images/assets/svg/quotes.svg"/></span>
                                    <?php the_sub_field('comentario'); ?>
                                    <span><?php the_sub_field('cargo'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'conteudo_programatico':
                        get_template_part( 'partials/partial', 'conteudo-programatico');
                        break;
                        case 'conteudo_programatico':
                        get_template_part( 'partials/partial', 'conteudo-programatico');
                        break;
                        case 'certificacoes':
                        ?>
                        <div class="block-formacao-info <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont">
                                <div class="content-certificate">
                                    <div class="certificate-icon">
                                        <img src="<?php the_sub_field('icon'); ?>">
                                    </div>
                                    <div class="content">
                                        <h4><?php the_sub_field('titulo'); ?></h4>
                                        <p><?php the_sub_field('descricao'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'software_web_development':
                        ?>
                        <div class="block-formacao-info block-software">
                            <div class="grid-cont big margin-50" style="font-size: unset;">
                                <h3><?php the_sub_field('titulo'); ?></h3>
                                <?php $icones = get_sub_field('icones_web_development');
                                if( $icones ): ?>
                                    <ul class="list-software">
                                        <?php
                                        if( in_array('HTML5', $icones) ): ?>
                                            <li class="list-software-item">
                                                <a class="list-software-link" href="https://www.w3.org/html/" target="_blank">
                                                    <i class="software-icon devicon-html5-plain"></i>
                                                    <h3 class="software-title">HTML5</h3>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if( in_array('CSS3', $icones) ): ?>
                                            <li class="list-software-item">
                                                <a class="list-software-link" href="https://www.w3.org/Style/CSS/" target="_blank">
                                                    <i class="software-icon devicon-css3-plain"></i>
                                                    <h3 class="software-title">CSS3</h3> 
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php
                                        if( in_array('Javascript', $icones) ): ?>
                                            <li class="list-software-item">
                                                <a class="list-software-link" href="https://www.javascript.com/" target="_blank">
                                                    <i class="software-icon devicon-javascript-plain"></i>
                                                    <h3 class="software-title">Javascript</h3>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php
                                        if( in_array('Angular', $icones) ): ?>
                                            <li class="list-software-item">
                                                <a class="list-software-link" href="https://angular.io/" target="_blank">
                                                    <i class="software-icon devicon-angularjs-plain"></i>
                                                    <h3 class="software-title">Angular</h3></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php
                                            if( in_array('jQuery', $icones) ): ?>
                                                <li class="list-software-item">
                                                    <a class="list-software-link" href="https://jquery.com/" target="_blank">
                                                        <i class="software-icon devicon-jquery-plain"></i>
                                                        <h3 class="software-title">jQuery</h3>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php
                                            if( in_array('React', $icones) ): ?>
                                                <li class="list-software-item">
                                                    <a class="list-software-link" href="https://reactjs.org/" target="_blank">
                                                        <i class="software-icon devicon-react-plain"></i>
                                                        <h3 class="software-title">React</h3>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php
                                            if( in_array('UX-UI', $icones) ): ?>
                                                <li class="list-software-item">
                                                    <span class="list-software-link">
                                                        <i class="software-icon devicon-ux"></i>
                                                        <h3 class="software-title">UX</h3>
                                                    </span>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php
                                    $icones = get_sub_field('icones_ux_ui');
                                    if( $icones ): ?>
                                        <ul class="list-software">
                                            <?php if( in_array('Illustrator', $icones) ): ?>
                                                <li class="list-software-item">
                                                    <a class="list-software-link" href="https://www.adobe.com/pt/products/illustrator.html" target="_blank">
                                                        <i class="software-icon devicon-illustrator-plain"></i>
                                                        <h3 class="software-title">Illustrator</h3>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if( in_array('Photoshop', $icones) ): ?>
                                                <li class="list-software-item">
                                                    <a class="list-software-link" href="https://www.adobe.com/pt/products/photoshop.html" target="_blank">
                                                        <i class="software-icon devicon-photoshop-plain"></i>
                                                        <h3 class="software-title">Photoshop</h3>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if( in_array('Invision', $icones) ): ?>
                                                <li class="list-software-item">
                                                    <a class="list-software-link" href="https://www.invisionapp.com/" target="_blank">
                                                        <i class="software-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 2500 2500">
                                                              <path id="Rectangle-path" fill="#000" d="M0 0h2500v2500H0z"/>
                                                              <path id="Shape" fill="#fff" d="M835.5,786.6c83.1,0,152.7-65.1,152.7-150.5c0-85.3-69.6-150.4-152.7-150.4s-152.7,65.1-152.7,150.4
                                                              C682.8,721.4,752.4,786.6,835.5,786.6 M518.8,1592.4c-9,38.2-13.5,79.4-13.5,113c0,132.5,71.9,220.5,224.6,220.5
                                                              c126.7,0,229.3-75.2,303.3-196.7l-45.1,181.2h251.5l143.8-576.6c35.9-146,105.6-221.7,211.1-221.7c83.1,0,134.7,51.7,134.7,137
                                                              c0,24.7-2.2,51.6-11.2,80.8l-74.1,265c-11.2,38.2-15.7,76.4-15.7,112.3c0,125.8,74.1,217.8,229.1,217.8
                                                              c132.5,0,238.1-85.3,296.5-289.7l-98.8-38.1c-49.4,136.9-92.1,161.7-125.8,161.7c-33.7,0-51.7-22.4-51.7-67.3
                                                              c0-20.2,4.5-42.6,11.2-69.7l71.9-258.2c18-60.6,24.7-114.4,24.7-163.8c0-193.1-116.8-293.9-258.3-293.9
                                                              c-132.5,0-267.3,119.5-334.6,245.3l49.4-225.8h-384l-53.9,198.9h179.7l-110.6,443c-86.9,193.1-246.5,196.3-266.5,191.8
                                                              c-32.9-7.4-53.9-19.9-53.9-62.6c0-24.7,4.5-60.1,15.7-102.8l168.5-668.2H509.9L456,1124.5h177.4L518.8,1592.4" />
                                                          </svg>
                                                      </i>
                                                      <h3 class="software-title">Invision</h3>
                                                  </a>
                                              </li>
                                          <?php endif; ?>
                                          <?php if( in_array('Sketch', $icones) ): ?>
                                            <li class="list-software-item">
                                                <a class="list-software-link" href="https://www.sketchapp.com/" target="_blank">
                                                    <i class="software-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 2500 2500">
                                                            <path id="Rectangle-path" fill="#000" d="M0 0h2500v2500H0z"/>
                                                            <path id="Shape" fill="#fff" d="M1842.9 677.1l-291.4-128.2H947.3L657.6 679.5l-241 267.7L1250 2055.3l833.3-1108.1-240.4-270.1zm171 277.2l-263.5 197.2L1563 870.7l265.2-124.8 185.7 208.4zm-360.3 227.3H831l163.7-290.8 490.4 1.2 168.5 289.6zm-652.3-589.3h502l247.1 109-248.2 108.1h-502l-245.7-108 246.8-109.1zm-330 153.6L920 870.6 741.9 1146 485.5 954.3l185.8-208.4zm-90.2 353.6l162 136.6 385.5 634.3-547.5-770.9zm272.3 172.3h781.1L1250 1980.5l-396.6-708.7zm517.5 598.7l385.5-634.3 162-136.6-547.5 770.9z"/>
                                                        </svg>
                                                    </i>
                                                    <h3 class="software-title">Sketch</h3>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if( in_array('Marvel', $icones) ): ?>
                                            <li class="list-software-item">
                                                <a class="list-software-link" href="https://marvelapp.com/" target="_blank">
                                                    <i class="software-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 2500 2500">
                                                            <path id="Rectangle-path" fill="#000" d="M0 0h2500v2500H0z"/>
                                                            <path id="Shape" fill="#FFF" d="M1391.375 1028.38l70.757-70.82c20.46-20.486 39.97-38.483 58.428-53.878 18.457-15.401 36.914-31.267 55.377-47.724 40.986-34.866 74.823-59.501 101.497-73.887 26.614-14.34 52.28-21.549 76.892-21.549 34.831 0 66.128 12.852 93.803 38.484 27.682 25.684 41.517 54.947 41.517 87.748 0 24.629-6.672 49.789-19.99 75.433-13.356 25.691-37.43 61.095-72.282 106.21-159.931 209.359-239.9 344.825-239.9 406.397 0 26.7 13.317 40.03 39.978 40.03 20.48 0 43.068-8.716 67.68-26.182 24.591-17.406 56.365-47.718 95.342-90.815 20.466-22.564 45.608-53.36 75.346-92.362 29.712-38.975 55.848-74.896 78.437-107.756 22.549-32.815 41.523-55.425 56.903-67.727 15.38-12.32 33.306-18.475 53.826-18.475 20.48 0 37.921 7.21 52.28 21.536 14.332 14.386 21.534 31.851 21.534 52.351 0 39.015-17.966 90.828-53.826 155.474-35.892 64.653-82.568 130.846-139.949 198.578-71.791 86.202-145.082 152.932-219.905 200.112-74.875 47.206-143.026 70.826-204.531 70.826-57.44 0-104.58-19.012-141.495-56.958-36.914-37.96-55.357-86.693-55.357-146.24 0-30.796 2.546-60.039 7.686-87.748 5.1-27.716 12.78-56.428 23.06-86.208 10.24-29.734 24.611-61.566 43.068-95.442 18.457-33.87 42-71.298 70.737-112.37 2.023-4.09 7.17-12.315 15.387-24.63-53.355 41.087-106.113 92.88-158.406 155.482-52.28 62.62-105.098 143.16-158.4 241.675-38.983 65.708-68.72 109.297-89.2 130.845-20.52 21.556-46.126 32.323-76.886 32.323-32.828 0-59.98-11.777-81.514-35.396-21.534-23.58-32.291-52.83-32.291-87.755 0-22.551 2.54-44.637 7.68-66.193 5.1-21.542 15.877-50.791 32.31-87.734 10.22-28.725 23.538-60.04 39.979-93.915 16.387-33.85 30.759-60.033 43.061-78.494l58.435-101.603c4.086-4.09 10.24-14.34 18.457-30.79-41.045 32.861-81.023 70.33-119.953 112.37a2273.176 2273.176 0 0 0-112.26 130.86c-35.907 45.161-67.667 90.814-95.35 136.999-27.688 46.177-50.754 90.815-69.205 133.925-24.611 57.476-46.623 95.92-66.134 115.45-19.452 19.485-44.6 29.243-75.36 29.243-30.746 0-56.366-12.314-76.892-36.936-20.46-24.63-30.746-56.435-30.746-95.442 0-77.977 37.955-212.433 113.792-403.317 43.069-108.766 89.732-209.36 139.943-301.714 50.23-92.362 99.971-171.354 149.174-237.075 28.697-36.937 53.308-63.112 73.828-78.494C898.203 669.701 920.792 662 945.404 662c26.627 0 49.693 9.24 69.205 27.71 19.465 18.474 29.214 41.085 29.214 67.732 0 20.54-4.603 42.095-13.835 64.66-9.225 22.61-31.296 61.571-66.134 116.983a3144.815 3144.815 0 0 0-27.682 47.718c-12.303 21.555-27.682 48.793-46.126 81.594l-33.843 67.726c61.512-73.887 115.337-136.468 161.476-187.797 46.133-51.283 86.602-92.368 121.493-123.145 34.851-30.789 66.134-53.36 93.816-67.739 27.67-14.326 52.758-21.542 75.347-21.542 28.697 0 53.308 9.759 73.828 29.243 20.466 19.53 30.746 43.635 30.746 72.34 0 18.475-4.132 39.02-12.303 61.585-8.217 22.611-25.666 57.483-52.28 104.676l-64.59 116.998-24.604 46.177 36.894-40.017c36.914-38.975 68.694-71.835 95.349-98.522z"/>
                                                        </svg>
                                                    </i>
                                                    <h3 class="software-title">Marvel</h3>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if( in_array('Tobii', $icones) ): ?>
                                            <li class="list-software-item">
                                                <a class="list-software-link" href="https://www.tobii.com/" target="_blank">
                                                    <i class="software-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 2500 2500">
                                                            <path id="Rectangle-path" fill="#000" d="M0 0h2500v2500H0z"/>
                                                            <g id="logo-tobii-w" fill="#FFF" transform="translate(401 910)">
                                                                <path id="Shape" d="M1570.524 668.309V252.582h111.404v415.727zM1374.888 668.309V252.582h108.686v415.727zM622.232 347.683c-59.778 0-108.687 48.91-108.687 108.687 0 59.778 48.909 108.687 108.687 108.687 59.777 0 108.686-48.91 108.686-108.687 0-59.778-48.909-108.687-108.686-108.687m0 331.495c-122.273 0-220.091-97.818-220.091-220.091 0-122.273 97.818-220.09 220.09-220.09 122.273 0 220.091 97.817 220.091 220.09 0 122.273-97.818 220.09-220.09 220.09M1105.888 565.057h-38.04-2.718c-16.303-2.718-32.606-2.718-43.474-13.586-8.152-10.869-10.87-24.455-10.87-48.91v-54.343c0-62.495 40.758-92.383 100.536-92.383s100.535 46.191 100.535 108.686c-2.717 57.06-46.191 100.536-105.97 100.536m0-317.91h-16.302c-29.89 2.718-57.06 10.87-81.515 24.455v-144.01H899.383v410.293c0 124.99 67.93 141.293 141.293 141.293h67.929c122.273 0 211.94-92.384 211.94-214.657-2.718-124.99-89.667-217.373-214.657-217.373M307.04 671.026c-48.909 0-133.141 5.435-173.899-29.889C97.818 611.25 86.95 575.925 86.95 532.451V366.703H0V258.017h86.95V138.46h111.403v122.273h152.162V369.42H198.353V467.238c0 38.04-8.151 100.536 48.91 103.253h105.969v100.535H307.04zM1695.513 54.229c-10.868-38.04-51.626-62.495-89.666-51.626-27.172 8.151-40.758 27.171-54.343 43.474-10.87 13.586-19.02 24.455-32.607 29.89-16.303 2.716-27.171-2.718-43.474-8.152-19.02-8.152-40.758-19.02-67.93-10.869-38.04 8.152-62.494 48.91-54.343 86.95v5.434c10.869 38.04 51.626 62.495 89.667 51.626 29.889-8.152 43.474-27.172 54.343-43.475 10.869-13.586 16.303-24.454 32.606-29.889 16.303-2.717 27.172 2.718 43.475 8.152 19.02 8.151 38.04 19.02 67.93 10.869 38.04-8.152 62.494-48.91 54.342-86.95 2.718-2.717 2.718-2.717 0-5.434" />
                                                            </g>
                                                        </svg>
                                                    </i>
                                                    <h3 class="software-title">Tobii</h3>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'bloco_itens_curso':
                        ?>
                        <div class="block-formacao-info gray <?php the_sub_field('background_color'); ?> no-border o-hidden <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont margin-100 big">
                                <div class="content-columns">
                                    <div class="columns">
                                        <?php
                                        if(have_rows('itens')){
                                            while ( have_rows('itens') ) {
                                                the_row();
                                                ?>
                                                <div class="column">
                                                    <div class="column-icon">
                                                        <div class="icon icon-pdf"></div>
                                                    </div>
                                                    <h3><?php the_sub_field('titulo');?></h3>
                                                    <p>
                                                        <?php the_sub_field('texto');?>
                                                    </p>
                                                    <?php
                                                    $info = get_sub_field('mais_info');
                                                    if($info ){
                                                        $externo =  get_sub_field('tipo_link');
                                                        $link = get_sub_field('info_interno');
                                                        ?>
                                                        <a  class="btn-more" href="<?php echo $link; ?>" target="_blank" >
                                                            <div>
                                                                <?php the_sub_field('texto_mais_info'); ?>
                                                                <div class="btn-icon">
                                                                    <div class="inner">
                                                                        <div class="icon">
                                                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
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
                                                    <?php } ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                        case 'bloco_orientacao_curso':
                        ?>
                        <div class="block-formacao-info sopp o-hidden <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                            <div class="grid-cont big margin-100">
                                <div class="block-text-and-text">
                                    <div class="inner">
                                                    <!--   <div class="square">
                                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                                            <polygon fill="#f2d31f" points="35,0 0,0 0,20 0,90 22,90 22,87 3,87 3,3 87,3 87,20 90,20 90,0 "/>
                                                        </svg>-->
                                                    </div>
                                                    <div class="text block-medium">
                                                        <h3><?php the_sub_field('titulo');?></h3>
                                                        <h4><?php the_sub_field('subtitulo');?></h4>
                                                        <?php
                                                        $info = get_sub_field('mais_info');
                                                        if($info ){
                                                            ?>
                                                            <a class="btn-more no-route open-form marcacao" href="" target="_blank">
                                                                <div>
                                                                    <?php the_sub_field('texto_mais_info'); ?> <div class="btn-icon">
                                                                        <div class="inner">
                                                                            <div class="icon">
                                                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
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
                                                        <?php } ?>
                                                    </div>
                                                    <div class="text block-medium">
                                                        <p><?php the_sub_field('texto');?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case 'bloco_equipa_curso':
                                    ?>
                                    <!-- EQUIPA MODULE -->
                                    <div class="js-iso-module equipa filtered margin-top-50 margin-50 js-equipa <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                                        <div class="grid-cont margin-100">
                                            <div class="grid-sizer"></div>
                                            <div class="module-title stamp block-medium equipa filters">
                                                <div class="title-cont no-margin-top">
                                                    <h2><?php the_sub_field('titulo'); ?></h2>
                                                </div>
                                            </div>
                                            <?php
                                            $equipa = get_sub_field('elementos');
                                            ?>
                                            <?php
                                            if($equipa):
                                                foreach($equipa as $post):
                                                    setup_postdata($post);
                                                    $size = 'medium';
                                                    if(get_field('tamanho_imagem'))
                                                        $size = get_field('tamanho_imagem');
                                                    ?>
                                                    <div class="block-<?php echo $size; ?> iso-block team grid-1-2" data-old="block-<?php echo $size; ?>">
                                                        <?php if(get_field('link')):?>
                                                            <a href="<?php echo str_replace( home_url(), '', get_field('link') ); ?>" class="filter-linker no-route" target="_blank">
                                                            <?php endif;?>
                                                            <div class="block-content">
                                                                <?php if(get_field('foto')):
                                                                    $foto = get_field('foto');
                                                                    ?>
                                                                    <div class="image">
                                                                        <img alt="<?php echo $foto['alt']; ?>" draggable="false" src="<?php echo $foto['url']; ?>" />
                                                                        <?php
                                                                        if(get_field('link')):?>
                                                                            <div class="block-hover">
                                                                                <div class="border"></div>
                                                                                <div class="bg"></div>
                                                                            </div>
                                                                        <?php endif;?>
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="block-description">
                                                                    <div class="block-title">
                                                                        <h2><?php the_field('nome'); ?><br /><?php the_field('sobrenome'); ?></h2>
                                                                        <h3><?php the_field('cargo'); ?></h3>
                                                                        <p><?php the_field('descricao_elemento'); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if(get_field('link')):?>
                                                            </a>
                                                        <?php endif;?>
                                                    </div>
                                                    <?php
                                                endforeach;
                                                wp_reset_postdata();
                                            endif;
                                            ?>
                                        </div>
                                        <script>
                                            jQuery(document).ready(function( $ ) {
                                                Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-equipa') });
                                            })
                                        </script>
                                    </div>                                    
                                    <?php
                                    break;
                                    case 'bloco_stories_curso':
                                    ?>
                                    <!-- STORIES MODULE -->
                                    <div class="block-formacao-info <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                                        <div class="content" style="margin: 70px auto 80px;">
                                            <h2>
                                                <span class="box-shadow"><?php the_sub_field('titulo'); ?></span>
                                            </h2>
                                        </div>
                                         <!--SLIDER-->
                                         <div class="block-text-and-image">

                                        <div class="slider-program">

                                        <div class="slider-wrapper">
                                        <?php
                                            $stories = get_sub_field('entrevistas');

                                            if($stories):
                                                foreach($stories as $story):
                                                    
                                                    $link_story = get_permalink( $story->ID );
                                                    
                                                    if(get_field('fundo_header', $story->ID)){                                                       
                                                        $foto = get_field('fundo_header', $story->ID);                                                          
                                                    }

                                                    if(get_field('home_titulo', $story->ID)){                                                       
                                                        $name = get_field('home_titulo', $story->ID);
                                                    }
                                                    
                                                    if(get_field('alumni_stories', $story->ID)){                                                       
                                                        $story_subtitle = get_field('alumni_stories', $story->ID);                                                        
                                                    }
                                                    
                                                    echo '<div class="frame">
                                                    <div class="text">
                                                        <div class="block">
                                                            <h5 class="">'.$story_subtitle.'</h5>
                                                            <p>"';
                                                    if(get_field("blocos", $story->ID)){
                                               
                                                        $blocos_stories = get_field("blocos", $story->ID);
                                                                                                                                                              
                                                            foreach($blocos_stories as $blocos_storie){
                                                                $tipo_bloco =  $blocos_storie['tipo_de_bloco'];
                                                                    
                                                                foreach($tipo_bloco as $tipos_blocos){
                                                                    $block_quote = $tipos_blocos['blockquote'];    
                                                                    echo $block_quote;
                                                                }
                                                            }                                                        
                                                    }
                                                    echo '"</p>                                                            
                                                            <h4>'.$name.'</h4> 
                                                            <a class="btn-more" href="'.$link_story.'">ver entrevista
                                                                <div class="icon form-btn btn-icon">
                                                                    <div class="border"></div>
                                                                    <div class="inner">
                                                                        <div class="icon">
                                                                            <div class="submit-icon"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <a href="'.$link_story.'" class="image-link">     
                                                    <div class="image">                                                                                               
                                                        <div class="img" style="background-image:url('.$foto.');background-position: top right;"></div>                                                    
                                                        <div class="icon"><img src="https://edit.com.pt/wp-content/themes/edit/images/assets/svg/categorias/entrevista.svg" /></div> <!-- <?php echo $frame->icon ?> -->
                                                        <div class="block-hover">
                                                            <div class="border"></div>
                                                            <div class="bg"></div>
                                                        </div>
                                                    </div>
                                                    </a>                                                
                                                </div> ';
                                                endforeach;
                                            endif;
                                            
                                        ?>
                                           
                                        </div>

                                        <div class="button-prev"></div>
                                        <div class="button-next"></div>
                                        </div>
                                        </div>
                                        <!--end Slider-->
                                        
                                    </div>                                    
                                    <?php
                                    break;
                                    case 'titulo_noticias':
                                    ?>
                                    <div class="block-news-details <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                                        <h3><?php the_sub_field('titulo'); ?></h3>
                                    </div>
                                    <?php
                                    break;
                                    case 'texto_noticias':
                                    $linha = get_sub_field('texto');
                                    $linha = richTextCustom($linha);
                                    ?>
                                    <div class="block-news-details <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                                        <div class="block-text" >
                                            <?php echo $linha; ?>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case 'blockquote_noticias':
                                    ?>
                                    <div class="block-news-details <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                                        <div class="grid-cont">
                                            <blockquote class="margin-50">
                                                <img src="<?php bloginfo('template_url');?>/images/assets/svg/quotes-square.svg" />
                                                <p><?php the_sub_field('blockquote'); ?></p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case 'imagem_noticias':
                                    if(get_sub_field('imagem')):
                                        $imagem = get_sub_field('imagem');
                                    endif;
                                    ?>
                                    <div class="block-news-details <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                                        <img alt="<?php echo $imagem['alt']; ?>" draggable="false" src="<?php echo $imagem['url']; ?>" />
                                    </div>
                                    <?php
                                    break;
                                    case 'call_to_action':
                                    ?>
                                    <div class="block-news-details block-formacao-info margin-50">
                                        <div class="grid-cont big flex-container flex-centered">

                                         <?php
                                         $homeUrl = home_url();
                                         $callToAction = get_sub_field('call_to_action_url');
                                         $callToAction = str_replace($homeUrl,'',$callToAction);
                                         ?>

                                         <a class="btn-more" href="<?php echo $callToAction; ?>" >
                                            <div>
                                                <p class="reset">
                                                    <?php the_sub_field('call_to_action_texto'); ?>
                                                </p>
                                                <div class="btn-icon">
                                                    <div class="inner">
                                                        <div class="icon">
                                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                                                <g>
                                                                    <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                                                    C16.5,22.828,15.828,23.5,15,23.5z" />
                                                                    <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"/>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                break;
                                case 'bloco__schedule':
                                ?>
                                <!-- DETALHE PROGRAMA EVENTO MODULE -->
                                <div class="block-formacao-info programa evento js-programa">
                                    <div class="programa-content evento">
                                        <div class="grid-cont">
                                            <div class="intro">
                                                <h2><?php the_sub_field('titulo'); ?></h2>
                                                <h3><?php the_sub_field('subtitulo'); ?></h3>
                                                <p><?php the_sub_field('texto'); ?></p>
                                            </div>
                                            <?php
                                            if(have_rows('bloco_schedule')):
                                                $i=0;
                                                $alinhamento = 'right';
                                                while ( have_rows('bloco_schedule') ) :
                                                    the_row();
                                                    $i++;
                                                    if( $alinhamento == 'left'){
                                                        $alinhamento = 'right';
                                                    }else{
                                                        $alinhamento = 'left';
                                                    }
                                                    switch($alinhamento){
                                                        case 'left';?>
                                                        <div class="modulo left">
                                                            <div class="col graphics">
                                                                <div class="vertical-graph"></div>
                                                                <div class="num">
                                                                    <div class="ring"></div>
                                                                    <div class="ring-marked"></div>
                                                                    <div class="inner">
                                                                        <div class="icon">
                                                                            <img src="<?php the_sub_field('icon');?>" />
                                                                        </div>
                                                                        <p><?php the_sub_field('hora');?></p>
                                                                        <span><?php the_sub_field('label');?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col text">
                                                                <div class="vertical-graph"></div>
                                                                <div class="modulo-content">
                                                                    <?php
                                                                    if( have_rows('item') ):
                                                                        while ( have_rows('item') ) : the_row();
                                                                            $template = get_row_layout() ;
                                                                            switch($template):
                                                                                case 'titulo':?>
                                                                                <h3 class="title"><?php the_sub_field('titulo'); ?></h3>
                                                                                <?php
                                                                                break;
                                                                                case 'subtitulo':?>
                                                                                <h4><?php the_sub_field('subtitulo'); ?></h4>
                                                                                <?php
                                                                                break;
                                                                                case 'texto':?>
                                                                                <p class="summary"><?php the_sub_field('texto'); ?></p>
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
                                                        <div class="horiz-graph left">
                                                            <div class="corner"></div>
                                                            <div class="middle"></div>
                                                            <div class="corner"></div>
                                                        </div>
                                                        <?php
                                                        break;
                                                        case 'right';?>
                                                        <div class="modulo right">
                                                            <div class="col placeholder"></div>
                                                            <div class="col text">
                                                                <div class="vertical-graph"></div>
                                                                <div class="modulo-content">
                                                                    <?php
                                                                    if( have_rows('item') ):
                                                                        while ( have_rows('item') ) : the_row();
                                                                            $template = get_row_layout() ;
                                                                            switch($template):
                                                                                case 'titulo':?>
                                                                                <h3 class="title"><?php the_sub_field('titulo'); ?></h3>
                                                                                <?php
                                                                                break;
                                                                                case 'subtitulo':?>
                                                                                <h4><?php the_sub_field('subtitulo'); ?></h4>
                                                                                <?php
                                                                                break;
                                                                                case 'texto':?>
                                                                                <p class="summary"><?php the_sub_field('texto'); ?></p>
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
                                                                        <div class="icon">
                                                                            <img src="<?php the_sub_field('icon');?>" />
                                                                        </div>
                                                                        <p><?php the_sub_field('hora');?></p>
                                                                        <span><?php the_sub_field('label');?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="horiz-graph right">
                                                            <div class="corner"></div>
                                                            <div class="middle"></div>
                                                            <div class="corner"></div>
                                                        </div>
                                                        <?php
                                                        break;
                                                    }
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <script>
                                        jQuery(document).ready(function( $ ) {
                                            Edit.modules.collection.push({type:'courseProgram',instance:new Edit.modules.courseProgram('.js-programa')});
                                        })
                                    </script>
                                </div>
                                <!-- END CONTEUDO PROGRAMATICO MODULE -->
                                <?php
                                break;
                                case 'bloco_agencia':
                                ?>
                                <div class="block-formacao-agencia block-text-and-image margin-100" style="background-image:url('<?php the_sub_field('imagem_fundo') ?>'); background-color: #000;">
                                    <div class="img-overlay">
                                    </div>
                                    <div class="grid-cont">
                                        <div class="inner">
                                            <div class="text block-medium">
                                                <h3><?php the_sub_field('titulo'); ?></h3>
                                                <?php the_sub_field('sub_titulo'); ?>
                                                <p><?php the_sub_field('texto'); ?></p>
                                            </div>
                                            <div class="image block-medium">
                                                <?php if(get_sub_field('link_agencia')):
                                                    $url = get_sub_field('link_agencia');?>
                                                    <a href="<?php echo $url; ?>" class="filter-linker no-route" target="_blank">
                                                    <?php endif;?>
                                                    <div class="block-content">
                                                        <?php if(get_sub_field('imagem')):
                                                            $image = get_sub_field('imagem'); ?>
                                                            <div class="image">
                                                                <img draggable="false" src="<?php echo $image['url']; ?>" />
                                                                <?php if(get_sub_field('link_agencia')):?>
                                                                    <div class="block-hover">
                                                                        <div class="border"></div>
                                                                        <div class="bg"></div>
                                                                    </div>
                                                                <?php endif;?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                break;
                                case 'titulo_evento':
                                ?>
                                <div class="block-text <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
                                    <div class="grid-cont">
                                        <h3><?php the_sub_field('titulo'); ?></h3>
                                    </div>
                                </div>
                                <?php
                                break;
                                case 'parceiros_evento':
                                ?>
                                <!-- PARTNERS MODULE -->
                                <div class="partners-module partners--evento">
                                    <div class="grid-cont">
                                        <div class="module-title partners">
                                            <div class="square">
                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
                                                        <rect fill="transparent" width="40" height="40" stroke="#919191" stroke-width="4" />
                                                    </svg>
                                                    <h2 class="title">PARTNERS</h2>
                                                </div>
                                                <span class="text"><?php the_sub_field('texto'); ?></span>
                                            </div>
                                            <?php
                                            if( have_rows('parceiros') ):
                                                while ( have_rows('parceiros') ) :
                                                    the_row();
                                                    ?>
                                                    <div class="grid-1-8">
                                                        <div class="partner-logo">
                                                            <a class="link" href="<?php the_sub_field('link'); ?>" class="no-route" target="_blank">
                                                                <img class="partners__logo-img" src="<?php the_sub_field('logo'); ?>">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <!-- END PARTNERS MODULE -->
                                    <?php
                                    break;
                                        //projecto 360
                                    case 'text-right':
                                    ?>
                                    <!-- Bloco imagem full - texto direita -->
                                    <div class="block-text-and-full-background text-right" style="background-image:url(<?php the_sub_field('imagem'); ?>)">
                                        <div class="grid-cont">
                                            <div class="inner">
                                                <div class="text block-medium">
                                                    <h3><?php the_sub_field('titulo'); ?></h3>
                                                    <h4><?php the_sub_field('sub_titulo'); ?></h4>
                                                    <p><?php the_sub_field('texto'); ?></p>
                                                    <?php
                                                    if (get_sub_field('tem_link') == 'true'):
                                                        ?>
                                                        <div class="btn-white-black margin-100">
                                                            <span class="label"><?php the_sub_field('button_title'); ?></span>
                                                        </div>
                                                        <?php
                                                    endif;
                                                    ?>
                                                </div>
                                                <div class="mobile-image">
                                                    <img src="<?php the_sub_field('imagem_smartphone'); ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Bloco imagem full - texto direita -->
                                    <?php
                                    break;
                                    case 'text-left':
                                    ?>
                                    <!-- Bloco imagem full - texto esquerda -->
                                    <div class="block-text-and-full-background text-left" style="background-image:url(<?php the_sub_field('imagem'); ?>)">
                                        <div class="grid-cont">
                                            <div class="inner">
                                                <div class="text block-medium">
                                                    <h3><?php the_sub_field('titulo'); ?></h3>
                                                    <h4><?php the_sub_field('sub_titulo'); ?></h4>
                                                    <p><?php the_sub_field('texto'); ?></p>
                                                    <?php
                                                    if (get_sub_field('tem_link') == 'true'):
                                                        ?>
                                                        <div class="btn-white-black margin-100">
                                                            <span class="label"><?php the_sub_field('button_title'); ?></span>
                                                        </div>
                                                        <?php
                                                    endif;
                                                    ?>
                                                </div>
                                                <div class="mobile-image">
                                                    -                                <img src="<?php the_sub_field('imagem_smartphone'); ?>" />
                                                -                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Bloco imagem full - texto esquerda -->
                                    <?php
                                    break;
                                    case 'text-left_text-top':
                                    ?>
                                    <!-- Bloco imagem full - texto top -->
                                    <div class="block-text-and-full-background text-left text-top" style="background-image:url(<?php the_sub_field('imagem'); ?>)">
                                        <div class="grid-cont">
                                            <div class="inner">
                                                <div class="text block-medium">
                                                    <h3><?php the_sub_field('titulo'); ?></h3>
                                                    <h4><?php the_sub_field('sub_titulo'); ?></h4>
                                                    <p><?php the_sub_field('texto'); ?></p>
                                                    <?php
                                                    if (get_sub_field('tem_link') == 'true'):
                                                        ?>
                                                        <div class="btn-white-black margin-100">
                                                            <span class="label"><?php the_sub_field('button_title'); ?></span>
                                                        </div>
                                                        <?php
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Bloco imagem full - texto top -->
                                    <?php
                                    break;
                                    case 'text-left_text-bottom':
                                    ?>
                                    <!-- Bloco imagem full - texto bottom -->
                                    <div class="block-text-and-full-background text-left text-bottom" style="background-image:url(<?php the_sub_field('imagem'); ?>)">
                                        <div class="grid-cont">
                                            <div class="inner">
                                                <div class="text block-medium">
                                                    <h3><?php the_sub_field('titulo'); ?></h3>
                                                    <h4><?php the_sub_field('sub_titulo'); ?></h4>
                                                    <p><?php the_sub_field('texto'); ?></p>
                                                    <?php
                                                    if (get_sub_field('tem_link') == 'true'):
                                                        ?>
                                                        <div class="btn-white-black margin-100">
                                                            <span class="label"><?php the_sub_field('button_title'); ?></span>
                                                        </div>
                                                        <?php
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Bloco imagem full - texto bottom -->
                                    <?php
                                    break;
                                    case 'elementos_em_lista_a_direita':
                                    ?>
                                    <!-- Bloco imagem esquerda - elementos em lista a direita -->
                                    <div class="block-text-and-full-background text-right" style="background-image:url(<?php the_sub_field('imagem'); ?>)">
                                        <div class="grid-cont">
                                            <div class="inner">
                                                <div class="flex block-medium">
                                                    <h3 style="text-align: right; font-size: 50px;"><?php the_sub_field('titulo_second'); ?></h3>
                                                    <?php
                                                    if(have_rows('itens')):
                                                        while ( have_rows('itens') ) :
                                                            the_row();
                                                            ?>
                                                            <div class="block-icon-text" style=" margin-bottom: 50px;">
                                                                <!--<img src="<?php the_sub_field('icon'); ?>" alt="icon clipper"/>-->
                                                                <h4 style="text-align: right; line-height: 15px; color: #6e6e6e;"><?php the_sub_field('titulo'); ?></h4>
                                                                <p style="text-align: right;"><?php the_sub_field('texto'); ?></p>
                                                                <?php
                                                                if (get_sub_field('tem_link') == 'true'):
                                                                    ?>
                                                                    <div class="btn-white-black margin-100">
                                                                        <span class="label"><?php the_sub_field('button_title'); ?></span>
                                                                    </div>
                                                                    <?php
                                                                endif;
                                                                ?>
                                                            </div>
                                                            <?php
                                                        endwhile;
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Bloco imagem esquerda - elementos em lista a direita -->
                                    <?php
                                    break;
                                    case 'block-image':
                                    ?>
                                    <!-- Bloco imagem singular-->
                                    <div class="block-image">
                                        <div class="grid-cont">
                                            <div class="image">
                                                <img src="<?php the_sub_field('imagem'); ?>" alt="projecto 360" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Bloco imagem singular-->
                                    <?php
                                    break;
                                    case 'block-editors-comments':
                                    ?>
                                    <!-- END Bloco imagem singular-->
                                    <div class="block-editors-comments">
                                        <div class="grid-cont">
                                            <div class="inner">
                                                <?php
                                                if(have_rows('itens')):
                                                    while ( have_rows('itens') ) :
                                                        the_row();
                                                        ?>
                                                        <div class="block-editors-comments-item <?php the_sub_field('size'); ?>">
                                                            <div class="line top"></div>
                                                            <div class="line bottom"></div>
                                                            <div class="image">
                                                                <img src="<?php the_sub_field('image'); ?>" alt="director 190" />
                                                            </div>
                                                            <div class="content">
                                                                <p><?php the_sub_field('texto'); ?></p>
                                                                <h6><?php the_sub_field('editor'); ?></h6>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    break;
                                    case 'block-map-eventos':
                                    ?>
                                    <!-- MAP MODULE -->
                                    <div class="gmaps-module evento">
                                        <div id="directions-interface">
                                            <input type="text" id="directions-input" name="directions-input" placeholder="<?php dictionary("Onde_estou") ?>" />
                                            <div class="directions-btn btn-icon">
                                                <div class="inner">
                                                    <div class="icon">
                                                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                                        <path d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                                                        c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                                                        c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map-canvas">
                                    </div>
                                    <div class="map-nav">
                                        <div class="grid-cont">
                                            <div class="grid-1-2">
                                                <div data-location="" class="map-block block-medium">
                                                    <div class="block-content">
                                                        <div class="block-description">
                                                            <span class="location"><?php the_sub_field('detalhe_local'); ?></span>
                                                            <h3 class="location-name"><?php the_sub_field('local'); ?></h3>
                                                            <p class="location-address"><?php the_sub_field('morada'); ?></p>
                                                            <p class="location-address-details"><?php the_sub_field('detalhe_morada'); ?></p>
                                                            <?php if(LANGUAGE == 'PT'): ?>
                                                                <a class="location-link no-route" href="tel:+351<?php the_sub_field('telefone'); ?>">(+ 351) <?php the_sub_field('telefone'); ?></a>
                                                                <?php else: ?>
                                                                    <a class="location-link no-route" href="tel:+34<?php the_sub_field('telefone'); ?>">(+ 34) <?php the_sub_field('telefone'); ?></a>
                                                                <?php endif; ?>
                                                                <a class="location-link no-route" href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            jQuery(document).ready(function( $ ) {
                                                <?php
                                                $location = get_sub_field('pick_local');
                                                if( !empty($location) ): ?>
                                                    Edit.modules.collection.push({ type: 'mapModule', instance: new Edit.modules.mapModule('.js-map-module', [{ id: 1, location: { lat: "<?php echo $location['lat']; ?>", lng: "<?php echo $location['lng']; ?>" } }]) })
                                                <?php endif;
                                                ?>
                                            })
                                        </script>
                                    </div>
                                    <!-- END MAP MODULE -->
                                    <?php
                                    break;
                                    case 'block-ofertas-tags':
                                    if(have_rows('ofertas') || have_rows('tags')): ?>
                                        <div class="block-news-details yellow">
                                            <div class="bg"></div>
                                            <div class="block-formacao-info o-hidden ">
                                                <div class="grid-cont big">
                                                    <div class="content-columns">
                                                        <div class="columns ofertas">
                                                            <?php
                                                            if(have_rows('ofertas')):
                                                                while ( have_rows('ofertas') ) :
                                                                    the_row();
                                                                    ?>
                                                                    <div class="column">
                                                                        <div class="image">
                                                                            <img src="<?php the_sub_field('imagem'); ?>" />
                                                                        </div>
                                                                        <h3><?php the_sub_field('titulo'); ?></h3>
                                                                        <p>
                                                                            <?php the_sub_field('texto'); ?>
                                                                        </p>
                                                                        <?php
                                                                        $info = get_sub_field('mais_info');
                                                                        if($info ){
                                                                            ?>
                                                                            <a href="<?php the_sub_field('info'); ?>" class="no-route" target="_blank">
                                                                                <div class="btn-more">
                                                                                    <?php dictionary("Mais_info") ?> <div class="btn-icon">
                                                                                        <div class="inner">
                                                                                            <div class="icon">
                                                                                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
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
                                                                        <?php } ?>
                                                                    </div>
                                                                    <?php
                                                                endwhile;
                                                            endif;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid-cont">
                                                <div class="tags">
                                                    <?php
                                                    if(have_rows('tags')):
                                                        while ( have_rows('tags') ) :
                                                            the_row();
                                                            ?>
                                                            <div class="tag"><span></span><?php the_sub_field('tag'); ?></div>
                                                            <?php
                                                        endwhile;
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                    break;
                                    case 'entrevista-social':
                                    ?>
                                    <div class="block-text margin-top-50">
                                        <div class="grid-cont">
                                            <div class="social-links-block">
                                                <?php if(get_field('ingles')): ?>
                                                    <p>View profile</p>
                                                    <?php else: ?>
                                                        <p>Ver Perfil</p>
                                                    <?php endif; ?>
                                                    <ul>
                                                        <?php
                                                        if(have_rows('itens')):
                                                            while ( have_rows('itens') ) :
                                                                the_row();
                                                                ?>
                                                                <li class="margin-20">
                                                                    <a class="<?php the_sub_field('tipo'); ?>" href="<?php the_sub_field('link'); ?>" target="_blank">
                                                                        <div class="icon" >
                                                                            <?php
                                                                            $tipo = get_sub_field('tipo');
                                                                            switch($tipo){
                                                                                case 'linkedin':
                                                                                ?>
                                                                                <svg xml:space="preserve" enable-background="new 0 0 34 34" viewBox="0 0 34 34" height="34px" width="34px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                    <path d="M25.5,24.65h-3.76v-5.38c0-1.41-0.58-2.37-1.881-2.37
                                                                                    c-0.989,0-1.539,0.649-1.789,1.28c-0.1,0.22-0.08,0.529-0.08,0.85v5.62h-3.73c0,0,0.05-9.53,0-10.391h3.73v1.63
                                                                                    c0.22-0.72,1.41-1.729,3.31-1.729c2.351,0,4.2,1.49,4.2,4.71V24.65z M10.5,12.96h-0.02c-1.2,0-1.98-0.8-1.98-1.81
                                                                                    c0-1.021,0.8-1.801,2.02-1.801c1.23,0,1.98,0.78,2,1.801C12.52,12.16,11.75,12.96,10.5,12.96z M12.24,24.65H8.93V14.26h3.31V24.65z" fill="#cccccc" clip-rule="evenodd" fill-rule="evenodd"/>
                                                                                </svg>
                                                                                <?php
                                                                                break;
                                                                                case 'facebook':
                                                                                ?>
                                                                                <svg xml:space="preserve" enable-background="new 0 0 34 34" viewBox="0 0 34 34" height="34px" width="34px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                    <path d="M12.75,14.12h1.82v-1.71c0-0.75,0.02-1.91,0.59-2.63c0.6-0.76,1.41-1.28,2.82-1.28
                                                                                    c2.299,0,3.27,0.32,3.27,0.32l-0.46,2.6c0,0-0.75-0.21-1.46-0.21s-1.35,0.24-1.35,0.93v1.98h2.911l-0.201,2.55H17.98v8.83h-3.41
                                                                                    v-8.83h-1.82V14.12z" fill="#cccccc"/>
                                                                                </svg>
                                                                                <?php
                                                                                break;
                                                                                case 'twitter':
                                                                                ?>
                                                                                <svg xml:space="preserve" enable-background="new 0 0 34 34" viewBox="0 0 34 34" height="34px" width="34px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                    <path d="M25.5,11.81c-0.629,0.27-1.301,0.46-2,0.54c0.721-0.42,1.27-1.1,1.529-1.9c-0.67,0.4-1.42,0.68-2.219,0.83
                                                                                    c-0.631-0.66-1.541-1.08-2.541-1.08c-1.93,0-3.49,1.54-3.49,3.43c0,0.27,0.03,0.53,0.09,0.79c-2.9-0.15-5.47-1.51-7.19-3.59
                                                                                    c-0.3,0.51-0.47,1.1-0.47,1.73c0,1.18,0.62,2.24,1.55,2.85c-0.57-0.01-1.11-0.17-1.58-0.43v0.05c0,1.66,1.2,3.05,2.8,3.361
                                                                                    c-0.29,0.08-0.6,0.119-0.92,0.119c-0.22,0-0.44-0.02-0.65-0.06c0.44,1.36,1.73,2.36,3.25,2.39c-1.19,0.92-2.69,1.46-4.33,1.46
                                                                                    c-0.28,0-0.56-0.01-0.83-0.04c1.54,0.971,3.38,1.54,5.35,1.54c6.41,0,9.919-5.229,9.919-9.77l-0.01-0.44
                                                                                    C24.439,13.1,25.029,12.5,25.5,11.81z" fill="#cccccc"/>
                                                                                </svg>
                                                                                <?php
                                                                                break;
                                                                                case 'vimeo':
                                                                                ?>
                                                                                <svg xml:space="preserve" enable-background="new 0 0 34 34" viewBox="0 0 34 34" height="34px" width="34px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                    <path d="M24.222,13.651c-0.069,1.4-1.049,3.32-2.949,5.76
                                                                                    c-1.971,2.55-3.63,3.83-4.991,3.83c-0.84,0-1.56-0.78-2.14-2.34l-1.17-4.27c-0.43-1.56-0.89-2.34-1.39-2.34
                                                                                    c-0.11,0-0.48,0.23-1.13,0.68l-0.68-0.87c0.71-0.63,1.41-1.25,2.1-1.88c0.95-0.82,1.67-1.25,2.14-1.3c1.12-0.1,1.82,0.66,2.08,2.3
                                                                                    c0.27,1.78,0.47,2.88,0.58,3.31c0.32,1.471,0.68,2.2,1.07,2.2c0.3,0,0.75-0.47,1.361-1.42c0.6-0.95,0.93-1.68,0.97-2.17
                                                                                    c0.091-0.82-0.239-1.23-0.97-1.23c-0.35,0-0.7,0.07-1.07,0.22c0.71-2.31,2.07-3.43,4.08-3.37
                                                                                    C23.603,10.812,24.302,11.771,24.222,13.651z" fill="#cccccc" clip-rule="evenodd" fill-rule="evenodd"/>
                                                                                </svg>
                                                                                <?php
                                                                                break;
                                                                                case 'youtube':
                                                                                ?>
                                                                                <svg xml:space="preserve" enable-background="new 0 0 34 34" viewBox="0 0 34 34" height="34px" width="34px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                    <path d="M25.5,20.04v-6.08c0,0,0-2.931-2.93-2.931H11.43
                                                                                    c0,0-2.93,0-2.93,2.931v6.08c0,0,0,2.931,2.93,2.931h11.14C22.57,22.971,25.5,22.971,25.5,20.04z M20.3,17.01l-5.57,3.27V13.74
                                                                                    L20.3,17.01z" fill="#cccccc" clip-rule="evenodd" fill-rule="evenodd"/>
                                                                                </svg>
                                                                                <?php
                                                                                break;
                                                                                case 'instagram':
                                                                                ?>
                                                                                <svg xml:space="preserve" enable-background="new 0 0 34 34" viewBox="0 0 34 34" height="34px" width="34px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                    <path d="M23.85,22.21c0,0.899-0.729,1.63-1.629,1.63H11.79
                                                                                    c-0.9,0-1.63-0.73-1.63-1.63v-6.95h2.54c-0.22,0.53-0.35,1.12-0.35,1.74c0,2.561,2.09,4.65,4.65,4.65c2.57,0,4.65-2.09,4.65-4.65
                                                                                    c0-0.62-0.121-1.21-0.34-1.74h2.539V22.21z M14.58,15.26C15.12,14.5,16,14.01,17,14.01s1.88,0.49,2.43,1.25
                                                                                    c0.35,0.49,0.561,1.09,0.561,1.74c0,1.65-1.34,2.99-2.99,2.99c-1.65,0-2.99-1.34-2.99-2.99C14.01,16.35,14.22,15.75,14.58,15.26z
                                                                                    M23.16,10.46h0.38v0.37v2.51l-2.88,0.01l-0.01-2.88L23.16,10.46z M22.221,8.5H11.79c-1.81,0-3.29,1.47-3.29,3.29v3.47v6.95
                                                                                    c0,1.819,1.48,3.29,3.29,3.29h10.431c1.809,0,3.279-1.471,3.279-3.29v-6.95v-3.47C25.5,9.97,24.029,8.5,22.221,8.5z" fill="#cccccc" clip-rule="evenodd" fill-rule="evenodd"/>
                                                                                </svg>
                                                                                /*DAQUI*/
                                                                                <?php
                                                                                break;
                                                                                case 'behance':
                                                                                ?>
                                                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                                width="430.123px" height="430.123px" viewBox="0 0 430.123 430.123" style="enable-background:new 0 0 430.123 430.123;"
                                                                                xml:space="preserve">
                                                                                <g>
                                                                                    <path id="Behance" d="M388.432,119.12H280.659V92.35h107.782v26.77H388.432z M208.912,228.895
                                                                                    c6.954,10.771,10.429,23.849,10.429,39.203c0,15.878-3.918,30.122-11.889,42.704c-5.071,8.326-11.367,15.359-18.932,21.021
                                                                                    c-8.52,6.548-18.607,11.038-30.203,13.437c-11.633,2.403-24.224,3.617-37.787,3.617H0V81.247h129.25
                                                                                    c32.579,0.53,55.676,9.969,69.315,28.506c8.184,11.369,12.239,25.011,12.239,40.868c0,16.362-4.104,29.454-12.368,39.401
                                                                                    c-4.597,5.577-11.388,10.65-20.378,15.229C191.675,210.236,202.007,218.086,208.912,228.895z M61.722,186.76h56.632
                                                                                    c11.638,0,21.046-2.212,28.292-6.634c7.241-4.415,10.854-12.263,10.854-23.531c0-12.449-4.784-20.712-14.375-24.689
                                                                                    c-8.244-2.763-18.792-4.186-31.591-4.186H61.722V186.76z M162.953,264.275c0-13.902-5.682-23.513-17.023-28.67
                                                                                    c-6.342-2.931-15.29-4.429-26.763-4.536H61.722v71.322h56.556c11.619,0,20.612-1.521,27.102-4.694
                                                                                    C157.084,291.863,162.953,280.76,162.953,264.275z M428.419,220.736c1.302,8.756,1.891,21.46,1.652,38.065H290.493
                                                                                    c0.77,19.266,7.421,32.739,20.035,40.449c7.607,4.835,16.83,7.196,27.63,7.196c11.388,0,20.67-2.879,27.815-8.797
                                                                                    c3.893-3.137,7.327-7.565,10.296-13.152h51.16c-1.34,11.379-7.5,22.92-18.57,34.648c-17.151,18.641-41.205,27.988-72.097,27.988
                                                                                    c-25.52,0-48.011-7.883-67.533-23.592C249.772,307.777,240,282.211,240,246.746c0-33.257,8.773-58.712,26.378-76.43
                                                                                    c17.67-17.751,40.474-26.586,68.583-26.586c16.661,0,31.68,2.978,45.079,8.965c13.357,5.993,24.396,15.425,33.09,28.388
                                                                                    C420.998,192.499,426.058,205.699,428.419,220.736z M378.062,225.73c-0.938-13.322-5.386-23.405-13.395-30.296
                                                                                    c-7.943-6.91-17.866-10.379-29.706-10.379c-12.886,0-22.836,3.708-29.906,10.996c-7.118,7.273-11.547,17.161-13.362,29.68H378.062
                                                                                    L378.062,225.73z"/>
                                                                                </svg>
                                                                                /*AQUI*/
                                                                                <?php
                                                                                break;
                                                                                case 'pinrest':
                                                                                ?>
                                                                                <svg xml:space="preserve" enable-background="new 0 0 34 34" viewBox="0 0 34 34" height="34px" width="34px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1">
                                                                                    <path d="M17,8.5c-4.69,0-8.5,3.8-8.5,8.5c0,3.479,2.09,6.47,5.09,7.78c-0.03-0.59-0.01-1.311,0.15-1.95l1.09-4.63
                                                                                    c0,0-0.27-0.551-0.27-1.35c0-1.26,0.73-2.2,1.64-2.2c0.77,0,1.14,0.58,1.14,1.28c0,0.78-0.49,1.94-0.75,3.01
                                                                                    c-0.21,0.91,0.46,1.64,1.35,1.64c1.61,0,2.69-2.069,2.69-4.52c0-1.86-1.25-3.25-3.54-3.25c-2.57,0-4.18,1.92-4.18,4.06
                                                                                    c0,0.75,0.22,1.27,0.56,1.67c0.16,0.189,0.18,0.26,0.12,0.48l-0.17,0.68c-0.06,0.21-0.23,0.29-0.43,0.21
                                                                                    c-1.18-0.479-1.74-1.78-1.74-3.25c0-2.41,2.04-5.31,6.08-5.31c3.24,0,5.38,2.35,5.38,4.87c0,3.339-1.86,5.83-4.59,5.83
                                                                                    c-0.92,0-1.78-0.5-2.07-1.06c0,0-0.5,1.96-0.6,2.34c-0.18,0.649-0.54,1.31-0.86,1.819C15.36,25.37,16.16,25.5,17,25.5
                                                                                    c4.689,0,8.5-3.81,8.5-8.5C25.5,12.3,21.689,8.5,17,8.5z" fill="#cccccc"/>
                                                                                </svg>
                                                                                <?php
                                                                                break;
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            endwhile;
                                                        endif;
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                        case 'blog_subtitulo':
                                        ?>
                                        <div class="block-text" >
                                            <h3><?php the_sub_field('subtitulo'); ?></h3>
                                        </div>
                                        <?php
                                        break;
                                        case 'blog_texto':
                                        $linha = get_sub_field('texto');
                                        $linha = richTextCustom($linha)
                                        ?>
                                        <div class="block-text">
                                            <?php echo $linha; ?>
                                        </div>
                                        <?php
                                        break;
                                        case 'blog_imagem':
                                        ?>
                                        <?php 
                                        $imagem = '';
                                        if(get_sub_field('imagem')):
                                            $imagem = get_sub_field('imagem'); ?>
                                            <div class="block-image">
                                                <div class="image">
                                                    <img draggable="false" alt="<?php echo $imagem['alt']; ?>" draggable="false" src="<?php echo $imagem['url']; ?>" />
                                                </div>
                                            </div>
                                            <?php 
                                        endif;
                                        ?>
                                        <?php
                                        break;
                                        case 'blog_video':
                                        $videoLink = get_sub_field('url_video');
                                        $videoLink = str_replace('https:','',$videoLink);
                                        $videoLink = str_replace('http:','',$videoLink);
                                        if (strpos($videoLink, 'vimeo') > 0):
                                            $color = '?color=ffdd00';
                                        endif;
                                        ?>
                                        <div class="slider-media block-text" >
                                            <iframe id="videoYoutube" src="<?php echo $videoLink, $color; ?>" frameborder="0"></iframe>
                                        </div>
                                        <?php
                                        break;
                                        case 'blog_tags':
                                        ?>
                                        <div class="block-formacao-info center">
                                            <div class="separator-gray">
                                                <div class="gray-border"></div>
                                            </div>
                                            <div class="tags">
                                                <?php
                                                if(have_rows('tags')):
                                                    while ( have_rows('tags') ) :
                                                        the_row();
                                                        ?>
                                                        <a href="/?s=<?php the_sub_field('tag'); ?>" class="tag no-route"><span></span><?php the_sub_field('tag'); ?></a>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                        case 'recrutamento_subtitulo':
                                        ?>
                                        <div class="block-text" >
                                            <div class="block-formacao-info">
                                                <h3><?php the_sub_field('subtitulo'); ?></h3>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                        case 'recrutamento_texto':
                                        $linha = get_sub_field('texto');
                                        $linha = richTextCustom($linha);
                                        ?>
                                        <div class="block-text" >
                                            <div class="block-formacao-info">
                                                <p><?php echo $linha; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                        break;
                                        case 'recrutamento_itens':
                                        ?>
                                        <div class="block-text" >
                                            <p class="textBold"><?php the_sub_field('titulo'); ?></p>
                                            <ul class="block-list points">
                                                <?php
                                                if(have_rows('itens')):
                                                    while ( have_rows('itens') ) :
                                                        the_row();
                                                        ?>
                                                        <li><span><?php the_sub_field('item'); ?></span></li>
                                                        <?php
                                                    endwhile;
                                                endif;
                                                ?>
                                            </ul>
                                        </div>
                                        <?php
                                        break;
                                    }
                                    ?>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                            <?php
                        endwhile;
                    endif;
                    ?>