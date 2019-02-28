<?php
/**
 * The template for politica de privacidade
 *
 * @package Edit
 */
?>
<div class="content">
  <!-- HEADER MODULE -->
  <div class="header js-header flex small">
    <div class="wrapper">
        <div class="header-item">
            <div class="background">
                <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/bg.jpg)"></div>
                <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)"></div>


                <div class="grid-cont">
                    <div class="header-description">
                        <div class="square">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="70px" height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve">
                            <polygon fill="#FFFFFF" points="67,60 67,67 3,67 3,3 67,3 67,10 70,10 70,0 0,0 0,70 70,70 70,60 "/>
                        </svg>
                    </div>
                    <div class="summary">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="icon-cont">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({type:'header',instance:new Edit.modules.smallHeader('.js-header')})
    })
</script>
<!-- END HEADER MODULE -->
<?php if(LANGUAGE == 'ES'): ?>
 <div class="block-text">
    <div class="grid-cont">
        <h2>POLÍTICA DE PRIVACIDAD DE EDIT.</h2>
    </div>
</div>
<div class="block-text">
    <div class="grid-cont">
        <p>Toda tu información personal recopilada, se utilizará para ayudarte a hacer tu visita en nuestra web lo más productiva y agradable posible. La garantía de la confidencialidad de los datos personales de los usuarios de nuestra web es importante para EDIT.</p>
    </div>
</div>
<div class="block-text">
    <div class="grid-cont">
        <p>Toda la información personal relativa a los miembros, alumnos, clientes o visitantes de EDIT. se tratarán de acuerdo a la Ley de Protección de Datos Personales de 26 de octubre de 1998 (Ley nº 67/98)</p>
    </div>
</div>
<div class="block-text">
    <div class="grid-cont">
        <p>La información personal recogida puede incluir: nombre, email, número de teléfono, dirección, fecha de nacimiento y/o otros.</p>
    </div>
</div>
<div class="block-text margin-50">
    <div class="grid-cont">
        <p>El uso de EDIT. presupone la aceptación de esa acuerdo de privacidad. El Equipo de EDIT. se reserva el derecho de modificar este acuerdo sin previo aviso.</p>
    </div>
</div>
<div class="block-text">
    <div class="grid-cont">
        <h2>LOS ANUNCIOS</h2>
    </div>
</div>
<div class="block-text margin-50">
    <div class="grid-cont">
        <p>Al igual que en otras webs, recopilamos y utilizamos la información contenida en los anuncios. Esta información incluye tu dirección IP (Internet Protocolo), tu ISP (Internet Service Provider), el navegador que has utilizado al visitar nuestra web (como Internet Explorer, Firefox o Chrome), el tiempo de tu visita y qué páginas has visitado dentro de nuestra página web.</p>
    </div>
</div>
<div class="block-text">
    <div class="grid-cont">
        <h2>CONEXIONES A PÁGINAS WEB DE TERCEROS</h2>
    </div>
</div>
<div class="block-text">
    <div class="grid-cont">
        <p>EDIT. tiene enlaces a otros sitios, los cuales pueden contener información y(o herramientas útiles para nuestros usuarios visitantes. Nuestra política de privacidad no se aplica a los sitios de terceros, por lo que, en caso de que visite oro sitio desde el nuestro, deberá leer la política de privacidad del mismo.</p>
    </div>
</div>
<div class="block-text margin-100">
    <div class="grid-cont">
        <p>No nos responsabilizamos por la política de privacidad de contenido presente en dichas páginas web.
        </p>
    </div>
</div>
<script>
    jQuery(document).ready(function( $ ) { 
        Edit.pageLoader.totalModules = 1;
    })
</script>
</div>

<?php else: ?>

    <div class="block-text">
    	<div class="grid-cont">
    		<h2>Política de privacidade para EDIT.</h2>
    	</div>
    </div>
    <div class="block-text">
        <div class="grid-cont">
            <p>Todas as suas informações pessoais recolhidas, serão usadas para o ajudar a tornar a sua visita no nosso site o mais produtiva e agradável possível.
            A garantia da confidencialidade dos dados pessoais dos utilizadores do nosso site é importante para a EDIT..</p>
        </div>
    </div>
    <div class="block-text">
        <div class="grid-cont">
            <p>Todas as informações pessoais relativas a membros, assinantes, clientes ou visitantes que usem a EDIT. serão tratadas em concordância com a Lei da Proteção de Dados Pessoais de 26 de outubro de 1998 (Lei n.º 67/98).</p>
        </div>
    </div>
    <div class="block-text">
        <div class="grid-cont">
            <p>A informação pessoal recolhida pode incluir o seu nome, e-mail, número de telefone e/ou telemóvel, morada, data de nascimento e/ou outros.</p>
        </div>
    </div>
    <div class="block-text margin-50">
        <div class="grid-cont">
            <p>O uso da EDIT. pressupõe a aceitação deste Acordo de privacidade. A equipa da EDIT. reserva-se ao direito de alterar este acordo sem aviso prévio. </p>
        </div>
    </div>
    <div class="block-text">
        <div class="grid-cont">
            <h2>Os anúncios</h2>
        </div>
    </div>
    <div class="block-text margin-50">
        <div class="grid-cont">
            <p>Tal como outros websites, coletamos e utilizamos informação contida nos anúncios. A informação contida nos anúncios, inclui o seu endereço IP (Internet Protocol), o seu ISP (Internet Service Provider, como o Sapo, Clix, ou outro), o browser que utilizou ao visitar o nosso website (como o Internet Explorer ou o Firefox), o tempo da sua visita e que páginas visitou dentro do nosso website.</p>
        </div>
    </div>
    <div class="block-text">
        <div class="grid-cont">
            <h2>Ligações a Sites de terceiros</h2>
        </div>
    </div>
    <div class="block-text">
        <div class="grid-cont">
            <p>A EDIT. possui ligações para outros sites, os quais, a nosso ver, podem conter informações / ferramentas úteis para os nossos visitantes. A nossa política de privacidade não é aplicada a sites de terceiros, pelo que, caso visite outro site a partir do nosso deverá ler a politica de privacidade do mesmo.</p>
        </div>
    </div>
    <div class="block-text margin-100">
        <div class="grid-cont">
            <p>Não nos responsabilizamos pela política de privacidade ou conteúdo presente nesses mesmos sites.</p>
        </div>
    </div>
    <script>
        jQuery(document).ready(function( $ ) { 
            Edit.pageLoader.totalModules = 1;
        })
    </script>
</div>
<?php endif; ?> 