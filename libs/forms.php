<?php

/**
* Utils short summary.
*
* Utils description.
*
* @version 1.0
* @author nuno.ildefonso
*/

/////////////////////////////////////////
// FORMS
////////////////////////////////////////


function workshop_form() {

    global $wpdb;
    
    $status = true;
    $message = 'Pedido de inscrição enviado';
    $die = check_ajax_referer( 'edit Nonce Registration Form', 'nonce', false);

    if (!$die ) {
        die('no no no diabito');
    }

    $email = '';

    

    // Check obrigatorios
    if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['telefone']) && isset($_POST['pais']) && isset($_POST['cidade']) && isset($_POST['interests']) && isset($_POST['assunto']) && isset($_POST['url']) ) {

        $name = $_POST['name'];
        $emailPost =  $_POST['email'];
        //$bd = $_POST['bd'];
        $telefone = $_POST['telefone'];
        $pais = $_POST['pais'];
        $cidade = $_POST['cidade'];
        $interests = $_POST['interests'];
        $assunto = $_POST['assunto'];
        $course = $_POST['curso'];
        $local = $_POST['local'];
        $messagePost = $_POST['message'];
        $url = $_POST['url'];
        $post_id = $_POST['post_id'];



        //$date = $bd . ' 00:00:00';

        $wpdb->insert(
            'registration',
            array(
                'name' => $name,
                'email' => $emailPost,
                'message' => $messagePost,
                'city' => $cidade,
                'country' => $pais,
                'mobile' => $telefone,
                'course' => $course,
                'observations' => $assunto,
                'interests'  => $interests,
                'url' => $url
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );

    } else {
        $status = false;
        $message = 'Fields missing';
    }

    if (!is_email($emailPost)) {
        $status = false;
        $message = 'Not a valid email diabito';
    }

    if ($status) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        $mailAssunto = 'Contacto';
       
        
        $tipo_formacao = get_field('tipo_formacao', $post_id);        

        foreach( $tipo_formacao as $p2):
            $tipo_formacao = get_the_title($p2->ID);
            $tipo_formacao_ID = $p2->ID;
        endforeach; 

        $local_formacao = get_field('localizacao', $post_id);        

        foreach( $local_formacao as $p2):
            $local_formacao_ID = $p2->ID;
        endforeach; 
        
        $environment = ENVIRONMENT;
        if ($environment == 'production') {
            if ($tipo_formacao=='Workshop'){
                $emailsWorkshopForm = 'geral@edit.com.pt,noemi.lomelino@edit.com.pt,emanuel.soares@edit.com.pt';
            }else{
                $emailsWorkshopForm = 'geral@edit.com.pt, eva.pinho@edit.com.pt, joana.morujo@edit.com.pt';
            }
            if ($emailPost=='afbbento@gmail.com'){
                $emailsWorkshopForm = 'afbbento@gmail.com';
            }
            
        } else {
            $emailsWorkshopForm = 'afbbento@gmail.com';
        }


        $args = array(
            'numberposts'	=> 1,
            'posts_per_page' => 1,
            'post_type'		=> 'coordenadores',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'tipo_formacao', 
                    'value' => $tipo_formacao_ID, 
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'localizacao', 
                    'value' => $local_formacao_ID, 
                    'compare' => 'LIKE'
                )
            ),   
        );
        $the_query = new WP_Query( $args );
        
        if( $the_query->have_posts() ):
            while( $the_query->have_posts() ) : $the_query->the_post();
                $nome_colaborador = get_the_title();
                $avatar_colaborador = get_field('avatar');
                $email_colaborador = get_field('email');
                $telefone_colaborador = get_field('telefone'); 
                $funcao_colaborador = get_field('funcao_colaborador');                               
            endwhile;
        endif;
        wp_reset_query();	
        if ($environment != 'production') {
            $avatar_colaborador = 'https://edit.com.pt/wp-content/uploads/2019/09/coordenador.jpg';
        }
        
        $url_key = 'wM3fJ4Y2';
        $encode_post_id = $url_key.strtr(base64_encode($post_id), '+/=', '._-');

        $dia = date("j");
        $month = date("n");        
        $ano = date("Y");
                
        switch ($month) {
            case '1':
                $mes_pt = 'Janeiro';                
                break;
            case '2':
                $mes_pt = 'Fevereiro';   
                break;
            case '3':
                $mes_pt = 'Março';
                break;
            case '4':
                $mes_pt = 'Abril';
                break;
            case '5':
                $mes_pt = 'Maio';
                break;
            case '6':
                $mes_pt = 'Junho';
                break;
            case '7':
                $mes_pt = 'Julho';
                break;
            case '8':
                $mes_pt = 'Agosto';
                break;
            case '9':
                $mes_pt = 'Setembro';
                break;
            case '10':
                $mes_pt = 'Outubro';
                break;
            case '11':
                $mes_pt = 'Novembro';
                break;
            case '12':
                $mes_pt = 'Dezembro';
                break;                
        }

        $data_actual = $dia.' '.$mes_pt.', '.$ano;
        $pronta_enviar = get_field('pronta_a_enviar', $post_id);

        $encode_post_id = $url_key.strtr(base64_encode($post_id), '+/=', '._-');
        $encode_url_name = strtr(base64_encode($name), '+/=', '._-');

        if ($pronta_enviar == '1'){
        

        $email = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit - Newsletter</title>
                <style type="text/css">
                    @import url(https://fonts.googleapis.com/css?family=Roboto:300,300italic);          
                    table{
                    border-collapse:collapse;
                    }
                    img,a img{
                    border:0;
                    outline:none;
                    text-decoration:none;
                    }           
                    a{
                    word-wrap:break-word;
                    }            
                    table,td{
                    mso-table-lspace:0pt;
                    mso-table-rspace:0pt;
                    }
                    #outlook a{
                    padding:0;
                    }
                    img{
                    -ms-interpolation-mode:bicubic;
                    }
                    body,table,td,p,a,li,blockquote{
                    -ms-text-size-adjust:100%;
                    -webkit-text-size-adjust:100%;
                    }                     
                    td.content-wrapper{
                        padding-left: 10% !important;
                        padding-right: 10% !important;
                    }
                    td.content-wrapper-lg{
                        padding-left: 5% !important;
                        padding-right: 5% !important;
                    }  
                    @media only screen and (max-width: 660px){
                        body,table,td,p,a,li,blockquote{
                            -webkit-text-size-adjust:none !important;
                        }
                        body{
                            width:100% !important;
                            min-width:100% !important;
                        }
                        td.content-wrapper{
                            padding-left: 20px !important;
                            padding-right: 20px !important;
                        }
                        .coord-name{
                            line-height: 1 !important;
                        }
                        .alumni-name{
                            height: 48px;
                        }
                    }
                </style>
            </head>
            <body style="margin: 0;padding: 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background-color: #FFFFFF;">
                        <tr>
                            <td align="center" valign="top">
                                <!-- BEGIN TEMPLATE // -->
                                <p style="
                            font-size: 12px;
                            font-family: arial;
                            padding: 18px 80px 0;
                            font-family: Helvetica, Arial;
                            color: #8d8d8d;
                            font-size: 11px;
                            font-weight: normal;
                                ">Não consegues visualizar esta mensagem? <span style="
                            text-decoration: underline;
                        "><a style="color: #8d8d8d;"href="https://edit.com.pt/newsletter-preview/?id='.$encode_post_id.'&n_name='.$encode_url_name.'">Clica aqui</a></span></p>
                                <table border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #D8D8D8;max-width: 700px;">                            
                                    <tr>
                                        <td align="center" valign="top">
                                            <!-- BEGIN HEADER // -->
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #000000; border-top: 0;border-bottom: 0;">
                                                <tr>
                                                    <td valign="top" style="font-weight:normal; padding: 0 80px;" class="content-wrapper">                                                                                                                                        
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 40px 18px 18px;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                       
                                                       
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td valign="top">
                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="middle">
                                                                                         <img alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/logo-edit.png" width="153" style="max-width:153px; padding-bottom: 0; display: inline !important; vertical-align: bottom;">                                                                               
                                                                                    </td>
                                                                                    <td valign="middle" style="text-align: right;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;color: #828282;">
                                                                                        '.$data_actual.'                                                                              
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 40px 18px 18px;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding-bottom: 70px; font-family: Helvetica, Arial;font-size: 45px;font-weight: normal;color:#FFFFFF;">
                                                                        Olá '.$name.'
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END HEADER -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <!-- BEGIN BODY // -->
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td valign="top" >
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td  style="padding: 30px 18px 0px;">
                                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
        
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td style="padding: 35px 80px 0;font-family: Helvetica, Arial;color: #8d8d8d;font-size: 16px;font-weight: normal;" class="content-wrapper">
                                                                       Obrigado pelo teu interesse no '.$tipo_formacao.' de '.$course.'.
                                                                        <br><span style="color:#000000">Iremos entrar em contacto contigo durante as próximas 48 horas úteis.</span>
                                                                        <br><br>                                                               
                                                                        Entretanto caso necessites de algum esclarecimento não hesites em entrar em contacto comigo.
                                                                        <br><br>  
                                                                        Cumprimentos,
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>           
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td style="padding: 40px 80px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="70" style="padding-right: 20px;">
                                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" style="">
                                                                                                        <img align="center" alt="" src="'.$avatar_colaborador.'" style="width: 70px;padding-bottom: 0; display: inline !important; vertical-align: bottom;">                                                                               
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" style="">
                                                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 20px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.55;letter-spacing: normal;color: #000000;" class="coord-name">
                                                                                                                       '.$nome_colaborador.'
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #8d8d8d;">
                                                                                                                        '.$funcao_colaborador.'
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.55;letter-spacing: normal;color: #000000;">
                                                                                                                       <a style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.55;letter-spacing: normal;color: #000000;text-decoration: none;" href="mailto:'.$email_colaborador.'">'.$email_colaborador.'</a>
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #000000;">
                                                                                                                       '.$telefone_colaborador.'
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>                                                                           
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 10px 80px 30px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>                                     
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Notícias
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>';
                                                        $noticias = get_field('newsletter_noticia', $post_id);
                                                        $palavras_bold = get_field('titulo_bold_noticia', $post_id);
                                                        
                                                        

                                                        if( $noticias ):  
                                                            foreach( $noticias as $p): 
                                                                $titulo_noticia = get_the_title( $p->ID );
                                                                $split =  split2($titulo_noticia,' ', $palavras_bold);
                                                                
                                                                $bg_noticia_newsletter = get_field("imagem_newsletter", $p->ID); 
                                                                if ($bg_noticia_newsletter ==''){
                                                                    $bg_noticia = get_field("fundo_header", $p->ID);
                                                                }else{
                                                                    $bg_noticia = $bg_noticia_newsletter;
                                                                }
                                                                 
                                                                
                                                                $link_noticia = get_permalink( $p->ID );
                                                                if(get_field("blocos", $p->ID)){
          
                                                                    $blocos_stories = get_field("blocos", $p->ID);
                                                                                                                                                                        
                                                                    foreach($blocos_stories as $blocos_storie){
                                                                    $tipo_bloco =  $blocos_storie['tipo_de_bloco'];
                                                                                
                                                                        foreach($tipo_bloco as $tipos_blocos ){
                                                                            $tipos_blocos['acf_fc_layout'];
                                                                            
                                                                            if ($tipos_blocos['acf_fc_layout'] == 'texto_noticias') {
                                                                            
                                                                                $texto .= $tipos_blocos['texto'];                     
                                                                                $var = explode('.', strip_tags($texto));
                                                                                $short_text = array_slice($var, 0, 2);
                                                                                
                                                                            }
                                                                        }
                                                                    }
                                                                   
                                                               }
                                                              
                                                            
                                                                $email .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="padding: 0 40px;" class="content-wrapper-lg">
                                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody>                                                                        
                                                                                    <tr>
                                                                                        <td valign="bottom" style="background-image:url('.$bg_noticia.');background-position: center;max-width:620px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal; height: 360px;background-size: cover;">                                                                                
                                                                                            <div style="height: 10px;background-color:#ffdd06;width: 50%;"></div>                                                                               
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding: 40px 40px 4px;font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: bold;font-style: normal;">                                                                                
                                                                                            '.$split[0].'
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding:0px 40px;font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: 300;font-style: normal;">                                                                                
                                                                                            '.$split[1].'
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding:30px 40px;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #8d8d8d;">                                                                                
                                                                                        '.$short_text[0].'.
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding:0px 40px 40px;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #000000;">                                                                                
                                                                                            <a href="'.$link_noticia.'" target="_blank" style="color:#000000; text-decoration: none;"><span style="color: #8d8d8d;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;">•</span> Ler mais</a>
                                                                                        </td> 
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>';

                                                                endforeach; 
                                                            
                                                                wp_reset_postdata(); 
                                                        endif; 
                                                        
                                                        $email .= '
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 10px 80px 30px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Formações
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                         <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 0 80px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>';
                                                                                $formacoes = get_field('newsletter_formacoes', $post_id);

                                                                                if( $formacoes ): 
                                                                                    $n_formacao = 0;
                                                                                    foreach( $formacoes as $p):
                                                                                        
                                                                                        $title_formacao = get_field('titulo', $p->ID); 
                                                                                        $link_formacao = get_permalink( $p->ID );                                                                                        
                                                                                        

                                                                                        if( have_rows('bloco_infomacao') ):
                                                                                            while ( have_rows('bloco_infomacao') ) : the_row();                                                                                 
                                                                                                 $tipo = get_sub_field('css_tipo');
                                                                                                 if ($tipo=='icon-data'){
                                                                                                     $data_formacao = get_sub_field('info_titulo');
                                                                                                 }                                                                                    
                                                                                            endwhile;                                                                                        
                                                                                        endif;     

                                                                                        $tipo_formacao = get_field('tipo_formacao', $p->ID); 
                                                                                        foreach( $tipo_formacao as $p2):
                                                                                            $tipo_formacao_title = get_the_title($p2->ID);
                                                                                        endforeach;
                                                                                        
                                                                                        switch ($tipo_formacao_title) {
                                                                                            case 'Workshop':
                                                                                                $logo_formacao = 'https://edit.com.pt/wp-content/themes/edit/newsletter-edit/workshop.png';
                                                                                                $cor_formacao = '#65c4b3';
                                                                                                break;
                                                                                            case 'Curso/Programa':
                                                                                                $logo_formacao = 'https://edit.com.pt/wp-content/themes/edit/newsletter-edit/programas.png';
                                                                                                $cor_formacao = '#EAD23F';
                                                                                                break;
                                                                                            case 'Curso Intensivo':
                                                                                                $logo_formacao = 'https://edit.com.pt/wp-content/themes/edit/newsletter-edit/intensivo.png';
                                                                                                $cor_formacao = '#e98375';
                                                                                                break;
                                                                                        }
                                                                                        
                                                                                    $email .= '<td valign="top" width="50%">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <img align="center" alt="" src="'.$logo_formacao.'" style="width: 100%;padding-bottom: 0; display: inline !important; vertical-align: bottom;">
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial; padding-top: 25px;padding-bottom: 5px;color: '.$cor_formacao.';font-size: 16px;font-weight: normal;">
                                                                                                        '.$tipo_formacao_title.'
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;padding-bottom: 10px;color: '.$cor_formacao.';font-size: 20px;font-weight: normal;">
                                                                                                        '.$title_formacao.'
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;color: '.$cor_formacao.';font-size: 16px;font-weight: normal;" class="alumni-name">
                                                                                                        '.$data_formacao.'
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="padding-top: 25px;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;">
                                                                                                        <a href="'.$link_formacao.'" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;text-decoration: none;color:#000000;"><span style=" color: #8d8d8d;">•</span> Mais informações</a>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    ';
                                                                                    if($n_formacao==0){
                                                                                        $email .='<td valign="top" >
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="40px">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>';  
                                                                                    } 
                                                                                    $n_formacao++;
                                                                                
                                                                                    endforeach;
                                                                                endif; 

                                                                                                                                                                                                                                                                                                                                                                    
                                                                    $email .= '</tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 60px 80px 20px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Alumni Stories
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 0 80px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>';
                                                        $newsletter_stories = get_field('newsletter_stories', $post_id);

                                                        if( $newsletter_stories ):                       
                                                            foreach( $newsletter_stories as $p): 
                                                                $link_story = get_permalink( $p->ID );
        
                                                                if(get_field('fundo_header', $p->ID)){                                                       
                                                                    //FOTO
                                                                    $foto = get_field('fundo_header', $p->ID);                                                          
                                                                }

                                                                if(get_field('home_titulo', $p->ID)){                                                       
                                                                    //NOME
                                                                    $story_name = get_field('home_titulo', $p->ID);
                                                                }
                                                                
                                                                if(get_field('alumni_stories', $p->ID)){                                                       
                                                                    //TITULO ENTREVISTA A ALUNO
                                                                    $entrevista_a = get_field('alumni_stories', $p->ID);                                                        
                                                                }
                                                                
                                                                                $email .= '<td valign="top" width="50%">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="250px">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td style="width: 250px;
                                                                                                                    background-image: url('.$foto.');
                                                                                                                    height: 250px;
                                                                                                                    background-size: auto 100%;
                                                                                                                    background-position: top right !important;">
                                                                                                                        <span></span>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial; padding-top: 25px;padding-bottom: 5px;color: #8d8d8d;font-size: 16px;font-weight: normal;">
                                                                                                        '.$entrevista_a.'
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;padding-bottom: 10px;color: #000000;font-size: 20px;font-weight: normal;" class="alumni-name">
                                                                                                        '.$story_name.'
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>                                                                                    
                                                                                                <tr>
                                                                                                    <td valign="top" style="padding-top: 10px;font-family: Helvetica, Arial;color: #65c4b3;font-size: 16px;font-weight: normal;">
                                                                                                        <a href="'.$link_story.'" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;text-decoration: none;color:#000000;"><span style=" color: #8d8d8d;">•</span> Ver entrevista</a>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td valign="top">
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="40px">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>';                                                              
                                                            endforeach;                        
                                                        endif;                                                                                                                                                                   
                                                                            $email .='</tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 60px 80px 20px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Carreiras
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>';

                                                        $newsletter_carreiras = get_field('newsletter_carreiras', $post_id);


                                                            if( $newsletter_carreiras ): 

                                                                foreach( $newsletter_carreiras as $p): 
                                                                        
                                                                    $link_carreira = get_permalink( $p->ID );
                                                                                                                                   
                                                                    $bg_carreira_newsletter = get_field("imagem_newsletter", $p->ID); 
                                                                    if ($bg_carreira_newsletter ==''){
                                                                        $foto_carreira = get_field("fundo_header", $p->ID);
                                                                    }else{
                                                                        $foto_carreira = $bg_carreira_newsletter;
                                                                    }

                                                                    if(get_field('subtitulo', $p->ID)){                                                       
                                                                        
                                                                        $subtitulo_carreira = get_field('subtitulo', $p->ID);                                                          
                                                                    }

                                                                    $titulo_carreira = get_the_title( $p->ID );
                                                                  
                                                                    if( have_rows('blocos_profissoes', $p->ID) ):
                                                                        while ( have_rows('blocos_profissoes', $p->ID) ) : the_row();                                                             
                                                                            if( get_row_layout() == 'header' ):                                                                
                                                                                $texto_carreira = get_sub_field('texto');
                                                                            endif;                                                                             
                                                                        endwhile;                                                                                                                                                                                                        
                                                                    endif;
                                                                                                                                    
                                                                endforeach; 
                                                            endif;
                                                            
                                                            
                                                        $email .= '
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 0 80px;" class="content-wrapper">
                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                                            <tbody>                                                                        
                                                                                <tr>
                                                                                    <td valign="top" style="width:153px;padding-bottom: 40px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;">
                                                                                        <img align="center" alt="" src="'.$foto_carreira.'" style="width: 100%;padding-bottom: 0; display: inline !important; vertical-align: bottom;">                                                                               
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: bold;font-style: normal;">                                                                                
                                                                                        '.$titulo_carreira.'
                                                                                    </td> 
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: 300;font-style: normal;">                                                                                
                                                                                        '.$subtitulo_carreira.'
                                                                                    </td> 
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="padding-top:30px; padding-bottom: 30px; font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #8d8d8d;">                                                                                
                                                                                        '.strip_tags($texto_carreira).'.
                                                                                    </td> 
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="padding-bottom:40px; font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #000000;">                                                                                
                                                                                        <a href="'.$link_carreira.'" target="_blank" style="color:#000000; text-decoration: none;"><span style="color: #8d8d8d;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;">•</span> Ler mais</a>
                                                                                    </td> 
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>';
        
                                                    $email .= '</td>
                                                </tr>
                                            </table>
                                            <!-- // END BODY -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" style="padding-top: 20px;">
                                            <!-- BEGIN FOOTER // -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #000000; border-top: 0;border-bottom: 0;">
                                                <tr>
                                                    <td valign="top" class="footerContainer" style="padding-bottom:9px;    padding-top: 60px;">
                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="    padding-bottom: 20px;text-align: center;font-family: Helvetica, Arial;color:#FFFFFF; font-size: 14px;font-weight: normal;font-style: normal;">
                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/logo-edit.png" width="153" style="max-width:153px; padding-bottom: 0; display: inline !important; vertical-align: bottom;">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td  style="padding: 15px 18px 0px;">
                                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align: center;font-family: Helvetica, Arial;color:#FFFFFF; font-size: 14px;font-weight: normal;font-style: normal;">
                                                                        LISBOA<span style="padding: 0 10px;">•</span>PORTO<span style="padding: 0 10px;">•</span>MADRID<span style="padding: 0 10px;">•</span>SÃO PAULO (2020)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" valign="top" style="    padding: 30px 0 30px;" class="themezyFollowBlockInner">
                                                                        <a href="https://www.linkedin.com/company/edit-education" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/linked-in.png" alt="Linkedin" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="https://www.facebook.com/EDIT.education" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/facebook.png" alt="Facebook" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="https://instagram.com/edit.education/" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/instagram.png" alt="Instagram" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="https://vimeo.com/editeducation" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/vimeo.png" alt="Vimeo" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="https://www.youtube.com/channel/UCLUrTOtQrN667PmMilojN8g" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/youtube.png" alt="Youtube" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="https://twitter.com/EDIT_Education" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/twitter.png" alt="twitter" width="40" style="width:40px; max-width:40px;"></a>   
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="themezyTextBlock">
                                                            <tbody >
                                                                <tr>
                                                                    <td valign="top" style="text-align:center;font-size: 14px; padding-bottom: 20px;font-family: Helvetica, Arial;font-weight: normal;font-style: normal;color: #8d8d8d;">
                                                                    Se não pretendes receber emails como estes <a href="https://edit.com.pt/unsubscribe?n_email='.$_POST['email'].'" style="color: #8d8d8d;">clica aqui</a>.<br>
                                                                    © 2019 EDIT. - Disruptive Digital Education                                                                                
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>                                               
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END FOOTER -->
                                        </td>
                                    </tr>
                                </table>
                                <!-- // END TEMPLATE -->
                            </td>
                        </tr>
                    </table>        
            </body>
        </html>';

                                                        }else{

                                                            $email = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Your Message Subject or Title</title>
        <style type="text/css">
        /* Based on The MailChimp Reset INLINE: Yes. */
        /* Client-specific Styles */
    #outlook a {
        padding: 0;
    }

    /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
    .ExternalClass {
        width: 100%;
    }

    #backgroundTable {
    margin: 0;
    padding: 0;
    width: 100% !important;
    
}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<h1 style="width: 560px; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 24px; color:#000000; line-height: 24px;"> Olá '. $name .',</h1>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Obrigado pelo teu interesse nos Programas e Workshops da EDIT.. Iremos entrar em contato contigo durante as próximas 48 horas.<br />
</p>
<p></p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Entretanto, caso necessites de algum de esclarecimento, poderás enviar um email para <a href="mailTo:geral@edit.com.pt">geral@edit.com.pt</a> ou entrar em contacto através de:<br /><br /><br />
<b>- EDIT. Lisboa</b>: <a href="tel:00351210182455">(+351) 210 182 455,</a> entre as 10h e as 19h, de 2ª a 6ª.<br />
<b>- EDIT. Porto</b>: <a href="tel:00351224960345">(+351) 224 960 345,</a> entre as 10h e as 19h, de 2ª a 6ª.<br />
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Sabe mais sobre a EDIT. e a nossa oferta formativa <a href="https://edit.com.pt/wp-content/uploads/2017/06/EDIT.Presentation.pdf">aqui.</a><br/><br />

