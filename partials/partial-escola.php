<?php
/**
 * The template for Escola
 *
 * @package Edit
 */
$servicesEnpoint = "/results/equipa/";
//if(LANGUAGE=="en") {
//    $childofMarcas = 40;
//    $servicesEnpoint = "/en/results/areas/";
//}
?>
<?php the_field('tracking_code'); ?>
<?php  if(get_the_ID()=='41891'){
            $remote_page = 'page-edit-remote-learning';
        }; 

?>
<div class="content <?php echo $remote_page; ?>">
    <?php
    if(get_field('formulario_mais_info')):
        ?>
        <!-- FORM MODAL MODULE -->
        <script>
        window.onload = function() {
            var layer = document.getElementById("loaderLayer")
            layer.className = 'remove'; 
        }
        </script>
        <div class="slider form flex full curso evento js-formmodal">
            <input type="hidden" id="idCurso" value="" />
            <div class="form-content">
                <div class="btn">
                    <?php the_field('texto_botao_mais_info'); ?>
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

    <form id="register-internacional">
        <div class="wrapper">
            <div class="pane-scroll">
                <div class="slider-item">
                    <div class="grid-cont">
                        <div class="content v-align">
                            <input id="nome" name="name" type="text" data-type="text" placeholder="<?php dictionary("NOME") ?>" />
                            <input id="telefone" name="telefone" data-type="phone" type="text" placeholder="<?php dictionary("PHONE_PLUS") ?>" />
                            <input id="email" name="email" type="text" data-type="email" placeholder="EMAIL" />
                            <input id="pais" name="pais" data-type="text" type="text" placeholder="PAÍS" />
                            <input id="cidade" name="cidade" data-type="text" type="text" placeholder="<?php dictionary("CIDADE") ?>" />
                            <div class="filters-holder">
                                <div class="responsive-header">
                                    <div class="label">
                                        <?php dictionary("Fechar") ?>
                                    </div>
                                    <div class="icon-cont">
                                        <div class="icon">
                                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                            <polygon fill="#000000" points="25,13 17,13 17,5 13,5 13,13 5,13 5,17 13,17 13,25 17,25 17,17 25,17 " />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="filter">
                                <select id="assunto" data-exterior-label="Assunto" name="assunto">
                                    <option value="Info"><?php dictionary("Pedido_de_Informacao") ?></option>
                                    <option value="Estadia"><?php dictionary("Estadia_e_Estudar_em_Portugal") ?></option>
                                    <option value="Cursos/Formação"><?php dictionary("Cursos_Formação_EDIT") ?></option>
                                </select>
                            </div>
                        </div>
                        <textarea name="message" id="message" placeholder="<?php dictionary("Mensagem") ?>"></textarea>
                        <div class="default-btn btn-submit">
                            <span class="label">Enviar</span>
                            <div class="btn-icon">
                                <div class="border"></div>
                                <div class="inner">
                                    <div class="icon">
                                        <div class="submit-icon"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="default-btn btn-gdpr">
                            <div class="checkbox">
                                <input id="gdpr" class="gdpr-input" type="checkbox" name="checkbox" checked="checked" >
                                <label class="label-gdpr" for="gdpr">
                                    <span class="icon-check"></span>
                                </label>
                            </div>
                            <span class="label-text label">
                                <?php echo dictionary("gdpr_label_text"); ?>
                                <br>
                                <a class="label-href" href="<?php echo dictionary("gdpr_href"); ?>" class="no-route" target="_blank">
                                    <?php echo dictionary("gdpr_label_href"); ?>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

<script>
    var sending = 'a enviar';
    var cursoN = '<?php echo wp_create_nonce("edit Nonce Info Form");?>';
    var success = "<?php dictionary("Sucesso") ?>";
    var form_sucesso = "<?php dictionary("Pedido_enviado_com_sucesso") ?>";

    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({ type: 'formModal', instance: new Edit.modules.formModal('.js-formmodal', 'info_form', 'internacional', "Alunos Internacionais") });
    })
