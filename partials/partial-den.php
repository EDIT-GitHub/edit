<?php
/** The template for DEN */

$servicesEnpoint = "/results/equipa/";

?>
        
<script>
window.onload = function() {
    var layer = document.getElementById("loaderLayer")
    layer.className = 'remove'; 
}
</script>

<!--CSS-->
        <style>


/*TOP SLIDER*/

.logo > a > div .logo-dot {width: 6px; height: 6px; position: absolute; background-color: #17D0EC; border-radius: 6px; bottom: 9px; right: 6px;}
.top { position: relative; width: 100%; height: 100%; min-height: 700px; }   
.background {width: 100%; height: 100%; display: block; overflow: hidden; position: relative; }
.newImage { position: absolute; width: 100%; height: 100%; left: 0px; top: 0px; overflow: hidden; background-size: cover; background-position: center center; background-image: url('http://edit.com.pt/wp-content/uploads/2015/12/image_top.jpg');}
.grid-cont { width: 100%; max-width: 1020px; margin: 0 auto; position: relative;}
.slider-description { left: 0px; transform: translate (0px, -50%); max-width: 750px; top: 205px; position: absolute;}
.square { position: absolute; z-index: 2;}
.square svg {position: absolute; left: 0px; top: 0px;}
.slider-media { position: absolute; width: 100%; max-width: 860px; height: 0px; padding-bottom: 47.451%; left: 50%; top: calc(50% + 100px); transform: translate(-50%, -50%); text-align: center;}
.summary { position: relative; z-index: 2; transform: matrix(1, 0, 0, 1, 0, -25); transition: all 0.2s ease 0s; display: block; left: 100px; text-decoration: none; text-align: left; left: 60px; top: 70px;}
.summary h1 { font-size: 80px; font-family: "NeuzeitSLTW01-BookHeavy", sans-serif; font-weight: 300; color: #4EC8E0; display: inline; background-color: #000; line-height: 111px; max-width: 650px; text-transform: uppercase; position: relative; z-index: 3; -moz-user-select: none;
    box-shadow: 10px 0px 0px #000, -10px 0px 0px #000; transition: all 0.3s ease 0s; font-kerning: normal; font-feature-settings: "kern"; padding: 5px 0px; box-decoration-break: clone;}
.summary p { font-size: 22px; font-family: "NeuzeitSLTW01-BookHeavy", sans-serif; font-weight: 300; color: #FFF; display: inline; background-color: #000; line-height:  20px; max-width: 650px; box-shadow: 10px 0px 0px #000, -10px 0px 0px #000; text-transform: uppercase; position: relative; z-index: 3; -moz-user-select: none; font-kerning: normal; font-feature-settings: "kern"; padding: 5px 0px; box-decoration-break: clone; transition: all 0.3s ease 0s; }

/*SECOND SECTION*/
.second { background-color: #F8F8F8; height: 750px;}
.block-left { float: left; width: 40%; max-width: 450px; margin-top: 80px; margin-left: 20px;}
.block-right { float: right; width: 44%; max-width: 450px; margin-top: 135px; position: relative; margin-right: -53px; }
.summary h3 { font-family: "NeuzeitSLTW01-BookHeavy", sans-serif; font-weight: 300; font-size: 45px; color: #000; line-height: 53px; margin: 58px -4px 10px; text-transform: uppercase;}
.summary.inside { width: 70%; max-width: 350px; top: 57px;}
.summary.inside p { font-family: "robotoRegular", sans-serif; font-weight: 300; font-size: 15px; line-height: 20px; color: #A9A9A9; margin: 0px; background-color: transparent; text-transform: none; box-shadow: none;}
.blue { width: 18%; max-width: 250px; background-color: #17D0EC; float: right; height: 500px;}
.mini-blue { width: 140px; height: 140px; background-color: #17D0EC; float: left; margin-top: 77%; margin-left: -4%; position: absolute;}
hr { margin-top: 280px; border: 1px solid #109BAF;}
.block-right img { width: 100%; float: right; z-index: 5; position: absolute;}
/*TAG SECTION*/
.tagsContainer { margin-left: 60px; float: left; list-style: none; margin-top: 15%;}
.tags { background-image: url('http://edit.com.pt/wp-content/uploads/2015/12/image2.jpg'); background-size: cover; background-position: center; width: 100%; height: 700px;}
 .tagsContainer li {float: left;}
.tagsContainer li a { background: #000 none repeat scroll 0% 0%; color: #FFF; padding: 10px; font-family: "robotoRegularCond", sans-serif; font-weight: 300; font-size: 11px; line-height: 50px; margin-right: 10px; margin-bottom: 10px; text-transform: uppercase; text-decoration: none; list-style: none;}
.tagSpan { font-size: 20px; position: relative; top: -1px; margin-right: 10px; display: inline-block; width: 6px; height: 6px; border-radius: 3px; background-color: #FFF;}

/*COMPANY SECTION*/

.company { width: 100%; background-color: #f8f8f8;}
.title { width: 690px; margin: 50px auto; }
.title h2 { color: #FFF; display: inline; background-color: #000; line-height: 68px; box-shadow: 10px 0px 0px #000, -10px 0px 0px #000; left: 10px; font-size: 60px; font-family: Arial, sans-serif; font-weight: bold; margin: 0px; text-transform: uppercase; position: relative;}
.title p {
    font-family: "NeuzeitSLTW01-BookHeavy",sans-serif;
    font-weight: bold;
    font-size: 40px;
    line-height: 60px;
    color: #A9A9A9;
    margin: 0px;
    background-color: transparent;
    text-transform: none;
    box-shadow: none;
    display: block;
    margin-top: 22px;
    text-align: center;

}

.companyLogo {
   float: left;

}
.companyLogo li {
    width: 160px;
    height: 100px;
    margin-right: 35px;
    list-style: none;
    float: left;
}

.companyLogo a {
    background: none;
}

.companyLogo a img {
    width: 100%;
}

/*FORM*/

.block-mais-info {
    text-align: center;
    width: 100%;
    height: 135px;
    background-color: #3cd6eb;
    float: left;
    padding: 30px;
}

.default-btn {
    border: 2px solid #c5f3f9;
    height: 40px;
    background-color: transparent;
    padding: 0 10px;
    position: relative;
    cursor: pointer;
}

.default-btn .label {
    font-family: 'robotoBoldCond';
    font-weight: 300;
    font-size: 15px;
    line-height: 40px;
    color: #c5f3f9;
    display: inline;
    text-transform: uppercase;
    text-decoration: none;
}



.down-bar {
   width: 100%;
   height: 297px;
   background-image: url('http://edit.com.pt/wp-content/uploads/2016/02/down-bar.png');
   background-repeat: no; 
   float: left;

}


/*TEAM*/

.team .block-description {
      background-color: #3cd6eb;
}



#footer {
   width: 100%;
}

/*MEDIA QUERIES*/

@media screen and (max-width: 1024px) {
    
    .slider-description {
        left: 30px;
        top: 180px;
    }

    .block-left {
        margin-top: 50px;
        margin-left: 50px;
        width: 45%;
    }

    .block-right {
        width: 36%;
        margin-top: 112px;
    }

    .mini-blue {
        margin-top: 70%;
    }

    .blue {
        height: 445px;
    }

    .tagsContainer {
        margin-left: 30px;
    }

    .companyLogo li {
        width: 140px;
    }

}
@media screen and (max-width: 950px) {

    .top {
        min-height: 668px;
    }

    .slider-description {
        left: 40px;
        top: 165px;
    }

    .block-left {
        margin-top: 50px;
        margin-left: 50px;
        width: 45%;
    }

    .block-right {
        width: 36%;
        margin-top: 112px;
    }

    .mini-blue {
        margin-top: 68%;
        margin-left: -4%;
    }

    .blue {
        height: 400px;
    }

    .tagsContainer {
        margin-left: 30px;
    }

    .companyLogo li {
        width: 140px;
    }

}

@media screen and (max-width: 850px) {

   .slider-description {
       top: 130px;
}

.blue {
      height: 360px;
   
}

   .second {
      height: 700px;
}

   
   .block-left {
      width: 47%;
}


   .block-right {
      width: 32%;
}

   .mini-blue {
      margin-top: 57%;
      margin-left: -4%;

}

   .summary.inside {
      width :60%;
      
}

.summary.inside p {
  font-size: 16px;

}

   .summary h3 {
      font-size: 40px;
      
}

   .companyLogo {
      margin-left: 3%;

}


}


@media screen and (max-width: 750px) {


   .summary h1 {
       font-size: 70px;
   }

   .blue {
      display: none;
}

   .block-left {
      width: 55%;
      max-width: 650px;
      height: 500px;
}

   .block-right {
       float: left;
       width: 39%;
       margin-top: 14%;
       max-width: 250px;
}

   .second {
      height: 700px;
}

   .mini-blue {
      margin-top: 54%;
}

   .tagsContainer {
      margin-top: 20%;

}


   .title {
      margin: 10px auto;
      max-width: 650px;

}
   .title h2 {
      font-size: 45px;
      margin: 40px;

}

   .title p {
      font-size: 24px;
}

  
}

@media screen and (max-width: 650px) {

.slider-description .square svg {width: 200px; height: 200px;}

.summary { top: 60px; left: 50px;}

.summary h1 {font-size: 55px; line-height: 85px;}

.summary p {font-size: 15px;}

.second {height: 900px;}

.block-left {
    width: 100%;
    max-width: 650px;
    height: 500px;
}

.block-right {
    float: left;
    width: 39%;
    margin-top: 0%;
    max-width: 250px;
    margin-left: 25%;
}

.title {max-width: 615px;}

}

@media screen and (max-width: 550px) {

.summary {width: 90%; max-width: 500px;}
.mini-blue {margin-top: 41%;}
.title {max-width: 450px;}
.title h2 {font-size: 35px; margin: 10px;}
.title p {font-size: 24px; line-height: 40px;}
.block-right {margin-top: 10%;}

}

@media screen and (max-width: 450px) {

.slider-description {max-width: 350px; left: 10px; top: calc(50% + 245px);}

.slider-description .square svg {width: 150px; height: 150px;}

.summary {width: 100%; max-width: 350px;}

.summary h1 {font-size: 30px; line-height: 54px;}

.block-right { margin-top: 20%;}
.mini-blue {margin-top: 27%;}

}

        </style>


        <!--TOP SlIDER-->

            <section class="top">
               <div class="wrapper" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;">
                <div class="background">
                    <div class="newImage"></div>

                    <div class="slider-media"></div>
                    <div class="grid-cont">
                        <div class="slider-description">
                            <div class="square">
                                <svg width="280" height="280" version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 280 280" enable-background="new 0 0 280 280" xml:space="preserve">
                                    <polygon fill="#FFFFFF" points="53.9,276 4,276 4,4 276,4 276,49.2 280,49.2 280,0 0,0 0,280 53.9,280 "></polygon>
                                </svg>
                            </div>
                            <div class="summary">
                                <h1>DEN - Digital Education Network</h1>
                                <br></br>
                                <p>Think tank (Educação e Recrutamento).</p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        
            </section>
        </div>
        
        <!-- END TOP SlIDER-->

        <!--SECOND SECTION-->
            <section class="second">
                  <div class="blue">
                    <hr>
                  </div>
                <div class="grid-cont">
                    <div class="block-left">
                            <div class="square">
                                <svg width="180" height="280" version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 280 280" enable-background="new 0 0 280 280" xml:space="preserve">
                                    <polygon fill="#17D0EC" points="53.9,276 4,276 4,4 276,4 276,49.2 280,49.2 280,0 0,0 0,280 53.9,280 "></polygon>
                            </div>
                            <div class="summary inside">
                                <h3>Digital Education Network</h3>
                                <p>A Digital Education Network é um Think Tank fundado pela EDIT. Escola de Design Interativo e Tecnologia com o objetivo de inovar nas áreas de educação e recrutamento para a industria digital. Acreditamos que a sinergia entre instituições de educação criativa digital e industria é a única forma de proporcionar à industria profissionais com uma educação moderna e competitiva face a este mercado em constante evolução e crescimento.</p>
                            </div>
                    </div>

                    <div class="block-right">
                        <img src="http://edit.com.pt/wp-content/uploads/2015/12/den_1.png"/>
                        <div class="mini-blue"></div>
                    </div>
                </div>
            </section>

            <!--TAG SECTION-->
            <section class="tags">
                <div class="grid-cont">
                    <ul class="tagsContainer">
                        <li>
                            <a href="#">
                                <span class="tagSpan"></span>
                                    Digital Design
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="tagSpan"></span>
                            Digital Marketing
                            </a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>Digital Strategy</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>Mobile Design</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>Design Thinking</a>
                        </li>
                        <li class="left">
                            <a href="#"><span class="tagSpan"></span>Mobile Development</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>UX - User Experience Design</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>Digital Account & Project Manager</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>Digital Creativity</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>Social Media Strategy</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>Big Data For Social Media</a>
                        </li>
                        <li>
                            <a href="#"><span class="tagSpan"></span>User Interface Design</a>
                        </li>
                    </ul>
                </div>
            </section>
            <!--END TAG SECTION-->

         <!--EMPRESAS SECTION-->
         <section ="company">
            <div class="grid-cont">
                <div class="title">
                    <h2>Empresas Membros</h2>
                    <p>Agências e Empresas membros da Digital Education Network 2016</p>
                </div>
                <ul class="companyLogo">
                    <li><a href="#"><img src="http://edit.com.pt/wp-content/uploads/2016/01/fullsix.png"/></a></li>
                    <li><a href="#"><img src="http://edit.com.pt/wp-content/uploads/2016/01/gen.png"/></a></li>
                    <li><a href="#"><img src="http://edit.com.pt/wp-content/uploads/2016/01/isobar.png"/></a></li>
                    <li><a href="#"><img src="http://edit.com.pt/wp-content/uploads/2016/01/leo.png"/></a></li>
                    <li><a href="#"><img src="http://edit.com.pt/wp-content/uploads/2016/01/normajean.png"/></a></li>
                </ul>
            </div>
         </section>
        <!--END EMPRESAS SECTION-->  
       
 <!--FORM-->
<div class="block-mais-info">
    <div class="default-btn btn-icon mais-info open-form">
        <div class="border"></div>
        <p class="label">Quero fazer parte da DEN</p>
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
        var cursoN = '<?php echo wp_create_nonce("edit Nonce Info Form");?>';
        jQuery(document).ready(function( $ ) {
            
            Edit.modules.collection.push({ type: 'formModal', instance: new Edit.modules.formModal('.js-formmodal', 'info_form','internacional',"Alunos Internacionais") });
        })
    </script>
    <!-- END FORM MODAL MODULE -->



<!--EQUIPA-->

<section class="team" style="width: 100%; float: left;">

<div class="title">
<h2>Profissionais</h2>
</div>


<div class="js-iso-module filtered margin-50 js-equipa">
        <div class="grid-cont">             
            <div class="iso-block team grid-1-2 block-medium" data-old="block-medium">
                <div class="block-content">
                    <div class="image">
                        <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/escola/equipa/t1-grayed.jpg" />
                    </div>
                    <div class="block-description">
                        <div class="block-title">
                            <h2>Tobias <br>Van <br>Schnitzel</h2>
                            <h3>UI Designer & Developer</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iso-block team grid-1-2 block-small" data-old="block-small">
                <div class="block-content">
                    <div class="image">
                        <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/escola/equipa/t2-grayed.jpg" />
                    </div>
                    <div class="block-description">
                        
                        <div class="block-title">
                            <h2>Sérgio Henriques Santos</h2>
                            <h3>UI Designer & Developer</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
<div class="iso-block team grid-1-2 block-small" data-old="block-small">
                <div class="block-content">
                    <div class="image">
                        <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/escola/equipa/t2-grayed.jpg" />
                    </div>
                    <div class="block-description">
                        
                        <div class="block-title">
                            <h2>Sérgio Henriques Santos</h2>
                            <h3>UI Designer & Developer</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iso-block team grid-1-2 block-medium" data-old="block-medium">
                <div class="block-content">
                    <div class="image">
                        <img draggable="false" src="<?php bloginfo('template_url'); ?>/images/dummy/escola/equipa/t3.jpg" />
                    </div>
                    <div class="block-description">
                        <div class="block-title">
                            <h2>Ana Sofia Castanho</h2>
                            <h3>UI Designer & Developer</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
                        </div>
                    </div>
                </div>
            </div>

       
          </div>
        <script>
            jQuery(document).ready(function( $ ) {
                console.log('CREATED')
                Edit.modules.collection.push({type:'isoModule',instance:new Edit.modules.isoModule('.js-equipa')});
            })
        </script>
    </div>


</section>


 
      
         <!-- END SECTION TEAM-->

<!--<div class="gmaps-module js-map-module">
        <div class="map-nav">
            <div class="grid-cont">
                                <div class="grid-1-2">
                    <div data-location="73" class="map-block block-medium  active">
                        <div class="block-content">
                            <div class="block-description">
                                <span class="location">EDIT. </span>
                                <h3 class="location-name">Lisboa </h3>
                                <p class="location-address">Travessa das Pedras Negras</p>
                                <p class="location-address-details">nº 1 - R/C + 1º Andar<br />
1100-404 Lisboa</p>
                                <a class="location-link no-route" href="tel:(+351)210182455">(+ 351) 210 182 455</a>
                                <a class="location-link no-route" href="mailto:geral@edit.com.pt">geral@edit.com.pt</a>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="grid-1-2">
                    <div data-location="71" class="map-block block-medium ">
                        <div class="block-content">
                            <div class="block-description">
                                <span class="location">EDIT.</span>
                                <h3 class="location-name">Porto </h3>
                                <p class="location-address">Rua Gonçalo Cristovão</p>
                                <p class="location-address-details">nº 347, 3º piso, sala 309 e 302<br />
4000-270 Porto</p>
                                <a class="location-link no-route" href="tel:(+351)224960345">(+ 351) 224 960 345</a>
                                <a class="location-link no-route" href="mailto:geral@edit.com.pt">geral@edit.com.pt</a>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
        </div>
        <div id="directions-interface">
            <input type="text" id="directions-input" name="directions-input" placeholder="Onde Estou?" />
            <div class="directions-btn btn-icon">
                <div class="inner">
                    <div class="icon">
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
        <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({type:'mapModule',instance:new Edit.modules.mapModule('.js-map-module',[{id:'73',location:{lat:'38.709898', lng:'-9.133610999999974'}},{id:'71',location:{lat:'41.1536696', lng:'-8.60832019999998'}}])})
            })
        </script>
    </div>
    <script>
        jQuery(document).ready(function( $ ) {
            Edit.pageLoader.totalModules = 3;
            // If exists n+ modules of isomodule call:
            Edit.modules.isoModuleResponsive.init();
        })
    </script>-->




     