</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Obrigado.
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
<b>EDIT. Lisboa</b> <br />
ALAMEDA D. AFONSO <br />
HENRIQUES, 7A <br />
1900-178, Lisboa <br />
Portugal <br />
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
<b>EDIT. Porto</b> <br />
Rua Gonçalo Cristovão <br />
nº 347, 3º Piso, Sala 302 e 309 <br />
4000-270, Porto <br />
Portugal <br />
</p>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
<b>EDIT. Madrid</b> <br />
Calle de la Colegiata 9, utopic_US <br />
28012 Madrid <br />
Espanha <br />
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';


                                                        }


wp_mail($emailPost,"Pedido de ".$mailAssunto, $email);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}


if ($status) {
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );


    $emailEdit = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Message Subject or Title</title>
    <style type="text/css">
    /* Based on The MailChimp Reset INLINE: Yes. */
    /* Client-specific Styles */
    #outlook a {
    padding: 0;
}

/* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
.ExternalClass {
    width: 100%;
}

    #backgroundTable {
margin: 0;
padding: 0;
width: 100% !important;

}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Dados enviados:<br/>
Url: '. $url.'<br/>'.
'Nome: '. $name.'<br/>'.
'Email: '. $emailPost.'<br/>'.
'Mensagem: '. $messagePost.'<br/>'.
'Cidade: '. $cidade.'<br/>'.
'País: '. $pais.'<br/>'.
'Telefone: '. $telefone.'<br/>'.
'Formação: '. $course.'<br/>'.
'Observações: '. $assunto.'<br/>'.
'Interesses: '. $interests.'<br/>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';


wp_mail($emailsWorkshopForm, $tipo_formacao_title." ".strip_tags($course). " ".$local, $emailEdit);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}


// generate the response
$response = json_encode( array( 'Status' => $status, 'Message' => $message ) );

// response output
header( "Content-Type: application/json" );

echo $response;
// IMPORTANT: don't forget to "exit"
exit;
}

function curso_form() {

    global $wpdb;
   
    $status = true;
    $message = 'Pedido de inscrição enviado';
    $die = check_ajax_referer( 'edit Nonce Registration Form', 'nonce', false);

    if (!$die ) {
        die('no no no diabito');
    }

    $email = '';

    $environment = ENVIRONMENT;
    if ($environment == 'production') {
        $emailsRegistrationForm = 'geral@edit.com.pt,eva.pinho@edit.com.pt, joana.morujo@edit.com.pt';
    } else {
        $emailsRegistrationForm = 'afbbento@gmail.com';
    }


    // Check obrigatorios
    if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['telefone']) && isset($_POST['pais']) && isset($_POST['cidade']) && isset($_POST['interests']) && isset($_POST['assunto']) && isset($_POST['url']) ) {

        $name = $_POST['name'];
        $emailPost =  $_POST['email'];
        //$bd = $_POST['bd'];
        $telefone = $_POST['telefone'];
        $pais = $_POST['pais'];
        $cidade = $_POST['cidade'];
        $interests = $_POST['interests'];
        $assunto = $_POST['assunto'];
        $course = $_POST['curso'];
        $messagePost = $_POST['message'];
        $url = $_POST['url'];
        $post_id = $_POST['post_id'];


        //$date = $bd . ' 00:00:00';

        $wpdb->insert(
            'registration',
            array(
                'name' => $name,
                'email' => $emailPost,
                'message' => $messagePost,
                'city' => $cidade,
                'country' => $pais,
                'mobile' => $telefone,
                'course' => $course,
                'observations' => $assunto,
                'interests'  => $interests,
                'url' => $url
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );

    } else {
        $status = false;
        $message = 'Fields missing';
    }

    if (!is_email($emailPost)) {
        $status = false;
        $message = 'Not a valid email diabito';
    }

    if ($status) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        $mailAssunto = 'Contacto';
        if($assunto == 'Informacao'){
            $mailAssunto = 'informação';
        }else if($assunto == 'SOPP'){
            $mailAssunto = 'marcação de SOPP';
        }
        $email = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit - Newsletter</title>
                <style type="text/css">
                    @import url(https://fonts.googleapis.com/css?family=Roboto:300,300italic);          
                    table{
                    border-collapse:collapse;
                    }
                    img,a img{
                    border:0;
                    outline:none;
                    text-decoration:none;
                    }           
                    a{
                    word-wrap:break-word;
                    }            
                    table,td{
                    mso-table-lspace:0pt;
                    mso-table-rspace:0pt;
                    }
                    #outlook a{
                    padding:0;
                    }
                    img{
                    -ms-interpolation-mode:bicubic;
                    }
                    body,table,td,p,a,li,blockquote{
                    -ms-text-size-adjust:100%;
                    -webkit-text-size-adjust:100%;
                    }                     
                    td.content-wrapper{
                        padding-left: 10% !important;
                        padding-right: 10% !important;
                    }
                    td.content-wrapper-lg{
                        padding-left: 5% !important;
                        padding-right: 5% !important;
                    }  
                    @media only screen and (max-width: 660px){
                        body,table,td,p,a,li,blockquote{
                            -webkit-text-size-adjust:none !important;
                        }
                        body{
                            width:100% !important;
                            min-width:100% !important;
                        }
                        td.content-wrapper{
                            padding-left: 20px !important;
                            padding-right: 20px !important;
                        }
                        .coord-name{
                            line-height: 1 !important;
                        }
                        .alumni-name{
                            height: 48px;
                        }
                    }
                </style>
            </head>
            <body style="margin: 0;padding: 0;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background-color: #FFFFFF;">
                        <tr>
                            <td align="center" valign="top">
                                <!-- BEGIN TEMPLATE // -->
                                <table border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #D8D8D8;max-width: 700px;">                            
                                    <tr>
                                        <td align="center" valign="top">
                                            <!-- BEGIN HEADER // -->
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #000000; border-top: 0;border-bottom: 0;">
                                                <tr>
                                                    <td valign="top" style="font-weight:normal; padding: 0 80px;" class="content-wrapper">                                                                                                                                        
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 40px 18px 18px;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                       
                                                       
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td valign="top">
                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="middle">
                                                                                         <img alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/logo-edit.png" width="153" style="max-width:153px; padding-bottom: 0; display: inline !important; vertical-align: bottom;">                                                                               
                                                                                    </td>
                                                                                    <td valign="middle" style="text-align: right;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;color: #828282;">
                                                                                        25 Agosto, 2019                                                                               
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 40px 18px 18px;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding-bottom: 70px; font-family: Helvetica, Arial;font-size: 45px;font-weight: normal;color:#FFFFFF;">
                                                                        Olá Ricardo Silva '.$post_id.'
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END HEADER -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <!-- BEGIN BODY // -->
                                            <table border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td valign="top" >
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td  style="padding: 30px 18px 0px;">
                                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
        
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td style="padding: 35px 80px 0;font-family: Helvetica, Arial;color: #8d8d8d;font-size: 16px;font-weight: normal;" class="content-wrapper">
                                                                       Obrigado pelo teu interesse nos programas e Workshops da EDIT.
                                                                        <br><span style="color:#000000">Iremos entrar em contacto contigo durante as próximas 48 horas.</span>
                                                                        <br><br>                                                               
                                                                        Entretanto caso necessites de algum esclarecimento não hesites em entrar em contacto comigo.
                                                                        <br><br>  
                                                                        Cumprimentos,
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>           
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td style="padding: 40px 80px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="70" style="padding-right: 20px;">
                                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" style="">
                                                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/coordenador.png" style="width: 70px;padding-bottom: 0; display: inline !important; vertical-align: bottom;">                                                                               
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" style="">
                                                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 20px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.55;letter-spacing: normal;color: #000000;" class="coord-name">
                                                                                                                       Mariana Guerra 
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #8d8d8d;">
                                                                                                                       Coordernadora
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td>
                                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <table border="0" cellpadding="0" cellspacing="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.55;letter-spacing: normal;color: #000000;">
                                                                                                                       <a style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.55;letter-spacing: normal;color: #000000;text-decoration: none;" href="mailto:mariana@edit.com.pt">mariana@edit.com.pt</a>
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #000000;">
                                                                                                                       +351 914 543 443
                                                                                                                    </td>                                                                                                                                                    
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>                                                                           
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 10px 80px 30px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>                                     
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Notícias
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>';
                                                        
                                                        $artigos = get_field('newsletter_noticia', 36336);

                                                        if( $artigos ): 
                                                            
                                                            foreach( $artigos as $p):                                                                 
                                                        
                                                                $email .= '<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="padding: 0 40px;" class="content-wrapper-lg">
                                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tbody>                                                                        
                                                                                    <tr>
                                                                                        <td valign="bottom" style="background-image:url(https://edit.com.pt/wp-content/themes/edit/newsletter-edit/noticia1.png);background-position: center;max-width:620px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal; height: 360px;background-size: cover;">                                                                                
                                                                                            <div style="height: 10px;background-color:#ffdd06;width: 50%;"></div>                                                                               
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding: 40px 40px 4px;font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: bold;font-style: normal;">                                                                                
                                                                                            Report OFFF'.$p->ID.'
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding:0px 40px;font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: 300;font-style: normal;">                                                                                
                                                                                            Barcelona 2019
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding:30px 40px;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #8d8d8d;">                                                                                
                                                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                                                        </td> 
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td valign="top" style="padding:0px 40px 40px;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #000000;">                                                                                
                                                                                            <a href="http://www.edit.com.pt" target="_blank" style="color:#000000; text-decoration: none;"><span style="color: #8d8d8d;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;">•</span> Ler mais</a>
                                                                                        </td> 
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>';

                                                                endforeach; 
                                                            
                                                                wp_reset_postdata(); 
                                                        endif; 

                                                        $email .= '
                                                        
                                                        
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 10px 80px 30px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Formações
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                         <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 0 80px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" width="50%">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/workshop.png" style="width: 100%;padding-bottom: 0; display: inline !important; vertical-align: bottom;">
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial; padding-top: 25px;padding-bottom: 5px;color: #65c4b3;font-size: 16px;font-weight: normal;">
                                                                                                        Workshop
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;padding-bottom: 10px;color: #65c4b3;font-size: 20px;font-weight: normal;">
                                                                                                        Social Media Marketing Strategy
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;color: #65c4b3;font-size: 16px;font-weight: normal;" class="alumni-name">
                                                                                                        14 e 15 Set. de 2019
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="padding-top: 25px;font-family: Helvetica, Arial;color: #65c4b3;font-size: 16px;font-weight: normal;">
                                                                                                        <a href="https://edit.com.pt" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;text-decoration: none;color:#000000;"><span style=" color: #8d8d8d;">•</span> Mais informações</a>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td valign="top" >
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="40px">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>                                                    
                                                                                    <td valign="top" width="50%">
                                                                                       <table align="right" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/intensivo.png" style="width: 100%;padding-bottom: 0; display: inline !important; vertical-align: bottom;">
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial; padding-top: 25px;padding-bottom: 5px;color: #e98375;font-size: 16px;font-weight: normal;">
                                                                                                        Curso Intensivo
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;padding-bottom: 10px;color: #e98375;font-size: 20px;font-weight: normal;">
                                                                                                        Design Thinking for Business Innovation
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;color: #e98375;font-size: 16px;font-weight: normal;" class="alumni-name">
                                                                                                        16 Set. a 22 Nov. de 2019
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="padding-top: 25px;font-family: Helvetica, Arial;color: #65c4b3;font-size: 16px;font-weight: normal;">
                                                                                                        <a href="https://edit.com.pt" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;text-decoration: none;color:#000000;"><span style=" color: #8d8d8d;">•</span> Mais informações</a>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 60px 80px 20px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Alumni Stories
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 0 80px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" width="50%">
                                                                                        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/bitmap.png" style="width: 100%;padding-bottom: 0; display: inline !important; vertical-align: bottom;">
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial; padding-top: 25px;padding-bottom: 5px;color: #8d8d8d;font-size: 16px;font-weight: normal;">
                                                                                                        Entrevista a Aluno
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;padding-bottom: 10px;color: #000000;font-size: 20px;font-weight: normal;" class="alumni-name">
                                                                                                        Henrique Timóteo
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>                                                                                    
                                                                                                <tr>
                                                                                                    <td valign="top" style="padding-top: 10px;font-family: Helvetica, Arial;color: #65c4b3;font-size: 16px;font-weight: normal;">
                                                                                                        <a href="https://edit.com.pt" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;text-decoration: none;color:#000000;"><span style=" color: #8d8d8d;">•</span> Ver entrevista</a>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                    <td valign="top">
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="40px">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <span></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>                                                              
                                                                                    <td valign="top" width="50%">
                                                                                       <table align="right" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top">
                                                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/bitmap2.png" style="width: 100%;padding-bottom: 0; display: inline !important; vertical-align: bottom;">
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial; padding-top: 25px;padding-bottom: 5px;color: #8d8d8d;font-size: 16px;font-weight: normal;">
                                                                                                        Entrevista a Aluno
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="top" style="font-family: Helvetica, Arial;padding-bottom: 10px;color: #000000;font-size: 20px;font-weight: normal;" class="alumni-name">
                                                                                                        Sofia Gomes
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>                                                                                      
                                                                                                <tr>
                                                                                                    <td valign="top" style="padding-top: 10px;font-family: Helvetica, Arial;color: #65c4b3;font-size: 16px;font-weight: normal;">
                                                                                                        <a href="https://edit.com.pt" style="font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;text-decoration: none;color:#000000;"><span style=" color: #8d8d8d;">•</span> Ver entrevista</a>
                                                                                                    </td>                                                                                                                                                    
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 60px 80px 20px;" class="content-wrapper">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td valign="top" style="border-top:1px solid #D8D8D8;">
                                                                                        <span></span>
                                                                                    </td>                                                                                                                                                    
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 30px 80px 40px 80px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;" class="content-wrapper">
                                                                        Carreiras
                                                                    </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="top" style="padding: 0 80px;" class="content-wrapper">
                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                                            <tbody>                                                                        
                                                                                <tr>
                                                                                    <td valign="top" style="width:153px;padding-bottom: 40px;font-family: Helvetica, Arial;color:#000000; font-size: 35px;font-weight: normal;font-style: normal;">
                                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/carreiras.jpg" style="width: 100%;padding-bottom: 0; display: inline !important; vertical-align: bottom;">                                                                               
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: bold;font-style: normal;">                                                                                
                                                                                        Digital Marketer
                                                                                    </td> 
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="font-family: Helvetica, Arial;color:#000000; font-family: Helvetica, Arial;font-size: 30px;font-weight: 300;font-style: normal;">                                                                                
                                                                                        Your career starts here.
                                                                                    </td> 
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="padding-top:30px; padding-bottom: 30px; font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #8d8d8d;">                                                                                
                                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                                                    </td> 
                                                                                </tr>
                                                                                <tr>
                                                                                    <td valign="top" style="padding-bottom:40px; font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.56;letter-spacing: normal;color: #000000;">                                                                                
                                                                                        <a href="https://edit.com.pt" target="_blank" style="color:#000000; text-decoration: none;"><span style="color: #8d8d8d;font-family: Helvetica, Arial;font-size: 16px;font-weight: normal;">•</span> Ler mais</a>
                                                                                    </td> 
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
        
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END BODY -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" style="padding-top: 20px;">
                                            <!-- BEGIN FOOTER // -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #000000; border-top: 0;border-bottom: 0;">
                                                <tr>
                                                    <td valign="top" class="footerContainer" style="padding-bottom:9px;    padding-top: 60px;">
                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="    padding-bottom: 20px;text-align: center;font-family: Helvetica, Arial;color:#FFFFFF; font-size: 14px;font-weight: normal;font-style: normal;">
                                                                        <img align="center" alt="" src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/logo-edit.png" width="153" style="max-width:153px; padding-bottom: 0; display: inline !important; vertical-align: bottom;">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody >
                                                                <tr>
                                                                    <td  style="padding: 15px 18px 0px;">
                                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span></span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table  border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align: center;font-family: Helvetica, Arial;color:#FFFFFF; font-size: 14px;font-weight: normal;font-style: normal;">
                                                                        LISBOA<span style="padding: 0 10px;">•</span>PORTO<span style="padding: 0 10px;">•</span>MADRID<span style="padding: 0 10px;">•</span>SÃO PAULO (2020)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" valign="top" style="    padding: 30px 0 30px;" class="themezyFollowBlockInner">
                                                                        <a href="https://www.linkedin.com" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/linked-in.png" alt="Linkedin" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="http://www.facebook.com" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/facebook.png" alt="Facebook" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="http://www.instagram.com" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/instagram.png" alt="Instagram" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="http://www.vimeo.com" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/vimeo.png" alt="Vimeo" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="http://www.youtube.com" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/youtube.png" alt="Youtube" width="40" style="width:40px; max-width:40px;"></a>
                                                                        <a href="http://www.twitter.com" target="_blank" style="padding: 0 10px;"><img src="https://edit.com.pt/wp-content/themes/edit/newsletter-edit/twitter.png" alt="twitter" width="40" style="width:40px; max-width:40px;"></a>   
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="themezyTextBlock">
                                                            <tbody >
                                                                <tr>
                                                                    <td valign="top" style="text-align:center;font-size: 14px; padding-bottom: 20px;font-family: Helvetica, Arial;font-weight: normal;font-style: normal;color: #8d8d8d;">
                                                                    Se não pretendes receber emails como estes <a href="#" style="color: #8d8d8d;">clica aqui</a>.<br>
                                                                    © 2019 EDIT. - Disruptive Digital Education                                                                                
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>                                               
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // END FOOTER -->
                                        </td>
                                    </tr>
                                </table>
                                <!-- // END TEMPLATE -->
                            </td>
                        </tr>
                    </table>        
            </body>
        </html>';



wp_mail($emailPost,"Pedido de ".$mailAssunto, $email, $headers = 'From: EDIT - Disruptive Digital Education <geral@edit.com.pt>' . "\r\n");
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}


if ($status) {
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );


    $emailEdit = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Message Subject or Title</title>
    <style type="text/css">
    /* Based on The MailChimp Reset INLINE: Yes. */
    /* Client-specific Styles */
    #outlook a {
    padding: 0;
}

/* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
.ExternalClass {
    width: 100%;
}

    #backgroundTable {
margin: 0;
padding: 0;
width: 100% !important;

}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Dados enviados:<br/>
Url: '. $url.'<br/>'.
'Nome: '. $name.'<br/>'.
'Email: '. $emailPost.'<br/>'.
'Mensagem: '. $messagePost.'<br/>'.
'Cidade: '. $cidade.'<br/>'.
'País: '. $pais.'<br/>'.
'Telefone: '. $telefone.'<br/>'.
'Formação: '. $course.'<br/>'.
'Observações: '. $assunto.'<br/>'.
'Interesses: '. $interests.'<br/>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';

wp_mail($emailsRegistrationForm, "Pedido de ".$mailAssunto, $emailEdit);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}


// generate the response
$response = json_encode( array( 'Status' => $status, 'Message' => $message ) );

// response output
header( "Content-Type: application/json" );

echo $response;
// IMPORTANT: don't forget to "exit"
exit;
}


function workshop_form_en() {

    global $wpdb;
    $status = true;
    $message = 'Pedido de inscrição enviado';
    $die = check_ajax_referer( 'edit Nonce Registration Form', 'nonce', false);

    if (!$die ) {
        die('no no no diabito');
    }

    $email = '';

    $environment = ENVIRONMENT;
    if ($environment == 'production') {
        $emailsWorkshopFormEN = 'geral@edit.com.pt,noemi.lomelino@edit.com.pt,emanuel.soares@edit.com.pt';
    } else {
        $emailsWorkshopFormEN = 'afbbento@gmail.com';
    }

    if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['telefone']) && isset($_POST['pais']) && isset($_POST['cidade']) && isset($_POST['interests']) && isset($_POST['assunto']) && isset($_POST['url']) ) {

        $name = $_POST['name'];
        $emailPost =  $_POST['email'];
        //$bd = $_POST['bd'];
        $telefone = $_POST['telefone'];
        $pais = $_POST['pais'];
        $cidade = $_POST['cidade'];
        $interests = $_POST['interests'];
        $assunto = $_POST['assunto'];
        $course = $_POST['curso'];
        $local = $_POST['local'];
        $messagePost = $_POST['message'];
        $url = $_POST['url'];



        //$date = $bd . ' 00:00:00';

        $wpdb->insert(
            'registration',
            array(
                'name' => $name,
                'email' => $emailPost,
                'message' => $messagePost,
                'city' => $cidade,
                'country' => $pais,
                'mobile' => $telefone,
                'course' => $course,
                'observations' => $assunto,
                'interests'  => $interests,
                'url' => $url
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );

    } else {
        $status = false;
        $message = 'Fields missing';
    }

    if (!is_email($emailPost)) {
        $status = false;
        $message = 'Not a valid email diabito';
    }

    if ($status) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );
        $mailAssunto = 'Contact ';
        if($assunto == 'Informacao') {
            $mailAssunto = 'Information ';
        }else if($assunto == 'Inscricao') {
            $mailAssunto = 'SOPP ';
        }
        $email = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Your Message Subject or Title</title>
        <style type="text/css">
        /* Based on The MailChimp Reset INLINE: Yes. */
        /* Client-specific Styles */
    #outlook a {
        padding: 0;
    }

    /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
    .ExternalClass {
        width: 100%;
    }

    #backgroundTable {
    margin: 0;
    padding: 0;
    width: 100% !important;
    
}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<h1 style="width: 560px; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 24px; color:#000000; line-height: 24px;"> Hi '. $name .',</h1>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Thanks for your interest in EDIT\'s Programmes and Workshops. We will get back to you within the next 48 hours.
<br />
</p>
<p></p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
However, in case you need any clarification, you can send an email to <a href="mailTo:geral@edit.com.pt">geral@edit.com.pt</a> or get in touch through:<br /><br /><br />
<b>- EDIT. Lisboa</b>: <a href="tel:00351210182455">(+351) 210 182 455,</a> between 10am and 7pm, from Monday to Friday.<br />
<b>- EDIT. Porto</b>: <a href="tel:00351224960345">(+351) 224 960 345,</a> between 10am and 7pm, from Monday to Friday.<br />
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
You can know more about EDIT. and our programmes <a href="https://edit.com.pt/wp-content/uploads/2017/06/EDIT.Presentation.pdf">here.</a><br/><br />

