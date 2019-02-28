<?php
/**
* The template for Recrutamento Detalhe
*
* @package Edit
*/
if( get_field('empresa') ):
    $empresa = get_field('empresa');
    $empresa = $empresa[0];
endif;
?>
<div class="content">
    <?php if(get_field('form_recrutamento')): ?>
        <div class="slider form flex full recrutamento vaga js-formmodal">
            <input id="idRecruit" value="" type="hidden">
            <div class="form-content">
                <div class="btn">
                    <?php the_field('label_form_titulo_recrutamento'); ?>
                    <div class="btn-close">
                        <div class="icon-close">
                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                <path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                                c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                                c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"/>
                            </svg>
                            <svg version="1.0" id="invert" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                <path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                                c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                                c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <form novalidate="novalidate" id="register-vaga">
                <div class="wrapper">
                    <div class="pane-scroll">
                        <div class="slider-item">
                            <div class="grid-cont">
                                <div class="content v-align">
                                    <input id="id" name="id" type="hidden" value="<?php echo get_the_ID(); ?>" />
                                    <input id="link" name="link" type="hidden" value="<?php the_permalink(); ?>" />
                                    <input id="localizacao" name="localizacao" type="hidden" value="<?php the_field('local'); ?>" />
                                    <input id="recrutamento" name="recrutamento" type="hidden" value="<?php the_field('titulo'); ?>" />
                                    <input id="nome" name="name" type="text" data-type="text" placeholder="<?php dictionary("NOME") ?>" />
                                    <input id="email" name="email" type="text" data-type="email" placeholder="EMAIL" />
                                    <input id="telefone" name="telefone" data-type="phone" type="text" placeholder="<?php dictionary("PHONE_PLUS") ?>" />
                                    <textarea name="message" id="message" placeholder="<?php dictionary("Resumo") ?>"></textarea>
                                    <!-- Upload -->
                                    <div class="editUpload">
                                        <div class="full file">
                                            <div class="progress-wrap">
                                                <div class="content">
                                                    <input type="file" name="inputUpload" data-type="file" class="withIcon" id="inputUpload">
                                                    <div class="fake-file-input">
                                                        <div class="label">
                                                            <span id="cvMessage"><?php dictionary("Adicionar_CV") ?></span>
                                                        </div>
                                                        <div class="icon">
                                                            <img alt="svg" src="<?php bloginfo('template_url'); ?>/img/svg/upload-icon.svg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="progress-bar">
                                                    <div class="progress-inner">
                                                    </div>
                                                </div>
                                                <label class="info"><?php dictionary("Tamanho_maximo") ?></label>
                                            </div>
                                        </div>
                                        <div class="full nameFile-cont">
                                        </div>
                                    </div>
                                    <!-- End Upload -->

                                    <div class="content-radio interests">
                                        <label class="area-label">Interesses</label>
                                        <div class="checkbox">
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-1" value="Marketing Digital" >
                                                <label class="interests" for="interest-1"></label>
                                                Marketing Digital
                                            </div>
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-2" value="Design Digital" >
                                                <label class="interests" for="interest-2"></label>
                                                Design Digital
                                            </div>
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-3" value="Frontend" >
                                                <label class="interests" for="interest-3"></label>
                                                Front-End
                                            </div>
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-4" value="Mobile" >
                                                <label class="interests" for="interest-4"></label>
                                                Mobile
                                            </div>
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-5" value="UX/UI" >
                                                <label class="interests" for="interest-5"></label>
                                                UX/UI
                                            </div>
                                            <div class="radio">
                                                <input type="checkbox" name="checkbox[]" id="interest-6" value="Business" >
                                                <label class="interests" for="interest-6"></label>
                                                Business
                                            </div>
                                        </div>
                                    </div>
                                    <div class="default-btn btn-submit">
                                        <span class="label">
                                            <?php
                                            $formSubmit = get_field('label_form_submit_recrutamento');
                                            if($formSubmit != false && $formSubmit != ''):
                                                echo $formSubmit;
                                            else:
                                                dictionary("Candidatar-me");
                                            endif;
                                            ?>
                                        </span>
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

         jQuery(document).ready(function( $ ) {
            Edit.modules.collection.push({ type: 'formModal', instance: new Edit.modules.formModal('.js-formmodal', 'recrutamento_form','recrutamento') });
        })
    </script>