</script>
<!-- END FORM MODAL MODULE -->
<?php
endif;
?>
<!-- SLIDER MODULE -->
<?php
if(have_rows('blocks')):
    while(have_rows('blocks')):
       the_row();
       $cssClassMargin = '';
       $cssMargem100 =  get_sub_field('colocar_margem');
       if($cssMargem100){
        $cssClassMargin = 'margin-50';
    }
    switch (get_row_layout()):
        case 'slider_interior':
        $full = get_sub_field('full_screen');
        ?>
        <div class="slider default escola flex <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?> <?php if($full): ?>full<?php else: ?> media info <?php endif; ?>">
            <div class="wrapper">

                <?php
                if(have_rows('slider_item')):
                    $i = 0;
                    while(have_rows('slider_item')):
                        the_row();
                        ?>
                        <div class="pane-scroll">
                            <div class="slider-item <?php if($full): ?>header<?php endif; ?>">
                                <div class="delayed">
                                    <div class="background">
                                        <div class="img" draggable="false" style="background-image:url('<?php the_sub_field('imagem') ?>')"></div>
                                        <div class="img-overlay"></div>
                                    </div>
                                </div>

                                <div class="slider-media">
                                </div>
                                <div class="grid-cont">
                                    <div class="slider-description inner">
                                        <?php if($full): ?>
                                            <div class="square">
                                                <svg width="280" height="280" version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 280 280" enable-background="new 0 0 280 280" xml:space="preserve">
                                                <polygon fill="#FFFFFF" points="53.9,276 4,276 4,4 276,4 276,49.2 280,49.2 280,0 0,0 0,280 53.9,280 " />
                                            </svg>
                                        </div>
                                        <div class="summary">
                                            <?php if($i == 0):?>
                                                <?php if(get_sub_field('titulo')): ?>
                                                    <h1><?php the_sub_field('titulo') ?></h1>
                                                    <br>
                                                <?php endif; ?>
                                                <?php else:?>
                                                    <?php if(get_sub_field('titulo')): ?>
                                                        <h2><b><?php the_sub_field('titulo') ?></b></h2>
                                                        <br>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if(get_sub_field('texto')): ?>
                                                  <p class="text-description"><?php the_sub_field('texto') ?></p>
                                              <?php endif; ?>
                                          </div>
                                          <?php else: ?>
                                            <?php if(get_sub_field('titulo')): ?>
                                                <h3><?php the_sub_field('titulo') ?></h3>
                                            <?php endif; ?>
                                        <?php endif; ?>


                                        <div class="icon-cont">
                                            <div class="icon">
                                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                                <path fill="#FFDD15" d="M0,0v50h50V0H0z M47.801,23.641H30.309V2.198h17.492V23.641z M28.11,2.198v21.443H2.199V2.198H28.11z
                                                M2.199,25.839h8.567v21.963H2.199V25.839z M12.965,47.803V25.839h34.836v21.963H12.965z" />
                                            </svg>
                                        </div>
                                        <span class="icon-label">Curso</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $i = $i+1;
                endwhile;
            endif;
            ?>
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
                            c-0.195-0.195-0.195-0.512,0-0.707C5.494,0.049,5.622,0,5.75,0z" />
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
                        c0.195,0.195,0.195,0.512,0,0.707C16.505,21.952,16.377,22.001,16.249,22.001z" />
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <div class="indicator">
        <div class="strip-display">
            <div class="strip" style="transform: matrix(1,0,0,1,0,0)">
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
        Edit.modules.collection.push({ type: 'homeSlider', instance: new Edit.modules.homeSlider('.escola') });
    })
</script>


<?php
break;
case 'clientes':
$full = get_sub_field('full_screen');
?>
<div class="block-text-and-image in-company">
    <div class="wrapper">


        <div class="pane-scroll">
            <div class="slider-item clientes <?php if($full): ?>header<?php endif; ?>">
                <div class="delayed">
                    <div class="background">
                        <div class="img" draggable="false" style="background-image:url('<?php the_sub_field('imagem_Fundo') ?>')"></div>
                        <div class="img-overlay"></div>
                    </div>
                </div>

                <div class="slider-media">
                </div>
                <div class="grid-cont" >
                    <div class="slider-description inner" >

                        <?php if(get_sub_field('titulo')): ?>
                            <h3><?php the_sub_field('titulo') ?></h3>
                        <?php endif; ?>

                        <div class="clientesContainer">

                            <?php if(have_rows('cliente')):     
                                $i = 0;
                                while(have_rows('cliente')):
                                    the_row();
                                    ?>
                                    <div class="item">
                                        <?php if(get_sub_field('nome')): ?>
                                            <a href="<?php the_sub_field('link') ?>" target="_blank" class="no-route">
                                                <img src="<?php the_sub_field('logo') ?>" alt="<?php the_sub_field('nome') ?>" />
                                            </a>

                                        <?php endif; ?>
                                        
                                    </div>
                                    <?php
                                    $i = $i+1;
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({ type: 'homeSlider', instance: new Edit.modules.homeSlider('.escola') });
    })