</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Thanks.
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
<b>EDIT. Lisboa</b> <br />
ALAMEDA D. AFONSO <br />
HENRIQUES, 7A <br />
1900-178, Lisboa <br />
Portugal <br />
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
<b>EDIT. Porto</b> <br />
Rua Gonçalo Cristovão <br />
nº 347, 3º Piso, Sala 302 e 309 <br />
4000-270, Porto <br />
Portugal <br />
</p>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
<b>EDIT. Madrid</b> <br />
Calle de la Colegiata 9, utopic_US <br />
28012 Madrid <br />
Espanha <br />
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';



wp_mail($emailPost,$mailAssunto . " " . "Request", $email, $headers = 'From: EDIT - Disruptive Digital Education <geral@edit.com.pt>' . "\r\n");
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}

// email edit
if ($status) {
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );

    $emailEdit = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Message Subject or Title</title>
    <style type="text/css">
    /* Based on The MailChimp Reset INLINE: Yes. */
    /* Client-specific Styles */
    #outlook a {
    padding: 0;
}

/* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
.ExternalClass {
    width: 100%;
}

    #backgroundTable {
margin: 0;
padding: 0;
width: 100% !important;

}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Dados enviados:<br/>
Url: '. $url.'<br/>'.
'Nome: '. $name.'<br/>'.
'Email: '. $emailPost.'<br/>'.
'Mensagem: '. $messagePost.'<br/>'.
'Cidade: '. $cidade.'<br/>'.
'País: '. $pais.'<br/>'.
'Telefone: '. $telefone.'<br/>'.
'Formação: '. $course.'<br/>'.
'Observações: '. $assunto.'<br/>'.
'Interesses: '. $interests.'<br/>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';

wp_mail($emailsWorkshopFormEN, "Workshop ".$course. " ".$local, $emailEdit);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}
// generate the response
$response = json_encode( array( 'Status' => $status, 'Message' => $message ) );

// response output
header( "Content-Type: application/json" );

echo $response;
// IMPORTANT: don't forget to "exit"
exit;
}

function eventos_form() {
    global $wpdb;
    $status = true;
    $message = 'Pedido de inscrição enviado';
    $die = check_ajax_referer( 'edit Nonce Registration Form', 'nonce', false);

    if (!$die ) {
        die('no no no diabito');
    }

    $email = '';

    $environment = ENVIRONMENT;

    if ($environment == 'production') {
        $emailsEventoForm = 'geral@edit.com.pt,eva.pinho@edit.com.pt,joana.tomas@edit.com.pt';
    } else {
        $emailsEventoForm = 'afbbento@gmail.com';
    }


// Check obrigatorios
    if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['telefone']) ) {

        $name = $_POST['name'];
        $emailPost =  $_POST['email'];
        $telefone = $_POST['telefone'];
        $message = $_POST['message'];
        $interests = $_POST['interests'];

        /* checkbox won't send the data to the server when you did not check it. */
        if ( isset($_POST['newsletter-1']) ):
            $newsletter = $_POST['newsletter-1'];
        else:
            $newsletter = '';
        endif;
        
        $course = $_POST['evento'];

       // $date = $bd;

        $wpdb->insert(
            'workshop',
            array(
                'name' => $name,
                'mobile' => $telefone,
                'course' => $course,
                'email' => $emailPost,
                'message' => $message,
                'interests'  => $interests,
                'newsletter' => $newsletter
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            )
        );

    } else {
        $status = false;
        $message = 'Fields missing';
    }

    if (!is_email($emailPost)) {
        $status = false;
        $message = 'Not a valid email diabito';
    }

    if ($status) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );

        $email = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Your Message Subject or Title</title>
        <style type="text/css">
        /* Based on The MailChimp Reset INLINE: Yes. */
        /* Client-specific Styles */
    #outlook a {
        padding: 0;
    }

    /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
    .ExternalClass {
        width: 100%;
    }

    #backgroundTable {
    margin: 0;
    padding: 0;
    width: 100% !important;
    
}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<h1 style="width: 560px; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 24px; color:#000000; line-height: 24px;">Olá '. $name .',</h1>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
O formulário que submeteste no nosso site foi recebido pela equipa EDIT.<br/>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Agradecemos desde já o teu interesse. Em breve entraremos em contacto contigo. <br/>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Obrigado e até breve.<br/>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
A Equipa EDIT.<br/>
<a href="https://edit.com.pt" target="_blank">www.edit.com.pt</a>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';

