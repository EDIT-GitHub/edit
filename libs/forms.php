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

    $environment = ENVIRONMENT;
    if ($environment == 'production') {
        //$emailsWorkshopForm = 'geral@edit.com.pt,noemi.lomelino@edit.com.pt,emanuel.soares@edit.com.pt';
        $emailsWorkshopForm = 'afbbento@gmail.com';
    } else {
        $emailsWorkshopForm = 'afbbento@gmail.com';
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
        $mailAssunto = 'Contacto';
        if($assunto == 'Informacao'){
            $mailAssunto = 'informação';
        }else if($assunto == 'SOPP'){
            $mailAssunto = 'marcação de SOPP';
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
<h1 style="width: 560px; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 24px; color:#000000; line-height: 24px;"> 22222Olá '. $name .',</h1>
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


wp_mail($emailsWorkshopForm, "Workshop ".$course. " ".$local, $emailEdit);
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
        //$emailsRegistrationForm = 'geral@edit.com.pt,eva.pinho@edit.com.pt, catia.pereira@edit.com.pt';
        $emailsWorkshopForm = 'afbbento@gmail.com';
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
<h1 style="width: 560px; font-family:\'Lucida Sans\',Verdana,Arial,sans-serif; font-size: 24px; color:#000000; line-height: 24px;"> ddeedOlá '. $name .',</h1>
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
        $emailsInfoForm = 'geral@edit.com.pt, eva.pinho@edit.com.pt, catia.pereira@edit.com.pt';
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