</script>


<?php
break;
case 'bloco_video':
?>
<div class="block-text-and-image text-right">
    <div class="grid-cont">
        <div class="video-block">
         <?php
         $videoLink = get_sub_field('url_video');
         $videoLink = str_replace('https:','',$videoLink);
         $videoLink = str_replace('http:','',$videoLink);
         $color = '';

         if (strpos($videoLink, 'vimeo') > 0)
            $color = '?color=ffdd00';
        ?>
        <iframe src="<?php echo $videoLink,$color; ?>" frameborder="0" width="100%" height="484" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function( $ ) {

        function videoContainerAjust() {
            var viewportWidth = $(window).width();
            var width = $(".video-block iframe").width();
            var height = $(".video-block iframe").height();
            console.log();
            if (viewportWidth >= 748) {

                $(".video-block iframe").css("width", "calc(100% - 15%)");
                $(".video-block iframe").css("margin-left", "7%");
                    //$(".slider .slider-item .slider-media iframe").css("height", "calc(100% - 2%)");

                } else if (viewportWidth < 748 && viewportWidth >= 360) {

                    //Iphone 6 plus 414
                    $(".video-block iframe").css("width", "calc(100% - 30%)");
                    $(".video-block iframe").css("margin-left", "15%");

                    $(".video-block iframe").css("height", "calc(100% - 15%)");

                } else if (viewportWidth < 414 && viewportWidth >= 375) {

                    //Iphone 6 375
                    $(".video-block iframe").css("width", "calc(100% - 25%)");
                    $(".video-block iframe").css("margin-left", "12%");
                    $(".video-block iframe").css("height", "calc(100% - 15%)");


                } else if (viewportWidth < 375 && viewportWidth >= 320) {

                    //Iphone 5 320
                    $(".video-block iframe").css("width", "calc(100% - 10%)");
                    $(".video-block iframe").css("margin-left", "5%");
                    $(".video-block iframe").css("height", "calc(100% - 15%)");
                }
            }

            videoContainerAjust();

            $(window).resize(videoContainerAjust);
        })
    </script>




    <div style="margin-bottom: 80px;"></div>

    <?php
    break;
    case 'bloco_texto_imagem':
    $leftCss = 'text-right';
    $hasImage = get_sub_field('imagem') == true;
    $mainBlockCss = 'block-text-and-image';
    $checkValue = get_sub_field('imagem_lado_direito');
    if($checkValue){
        $leftCss = 'text-left';
    }
    if(!$hasImage){
        $leftCss = '';
        $mainBlockCss = 'block-text-and-text';
    }
    $squareClass = '';
    if($mainBlockCss == 'block-text-and-text'){
        $squareClass = 'has-square';
    }
    if (get_the_ID()==41891){
        $squarecolor = '#009eff';
    }else{
        $squarecolor = '#f2d31f';
    }
    ?>
    <div class="<?php echo $mainBlockCss; ?> <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?> <?php echo $leftCss; ?> <?php echo $squareClass; ?>">
        <div class="grid-cont">
            <div class="inner">
                <div class="text block-medium">
                    <?php if(get_sub_field('titulo')): ?>
                        <?php if($mainBlockCss == 'block-text-and-text'):?>
                            <div class="square">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="90px" height="90px" viewBox="0 0 90 90" enable-background="new 0 0 90 90" xml:space="preserve">
                                <polygon fill="<?php echo $squarecolor; ?>" points="35,0 0,0 0,20 0,90 22,90 22,87 3,87 3,3 87,3 87,20 90,20 90,0 " />
                            </svg>

                        </div>
                    <?php endif;?>
                    <h3><?php the_sub_field('titulo'); ?></h3>
                <?php   endif; ?>
                <?php if(get_sub_field('subtitulo')): ?>
                    <h4><?php the_sub_field('subtitulo'); ?></h4>
                <?php   endif; ?>

                <?php
                if(have_rows('documentos')):
                    while(have_rows('documentos')):
                        the_row();
                        ?>
                        <div class="block-info">
                            <a class="download-btn no-route" href="<?php the_sub_field('pdf'); ?>" target="_blank">
                                <span class="icon icon-pdf"></span>
                                <div class="info">
                                    <p class="text-download">Download PDF</p>
                                    <span class="text-apresentacao" >
                                        <?php the_sub_field('texto_download_pdf'); ?>
                                    </span>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
                <?php if(get_sub_field('texto') && $hasImage): ?>
                    <p><?php the_sub_field('texto'); ?></p>
                <?php   endif; ?>
            </div>
            <?php
            if(get_sub_field('imagem')):
                $squareClass = '';
                $image = get_sub_field('imagem');
                switch (get_sub_field('quadrado_overlay'))
                {
                    case 'none':
                    $squareClass = '';
                    break;
                    case 'big':
                    $squareClass = 'big-square';
                    break;
                    case 'small':
                    $squareClass = 'small-square';
                    break;
                }
                ?>

                <div class="image block-medium <?php echo $squareClass; ?>">
                    <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url'] ?>" />
                </div>
                <?php else: ?>
                    <div class="text block-medium">
                        <?php if(get_sub_field('texto')): ?>
                            <?php the_sub_field('texto'); ?>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    break;
    case 'bloco_equipa':
    $tipo = get_sub_field('tipo');
    if($tipo == 'filtro'){
        ?>
        <!-- EQUIPA MODULE -->
        <div class="js-iso-module equipa filtered margin-50 js-equipa <?php get_sub_field('margem') == 'nenhuma' ? ' ' : the_sub_field('margem') ?>">
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
                Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-equipa', '/results/equipa-results/') });
            })
        </script>
    </div>


    <?php
}else{
    ?>
    <!-- EQUIPA MODULE -->
    <div class="filtered-content">
        <div class="js-iso-module equipa filtered margin-50  js-equipa">
            <div class="grid-cont">
                <div class="grid-sizer"></div>
                <div class="module-title stamp block-medium equipa filters">
                    <div class="title-cont">
                        <h2><?php the_sub_field('titulo'); ?></h2>
                    </div>
                    <div class="filters-holder">
                        <div class="responsive-header">
                            <div class="label">
                                <span><?php echo dictionary('o_que_procuras'); ?></span>
                            </div>
                            <div class="icon-cont">
                                <div class="icon">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                    <polygon fill="#000000" points="25,13 17,13 17,5 13,5 13,13 5,13 5,17 13,17 13,25 17,25 17,17 25,17 " />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="filter">
                            <!--  -->
                            <!-- <select id="inputCursos" data-exterior-label="Curso" name="inputCursos">-->
                                <option value="0" selected>Todos</option>
                                <?php
                                $arguments = array(
                                    'offset'           => '',
                                    'showposts'        => '-1',
                                    's'                => '',
                                    'category'         => '',
                                    'tag'              => '',
                                    'orderby'          => 'menu_order',
                                    'include'          => '',
                                    'exclude'          => '',
                                    'meta_key'         => '',
                                    'meta_value'       => '',
                                    'post_type'        => 'formacao_tipo',
                                    'post_mime_type'   => '',
                                    'post_parent'      => '',
                                    'post_status'      => '',
                                    'suppress_filters' => '0'
                                );
                                $tipos = get_posts( $arguments );
                                foreach($tipos as $tipo):
                                    ?>
                                    <option value="<?php echo $tipo->ID ?>"><?php echo $tipo->post_title; ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="filter">
                                <!-- <div class="default-btn filter-btn">
                                    <span class="label">Área</span>
                                    <div class="btn-icon">
                                        <div class="inner"></div>
                                    </div>
                                </div> -->
                                <!--<select id="inputArea" name="inputArea" data-exterior-label="Área" >-->
                                    <option value="0" selected>Todos</option>
                                    <?php
                                    $arguments = array(
                                        'offset'           => '',
                                        'showposts'        => '-1',
                                        's'                => '',
                                        'category'         => '',
                                        'tag'              => '',
                                        'orderby'          => 'menu_order',
                                        'include'          => '',
                                        'exclude'          => '',
                                        'meta_key'         => '',
                                        'meta_value'       => '',
                                        'post_type'        => 'formacao_area',
                                        'post_mime_type'   => '',
                                        'post_parent'      => '',
                                        'post_status'      => '',
                                        'suppress_filters' => '0'
                                    );
                                    $areas = get_posts( $arguments );
                                    foreach($areas as $area):
                                        ?>
                                        <option value="<?php echo $area->ID ?>"><?php echo $area->post_title; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="responsive-interface">
                            <div class="grid-cont">
                                <div class="default-btn modal-btn disabled clear">
                                    <span class="label"><?php dictionary("Limpar") ?></span>
                                </div>
                                <div class="default-btn modal-btn disabled okay">
                                    <span class="label">Ok</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php get_template_part( 'partials/partial', 'equipa-response' ); ?>
            </div>
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
                                <path d="M15,25c-1.104,0-2-0.995-2-2.223V7.223C13,5.995,13.896,5,15,5s2,0.995,2,2.223v15.555C17,24.005,16.104,25,15,25z" />
                            </g>
                            <g>
                                <path d="M22.777,17H7.223C5.995,17,5,16.104,5,15s0.995-2,2.223-2h15.555C24.005,13,25,13.896,25,15S24.005,17,22.777,17z" />
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="line"></div>
            </div>
            <script>
                jQuery(document).ready(function( $ ) {
                    Edit.modules.collection.push({ type: 'loadMore', instance: new Edit.modules.loadMore('.js-loadmore', false, '/results/equipa-results/') });
                })
            </script>
        </div>
        <!-- END LOAD MORE MODULE -->
        <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-equipa', '/results/equipa-results/') });
            })
        </script>
    </div>
