<?php
/*
 * Template Name: Newsletter
 * The Template for Newsletter
 * @package Edit
 */

?>
<div class="content">
  <!-- HEADER MODULE -->
  <div class="header js-header flex small">

<?php 
$environment = ENVIRONMENT;

$url_key = 'wM3fJ4Y2';
$post_id = str_replace($url_key ,"", $_GET['id']);
$decode_id = base64_decode(strtr($post_id, '._-', '+/='));

$post_id = $decode_id;

$tipo_formacao = get_field('tipo_formacao', $post_id);        

foreach( $tipo_formacao as $p2):
    $tipo_formacao = get_the_title($p2->ID);
endforeach; 

$course = get_field('titulo', $post_id); 
$tipo_formacao = get_field('tipo_formacao', $post_id);        

        foreach( $tipo_formacao as $p2):
            $tipo_formacao = get_the_title($p2->ID);
            $tipo_formacao_ID = $p2->ID;
        endforeach; 

        $local_formacao = get_field('localizacao', $post_id);        

        foreach( $local_formacao as $p2):
            $local_formacao_ID = $p2->ID;
        endforeach; 
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
    $avatar_colaborador = 'http://dev.edit.com.pt/wp-content/uploads/2019/09/coordenador.jpg';
}

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

$encode_post_id = $url_key.strtr(base64_encode($post_id), '+/=', '._-');

if (isset($_GET['n_name'])){
    $decode_name = base64_decode(strtr($_GET['n_name'], '._-', '+/='));
}else{
    $decode_name = 'Ricardo Silva';
}

$data_actual = $dia.' '.$mes_pt.', '.$ano;
$pronta_enviar = get_field('pronta_a_enviar', $post_id);
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
                        "><a style="color: #8d8d8d;"href="https://edit.com.pt/newsletter-preview/?id='.$encode_post_id.'">Clica aqui</a></span></p>
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
                                                                Olá '.$decode_name.'
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

 echo $email;

?>  
</div>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({type:'header',instance:new Edit.modules.smallHeader('.js-header')})
    })
</script>
<!-- END HEADER MODULE -->

    <script>
        jQuery(document).ready(function( $ ) { 
            Edit.pageLoader.totalModules = 1;
        })
    </script>
</div>
 
