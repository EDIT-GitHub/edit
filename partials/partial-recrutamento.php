<?php
/**
 * The template for Listagem Recrutamento
 *
 * @package Edit
 */

$inputPaisId = "0";
$inputProvinciaId = "0";
$inputDistritoId = "0";
$inputTipoId = "0";
$inputAreaId = "0";

if(isset($_REQUEST['inputPais'])) {
    $inputPaisId = $_REQUEST['inputPais'];
}

if(isset($_REQUEST['inputDistrito'])) {
    $inputDistritoId = $_REQUEST['inputDistrito'];
}

if(isset($_REQUEST['inputProvincia'])) {
    $inputDistritoId = $_REQUEST['inputProvincia'];
}

if(isset($_REQUEST['inputTipo'])) {
    $inputTipoId = $_REQUEST['inputTipo'];
}

if(isset($_REQUEST['inputArea'])) {
    $inputAreaId = $_REQUEST['inputArea'];
}
?>

<div class="content" id="recrutamento">
    <!-- HEADER MODULE -->
    <div class="header js-header flex small" style="min-height: 600px;">
        <div class="wrapper">
            <div class="header-item">
                <div class="background" style="min-height: 450px;">
                    <div class="img" draggable="false" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/bg.jpg)"></div>
                    <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)"></div>
                    <div class="grid-cont">
                        <div class="header-description">
                            <div class="square">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="70px" height="70px" viewBox="0 0 70 70" enable-background="new 0 0 70 70" xml:space="preserve">
                                <polygon fill="#FFFFFF" points="67,60 67,67 3,67 3,3 67,3 67,10 70,10 70,0 0,0 0,70 70,70 70,60 " />
                            </svg>
                        </div>
                        <div class="summary" style="width: 91%;">
                            <h1><?php the_title(); ?></h1>
                            <div class="slider-description" style="margin-top: 18px;">
                                <p class="subtitulo">
                                    <?php dictionary("Todas_as_ofertas_sao_disponibilizadas_pela_Tronik") ?>
                                </p>
                            </div>
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
        Edit.modules.collection.push({ type: 'header', instance: new Edit.modules.smallHeader('.js-header') })
    })
</script>
<!-- END HEADER MODULE -->
<!-- PAGE FILTERS MODULE -->
<div class="filters filters-header pull-up">
    <div class="default-btn filter-btn">
        <span class="label"><?php echo dictionary('o_que_procuras'); ?></span>
        <div class="btn-icon">
            <div class="inner">
                <div class="icon">
                    <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                    <path d="M21.81,11.189c-0.586-0.586-1.535-0.586-2.121,0l-4.689,4.689l-4.688-4.688c-0.586-0.586-1.535-0.586-2.121,0
                    c-0.586,0.585-0.586,1.535,0,2.121l5.656,5.657c0.293,0.293,0.677,0.439,1.061,0.439c0.032,0,0.063-0.017,0.095-0.019
                    c0.03,0.002,0.06,0.018,0.09,0.018c0.384,0,0.768-0.146,1.061-0.439l5.657-5.657C22.396,12.725,22.396,11.775,21.81,11.189z" />
                </svg>
            </div>
        </div>
    </div>