wp_mail($emailPost,"Pedido de inscrição em evento", $email);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}

if ($status) {
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );


    $emailEdit = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Message Subject or Title</title>
    <style type="text/css">
    /* Based on The MailChimp Reset INLINE: Yes. */
    /* Client-specific Styles */
    #outlook a {
    padding: 0;
}

/* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
.ExternalClass {
    width: 100%;
}


#backgroundTable {
margin: 0;
padding: 0;
width: 100% !important;

}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Dados enviados:<br/>
Nome: '. $name.'<br/>
Email: '. $emailPost.'<br/>
Telefone: '. $telefone.'<br/>
Evento: '. $course.'<br/>
Mensagem: '. $message.'<br/>
Info Session: '. $interests.'<br/>
Newsletter: '. $newsletter.'<br/>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';

wp_mail($emailsEventoForm,"Pedido de Contacto - ".$course." ", $emailEdit);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}

// generate the response
$response = json_encode( array( 'Status' => $status, 'Message' => $message ) );

// response output
header( "Content-Type: application/json" );

echo $response;
// IMPORTANT: don't forget to "exit"
exit;
}

function recrutamento_form() {

    global $wpdb;
    $status = true;
    $message = 'Resposta recrutamento enviado';
    $die = check_ajax_referer( 'edit Nonce Recrutamento Form', 'nonce', false);

    if (!$die ) {
        die('no no no diabito');
    }

    $emailPost = '';
    $name = '';
    $cv = '';
    $distrito = '';
    $interesse = '';
    $id = $_POST['id'];

    $mailAssunto = 'Contacto Recrutamento';

    // Check obrigatorios
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['telefone']) &&
        isset($_POST['recrutamento']) &&
        isset($_POST['message']) 
    ) {

        $name = $_POST['name'];
        $emailPost =  $_POST['email'];
        $telefone = $_POST['telefone'];
        $recrutamento = $_POST['recrutamento'];
        $link = $_POST['link'];
        $localizacao = $_POST['localizacao'];
        $messagePost = $_POST['message'];

        if(isset($_POST['uploadId'])){
            $cv = $_POST['uploadId'];
        }else{
            $cv = '';
        }

        if(isset($_POST['interests'])){
            $interesse = $_POST['interests'];
        }else{
            $interesse = '';
        }

        $wpdb->insert(
            'recrutamento',
            array(
                'name' => $name,
                'email' => $emailPost,
                'recrutamento' => $recrutamento,
                'mobile' => $telefone,
                'cv' => $cv,
                'interesse' => $interesse,
                'link'      => $link,
                'localizacao' => $localizacao
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            )
        );

    } else {
        $status = false;
        $message = 'Fields missing';
    }

    if (!is_email($emailPost)) {
        $status = false;
        $message = 'Not a valid email diabito';
    }

    if ($status) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );

        $mailAssunto = 'Contacto Recrutamento';

        sendEmail($emailPost,"Pedido de ".$mailAssunto,"confirm_recrutment",array("@@--name--@@" => $name, '@@--path--@@' => get_bloginfo('template_directory')));

        remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
    }


    if ($status) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );

        if($cv!= ''){
            $publicpath = getFileuploadPublicPath($cv);
            $publicpath= $publicpath[0]->publicpath;

        }else{
            $publicpath = "";
        }

        $emailEdit = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Your Message Subject or Title</title>
        <style type="text/css">
        /* Based on The MailChimp Reset INLINE: Yes. */
        /* Client-specific Styles */
    #outlook a {
        padding: 0;
    }

    /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
    .ExternalClass {
        width: 100%;
    }

    #backgroundTable {
    margin: 0;
    padding: 0;
    width: 100% !important;
    
}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Dados enviados:<br/>
Nome: '. $name.'<br/>
Email: '. $emailPost.'<br/>
Telefone: '. $telefone.'<br/>
Recrutamento: <a href="'. $link.'" target="_blank">'. $recrutamento.'</a><br/>
CV: '. $publicpath .'<br/>
Resumo: '.$messagePost .'<br/>
Localizacao: '.$localizacao .'<br/>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';


