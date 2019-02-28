<?php
/**
 * The template for Detalhe Eventos
 *
 * @package Edit
 */

?>

<div class="content">
    <!-- FORM MODAL MODULE -->
    <div class="slider form flex full curso evento js-formmodal">
        <input type="hidden" id="idCurso" value="" />
        <div class="form-content">
            <div class="btn">
                <?php dictionary("quero_participar_neste_evento") ?>
                <div class="btn-close">
                    <div class="icon-close">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                            <path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                            c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                            c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z">
                        </path>
                    </svg>
                    <svg version="1.0" id="invert" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                        <path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                        c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                        c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
</div>

<form id="register-evento">
    <div class="wrapper">
        <div class="pane-scroll">
            <div class="slider-item">
                <div class="grid-cont">
                    <div class="content v-align">
                        <input id="evento" name="evento" type="hidden" value="<?php echo htmlspecialchars(get_field('titulo')); ?>" />
                        <input id="nome" name="name" type="text" data-type="text" placeholder="NOME" />
                        <input id="email" name="email" type="text" data-type="email" placeholder="EMAIL" />
                        <input id="telefone" name="telefone" data-type="phone" type="text" placeholder="<?php dictionary("PHONE_PLUS") ?>" />
                        <input type="hidden" id="cidade" name="cidade" value="LISBOA" data-type="text" type="text" placeholder="LISBOA/PORTO" autocomplete="off" />   <!-- escondido para evento Industry Sessions -->
                        <textarea name="message" id="message" placeholder="<?php dictionary("Mensagem") ?>"></textarea>
                        <!-- escondido para evento Industry Sessions Live -->
                                <!-- <div>  
                                    <div class="content-radio interests">
                                        <label class="area-label"><?php dictionary("Sessao_a_frequentar") ?></label>
                                        <div class="checkbox">
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-1" value="Manha" >
                                                <label for="interest-1"></label>     
                                                Sessão da Manhã                                        
                                            </div>
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-2" value="Tarde" >
                                                <label for="interest-2"></label>
                                                 Sessão da tarde         
                                            </div>
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-3" value="Todo o dia" >
                                                <label for="interest-3"></label>
                                                 Dia todo     
                                            </div>
                                        </div>
                                    </div>   
                                </div> -->
                                <?php 
                                if (get_the_ID() == '23708') {
                                    echo '
                                    <div class="content-radio interests">
                                    <div class="checkbox">
                                    <!-- <div class="block-medium">
                                    <div class="radio">
                                    <input  type="radio" name="radio" id="interest-1" value="1, " required>
                                    <label for="interest-1"></label>
                                    <span>Growth Session 1 - 14h30</span>
                                    </div>
                                    <div class="radio">
                                    <input type="radio" name="radio" id="interest-2" value="2, " required>
                                    <label for="interest-2"></label>
                                    <span>Growth Session 2 - 14h30</span>
                                    </div>
                                    </div>  -->
                                    <div class="block-medium">   
                                    <!--  <div class="radio">
                                    <input type="radio" name="radio2" id="interest-3" value="3, " required>
                                    <label class="margin" for="interest-3"></label>
                                    <span>Growth Session 3 - 16h15</span>
                                    </div>
                                    <div class="radio">
                                    <input type="radio" name="radio2" id="interest-4" value="4" required>
                                    <label class="margin" for="interest-4"></label>
                                    <span>Growth Session 4 - 16h15</span>
                                    </div> -->
                                    <div class="radio">
                                    <input type="radio" name="inauguracao" id="interest-6" value="Sim" checked>
                                    <label class="margin" for="interest-6"></label>
                                    <span>Inauguração - 18h30</span>
                                    </div>
                                    </div>   
                                    </div>
                                    </div> 
                                    ';
                                } else { ?>
                                <div class="content-radio">
                                    <div class="radio">
                                        <input type="checkbox" name="newsletter-1" id="newsletter-1" value="newsletter" checked="checked">
                                        <label class="interests" for="newsletter-1"></label>
                                        <?php dictionary("Desejo_receber_a_newsletter") ?>
                                    </div>
                                </div>
                                <?php  } ?>  
                                <div class="default-btn btn-submit">
                                    <span class="label"><?php dictionary("Inscricao") ?></span>
                                    <div class="btn-icon">
                                        <div class="border"></div>
                                        <div class="inner">
                                            <div class="icon">
                                                <div class="submit-icon"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script>
        jQuery(document).ready(function( $ ) {
            Edit.modules.collection.push({ type: 'formModal', instance: new Edit.modules.formModal('.js-formmodal', 'eventos_form', 'eventos') });
        })
    </script>

    <script>
        jQuery('input[type="checkbox"]').on('change', function() {
            jQuery('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });
    </script>
    <!-- END FORM MODAL MODULE -->
    <!-- HEADER MODULE -->
    <div class="header js-header flex full">
        <div class="header-item entrevista">
            <?php
            $responsiveClass = "";
                //echo "imagem"get_field('fundo_header_responsive');
            if(get_field('fundo_header_responsive') != ''){
                $responsiveClass = "responsive-image";
            }
            ?>
            <div class="background <?php echo $responsiveClass; ?>">
                <div class="img" draggable="false" style="background-image:url(<?php the_field('fundo_header');?>)"></div>
                <div class="img-overlay"></div>
                <?php if(get_field('fundo_header_responsive') != ''){ ?>
                <div class="img-smartphone" draggable="false" style="background-image:url(<?php the_field('fundo_header_responsive');?>)"></div>
                <?php } ?>
                <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)"></div>
            </div>

            <div class="grid-cont">
                <div class="header-description">
                    <div class="square">
                        <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 280 280" enable-background="new 0 0 280 280" xml:space="preserve">
                        <polygon fill="#FFFFFF" points="53.9,276 4,276 4,4 276,4 276,49.2 280,49.2 280,0 0,0 0,280 53.9,280 " />
                    </svg>

                </div>
                <div class="summary">
                    <h2><?php the_field('titulo'); ?></h2>
                </div>
                <div class="icon-cont">
                    <div class="icon">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                        <g>
                            <path fill="#FFFFFF" d="M48,5v43H2V5H48 M50,3H0v47h50V3L50,3z" />

                            <rect fill="#FFFFFF" x="8" y="28" width="6" height="6" />
                            <rect fill="#FFFFFF" x="38" width="5" height="8" />
                            <rect fill="#FFFFFF" x="7" width="5" height="8" />
                            <rect fill="#FFFFFF" x="8" y="13" width="34" height="10" />
                            <rect fill="#FFFFFF" x="17" width="5" height="8" />
                            <rect fill="#FFFFFF" x="28" width="5" height="8" />
                            <rect fill="#FFFFFF" x="17" y="28" width="6" height="6" />
                            <rect fill="#FFFFFF" x="27" y="28" width="6" height="6" />
                            <rect fill="#FFFFFF" x="36" y="28" width="6" height="6" />
                            <rect fill="#FFFFFF" x="8" y="37" width="6" height="6" />
                            <rect fill="#FFFFFF" x="17" y="37" width="6" height="6" />
                            <rect fill="#FFFFFF" x="27" y="37" width="6" height="6" />
                            <rect fill="#FFFFFF" x="36" y="37" width="6" height="6" />
                        </g>
                    </svg>
                </div>
                <span class="icon-label"><?php the_field('tipo'); ?> <?php the_field('label'); ?></span>
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
<!-- END HEADER MODULE -->
<div class="block-text evento">
    <div class="grid-cont">
        <h1><?php the_field('titulo'); ?></h1>
        <h4 class="detail"><?php the_field('subtitulo'); ?></h4>
    </div>
</div>
<!-- AVAILABILITY MODULE -->
<div class="js-availability block-availability" data-total="20" data-registered="12">
    <div class="grid-cont">
        <div class="date">
            <div class="bg">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="110px" height="110px" viewBox="0 0 110 110" enable-background="new 0 0 110 110" xml:space="preserve">
                    <path fill="#FFDF00" d="M108.5,0c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1

                    c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
                    c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
                    c0,2-1.791,4-4,4s-4-2-4-4H0v110h110V0H108.5z" />
                    <rect y="103" fill="#FFDF00" width="110" height="7" />
                </svg>
            </div>
            <div>
                <?php if(get_field('data')):
                $date = DateTime::createFromFormat('Ymd', get_field('data'));
                $month = $date->format('F');
                $mes = '';

                switch($month){
                    case 'January':
                    $mes = dictionaryString('Janeiro');
                    break;
                    case 'February':
                    $mes = dictionaryString('Fevereiro');
                    break;
                    case 'March':
                    $mes = dictionaryString('Março');
                    break;
                    case 'April':
                    $mes = dictionaryString('Abril');
                    break;
                    case 'May':
                    $mes = dictionaryString('Maio');
                    break;
                    case 'June':
                    $mes = dictionaryString('Junho');
                    break;
                    case 'July':
                    $mes = dictionaryString('Julho');
                    break;
                    case 'August':
                    $mes = dictionaryString('Agosto');
                    break;
                    case 'September':
                    $mes = dictionaryString('Setembro');
                    break;
                    case 'October':
                    $mes = dictionaryString('Outubro');
                    break;
                    case 'November':
                    $mes = dictionaryString('Novembro');
                    break;
                    case 'December':
                    $mes = dictionaryString('Dezembro');
                    break;
                    default:
                    $mes = $month;
                }

                ?>

                <p class="day"><?php echo $date->format('d');?></p>
                <p class="month"><?php echo $mes;?></p>
                <p class="time"><?php the_field('horario'); ?></p>
                <?php
            endif;
            ?>
        </div>
    </div>
    <div class="graph-info">
        <div class="text-row">
            <div class="icon">
                <img src="<?php bloginfo('template_url');?>/images/assets/svg/registos-icon.svg" />
            </div>
            <div class="title">
                <p>Plazas Disponibles</p>
                <?php

                $total = get_field('vagas_totais') - get_field('vagas_ocupadas');
                $vagasTotais = get_field('vagas_totais');
                $vagasOcupadas = get_field('vagas_ocupadas');
                $percentual = (($vagasOcupadas * 100)/$vagasTotais);
                ?>
                <span>(<?php echo $total;?> Plazas Disponibles)</span>
            </div>
            <div class="total">
                <p><span class="registered"><?php echo get_field('vagas_ocupadas'); ?></span>/<?php echo get_field('vagas_totais'); ?></p>
            </div>
        </div>
        <div class="graph-row">
            <div class="rail">
                <div class="bg"></div>
                <div class="registered" style="width:<?php echo $percentual; ?>%;"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END AVAILABILITY MODULE -->
<div class="btn-position-holder evento"></div>
<div class="block-formacao-info form-content evento">
    <?php 
    if(get_field('form_url')): 
        $url = get_field('form_url'); ?>
            <a class="btn link" href="<?php echo $url; ?>" target="_blank">
                <?php the_field('label_form_titulo_evento'); ?>
                <div class="icon form-btn default btn-icon">
                    <div class="inner">
                        <div class="icon">
                          <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                            <path fill="#000" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                            c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                            c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </a>
<?php else: ?>     
    <div class="btn">
        <?php dictionary("quero_participar_neste_evento") ?>
        <div class="icon form-btn btn-icon">
            <div class="inner">
                <div class="icon">
                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                    <path fill="#000" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                    c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                    c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z" />
                </svg>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
</div>
<?php
get_template_part( 'partials/partial', 'genericblocks');
?>

<?php if(get_field('video')): ?>		
  <div class="video-block margin-50">
   <iframe src="<?php the_sub_field('url_video'); ?>" "width="720" height="405" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>

<?php endif; ?>

<div class="block-share">
    <div class="content-share">
      <div>
          <?php dictionary("QUERO_PARTILHAR_ESTA_PAGINA") ?> 
          <div class="share-icon btn-icon">
              <div class="inner">
                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                  <path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                  c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                  c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"></path>
              </svg>
          </div>          
      </div>
  </div>
</div>
</div>

<?php
if(get_field('artigos_relacionados')):
    get_template_part( 'partials/partial', 'artigos-relacionados');
endif;
?>
<div class="shareLightbox">
    <div class="btn-close">
        <?php dictionary("QUERO_PARTILHAR_ESTA_PAGINA") ?> 
        <div class="icon-close">
            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                <path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"></path>
            </svg> 
            <svg version="1.0" id="invert" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                <path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"></path>
            </svg>                  
        </div>
    </div> 
    <div class="grid-cont"> 
        <div class="content-valign">
            <div class="share-content">
                <a href="javascript:Edit.modules.windowpop('https://twitter.com/share?url=<?php the_permalink() ?>',600,400);" target="">
                    <div class="icon twitter">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="60" height="60" viewBox="-3.5 -3.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
                        <path fill="#cccccc" d="M25.5,11.81c-0.629,0.27-1.301,0.46-2,0.54c0.721-0.42,1.27-1.1,1.529-1.9c-0.67,0.4-1.42,0.68-2.219,0.83
                        c-0.631-0.66-1.541-1.08-2.541-1.08c-1.93,0-3.49,1.54-3.49,3.43c0,0.27,0.03,0.53,0.09,0.79c-2.9-0.15-5.47-1.51-7.19-3.59
                        c-0.3,0.51-0.47,1.1-0.47,1.73c0,1.18,0.62,2.24,1.55,2.85c-0.57-0.01-1.11-0.17-1.58-0.43v0.05c0,1.66,1.2,3.05,2.8,3.361
                        c-0.29,0.08-0.6,0.119-0.92,0.119c-0.22,0-0.44-0.02-0.65-0.06c0.44,1.36,1.73,2.36,3.25,2.39c-1.19,0.92-2.69,1.46-4.33,1.46
                        c-0.28,0-0.56-0.01-0.83-0.04c1.54,0.971,3.38,1.54,5.35,1.54c6.41,0,9.919-5.229,9.919-9.77l-0.01-0.44
                        C24.439,13.1,25.029,12.5,25.5,11.81z"/>
                    </svg>
                </div>        
            </a>
            <a href="javascript:Edit.modules.windowpop('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>',600,400);" target="">
                <div class="icon facebook">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="60" height="60" viewBox="-3.5 -3.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
                    <path fill="#cccccc" d="M12.75,14.12h1.82v-1.71c0-0.75,0.02-1.91,0.59-2.63c0.6-0.76,1.41-1.28,2.82-1.28
                    c2.299,0,3.27,0.32,3.27,0.32l-0.46,2.6c0,0-0.75-0.21-1.46-0.21s-1.35,0.24-1.35,0.93v1.98h2.911l-0.201,2.55H17.98v8.83h-3.41
                    v-8.83h-1.82V14.12z"/>
                </svg>
            </div>        
        </a>
        <a href="javascript:Edit.modules.windowpop('https://www.linkedin.com/cws/share?url=<?php the_permalink() ?>',600,400);" target="">
            <div class="icon in">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="60" height="60" viewBox="-3.5 -3.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
                <path fill-rule="evenodd" clip-rule="evenodd" fill="#cccccc" d="M25.5,24.65h-3.76v-5.38c0-1.41-0.58-2.37-1.881-2.37
                c-0.989,0-1.539,0.649-1.789,1.28c-0.1,0.22-0.08,0.529-0.08,0.85v5.62h-3.73c0,0,0.05-9.53,0-10.391h3.73v1.63
                c0.22-0.72,1.41-1.729,3.31-1.729c2.351,0,4.2,1.49,4.2,4.71V24.65z M10.5,12.96h-0.02c-1.2,0-1.98-0.8-1.98-1.81
                c0-1.021,0.8-1.801,2.02-1.801c1.23,0,1.98,0.78,2,1.801C12.52,12.16,11.75,12.96,10.5,12.96z M12.24,24.65H8.93V14.26h3.31V24.65z"
                />
            </svg>
        </div>        
    </a>
    <a href="javascript:Edit.modules.windowpop('http://pinterest.com/pin/create/link/?url=<?php the_permalink() ?>',600,400);" target="">
        <div class="icon pinterest">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="60" height="60" viewBox="-4.5 -4.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
            <path fill="#cccccc" d="M17,8.5c-4.69,0-8.5,3.8-8.5,8.5c0,3.479,2.09,6.47,5.09,7.78c-0.03-0.59-0.01-1.311,0.15-1.95l1.09-4.63
            c0,0-0.27-0.551-0.27-1.35c0-1.26,0.73-2.2,1.64-2.2c0.77,0,1.14,0.58,1.14,1.28c0,0.78-0.49,1.94-0.75,3.01
            c-0.21,0.91,0.46,1.64,1.35,1.64c1.61,0,2.69-2.069,2.69-4.52c0-1.86-1.25-3.25-3.54-3.25c-2.57,0-4.18,1.92-4.18,4.06
            c0,0.75,0.22,1.27,0.56,1.67c0.16,0.189,0.18,0.26,0.12,0.48l-0.17,0.68c-0.06,0.21-0.23,0.29-0.43,0.21
            c-1.18-0.479-1.74-1.78-1.74-3.25c0-2.41,2.04-5.31,6.08-5.31c3.24,0,5.38,2.35,5.38,4.87c0,3.339-1.86,5.83-4.59,5.83
            c-0.92,0-1.78-0.5-2.07-1.06c0,0-0.5,1.96-0.6,2.34c-0.18,0.649-0.54,1.31-0.86,1.819C15.36,25.37,16.16,25.5,17,25.5
            c4.689,0,8.5-3.81,8.5-8.5C25.5,12.3,21.689,8.5,17,8.5z"/>
        </svg>
    </div>        
</a>
<a href="javascript:Edit.modules.windowpop('https://plus.google.com/share?url=<?php the_permalink() ?>',600,400);">
    <div class="icon g_plus">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="60" height="60" viewBox="2 2 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
        <g>
          <path fill="#FFFFFF" d="M12.922,20.576c-1.471,0-2.534-0.931-2.534-2.05c0-1.097,1.318-2.009,2.79-1.993
          c0.343,0.004,0.663,0.059,0.953,0.152c0.798,0.557,1.371,0.87,1.533,1.503c0.031,0.128,0.048,0.259,0.048,0.396
          C15.712,19.703,14.991,20.576,12.922,20.576 M13.308,14.016c-0.986-0.03-1.926-1.105-2.096-2.401
          c-0.17-1.298,0.493-2.29,1.48-2.261c0.987,0.03,1.926,1.07,2.096,2.367C14.958,13.018,14.296,14.045,13.308,14.016 M15.356,15.937
          c-0.346-0.246-1.008-0.842-1.008-1.193c0-0.411,0.117-0.613,0.735-1.096c0.634-0.496,1.083-1.192,1.083-2.002
          c0-0.964-0.43-1.904-1.235-2.214h1.215l0.856-0.62H13.17c-1.718,0-3.336,1.302-3.336,2.809c0,1.542,1.172,2.786,2.921,2.786
          c0.121,0,0.239-0.003,0.354-0.011c-0.113,0.216-0.195,0.462-0.195,0.715c0,0.429,0.231,0.776,0.522,1.06
          c-0.219,0-0.432,0.007-0.663,0.007c-2.129,0-3.768,1.356-3.768,2.762c0,1.384,1.797,2.25,3.925,2.25
          c2.426,0,3.767-1.376,3.767-2.762C16.697,17.316,16.37,16.651,15.356,15.937 M20.934,14.128h-1.492v-1.492H18.24v1.492h-1.492
          v1.201h1.492v1.492h1.201V15.33h1.492V14.128z"/>
      </g>
  </svg>
</div>        
</a>       
</div>      
</div>
</div>
</div>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        <?php

        if(get_next_post()){
            $next_post = get_next_post();
            $next_post_url = get_permalink($next_post->ID);

            $next_post_url = str_replace(home_url(),"",$next_post_url);
        }else{
            $next_post_url = 'undefined';
        }


        if(get_adjacent_post()){
            $prev_post = get_adjacent_post();
            $prev_post_url = get_permalink($prev_post->ID);

            $prev_post_url = str_replace(home_url(),"",$prev_post_url);
        }else{
            $prev_post_url = 'undefined';
        }
        $parent = get_post(17);
        $parent_url = get_permalink($parent->ID);

        $currentUrl = $_SERVER['REQUEST_URI'];
        $arr = explode('?ajax=true',$currentUrl);

        $filter= '';
        if(sizeof($arr) > 1){
            $filter = '?'.$arr[1];
            $filter = str_replace('&inputLocalizacao=0',"",$filter);

            $filter = str_replace('&inputArea=0',"",$filter);

            $filter = str_replace('?&',"?",$filter);
        }

            //$parent_url = str_replace(home_url(),"",$parent_url.$filter);

        $meta_query = array('relation' => 'AND');
        $localizacao = '';
        $area = '';
        $queryString = '';
        if(isset($_REQUEST['inputLocalizacao'])) {
            $localizacao = $_REQUEST['inputLocalizacao'];
            if($queryString == ''){
                $queryString = $queryString . '?inputLocalizacao=' . $localizacao;
            }else{
                $queryString = $queryString . '&inputLocalizacao=' . $localizacao;
            }
        }
        if(isset($_REQUEST['inputArea'])) {
            $area = $_REQUEST['inputArea'];
            if($queryString == ''){
                $queryString = $queryString . '?inputArea=' . $area;
            }else{
                $queryString = $queryString . '&inputArea=' . $area;
            }
        }
        if($localizacao != '0' && $localizacao != ''):
            array_push(
                $meta_query, 
                array(
                        'key'   => 'localizacao', // name of custom field
                        'value' => '"' . $localizacao . '"',
                        'compare' => 'LIKE'
                    )
            );
        endif;    
        if($area != '0' && $area != ''):
            array_push(
                $meta_query, 
                array(
                        'key' => 'area', // name of custom field
                        'value' => '"' . $area . '"',
                        'compare' => 'LIKE'
                    )
            );
        endif;
        $order = 'ASC';
        $orderBy = 'menu_order';
        $post_type = 'eventos';
        $postId = $wp_query->post->ID;
        $links = getNextAndPreviousLinks($order,$orderBy,$post_type,$meta_query, $postId, $queryString);
        $parent_url = str_replace(home_url(),"",$parent_url.$queryString);
        ?>
        Edit.modules.collection.push({type:'innerNavigation',instance:new Edit.modules.innerNavigation('<?php echo $links["next"];?>','<?php echo $links["prev"]; ?>','<?php echo $parent_url; ?>')})
        Edit.pageLoader.totalModules = 1;
        Edit.modules.shareLightbox('.block-share');
        Edit.modules.isoModuleResponsive.init();
    });
    var cursoN = '<?php echo wp_create_nonce("edit Nonce Registration Form");?>'; 
    var success = "<?php dictionary("Sucesso") ?>";
    var sending = "A enviar";  
    var form_sucesso = "<?php dictionary("Pedido_enviado_com_sucesso") ?>";
</script>