<?php endif; ?>
<!-- HEADER MODULE -->
<div class="header js-header flex small">
    <div class="wrapper">
        <div class="header-item">
            <div class="background">
                <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/bg.jpg)">
                </div>
                <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)">
                </div>
                <div class="grid-cont">
                    <div class="header-description">
                        <div class="square">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="70px" height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve">
                            <polygon fill="#FFFFFF" points="67,60 67,67 3,67 3,3 67,3 67,10 70,10 70,0 0,0 0,70 70,70 70,60 " />
                        </svg>
                    </div>
                    <div class="summary">
                        <h1 style="text-transform: none;"><?php dictionary("RECRUTAMENTO") ?></h1>
                    </div>
                    <div class="icon-cont"></div>
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
<!-- BLOG MODULE -->
<div class="filtered-content">
    <div class="recruitment-module filtered js-cursos">
        <div class="grid-cont">
            <div class="recruit-detail recruitment" data-old="block-full">
                <div class="block-content">
                    <div class="inner">
                        <div class="flex-container">
                            <div class="image" draggable="false" style="background-image: url(<?php the_field('logo',$empresa);?>)">
                            </div>
                            <div class="block-text title">
                                <h2><?php the_field('titulo'); ?></h2>
                            </div>
                        </div>
                        <div class="block-list">
                            <ul class="left">
                                <li>Empresa</li>
                                <li><?php dictionary("Localizacao") ?></li>
                                <li>Sector</li>
                                <li><?php dictionary("Funcao") ?></li>
                                <?php if(get_field('referencia')): ?>
                                    <li><?php dictionary("Referencia") ?></li>
                                <?php endif; ?>
                                <?php if(get_field('tipo_funcao')): ?>
                                    <li><?php dictionary("Regime") ?></li>
                                <?php endif; ?>
                                <li><?php dictionary("Data") ?></li>
                            </ul>
                            <ul class="right">
                                <li><?php the_field('nome',$empresa);?></li>
                                <li><?php the_field('local');?></li>
                                <li><?php the_field('sector',$empresa);?></li>
                                <li><?php the_field('funcao'); ?></li>
                                <?php if(get_field('referencia')): ?>
                                    <?php
                                    if(get_field('link_referencia')): ?>
                                        <style>
                                        .link_referencia {
                                            color: #f2d31f;
                                            text-decoration: none;
                                        }
                                        .link_referencia:hover {
                                            text-decoration: underline;
                                        }
                                    </style>
                                    <li>
                                        <a class="link_referencia" href="<?php the_field('link_referencia'); ?>" target="_blank"><?php the_field('referencia'); ?></a>
                                    </li>;
                                    <?php else: ?>
                                        <li>
                                            <?php the_field('referencia'); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(get_field('tipo_funcao')): ?>
                                    <li>
                                        <?php the_field('tipo_funcao') ?>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <?php 
                                    $date = DateTime::createFromFormat('Ymd', get_field('data'));
                                    echo $date->format('d/m/Y');
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <?php get_template_part( 'partials/partial', 'genericblocks'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if(get_field('form_recrutamento')) { ?>
            <div class="block-formacao-info form-content candidatura">
                <?php if(get_field('formulario_recrutamento_url')): ?>
                    <a class="link btn" href="<?php the_field('form_url') ?>" target="_blank">
                        <?php the_field('label_form_submit_recrutamento'); ?>
                        <div class="icon form-btn btn-icon">
                            <div class="inner">
                                <div class="icon">
                                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                        <path fill="#000" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
                                        c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
                                        c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php else: ?>
                        <div class="btn">
                            <?php the_field('label_form_submit_recrutamento'); ?>
                            <div class="icon form-btn btn-icon">
                                <div class="inner">
                                    <div class="icon">
                                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
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
            <?php } ?>
        </div>
    </div>
</div>
<!-- END BLOG MODULE -->
<?php
if (get_field('artigos_relacionados')):
    get_template_part('partials/partial', 'artigos-relacionados');
endif;?>

<script>
 var sending = "a enviar";
 var success = "<?php dictionary("Sucesso") ?>";
 var form_sucesso = "<?php dictionary("Pedido_enviado_com_sucesso") ?>";
 var nonceUpload = '<?php echo wp_create_nonce("Edit Upload CV");?>';
 var cursoN = '<?php echo wp_create_nonce("edit Nonce Recrutamento Form");?>';

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
    $parent = get_post(21);
    $parent_url = get_permalink($parent->ID);
    $currentUrl = $_SERVER['REQUEST_URI'];
    $arr = explode('?ajax=true',$currentUrl);
    $filter= '';
    if(sizeof($arr) > 1){
        $filter = '?'.$arr[1];
        $filter = str_replace('&inputDistrito=0',"",$filter);
        $filter = str_replace('&inputTipo=0',"",$filter);
        $filter = str_replace('&inputArea=0',"",$filter);
        $filter = str_replace('?&',"?",$filter);
    }
    $meta_query = array('relation' => 'AND');
    $distrito = '';
    $tipo = '';
    $area = '';
    $queryString = '';
    if(isset($_REQUEST['inputDistrito'])) {
        $distrito = $_REQUEST['inputDistrito'];
        if($queryString == ''){
            $queryString = $queryString . '?inputDistrito=' . $distrito;
        }else{
            $queryString = $queryString . '&inputDistrito=' . $distrito;
        }
    }
    if(isset($_REQUEST['inputTipo'])) {
        $tipo = $_REQUEST['inputTipo'];
        if($queryString == ''){
            $queryString = $queryString . '?inputTipo=' . $tipo;
        }else{
            $queryString = $queryString . '&inputTipo=' . $tipo;
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
    if($distrito != '0' && $distrito != ''):
        array_push(
            $meta_query,
            array(
                    'key'   => 'localizacao', // name of custom field
                    'value' => $distrito,
                )
        );
    endif;
    if($tipo != '0' && $tipo != ''):
        array_push(
            $meta_query,
            array(
                    'key'   => 'tipo', // name of custom field
                    'value' => $tipo,
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
    $order = 'DESC';
    $orderBy = 'meta_value';
    $post_type = 'recrutamento';
    $postId = $wp_query->post->ID;
    $links = getNextAndPreviousLinks($order,$orderBy,$post_type,$meta_query, $postId, $queryString, 'data');
    $parent_url = str_replace(home_url(),"",$parent_url.$queryString);
    ?>
    Edit.modules.collection.push({ type: 'innerNavigation', instance: new Edit.modules.innerNavigation('<?php echo $links["next"];?>', '<?php echo $links["prev"]; ?>', '<?php echo $parent_url; ?>') })
    Edit.pageLoader.totalModules = 1;
    Edit.modules.shareLightbox('.block-share');
    jQuery('#inputUpload').fileupload({
        url: '/wp-admin/admin-ajax.php?action=cv_upload&nonce=' + nonceUpload,
        replaceFileInput: 'false',
        dataType: 'json',
        add: function (e, data) {
                    //    //debugger;
                    var fileType = data.files[0].name.split('.').pop(), allowdtypes = 'jpeg,JPEG,jpg,JPG,png,gif,docx,pdf';
                    if (allowdtypes.indexOf(fileType) < 0) {
                        jQuery("#cvMessage").html('Ficheiro Inválido.');
                        setTimeout(function () {
                            jQuery("#cvMessage").html('Adicionar CV');
                        }, 3000);
                        return false;
                    }
                    //because this is single file upload I use only first index
                    var f = data.files[0];
                    //here I CHECK if the FILE SIZE is bigger than 8 MB (numbers below are in bytes)
                    if (f.size > 3388608 ||  f.fileSize > 3388608) {
                    //show an alert to the user
                    jQuery("#cvMessage").html('Max. 3 MB.');
                    setTimeout(function () {
                        jQuery("#cvMessage").html('Adicionar CV');
                    }, 1500);
                    return false;
                }
                data.submit();
            },
            done: function (e, data) {
                jQuery('.file .progress-bar .progress-inner').attr('style', '');
                if (data.result.Status) {
                    jQuery('.file').removeClass('loading');
                    if (jQuery('#uploadIdHidden').length > 0 || jQuery('.nameFile-cont .nameFile').length > 0) {
                        jQuery('#uploadIdHidden').remove();
                        jQuery('.nameFile-cont').empty();
                    }
                    jQuery('.file').append('<input id="uploadIdHidden" type="hidden" name="uploadId" value="' + data.result.id + '" />');
                    jQuery('.nameFile-cont').append('<div class="nameFile"><div class="delete-file-cont"><img class="svg" src="<?php bloginfo('template_url');?>/img/svg/delete-file-icon.svg" /></div><div class="label-cont"><p>' + data.result.filename + '</p></div></div>')
                    jQuery('.delete-file-cont').on('click', function () {
                        jQuery(this).parent().remove();
                        jQuery('#recruit-form [name="inputUpload"]').val('');
                        jQuery('#uploadIdHidden').remove();
                    })
                }
            }
        });
});

</script>