$environment = ENVIRONMENT;
if ($environment == 'production') {
    $email = get_field("email_do_anunicante",$id);
    $emailsRecrutamentoForm = '';
    if($email != false && $email != ''){
        $emailsRecrutamentoForm = array('lisboa@tronik.agency',$email);
    }
} else {
    $emailsRecrutamentoForm = 'afbbento@gmail.com';
}



wp_mail($emailsRecrutamentoForm,"Pedido de ".$mailAssunto, $emailEdit);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}


// generate the response
$response = json_encode( array( 'Status' => $status, 'Message' => $message ) );

// response output
header( "Content-Type: application/json" );

echo $response;
// IMPORTANT: don't forget to "exit"
exit;
}

function info_form() {

    global $wpdb;
    $status = true;
    $message = 'Pedido de inscrição enviado';
    $die = check_ajax_referer( 'edit Nonce Info Form', 'nonce', false);

    if (!$die ) {
        die('no no no diabito');
    }

    $email = '';

    $environment = ENVIRONMENT;
    if ($environment == 'production') {
        $emailsInfoForm = 'geral@edit.com.pt, eva.pinho@edit.com.pt, joana.morujo@edit.com.pt';
    } else {
        $emailsInfoForm = 'afbbento@gmail.com';
    }

    // Check obrigatorios
    if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['pais']) && isset($_POST['cidade']) && isset($_POST['assunto']) && isset($_POST['message'])) {

        $name = $_POST['name'];
        $emailPost =  $_POST['email'];
        $telefone = $_POST['telefone'];
        $pais = $_POST['pais'];
        $cidade = $_POST['cidade'];
        $assunto = $_POST['assunto'];
        $message = $_POST['message'];

        $wpdb->insert(
            'contacts',
            array(
                'name' => $name,
                'city' => $cidade,
                'country' => $pais,
                'phone' => $telefone,
                'email' => $emailPost,
                'subject'  => $assunto,
                'message' => $message,
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );

    } else {
        $status = false;
        $message = 'Fields missing';
    }

    if (!is_email($emailPost)) {
        $status = false;
        $message = 'Not a valid email diabito';
    }

    if ($status) {
        add_filter( 'wp_mail_content_type', 'set_html_content_type' );

        $email = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Your Message Subject or Title</title>
        <style type="text/css">
        /* Based on The MailChimp Reset INLINE: Yes. */
        /* Client-specific Styles */
    #outlook a {
        padding: 0;
    }

    /* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
    .ExternalClass {
        width: 100%;
    }

    #backgroundTable {
    margin: 0;
    padding: 0;
    width: 100% !important;
    
}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<h1 style="width: 560px; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 24px; color:#E6A000;">'. $name .'</h1>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
O formulário que submeteu no nosso site foi recebido pela equipa EDIT.<br/>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Agradecemos desde já o seu interesse. Em breve entraremos em contacto. <br/>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Obrigado.<br/>
</p>
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
A Equipa Edit<br/>
<a href="https://edit.com.pt" target="_blank">www.edit.com.pt</a>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';

wp_mail($emailPost,"Pedido de Informação", $email);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}

if ($status) {
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );


    $emailEdit = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Your Message Subject or Title</title>
    <style type="text/css">
    /* Based on The MailChimp Reset INLINE: Yes. */
    /* Client-specific Styles */
    #outlook a {
    padding: 0;
}