</div>
<div class="filters-holder js-filters pull-up margin-50">
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
<div class="grid-cont">
    <div class="filter" style="display:none" >
        <select id="inputPais" name="inputPais" data-exterior-label="País">
            <option value="0" <?php if($inputPaisId == "0"): ?> selected<?php endif; ?>>Todos</option>
            <option value="Portugal" <?php if($inputPaisId == "Portugal"): ?> selected<?php endif; ?>>Portugal</option>
            <option value="Espanha" <?php if($inputPaisId == "Espanha"): ?> selected<?php endif; ?>>Espanha</option>
        </select>
    </div>

    <div class="filter" id="inputProvinciaParent"  <?php if($inputPaisId != "Espanha"): ?> style="display:none" <?php endif; ?>>
        <select id="inputProvincia" name="inputProvincia" data-exterior-label="Localização">
            <option value="0" <?php if($inputProvinciaId == "0"): ?> selected<?php endif; ?>>Todos</option>
            <option value="Ávala" <?php if($inputDistritoId == "Ávala"): ?> selected<?php endif; ?>>Ávala</option>
            <option value="Albacete" <?php if($inputDistritoId == "Albacete"): ?> selected<?php endif; ?>>Albacete</option>
            <option value="Alicante" <?php if($inputDistritoId == "Alicante"): ?> selected<?php endif; ?>>Alicante</option>
            <option value="Almería" <?php if($inputDistritoId == "Almería"): ?> selected<?php endif; ?>>Almería</option>
            <option value="Asturias" <?php if($inputDistritoId == "Asturias"): ?> selected<?php endif; ?>>Asturias</option>
            <option value="Ávila" <?php if($inputDistritoId == "Ávila"): ?> selected<?php endif; ?>>Ávila</option>
            <option value="Badajoz" <?php if($inputDistritoId == "Badajoz"): ?> selected<?php endif; ?>>Badajoz</option>
            <option value="Barcelona" <?php if($inputDistritoId == "Barcelona"): ?> selected<?php endif; ?>>Barcelona</option>
            <option value="Burgos" <?php if($inputDistritoId == "Burgos"): ?> selected<?php endif; ?>>Burgos</option>
            <option value="Cáceres" <?php if($inputDistritoId == "Cáceres"): ?> selected<?php endif; ?>>Cáceres</option>
            <option value="Cádiz" <?php if($inputDistritoId == "Cádiz"): ?> selected<?php endif; ?>>Cádiz</option>
            <option value="Cantabria" <?php if($inputDistritoId == "Cantabria"): ?> selected<?php endif; ?>>Cantabria</option>
            <option value="Castellón" <?php if($inputDistritoId == "Castellón"): ?> selected<?php endif; ?>>Castellón</option>
            <option value="Ciudad Real" <?php if($inputDistritoId == "Ciudad Real"): ?> selected<?php endif; ?>>Ciudad Real</option>
            <option value="Córdoba" <?php if($inputDistritoId == "Córdoba"): ?> selected<?php endif; ?>>Córdoba</option>
            <option value="Cuenca" <?php if($inputDistritoId == "Cuenca"): ?> selected<?php endif; ?>>Cuenca</option>
            <option value="Gerona" <?php if($inputDistritoId == "Gerona"): ?> selected<?php endif; ?>>Gerona</option>
            <option value="Granada" <?php if($inputDistritoId == "Granada"): ?> selected<?php endif; ?>>Granada</option>
            <option value="Guadalajara" <?php if($inputDistritoId == "Guadalajara"): ?> selected<?php endif; ?>>Guadalajara</option>
            <option value="Guipúzcoa" <?php if($inputDistritoId == "Guipúzcoa"): ?> selected<?php endif; ?>>Guipúzcoa</option>
            <option value="Huelva" <?php if($inputDistritoId == "Huelva"): ?> selected<?php endif; ?>>Huelva</option>
            <option value="Huesca" <?php if($inputDistritoId == "Huesca"): ?> selected<?php endif; ?>>Huesca</option>
            <option value="Islas Baleares" <?php if($inputDistritoId == "Islas Baleares"): ?> selected<?php endif; ?>>Islas Baleares</option>
            <option value="Jaén" <?php if($inputDistritoId == "Jaén"): ?> selected<?php endif; ?>>Jaén</option>
            <option value="La Coruña" <?php if($inputDistritoId == "La Coruña"): ?> selected<?php endif; ?>>La Coruña</option>
            <option value="La Rioja" <?php if($inputDistritoId == "La Rioja"): ?> selected<?php endif; ?>>La Rioja</option>
            <option value="Las Palmas" <?php if($inputDistritoId == "Las Palmas"): ?> selected<?php endif; ?>>Las Palmas</option>
            <option value="León" <?php if($inputDistritoId == "León"): ?> selected<?php endif; ?>>León</option>
            <option value="Lérida" <?php if($inputDistritoId == "Lérida"): ?> selected<?php endif; ?>>Lérida</option>
            <option value="Lugo" <?php if($inputDistritoId == "Lugo"): ?> selected<?php endif; ?>>Lugo</option>
            <option value="Madrid" <?php if($inputDistritoId == "Madrid"): ?> selected<?php endif; ?>>Madrid</option>
            <option value="Málaga" <?php if($inputDistritoId == "Málaga"): ?> selected<?php endif; ?>>Málaga</option>
            <option value="Murcia" <?php if($inputDistritoId == "Murcia"): ?> selected<?php endif; ?>>Murcia</option>
            <option value="Navarra" <?php if($inputDistritoId == "Navarra"): ?> selected<?php endif; ?>>Navarra</option>
            <option value="Orense" <?php if($inputDistritoId == "Orense"): ?> selected<?php endif; ?>>Orense</option>
            <option value="Palencia" <?php if($inputDistritoId == "Palencia"): ?> selected<?php endif; ?>>Palencia</option>
            <option value="Pontevedra" <?php if($inputDistritoId == "Pontevedra"): ?> selected<?php endif; ?>>Pontevedra</option>
            <option value="Salamanca" <?php if($inputDistritoId == "Salamanca"): ?> selected<?php endif; ?>>Salamanca</option>
            <option value="Santa Cruz de Tenerife" <?php if($inputDistritoId == "Santa Cruz de Tenerife"): ?> selected<?php endif; ?>>Santa Cruz de Tenerife</option>
            <option value="Segovia" <?php if($inputDistritoId == "Segovia"): ?> selected<?php endif; ?>>Segovia</option>
            <option value="Sevilla" <?php if($inputDistritoId == "Sevilla"): ?> selected<?php endif; ?>>Sevilla</option>
            <option value="Soria" <?php if($inputDistritoId == "Soria"): ?> selected<?php endif; ?>>Soria</option>
            <option value="Tarragona" <?php if($inputDistritoId == "Tarragona"): ?> selected<?php endif; ?>>Tarragona</option>
            <option value="Teruel" <?php if($inputDistritoId == "Teruel"): ?> selected<?php endif; ?>>Teruel</option>
            <option value="Toledo" <?php if($inputDistritoId == "Toledo"): ?> selected<?php endif; ?>>Toledo</option>
            <option value="Valencia" <?php if($inputDistritoId == "Valencia"): ?> selected<?php endif; ?>>Valencia</option>
            <option value="Valladolid" <?php if($inputDistritoId == "Valladolid"): ?> selected<?php endif; ?>>Valladolid</option>
            <option value="Vizcaya" <?php if($inputDistritoId == "Vizcaya"): ?> selected<?php endif; ?>>Vizcaya</option>
            <option value="Zamora" <?php if($inputDistritoId == "Zamora"): ?> selected<?php endif; ?>>Zamora</option>
            <option value="Zaragoza" <?php if($inputDistritoId == "Zaragoza"): ?> selected<?php endif; ?>>Zaragoza</option>
        </select>
    </div>

    <div class="filter" id="inputDistritoParent" <?php if($inputPaisId != "Portugal"): ?> style="display:none" <?php endif; ?>>
        <select id="inputDistrito" name="inputDistrito" data-exterior-label="Localização">
            <option value="0" <?php if($inputDistritoId == "0"): ?>selected<?php endif; ?>>Todos</option>
            <option value="Aveiro" <?php if($inputDistritoId == "Aveiro"): ?>selected<?php endif; ?>>Aveiro</option>
            <option value="Beja" <?php if($inputDistritoId == "Beja"): ?>selected<?php endif; ?>>Beja</option>
            <option value="Braga" <?php if($inputDistritoId == "Braga"): ?>selected<?php endif; ?>>Braga</option>
            <option value="Bragança" <?php if($inputDistritoId == "Bragança"): ?>selected<?php endif; ?>>Bragança</option>
            <option value="Castelo Branco" <?php if($inputDistritoId == "Castelo Branco"): ?>selected<?php endif; ?>>Castelo Branco</option>
            <option value="Coimbra" <?php if($inputDistritoId == "Coimbra"): ?>selected<?php endif; ?>>Coimbra</option>
            <option value="Évora" <?php if($inputDistritoId == "Évora"): ?>selected<?php endif; ?>>Évora</option>
            <option value="Faro" <?php if($inputDistritoId == "Faro"): ?>selected<?php endif; ?>>Faro</option>
            <option value="Guarda" <?php if($inputDistritoId == "Guarda"): ?>selected<?php endif; ?>>Guarda</option>
            <option value="Ilha da Graciosa" <?php if($inputDistritoId == "Ilha da Graciosa"): ?>selected<?php endif; ?>>Ilha da Graciosa</option>
            <option value="Ilha da Madeira" <?php if($inputDistritoId == "Ilha da Madeira"): ?>selected<?php endif; ?>>Ilha da Madeira</option>
            <option value="Ilha das Flores" <?php if($inputDistritoId == "Ilha das Flores"): ?>selected<?php endif; ?>>Ilha das Flores</option>
            <option value="Ilha de Porto Santo" <?php if($inputDistritoId == "Ilha de Porto Santo"): ?>selected<?php endif; ?>>Ilha de Porto Santo</option>
            <option value="Ilha de Santa Maria" <?php if($inputDistritoId == "Ilha de Santa Maria"): ?>selected<?php endif; ?>>Ilha de Santa Maria</option>
            <option value="Ilha de São Jorge" <?php if($inputDistritoId == "Ilha de São Jorge"): ?>selected<?php endif; ?>>Ilha de São Jorge</option>
            <option value="Ilha de São Miguel" <?php if($inputDistritoId == "Ilha de São Miguel"): ?>selected<?php endif; ?>>Ilha de São Miguel</option>
            <option value="Ilha do Corvo" <?php if($inputDistritoId == "Ilha do Corvo"): ?>selected<?php endif; ?>>Ilha do Corvo</option>
            <option value="Ilha do Faial" <?php if($inputDistritoId == "Ilha do Faial"): ?>selected<?php endif; ?>>Ilha do Faial</option>
            <option value="Ilha do Pico" <?php if($inputDistritoId == "Ilha do Pico"): ?>selected<?php endif; ?>>Ilha do Pico</option>
            <option value="Ilha Terceira" <?php if($inputDistritoId == "Ilha Terceira"): ?>selected<?php endif; ?>>Ilha Terceira</option>
            <option value="Leiria" <?php if($inputDistritoId == "Leiria"): ?>selected<?php endif; ?>>Leiria</option>
            <option value="Lisboa" <?php if($inputDistritoId == "Lisboa"): ?>selected<?php endif; ?>>Lisboa</option>
            <option value="Portalegre" <?php if($inputDistritoId == "Portalegre"): ?>selected<?php endif; ?>>Portalegre</option>
            <option value="Porto" <?php if($inputDistritoId == "Porto"): ?>selected<?php endif; ?>>Porto</option>
            <option value="Santarém" <?php if($inputDistritoId == "Santarém"): ?>selected<?php endif; ?>>Santarém</option>
            <option value="Setúbal" <?php if($inputDistritoId == "Setúbal"): ?>selected<?php endif; ?>>Setúbal</option>
            <option value="Viana do Castelo" <?php if($inputDistritoId == "Viana do Castelo"): ?>selected<?php endif; ?>>Viana do Castelo</option>
            <option value="Vila Real" <?php if($inputDistritoId == "Vila Real"): ?>selected<?php endif; ?>>Vila Real</option>
            <option value="Viseu" <?php if($inputDistritoId == "Viseu"): ?>selected<?php endif; ?>>Viseu</option>
        </select>
    </div>
    <div class="filter">
        <select id="inputTipo" name="inputTipo" data-exterior-label="Tipo">
            <option value="0" <?php if($inputTipoId == "0"): ?>selected<?php endif; ?>>Todos</option>
            <option value="Emprego" <?php if($inputTipoId == "Emprego"): ?>selected<?php endif; ?>><?php echo dictionary("emprego"); ?></option>
            <option value="Estágio" <?php if($inputTipoId == "Estágio"): ?>selected<?php endif; ?>><?php echo dictionary("estagio") ?></option>
        </select>
    </div>
    <div class="filter">
        <select id="inputArea" name="inputArea" data-exterior-label="Área">
            <option value="0" <?php if($inputAreaId == "0"): ?>selected<?php endif; ?>>Todos</option>
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
                <option value="<?php echo $area->ID ?>" <?php if($inputAreaId == $area->ID) : ?>selected<?php endif; ?>><?php echo $area->post_title; ?></option>
                <?php                                                                                                                                      
            endforeach;
            ?>
        </select>
    </div>
    <div class="filter" id="work_outside" >
       <?php if(LANGUAGE == 'PT'): ?> 
           <a href="//edit.com.es/busqueda-de-talento/" target="_blank" class="multifilter-container" style="display: grid; background-color: black;">
            <div class="multiselect-header">
              <span style="color: #f2d31f;" class="multiselect-label" data-label="Quero trabalhar em Espanha">Quero trabalhar em Espanha</span>
              <div class="multiselect-icon"></div>
          </div>
      </a>     
  <?php else: ?>
    <a href="http://edit.com.pt/recrutamento/" target="_blank" class="multifilter-container" style="display: grid; background-color: black;">
        <div class="multiselect-header">
          <span style="color: #f2d31f;" class="multiselect-label" data-label="Quiero trabajar en Portugal">Quiero trabajar en Portugal</span>
          <div class="multiselect-icon"></div>
      </div>
  </a>      
