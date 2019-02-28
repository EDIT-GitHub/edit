<?php
/**
 * The template for Entrevista Detalhe
 *
 * @package Edit
 */

//Tipo de formacao
$tipoFormacao = get_field('tipo_formacao');
$tipoFormacao =$tipoFormacao[0];//First
$icon = get_field('icon',$tipoFormacao);
$cssClassType = get_field('class',$tipoFormacao);
//End tipo de formacao
        
//Localizacao
$localizacao = get_field('localizacao');
$localizacao = $localizacao[0];//First
//End Localizacao

?>
<div class="content">
    <!-- HEADER MODULE -->
    <div class="header js-header flex full">
        <div class="header-item entrevista">
            <div class="background">
                <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/entrevistas/detalhe/header-1.jpg)"></div>
                <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)"></div>
            </div>

            <div class="grid-cont">
                <div class="header-description">
                <div class="square">
                        <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 280 280" enable-background="new 0 0 280 280" xml:space="preserve">
                        <polygon fill="#FFFFFF" points="53.9,276 4,276 4,4 276,4 276,49.2 280,49.2 280,0 0,0 0,280 53.9,280 "/>
                        </svg>

                </div>
                    <div class="summary">
                        <h2>Tobias Van Schneider</h2>
                    </div>
                    <div class="icon-cont">
                        <div class="icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                <path stroke="#FFFFFF" d="M0,0v50h50V0H0z M2,48V12V2h46v46H2 M2,48 M48,48"/>
                                <rect x="7" fill="#FFFFFF" y="7" width="36" height="11"/>
                                <rect x="7" fill="#FFFFFF" y="23" width="36" height="2"/>
                                <rect x="7" fill="#FFFFFF" y="29" width="36" height="2"/>
                                <rect x="7" fill="#FFFFFF" y="35" width="36" height="2"/>
                                <rect x="7" fill="#FFFFFF" y="41" width="36" height="2"/>
                            </svg>
                        </div>
                        <span class="icon-label">Entrevista</span>
                    </div>
                </div>
            </div>
        </div>
      <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({type:'header',instance:new Edit.modules.smallHeader('.js-header')})
            })
        </script>
        
    </div>
    <!-- END HEADER MODULE -->
    <div class="block-text entrevista">
        <div class="grid-cont">
            <h1>Entrevista Edit.<br>Tobias Van Schneider</h1>
            <p class="date">22 Setembro 2015</p>
            <p class="author">Ana Filipe Silveira</p>
            <h3 class="margin-50">I always had a simple concept. Do great work and the rest will follow. I pride myself for not doing pitches or any other spec work. If you do great work, great clients will follow. Duis pellentesque at justo in malesuada. Etiam nec mauris et lacus ultrices malesuada eu vitae lacus. Curabitur scelerisque sodales nulla vitae  pretium.
            </h3>
            <blockquote class="margin-50">
                <img src="<?php bloginfo('template_url');?>/images/assets/svg/quotes-square.svg" />
                <p>a camel is a horse designed by a committee</p>
            </blockquote>
            <img class="margin-100" src="<?php bloginfo('template_url');?>/images/dummy/entrevistas/detalhe/content-1.jpg" />
            <div class="q-a-block">
                <div class="question">
                    <span class="id">E.</span>
                    <div class="question-content">
                        <p>Please give us a brief bio of yourself.</p>
                    </div>
                </div>
                <div class="answer">
                    <span class="id">T</span>
                    <div class="answer-content">
                        <p>I'm a designer originally born in Germany, raised in Austria and currently living in New York / Brooklyn. Currently leading up product design for new product development at Spotify NYC. I'm also the founder of les Avignons, a network agency based in the heart of Austria.</p>
                        <p>Prior to that I had the privilege to work on great products & projects with companies such as Red Bull, BMW, Google, Wacom, Stinkdigital, Fantasy Interactive, Sony, Ralph Lauren, Bwin, Toyota & many more.</p>
                        <p>I consider myself a designer who works in a lot of different fields ranging from traditional graphic design, print design and brand identity to more interactive projects & product design across multiple platforms.</p>
                    </div>
                </div>
            </div>
            <div class="video-block margin-100">
                <iframe src="//player.vimeo.com/video/58535224?color=ffdf00" width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="interview-links">
                <a class="default-btn interview" href="http://twitter.com" target="_blank" class="no-route">
                    <div class="btn-icon">
                        <div class="inner">
                            
                        </div>
                    </div>
                    <span class="label">Twitter Profile</span>
                </a>
                <a class="default-btn interview" href="http://twitter.com" target="_blank" class="no-route">
                    <div class="btn-icon">
                        <div class="inner">
                            
                        </div>
                    </div>
                    <span class="label">Behance Portfolio</span>
                </a>
                <a class="default-btn interview" href="http://twitter.com" target="_blank" class="no-route">
                    <div class="btn-icon">
                        <div class="inner">
                            
                        </div>
                    </div>
                    <span class="label">House of van schneider</span>
                </a>
                <a class="default-btn interview" href="http://twitter.com" target="_blank" class="no-route">
                    <div class="btn-icon">
                        <div class="inner">
                            
                        </div>
                    </div>
                    <span class="label">Personal Blog</span>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.pageLoader.totalModules = 1; 
    })
</script>