/* Prevent Webkit and Windows Mobile platforms from changing default font sizes.*/
.ExternalClass {
    width: 100%;
}

    #backgroundTable {
margin: 0;
padding: 0;
width: 100% !important;

}

/* Outlook 07, 10 Padding issue fix
Bring inline: No.*/
table td {
    border-collapse: collapse;
}


/***************************************************
                    ****************************************************
MOBILE TARGETING
                    ****************************************************
                    ***************************************************/
@media only screen and (max-device-width: 480px) {
    /* Part one of controlling phone number linking for mobile. */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

/* More Specific Targeting */

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
    /* You guessed it, ipad (tablets, smaller screens, etc) */
    /* repeating for the ipad */
    a[href^="tel"], a[href^="sms"] {
        text-decoration: none;
        color: blue; /* or whatever your want */
        pointer-events: none;
        cursor: default;
    }

    .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
        text-decoration: default;
        color: orange !important;
        pointer-events: auto;
        cursor: default;
    }
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
    /* Put your iPhone 4g styles in here */
}

/* Android targeting */
@media only screen and (-webkit-device-pixel-ratio:.75) {
    /* Put CSS for low density (ldpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1) {
    /* Put CSS for medium density (mdpi) Android layouts in here */
}

@media only screen and (-webkit-device-pixel-ratio:1.5) {
    /* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>
<!-- Targeting Windows Mobile -->
<!--[if IEMobile 7]>
<style type="text/css">

</style>
<![endif]-->
<!-- ***********************************************
                ****************************************************
END MOBILE TARGETING
                ****************************************************
                ************************************************ -->
<!--[if gte mso 9]>
<style>
/* Target Outlook 2007 and 2010 */
</style>
<![endif]-->
</head>
<body style=" width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0;">
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" cellspacing="0" border="0" id="backgroundTable" style="border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td valign="top">
<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="700">
<tr>
<td>
<a href="https://edit.com.pt"><img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_01.jpg" style="display: block; border: none; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/></a>
</td>
</tr>
<tr>
<td>
<table cellpadding="0" cellspacing="0" width="700" style="text-align: center; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
<tr>
<td width="70"></td>
<td width="560" style="text-align: left; padding-top: 40px; padding-bottom: 210px;">
<p style="width: 560px; margin: 1em 0; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 14px;line-height:normal;color:#333;">
Dados enviados:<br/>
Nome: '. $name.'<br/>'.
'Email: '. $emailPost.'<br/>'.
'Cidade: '. $cidade.'<br/>'.
'País: '. $pais.'<br/>'.
'Telefone: '. $telefone.'<br/>'.
'Assunto: '. $assunto.'<br/>'.
'Mensagem: '. $message.'<br/>
</p>
</td>
<td width="70"></td>
</tr>
</table>
</td>
</tr>
<tr>
<td>
<img src="https://edit.com.pt/wp-content/themes/edit/images/mail/template_mail_03.jpg" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; "/>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
</html>';

wp_mail($emailsInfoForm, "Pedido de Informação", $emailEdit);
remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}