<?php endif; ?>
</div>
<script>
    jQuery(document).ready(function( $ ) {
        Edit.modules.collection.push({ type: 'filters', instance: new Edit.modules.filtersModule('.js-filters', '/results/recrutamento-results/') })
    })
</script>
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
<!-- END PAGE FILTERS MODULE -->
<!-- CURSO MODULE -->
<div class="filtered-content">
    <div class="js-iso-module filtered margin-50 js-cursos recruitment-module">
        <div class="grid-cont" style="min-height: 200px;">
            <div class="grid-sizer"></div>
            <?php
            get_template_part( 'partials/partial', 'recrutamento-response' );
            ?>
        </div>
        <script>
            jQuery(document).ready(function( $ ) {
                Edit.modules.collection.push({ type: 'isoModule', instance: new Edit.modules.isoModule('.js-cursos') });
            })
        </script>
    </div>
</div>

<!-- END CURSO MODULE -->

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
        Edit.modules.collection.push({ type: 'loadMore', instance: new Edit.modules.loadMore('.js-loadmore', true, '/results/recrutamento-results/') });
    })
</script>
</div>
<!-- END LOAD MORE MODULE -->
<script>
    jQuery(document).ready(function( $ ) {
        Edit.pageLoader.totalModules = 2;
        Edit.modules.isoModuleResponsive.init();

        $("#inputPais").change(function () {
            var inputPais = $("#inputPais").val();
            if (inputPais == "Espanha") {
                $("#inputDistritoParent").hide();
                $("#inputProvinciaParent").show();
            } else {
                $("#inputProvinciaParent").hide();
                $("#inputDistritoParent").show();
            }
                //alert(inputPais);
            });
    })
</script>
</div>