</div>
<!-- END EQUIPA MODULE -->
<?php
}
break;
endswitch;
?>


<?php
endwhile;
endif;
?>
<?php
if (get_field('artigos_relacionados')):
	get_template_part('partials/partial', 'artigos-relacionados');
endif;
?>
<?php if(get_field('formulario_mais_info')):?>
    <div class="block-mais-info" style="padding-bottom: 100px;padding-top: 20px; background-color:white;">

        <div class="default-btn btn-icon mais-info open-form">
            <div class="border"></div>
            <p class="label"><?php the_field('texto_botao_mais_info'); ?></p>
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
    </div>
<?php endif;?>
<!-- MAP MODULE -->
<?php
$arguments = array(
    'offset'           => '',
    'showposts'        => '0',
    'order'            => 'ASC',
    'orderby'          => 'menu_order',
    'post_type'        => 'localizacoes',
    'suppress_filters'  => '0'
);
$locations = get_posts( $arguments );
$gmapsObject = '';
$isFirst = true;
if($locations):
    ?>
    <div class="gmaps-module js-map-module hide-md">
        <div id="map" class="map-nav">
            <div class="grid-cont">
                <?php
                foreach($locations as $post):
                    setup_postdata($post);
                    $gmap = get_field('localizacao');
                    $phone = str_replace(' ','',get_field('telefone'));
                    if($gmap){
                        if($isFirst){
                            $gmapsObject .=  "{id:'".$post->ID."',location:{lat:'".$gmap['lat']."', lng:'".$gmap['lng']."'}}";
                        }else{
                            $gmapsObject .=  ",{id:'".$post->ID."',location:{lat:'".$gmap['lat']."', lng:'".$gmap['lng']."'}}";
                        }
                    }
                    ?>
                    <div class="grid-1-2">
                        <div data-location="<?php echo $post->ID; ?>" class="map-block block-medium <?php if($isFirst): ?> active<?php endif; ?>">
                            <div class="block-content">
                                <div class="block-description">
                                    <span class="location"><?php the_field('nome'); ?></span>
                                    <h3 class="location-name"><?php the_field('titulo'); ?></h3>
                                    <p class="location-address"><?php the_field('morada_rua'); ?></p>
                                    <p class="location-address-details"><?php the_field('morada'); ?></p>
                                    <a class="location-link no-route" href="tel:<?php echo $phone; ?>"><?php the_field('telefone'); ?></a>
                                    <a class="location-link no-route" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $isFirst = false;
                endforeach;
                ?>
            </div>
        </div>
        <div id="directions-interface">
            <input type="text" id="directions-input" name="directions-input" placeholder="<?php dictionary("Onde_estou") ?>" />
            <div class="directions-btn btn-icon">
                <div class="inner">
                    <div class="icon">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                        <path d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                        c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                        c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div id="map-canvas">
    </div>
    <script>
        jQuery(document).ready(function( $ ) {

            setTimeout(function () {
                if (window.location.href.indexOf("#map?loc=") > -1) {
                    $('html, body').animate({ scrollTop: $("#map-canvas").offset().top }, 1000);
                }
            }, 2000);


            $(".location-map-link").click(function () {
                location.reload();
            });

            Edit.modules.collection.push({ type: 'mapModule', instance: new Edit.modules.mapModule('.js-map-module', [<?php echo $gmapsObject; ?>]) })
        })
    </script>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.pageLoader.totalModules = 3;
            // If exists n+ modules of isomodule call:
            Edit.modules.isoModuleResponsive.init();
        })
    </script>
<?php endif; ?>
<!-- END MAP MODULE -->
</div>