// generate the response
$response = json_encode( array( 'Status' => $status, 'Message' => $message ) );

// response output
header( "Content-Type: application/json" );

echo $response;
// IMPORTANT: don't forget to "exit"
exit;
}

function newsletter_form() {
    global $wpdb;
    $status = true;
    $message = 'Subscrição efectuada com successo';

    $die = check_ajax_referer( 'Edit Nonce Newsletter Form', 'nonce', false);

    if (!$die ) {
     die('no no no diabito');
 }

    // Check obrigatorios
 if ( isset($_POST['email'])) {
    $inputEmail = $_POST['email'];
    if (!is_email($inputEmail)) {
        $status = false;
        $message = 'Not a valid email diabito';
    }else{
        $name = $_POST['nome'];
        $surname = $_POST['apelido'];
        $location = $_POST['localizacao'];
        $areas = $_POST['interesse'];

        $checkIfRegistered = $wpdb->get_results('SELECT email FROM newsletter WHERE email ="'. $inputEmail .'" ');

        if(count($checkIfRegistered) == 0) {
            $wpdb->insert(
                'newsletter',
                array(
                    'name' => $name,
                    'email' => $inputEmail,
                    'surname' => $surname,
                    'location' => $location,
                    'areas' => $areas
                ),
                array(
                    '%s',
                    '%s',
                    '%s',
                    '%s',
                    '%s'
                )
            );
        } else {
            $status = false;
            $message = 'Email já registado';
        }

            //Start Egoi
        $EGOIApikey = "7d4b8c96a86529d1eed43bdb934d3e06ef7ceb1e";

        if($_POST['nome']){
            $EGOIarguments = array(
                "apikey" => $EGOIApikey,
                "listID" => '6',
                "email" => $inputEmail,
                'first_name' => $_POST['nome'],
                'last_name' => $_POST['apelido'],
                'extra_4' => $_POST['interesse'],
                'extra_8' => $_POST['localizacao'],
                'extra_233' => 'RGPD-EDIT'
            );
            //https://api-docs.e-goi.com/
        }else{
            $EGOIarguments = array(
                "apikey" => $EGOIApikey,
                "listID" => '6',
                "email" => $inputEmail
            );
        }


        $EGOIclient = new SoapClient('http://api.e-goi.com/v2/soap.php?wsdl');
        $EGOIresult = $EGOIclient->addSubscriber($EGOIarguments);
            //End Egoi
    }
} else {
    $status = false;
    $message = 'Fields missing';
}



if ($status) {
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );

    $email = '';

    wp_mail($inputEmail,"Newsletter", $email);
    remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
}

// generate the response
$response = json_encode( array( 'Status' => $status, 'Message' => $message ) );

// response output
header( "Content-Type: application/json" );

echo $response;
// IMPORTANT: don't forget to "exit"
exit;
}

function cv_upload() {
    global $wpdb;
    $status = true;
    $message = 'Valid form';
    $fileId = null;
    $die = check_ajax_referer( 'Edit Upload CV', 'nonce', false);   

    if (!$die ) {
        die('no no no diabito');
    }

    if (isset($_FILES['inputUpload'])) {
        $file = $_FILES['inputUpload'];
        $filename = $_FILES['inputUpload']['name'];
        $fileUpload = wp_handle_upload($file, array('test_form'=>false));

        if($fileUpload) {
            $localPath = $fileUpload['file'];
            $publicUrl = $fileUpload['url'];
            $mimeType = $fileUpload['type'];
            $time = new DateTime("now");
            $wpdb->insert(
                'files',
                array(
                    'path' => $localPath,
                    'publicpath' => $publicUrl,
                    'mimetype' => $mimeType
                ),
                array(
                    '%s',
                    '%s',
                    '%s'
                )
            );
            $fileId = $wpdb->insert_id;
        }else {
            $status = false;
            $message = 'Erro no upload do ficheiro';
            $fileId = null;
        }
    } else {
        $status = false;
        $message = 'Erro no upload do ficheiro';
        $fileId = null;
    }

    // generate the response
    $response = json_encode( array( 'Status' => $status, 'Message' => $message, 'id' => $fileId, 'filename' => $filename ) );

    // response output
    header( "Content-Type: application/json" );

    echo $response;
    // IMPORTANT: don't forget to "exit"
    exit;
}

#region Register WP Events
if ( is_admin() ) {
    add_action( 'wp_ajax_curso_form', 'curso_form' );
    add_action( 'wp_ajax_nopriv_curso_form', 'curso_form' );

    add_action( 'wp_ajax_workshop_form_en', 'workshop_form_en' );
    add_action( 'wp_ajax_nopriv_workshop_form_en', 'workshop_form_en' );

    add_action( 'wp_ajax_workshop_form', 'workshop_form' );
    add_action( 'wp_ajax_nopriv_workshop_form', 'workshop_form' );

    add_action( 'wp_ajax_newsletter_form', 'newsletter_form' );
    add_action( 'wp_ajax_nopriv_newsletter_form', 'newsletter_form' );

    add_action( 'wp_ajax_eventos_form', 'eventos_form' );
    add_action( 'wp_ajax_nopriv_eventos_form', 'eventos_form' );

    add_action( 'wp_ajax_info_form', 'info_form' );
    add_action( 'wp_ajax_nopriv_info_form', 'info_form' );

    add_action( 'wp_ajax_recrutamento_form', 'recrutamento_form' );
    add_action( 'wp_ajax_nopriv_recrutamento_form', 'recrutamento_form' );

    add_action( 'wp_ajax_cv_upload', 'cv_upload' );
    add_action( 'wp_ajax_nopriv_cv_upload', 'cv_upload' );

//Back end actions here only
} else {
    add_action( 'wp_ajax_curso_form', 'curso_form' );
    add_action( 'wp_ajax_nopriv_curso_form', 'curso_form' );

    add_action( 'wp_ajax_workshop_form_en', 'workshop_form_en' );
    add_action( 'wp_ajax_nopriv_workshop_form_en', 'workshop_form_en' );

    add_action( 'wp_ajax_workshop_form', 'workshop_form' );
    add_action( 'wp_ajax_nopriv_workshop_form', 'workshop_form' );

    add_action( 'wp_ajax_newsletter_form', 'newsletter_form' );
    add_action( 'wp_ajax_nopriv_newsletter_form', 'newsletter_form' );

    add_action( 'wp_ajax_eventos_form', 'eventos_form' );
    add_action( 'wp_ajax_nopriv_eventos_form', 'eventos_form' );

    add_action( 'wp_ajax_info_form', 'info_form' );
    add_action( 'wp_ajax_nopriv_info_form', 'info_form' );

    add_action( 'wp_ajax_recrutamento_form', 'recrutamento_form' );
    add_action( 'wp_ajax_nopriv_recrutamento_form', 'recrutamento_form' );

    add_action( 'wp_ajax_cv_upload', 'cv_upload' );
    add_action( 'wp_ajax_nopriv_cv_upload', 'cv_upload' );
}
#endregion


function split2($string,$needle,$nth){
    $max = strlen($string);
    $n = 0;
    for($i=0;$i<$max;$i++){
        if($string[$i]==$needle){
            $n++;
            if($n>=$nth){
                break;
            }
        }
    }
    $arr[] = substr($string,0,$i);
    $arr[] = substr($string,$i+1,$max);
    
    return $arr;
} 