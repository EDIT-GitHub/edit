<?php
/**
* The template for Profissões
*
* @package Edit
*/
$environment = ENVIRONMENT;
?>
<div class="content">
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/scripts/slick/slick.css"/>
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/scripts/slick/slick-theme.css"/>
  <link href="<?php bloginfo('template_url');?>/web-fonts/css/fontawesome-all.min.css" rel="stylesheet">
  <?php if ($environment === 'development' || $environment === 'development-es' ): ?>
      <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/animate.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/profissoes.css" />
    <?php else: ?>
      <link rel="stylesheet" href="<?php bloginfo('template_url');?>/dist/css/animate.min.css" />
      <link rel="stylesheet" href="<?php bloginfo('template_url');?>/dist/css/profissoes.min.css?ver=<?php echo $GLOBALS['version']; ?>" />
    <?php endif; ?>
    <!-- HEADER MODULE -->
    <div class="header js-header flex full no-margin">
      <div class="header-item inner">
        <div class="background">
          <div class="img" draggable="false" style="background-image:url(<?php the_field('fundo_header'); ?>)"></div>
          <div class="img-overlay"></div>
          <div class="pixels" style="background-image:url(<?php bloginfo('template_directory'); ?>/images/dummy/formacao/header/pixel-profissoes.png)"></div>
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
            <h1 class="title">
              <?php the_field('titulo'); ?>
            </h1>
            <div>
              <p class="subtitulo">
                <?php the_field('subtitulo'); ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      jQuery(document).ready(function ($) {
        Edit.modules.collection.push({ type: 'header', instance: new Edit.modules.smallHeader('.js-header') })
      })
    </script>
  </div>
  <!-- END HEADER MODULE -->
  <?php
  if (have_rows('blocos_profissoes')):
    $GLOBALS['count'] = 0;
    while (have_rows('blocos_profissoes')):
      the_row();
      $template = get_row_layout();
      ?>
      <?php
      switch (get_row_layout()):
        case 'header':
        ?>
        <div class="block-profissoes bg-black">
          <div class="margin-pixels cabecalho">
            <div class="grid-cont big">
              <h2 class="header-title"><?php the_sub_field('texto'); ?></h2>
            </div>
          </div>
          <div class="btn-position-holder"></div>
          <div class="block-formacao-info form-content curso">
            <div class="grid-cont">
              <?php wp_nav_menu( array( 'theme_location'=>'profissoes') ); ?>
            </div>
          </div>
        </div>
        <?php
        break;
        case 'bloco':
        $colorTitle = '';
        $colorSubtitle = '';
        $bg = '';
        $reset = '';
        $pb80 = '';
        $colorDot = '';
        ?>
        <?php if( get_sub_field('tipo_de_bloco') == 'fundo-preto' ):
          $colorTitle = 'white';
          $colorSubtitle = 'yellow';
          $bg = 'bg1';
          $reset = ' reset';
          $pb80 = ' pb-80';
        endif;
        ?>
        <?php if( get_sub_field('tipo_de_bloco') == 'fundo-cinza' ):
          $bg = 'bg-cinza';
          $reset = ' reset';
          $pb80 = ' pb-80';
        endif;
        ?>
          <?php if( get_sub_field('tipo_de_bloco') == 'ofertas' ):
          $colorTitle = 'white';
          $colorSubtitle = 'yellow';
          $bg = 'bg1';
          $reset = ' reset';
          $pb80 = ' pb-80';
        endif;
        ?>
        <?php if( get_sub_field('tipo_de_bloco') == 'amarelo' ):
          $bg = 'bg3';
          $colorDot = ' white';
          $reset = ' reset';
          $pb80 = ' pb-60';
        endif; ?>
        <?php if( get_sub_field('tipo_de_bloco') == 'separador' ): ?>
          <div class="header flex small separador no-margin">
            <div class="wrapper">
              <div class="header-item">
                <div class="background">
                  <div class="img" draggable="false" style="background-image:url('<?php the_sub_field('imagem_de_fundo');?>')"></div>
                  <div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel-profissoes.png)"></div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <!-- Count all block titles as global -->
        <?php if( get_sub_field('bloco-titulo') ): ?>
          <?php $GLOBALS['count']++ ?>
        <?php endif; ?>
        <?php if( get_sub_field('tipo_de_bloco') == 'formacao' ):
          get_template_part( 'partials/partial', 'formacao-profissoes');
        endif; ?>
        <?php if( get_sub_field('tipo_de_bloco') != 'formacao'): ?>
          <?php if( get_sub_field('bloco-titulo') ): ?>
            <div id="<?php echo 'bloco' . $GLOBALS['count']; ?>" class="block-profissoes <?php echo $bg; ?> bloco-js ">
              <div class="grid-cont">
                <h2 class="title <?php echo $colorTitle; ?> reset pt-80">
                  <span class="numero <?php echo $colorTitle; ?>">
                    <?php echo $GLOBALS['count']; ?>
                  </span>
                  <?php the_sub_field('bloco-titulo'); ?>
                  <span class="dot<?php echo $colorDot; ?>">.</span>
                </h2>
              <?php endif; ?>
              <?php if( get_sub_field('subtitulo') ): ?>
                <h3 class="subtitulo <?php echo $colorSubtitle; ?>">
                  <?php the_sub_field('subtitulo'); ?>
                </h3>
              <?php endif; ?>
              <?php if( get_sub_field('tipo_de_bloco') == 'digital-designer' ): ?>
                <svg xmlns="http://www.w3.org/2000/svg" class="devices-svg" viewBox="0 0 600 233"><g class="devices"><g id="linha-esquerda"><path id="r1I1hZhU-X" d="M58.4 172.6h-1.7c-24 0-43.6-19.5-43.6-43.6s19.5-43.6 43.6-43.6H123c4.8 0 8.7-3.9 8.7-8.7 0-2.3-.9-4.5-2.6-6.1-1.7-1.7-3.8-2.6-6.1-2.6h-21c-6.8 0-12.2-5.5-12.2-12.2s5.5-12.2 12.2-12.2h58.4c1.9 0 .2 1.1.2 3.1 0 1.9 1.8 3.8-.2 3.8H102c-2.9 0-5.2 2.3-5.2 5.2s2.3 5.2 5.2 5.2h21c4.2 0 8.1 1.7 11.1 4.6 2.9 2.9 4.6 6.9 4.6 11.1 0 8.7-7.1 15.7-15.7 15.7H56.7c-20.2 0-36.6 16.4-36.6 36.6s16.4 36.6 36.6 36.6h1.7c1.9 0 3.5 1.5 3.5 3.5s-1.6 3.6-3.5 3.6z"/></g><g id="laptop-device"><g id="laptop" data-animator-group="true" data-animator-type="0"><g id="r1FJ3-3L-Q"><g id="HJ9knZhL-Q"><path id="Bki12b3UZm" d="M411.6 126.4h14.9v2h-14.9z"/><path id="HJ2k3bh8b7" d="M419 133.1h10.3v2H419z"/><path id="BJTJ2-nLZm" d="M451.9 133.1h71.5v2h-71.5z"/><path id="Hk01n-3IZQ" d="M436.3 133.1h11.6v2h-11.6z"/><path id="SJ1eJ3Z28-Q" d="M422.5 138.7H443v2h-20.5z"/><path id="rylxyhWhI-Q" d="M430.8 146.5h25.9v2h-25.9z"/><path id="rJZek2WhIZX" d="M411.6 153.9h28.3v2h-28.3z"/><path id="rkzeJh-hL-m" d="M442.9 153.9h20.5v2h-20.5z"/><path id="B17gynZnU-7" d="M419 161.3h38v2h-38z"/><path id="B1EgJ2ZhIbm" d="M472.5 161.3h25.3v2h-25.3z"/><path id="HJHx1hZn8WQ" d="M458.6 161.3h11.9v2h-11.9z"/><path id="Hk8lknb2IZQ" d="M431.6 168.6h33.2v2h-33.2z"/><path id="BJDg12ZhIbQ" d="M422.5 168.7h6.9v2h-6.9z"/><path id="ryOxy3b3IZ7" d="M411.6 174.1h22.7v2h-22.7z"/><path id="r1YlJ3b2LZm" d="M436 174.1h7.8v2H436z"/><path id="ryqly3b3UWX" d="M446 174.1h37.2v2H446z"/><path id="Bkjey3-38-X" d="M486.1 174.1h33.6v2h-33.6z"/><path id="HJhlkhbn8bX" d="M419 181.5h11.8v2H419z"/><path id="Hy6xJ2Z2I-7" d="M434.2 181.4h28v2h-28z"/><path id="BJCeyhW3LZ7" d="M425.3 188.9H448v2h-22.7z"/><path id="BJyW1hW2LZQ" d="M452.8 188.9h22.7v2h-22.7z"/><path id="HJeZk2bnIWX" d="M479 188.9h21.4v2H479z"/><path id="HJZbJ3b38-m" d="M515 146.5h6.4v2H515z"/><path id="B1f-13b2UWX" d="M459 146.5h53.1v2H459z"/><path id="r1mbyn-nUbm" d="M430.8 126.4h60.3v2h-60.3z"/><path id="SyV-Jhb38ZX" d="M401.5 123.5h3.1v3.1h-3.1z"/><path id="S1SZy2b38-m" d="M401.5 131.8h3.1v3.1h-3.1z"/><path id="BJLWknWnIWQ" d="M401.5 140.1h3.1v3.1h-3.1z"/><path id="BkvZk3ZnIbX" d="M401.5 148.3h3.1v3.1h-3.1z"/><path id="H1d-1hbnUbm" d="M401.5 156.6h3.1v3.1h-3.1z"/><path id="HkY-Jh-3Lb7" d="M401.5 164.8h3.1v3.1h-3.1z"/><path id="BJ9-12b28bm" d="M401.5 173.1h3.1v3.1h-3.1z"/><path id="SJjby2bhI-7" d="M401.5 181.4h3.1v3.1h-3.1z"/><path id="Sy2Zk3WhIW7" d="M401.5 189.7h3.1v3.1h-3.1z"/></g><g id="SJ6bynZhUWQ"><path id="r10ZJhZ3Ub7" d="M411.6 200.6h14.9v2h-14.9z"/><path id="ByyGk2bh8Z7" d="M419 207.3h10.3v2H419z"/><path id="rJgMJh-hI-m" d="M451.9 207.3h71.5v2h-71.5z"/><path id="Hy-fkn-2IZX" d="M436.3 207.2h11.6v2h-11.6z"/><path id="ryfMy2bhU-X" d="M422.5 212.8H443v2h-20.5z"/><path id="SJXM1n-nI-m" d="M430.8 220.7h25.9v2h-25.9z"/><path id="H1NM1nbnUWm" d="M411.6 228h28.3v2h-28.3z"/><path id="ByHM1hbn8Zm" d="M442.9 228h20.5v2h-20.5z"/><path id="SyIMJ3bh8bm" d="M419 235.4h38v2h-38z"/><path id="HJvGJ3bh8bm" d="M472.5 235.4h25.3v2h-25.3z"/><path id="BydGyh-2LW7" d="M458.6 235.4h11.9v2h-11.9z"/><path id="H1KfJ3W2U-7" d="M431.6 242.8h33.2v2h-33.2z"/><path id="SJ9MJnZ3Lb7" d="M422.5 242.8h6.9v2h-6.9z"/><path id="r1jG12WhI-X" d="M411.6 248.2h22.7v2h-22.7z"/><path id="rJ3MJ2-nUb7" d="M436 248.2h7.8v2H436z"/><path id="Hkazk2W2L-m" d="M446 248.2h37.2v2H446z"/><path id="BJRzknZ2IbQ" d="M486.1 248.2h33.6v2h-33.6z"/><path id="H11QJh-3IZQ" d="M419 255.6h11.8v2H419z"/><path id="SkgmknWn8Wm" d="M434.2 255.6h28v2h-28z"/><path id="B1WQJ3bnLbQ" d="M425.3 263H448v2h-22.7z"/><path id="SyM7ynbhU-m" d="M452.8 263h22.7v2h-22.7z"/><path id="HymX1nbhLZm" d="M479 263h21.4v2H479z"/><path id="H1NQy2b2IWm" d="M515 220.6h6.4v2H515z"/><path id="S1B7Jhb2UWQ" d="M459 220.7h53.1v2H459z"/><path id="ryUX1hZ28-X" d="M430.8 200.6h60.3v2h-60.3z"/><path id="SJPmynbnIb7" d="M401.5 197.7h3.1v3.1h-3.1z"/><path id="Sy_m1hW3LZ7" d="M401.5 206h3.1v3.1h-3.1z"/><path id="rkK7yhbhIZ7" d="M401.5 214.2h3.1v3.1h-3.1z"/><path id="SkqX12Wn8-7" d="M401.5 222.4h3.1v3.1h-3.1z"/><path id="HJs7y2WhUZX" d="M401.5 230.7h3.1v3.1h-3.1z"/><path id="Hy3QJn-28bm" d="M401.5 239h3.1v3.1h-3.1z"/><path id="SJTQyh-hLZm" d="M401.5 247.3h3.1v3.1h-3.1z"/><path id="rJAXkhW3Lbm" d="M401.5 255.5h3.1v3.1h-3.1z"/><path id="Bk1Vk3Z3UWX" d="M401.5 263.8h3.1v3.1h-3.1z"/><path id="ryeNJhb2UbX" d="M401.5 272h3.1v3.1h-3.1z"/></g></g></g><path id="S1WNJ2-nIZm" d="M527.2 196.4H396.1c-.6 0-1.2.5-1.2 1.1V284c0 .6.5 1.1 1.2 1.1h131.1c.6 0 1.2-.5 1.2-1.1v-86.5c-.1-.6-.6-1.1-1.2-1.1z"/><path id="Bkf4k2bhIbX" d="M444.8 140.6h38c1.4 0 2.5 1.1 2.5 2.5v31c0 1.4-1.1 2.5-2.5 2.5h-44.6c-1.4 0-2.5-1.1-2.5-2.5v-31c0-1.4 1.1-2.5 2.5-2.5h6.6"/><text id="B17NkhZ3IZ7">&lt;/&gt;</text><path id="HJ4Vk3W2Ib7" d="M532.5 30.2H400.3c-.7 0-1.2.5-1.2 1.1v87.2c0 .6.5 1.1 1.2 1.1h132.2c.7 0 1.2-.5 1.2-1.1V31.2c0-.6-.5-1-1.2-1z"/><path id="r1S4khbnLZX" d="M534.3 215.9H387.5c-.3 0-.6-.3-.6-.6V110.1c0-.4.3-.6.6-.6h146.8c.3 0 .6.2.6.6v105.2c0 .3-.3.6-.6.6z"/><path id="S1UEJhbnLbm" d="M532.4 221.8H387.8c-3.4 0-6.5-2.5-7-6l-1-6.3h67l2.6 3.7h18.5l2.8-3.7h70.5l-.9 5.5c-.6 4-4 6.8-7.9 6.8z"/></g><g id="linha-direita"><path id="H1OE13-hUW7" d="M526 85.4h-66.2c-4.8 0-8.7-3.9-8.7-8.7 0-2.3.9-4.5 2.6-6.1 1.7-1.7 3.8-2.6 6.1-2.6h21c6.8 0 12.2-5.5 12.2-12.2 0-6.8-5.5-12.2-12.2-12.2h-64.5c-1.9 0-2.3 1.4-2.3 3.4 0 1.9.4 3.6 2.3 3.6h64.5c2.9 0 5.2 2.3 5.2 5.2s-2.3 5.2-5.2 5.2h-21c-4.2 0-8.1 1.7-11.1 4.6-2.9 2.9-4.6 6.9-4.6 11.1 0 8.7 7.1 15.7 15.7 15.7H526c20.2 0 36.6 16.4 36.6 36.6 0 17.3-9.6 31.3-25.7 35.2v7.8c19.7-4.2 32.7-21.9 32.7-42.9 0-24.2-19.6-43.7-43.6-43.7z"/></g><path id="SJ5NkhZh8Z7" d="M181.1 36h214.7"/><g id="desktop" data-animator-group="true" data-animator-type="0"><g id="SJiVyhWn8bQ"><g id="HJn4k3bnL-7"><path id="SkTVJ2W28bm" d="M284.5 92h-69.4c-.4 0-.7-.3-.7-.7V49.7c0-.4.3-.7.7-.7h69.3c.4 0 .7.3.7.7v41.7c0 .3-.3.6-.6.6z"/><path id="ryCEk3b3LbQ" d="M284.5 92h-69.4c-.4 0-.7-.3-.7-.7V49.7c0-.4.3-.7.7-.7h69.3c.4 0 .7.3.7.7v41.7c0 .3-.3.6-.6.6z"/><path id="Sy1Bkn-hUb7" d="M259.1 72L242 81.8c-1 .6-2.4-.2-2.4-1.4V60.7c0-1.2 1.4-2 2.4-1.4l17.1 9.8c1.1.7 1.1 2.3 0 2.9z"/><path id="H1er1hbnLZX" d="M259.1 72L242 81.8c-1 .6-2.4-.2-2.4-1.4V60.7c0-1.2 1.4-2 2.4-1.4l17.1 9.8c1.1.7 1.1 2.3 0 2.9z"/></g><g id="S1WBk3b3I-m"><path id="BJfHkh-28W7" d="M372.5 182h-69.4c-.4 0-.7-.3-.7-.7v-41.6c0-.4.3-.7.7-.7h69.3c.4 0 .7.3.7.7v41.7c0 .3-.3.6-.6.6z"/><path id="ByQB12-2UbX" d="M372.5 182h-69.4c-.4 0-.7-.3-.7-.7v-41.6c0-.4.3-.7.7-.7h69.3c.4 0 .7.3.7.7v41.7c0 .3-.3.6-.6.6z"/><path id="BJNrkhZ3IWQ" d="M347.1 162l-17.1 9.8c-1 .6-2.4-.2-2.4-1.4v-19.7c0-1.2 1.4-2 2.4-1.4l17.1 9.8c1.1.7 1.1 2.3 0 2.9z"/><path id="HJSSynW2I-X" d="M347.1 162l-17.1 9.8c-1 .6-2.4-.2-2.4-1.4v-19.7c0-1.2 1.4-2 2.4-1.4l17.1 9.8c1.1.7 1.1 2.3 0 2.9z"/></g><g id="H18HyhW2LZX"><path id="ryvSJnZnI-7" d="M329.5 55.7h34.1"/><path id="rydBk3WhIZX" d="M329.5 66.2h17"/></g><g id="H1FBy2Z3U-Q"><path id="Hk9Hk3Z3LW7" d="M329.5 84.5h34.1"/><path id="rysHJ2WnLWQ" d="M329.5 95h17"/></g><g id="HJnBk2Wh8Wm"><path id="Hkprk2Z28-X" d="M329.5 113.3h34.1"/><path id="rJRrJhWn8WX" d="M329.5 123.8h17"/></g><g id="BkJ8y3bnIbm"><path id="S1gUk2b2UbQ" d="M213.3 103.8h34.1"/><path id="H1b8J3Z2LZQ" d="M213.3 113h75.9"/></g><g id="rkf8yhZnLZ7"><path id="BkQLknW2Lb7" d="M213.3 125.3h34.1"/><path id="S1NLk3W2UbQ" d="M213.3 134.5h75.9"/></g><g id="SJHLy3Z2IbX"><path id="Sk8Ly3bh8-7" d="M213.3 146.8h34.1"/><path id="HywIJnW2UW7" d="M213.3 156h75.9"/></g><g id="By_81nZnU-m"><path id="ByYUyhb28Z7" d="M213.3 166.8h34.1"/><path id="rk58ynb3I-Q" d="M213.3 176h75.9"/></g><path id="rJo8kn-h8W7" d="M302.1 49.3h23v23h-23z"/><path id="Hk2Iyh-hIZ7" d="M302.1 78.6h23v23h-23z"/><path id="ry6Ly2b2UbQ" d="M302.1 108.7h23v22.4h-23z"/></g></g><path id="r1AUJ3Zn8bX" d="M412.4 185.6H162.3c-1.2 0-2.2-.4-2.2-.8v-65.3c0-.5 1-.8 2.2-.8h250.2c1.2 0 2.2.4 2.2.8v65.3c-.1.4-1 .8-2.3.8z"/><path id="BykPy3bhI-X" d="M412.4 45.6H162.3c-1.2 0-2.2-.2-2.2-.6V.1c0-.3 1-.6 2.2-.6h250.2c1.2 0 2.2.2 2.2.6V45c-.1.3-1 .6-2.3.6z"/><path id="r1gvJnWnLbQ" d="M414.4 97.3h-29.8c-.1 0-.3.2-.3.5v42c0 .3.1.5.3.5h29.8c.1 0 .3-.2.3-.5v-42c-.1-.2-.2-.5-.3-.5z"/><circle id="SJWPkn-n8W7" cx="195.1" cy="27.4" r="2.9"/><circle id="HJfPy2-2UWQ" cx="204.3" cy="27.4" r="2.9"/><circle id="SJmv1hZ2LWX" cx="213.5" cy="27.4" r="2.9"/><path id="S1Nv1h-nI-X" d="M412.2 185.6H162.3c-1.2 0-2.2-1-2.2-2.2V5.2c0-1.2 1-2.2 2.2-2.2h249.9c1.2 0 2.2 1 2.2 2.2v178.2c0 1.2-1 2.2-2.2 2.2z"/><path id="H1HPyhWn8-m" d="M160 140.8h254.4"/><path id="BJIwk2W28W7" d="M395.8 131.6V24.1c0-2.9-2.3-5.2-5.2-5.2H186.4c-2.9 0-5.2 2.3-5.2 5.2v100.6c0 2.9 2.3 5.2 5.2 5.2h209.4"/><g id="HkDwy3ZhU-X"><path id="SJdPknZ38Zm" d="M319.9 223.7h-65.4l7-37.6h51.4z"/><path id="rJYPJhbhLWX" d="M243.3 223.7h87.8"/></g><circle id="SJqv1nWhIWQ" cx="287.2" cy="162.4" r="6.7"/><g id="SJoPJhZn8-X"><circle id="Hk2w1hWnUWm" cx="78.2" cy="174.6" r="3.3"/><path id="Hkpwk3b3UZ7" d="M182.9 222.1h9.4c5.2 0 9.3-4.2 9.3-9.3v-76.3c0-5.2-4.2-9.3-9.3-9.3H68.9c-5.2 0-9.3 4.2-9.3 9.3v76.3c0 5.2 4.2 9.3 9.3 9.3h115.9"/><path id="HkRP1nZnUW7" d="M169.5 208.8h19v-68.4H96v68.4h78.2"/><circle id="HJyuy2Z2L-X" cx="78.2" cy="174.6" r="9"/><path id="S1x_JnZnLWm" d="M74.4 140.4H82"/><path id="S1Z_y2b28WX" d="M74.4 148.9H82"/><path id="BkG_J2Wn8Z7" d="M74.4 157.3H82"/><path id="HJX_1h-2Ubm" d="M74.4 191.9H82"/><path id="H1V_1hb38Z7" d="M74.4 200.3H82"/><path id="HJBuyhbnLZQ" d="M74.4 208.8H82"/><g data-animator-group="true" data-animator-type="2"><path id="line1-tablet" d="M106.4 155.4h69.3" class="line1-tablet"/></g><g data-animator-group="true" data-animator-type="2"><path id="line2-tablet" d="M106.4 161.6h69.3" class="line2-tablet"/></g><g data-animator-group="true" data-animator-type="2"><path id="line3-tablet" d="M106.4 167.7h69.3" class="line3-tablet"/></g><path id="ryFd12WnU-7" d="M106.4 173.9h69.3"/><path id="r19_yh-38-7" d="M106.4 180h69.3"/><g id="lapis" data-animator-group="true" data-animator-type="0"><path id="S1ZYJ3W3LZm" d="M186.4 185.1l-9-4.2c-.9-.4-2 .6-1.5 1.5l4.2 9 37.2 37.2c1 1 2.6 1 3.7 0l2.7-2.7c1-1 1-2.6 0-3.7l-37.3-37.1z"/></g></g><path id="HkGt12Z3U-m" d="M394.8 225.2h-51.2c-1 0-1.8-.9-1.8-1.8v-94.8c0-1 .8-1.8 1.8-1.8h51.2c1 0 1.8.9 1.8 1.8v94.8c.1.9-.8 1.8-1.8 1.8z"/><path id="BymYkhZ3UWQ" d="M341.9 148.5H396v59.6h-54.1z"/><circle id="r14Fy3-3LZX" cx="369.2" cy="216.6" r="3.9"/><circle id="ryHK13bnI-7" cx="352.8" cy="136.6" r="1.5"/><circle id="HkLFknbnIb7" cx="369.2" cy="132" r="1.5"/><path id="H1vFynbh8Zm" d="M361.4 138.1h15.7v1.4h-15.7z"/><g id="Hy_t1hZ2U-7"><path id="BJttkh-3IZX" d="M358.3 182.4l7.6-7.6"/><path id="Hy5t1hb38Zm" d="M372.5 182.4l7.5-7.6"/><path id="HyiFk2Zn8ZQ" d="M362.5 185.4l13.5-13.5"/></g><path id="SyhYJ3Z3LZ7" d="M341.9 147.3h54.7v1.7h-54.7z"/><path id="rk6F13Z28Zm" d="M341.9 208.1h54.7v1.7h-54.7z"/><path id="SJAFJ2-nI-m" d="M181.1 36h214.7"/><path xmlns="http://www.w3.org/2000/svg" d="M159.1-40h253.3V0H159.1z" class="clip-devices-svg"/></g><g class="line-translate"><path d="M598.5 231H5.6c-1.9 0-3.5-1.5-3.5-3.5s1.5-3.5 3.5-3.5h593c1.9 0 3.5 1.5 3.5 3.5s-1.6 3.5-3.6 3.5z" class="line-devices-svg"/></g></svg>
              <?php endif; ?>
              <?php if( get_sub_field('tipo_de_bloco') == 'front-end' ):
                $pb80 = ' pb-80';
                $reset = ' reset';
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="devices-svg-front-end" viewBox="0 0 600 234">
                  <g class="devices"><g id="web_design">
                    <path id="XMLID_102_" d="M48.6 16.5C48.6 25.6 56 33 65.1 33h74.3c8.8 0 16.2 7.1 16.2 16.2 0 8.8-7.1 16.2-16.2 16.2H99.6c-9.7 0-17.6 8-17.6 17.6 0 9.7 8 17.6 17.6 17.6l145.9.6 2.6 41.8-228.4-1.4C8.8 141.7 0 150.5 0 161.3c0 10.8 8.8 19.6 19.6 19.6h50.6c10.8 0 19.6 8.8 19.6 19.6V231l439-.6v-21.3c0-12.2-9.7-21.9-21.9-21.9l-67.1-.3v-52.6h140.3c11.1 0 19.9-8.8 19.9-19.9 0-11.1-8.8-19.9-19.9-19.9h-66c0-17.1-13.9-31-31-31H441V33h117.5c9.1 0 16.5-7.4 16.5-16.5S567.6 0 558.5 0H65.1C56 0 48.6 7.4 48.6 16.5z" class="st-end0"/>
                    <path id="XMLID_472_" d="M462.9 165.3H220.5v-130c0-3.1 2.8-14.2 14.2-14.2h212.8c3.1 0 12.8 5.4 12.8 8.5l2.6 135.7z" class="st-end1"/><path id="XMLID_468_" d="M462.9 166.7H219.1V33.6c0-7.6 6.4-13.9 13.9-13.9h102.1v2.8H233c-6 0-11.1 5.1-11.1 11.1v130.3h241v2.8z" class="st-end2"/><path id="XMLID_467_" d="M233.6 35h216.5v113.8H233.6z" class="st-end3"/><path id="XMLID_466_" d="M305 187.2h73.1v43.2H305z" class="st-end4"/><path id="XMLID_465_" d="M305 187.2h73.1v21.6H305z" class="st-end0"/><path id="XMLID_461_" d="M379.5 228.5h-2.8V194h-70.3v34.5h-2.8v-37.3h75.9z" class="st-end2"/>
                    <path id="XMLID_463_" d="M445.2 194H236.4c-9.6 0-17.4-7.8-17.4-17.4v-18.2h243.5v18.2c.1 9.6-7.7 17.4-17.3 17.4zm-223.3-32.7v15.4c0 8 6.5 14.5 14.5 14.5h208.8c8 0 14.5-6.5 14.5-14.5v-15.4H221.9z" class="st-end2"/><path id="XMLID_39_" d="M378.1 194H233c-7.6 0-13.9-6.4-13.9-13.9v-21.6h243.8v2.8h-241v18.8c0 6 5.1 11.1 11.1 11.1h145.1v2.8z" class="st-end2"/><path id="XMLID_87_" d="M462.6 169h-2.8V33.9c0-6.3-5.6-11.4-12.5-11.4H327.7v-2.8h119.5c8.5 0 15.4 6.4 15.4 14.2V169z" class="st-end2"/><g id="XMLID_148_" class="st-end5"><path d="M315.2 88.2c0-3.7-3.1-6.8-6.8-6.8h-90.2v99c0 8.3 6.5 14.8 14.8 14.8h70V229h2.3v1.7h11.4c2.8-2 4.8-4.8 5.4-8.5l1.7-9.7h-8.5c-.1 0-.1-124.3-.1-124.3z" class="st-end1"/></g><path id="XMLID_142_" d="M337.4 187.2c-4.9 0-8.8-3.9-8.8-8.8s3.9-8.8 8.8-8.8c5 .4 8.8 4.2 8.8 8.8 0 4.9-3.8 8.8-8.8 8.8zm-.1-14.8c-3.3 0-5.9 2.6-5.9 6s2.6 6 6 6 6-2.6 6-6c0-3.1-2.7-5.8-6.1-6z" class="st-end2"/><path d="M253.8 54.1l11.4-4 11.7 4-2 15.1-10 5.4-9.7-5.4-1.4-15.1z" class="st-end6"/><path d="M276.8 54.1l-11.7-4v24.5l10-5.4 1.7-15.1z" class="st-end1"/><path d="M265.1 52.9L258 68.8h2.6l1.4-3.7h6.3l1.4 3.7h2.6l-7.2-15.9zm0 5.1l2.3 5.1h-4.6l2.3-5.1z" class="st-end2"/>
                    <path d="M349.9 61.7c0 2 2 4 5.1 5.1-.6 3.1 0 5.7 1.7 6.5 1.7 1.1 4.3.3 6.8-2 2.3 2 4.8 2.8 6.5 2 1.7-1.1 2.3-3.7 1.7-6.8 3.1-1.1 5.1-2.6 5.1-4.8 0-2-2-3.7-5.1-4.8.6-3.4 0-5.7-1.7-6.8-1.7-.9-4.3 0-6.5 2-2.6-2.3-5.1-2.8-6.8-2-1.7.9-2.3 3.7-1.7 6.8-3.1 1.1-5.1 3.1-5.1 4.8z" class="st-end4"/><path d="M371 58c-.3 0-.6-.3-.9-.3v-.6c.6-2.8.3-5.1-1.1-6-1.1-.9-3.4 0-5.4 1.7l-.6.6-.3-.3c-2.3-2-4.3-2.8-5.7-2-1.1.9-1.7 2.8-1.1 5.4 0 .3 0 .6.3.9-.3 0-.6.3-.9.3-2.6.9-4.3 2.3-4.3 3.7s1.7 2.8 4.3 4c.3 0 .6 0 .6.3s0 .6-.3.9c-.6 2.6 0 4.8 1.1 5.4 1.1.9 3.4 0 5.4-1.7l.6-.6.6.6c2 1.7 4 2.6 5.1 1.7 1.1-.9 1.7-2.8 1.1-5.7 0-.3 0-.3-.3-.6h.6c2.8-.9 4.6-2.3 4.6-4 .8-1.4-.9-2.5-3.4-3.7z" class="st-end2"/>
                    <path d="M370.4 64.9h-.3c-.3-.9-.6-2-1.1-3.1.6-1.1.9-2 1.1-2.8.3 0 .6.3.6.3 2.3.9 3.4 2 3.4 2.8 0 .8-1.4 1.9-3.7 2.8zm-1.1 1.7c.3 1.1.3 2.3 0 3.1 0 .9-.6 1.1-.9 1.4-.9.6-2.3 0-4-1.7l-.6-.6c.6-.9 1.4-1.7 2-2.6 1.1 0 2.3-.3 3.1-.6.4.7.4 1 .4 1zm-9.7 4.5c-.9.3-1.4.3-1.7 0-.9-.6-1.1-2-.6-4.3 0-.3 0-.6.3-.9.9.3 2 .3 3.1.6.6.9 1.4 1.7 2 2.6-.3.3-.3.3-.6.3-.8.9-1.9 1.4-2.5 1.7zm-3.7-6.2c-1.1-.3-2-.9-2.8-1.4-.6-.6-.9-1.1-.9-1.4 0-.9 1.4-2 3.4-2.8.3 0 .6-.3.9-.3.3.9.6 2 1.1 3.1-.6 1.1-.9 2-1.1 3.1 0-.3-.3-.3-.6-.3zm1.1-8c-.6-2.3-.3-4 .6-4.6.9-.6 2.6.3 4.6 1.7l.3.3c-.6.9-1.4 1.7-2 2.6-1.1 0-2.3.3-3.1.6-.1 0-.1-.3-.4-.6zm10.6 2.6c-.3-.3-.6-.9-.9-1.1.9 0 1.4.3 2.3.3-.3.6-.6 1.4-.9 2-.2-.4-.5-1-.5-1.2zm-4.3-4c.6.6.9 1.1 1.4 1.7h-2.8c.5-.9.8-1.4 1.4-1.7zm-4.3 4c-.3.3-.6.9-.6 1.1-.3-.6-.6-1.4-.9-2 .6-.3 1.4-.3 2.3-.3-.2.3-.5.9-.8 1.2zm.9 5.9c-.9 0-1.4-.3-2.3-.3.3-.6.6-1.4.9-2 .3.3.6.9.6 1.1.2.7.5.9.8 1.2zm3.4 3.2c-.6-.6-.9-1.1-1.4-1.7h2.8c-.5.5-.8 1.1-1.4 1.7zm4.8-5.4c.3.9.6 1.4.9 2-.6.3-1.4.3-2.3.3.3-.3.6-.9.9-1.1 0-.4.3-1 .5-1.2zm-1.4.5c-.3.6-.9 1.1-1.1 1.7H361c-.3-.6-.9-1.1-1.1-1.7-.3-.6-.6-1.1-1.1-2 .3-.6.6-1.4 1.1-2 .3-.6.9-1.1 1.1-1.7h4.6c.3.6.9 1.1 1.1 1.7.3.6.6 1.1 1.1 2-.5.9-.8 1.5-1.1 2zm2-11.4c.9.6 1.1 2.3.6 4.8v.6c-.9-.3-2-.3-3.1-.6-.6-.9-1.4-1.7-2-2.6l.6-.6c1.3-1.3 3.1-1.8 3.9-1.6z" class="st-end4"/>
                    <path d="M363.3 59.7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2c-.3-1.1.9-2 2-2" class="st-end2"/>
                    <g>
                      <path d="M383.5 109.2h2.8s-5.1 6.8-5.4 7.4c0 .3-.3.3-.6.6-.3.6-.6 2-.6 2h-2.6s.3-1.4.3-2.3c0-.6-.3-1.4-.6-2-.3-.6-.6-2-.6-2h2.6l.3 1.4 4.4-5.1" class="st-end4"/>
                      <path d="M378.4 110.7c.6.3.9 2 .9 2h-5.1l-1.4 6.5H370s1.4-7.1 1.7-8.5c0-.3.9-.3 1.7-.3h1.7c1.3 0 2.7 0 3.3.3M367.6 113.8s0-.3-.3-.9c-.3-.3-.6-.6-1.1-.6-2 0-2 1.4-2 1.4h3.4v.1zm2-1.7c.3 1.1-.3 3.4-.3 3.4h-4.6c-.6 0-1.1 0-1.1.3-.3.3 0 .9.3 1.1.3.3.9.3 1.1.3 1.4.3 4 0 4 0l-.6 2s-4 .3-5.7-.3c-.3 0-.9-.3-.9-.6 0 0 0-.3-.3-.3 0 0-.3-.3-.3-.6-.6-1.1 0-3.4.6-4.6 0 0 0-.3.3-.6 0-.3.3-.3.3-.6l.3-.3s0-.3.3-.3l.6-.6c.9-.6 2.3-1.1 4-.9.6 0 1.7.3 2 .9v1.7zM359 110.4h2.3s-1.1 6-2 8.8h-2.6c-1.7 0-3.4.3-4-1.1-.6-1.1 0-3.4.3-4.8.3-.9.6-3.1.6-3.1h2.3s-.6 3.1-.9 4.8c0 .6-.3 1.1 0 1.4.3.3.6.3 1.4.6h1.1l1.5-6.6M348.5 114.7c.3-.9.6-1.7.6-2.6 0-.9-.9-1.4-1.1-1.7-1.4-.6-2.6.3-3.1.6-.6.6-.9 1.4-1.1 2.6-.3.9-.3 1.7 0 2.3.6 1.1 2.3.9 4 .9.4-.4.7-1.3.7-2.1zm3.1-3.2c.3 2-.9 4-1.4 5.7h1.4s-.6 2-.6 2.3h-3.1c-2.6 0-4.8.3-6-1.1-.6-.6-.9-1.4-.9-2 0-1.1 0-2 .3-3.1.3-.9.6-1.7.9-2.3 1.1-1.7 2.8-3.1 6-2.8.6 0 1.4.3 2 .6h.3c.6.4 1.1 1.6 1.1 2.7zM340.8 110.4c-.3.6-.3 1.4-.6 2h-2.6c.3-.9.3-1.4.6-2h2.6M337.7 113.2h2.3c-.3 1.7-.9 4.6-1.4 6.5-.3 1.1-.6 2-1.4 2.8h-.3c-.3.3-.9.3-1.1.3h-2c.3-.9.6-1.7.6-2.3 2 .3 2-1.4 2.3-3.4.4-.7 1-3.6 1-3.9" class="st-end4"/>
                      <path d="M332.3 108.7c-.9 1.7-2.6 2.8-4.6 2.8-1.1 0-2-.3-2.6-.6-1.4-.6-2.6-1.7-3.1-3.1-.9-1.7-1.1-4.3.9-6l-.3.3v.3c-1.4 4.3 2.8 8 6.8 7.7.9.1 2-.5 2.9-1.4" class="st-end2" transform="translate(0 8.828)"/><path d="M329.7 107c1.1 0 2-.6 2.8-1.1-.6 1.4-2.3 2.3-4.3 2-1.7-.3-3.4-2-3.7-4 0-1.4.3-2 1.1-3.1-.3.6-.3.9-.3 1.1-.4 3.1 2.2 5.1 4.4 5.1" class="st-end2" transform="translate(0 8.828)"/><path d="M332.3 103.6c-.3.3-1.1 1.1-1.4 1.1-1.7.3-2.6-.3-3.1-1.4l-.3-.6c-.3-.9 0-1.7.6-2.3-.3.6-.3 1.1 0 1.4 0 .3.3.6.6.9.3.6.6.6.9.9.3 0 .3.3.6.3-.2.3.7.6 2.1-.3" class="st-end2" transform="translate(0 8.828)"/>
                    </g>
                    <g>
                      <path d="M398.9 46.1h26.5v26.5h-26.5V46.1z" class="st-end6"/><path d="M406 68.3l2-1.1c.3.6.9 1.4 1.7 1.4.9 0 1.4-.3 1.4-1.7v-8.5h2.6v8.5c0 2.6-1.4 3.7-3.7 3.7-2.3 0-3.5-.9-4-2.3M414.8 68l2-1.1c.6.9 1.1 1.4 2.6 1.4 1.1 0 1.7-.6 1.7-1.1 0-.9-.6-1.1-1.7-1.7l-.6-.3c-1.7-.9-3.1-1.7-3.1-3.7s1.4-3.4 3.7-3.4c1.7 0 2.8.6 3.4 2l-2 1.1c-.6-.9-.9-1.1-1.7-1.1-.9 0-1.1.6-1.1 1.1 0 .9.6 1.1 1.4 1.4l.6.3c2 .9 3.4 1.7 3.4 4s-1.7 3.4-4.3 3.4c-2.3.3-3.7-.6-4.3-2.3" class="st-end2"/></g>
                      <g><path d="M398.9 125.5c0 2 1.4 3.4 3.4 3.4h19.6c2 0 3.4-1.4 3.4-3.4v-19.6c0-2-1.4-3.4-3.4-3.4h-19.6c-2 0-3.4 1.4-3.4 3.4v19.6z" class="st-end6"/><path d="M410 114.1v-3.7h4.3c.3 0 .6.3.9.3s.3.3.6.6c0 .3.3.6.3.9 0 .6-.3 1.1-.6 1.4-.3.3-.9.6-1.4.6H410v-.1zm-3.7-6.6v16.2h7.7c.9 0 1.4 0 2-.3.6-.3 1.4-.6 1.7-.9.6-.3.9-.9 1.1-1.4.3-.6.6-1.4.6-2 0-1.1-.3-2-.9-2.6-.6-.6-1.1-1.1-2.3-1.4.9-.3 1.1-.9 1.7-1.4s.6-1.1.6-2 0-1.4-.3-2c-.3-.6-.6-.9-1.1-1.1-.6-.3-.9-.6-1.7-.6s-1.4-.3-2-.3h-7.1v-.2zm3.7 13.4v-4.6h4c.9 0 1.4.3 1.7.6.6.3.6.9.6 1.7 0 .3 0 .9-.3 1.1-.3.3-.3.6-.6.6s-.6.3-.9.3H410v.3z" class="st-end2"/></g><g><path d="M324.9 50.1l-2 21.6-8.5 2.3-8.5-2.3-2-21.6h21z" class="st-end6"/><path d="M314.4 72l7.1-2 1.7-18.5h-8.5V72h-.3z" class="st-end1"/><path d="M310.7 56.9h3.7v-2.6h-6.5v.6l.6 7.4h6v-2.6H311l-.3-2.8zm.5 6.8h-2.6l.4 4.3 5.4 1.4v-2.8l-2.8-.9-.4-2zM305.8 44.1h1.4v1.4h1.1v-1.4h1.4v4h-1.4v-1.4h-1.1v1.4h-1.4v-4zm5.4 1.4h-1.1v-1.4h3.7v1.4h-1.1v2.6h-1.4v-2.6h-.1zm3.2-1.4h1.4l.9 1.4.9-1.4h1.4v4h-1.4v-2l-.9 1.4-.9-1.4v2h-1.4v-4zm5.4 0h1.4v2.6h2v1.4h-3.1l-.3-4z" class="st-end2"/><path d="M314.4 62.3h3.1l-.3 3.4-2.8.9v2.8l5.4-1.4v-.6l.6-6.8V60h-6.3v2.3h.3zm0-5.4h6.3v-2.6h-6.5v2.6h.2z" class="st-end2"/></g></g><g id="clip_mobile"><g id="mask"><path id="XMLID_250_" d="M508.1 227.6h-56c-3.7 0-6.8-3.1-6.8-6.8v-115c0-3.7 3.1-6.8 6.8-6.8H515v122c-.1 3.8-3.2 6.6-6.9 6.6z" class="st-end6"/><path id="XMLID_199_" d="M509 229.3h-57.8c-4.1 0-7.4-3.3-7.4-7.4V105c0-4.1 3.3-7.4 7.4-7.4h1.7v2.8h-1.7c-2.7 0-4.6 2.4-4.6 4.6v116.9c0 2.7 2.4 4.6 4.6 4.6H509c2.7 0 4.6-2.4 4.6-4.6v-55.5h2.8v55.5c0 4.1-3.4 7.4-7.4 7.4z" class="st-end2"/><path id="XMLID_193_" d="M516.4 171h-2.8v-66c0-2.7-2.4-4.6-4.6-4.6h-56v-2.8h56c4.1 0 7.4 3.3 7.4 7.4v66z" class="st-end2"/><path id="XMLID_247_" d="M470 106.1h20.5v2.8H470z" class="st-end2"/><path id="XMLID_246_" d="M480.2 225.6c-3.4 0-6-2.6-6-6s2.6-6 6-6c3.4.4 6 3 6 6 0 3.4-2.6 6-6 6zm-.1-9.1c-1.6 0-3 1.4-3 3.1s1.3 3.1 3.1 3.1 3.1-1.3 3.1-3.1c.1-1.5-1.4-2.9-3.2-3.1z" class="st-end2"/></g><g id="Layer_5"><path id="XMLID_1_" d="M449.2 112.4h61.2v101h-61.2z" class="st-end3"/></g><g id="animate_group2"><defs><path id="SVGFE_1_" d="M449.2 114.9h61.2v93.6h-61.2z"/></defs><clipPath id="SVGFE_2_"><use overflow="visible" xlink:href="#SVGFE_1_"/></clipPath><g id="animate2" class="st-end7"><g class="phone"><path d="M461.2 402h6v1.4h-6zM464.3 406.6h4v1.4h-4zM477.4 406.6h28.4v1.4h-28.4zM471.1 406.6h4.6v1.4h-4.6zM465.7 410.5h8v1.4h-8zM468.8 415.9H479v1.4h-10.2zM461.2 421.1h11.1v1.4h-11.1zM473.6 421.3h8.3v1.4h-8.3zM464.3 426.5h15.1v1.4h-15.1zM485.6 426.2h10v1.4h-10zM479.9 426.5h4.8v1.4h-4.8zM464.3 452.6h15.1v1.4h-15.1zM485.6 452.3h10v1.4h-10zM479.9 452.6h4.8v1.4h-4.8zM469.1 431.6h13.1v1.4h-13.1zM465.4 431.5h2.8v1.4h-2.8zM461.2 435.3h9.1v1.4h-9.1zM470.8 435.3h3.1v1.4h-3.1zM474.8 435.3h14.8v1.4h-14.8zM490.8 435.4h13.4v1.4h-13.4zM464.3 440.7h4.6v1.4h-4.6zM470.2 440.4h11.1v1.4h-11.1zM466.9 445.8h9.1v1.4h-9.1zM477.7 445.8h9.1v1.4h-9.1zM487.9 445.8h8.5v1.4h-8.5zM502.4 416h2.6v1.4h-2.6zM479.9 415.9H501v1.4h-21.1zM468.8 402h23.9v1.4h-23.9zM454.1 400h2.3v2.3h-2.3zM454.1 405.7h2.3v2.3h-2.3zM454.1 411.4h2.3v2.3h-2.3zM454.1 417.4h2.3v2.3h-2.3zM454.1 423.1h2.3v2.3h-2.3zM454.1 428.7h2.3v2.3h-2.3zM454.1 434.7h2.3v2.3h-2.3zM454.1 440.4h2.3v2.3h-2.3zM454.1 446.4h2.3v2.3h-2.3zM454.1 452.1h2.3v2.3h-2.3zM461.2 345.1h6v1.4h-6zM464.3 349.7h4v1.4h-4zM477.4 349.7h28.4v1.4h-28.4zM471.1 349.7h4.6v1.4h-4.6zM465.7 353.6h8v1.4h-8zM468.8 359H479v1.4h-10.2zM461.2 364.2h11.1v1.4h-11.1zM473.6 364.4h8.3v1.4h-8.3zM464.3 369.6h15.1v1.4h-15.1zM485.6 369.3h10v1.4h-10zM479.9 369.6h4.8v1.4h-4.8zM464.3 395.7h15.1v1.4h-15.1zM485.6 395.4h10v1.4h-10zM479.9 395.7h4.8v1.4h-4.8zM469.1 374.7h13.1v1.4h-13.1zM465.4 374.6h2.8v1.4h-2.8zM461.2 378.4h9.1v1.4h-9.1zM470.8 378.4h3.1v1.4h-3.1zM474.8 378.4h14.8v1.4h-14.8zM490.8 378.5h13.4v1.4h-13.4zM464.3 383.8h4.6v1.4h-4.6zM470.2 383.5h11.1v1.4h-11.1zM466.9 388.9h9.1v1.4h-9.1zM477.7 388.9h9.1v1.4h-9.1zM487.9 388.9h8.5v1.4h-8.5zM502.4 359.1h2.6v1.4h-2.6zM479.9 359H501v1.4h-21.1zM468.8 345.1h23.9v1.4h-23.9zM454.1 343.1h2.3v2.3h-2.3zM454.1 348.8h2.3v2.3h-2.3zM454.1 354.5h2.3v2.3h-2.3zM454.1 360.5h2.3v2.3h-2.3zM454.1 366.2h2.3v2.3h-2.3zM454.1 371.8h2.3v2.3h-2.3zM454.1 377.8h2.3v2.3h-2.3zM454.1 383.5h2.3v2.3h-2.3zM454.1 389.5h2.3v2.3h-2.3zM454.1 395.2h2.3v2.3h-2.3zM461.2 288.2h6v1.4h-6zM464.3 292.8h4v1.4h-4zM477.4 292.8h28.4v1.4h-28.4zM471.1 292.8h4.6v1.4h-4.6zM465.7 296.7h8v1.4h-8zM468.8 302.1H479v1.4h-10.2zM461.2 307.3h11.1v1.4h-11.1zM473.6 307.5h8.3v1.4h-8.3zM464.3 312.7h15.1v1.4h-15.1zM485.6 312.4h10v1.4h-10zM479.9 312.7h4.8v1.4h-4.8zM464.3 338.8h15.1v1.4h-15.1zM485.6 338.5h10v1.4h-10zM479.9 338.8h4.8v1.4h-4.8zM469.1 317.8h13.1v1.4h-13.1zM465.4 317.7h2.8v1.4h-2.8zM461.2 321.5h9.1v1.4h-9.1zM470.8 321.5h3.1v1.4h-3.1zM474.8 321.5h14.8v1.4h-14.8zM490.8 321.6h13.4v1.4h-13.4zM464.3 326.9h4.6v1.4h-4.6zM470.2 326.6h11.1v1.4h-11.1zM466.9 332h9.1v1.4h-9.1zM477.7 332h9.1v1.4h-9.1zM487.9 332h8.5v1.4h-8.5zM502.4 302.2h2.6v1.4h-2.6zM479.9 302.1H501v1.4h-21.1zM468.8 288.2h23.9v1.4h-23.9zM454.1 286.2h2.3v2.3h-2.3zM454.1 291.9h2.3v2.3h-2.3zM454.1 297.6h2.3v2.3h-2.3zM454.1 303.6h2.3v2.3h-2.3zM454.1 309.3h2.3v2.3h-2.3zM454.1 314.9h2.3v2.3h-2.3zM454.1 320.9h2.3v2.3h-2.3zM454.1 326.6h2.3v2.3h-2.3zM454.1 332.6h2.3v2.3h-2.3zM454.1 338.3h2.3v2.3h-2.3zM461.2 231h6v1.4h-6zM464.3 235.6h4v1.4h-4zM477.4 235.6h28.4v1.4h-28.4zM471.1 235.6h4.6v1.4h-4.6zM465.7 239.5h8v1.4h-8zM468.8 244.9H479v1.4h-10.2zM461.2 250.1h11.1v1.4h-11.1zM473.6 250.3h8.3v1.4h-8.3zM464.3 255.5h15.1v1.4h-15.1zM485.6 255.2h10v1.4h-10zM479.9 255.5h4.8v1.4h-4.8zM464.3 281.6h15.1v1.4h-15.1zM485.6 281.3h10v1.4h-10zM479.9 281.6h4.8v1.4h-4.8zM469.1 260.6h13.1v1.4h-13.1zM465.4 260.5h2.8v1.4h-2.8zM461.2 264.3h9.1v1.4h-9.1zM470.8 264.3h3.1v1.4h-3.1zM474.8 264.3h14.8v1.4h-14.8zM490.8 264.4h13.4v1.4h-13.4zM464.3 269.7h4.6v1.4h-4.6zM470.2 269.4h11.1v1.4h-11.1zM466.9 274.8h9.1v1.4h-9.1zM477.7 274.8h9.1v1.4h-9.1zM487.9 274.8h8.5v1.4h-8.5zM502.4 245h2.6v1.4h-2.6zM479.9 244.9H501v1.4h-21.1zM468.8 231h23.9v1.4h-23.9zM454.1 229h2.3v2.3h-2.3zM454.1 234.7h2.3v2.3h-2.3zM454.1 240.4h2.3v2.3h-2.3zM454.1 246.4h2.3v2.3h-2.3zM454.1 252.1h2.3v2.3h-2.3zM454.1 257.7h2.3v2.3h-2.3zM454.1 263.7h2.3v2.3h-2.3zM454.1 269.4h2.3v2.3h-2.3zM454.1 275.4h2.3v2.3h-2.3zM454.1 281.1h2.3v2.3h-2.3zM461.2 174.1h6v1.4h-6zM464.3 178.7h4v1.4h-4zM477.4 178.7h28.4v1.4h-28.4zM471.1 178.7h4.6v1.4h-4.6zM465.7 182.6h8v1.4h-8zM468.8 188H479v1.4h-10.2zM461.2 193.2h11.1v1.4h-11.1zM473.6 193.4h8.3v1.4h-8.3zM464.3 198.6h15.1v1.4h-15.1zM485.6 198.3h10v1.4h-10zM479.9 198.6h4.8v1.4h-4.8zM464.3 224.7h15.1v1.4h-15.1zM485.6 224.4h10v1.4h-10zM479.9 224.7h4.8v1.4h-4.8zM469.1 203.7h13.1v1.4h-13.1zM465.4 203.6h2.8v1.4h-2.8zM461.2 207.4h9.1v1.4h-9.1zM470.8 207.4h3.1v1.4h-3.1zM474.8 207.4h14.8v1.4h-14.8zM490.8 207.5h13.4v1.4h-13.4zM464.3 212.8h4.6v1.4h-4.6zM470.2 212.5h11.1v1.4h-11.1zM466.9 217.9h9.1v1.4h-9.1zM477.7 217.9h9.1v1.4h-9.1zM487.9 217.9h8.5v1.4h-8.5zM502.4 188.1h2.6v1.4h-2.6zM479.9 188H501v1.4h-21.1zM468.8 174.1h23.9v1.4h-23.9zM454.1 172.1h2.3v2.3h-2.3zM454.1 177.8h2.3v2.3h-2.3zM454.1 183.5h2.3v2.3h-2.3zM454.1 189.5h2.3v2.3h-2.3zM454.1 195.2h2.3v2.3h-2.3zM454.1 200.8h2.3v2.3h-2.3zM454.1 206.8h2.3v2.3h-2.3zM454.1 212.5h2.3v2.3h-2.3zM454.1 218.5h2.3v2.3h-2.3zM454.1 224.2h2.3v2.3h-2.3zM461.2 117.2h6v1.4h-6zM464.3 121.8h4v1.4h-4zM477.4 121.8h28.4v1.4h-28.4zM471.1 121.8h4.6v1.4h-4.6zM465.7 125.7h8v1.4h-8zM468.8 131.1H479v1.4h-10.2zM461.2 136.3h11.1v1.4h-11.1zM473.6 136.5h8.3v1.4h-8.3zM464.3 141.7h15.1v1.4h-15.1zM485.6 141.4h10v1.4h-10zM479.9 141.7h4.8v1.4h-4.8zM464.3 167.8h15.1v1.4h-15.1zM485.6 167.5h10v1.4h-10zM479.9 167.8h4.8v1.4h-4.8zM469.1 146.8h13.1v1.4h-13.1zM465.4 146.7h2.8v1.4h-2.8zM461.2 150.5h9.1v1.4h-9.1zM470.8 150.5h3.1v1.4h-3.1zM474.8 150.5h14.8v1.4h-14.8zM490.8 150.6h13.4v1.4h-13.4zM464.3 155.9h4.6v1.4h-4.6zM470.2 155.6h11.1v1.4h-11.1zM466.9 161h9.1v1.4h-9.1zM477.7 161h9.1v1.4h-9.1zM487.9 161h8.5v1.4h-8.5zM502.4 131.2h2.6v1.4h-2.6zM479.9 131.1H501v1.4h-21.1zM468.8 117.2h23.9v1.4h-23.9zM454.1 115.2h2.3v2.3h-2.3zM454.1 120.9h2.3v2.3h-2.3zM454.1 126.6h2.3v2.3h-2.3zM454.1 132.6h2.3v2.3h-2.3zM454.1 138.3h2.3v2.3h-2.3zM454.1 143.9h2.3v2.3h-2.3zM454.1 149.9h2.3v2.3h-2.3zM454.1 155.6h2.3v2.3h-2.3zM454.1 161.6h2.3v2.3h-2.3zM454.1 167.3h2.3v2.3h-2.3z" class="st-end4"/></g></g></g></g><g id="clip_laptop"><g id="XMLID_63_"><path id="XMLID_70_" d="M304.4 222.5H116.6c-1.4 0-2.8-1.4-2.8-2.8V86.2c0-1.7 1.4-2.8 2.8-2.8h187.8c1.7 0 2.8 1.1 2.8 2.8v133.4c.1 1.7-1.1 2.9-2.8 2.9z" class="st-end1"/><path id="XMLID_147_" d="M118.6 223.9c-3.3 0-6.3-2.9-6.3-6.3v-90.2h2.8v90.2c0 1.8 1.6 3.4 3.4 3.4v2.9z" class="st-end2"/><path id="XMLID_145_" d="M308.7 214.5h-2.8V88.2c0-1.8-1.6-3.4-3.4-3.4H172.1V82h130.3c3.3 0 6.3 2.9 6.3 6.3v126.2z" class="st-end2"/><path id="XMLID_332_" d="M303.8 230.4H114.9c-4.6 0-8.5-3.4-9.1-7.7l-1.4-8.3H192l3.4 4.8h24.2l3.7-4.8h92.2l-1.1 7.1c-.9 5-5.4 8.9-10.6 8.9z" class="st-end4"/><path id="XMLID_78_" d="M303.8 231.9H114.9c-5.2 0-9.8-3.9-10.5-8.9l-1.7-9.9h90.1l3.4 4.8h22.7l3.7-4.8h94.6l-1.4 8.8c-1 5.6-6.3 10-12 10zm-197.7-16l1.1 6.6c.5 3.7 3.9 6.5 7.7 6.5h188.9c4.4 0 8.4-3.4 9.1-7.6l.9-5.4H224l-3.7 4.8h-25.6l-3.4-4.8h-85.2z" class="st-end2"/><path id="XMLID_69_" d="M123.2 94.5h173.5v112.9H123.2z" class="st-end3"/><g id="animate_group"><defs><path id="SVGFE_3_" d="M123.2 94.5h173.5V201H123.2z"/></defs><clipPath id="SVGFE_4_"><use overflow="visible" xlink:href="#SVGFE_3_"/></clipPath><g id="animate" class="st-end8"><g id="XMLID_64_" class="laptop2"><path id="XMLID_597_" d="M145.9 172.3h19.3v2.6h-19.3z" class="st-end4"/><path id="XMLID_596_" d="M155.6 181.1H169v2.6h-13.4z" class="st-end4"/><path id="XMLID_595_" d="M198.9 181.1h93.6v2.6h-93.6z" class="st-end4"/><path id="XMLID_594_" d="M178.3 181.1h15.1v2.6h-15.1z" class="st-end4"/><path id="XMLID_593_" d="M160.2 188.5h26.7v2.6h-26.7z" class="st-end4"/><path id="XMLID_592_" d="M171 198.7h33.9v2.6H171z" class="st-end4"/><path id="XMLID_591_" d="M145.9 208.4h37v2.6h-37z" class="st-end4"/><path id="XMLID_590_" d="M187.1 208.2h26.7v2.6h-26.7z" class="st-end4"/><path id="XMLID_589_" d="M155.6 218.1h49.8v2.6h-49.8z" class="st-end4"/><path id="XMLID_588_" d="M225.8 217.8h33v2.6h-33z" class="st-end4"/><path id="XMLID_587_" d="M207.4 218.1H223v2.6h-15.6z" class="st-end4"/><path id="XMLID_586_" d="M172.1 227.5h43.5v2.6h-43.5z" class="st-end4"/><path id="XMLID_585_" d="M160.4 227.7h9.1v2.6h-9.1z" class="st-end4"/><path id="XMLID_68_" d="M145.9 234.6h29.6v2.6h-29.6z" class="st-end4"/><path id="XMLID_582_" d="M177.8 234.6H188v2.6h-10.2z" class="st-end4"/><path id="XMLID_581_" d="M190.9 234.6h48.6v2.6h-48.6z" class="st-end4"/><path id="XMLID_580_" d="M243.6 234.8h43.8v2.6h-43.8z" class="st-end4"/><path id="XMLID_579_" d="M155.6 244.3H171v2.6h-15.4z" class="st-end4"/><path id="XMLID_578_" d="M175.8 244.4h36.4v2.6h-36.4z" class="st-end4"/><path id="XMLID_577_" d="M163.9 253.9h29.6v2.6h-29.6z" class="st-end4"/><path id="XMLID_576_" d="M200 253.9h29.6v2.6H200z" class="st-end4"/><path id="XMLID_575_" d="M234.1 253.9H262v2.6h-27.9z" class="st-end4"/><path id="XMLID_351_" d="M281.3 198.5h8.3v2.6h-8.3z" class="st-end4"/><path id="XMLID_67_" d="M208 198.7h69.4v2.6H208z" class="st-end4"/><path id="XMLID_328_" d="M171 172.3h78.8v2.6H171z" class="st-end4"/><path id="XMLID_326_" d="M132.9 168.6h4v4h-4z" class="st-end4"/><path id="XMLID_294_" d="M132.9 179.4h4v4h-4z" class="st-end4"/><path id="XMLID_291_" d="M132.9 190.2h4v4h-4z" class="st-end4"/><path id="XMLID_182_" d="M132.9 201h4v4h-4z" class="st-end4"/><path id="XMLID_181_" d="M132.9 211.8h4v4h-4z" class="st-end4"/><path id="XMLID_178_" d="M132.9 222.6h4v4h-4z" class="st-end4"/><path id="XMLID_177_" d="M132.9 233.4h4v4h-4z" class="st-end4"/><path id="XMLID_66_" d="M132.9 244.3h4v4h-4z" class="st-end4"/><path id="XMLID_71_" d="M132.9 255.1h4v4h-4z" class="st-end4"/></g><g id="XMLID_72_" class="laptop2"><path id="XMLID_207_" d="M145.9 75.5h19.3v2.6h-19.3z" class="st-end4"/><path id="XMLID_206_" d="M155.6 84.4H169V87h-13.4z" class="st-end4"/><path id="XMLID_205_" d="M198.9 84.4h93.6V87h-93.6z" class="st-end4"/><path id="XMLID_204_" d="M178.3 84.4h15.1V87h-15.1z" class="st-end4"/><path id="XMLID_202_" d="M160.2 91.8h26.7v2.6h-26.7z" class="st-end4"/><path id="XMLID_201_" d="M171 102h33.9v2.6H171z" class="st-end4"/><path id="XMLID_198_" d="M145.9 111.7h37v2.6h-37z" class="st-end4"/><path id="XMLID_197_" d="M187.1 111.4h26.7v2.6h-26.7z" class="st-end4"/><path id="XMLID_196_" d="M155.6 121.4h49.8v2.6h-49.8z" class="st-end4"/><path id="XMLID_195_" d="M225.8 121.1h33v2.6h-33z" class="st-end4"/><path id="XMLID_194_" d="M207.4 121.4H223v2.6h-15.6z" class="st-end4"/><path id="XMLID_189_" d="M172.1 130.7h43.5v2.6h-43.5z" class="st-end4"/><path id="XMLID_188_" d="M160.4 131h9.1v2.6h-9.1z" class="st-end4"/><path id="XMLID_187_" d="M145.9 137.9h29.6v2.6h-29.6z" class="st-end4"/><path id="XMLID_186_" d="M177.8 137.9H188v2.6h-10.2z" class="st-end4"/><path id="XMLID_185_" d="M190.9 137.9h48.6v2.6h-48.6z" class="st-end4"/><path id="XMLID_184_" d="M243.6 138.1h43.8v2.6h-43.8z" class="st-end4"/><path id="XMLID_183_" d="M155.6 147.5H171v2.6h-15.4z" class="st-end4"/><path id="XMLID_180_" d="M175.8 147.7h36.4v2.6h-36.4z" class="st-end4"/><path id="XMLID_179_" d="M163.9 157.2h29.6v2.6h-29.6z" class="st-end4"/><path id="XMLID_176_" d="M200 157.2h29.6v2.6H200z" class="st-end4"/><path id="XMLID_175_" d="M234.1 157.2H262v2.6h-27.9z" class="st-end4"/><path id="XMLID_174_" d="M281.3 101.8h8.3v2.6h-8.3z" class="st-end4"/><path id="XMLID_169_" d="M208 102h69.4v2.6H208z" class="st-end4"/><path id="XMLID_162_" d="M171 75.5h78.8v2.6H171z" class="st-end4"/><path id="XMLID_161_" d="M132.9 71.8h4v4h-4z" class="st-end4"/><path id="XMLID_160_" d="M132.9 82.7h4v4h-4z" class="st-end4"/><path id="XMLID_153_" d="M132.9 93.5h4v4h-4z" class="st-end4"/><path id="XMLID_152_" d="M132.9 104.3h4v4h-4z" class="st-end4"/><path id="XMLID_149_" d="M132.9 115.1h4v4h-4z" class="st-end4"/><path id="XMLID_146_" d="M132.9 125.9h4v4h-4z" class="st-end4"/><path id="XMLID_144_" d="M132.9 136.7h4v4h-4z" class="st-end4"/><path id="XMLID_143_" d="M132.9 147.5h4v4h-4z" class="st-end4"/><path id="XMLID_141_" d="M132.9 158.3h4v4h-4z" class="st-end4"/></g></g></g><g id="XMLID_73_" class="st-end5"><path d="M115.5 83.4c-.9 0-1.7.9-1.7 1.7V132h77.7c4.6 0 8.3-3.7 8.3-8.3V83.4h-84.3z" class="st-end9"/></g><path id="XMLID_1454_" d="M182.9 128.6h-71.1c-7.4 0-13.1-6-13.1-13.1V70.8c0-7.4 6-13.1 13.1-13.1h71.1c7.4 0 13.1 6 13.1 13.1v44.4c0 7.4-5.7 13.4-13.1 13.4z" class="st-end4"/><path id="XMLID_1453_" d="M98.4 72.8V62.6c0-2.6 2.3-4.8 4.8-4.8h87.9c2.6 0 4.8 2.3 4.8 4.8v10.2H98.4z" class="st-end3"/><path id="XMLID_1452_" d="M191.5 129.7h-87.9c-3.3 0-6.3-2.9-6.3-6.3V62.6c0-3.3 2.9-6.3 6.3-6.3h87.9c3.3 0 6.3 2.9 6.3 6.3v60.9c-.1 3.3-3 6.2-6.3 6.2zm-87.9-70.5c-1.8 0-3.4 1.6-3.4 3.4v60.9c0 1.8 1.6 3.4 3.4 3.4h87.9c1.8 0 3.4-1.6 3.4-3.4V62.6c0-1.8-1.6-3.4-3.4-3.4h-87.9z" class="st-end2"/><path id="XMLID_879_" d="M98.4 71.7H196v2.8H98.4z" class="st-end2"/><path id="XMLID_876_" d="M106.4 64.9h1.7v2.8h-1.7z" class="st-end2"/><path id="XMLID_873_" d="M112.7 64.9h1.7v2.8h-1.7z" class="st-end2"/><path id="XMLID_872_" d="M118.9 64.9h1.7v2.8h-1.7z" class="st-end2"/><path d="M142.2 106c-.1 0-.2 0-.3-.1l-10-5.1c-.2-.1-.4-.4-.4-.6V99c0-.3.1-.5.4-.6l10-5.1c.2-.1.5-.1.7 0 .2.1.3.4.3.6v1.4c0 .3-.2.5-.4.6l-7.3 3.6 7.3 3.6c.2.1.4.4.4.6v1.4c0 .2-.1.5-.3.6-.1.2-.2.3-.4.3zm-9.2-6.3v-.1.1zm0-.3v0zM145.1 106.8h-1.4c-.2 0-.5-.1-.6-.3-.1-.2-.2-.4-.1-.7l6-15.6c.1-.3.4-.5.7-.5h1.4c.2 0 .5.1.6.3.1.2.2.4.1.7l-6 15.6c-.1.3-.4.5-.7.5zM152.5 106c-.1 0-.3 0-.4-.1-.2-.1-.3-.4-.3-.6v-1.4c0-.3.2-.5.4-.6l7.3-3.6-7.3-3.6c-.2-.1-.4-.4-.4-.6v-1.4c0-.2.1-.5.3-.6.2-.1.5-.1.7 0l10 5.1c.2.1.4.4.4.6v1.1c0 .3-.1.5-.4.6l-10 5.1c-.1-.1-.2 0-.3 0zm9.9-5.9zm-.7-.5v.1-.1zm0-.2v.1-.1z" class="st-end2"/></g></g></g><path id="XMLID_293_" d="M538.8 233.9H72.5c-1.6 0-2.8-1.3-2.8-2.8 0-1.6 1.3-2.8 2.8-2.8h466.3c1.6 0 2.8 1.3 2.8 2.8.1 1.5-1.2 2.8-2.8 2.8z" class="st-end2 line-devices-svg"/>
                    </svg>
                  <?php endif; ?>
                  <?php if( get_sub_field('texto') ): ?>
                    <p class="texto <?php echo $colorTitle, $reset, $pb80; ?>">
                      <?php the_sub_field('texto'); ?>
                    </p>
                  <?php endif; ?>
                  <?php if( get_sub_field('subtitulo_black') ): ?>
                    <h3 class="subtitulo black pb-60">
                      <?php the_sub_field('subtitulo_black'); ?>
                    </h3>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
            <?php if( get_sub_field('tipo_de_bloco') == 'ofertas' ):
               get_template_part( 'partials/partial', 'ofertas-profissoes');
            endif; ?>
            <?php if( get_sub_field('tipo_de_bloco') == 'marketing' ): ?>
              <div class="block-profissoes marketing mb-50">
                <div class="grid-cont big">
                  <div class="flex-container">
                    <?php
                    if (have_rows('itens_marketing')):
                      while (have_rows('itens_marketing')):
                        the_row();
                        if (get_sub_field('posicao_imagem')):
                          $tipo = get_sub_field('select_color');
                          ?>
                          <div class="flex-item circle-js imagem-topo pb-60">
                            <div class="block-image">
                              <?php
                              if( in_array('preto', $tipo) ): ?>
                                <svg class="circle-chart preto animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                              <?php endif; ?>
                              <?php
                              if( in_array('amarelo', $tipo) ): ?>
                                <svg class="circle-chart yellow animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                              <?php endif; ?>
                              <?php
                              if( in_array('cinza', $tipo) ): ?>
                                <svg class="circle-chart gray animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                              <?php endif; ?>
                            </div>
                            <h3 class="subtitulo animated fade animation-delay-200">
                              <?php the_sub_field('titulo'); ?>
                            </h3>
                            <p class="texto animated fade animation-delay-200">
                              <?php the_sub_field('texto'); ?>
                            </p>
                          </div>
                          <?php else: ?>
                            <div class="flex-item circle-js pb-60">
                              <div class="block-image-mobile">
                                <?php
                                $tipo = get_sub_field('select_color');
                                if( in_array('preto', $tipo) ): ?>
                                  <svg class="circle-chart black animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                                <?php endif; ?>
                                <?php
                                if( in_array('amarelo', $tipo) ): ?>
                                  <svg class="circle-chart yellow animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                                <?php endif; ?>
                                <?php
                                if( in_array('cinza', $tipo) ): ?>
                                  <svg class="circle-chart gray animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                                <?php endif; ?>
                              </div>
                              <h3 class="subtitulo reset animated fade">
                                <?php the_sub_field('titulo'); ?>
                              </h3>
                              <p class="texto reset pb-60 animated fade"><?php the_sub_field('texto'); ?></p>
                              <div class="block-image-desktop">
                                <?php
                                $tipo = get_sub_field('select_color');
                                if( in_array('preto', $tipo) ): ?>
                                  <svg class="circle-chart black animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                                <?php endif; ?>
                                <?php
                                if( in_array('amarelo', $tipo) ): ?>
                                  <svg class="circle-chart yellow animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                                <?php endif; ?>
                                <?php
                                if( in_array('cinza', $tipo) ): ?>
                                  <svg class="circle-chart gray animated fade" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 115"><g class="circulo" data-animator-group="true" data-animator-type="2"><path d="M245 34.2v39.5c0 20.8-54.8 37.7-122.5 37.7S0 94.5 0 73.7V34.2s74.6 15.7 122.5 15.7C163.9 49.8 245 34.2 245 34.2z" class="cor"/><path d="M245 34.2c0 18.9-54.8 34.2-122.5 34.2S0 53.1 0 34.2C0 15.3 54.8 0 122.5 0 190.2-.1 245 15.3 245 34.2z" class="cor1"/></g><g class="circulo-pequeno-position" data-animator-group="true" data-animator-type="0"><g class="circulo-pequeno" data-animator-group="true" data-animator-type="2"><path d="M187.5 41.1c0 7.1-29.1 12.9-65 12.9s-65-5.8-65-12.9 29.1-12.8 65-12.8c35.9-.1 65 5.7 65 12.8z" class="cor"/></g></g></svg>
                                <?php endif; ?>
                              </div>
                            </div>
                          <?php endif; ?>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              <?php
              break;
              case 'bloco1':
              ?>
              <div class="block-profissoes o-que-e pt-60">
                <div class="grid-cont">
                  <div class="block-profissoes esquema mb-50 hide-mobile">
                    <?php $image = get_sub_field('imagem'); ?>
                    <img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>" draggable="false" />
                  </div>
                </div>
                <div class="grid-cont esquema-mobile">
                  <div class="block-profissoes">
                    <?php $image = get_sub_field('imagem_mobile'); ?>
                    <img class="image-esquema" alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>" />
                  </div>
                </div>
                <div class="grid-cont big">
                  <?php
                  if( have_rows('block_medium') ):
                    while ( have_rows('block_medium') ) :
                      the_row();
                      ?>
                      <div class="block-formacao-info grid-1-2 pb-60">
                        <h2 class="title-body">
                          <?php the_sub_field('title'); ?>
                        </h2>
                        <div class="tags">
                          <?php
                          if (have_rows('tags')):
                            while (have_rows('tags')):
                              the_row(); ?>
                              <a href="/?s=<?php the_sub_field('tag'); ?>" class="tag no-route"><span></span><?php the_sub_field('tag'); ?></a>
                              <?php
                            endwhile;
                          endif;
                          ?>
                        </div>
                        <p class="texto">
                          <?php the_sub_field('text'); ?>
                        </p>
                      </div>
                      <?php
                    endwhile;
                  endif;
                  ?>
                </div>
                <div class="grid-cont esquema-mobile hide-desktop">
                  <div class="block-profissoes">
                    <?php $image = get_sub_field('imagem2_mobile'); ?>
                    <img class="image-esquema" alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>" />
                  </div>
                </div>
                <div class="grid-cont big">
                  <?php
                  if( have_rows('block_medium2') ):
                    while ( have_rows('block_medium2') ) :
                      the_row();
                      ?>
                      <div class="block-formacao-info grid-1-2 pb-60">
                        <h2 class="title-body">
                          <?php the_sub_field('title'); ?>
                        </h2>
                        <div class="tags">
                          <?php
                          if (have_rows('tags')):
                            while (have_rows('tags')):
                              the_row(); ?>
                              <a href="/?s=<?php the_sub_field('tag'); ?>" class="tag no-route"><span></span><?php the_sub_field('tag'); ?></a>
                              <?php
                            endwhile;
                          endif;
                          ?>
                        </div>
                        <p class="texto">
                          <?php the_sub_field('text'); ?>
                        </p>
                      </div>
                      <?php
                    endwhile;
                  endif;
                  ?>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="block-profissoes fundo-cinza charts desktop pt-60">
                <?php
                if (have_rows('graficos')):
                  while (have_rows('graficos')):
                    the_row(); ?>
                    <div class="grid-cont big pb-60 clip-js">
                      <h2 class="title animated fade"><?php the_sub_field('titulo'); ?></h2>
                      <div class="clipbg graph-js">
                        <div class="pie-chart animated fade">
                          <div class="left-top texto-js animated fade animation-delay-1">
                            <h2 class="chart-title">
                              <?php the_sub_field('titulo-left-top'); ?>
                            </h2>
                            <p class="chart-texto">
                              <?php the_sub_field('left-top'); ?>
                            </p>
                          </div>
                          <div class="left-bottom texto-js animated fade animation-delay-1">
                            <h2 class="chart-title">
                              <?php the_sub_field('titulo-left-bottom'); ?>
                            </h2>
                            <p class="chart-texto">
                              <?php the_sub_field('left-bottom'); ?>
                            </p>
                          </div>
                          <div class="center-center texto-js animated fade animation-delay-1">
                            <h2 class="chart-title reset"><?php the_sub_field('titulo-center'); ?></h2>
                            <p class="chart-texto">
                              <?php the_sub_field('center-center'); ?>
                            </p>
                          </div>
                          <div class="right-top texto-js animated fade animation-delay-1">
                            <h2 class="chart-title">
                              <?php the_sub_field('titulo-right-top'); ?>
                            </h2>
                            <p class="chart-texto">
                              <?php the_sub_field('right-top'); ?>
                            </p>
                          </div>
                          <div class="right-bottom texto-js animated fade animation-delay-1">
                            <h2 class="chart-title">
                              <?php the_sub_field('titulo-right-bottom'); ?>
                            </h2>
                            <p class="chart-texto">
                              <?php the_sub_field('right-bottom'); ?>
                            </p>
                          </div>
                        </div>
                      </div>
                      <script>
                      jQuery(document).ready(function( $ ) {
                        //  Edit.modules.collection.push({ type: 'animateChart', instance: new Edit.modules.animateChart('.clip-js') });
                      })
              </script>
                    </div>
                    <?php
                  endwhile;
                endif;
                ?>
              </div>
              <div class="block-profissoes fundo-cinza charts mobile">
                <?php
                if (have_rows('graficos')):
                  while (have_rows('graficos')):
                    the_row(); ?>
                    <div class="grid-cont pt-60">
                      <h2 class="title animated fade reset"><?php the_sub_field('titulo'); ?></h2>
                    </div>
                    <div class="grid-cont big pb-60">
                      <div class="mobile-graph">
                        <svg version="1.1" class="chart-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 375 465" style="enable-background:new 0 0 375 465;">
                          <g id="grupo1" class="texto-js2" data-animator-group="true" data-animator-type="2">
                            <g id="BJc3rlH3k7">
                              <path d="M323.4,282.8c0,2.2,0.1,4.3,0.1,6.5c0,3.1,0,6.2,0,9.3c0,0.4,0.1,0.7-0.1,1.1c-0.3-0.3-0.3-0.6-0.3-1&#10;&#9;&#9;c0.1-3.9-0.1-7.7,0.2-11.6c-0.4,4.4-2,8.4-4.1,12.2c-2.2,4-5,7.5-8.2,10.7c-4.3,4.2-9,7.8-14.1,10.9c-6.4,4-13.2,7.2-20.2,9.9&#10;&#9;&#9;c-13.6,5.3-27.6,8.5-42,10.5c-6,0.8-12,1.4-18.1,1.7c-3.7,0.2-7.5,0.4-11.2,0.4c-0.5,0-1.1,0.1-1.5-0.2c-0.1-0.1-0.2-0.2-0.2-0.3&#10;&#9;&#9;c-0.1-0.3-0.1-0.6-0.1-0.9c0-6.5,0-13,0-19.5c0-0.3,0-0.6,0.1-0.9c0.2-0.6,0.8-0.5,1.2-0.5c4-0.1,8.1-0.3,12.2-0.6&#10;&#9;&#9;c6-0.6,12-1.5,17.9-2.9c8.2-1.9,16.1-4.6,23.5-8.5c4.6-2.4,8.9-5.3,12.7-8.9c2.9-2.9,5.5-6.1,6.9-10c0.8-2,1.2-4.1,1.4-6.2&#10;&#9;&#9;c0.1-0.5,0-0.9,0.5-1.2c0.5-0.2,1-0.2,1.5-0.2c13.5,0,26.9,0,40.4,0C322.3,282.4,322.9,282.4,323.4,282.8z" id="Hys2Hxr2y7"/>
                              <path d="M323.4,282.8c-14.6,0-29.2,0-43.8,0c-0.2-0.2-0.2-0.5-0.3-0.8c-0.2-3.8-1.3-7.4-3.4-10.5&#10;&#9;&#9;c-1.5-2.5-3.3-4.7-5.5-6.6c-1.8-1.8-3.8-3.2-5.9-4.7c-2.3-1.5-4.7-3-7.3-4.2c-2.8-1.5-5.7-2.7-8.6-3.7c-3.5-1.3-7.1-2.4-10.7-3.3&#10;&#9;&#9;c-6.7-1.7-13.5-2.8-20.4-3.6c-2.9-0.2-5.8-0.5-8.8-0.5c-1.4,0-2.8-0.1-4.2-0.2c-0.3-0.1-0.6-0.1-0.9-0.3c-0.2-0.3-0.2-0.6-0.2-1&#10;&#9;&#9;c0-6.7,0-13.3,0-19.9c0-0.2,0-0.4,0.1-0.5s0.1-0.2,0.2-0.4c6.8,0.1,13.7,0.3,20.6,0.9c8,0.8,16,1.8,23.9,3.4&#10;&#9;&#9;c16.6,3.4,32.7,8.6,47.4,17.4c7.5,4.4,14.3,9.8,19.7,16.6c4.3,5.4,7.2,11.4,8,18.3C323.5,280.4,323.5,281.6,323.4,282.8z" id="HknhSlr21X"/>
                              <path d="M203.8,343.1c0.9,0,1.8-0.1,2.7,0c2.9,0.1,5.7-0.2,8.6-0.3c4.3-0.2,8.6-0.5,13-1.1c8.1-0.9,16.1-2.2,24-4&#10;&#9;&#9;c6-1.3,11.8-3,17.6-4.8c2.3-0.8,4.7-1.6,7-2.5c0.4,0.4,0.4,0.9,0.4,1.4c0,4.1,0,8.2,0,12.3c0,0.5,0,1-0.4,1.4&#10;&#9;&#9;c-4.2,1.8-8.5,3.2-12.9,4.4c-11.8,3.4-23.8,5.7-36,7c-7.6,0.8-15.2,1.2-22.8,1.2c-0.4,0-0.8-0.1-1.2-0.1c-0.4-0.4-0.3-0.8-0.3-1.3&#10;&#9;&#9;c0-4.2,0-8.4,0-12.6C203.5,343.9,203.4,343.5,203.8,343.1z" id="H16hHer3yQ"/>
                              <path d="M276.7,345.6c0-5,0-10.1,0-15.1c4.3-1.8,8.6-3.6,12.7-5.7c5.8-3,11.3-6.4,16.4-10.6c4.7-3.9,8.9-8.3,12.3-13.5&#10;&#9;&#9;c2.5-4,4.7-9.8,5.3-14.3c0,4.4,0,8.8,0,13.2c-0.1,4.4-1.3,8.6-3.3,12.6c-3.6,7.4-9.1,13.1-15.4,18.1c-8.4,6.6-17.9,11.4-27.8,15.3&#10;&#9;&#9;C276.9,345.6,276.8,345.6,276.7,345.6z" id="Sk0hBeB2kX"/>
                              <path d="M278.1,290.2c-0.8-1.5-1.7-3.1-2.5-4.6c-0.2-0.5-0.3-1.1-0.3-1.6c0-3.7,0-7.5,0-11.3c0-0.4,0-0.7,0.1-1.1&#10;&#9;&#9;c0.1-0.3,0.2-0.6,0.6-0.4c2,2.8,3,6,3.5,9.4c0.1,0.7,0.1,1.5,0.1,2.2C279.7,285.3,279.2,287.9,278.1,290.2z" id="Hkkxnrerhym"/>
                              <path d="M237.6,263.7c-2.7-0.6-5.4-1.2-8.2-1.7c-4-0.8-8.1-1.3-12.2-1.8c-0.5-0.3-0.5-0.8-0.5-1.3&#10;&#9;&#9;c0-4.2-0.1-8.5,0-12.7c0-0.5-0.2-1.5,0.9-1.1c3,0.1,6,0.6,8.9,1.1c3.7,0.6,7.4,1.3,11,2.3c0.2,0.1,0.3,0.1,0.5,0.2&#10;&#9;&#9;c-0.2,4.4-0.1,8.8-0.1,13.3C237.9,262.6,238.1,263.1,237.6,263.7z" id="S1gxnHeB2kX"/>
                              <path d="M217.6,245.2c-0.4,0-0.6,0.1-0.6,0.6c0,4.7,0,9.3,0,14c0,0.2,0.1,0.4,0.2,0.5c-4.5-0.4-9-0.6-13.5-0.6&#10;&#9;&#9;c-0.5-0.3-0.5-0.8-0.5-1.3c0-4.3,0-8.5,0-12.8c0-0.4,0-0.8,0.4-1.2l0,0c0.1-0.1,0.1-0.1,0.1,0c4.5,0.2,9,0.4,13.4,0.6&#10;&#9;&#9;C217.3,244.9,217.5,245,217.6,245.2z" id="SJbx3BerhkX"/>
                              <path d="M237.6,263.7c0-4.7,0-9.3,0-14c0-0.4-0.2-0.9,0.4-1c1.7,0.2,3.2,0.8,4.8,1.3c2,0.6,4,1.2,5.9,2.1&#10;&#9;&#9;c0.4,0.4,0.4,0.9,0.4,1.4c0,4.1,0,8.2,0,12.3c0,0.5,0.1,1-0.4,1.4C245.1,265.8,241.3,264.8,237.6,263.7z" id="r1MenHxrhkm"/>
                              <path d="M248.8,267.2c0-5,0-10,0-15.1c3,1,5.9,2.2,8.6,3.8c0.4,0.4,0.4,0.9,0.4,1.4c0,4.1,0,8.2,0,12.3&#10;&#9;&#9;c0,0.5,0.1,1-0.4,1.4C254.5,269.6,251.7,268.3,248.8,267.2z" id="SJQl3SgBnyQ"/>
                              <path d="M257.4,270.9c0-5,0-10,0-15.1c2.6,1.1,5,2.6,7.4,4.2c0.1,0.4,0.1,0.8,0.1,1.2c0,4,0,8.1,0,12.2&#10;&#9;&#9;c0,0.5,0.1,1.1-0.4,1.6C262.2,273.6,259.8,272.2,257.4,270.9z" id="H1VxnrgSnym"/>
                              <path d="M264.5,275.1c0-4.6,0-9.2,0-13.8c0-0.4-0.2-0.8,0.2-1.2c2.1,1.3,4.1,2.9,5.8,4.6c0.1,0.5,0.2,1.1,0.2,1.6&#10;&#9;&#9;c0,3.9,0,7.9,0,11.8c0,0.5,0.1,1.1-0.4,1.6C268.5,278,266.5,276.5,264.5,275.1z" id="H1Sl2SxS2JX"/>
                              <path d="M270.4,279.6c0-4.6,0-9.2,0-13.8c0-0.4-0.1-0.8,0.2-1.1c2.2,1.9,4,4,5.5,6.5c-0.6,0.2-0.4,0.6-0.4,1.1&#10;&#9;&#9;c0,4.4-0.1,8.9-0.1,13.4C274,283.5,272.3,281.5,270.4,279.6z" id="SJUx2rgH2kX"/>
                            </g>
                          </g>
                          <g id="grupo2" class="texto-js2" data-animator-group="true" data-animator-type="2">
                            <g id="Bkvx2Blr2kX">
                              <path d="M203.8,123.8c-0.1,0.1-0.1,0.2-0.1,0.2c0.1,7.1,0,14.2,0,21.3c0,0.1,0,0.2-0.1,0.4c-1.5,0.5-3,0.2-4.5,0.2&#10;&#9;&#9;c-0.5,0-0.9-0.1-1.4,0.1c-2.6,0.1-5.3,0.2-7.9,0.5c-4.2,0.4-8.3,1-12.4,1.6c-4,0.7-7.9,1.6-11.9,2.7c-3.2,0.8-6.4,1.9-9.5,3.1&#10;&#9;&#9;c-2.9,1.1-5.7,2.4-8.4,3.8c-2.6,1.2-5,2.7-7.3,4.4c-2.6,1.8-4.9,3.7-7,6c-1.9,2.2-3.7,4.4-4.9,7.1c-1.2,2.5-1.9,5.1-2,7.8&#10;&#9;&#9;c0,0.5,0.1,1-0.6,1.2c-0.5,0.2-1.1,0.1-1.7,0.1c-13,0-26,0-39,0c-0.5,0-1.1,0.1-1.6-0.1c-0.1-0.1-0.2-0.1-0.4-0.2&#10;&#9;&#9;c0-5.9,1.6-11.4,4.6-16.5c4.1-7.2,9.9-12.8,16.5-17.6c9.2-6.7,19.3-11.4,29.9-15.2c8.6-3,17.4-5.3,26.3-7.1&#10;&#9;&#9;c5.3-1,10.6-1.8,15.9-2.4c4.1-0.5,8.2-0.8,12.3-1.1c4-0.2,7.9-0.4,11.9-0.4C201.8,124,202.8,123.7,203.8,123.8z" id="Syug3HlBhkm"/>
                              <path d="M181.8,258.6c-3.4-0.1-6.8-0.6-10.2-1.1c-7.3-1-14.5-2.4-21.7-4.1c-0.2-0.1-0.3-0.1-0.5-0.2&#10;&#9;&#9;c-0.1-0.3-0.1-0.5-0.1-0.8c0-4.6,0-9.2,0-13.8c0-0.1,0-0.3,0.1-0.4c0.5-0.5,1-0.2,1.5-0.1c5,1.2,10.1,2.3,15.2,3.1&#10;&#9;&#9;c4.7,0.8,9.3,1.5,14.1,1.9c0.7,0.1,1.5-0.1,2,0.6c0.2,0.4,0.2,0.8,0.2,1.1c0,4.2,0,8.4,0,12.6C182.3,257.7,182.4,258.3,181.8,258.6&#10;&#9;&#9;z" id="BytenBgr3y7"/>
                              <path d="M181.8,258.6c0.4-0.4,0.2-0.8,0.2-1.2c0-4.7,0-9.3,0-14c1-0.5,2-0.1,3.1-0.1c3.3,0.2,6.5,0.5,9.8,0.5&#10;&#9;&#9;c2.6,0.1,5.3,0.4,7.9,0.2c0.3,0,0.6,0,0.8,0.2c0.1,0.1,0.2,0.2,0.2,0.3c0,4.7,0,9.5,0,14.3c0,0.2,0.1,0.5-0.1,0.7&#10;&#9;&#9;c-3.4,0.1-6.8,0-10.1-0.2c-3.7-0.2-7.4-0.5-11-0.7C182.3,258.7,182,258.6,181.8,258.6z" id="S1cxnBeB21Q"/>
                              <path d="M149.4,237.9c0.2,0.4,0.2,0.7,0.2,1.1c0,4.4,0,8.7,0,13.1c0,0.4,0.1,0.7-0.2,1c-3.3-0.6-6.5-1.7-9.7-2.7&#10;&#9;&#9;c-2.7-0.8-5.4-1.6-8-2.8c0.2-3.4,0.1-6.8,0.1-10.2c0-1.6,0.1-3.2-0.2-4.7c0.4-0.7,0.9-0.2,1.3-0.1c3.9,1.4,7.8,2.6,11.8,3.8&#10;&#9;&#9;c1.2,0.4,2.5,0.7,3.6,1C148.7,237.5,149.2,237.5,149.4,237.9z" id="HJjl3BlH3kQ"/>
                              <path d="M131.7,232.5c0.3,0.7,0.4,1.5,0.4,2.2c0,3.7,0,7.4,0,11c0,0.6-0.1,1.3-0.4,1.9c-4.7-1.6-9.2-3.6-13.5-5.8&#10;&#9;&#9;c-0.2-1-0.1-2-0.1-3c0-3.3,0-6.7,0-10c0-0.5-0.1-1.1,0.1-1.6c0.4-0.8,0.9-0.4,1.3-0.2c2.7,1.3,5.4,2.5,8.2,3.7&#10;&#9;&#9;c0.9,0.4,1.9,0.8,2.8,1.1C131.1,231.9,131.6,232,131.7,232.5z" id="BJ2g3SeH21X"/>
                              <path d="M118.5,226.8c0,4.6,0,9.2,0,13.8c0,0.4,0.2,0.9-0.2,1.2c-3.8-1.8-7.4-3.9-10.9-6.3c-0.3-0.4-0.3-0.9-0.3-1.4&#10;&#9;&#9;c0-4,0-8,0-12c0-0.5,0-0.9,0.2-1.3c0.4-0.5,0.8-0.3,1.2-0.1c3.1,2,6.3,3.8,9.5,5.4C118.2,226.3,118.6,226.4,118.5,226.8z" id="BJpg3SeS3k7"/>
                              <path d="M107.6,220.5c-0.2,0.4-0.2,0.9-0.2,1.3c0,4.6,0,9.1,0,13.7c-3.4-2.2-6.7-4.7-9.7-7.5&#10;&#9;&#9;c-0.2-0.4-0.3-0.8-0.3-1.3c0-4.3,0-8.5,0-12.7c0-0.2,0-0.4,0.1-0.5c0.5-1,1-0.3,1.3,0c1.2,1.1,2.4,2,3.6,3c1.4,1.2,2.9,2.2,4.4,3.2&#10;&#9;&#9;C107.1,219.8,107.6,219.9,107.6,220.5z" id="ryAe3rxHnJQ"/>
                              <path d="M97.7,212.9c0,5,0,10-0.1,15c-3.3-2.9-6.2-6.2-8.5-9.9c0.1-4.1,0-8.2,0.1-12.3c0-0.6-0.1-1.1,0.2-1.6&#10;&#9;&#9;c0.6-0.6,0.9,0,1.2,0.4c1.1,1.3,2,2.6,3.2,3.9c1.1,1.2,2.3,2.3,3.4,3.6C97.4,212.2,97.8,212.4,97.7,212.9z" id="BykZ2reBhJm"/>
                              <path d="M89.7,203.9c-0.4,0.3-0.2,0.7-0.2,1.1c0,4,0,7.9,0,12c0,0.4,0.2,0.9-0.4,1.1c-3.1-4.6-5.1-9.7-5.7-15.2&#10;&#9;&#9;c-0.5-5.5-0.2-11.1-0.2-16.7c0.1-0.1,0.2-0.1,0.3,0.1c0.3,0.6,0.2,1.3,0.2,2c0.8,5.3,2.7,10,5.5,14.5&#10;&#9;&#9;C89.6,202.9,90,203.3,89.7,203.9z" id="rJg-nrgS2JX"/>
                              <path d="M83.4,186c-0.1,0-0.1,0-0.2,0c0-0.6,0-1.2,0-1.9c0.1,0,0.1,0,0.2,0C83.8,184.8,83.8,185.4,83.4,186z" id="SkZW2HlB31X"/>
                              <path d="M203.6,222.6c0,7.3,0,14.5,0,21.8c-3.7,0.2-7.4-0.2-11-0.2c-3,0-6-0.4-9.1-0.6c-0.5-0.1-1.1-0.1-1.6-0.2&#10;&#9;&#9;c-3-0.2-6.1-0.6-9.1-1c-3.7-0.5-7.3-1.1-10.9-1.7c-4.2-0.8-8.4-1.7-12.6-2.7c-6-1.5-11.9-3.3-17.6-5.5c-4.3-1.7-8.6-3.4-12.7-5.5&#10;&#9;&#9;c-0.2-0.1-0.4-0.1-0.5-0.2c-1.9-1.1-3.9-2.1-5.7-3.2c-1.8-1-3.4-2.1-5.2-3.1c-2.6-1.9-5.3-3.7-7.8-5.9c-0.7-0.6-1.2-1.3-2.1-1.7&#10;&#9;&#9;c-1.3-1.6-2.9-2.9-4.2-4.5c-1.1-1.3-2.1-2.6-3.1-3.9c-0.2-0.2-0.4-0.5-0.6-0.6c-0.9-1.5-1.8-3-2.6-4.6c-1.9-3.6-3-7.5-3.7-11.4&#10;&#9;&#9;c-0.1-0.6-0.1-1.2-0.1-1.8s0-1.2,0-1.9c0.5,0,1-0.1,1.5-0.1c13.7,0,27.5,0,41.2,0c0.1,0.1,0.2,0.2,0.2,0.4c0.1,2.4,0.8,4.7,1.3,7.1&#10;&#9;&#9;c0.7,2.5,2.2,4.6,3.7,6.6c4.4,5.6,10.2,9.5,16.5,12.8c9.2,4.7,19,7.6,29.1,9.4C185.8,221.9,194.7,222.6,203.6,222.6z" id="HJGb2BxHhyQ"/>
                              <path d="M198.8,160.9c-7.2,0.2-14.3,0.9-21.3,2.1c-0.1,0-0.2,0-0.3,0c-0.4-0.4-0.4-0.9-0.4-1.4c0-4.1,0-8.2,0-12.3&#10;&#9;&#9;c0-0.5,0-1,0.4-1.4c1.6-0.5,3.3-0.6,4.9-0.8c3.9-0.6,7.8-0.9,11.7-1.2c1.3-0.1,2.6,0,4-0.1c1.2-0.2,1.3-0.1,1.4,1.1&#10;&#9;&#9;c0.1,4.4,0.1,8.8,0,13.1C199.1,160.4,199.1,160.7,198.8,160.9z" id="HkXbhSlS3JX"/>
                              <path d="M177.2,148c0,5,0,10.1,0,15.1c-3.4,0.8-6.9,1.4-10.3,2.3c-0.5,0.1-1,0.2-1.5,0.4c-0.4-0.4-0.4-0.9-0.4-1.4&#10;&#9;&#9;c0-4.1,0-8.2,0-12.3c0-0.5,0-1,0.4-1.4c3-1.1,6.2-1.6,9.3-2.3C175.5,148.2,176.4,148.1,177.2,148z" id="HJ4W2reBh1Q"/>
                              <path d="M165.4,150.7c0,5,0,10,0,15.1c-3.2,1-6.3,2-9.5,3.2c-0.4-0.4-0.4-0.9-0.4-1.4c0-4.1,0-8.2,0-12.3&#10;&#9;&#9;c0-0.5,0-1,0.4-1.4c2.2-1.1,4.6-1.7,6.8-2.5C163.6,151.1,164.5,150.9,165.4,150.7z" id="B1rb2BgS21Q"/>
                              <path d="M155.9,153.8c0,5,0,10,0,15.1c-2.7,1.2-5.5,2.5-8.2,3.6c-0.4-0.4-0.4-0.8-0.4-1.2c0-4.4,0-8.7,0-13.1&#10;&#9;&#9;c0-0.2,0.1-0.5,0.1-0.7C150.2,156.1,153,154.8,155.9,153.8z" id="SJLbnrxrn1Q"/>
                              <path d="M147.5,157.6c0.4,0.4,0.2,0.8,0.2,1.2c0,4.6,0,9.2,0,13.8c-2.5,1.4-5,2.9-7.4,4.4c-0.4-0.4-0.4-0.8-0.4-1.2&#10;&#9;&#9;c0-4.3,0-8.6,0-12.9c0-0.3,0.1-0.6,0.1-0.9C142.4,160.3,144.9,158.8,147.5,157.6z" id="rkvZ2HlShJQ"/>
                              <path d="M127.6,191.5c-0.9-1.3-1-2.9-1.3-4.4c-0.2-1-0.2-2-0.2-3c-0.1-5.2,1.9-9.7,5-13.7c0.6-0.9,1.4-1.6,2.1-2.4&#10;&#9;&#9;c0.8,0.2,0.7,0.9,0.7,1.5c0.1,2.2,0,4.5,0,6.7c0,1.6,0,3.3,0,5c0,0.5-0.1,1.1-0.4,1.5C131.2,185.3,129.1,188.2,127.6,191.5z" id="rJdb3SlrnJ7"/>
                              <path d="M133.7,182.7c0-4.4,0-8.8,0-13.3c0-0.5,0.1-1.1-0.4-1.5c2-2.3,4.3-4.3,6.9-5.9c0.4,0.4,0.2,0.8,0.2,1.2&#10;&#9;&#9;c0,4.6,0,9.2,0,13.7C138,178.8,135.8,180.6,133.7,182.7z" id="rJt-hrxH21X"/>
                              <path d="M198.8,160.9c0-4.7,0-9.4,0-14.1c0-0.9-0.3-1.2-1.1-1.1c0.8-0.5,1.8-0.1,2.6-0.2c1.1-0.1,2.2,0,3.3,0&#10;&#9;&#9;c0,4.7,0,9.3,0,14c0,0.4-0.1,0.8,0.1,1.2C202.2,160.9,200.5,160.9,198.8,160.9z" id="ryc-hHerhkQ"/>
                            </g>
                          </g>
                          <g id="grupo3" class="texto-js2" data-animator-group="true" data-animator-type="2">
                            <g id="Hkjb2HerhJQ">
                              <path d="M178.2,25.5v109.7c-0.6,0.3-1,1-0.9,1.8c0.1,0.7,0.6,1.3,1.3,1.4c1,0.2,1.8-0.6,1.8-1.7&#10;&#9;&#9;c0-0.7-0.4-1.3-0.9-1.5V25.3L178.2,25.5z" id="Skn-2rgH3km"/>
                              <rect x="174.6" y="21.7" width="8.4" height="8.4" id="HkpZhHlB3kX"/>
                            </g>
                          </g>
                          <g id="grupo4" class="texto-js2" data-animator-group="true" data-animator-type="2">
                            <g id="Sk0WnHlHhkX">
                              <path d="M138.8,286v-67.8c0.6-0.3,1-0.9,0.9-1.7c-0.1-0.6-0.6-1.2-1.3-1.3c-1-0.2-1.8,0.6-1.8,1.5&#10;&#9;&#9;c0,0.6,0.4,1.2,0.9,1.4v68L138.8,286z" id="BJyfnreS317"/>
                              <rect x="133.9" y="281.8" width="8.4" height="8.4" id="BkeG2SgSnJQ"/>
                            </g>
                          </g>
                          <g id="grupo5" class="texto-js2" data-animator-group="true" data-animator-type="2">
                            <g id="H1bM2Slr21m">
                              <path d="M243.6,380.4v-46c0.6-0.3,1-0.9,0.9-1.7c-0.1-0.6-0.6-1.2-1.3-1.3c-1-0.2-1.8,0.6-1.8,1.5&#10;&#9;&#9;c0,0.6,0.4,1.2,0.9,1.4v46.1H243.6z" id="BkzznrgHhyQ"/>
                              <rect x="238.7" y="376.3" width="8.4" height="8.4" id="By7MnSlB2kX"/>
                            </g>
                          </g>
                          <g id="grupo6" class="texto-js2" data-animator-group="true" data-animator-type="2">
                            <g id="BkVGnrlB2JX">
                              <path d="M220.3,86.5v145.7c-0.6,0.3-1,1-0.9,1.8c0.1,0.7,0.6,1.3,1.3,1.4c1,0.2,1.8-0.6,1.8-1.7&#10;&#9;&#9;c0-0.7-0.4-1.3-0.9-1.5V86.4L220.3,86.5z" id="B1rfnrlH31Q"/>
                              <rect x="216.8" y="82.7" width="8.4" height="8.4" id="BJLG3Her3y7"/>
                            </g>
                          </g>
                        </svg>
                        <div class="left-top-mobile texto-js animated fade animation-delay-900">
                          <h2 class="chart-title">
                            <?php the_sub_field('titulo-left-top'); ?>
                          </h2>
                          <p class="chart-texto">
                            <?php the_sub_field('left-top'); ?>
                          </p>
                        </div>
                        <div class="left-bottom-mobile texto-js animated fade animation-delay-900">
                          <h2 class="chart-title">
                            <?php the_sub_field('titulo-left-bottom'); ?>
                          </h2>
                          <p class="chart-texto">
                            <?php the_sub_field('left-bottom'); ?>
                          </p>
                        </div>
                        <div class="right-top-mobile texto-js animated fade animation-delay-900">
                          <h2 class="chart-title">
                            <?php the_sub_field('titulo-right-top'); ?>
                          </h2>
                          <p class="chart-texto">
                            <?php the_sub_field('right-top'); ?>
                          </p>
                        </div>
                        <div class="right-bottom-mobile texto-js animated fade animation-delay-900">
                          <h2 class="chart-title">
                            <?php the_sub_field('titulo-right-bottom'); ?>
                          </h2>
                          <p class="chart-texto">
                            <?php the_sub_field('right-bottom'); ?>
                          </p>
                        </div>
                      </div>
                    </div>
                    <?php
                  endwhile;
                endif;
                ?>
              </div>
              <div class="block-profissoes slick-slider background slick-slider-js">
                <div class="grid-cont big">
                  <div id="slick-slider" role="complementary" class="simple">
                    <?php
                    if (have_rows('testemunhos_slider')):
                      while (have_rows('testemunhos_slider')):
                        the_row(); ?>
                        <blockquote>
                          <h2 class="title-slick-slider"><?php the_sub_field('titulo'); ?></h2>
                          <div class="author-image">
                            <?php $image = get_sub_field('imagem'); ?>
                            <img alt="<?php echo $image['alt']; ?>"  alt="" src="<?php echo $image['url']; ?>" />
                          </div>
                          <div class="quote">
                            <p class="text reset"><q><?php the_sub_field('texto'); ?></q></p>
                            <cite class="cite">
                              <b><?php the_sub_field('autor'); ?></b>
                              <?php the_sub_field('cargo'); ?>
                            </cite>
                          </div>
                        </blockquote>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <script>
                  jQuery(document).ready(function( $ ) {
                      Edit.modules.collection.push({ type: 'slickProfissoes', instance: new Edit.modules.slickProfissoes('.slick-slider-js') });
                  })
              </script>
              <div class="block-profissoes alguns-dados uiux pt-80 pb-60">
                <div class="grid-cont big">
                  <div class="title-block aligncenter pb-60">
                    <h2 class="title-big reset">
                      <?php the_sub_field('titulo_grande'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <div class="flex-container">
                    <?php
                    $count = 0;
                    if (have_rows('items')):
                      while (have_rows('items')):
                        the_row(); ?>
                        <div class="flex-item alguns-dados-js fade animated animation-delay-<?php echo $count; ?>">
                          <?php $count += 100; ?>
                          <div class="block-image">
                            <?php $image = get_sub_field('imagem'); ?>
                            <img alt="<?php echo $image['alt']; ?>" class="inner-image" src="<?php echo $image['url']; ?>">
                          </div>
                          <h3 class="subtitulo">
                            <span style="color: #f0cd1e;"><?php the_sub_field('numero'); ?><br></span>
                            <?php the_sub_field('titulo'); ?>
                          </h3>
                          <p class="text reset"><?php the_sub_field('texto'); ?></p>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'bloco-marketing':
              ?>
              <div class="block-profissoes marketing alguns-dados fundo-cinza pt-80 pb-60">
                <div class="grid-cont big">
                  <div class="title-block aligncenter pb-60">
                    <h2 class="title-big reset">
                      <?php the_sub_field('titulo_grande'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <h3 class="subtitle-big pb-60 reset">
                    <?php the_sub_field('subtitulo'); ?>
                  </h3>
                </div>
                <div class="grid-cont big">
                  <div class="flex-container">
                    <?php
                    if (have_rows('icones_marketing')):
                      while (have_rows('icones_marketing')):
                        the_row(); ?>
                        <div class="flex-item alguns-dados-js fade animated">
                          <div class="block-image">
                            <?php $image = get_sub_field('imagem'); ?>
                            <img alt="<?php echo $image['alt']; ?>" class="inner-image" src="<?php echo $image['url']; ?>">
                          </div>
                          <h3 class="subtitulo">
                            <?php the_sub_field('titulo'); ?>
                          </h3>
                          <div class="separador"></div>
                          <p class="text reset"><?php the_sub_field('texto'); ?></p>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <div class="block-profissoes slick-slider slick-slider-js background">
                <div class="grid-cont big">
                  <div id="slick-slider" role="complementary" class="simple">
                    <?php
                    if (have_rows('testemunhos_slider')):
                      while (have_rows('testemunhos_slider')):
                        the_row(); ?>
                        <blockquote>
                          <h2 class="title-slick-slider"><?php the_sub_field('titulo'); ?></h2>
                          <div class="author-image">
                            <?php $image = get_sub_field('imagem'); ?>
                            <img alt="<?php echo $image['alt']; ?>"  alt="" src="<?php echo $image['url']; ?>" />
                          </div>
                          <div class="quote">
                            <p class="text reset"><q><?php the_sub_field('texto'); ?></q></p>
                            <cite class="cite">
                              <b><?php the_sub_field('autor'); ?></b>
                              <?php the_sub_field('cargo'); ?>
                            </cite>
                          </div>
                        </blockquote>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <script>
                  jQuery(document).ready(function( $ ) {
                      Edit.modules.collection.push({ type: 'slickProfissoes', instance: new Edit.modules.slickProfissoes('.slick-slider-js') });
                  })
                  </script>
              <div class="block-profissoes piramides pt-80 pb-60">
                <div class="grid-cont big">
                  <div class="title-block aligncenter pb-60">
                    <h2 class="title-big reset">
                      <?php the_sub_field('titulo_grande2'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <h3 class="subtitle-big pb-60 reset">
                    <?php the_sub_field('subtitulo2'); ?>
                  </h3>
                </div>
                <div class="grid-cont big">
                  <div class="block-formacao-info grid-1-2 pb-60">
                    <?php
                    if (have_rows('piramides_marketing')):
                      while (have_rows('piramides_marketing')):
                        the_row();
                        $tipo = get_sub_field('select_piramide');
                        ?>
                        <?php if( in_array('piramide-cinza', $tipo) ): ?>
                          <div class="top-left piramide-js animated fade">
                            <p class="texto-js texto-cinza-big reset animated fade animation-delay-400">
                              <?php the_sub_field('texto_big'); ?>
                            </p>
                            <svg class="piramide-cinza" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 257 101"><g id="BJl4j9trlm"><g id="S1bVo9tBgm"><path d="M9.3 99.9l-8.2-7.6c-.3-.3-.5-.7-.4-1.1L16.8 1.7c.3-1.4 2.6-1.5 2.9-.1l20.8 87.9c.2.6-.3 1.3-.9 1.5l-28.7 9.2c-.6.2-1.2.1-1.6-.3z" id="cinza"/><path d="M8.8 100.4L.6 92.8c-.5-.4-.7-1.1-.6-1.7L16.2 1.6c.2-1 1-1.6 2.1-1.6 1 0 1.9.6 2.1 1.5l20.8 87.9c.2 1-.4 2-1.4 2.3l-28.7 9.2c-.2.1-.5.1-.7.1-.6-.1-1.2-.3-1.6-.6zm8.6-98.6L1.3 91.3c0 .2 0 .4.2.5l8.2 7.6c.2.1.4.2.6.2h.3l28.7-9.2c.4-.1.6-.4.5-.7L19.1 1.8c-.1-.5-.7-.5-.8-.5-.4 0-.8.1-.9.5z" id="cinza"/></g><g id="SyNEoqYrgX"><path d="M42.3 90.5L19.7.8c-.3-1.1-2-1-2.1.1l-7.5 98.2c-.1.7.7 1.2 1.4 1l30.1-8.5c.5-.1.8-.6.7-1.1z" id="rkrEicKrgX"/></g></g><circle cx="26.4" cy="72.8" r="4.7" id="BJIVj5tBe7"/><circle cx="26.4" cy="72.8" r="2.2" id="BywEoqtrx7"/><g class="linha" data-animator-group="true" data-animator-type="2"><g id="BkOEsqYHxQ"><path id="HJtVsqYHxX" d="M253.1 70.5h4.5V75h-4.5z"/><path id="ryqNjqFBx7" d="M253.3 72.8H26.4"/></g></g></svg>
                          </div>
                        <?php endif; ?>
                        <?php if( in_array('piramide-amarelo', $tipo) ): ?>
                          <div class="bottom-left piramide-js animated fade">
                            <p class="texto-js texto-amarelo-big animated fade animation-delay-400">
                              <?php the_sub_field('texto_big'); ?>
                            </p>
                            <p class="texto-js texto-amarelo animated fade animation-delay-400">
                              <?php the_sub_field('texto'); ?>
                            </p>
                            <svg class="piramide-amarelo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 290 125"><g id="Hyezi8lvlQ"><path id="r1-MiLgwgm" d="M267.7 119.5l10.5-11.2L260.1 8.1l-2-.6z"/><g id="SkMMj8lwgm"><g id="rkXMs8lvlQ"><path d="M269.6 118.3l7.5-6.9c.9-.8 1.3-1.9 1.1-3L260.1 8.2c-.4-2-3.5-2-4-.1l-23.3 98.3c-.3 1.3.5 2.7 2 3.2l30.2 9.7c1.7.4 3.5 0 4.6-1z" id="B1VGs8lPxX"/><path d="M266.5 120.3c-.6 0-1.2-.1-1.7-.3l-30.2-9.7c-1.9-.6-3-2.4-2.6-4.2l23.3-98.3c.3-1.3 1.4-2.1 2.8-2.1s2.6.9 2.9 2.2l18.1 100.2c.2 1.4-.2 2.8-1.3 3.8l-7.5 6.9c-1 1-2.4 1.5-3.8 1.5zM258.1 7.5c-.2 0-1 0-1.1.8l-23.3 98.3c-.2.9.4 1.8 1.4 2.1l30.2 9.7c.4.1.8.2 1.2.2.9 0 1.9-.3 2.5-.9l7.5-6.9c.6-.6.9-1.4.8-2.2L259.2 8.4c-.1-.7-.6-.9-1.1-.9z" id="S1HfjLevgX"/></g><g id="By8zjUevx7"><path d="M230.7 108.3L256.1 7.6c.4-1.6 3-1.4 3.1.2l8.4 110.2c.1 1-1 1.7-2 1.4l-33.8-9.5c-.9-.2-1.3-.9-1.1-1.6z" id="HJDzi8xDx7"/></g></g></g><circle cx="250.7" cy="80.8" r="4.7" id="S1dzi8gPgX"/><circle cx="250.7" cy="80.8" r="2.2" id="rJtfiIewl7"/><g class="linha" data-animator-group="true" data-animator-type="2"><g id="S1qGoLxDeX"><path id="HysfoUlDlm" d="M13.2 78.6h4.5v4.5h-4.5z"/><path id="By2fsIxvg7" d="M15.4 80.8h230.9"/></g></g></svg>
                          </div>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                  <div class="block-formacao-info grid-1-2 pb-60">
                    <?php
                    if (have_rows('piramides_marketing')):
                      while (have_rows('piramides_marketing')):
                        the_row();
                        $tipo = get_sub_field('select_piramide');
                        ?>
                        <?php if( in_array('piramide-preto', $tipo) ): ?>
                          <div class="top-right piramide-js animated fade">
                            <p class="texto-js texto-preto-big reset animated fade animation-delay-400">
                              <?php the_sub_field('texto_big'); ?>.
                            </p>
                            <p class="texto-js texto-preto animated fade animation-delay-400">
                              <?php the_sub_field('texto'); ?>
                            </p>
                            <svg class="piramide-preto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 279 135"><g id="HkeHNQ1vxQ"><g id="H1WHE7yvlm"><path d="M12.8 133.3l-10.5-9.7c-.6-.6-.9-1.4-.8-2.2L22.7 3.6c.5-2.8 5-2.9 5.7-.1l27.3 115.3c.3 1.2-.5 2.5-1.8 2.9l-38 12.2c-1.1.4-2.4.1-3.1-.6z" id="ByzB4QJwe7"/><path d="M11.8 134.4l-10.5-9.7c-1-.9-1.4-2.2-1.2-3.5L21.3 3.3c.4-2 2.1-3.3 4.3-3.3 2.1 0 3.8 1.3 4.2 3.1L57 118.4c.5 2-.7 4-2.8 4.6l-38 12.2c-.5.1-.9.2-1.4.2-1.2.1-2.2-.3-3-1zM24.1 3.9L2.9 121.7c-.1.3.1.6.3.9l10.5 9.7c.3.3.7.4 1.1.4.2 0 .4 0 .5-.1l38-12.2c.6-.2 1-.7.9-1.2L26.9 3.9c-.2-.9-1.2-.9-1.4-.9 0-.1-1.2-.1-1.4.9z" id="HJmrNXJDeQ"/></g><g id="Sy4BNQJwl7"><path d="M58 120L28.8 4.2c-.6-2.5-4.7-2.2-4.9.3l-9.7 126.7c-.1 1.5 1.5 2.7 3.2 2.2l38.9-10.9c1.3-.3 2.1-1.4 1.7-2.5z" id="SyrrNX1Px7"/></g></g><circle cx="33.8" cy="95.3" r="4.7" id="SkLH47kwxX"/><circle cx="33.8" cy="95.3" r="2.2" id="SywBE7JveX"/><g class="linha" data-animator-group="true" data-animator-type="2"><g id="ryuHEmJPlm"><path id="HktHVmkve7" d="M274.9 93h4.5v4.5h-4.5z"/><path id="r19rNmyDxQ" d="M275 95.3H34"/></g></g></svg>
                          </div>
                        <?php endif; ?>
                        <?php if( in_array('piramide-torrado', $tipo) ): ?>
                          <div class="bottom-right piramide-js animated fade">
                            <p class="texto-js texto-torrado-big animated fade animation-delay-400">
                              <?php the_sub_field('texto_big'); ?>
                            </p>
                            <svg class="piramide-torrado" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 130"><g id="Sygs8VzDlQ"><g id="rk-iIEGweQ"><path d="M238.5 129.1L249 122c.7-.5 1-1.2.9-1.9L230.2 2.5c-.4-2.3-4-2.3-4.5-.1l-25.9 113.7c-.2 1 .4 2 1.5 2.3l35.1 11c.7.2 1.5.1 2.1-.3z" id="r1zs8EfDe7"/><path d="M237.1 130.2c-.3 0-.7-.1-1-.2L201 119c-1.4-.5-2.3-1.8-2-3.2L224.9 2.2c.3-1.3 1.5-2.2 3-2.2s2.8 1 3 2.4L250.6 120c.2 1-.3 2.1-1.2 2.7l-10.5 7.1c-.5.3-1.2.4-1.8.4zM227.9 1.5c-.6 0-1.3.3-1.5 1.1l-25.9 113.6c-.1.6.3 1.2 1 1.5l35.1 11c.2.1.4.1.5.1.4 0 .7-.1 1-.3l10.5-7.1c.4-.3.6-.7.6-1.2L229.5 2.6c-.2-.8-.9-1.1-1.6-1.1z" id="Bkmi8Vfvg7"/></g><g id="Hy4i84MPg7"><path d="M198 117.7L225.7 1.5c.4-1.7 3.2-1.5 3.3.2l8.1 126.4c.1 1-1.1 1.8-2.2 1.5l-35.8-10.1c-.8-.3-1.3-1-1.1-1.8z" id="BySoINGvxQ"/></g></g><circle cx="218.1" cy="96" r="4.7" id="r1IiI4zDl7"/><circle cx="218.1" cy="96" r="2.2" id="HJPjUEMvgX"/><g class="linha" data-animator-group="true" data-animator-type="2"><g id="r1OjLNzveQ"><path id="HkKiINMwl7" d="M0 93.7h4.5v4.5H0z"/><path id="B1ci8NGDlm" d="M2.2 96h215.9"/></g></g></svg>
                          </div>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php
              break;
              case 'bloco-digital-designer':
              ?>
              <?php if( get_sub_field('front-end') ) { ?>
                <div class="block-profissoes front-end alguns-dados fundo-cinza pt-80 pb-60">
                  <div class="grid-cont big">
                    <div class="title-block aligncenter pb-60">
                      <?php the_sub_field('titulo_grande'); ?>
                    </div>
                    <h3 class="subtitle-big pb-40 reset">
                      <?php the_sub_field('subtitulo'); ?>
                    </h3>
                    <p class="texto pb-40">
                      <?php the_sub_field('texto'); ?>
                    </p>
                  </div>
                  <div class="grid-cont big">
                    <div class="flex-container">
                      <?php
                      if (have_rows('icones_digital_design')):
                        while (have_rows('icones_digital_design')):
                          the_row(); ?>
                          <div class="flex-item alguns-dados-fwd-js fade animated">
                            <?php $image = get_sub_field('imagem'); ?>
                            <img alt="<?php echo $image['alt']; ?>" class="inner-image" src="<?php echo $image['url']; ?>">
                            <p class="text"><?php the_sub_field('texto'); ?></p>
                          </div>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                </div>
                <div class="block-profissoes slick-slider slick-slider-js background">
                  <div class="grid-cont big">
                    <div id="slick-slider" role="complementary" class="simple">
                      <?php
                      if (have_rows('testemunhos_slider')):
                        while (have_rows('testemunhos_slider')):
                          the_row(); ?>
                          <blockquote>
                            <h2 class="title-slick-slider"><?php the_sub_field('titulo'); ?></h2>
                            <div class="author-image">
                              <?php $image = get_sub_field('imagem'); ?>
                              <img alt="<?php echo $image['alt']; ?>"  alt="" src="<?php echo $image['url']; ?>" />
                            </div>
                            <div class="quote">
                              <p class="text reset"><q><?php the_sub_field('texto'); ?></q></p>
                              <cite class="cite">
                                <b><?php the_sub_field('autor'); ?></b>
                                <?php the_sub_field('cargo'); ?>
                              </cite>
                            </div>
                          </blockquote>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                </div>
                <script>
                  jQuery(document).ready(function( $ ) {
                      Edit.modules.collection.push({ type: 'slickProfissoes', instance: new Edit.modules.slickProfissoes('.slick-slider-js') });
                  })
                </script>
                <div class="block-profissoes front-end color2 alguns-dados pt-80 pb-60">
                  <div class="grid-cont big">
                    <div class="title-block aligncenter pb-60">
                      <?php the_sub_field('titulo_grande2'); ?>
                    </div>
                    <h3 class="subtitle-big pb-60 reset">
                      <?php the_sub_field('subtitulo2'); ?>
                    </h3>
                  </div>
                  <div class="grid-cont">
                    <div id="front-end-barras-titles" class="flex-titles animated fade">
                      <h3 id="designer" class="subtitulo reset">
                       Designer                
                     </h3>
                     <h3 id="front-end" class="subtitulo reset">
                      Front-end        
                    </h3>
                    <h3 id="back-end" class="subtitulo reset">
                      Back-end        
                    </h3>
                  </div>

                  <svg class="pb-60 animated fade" xmlns="http://www.w3.org/2000/svg" id="front-end-barras" viewBox="0 0 600 492">
                    <g id="barra-fwd-cinza2" ><path id="el_xE8noP6cnyd" d="M454.9 79.8l59.3 59.8 80.4-21-59.8-60.2z"/><path id="el_fCDYX7YJ3AL" d="M514.2 139.6l-1.8 353.1 80.4-21.2 1.8-352.9z"/><path id="el_iziOSXJjpsG" d="M514.2 139.6l-1.8 353.1-59.5-59.6 2-353.3z"/><ellipse id="el_aBrduEAYcDu" cx="479.2" cy="273.4" rx="8.4" ry="14.5"/><g id="el_w1_DGnE31nA"><g id="el_Wl9tvuZ0Umx"><g id="el_S8EFbwQzMJE"><ellipse id="el_Ar-AThWshEA" cx="479.1" cy="273.2" rx="6.7" ry="11.8"/></g><g id="el_tDyqE6nk1PQ"><ellipse id="el_DyuwUo0YJte" cx="479.1" cy="273.2" rx="6.7" ry="11.8"/></g></g></g></g><g id="tubo-cinza" ><path d="M484.3 266.3l-119.4 20.1c-2.6.4-4.4 2.9-3.9 5.5l.4 2.2c.4 2.6 2.9 4.4 5.5 3.9l116.8-19.7c2.6-.4 4.4-2.9 3.9-5.5l-.4-2.2c-.5-2.5-.3-4.8-2.9-4.3z"/></g><g id="barra-fwd-amarelo"><path id="el_C5GQi_vWMIU" d="M228.4 79.8l59.3 59.8 80.4-21-59.7-60.2z"/><path id="el_ZTVpsJSMleK" d="M287.7 139.6l-1.6 353.1 80.3-21.2 1.7-352.9z"/><path id="el_R703M3Gfavz" d="M287.7 139.6l-1.6 353.1-59.6-59.6 1.9-353.3z"/><ellipse id="el_ATcqKkQ-q64" cx="252.2" cy="300.8" rx="8.4" ry="14.5"/><g id="el_rhXwRjWb8In"><g id="el_COHlIWDPww0"><g id="el_C7sxqDd3VrT"><ellipse id="el_gxHjpfBjP4T" cx="252.1" cy="300.5" rx="6.7" ry="11.8"/></g><g id="el_px1VkCIN1X3"><ellipse id="el_T97lxBGoMDl" cx="252.1" cy="300.5" rx="6.7" ry="11.8"/></g></g></g></g><g id="tubo-amarelo" ><path d="M256.8 293.7l-119.4 20.1c-2.6.4-4.4 2.9-3.9 5.5l.4 2.2c.4 2.6 2.9 4.4 5.5 3.9L256 305.7c2.6-.4 4.4-2.9 3.9-5.5l-.4-2.2c-.3-2.6-.1-4.8-2.7-4.3z"/></g><g id="barra-fwd-cinza" ><path id="el_6gVaijD0CNy" d="M2 79.8l59.4 59.8 80.3-21-59.8-60.2z"/><path id="el_QjEs8Bj7o2g" d="M61.4 139.6l-1.8 353.1 80.3-21.2 1.8-352.9z"/><path id="el_zDBo5hHoUjz" d="M61.4 139.6l-1.8 353.1L0 433.1 2 79.8z"/></g></svg>
                  </div>
                  <div class="grid-cont size2">
                    <span class="Rectangle_697"></span>
                    <div class="flex-container">
                      <?php
                      if (have_rows('icones_digital_design2')):
                        $i = 0;
                        while (have_rows('icones_digital_design2')):
                          the_row(); $i++ ?>
                          <div class="flex-item barras-fwd-js fade animated">
                            <p class="numero"><?php echo $i . '.'; ?></p>
                            <p class="text"><?php the_sub_field('texto'); ?></p>
                          </div>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                    <span class="Rectangle_697"></span>
                  </div>
                </div>
              <?php } else { ?>
                <div class="block-profissoes d-designer alguns-dados fundo-cinza pt-80 pb-60">
                  <div class="grid-cont big">
                    <div class="title-block aligncenter pb-60">
                      <?php the_sub_field('titulo_grande'); ?>
                    </div>
                    <h3 class="subtitle-big pb-60 reset">
                      <?php the_sub_field('subtitulo'); ?>
                    </h3>
                  </div>
                  <div class="grid-cont big">
                    <div class="flex-container">
                      <?php
                      if (have_rows('icones_digital_design')):
                        $count = 0;
                        while (have_rows('icones_digital_design')):
                          the_row(); ?>
                          <div class="flex-item alguns-dados-js fade animated animation-delay-<?php echo $count; ?>">
                            <?php $count += 100; ?>
                            <div class="block-image">
                              <?php $image = get_sub_field('imagem'); ?>
                              <img alt="<?php echo $image['alt']; ?>" class="inner-image" src="<?php echo $image['url']; ?>">
                            </div>
                            <h3 class="subtitulo">
                              <?php the_sub_field('titulo'); ?>
                            </h3>
                            <div class="separador"></div>
                            <p class="text"><?php the_sub_field('texto'); ?></p>
                          </div>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                </div>
                <div class="block-profissoes slick-slider slick-slider-js background">
                  <div class="grid-cont big">
                    <div id="slick-slider" role="complementary" class="simple">
                      <?php
                      if (have_rows('testemunhos_slider')):
                        while (have_rows('testemunhos_slider')):
                          the_row(); ?>
                          <blockquote>
                            <h2 class="title-slick-slider"><?php the_sub_field('titulo'); ?></h2>
                            <div class="author-image">
                              <?php $image = get_sub_field('imagem'); ?>
                              <img alt="<?php echo $image['alt']; ?>"  alt="" src="<?php echo $image['url']; ?>" />
                            </div>
                            <div class="quote">
                              <p class="text reset"><q><?php the_sub_field('texto'); ?></q></p>
                              <cite class="cite">
                                <b><?php the_sub_field('autor'); ?></b>
                                <?php the_sub_field('cargo'); ?>
                              </cite>
                            </div>
                          </blockquote>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                </div>
                <script>
                  jQuery(document).ready(function( $ ) {
                      Edit.modules.collection.push({ type: 'slickProfissoes', instance: new Edit.modules.slickProfissoes('.slick-slider-js') });
                  })
                </script>
                <div class="block-profissoes d-designer alguns-dados fundo-amarelo-claro pt-80 pb-60">
                  <div class="grid-cont big">
                    <div class="title-block aligncenter pb-60">
                      <?php the_sub_field('titulo_grande2'); ?>
                    </div>
                    <h3 class="subtitle-big pb-60 reset">
                      <?php the_sub_field('subtitulo2'); ?>
                    </h3>
                  </div>
                  <div class="grid-cont big">
                    <div class="flex-container">
                      <?php
                      if (have_rows('icones_digital_design2')):
                        while (have_rows('icones_digital_design2')):
                          the_row(); ?>
                          <div class="flex-item alguns-dados-js fade animated">
                            <div class="block-image">
                              <?php $image = get_sub_field('imagem'); ?>
                              <img alt="<?php echo $image['alt']; ?>" class="inner-image" src="<?php echo $image['url']; ?>">
                            </div>
                            <h3 class="subtitulo">
                              <?php the_sub_field('titulo'); ?>
                            </h3>
                            <div class="separador color2"></div>
                            <p class="text"><?php the_sub_field('texto'); ?></p>
                          </div>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                </div>
                <?php
              }
              break;
              case 'bloco_estatisticas':
              ?>
              <div class="block-profissoes estatisticas bg1">
                <div class="grid-cont">
                  <div class="title-block aligncenter pb-80">
                    <h2 class="title-big reset white">
                      <?php the_sub_field('titulo_grande'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <div id="pbar" class="block-graph">
                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <div class="pbar-js">
                          <div class="progress-bar-wrapper">
                            <?php
                            $number = 0;
                            if (get_sub_field('numero')):
                              $number = get_sub_field('numero');
                            endif;
                            ?>
                            <div class="progressbar" value="<?php echo $number; ?>"></div>
                          </div>
                          <div class="progress-bar-details">
                            <span class="progress-label"></span>
                            <span class="text_percent"><?php the_sub_field('texto'); ?></span>
                          </div>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'bloco_estatisticas_marketing':
              ?>
              <div class="block-profissoes marketing estatisticas bg1">
                <div class="grid-cont">
                  <div class="title-block aligncenter pb-80">
                    <h2 class="title-big reset white">
                      <?php the_sub_field('titulo_grande'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <div id="pbar" class="block-graph">
                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <div class="pbar-js pb-60">
                          <svg class="dots" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 164 164">
                            <path d="M163.9,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,152.7,163.9,155.2,163.9,158.3z"
                            class="cor-branco cor-js" />
                            <path d="M147,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C144.5,152.7,147,155.2,147,158.3z" class="cor-branco cor-js" />
                            <path d="M130,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C127.5,152.7,130,155.2,130,158.3z" class="cor-branco cor-js" />
                            <path d="M113.1,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,152.7,113.1,155.2,113.1,158.3z"
                            class="cor-branco cor-js" />
                            <path d="M96.1,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C93.6,152.7,96.1,155.2,96.1,158.3z" class="cor-branco cor-js" />
                            <path d="M79.1,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C76.6,152.7,79.1,155.2,79.1,158.3z" class="cor-branco cor-js" />
                            <path d="M62.2,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,152.7,62.2,155.2,62.2,158.3z" class="cor-branco cor-js" />
                            <path d="M45.3,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C42.8,152.7,45.3,155.2,45.3,158.3z" class="cor-branco cor-js" />
                            <path d="M28.3,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C25.8,152.7,28.3,155.2,28.3,158.3z" class="cor-branco cor-js" />
                            <path d="M11.4,158.3c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C8.8,152.7,11.4,155.2,11.4,158.3z" class="cor-branco cor-js" />
                            <path d="M163.9,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,135.7,163.9,138.2,163.9,141.4z"
                            class="cor-branco cor-js" />
                            <path d="M147,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S147,138.2,147,141.4z" class="cor-branco cor-js" />
                            <path d="M130,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S130,138.2,130,141.4z" class="cor-branco cor-js" />
                            <path d="M113.1,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,135.7,113.1,138.2,113.1,141.4z"
                            class="cor-branco cor-js" />
                            <path d="M96.1,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S96.1,138.2,96.1,141.4z" class="cor-branco cor-js" />
                            <path d="M79.1,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S79.1,138.2,79.1,141.4z" class="cor-branco cor-js" />
                            <path d="M62.2,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,135.7,62.2,138.2,62.2,141.4z" class="cor-branco cor-js" />
                            <path d="M45.3,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S45.3,138.2,45.3,141.4z" class="cor-branco cor-js" />
                            <path d="M28.3,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S28.3,138.2,28.3,141.4z" class="cor-branco cor-js" />
                            <path d="M11.4,141.4c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C8.8,135.7,11.4,138.2,11.4,141.4z" class="cor-branco cor-js" />
                            <path d="M163.9,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,118.8,163.9,121.4,163.9,124.5z"
                            class="cor-branco cor-js" />
                            <path d="M147,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S147,121.4,147,124.5z" class="cor-branco cor-js" />
                            <path d="M130,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S130,121.4,130,124.5z" class="cor-branco cor-js" />
                            <path d="M113.1,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,118.8,113.1,121.4,113.1,124.5z"
                            class="cor-branco cor-js" />
                            <path d="M96.1,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S96.1,121.4,96.1,124.5z" class="cor-branco cor-js" />
                            <path d="M79.1,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S79.1,121.4,79.1,124.5z" class="cor-branco cor-js" />
                            <path d="M62.2,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,118.8,62.2,121.4,62.2,124.5z" class="cor-branco cor-js" />
                            <path d="M45.3,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S45.3,121.4,45.3,124.5z" class="cor-branco cor-js" />
                            <path d="M28.3,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S28.3,121.4,28.3,124.5z" class="cor-branco cor-js" />
                            <path d="M11.4,124.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C8.8,118.8,11.4,121.4,11.4,124.5z" class="cor-branco cor-js" />
                            <path d="M163.9,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,101.9,163.9,104.4,163.9,107.5z"
                            class="cor-branco cor-js" />
                            <path d="M147,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C144.5,101.9,147,104.4,147,107.5z" class="cor-branco cor-js" />
                            <path d="M130,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C127.5,101.9,130,104.4,130,107.5z" class="cor-branco cor-js" />
                            <path d="M113.1,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,101.9,113.1,104.4,113.1,107.5z"
                            class="cor-branco cor-js" />
                            <path d="M96.1,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C93.6,101.9,96.1,104.4,96.1,107.5z" class="cor-branco cor-js" />
                            <path d="M79.1,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C76.6,101.9,79.1,104.4,79.1,107.5z" class="cor-branco cor-js" />
                            <path d="M62.2,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,101.9,62.2,104.4,62.2,107.5z" class="cor-branco cor-js" />
                            <path d="M45.3,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C42.8,101.9,45.3,104.4,45.3,107.5z" class="cor-branco cor-js" />
                            <path d="M28.3,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C25.8,101.9,28.3,104.4,28.3,107.5z" class="cor-branco cor-js" />
                            <path d="M11.4,107.5c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C8.8,101.9,11.4,104.4,11.4,107.5z" class="cor-branco cor-js" />
                            <path d="M163.9,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,84.9,163.9,87.4,163.9,90.6z" class="cor-branco cor-js" />
                            <path d="M147,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S147,87.4,147,90.6z" class="cor-branco cor-js" />
                            <path d="M130,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S130,87.4,130,90.6z" class="cor-branco cor-js" />
                            <path d="M113.1,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,84.9,113.1,87.4,113.1,90.6z" class="cor-branco cor-js" />
                            <path d="M96.1,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S96.1,87.4,96.1,90.6z" class="cor-branco cor-js" />
                            <path d="M79.1,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S79.1,87.4,79.1,90.6z" class="cor-branco cor-js" />
                            <path d="M62.2,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,84.9,62.2,87.4,62.2,90.6z" class="cor-branco cor-js" />
                            <path d="M45.3,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S45.3,87.4,45.3,90.6z" class="cor-branco cor-js" />
                            <path d="M28.3,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S28.3,87.4,28.3,90.6z" class="cor-branco cor-js" />
                            <path d="M11.4,90.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C8.8,84.9,11.4,87.4,11.4,90.6z" class="cor-branco cor-js" />
                            <path d="M163.9,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,68,163.9,70.5,163.9,73.6z" class="cor-branco cor-js" />
                            <path d="M147,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C144.5,68,147,70.5,147,73.6z" class="cor-branco cor-js" />
                            <path d="M130,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C127.5,68,130,70.5,130,73.6z" class="cor-branco cor-js" />
                            <path d="M113.1,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,68,113.1,70.5,113.1,73.6z" class="cor-branco cor-js" />
                            <path d="M96.1,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C93.6,68,96.1,70.5,96.1,73.6z" class="cor-branco cor-js" />
                            <path d="M79.1,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C76.6,68,79.1,70.5,79.1,73.6z" class="cor-branco cor-js" />
                            <path d="M62.2,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,68,62.2,70.5,62.2,73.6z" class="cor-branco cor-js" />
                            <path d="M45.3,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C42.8,68,45.3,70.5,45.3,73.6z" class="cor-branco cor-js" />
                            <path d="M28.3,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C25.8,68,28.3,70.5,28.3,73.6z" class="cor-branco cor-js" />
                            <path d="M11.4,73.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C8.8,68,11.4,70.5,11.4,73.6z" class="cor-branco cor-js" />
                            <path d="M163.9,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,51,163.9,53.5,163.9,56.6z" class="cor-branco cor-js" />
                            <path d="M147,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C144.5,51,147,53.5,147,56.6z" class="cor-branco cor-js" />
                            <path d="M130,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C127.5,51,130,53.5,130,56.6z" class="cor-branco cor-js" />
                            <path d="M113.1,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,51,113.1,53.5,113.1,56.6z" class="cor-branco cor-js" />
                            <path d="M96.1,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C93.6,51,96.1,53.5,96.1,56.6z" class="cor-branco cor-js" />
                            <path d="M79.1,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C76.6,51,79.1,53.5,79.1,56.6z" class="cor-branco cor-js" />
                            <path d="M62.2,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,51,62.2,53.5,62.2,56.6z" class="cor-branco cor-js" />
                            <path d="M45.3,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C42.8,51,45.3,53.5,45.3,56.6z" class="cor-branco cor-js" />
                            <path d="M28.3,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C25.8,51,28.3,53.5,28.3,56.6z" class="cor-branco cor-js" />
                            <path d="M11.4,56.6c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C8.8,51,11.4,53.5,11.4,56.6z" class="cor-branco cor-js" />
                            <path d="M163.9,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,34,163.9,36.6,163.9,39.7z" class="cor-branco cor-js" />
                            <path d="M147,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S147,36.6,147,39.7z" class="cor-branco cor-js" />
                            <path d="M130,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S130,36.6,130,39.7z" class="cor-branco cor-js" />
                            <path d="M113.1,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,34,113.1,36.6,113.1,39.7z" class="cor-branco cor-js" />
                            <path d="M96.1,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S96.1,36.6,96.1,39.7z" class="cor-branco cor-js" />
                            <path d="M79.1,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S79.1,36.6,79.1,39.7z" class="cor-branco cor-js" />
                            <path d="M62.2,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,34,62.2,36.6,62.2,39.7z" class="cor-branco cor-js" />
                            <path d="M45.3,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S45.3,36.6,45.3,39.7z" class="cor-branco cor-js" />
                            <path d="M28.3,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7S28.3,36.6,28.3,39.7z" class="cor-branco cor-js" />
                            <path d="M11.4,39.7c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7C0,36.6,2.5,34,5.7,34C8.8,34,11.4,36.6,11.4,39.7z" class="cor-branco cor-js" />
                            <path d="M163.9,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,17.2,163.9,19.7,163.9,22.8z" class="cor-branco cor-js" />
                            <path d="M147,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C144.5,17.2,147,19.7,147,22.8z" class="cor-branco cor-js" />
                            <path d="M130,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C127.5,17.2,130,19.7,130,22.8z" class="cor-branco cor-js" />
                            <path d="M113.1,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,17.2,113.1,19.7,113.1,22.8z" class="cor-branco cor-js" />
                            <path d="M96.1,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C93.6,17.2,96.1,19.7,96.1,22.8z" class="cor-branco cor-js" />
                            <path d="M79.1,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C76.6,17.2,79.1,19.7,79.1,22.8z" class="cor-branco cor-js" />
                            <path d="M62.2,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,17.2,62.2,19.7,62.2,22.8z" class="cor-branco cor-js" />
                            <path d="M45.3,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C42.8,17.2,45.3,19.7,45.3,22.8z" class="cor-branco cor-js" />
                            <path d="M28.3,22.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C25.8,17.2,28.3,19.7,28.3,22.8z" class="cor-branco cor-js" />
                            <path d="M11.4,22.8c0,3.1-2.5,5.7-5.7,5.7C2.6,28.5,0,26,0,22.8c0-3.1,2.5-5.7,5.7-5.7C8.8,17.2,11.4,19.7,11.4,22.8z" class="cor-branco cor-js" />
                            <path d="M163.9,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C161.3,0.2,163.9,2.7,163.9,5.8z" class="cor-branco cor-js" />
                            <path d="M147,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C144.5,0.2,147,2.7,147,5.8z" class="cor-branco cor-js" />
                            <path d="M130,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C127.5,0.2,130,2.7,130,5.8z" class="cor-branco cor-js" />
                            <path d="M113.1,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C110.5,0.2,113.1,2.7,113.1,5.8z" class="cor-branco cor-js" />
                            <path d="M96.1,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C93.6,0.2,96.1,2.7,96.1,5.8z" class="cor-branco cor-js" />
                            <path d="M79.1,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C76.6,0.2,79.1,2.7,79.1,5.8z" class="cor-branco cor-js" />
                            <path d="M62.2,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C59.6,0.2,62.2,2.7,62.2,5.8z" class="cor-branco cor-js" />
                            <path d="M45.3,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C42.8,0.2,45.3,2.7,45.3,5.8z" class="cor-branco cor-js" />
                            <path d="M28.3,5.8c0,3.1-2.5,5.7-5.7,5.7c-3.1,0-5.7-2.5-5.7-5.7c0-3.1,2.5-5.7,5.7-5.7C25.8,0.2,28.3,2.7,28.3,5.8z" class="cor-branco cor-js" />
                            <path d="M11.4,5.8c0,3.1-2.5,5.7-5.7,5.7C2.6,11.5,0,9,0,5.8c0-3.1,2.5-5.7,5.7-5.7C8.8,0.2,11.4,2.7,11.4,5.8z" class="cor-branco cor-js" />
                          </svg>
                          <div class="progress-bar-wrapper">
                            <?php
                            $number = 0;
                            if (get_sub_field('numero')):
                              $number = get_sub_field('numero');
                            endif;
                            ?>
                            <div class="progressbar" value="<?php echo $number; ?>"></div>
                          </div>
                          <div class="progress-bar-details">
                            <span class="progress-label"></span>
                            <span class="text_percent"><?php the_sub_field('texto'); ?></span>
                          </div>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'bloco_estatisticas_digital_designer':
              ?>
              <div class="block-profissoes d-desinger2 estatisticas bg1">
                <div class="grid-cont">
                  <div class="title-block aligncenter pb-80">
                    <h2 class="title-big reset white">
                      <?php the_sub_field('titulo_grande'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <div id="pbar" class="block-graph">
                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <div class="pbar-js">
                          <div class="progress-bar-wrapper">
                            <?php
                            $number = 0;
                            if (get_sub_field('numero')):
                              $number = get_sub_field('numero');
                            endif;
                            ?>
                            <div class="progressbar" value="<?php echo $number; ?>"></div>
                          </div>
                          <div class="progress-bar-details">
                            <span class="progress-label"></span>
                            <span class="text_percent"><?php the_sub_field('texto'); ?></span>
                          </div>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                  <div id="vertical-chart" class="block-graph animated fade">
                    <svg version="1.1" class="vertical-chart-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 306 580" style="enable-background:new 0 0 306 580;" xml:space="preserve">
                      <?php
                      if (have_rows('graficos_barra')):
                        while (have_rows('graficos_barra')):
                          the_row(); ?>
                          <?php
                          $number = 0;
                          if (get_sub_field('numero')):
                            $number = get_sub_field('numero');
                          endif;
                          $initialPosition = 423;
                                  // calc percentage and get position value
                          $positionBottom = $number * $initialPosition / 100;
                          $positionTop = $initialPosition - ($number * $initialPosition / 100);
                          $formatPositionTop = number_format($positionTop, 2, '.', '');
                          $formatPositionBottom = number_format($positionBottom, 2, '.', '');
                          ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'torrado'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-toasted-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-toasted-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-toasted_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-toasted_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-toasted">
                            <g class="vertical-chart-toasted">
                              <defs>
                                <rect id="SVGID_1_" x="96.9" y="47.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_2_">
                                <use xlink:href="#SVGID_1_" />
                              </clipPath>
                              <g class="st-unique0">
                                <defs>
                                  <rect id="SVGID_3_" x="-496.4" y="-48.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_4_">
                                  <use xlink:href="#SVGID_3_" />
                                </clipPath>
                                <g class="st-unique1">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_5_" x="96.6" y="46.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_6_">
                                      <use xlink:href="#SVGID_5_" />
                                    </clipPath>
                                    <g class="st-unique2">
                                      <defs>
                                        <path id="SVGID_7_" d="M211.8,47l-8.2,3l-43.8-1.6c-3-1.7-7.8-1.7-10.8,0l-42.5,4L96.9,47v<?php echo $formatPositionBottom; ?>h0c0,1.1,0.8,2.2,2.2,3
                                          l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V47z"/>
                                        </defs>
                                        <clipPath id="SVGID_8_">
                                          <use xlink:href="#SVGID_7_" />
                                        </clipPath>
                                        <g class="st-unique3">
                                          <defs>
                                            <rect id="SVGID_9_" x="96.6" y="46.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_10_">
                                            <use xlink:href="#SVGID_9_" />
                                          </clipPath>
                                          <rect x="91.9" y="42.1" class="st-unique4" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-toasted-top">
                                <defs>
                                  <rect id="SVGID_11_" x="96.9" y="13.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_12_">
                                  <use xlink:href="#SVGID_11_" />
                                </clipPath>
                                <g class="st-unique5">
                                  <defs>
                                    <rect id="SVGID_13_" x="-496.4" y="-59.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_14_">
                                    <use xlink:href="#SVGID_13_" />
                                  </clipPath>
                                  <g class="st-unique6">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_15_" x="95.6" y="12.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_16_">
                                        <use xlink:href="#SVGID_15_" />
                                      </clipPath>
                                      <g class="st-unique7">
                                        <defs>
                                          <path id="SVGID_17_" d="M209.5,49.6l-49.8,28.6c-3,1.7-7.8,1.7-10.8,0L99.2,49.5c-3-1.7-3-4.5,0-6.2L149,14.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C212.5,45.2,212.5,47.9,209.5,49.6"/>
                                        </defs>
                                        <clipPath id="SVGID_18_">
                                          <use xlink:href="#SVGID_17_" />
                                        </clipPath>
                                        <g class="st-unique8">
                                          <defs>
                                            <rect id="SVGID_19_" x="96.6" y="13.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_20_">
                                            <use xlink:href="#SVGID_19_" />
                                          </clipPath>
                                          <rect x="91.9" y="8.4" class="st-unique9" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-toasted-top2">
                                <defs>
                                  <path id="SVGID_21_" d="M151,22.9l-37.8,21.7c-2.3,1.3-2.3,3.4,0,4.7L151,71.1c2.3,1.3,5.9,1.3,8.2,0L197,49.4
                                  c2.3-1.3,2.3-3.4,0-4.7l-37.8-21.8c-1.1-0.7-2.6-1-4.1-1C153.6,21.9,152.1,22.2,151,22.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_21_" style="fill:#DDBE07;"/>
                                <clipPath id="SVGID_22_">
                                  <use xlink:href="#SVGID_21_" />
                                </clipPath>
                                <g class="st-unique10">
                                  <defs>
                                    <rect id="SVGID_23_" x="-496.4" y="-59.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_24_">
                                    <use xlink:href="#SVGID_23_" />
                                  </clipPath>
                                  <g class="st-unique11">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_25_" x="107.6" y="18.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_26_">
                                        <use xlink:href="#SVGID_25_" />
                                      </clipPath>
                                      <g class="st-unique12">
                                        <defs>
                                          <rect id="SVGID_27_" x="155.1" y="18.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_28_">
                                          <use xlink:href="#SVGID_27_" />
                                        </clipPath>
                                        <g class="st-unique13">
                                          <defs>
                                            <rect id="SVGID_29_" x="110.6" y="21.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_30_">
                                            <use xlink:href="#SVGID_29_" />
                                          </clipPath>
                                          <rect x="150.1" y="13.9" class="st-unique14" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique12">
                                        <defs>
                                          <rect id="SVGID_31_" x="108.3" y="18.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_32_">
                                          <use xlink:href="#SVGID_31_" />
                                        </clipPath>
                                        <g class="st-unique15">
                                          <defs>
                                            <rect id="SVGID_33_" x="110.6" y="21.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_34_">
                                            <use xlink:href="#SVGID_33_" />
                                          </clipPath>
                                          <rect x="103.3" y="13.9" class="st-unique16" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique12">
                                        <defs>
                                          <rect id="SVGID_35_" x="110.6" y="21.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_36_">
                                          <use xlink:href="#SVGID_35_" />
                                        </clipPath>
                                        <g class="st-unique17">
                                          <defs>
                                            <rect id="SVGID_37_" x="121.2" y="41.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_38_">
                                            <use xlink:href="#SVGID_37_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'amarelo'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-yellow-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-yellow-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-yellow_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-yellow_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-yellow">
                            <g class="vertical-chart-yellow">
                              <defs>
                                <rect id="SVGID_39_" x="19.9" y="30.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_40_">
                                <use xlink:href="#SVGID_39_" />
                              </clipPath>
                              <g class="st-unique18">
                                <defs>
                                  <rect id="SVGID_41_" x="-573.4" y="-65.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_42_">
                                  <use xlink:href="#SVGID_41_" />
                                </clipPath>
                                <g class="st-unique19">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_43_" x="19.6" y="29.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_44_">
                                      <use xlink:href="#SVGID_43_" />
                                    </clipPath>
                                    <g class="st-unique20">
                                      <defs>
                                        <path id="SVGID_45_" d="M134.8,40.6l-8.2,6.5L82.8,31.4c-3-1.7-7.8-1.7-10.8,0L27.9,47l-7.9-6.5v<?php echo $formatPositionBottom; ?>h0c0,1.1,0.8,2.2,2.2,3
                                          l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V40.6z"/>
                                        </defs>
                                        <clipPath id="SVGID_46_">
                                          <use xlink:href="#SVGID_45_" />
                                        </clipPath>
                                        <g class="st-unique21">
                                          <defs>
                                            <rect id="SVGID_47_" x="19.6" y="29.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_48_">
                                            <use xlink:href="#SVGID_47_" />
                                          </clipPath>
                                          <rect x="14.9" y="25.1" class="st-unique22" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-yellow-top">
                                <defs>
                                  <rect id="SVGID_49_" x="19.9" y="7.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_50_">
                                  <use xlink:href="#SVGID_49_" />
                                </clipPath>
                                <g class="st-unique23">
                                  <defs>
                                    <rect id="SVGID_51_" x="-573.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_52_">
                                    <use xlink:href="#SVGID_51_" />
                                  </clipPath>
                                  <g class="st-unique24">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_53_" x="18.6" y="6.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_54_">
                                        <use xlink:href="#SVGID_53_" />
                                      </clipPath>
                                      <g class="st-unique25">
                                        <defs>
                                          <path id="SVGID_55_" d="M132.5,43.6L82.7,72.2c-3,1.7-7.8,1.7-10.8,0L22.2,43.5c-3-1.7-3-4.5,0-6.2L72,8.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C135.5,39.2,135.5,41.9,132.5,43.6"/>
                                        </defs>
                                        <clipPath id="SVGID_56_">
                                          <use xlink:href="#SVGID_55_" />
                                        </clipPath>
                                        <g class="st-unique26">
                                          <defs>
                                            <rect id="SVGID_57_" x="19.6" y="7.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_58_">
                                            <use xlink:href="#SVGID_57_" />
                                          </clipPath>
                                          <rect x="14.9" y="2.4" class="st-unique27" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-yellow-top2">
                                <defs>
                                  <path id="SVGID_59_" d="M74,16.9L36.1,38.6c-2.3,1.3-2.3,3.4,0,4.7L74,65.1c2.3,1.3,5.9,1.3,8.2,0L120,43.4
                                  c2.3-1.3,2.3-3.4,0-4.7L82.2,16.9c-1.1-0.7-2.6-1-4.1-1C76.6,15.9,75.1,16.2,74,16.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_59_" style="fill:#DDBE07;"/>
                                <clipPath id="SVGID_60_">
                                  <use xlink:href="#SVGID_59_" />
                                </clipPath>
                                <g class="st-unique28">
                                  <defs>
                                    <rect id="SVGID_61_" x="-573.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_62_">
                                    <use xlink:href="#SVGID_61_" />
                                  </clipPath>
                                  <g class="st-unique29">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_63_" x="30.6" y="12.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_64_">
                                        <use xlink:href="#SVGID_63_" />
                                      </clipPath>
                                      <g class="st-unique30">
                                        <defs>
                                          <rect id="SVGID_65_" x="78.1" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_66_">
                                          <use xlink:href="#SVGID_65_" />
                                        </clipPath>
                                        <g class="st-unique31">
                                          <defs>
                                            <rect id="SVGID_67_" x="33.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_68_">
                                            <use xlink:href="#SVGID_67_" />
                                          </clipPath>
                                          <rect x="73.1" y="7.9" class="st-unique32" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique30">
                                        <defs>
                                          <rect id="SVGID_69_" x="31.3" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_70_">
                                          <use xlink:href="#SVGID_69_" />
                                        </clipPath>
                                        <g class="st-unique33">
                                          <defs>
                                            <rect id="SVGID_71_" x="33.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_72_">
                                            <use xlink:href="#SVGID_71_" />
                                          </clipPath>
                                          <rect x="26.3" y="7.9" class="st-unique34" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique30">
                                        <defs>
                                          <rect id="SVGID_73_" x="33.6" y="15.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_74_">
                                          <use xlink:href="#SVGID_73_" />
                                        </clipPath>
                                        <g class="st-unique35">
                                          <defs>
                                            <rect id="SVGID_75_" x="44.2" y="35.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_76_">
                                            <use xlink:href="#SVGID_75_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'preto'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-black-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-black-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-black_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-black_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-black">
                            <g class="vertical-chart-black">
                              <defs>
                                <rect id="SVGID_77_" x="179.9" y="30.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_78_">
                                <use xlink:href="#SVGID_77_" />
                              </clipPath>
                              <g class="st-unique36">
                                <defs>
                                  <rect id="SVGID_79_" x="-413.4" y="-65.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_80_">
                                  <use xlink:href="#SVGID_79_" />
                                </clipPath>
                                <g class="st-unique37">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_81_" x="179.6" y="29.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_82_">
                                      <use xlink:href="#SVGID_81_" />
                                    </clipPath>
                                    <g class="st-unique38">
                                      <defs>
                                        <path id="SVGID_83_" d="M294.8,40.6l-8.2,6.5l-43.8-15.6c-3-1.7-7.8-1.7-10.8,0L187.9,47l-7.9-6.5v<?php echo $formatPositionBottom; ?>h0
                                          c0,1.1,0.8,2.2,2.2,3l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V40.6z"/>
                                        </defs>
                                        <clipPath id="SVGID_84_">
                                          <use xlink:href="#SVGID_83_" />
                                        </clipPath>
                                        <g class="st-unique39">
                                          <defs>
                                            <rect id="SVGID_85_" x="179.6" y="29.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_86_">
                                            <use xlink:href="#SVGID_85_" />
                                          </clipPath>
                                          <rect x="174.9" y="25.1" class="st-unique40" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-black-top">
                                <defs>
                                  <rect id="SVGID_87_" x="179.9" y="7.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_88_">
                                  <use xlink:href="#SVGID_87_" />
                                </clipPath>
                                <g class="st-unique41">
                                  <defs>
                                    <rect id="SVGID_89_" x="-413.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_90_">
                                    <use xlink:href="#SVGID_89_" />
                                  </clipPath>
                                  <g class="st-unique42">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_91_" x="178.6" y="6.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_92_">
                                        <use xlink:href="#SVGID_91_" />
                                      </clipPath>
                                      <g class="st-unique43">
                                        <defs>
                                          <path id="SVGID_93_" d="M292.5,43.6l-49.8,28.6c-3,1.7-7.8,1.7-10.8,0l-49.8-28.7c-3-1.7-3-4.5,0-6.2L232,8.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C295.5,39.2,295.5,41.9,292.5,43.6"/>
                                        </defs>
                                        <clipPath id="SVGID_94_">
                                          <use xlink:href="#SVGID_93_" />
                                        </clipPath>
                                        <g class="st-unique44">
                                          <defs>
                                            <rect id="SVGID_95_" x="179.6" y="7.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_96_">
                                            <use xlink:href="#SVGID_95_" />
                                          </clipPath>
                                          <rect x="174.9" y="2.4" class="st-unique45" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-black-top2">
                                <defs>
                                  <path id="SVGID_97_" d="M234,16.9l-37.8,21.7c-2.3,1.3-2.3,3.4,0,4.7L234,65.1c2.3,1.3,5.9,1.3,8.2,0L280,43.4
                                  c2.3-1.3,2.3-3.4,0-4.7l-37.8-21.8c-1.1-0.7-2.6-1-4.1-1C236.6,15.9,235.1,16.2,234,16.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_97_" style="fill:#343535;"/>
                                <clipPath id="SVGID_98_">
                                  <use xlink:href="#SVGID_97_" />
                                </clipPath>
                                <g class="st-unique46">
                                  <defs>
                                    <rect id="SVGID_99_" x="-413.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_100_">
                                    <use xlink:href="#SVGID_99_" />
                                  </clipPath>
                                  <g class="st-unique47">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_101_" x="190.6" y="12.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_102_">
                                        <use xlink:href="#SVGID_101_" />
                                      </clipPath>
                                      <g class="st-unique48">
                                        <defs>
                                          <rect id="SVGID_103_" x="238.1" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_104_">
                                          <use xlink:href="#SVGID_103_" />
                                        </clipPath>
                                        <g class="st-unique49">
                                          <defs>
                                            <rect id="SVGID_105_" x="193.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_106_">
                                            <use xlink:href="#SVGID_105_" />
                                          </clipPath>
                                          <rect x="233.1" y="7.9" class="st-unique50" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique48">
                                        <defs>
                                          <rect id="SVGID_107_" x="191.3" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_108_">
                                          <use xlink:href="#SVGID_107_" />
                                        </clipPath>
                                        <g class="st-unique51">
                                          <defs>
                                            <rect id="SVGID_109_" x="193.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_110_">
                                            <use xlink:href="#SVGID_109_" />
                                          </clipPath>
                                          <rect x="186.3" y="7.9" class="st-unique52" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique48">
                                        <defs>
                                          <rect id="SVGID_111_" x="193.6" y="15.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_112_">
                                          <use xlink:href="#SVGID_111_" />
                                        </clipPath>
                                        <g class="st-unique53">
                                          <defs>
                                            <rect id="SVGID_113_" x="204.2" y="35.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_114_">
                                            <use xlink:href="#SVGID_113_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'cinza'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-gray-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-gray-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-gray_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-gray_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-gray">
                            <g class="vertical-chart-gray">
                              <defs>
                                <rect id="SVGID_115_" x="98.9" y="64.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_116_">
                                <use xlink:href="#SVGID_115_" />
                              </clipPath>
                              <g class="st-unique54">
                                <defs>
                                  <rect id="SVGID_117_" x="-494.4" y="-31.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_118_">
                                  <use xlink:href="#SVGID_117_" />
                                </clipPath>
                                <g class="st-unique55">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_119_" x="98.6" y="63.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_120_">
                                      <use xlink:href="#SVGID_119_" />
                                    </clipPath>
                                    <g class="st-unique56">
                                      <defs>
                                        <path id="SVGID_121_" d="M213.8,74.6l-8.2,6.5l-43.8-15.6c-3-1.7-7.8-1.7-10.8,0L106.9,81l-7.9-6.5v<?php echo $formatPositionBottom; ?>h0
                                          c0,1.1,0.8,2.2,2.2,3l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V74.6z"/>
                                        </defs>
                                        <clipPath id="SVGID_122_">
                                          <use xlink:href="#SVGID_121_" />
                                        </clipPath>
                                        <g class="st-unique57">
                                          <defs>
                                            <rect id="SVGID_123_" x="98.6" y="63.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_124_">
                                            <use xlink:href="#SVGID_123_" />
                                          </clipPath>
                                          <rect x="93.9" y="59.1" class="st-unique58" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-gray-top">
                                <defs>
                                  <rect id="SVGID_125_" x="98.9" y="41.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_126_">
                                  <use xlink:href="#SVGID_125_" />
                                </clipPath>
                                <g class="st-unique59">
                                  <defs>
                                    <rect id="SVGID_127_" x="-494.4" y="-31.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_128_">
                                    <use xlink:href="#SVGID_127_" />
                                  </clipPath>
                                  <g class="st-unique60">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_129_" x="97.6" y="40.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_130_">
                                        <use xlink:href="#SVGID_129_" />
                                      </clipPath>
                                      <g class="st-unique61">
                                        <defs>
                                          <path id="SVGID_131_" d="M211.5,77.6l-49.8,28.6c-3,1.7-7.8,1.7-10.8,0l-49.8-28.7c-3-1.7-3-4.5,0-6.2L151,42.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C214.5,73.2,214.5,75.9,211.5,77.6"/>
                                        </defs>
                                        <clipPath id="SVGID_132_">
                                          <use xlink:href="#SVGID_131_" />
                                        </clipPath>
                                        <g class="st-unique62">
                                          <defs>
                                            <rect id="SVGID_133_" x="98.6" y="41.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_134_">
                                            <use xlink:href="#SVGID_133_" />
                                          </clipPath>
                                          <rect x="93.9" y="36.4" class="st-unique63" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-gray-top2">
                                <defs>
                                  <path id="SVGID_135_" d="M153,50.9l-37.8,21.7c-2.3,1.3-2.3,3.4,0,4.7L153,99.1c2.3,1.3,5.9,1.3,8.2,0L199,77.4
                                  c2.3-1.3,2.3-3.4,0-4.7l-37.8-21.8c-1.1-0.7-2.6-1-4.1-1C155.6,49.9,154.1,50.2,153,50.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_135_" style="fill:#b5b3c1;"/>
                                <clipPath id="SVGID_136_">
                                  <use xlink:href="#SVGID_135_" />
                                </clipPath>
                                <g class="st-unique64">
                                  <defs>
                                    <rect id="SVGID_137_" x="-494.4" y="-31.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_138_">
                                    <use xlink:href="#SVGID_137_" />
                                  </clipPath>
                                  <g class="st-unique65">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_139_" x="109.6" y="46.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_140_">
                                        <use xlink:href="#SVGID_139_" />
                                      </clipPath>
                                      <g class="st-unique66">
                                        <defs>
                                          <rect id="SVGID_141_" x="157.1" y="46.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_142_">
                                          <use xlink:href="#SVGID_141_" />
                                        </clipPath>
                                        <g class="st-unique67">
                                          <defs>
                                            <rect id="SVGID_143_" x="112.6" y="49.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_144_">
                                            <use xlink:href="#SVGID_143_" />
                                          </clipPath>
                                          <rect x="152.1" y="41.9" class="st-unique68" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique66">
                                        <defs>
                                          <rect id="SVGID_145_" x="110.3" y="46.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_146_">
                                          <use xlink:href="#SVGID_145_" />
                                        </clipPath>
                                        <g class="st-unique69">
                                          <defs>
                                            <rect id="SVGID_147_" x="112.6" y="49.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_148_">
                                            <use xlink:href="#SVGID_147_" />
                                          </clipPath>
                                          <rect x="105.3" y="41.9" class="st-unique70" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique66">
                                        <defs>
                                          <rect id="SVGID_149_" x="112.6" y="49.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_150_">
                                          <use xlink:href="#SVGID_149_" />
                                        </clipPath>
                                        <g class="st-unique71">
                                          <defs>
                                            <rect id="SVGID_151_" x="123.2" y="69.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_152_">
                                            <use xlink:href="#SVGID_151_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </svg>
                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'amarelo'): ?>
                          <div class="text-top-left text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'torrado'): ?>
                          <div class="text-top-right text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'cinza'): ?>
                          <div class="text-bottom-left text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'preto'): ?>
                          <div class="text-bottom-right text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent text-js fade animated">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'bloco_estatisticas_barras_verticais':
              ?>
              <div class="block-profissoes barras-verticais estatisticas bg1">
                <div class="grid-cont">
                  <div class="title-block aligncenter pb-80">
                    <h2 class="title-big reset white">
                      <?php the_sub_field('titulo_grande'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <div id="pbar" class="block-graph pb-40">
                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <div class="pbar-js">
                          <div class="progress-bar-wrapper">
                            <?php
                            $number = 0;
                            if (get_sub_field('numero')):
                              $number = get_sub_field('numero');
                            endif;
                            ?>
                            <div class="progressbar" value="<?php echo $number; ?>"></div>
                          </div>
                          <div class="progress-bar-details">
                            <span class="progress-label"></span>
                            <span class="text_percent"><?php the_sub_field('texto'); ?></span>
                          </div>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                  <div id="vertical-chart" class="block-graph animated fade">
                    <svg version="1.1" class="vertical-chart-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 306 580" style="enable-background:new 0 0 306 580;" xml:space="preserve">
                      <?php
                      if (have_rows('graficos_barra')):
                        while (have_rows('graficos_barra')):
                          the_row(); ?>
                          <?php
                          $number = 0;
                          if (get_sub_field('numero')):
                            $number = get_sub_field('numero');
                          endif;
                          $initialPosition = 423;
                                  // calc percentage and get position value
                          $positionBottom = $number * $initialPosition / 100;
                          $positionTop = $initialPosition - ($number * $initialPosition / 100);
                          $formatPositionTop = number_format($positionTop, 2, '.', '');
                          $formatPositionBottom = number_format($positionBottom, 2, '.', '');
                          ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'torrado'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-toasted-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-toasted-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-toasted_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-toasted_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-toasted">
                            <g class="vertical-chart-toasted">
                              <defs>
                                <rect id="SVGID_1_" x="96.9" y="47.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_2_">
                                <use xlink:href="#SVGID_1_" />
                              </clipPath>
                              <g class="st-unique0">
                                <defs>
                                  <rect id="SVGID_3_" x="-496.4" y="-48.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_4_">
                                  <use xlink:href="#SVGID_3_" />
                                </clipPath>
                                <g class="st-unique1">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_5_" x="96.6" y="46.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_6_">
                                      <use xlink:href="#SVGID_5_" />
                                    </clipPath>
                                    <g class="st-unique2">
                                      <defs>
                                        <path id="SVGID_7_" d="M211.8,47l-8.2,3l-43.8-1.6c-3-1.7-7.8-1.7-10.8,0l-42.5,4L96.9,47v<?php echo $formatPositionBottom; ?>h0c0,1.1,0.8,2.2,2.2,3
                                          l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V47z"/>
                                        </defs>
                                        <clipPath id="SVGID_8_">
                                          <use xlink:href="#SVGID_7_" />
                                        </clipPath>
                                        <g class="st-unique3">
                                          <defs>
                                            <rect id="SVGID_9_" x="96.6" y="46.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_10_">
                                            <use xlink:href="#SVGID_9_" />
                                          </clipPath>
                                          <rect x="91.9" y="42.1" class="st-unique4" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-toasted-top">
                                <defs>
                                  <rect id="SVGID_11_" x="96.9" y="13.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_12_">
                                  <use xlink:href="#SVGID_11_" />
                                </clipPath>
                                <g class="st-unique5">
                                  <defs>
                                    <rect id="SVGID_13_" x="-496.4" y="-59.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_14_">
                                    <use xlink:href="#SVGID_13_" />
                                  </clipPath>
                                  <g class="st-unique6">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_15_" x="95.6" y="12.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_16_">
                                        <use xlink:href="#SVGID_15_" />
                                      </clipPath>
                                      <g class="st-unique7">
                                        <defs>
                                          <path id="SVGID_17_" d="M209.5,49.6l-49.8,28.6c-3,1.7-7.8,1.7-10.8,0L99.2,49.5c-3-1.7-3-4.5,0-6.2L149,14.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C212.5,45.2,212.5,47.9,209.5,49.6"/>
                                        </defs>
                                        <clipPath id="SVGID_18_">
                                          <use xlink:href="#SVGID_17_" />
                                        </clipPath>
                                        <g class="st-unique8">
                                          <defs>
                                            <rect id="SVGID_19_" x="96.6" y="13.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_20_">
                                            <use xlink:href="#SVGID_19_" />
                                          </clipPath>
                                          <rect x="91.9" y="8.4" class="st-unique9" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-toasted-top2">
                                <defs>
                                  <path id="SVGID_21_" d="M151,22.9l-37.8,21.7c-2.3,1.3-2.3,3.4,0,4.7L151,71.1c2.3,1.3,5.9,1.3,8.2,0L197,49.4
                                  c2.3-1.3,2.3-3.4,0-4.7l-37.8-21.8c-1.1-0.7-2.6-1-4.1-1C153.6,21.9,152.1,22.2,151,22.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_21_" style="fill:#DDBE07;"/>
                                <clipPath id="SVGID_22_">
                                  <use xlink:href="#SVGID_21_" />
                                </clipPath>
                                <g class="st-unique10">
                                  <defs>
                                    <rect id="SVGID_23_" x="-496.4" y="-59.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_24_">
                                    <use xlink:href="#SVGID_23_" />
                                  </clipPath>
                                  <g class="st-unique11">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_25_" x="107.6" y="18.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_26_">
                                        <use xlink:href="#SVGID_25_" />
                                      </clipPath>
                                      <g class="st-unique12">
                                        <defs>
                                          <rect id="SVGID_27_" x="155.1" y="18.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_28_">
                                          <use xlink:href="#SVGID_27_" />
                                        </clipPath>
                                        <g class="st-unique13">
                                          <defs>
                                            <rect id="SVGID_29_" x="110.6" y="21.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_30_">
                                            <use xlink:href="#SVGID_29_" />
                                          </clipPath>
                                          <rect x="150.1" y="13.9" class="st-unique14" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique12">
                                        <defs>
                                          <rect id="SVGID_31_" x="108.3" y="18.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_32_">
                                          <use xlink:href="#SVGID_31_" />
                                        </clipPath>
                                        <g class="st-unique15">
                                          <defs>
                                            <rect id="SVGID_33_" x="110.6" y="21.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_34_">
                                            <use xlink:href="#SVGID_33_" />
                                          </clipPath>
                                          <rect x="103.3" y="13.9" class="st-unique16" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique12">
                                        <defs>
                                          <rect id="SVGID_35_" x="110.6" y="21.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_36_">
                                          <use xlink:href="#SVGID_35_" />
                                        </clipPath>
                                        <g class="st-unique17">
                                          <defs>
                                            <rect id="SVGID_37_" x="121.2" y="41.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_38_">
                                            <use xlink:href="#SVGID_37_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'amarelo'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-yellow-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-yellow-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-yellow_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-yellow_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-yellow">
                            <g class="vertical-chart-yellow">
                              <defs>
                                <rect id="SVGID_39_" x="19.9" y="30.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_40_">
                                <use xlink:href="#SVGID_39_" />
                              </clipPath>
                              <g class="st-unique18">
                                <defs>
                                  <rect id="SVGID_41_" x="-573.4" y="-65.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_42_">
                                  <use xlink:href="#SVGID_41_" />
                                </clipPath>
                                <g class="st-unique19">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_43_" x="19.6" y="29.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_44_">
                                      <use xlink:href="#SVGID_43_" />
                                    </clipPath>
                                    <g class="st-unique20">
                                      <defs>
                                        <path id="SVGID_45_" d="M134.8,40.6l-8.2,6.5L82.8,31.4c-3-1.7-7.8-1.7-10.8,0L27.9,47l-7.9-6.5v<?php echo $formatPositionBottom; ?>h0c0,1.1,0.8,2.2,2.2,3
                                          l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V40.6z"/>
                                        </defs>
                                        <clipPath id="SVGID_46_">
                                          <use xlink:href="#SVGID_45_" />
                                        </clipPath>
                                        <g class="st-unique21">
                                          <defs>
                                            <rect id="SVGID_47_" x="19.6" y="29.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_48_">
                                            <use xlink:href="#SVGID_47_" />
                                          </clipPath>
                                          <rect x="14.9" y="25.1" class="st-unique22" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-yellow-top">
                                <defs>
                                  <rect id="SVGID_49_" x="19.9" y="7.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_50_">
                                  <use xlink:href="#SVGID_49_" />
                                </clipPath>
                                <g class="st-unique23">
                                  <defs>
                                    <rect id="SVGID_51_" x="-573.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_52_">
                                    <use xlink:href="#SVGID_51_" />
                                  </clipPath>
                                  <g class="st-unique24">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_53_" x="18.6" y="6.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_54_">
                                        <use xlink:href="#SVGID_53_" />
                                      </clipPath>
                                      <g class="st-unique25">
                                        <defs>
                                          <path id="SVGID_55_" d="M132.5,43.6L82.7,72.2c-3,1.7-7.8,1.7-10.8,0L22.2,43.5c-3-1.7-3-4.5,0-6.2L72,8.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C135.5,39.2,135.5,41.9,132.5,43.6"/>
                                        </defs>
                                        <clipPath id="SVGID_56_">
                                          <use xlink:href="#SVGID_55_" />
                                        </clipPath>
                                        <g class="st-unique26">
                                          <defs>
                                            <rect id="SVGID_57_" x="19.6" y="7.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_58_">
                                            <use xlink:href="#SVGID_57_" />
                                          </clipPath>
                                          <rect x="14.9" y="2.4" class="st-unique27" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-yellow-top2">
                                <defs>
                                  <path id="SVGID_59_" d="M74,16.9L36.1,38.6c-2.3,1.3-2.3,3.4,0,4.7L74,65.1c2.3,1.3,5.9,1.3,8.2,0L120,43.4
                                  c2.3-1.3,2.3-3.4,0-4.7L82.2,16.9c-1.1-0.7-2.6-1-4.1-1C76.6,15.9,75.1,16.2,74,16.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_59_" style="fill:#DDBE07;"/>
                                <clipPath id="SVGID_60_">
                                  <use xlink:href="#SVGID_59_" />
                                </clipPath>
                                <g class="st-unique28">
                                  <defs>
                                    <rect id="SVGID_61_" x="-573.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_62_">
                                    <use xlink:href="#SVGID_61_" />
                                  </clipPath>
                                  <g class="st-unique29">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_63_" x="30.6" y="12.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_64_">
                                        <use xlink:href="#SVGID_63_" />
                                      </clipPath>
                                      <g class="st-unique30">
                                        <defs>
                                          <rect id="SVGID_65_" x="78.1" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_66_">
                                          <use xlink:href="#SVGID_65_" />
                                        </clipPath>
                                        <g class="st-unique31">
                                          <defs>
                                            <rect id="SVGID_67_" x="33.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_68_">
                                            <use xlink:href="#SVGID_67_" />
                                          </clipPath>
                                          <rect x="73.1" y="7.9" class="st-unique32" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique30">
                                        <defs>
                                          <rect id="SVGID_69_" x="31.3" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_70_">
                                          <use xlink:href="#SVGID_69_" />
                                        </clipPath>
                                        <g class="st-unique33">
                                          <defs>
                                            <rect id="SVGID_71_" x="33.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_72_">
                                            <use xlink:href="#SVGID_71_" />
                                          </clipPath>
                                          <rect x="26.3" y="7.9" class="st-unique34" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique30">
                                        <defs>
                                          <rect id="SVGID_73_" x="33.6" y="15.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_74_">
                                          <use xlink:href="#SVGID_73_" />
                                        </clipPath>
                                        <g class="st-unique35">
                                          <defs>
                                            <rect id="SVGID_75_" x="44.2" y="35.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_76_">
                                            <use xlink:href="#SVGID_75_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'preto'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-black-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-black-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-black_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-black_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-black">
                            <g class="vertical-chart-black">
                              <defs>
                                <rect id="SVGID_77_" x="179.9" y="30.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_78_">
                                <use xlink:href="#SVGID_77_" />
                              </clipPath>
                              <g class="st-unique36">
                                <defs>
                                  <rect id="SVGID_79_" x="-413.4" y="-65.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_80_">
                                  <use xlink:href="#SVGID_79_" />
                                </clipPath>
                                <g class="st-unique37">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_81_" x="179.6" y="29.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_82_">
                                      <use xlink:href="#SVGID_81_" />
                                    </clipPath>
                                    <g class="st-unique38">
                                      <defs>
                                        <path id="SVGID_83_" d="M294.8,40.6l-8.2,6.5l-43.8-15.6c-3-1.7-7.8-1.7-10.8,0L187.9,47l-7.9-6.5v<?php echo $formatPositionBottom; ?>h0
                                          c0,1.1,0.8,2.2,2.2,3l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V40.6z"/>
                                        </defs>
                                        <clipPath id="SVGID_84_">
                                          <use xlink:href="#SVGID_83_" />
                                        </clipPath>
                                        <g class="st-unique39">
                                          <defs>
                                            <rect id="SVGID_85_" x="179.6" y="29.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_86_">
                                            <use xlink:href="#SVGID_85_" />
                                          </clipPath>
                                          <rect x="174.9" y="25.1" class="st-unique40" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-black-top">
                                <defs>
                                  <rect id="SVGID_87_" x="179.9" y="7.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_88_">
                                  <use xlink:href="#SVGID_87_" />
                                </clipPath>
                                <g class="st-unique41">
                                  <defs>
                                    <rect id="SVGID_89_" x="-413.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_90_">
                                    <use xlink:href="#SVGID_89_" />
                                  </clipPath>
                                  <g class="st-unique42">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_91_" x="178.6" y="6.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_92_">
                                        <use xlink:href="#SVGID_91_" />
                                      </clipPath>
                                      <g class="st-unique43">
                                        <defs>
                                          <path id="SVGID_93_" d="M292.5,43.6l-49.8,28.6c-3,1.7-7.8,1.7-10.8,0l-49.8-28.7c-3-1.7-3-4.5,0-6.2L232,8.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C295.5,39.2,295.5,41.9,292.5,43.6"/>
                                        </defs>
                                        <clipPath id="SVGID_94_">
                                          <use xlink:href="#SVGID_93_" />
                                        </clipPath>
                                        <g class="st-unique44">
                                          <defs>
                                            <rect id="SVGID_95_" x="179.6" y="7.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_96_">
                                            <use xlink:href="#SVGID_95_" />
                                          </clipPath>
                                          <rect x="174.9" y="2.4" class="st-unique45" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-black-top2">
                                <defs>
                                  <path id="SVGID_97_" d="M234,16.9l-37.8,21.7c-2.3,1.3-2.3,3.4,0,4.7L234,65.1c2.3,1.3,5.9,1.3,8.2,0L280,43.4
                                  c2.3-1.3,2.3-3.4,0-4.7l-37.8-21.8c-1.1-0.7-2.6-1-4.1-1C236.6,15.9,235.1,16.2,234,16.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_97_" style="fill:#343535;"/>
                                <clipPath id="SVGID_98_">
                                  <use xlink:href="#SVGID_97_" />
                                </clipPath>
                                <g class="st-unique46">
                                  <defs>
                                    <rect id="SVGID_99_" x="-413.4" y="-65.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_100_">
                                    <use xlink:href="#SVGID_99_" />
                                  </clipPath>
                                  <g class="st-unique47">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_101_" x="190.6" y="12.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_102_">
                                        <use xlink:href="#SVGID_101_" />
                                      </clipPath>
                                      <g class="st-unique48">
                                        <defs>
                                          <rect id="SVGID_103_" x="238.1" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_104_">
                                          <use xlink:href="#SVGID_103_" />
                                        </clipPath>
                                        <g class="st-unique49">
                                          <defs>
                                            <rect id="SVGID_105_" x="193.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_106_">
                                            <use xlink:href="#SVGID_105_" />
                                          </clipPath>
                                          <rect x="233.1" y="7.9" class="st-unique50" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique48">
                                        <defs>
                                          <rect id="SVGID_107_" x="191.3" y="12.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_108_">
                                          <use xlink:href="#SVGID_107_" />
                                        </clipPath>
                                        <g class="st-unique51">
                                          <defs>
                                            <rect id="SVGID_109_" x="193.6" y="15.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_110_">
                                            <use xlink:href="#SVGID_109_" />
                                          </clipPath>
                                          <rect x="186.3" y="7.9" class="st-unique52" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique48">
                                        <defs>
                                          <rect id="SVGID_111_" x="193.6" y="15.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_112_">
                                          <use xlink:href="#SVGID_111_" />
                                        </clipPath>
                                        <g class="st-unique53">
                                          <defs>
                                            <rect id="SVGID_113_" x="204.2" y="35.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_114_">
                                            <use xlink:href="#SVGID_113_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php if (get_sub_field('tipo_de_barra') == 'cinza'): ?>
                            <style type="text/css">
                            @-webkit-keyframes vertical-chart-gray-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-gray-top_Animation{
                              0%{
                                -webkit-transform: translate(0px, 500px);
                                transform: translate(0px, 500px);
                              }
                              33.33%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                                transform: translate(0px, <?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @-webkit-keyframes vertical-chart-gray_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                            @keyframes vertical-chart-gray_Animation{
                              0%{
                                -webkit-transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 0) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              33.33%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                              100%{
                                -webkit-transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                                transform: scale(1, 1) translateY(<?php echo $formatPositionTop.'px' ?>);
                              }
                            }
                          </style>
                          <g id="chart-gray">
                            <g class="vertical-chart-gray">
                              <defs>
                                <rect id="SVGID_115_" x="98.9" y="64.1" width="114.8" height="506.4"/>
                              </defs>
                              <clipPath id="SVGID_116_">
                                <use xlink:href="#SVGID_115_" />
                              </clipPath>
                              <g class="st-unique54">
                                <defs>
                                  <rect id="SVGID_117_" x="-494.4" y="-31.8" width="1200" height="900"/>
                                </defs>
                                <clipPath id="SVGID_118_">
                                  <use xlink:href="#SVGID_117_" />
                                </clipPath>
                                <g class="st-unique55">
                                  <g>
                                    <defs>
                                      <rect id="SVGID_119_" x="98.6" y="63.2" width="116" height="508"/>
                                    </defs>
                                    <clipPath id="SVGID_120_">
                                      <use xlink:href="#SVGID_119_" />
                                    </clipPath>
                                    <g class="st-unique56">
                                      <defs>
                                        <path id="SVGID_121_" d="M213.8,74.6l-8.2,6.5l-43.8-15.6c-3-1.7-7.8-1.7-10.8,0L106.9,81l-7.9-6.5v<?php echo $formatPositionBottom; ?>h0
                                          c0,1.1,0.8,2.2,2.2,3l49.8,28.7c3,1.7,7.8,1.7,10.8,0l49.8-28.6c1.5-0.9,2.3-2,2.2-3.2h0V74.6z"/>
                                        </defs>
                                        <clipPath id="SVGID_122_">
                                          <use xlink:href="#SVGID_121_" />
                                        </clipPath>
                                        <g class="st-unique57">
                                          <defs>
                                            <rect id="SVGID_123_" x="98.6" y="63.2" width="116" height="508"/>
                                          </defs>
                                          <clipPath id="SVGID_124_">
                                            <use xlink:href="#SVGID_123_" />
                                          </clipPath>
                                          <rect x="93.9" y="59.1" class="st-unique58" width="124.8" height="516.4"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-gray-top">
                                <defs>
                                  <rect id="SVGID_125_" x="98.9" y="41.4" width="114.8" height="66.1"/>
                                </defs>
                                <clipPath id="SVGID_126_">
                                  <use xlink:href="#SVGID_125_" />
                                </clipPath>
                                <g class="st-unique59">
                                  <defs>
                                    <rect id="SVGID_127_" x="-494.4" y="-31.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_128_">
                                    <use xlink:href="#SVGID_127_" />
                                  </clipPath>
                                  <g class="st-unique60">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_129_" x="97.6" y="40.2" width="117" height="68"/>
                                      </defs>
                                      <clipPath id="SVGID_130_">
                                        <use xlink:href="#SVGID_129_" />
                                      </clipPath>
                                      <g class="st-unique61">
                                        <defs>
                                          <path id="SVGID_131_" d="M211.5,77.6l-49.8,28.6c-3,1.7-7.8,1.7-10.8,0l-49.8-28.7c-3-1.7-3-4.5,0-6.2L151,42.7
                                          c3-1.7,7.8-1.7,10.8,0l49.8,28.7C214.5,73.2,214.5,75.9,211.5,77.6"/>
                                        </defs>
                                        <clipPath id="SVGID_132_">
                                          <use xlink:href="#SVGID_131_" />
                                        </clipPath>
                                        <g class="st-unique62">
                                          <defs>
                                            <rect id="SVGID_133_" x="98.6" y="41.2" width="116" height="67"/>
                                          </defs>
                                          <clipPath id="SVGID_134_">
                                            <use xlink:href="#SVGID_133_" />
                                          </clipPath>
                                          <rect x="93.9" y="36.4" class="st-unique63" width="124.8" height="76.1"/>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                              <g class="vertical-chart-gray-top2">
                                <defs>
                                  <path id="SVGID_135_" d="M153,50.9l-37.8,21.7c-2.3,1.3-2.3,3.4,0,4.7L153,99.1c2.3,1.3,5.9,1.3,8.2,0L199,77.4
                                  c2.3-1.3,2.3-3.4,0-4.7l-37.8-21.8c-1.1-0.7-2.6-1-4.1-1C155.6,49.9,154.1,50.2,153,50.9z"/>
                                </defs>
                                <use xlink:href="#SVGID_135_" style="fill:#b5b3c1;"/>
                                <clipPath id="SVGID_136_">
                                  <use xlink:href="#SVGID_135_" />
                                </clipPath>
                                <g class="st-unique64">
                                  <defs>
                                    <rect id="SVGID_137_" x="-494.4" y="-31.8" width="1200" height="900"/>
                                  </defs>
                                  <clipPath id="SVGID_138_">
                                    <use xlink:href="#SVGID_137_" />
                                  </clipPath>
                                  <g class="st-unique65">
                                    <g>
                                      <defs>
                                        <rect id="SVGID_139_" x="109.6" y="46.2" width="95" height="75"/>
                                      </defs>
                                      <clipPath id="SVGID_140_">
                                        <use xlink:href="#SVGID_139_" />
                                      </clipPath>
                                      <g class="st-unique66">
                                        <defs>
                                          <rect id="SVGID_141_" x="157.1" y="46.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_142_">
                                          <use xlink:href="#SVGID_141_" />
                                        </clipPath>
                                        <g class="st-unique67">
                                          <defs>
                                            <rect id="SVGID_143_" x="112.6" y="49.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_144_">
                                            <use xlink:href="#SVGID_143_" />
                                          </clipPath>
                                          <rect x="152.1" y="41.9" class="st-unique68" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique66">
                                        <defs>
                                          <rect id="SVGID_145_" x="110.3" y="46.9" width="46.8" height="66.1"/>
                                        </defs>
                                        <clipPath id="SVGID_146_">
                                          <use xlink:href="#SVGID_145_" />
                                        </clipPath>
                                        <g class="st-unique69">
                                          <defs>
                                            <rect id="SVGID_147_" x="112.6" y="49.2" width="89" height="52"/>
                                          </defs>
                                          <clipPath id="SVGID_148_">
                                            <use xlink:href="#SVGID_147_" />
                                          </clipPath>
                                          <rect x="105.3" y="41.9" class="st-unique70" width="56.8" height="76.1"/>
                                        </g>
                                      </g>
                                      <g class="st-unique66">
                                        <defs>
                                          <rect id="SVGID_149_" x="112.6" y="49.2" width="89" height="52"/>
                                        </defs>
                                        <clipPath id="SVGID_150_">
                                          <use xlink:href="#SVGID_149_" />
                                        </clipPath>
                                        <g class="st-unique71">
                                          <defs>
                                            <rect id="SVGID_151_" x="123.2" y="69.8" width="69" height="51"/>
                                          </defs>
                                          <clipPath id="SVGID_152_">
                                            <use xlink:href="#SVGID_151_" />
                                          </clipPath>
                                        </g>
                                      </g>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </g>
                          <?php endif; ?>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </svg>
                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'torrado'): ?>
                          <div class="text-top-left text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'cinza'): ?>
                          <div class="text-top-right text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'amarelo'): ?>
                          <div class="text-top-left text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'preto'): ?>
                          <div class="text-bottom-right text-js fade animated animation-delay-800">
                            <span class="progress-label">
                              <?php  if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent text-js fade animated">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'bloco_estatisticas_front_end_developer':
              ?>
              <div class="block-profissoes fwd estatisticas bg1">
                <div class="grid-cont">
                  <div class="title-block aligncenter pb-80">
                    <h2 class="title-big reset white">
                      <?php the_sub_field('titulo_grande'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <div id="pbar" class="block-graph">
                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <div class="pbar-js">
                          <div class="progress-bar-wrapper">
                            <?php
                            $number = 0;
                            if (get_sub_field('numero')):
                              $number = get_sub_field('numero');
                            endif;
                            ?>
                            <div class="progressbar" value="<?php echo $number; ?>"></div>
                          </div>
                          <div class="progress-bar-details">
                            <span class="progress-label"></span>
                            <span class="text_percent"><?php the_sub_field('texto'); ?></span>
                          </div>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                  <div id="front-end-circles" class="container-circle pt-60">

                    <div class="circle-fwd z-index3">
                      <svg class="circle-animation animated fade" width="347px" height="406px" viewBox="0 0 347 406" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g id="frontend-03" transform="translate(-3.000000, -4.000000)">
                            <g id="circle-gray" transform="translate(0.000000, 62.000000)">
                              <g id="Group" transform="translate(3.000000, 13.000000)" fill-rule="nonzero">
                                <path d="M18.7,116 L3.6,116.3 C1.9,116.3 0.9,115.7 0.8,114.6 C1.8,121.6 2.7,128.6 3.7,135.5 C3.8,136.5 4.9,137.2 6.5,137.2 L21.6,136.9 L18.7,116 Z" id="Shape" fill="#919099"></path>
                                <path d="M223.5,102 C218.4,65.2 183.9,37.4 142.1,38.3 L145,59.2 C186.8,58.3 221.3,86.2 226.4,122.9 L223.5,102 Z" id="Shape" fill="#919099"></path>
                                <path d="M79.7,133.9 C79.7,133.7 79.7,133.5 79.7,133.4 C78.7,126.4 77.8,119.4 76.8,112.5 C76.8,112.7 76.8,112.9 76.8,113 C76.8,113.1 76.8,113.2 76.7,113.3 L76.7,113.4 C76.7,113.5 76.6,113.7 76.5,113.8 C76.4,113.9 76.3,114 76.2,114.1 L76.1,114.2 C76,114.3 75.9,114.3 75.8,114.4 C75.7,114.5 75.6,114.5 75.5,114.5 C75.4,114.5 75.4,114.6 75.3,114.6 C75.2,114.6 75,114.7 74.9,114.7 C74.8,114.7 74.8,114.7 74.7,114.7 C74.5,114.7 74.2,114.8 74,114.8 L59.6,115.1 C59.6,118.4 59.8,121.6 60.3,124.8 C61.3,131.8 60.8,128.9 61.8,135.9 C61.4,132.7 62.1,136.5 62.6,136.1 L77,135.8 C77.3,135.8 77.5,135.8 77.7,135.7 C77.8,135.7 77.8,135.7 77.9,135.7 C78,135.7 78.2,135.6 78.3,135.6 C78.4,135.6 78.4,135.5 78.5,135.5 C78.6,135.5 78.7,135.4 78.8,135.4 C78.8,135.4 78.8,135.4 78.9,135.4 C79,135.4 79,135.3 79.1,135.3 L79.2,135.2 C79.3,135.1 79.4,135 79.4,134.9 C79.5,134.8 79.5,134.7 79.6,134.5 L79.6,134.4 C79.7,134.2 79.7,134.1 79.7,133.9 C79.7,134 79.7,134 79.7,133.9 C79.7,134 79.7,134 79.7,133.9 Z" id="Shape" fill="#919099"></path>
                                <path d="M266.9,117.2 L264,96.3 C264.7,101.1 265,105.9 265,110.8 C265,113.3 264.9,115.7 264.7,118.1 C264.6,119 264.6,120 264.5,120.9 C264.4,121.6 264.4,122.4 264.3,123.1 C264.2,123.9 264.1,124.7 264,125.5 C263.8,126.8 263.6,128.1 263.4,129.3 C263.3,130.1 263.1,130.9 262.9,131.6 C262.6,132.8 262.4,134.1 262.1,135.3 C261.9,136.1 261.7,136.8 261.5,137.6 C261.2,138.9 260.8,140.1 260.4,141.4 C260.2,142.1 260,142.8 259.8,143.5 C259.3,144.9 258.8,146.3 258.3,147.7 C258.1,148.2 257.9,148.7 257.7,149.2 C256.9,151.1 256.2,153 255.3,154.8 C255.2,155.1 255,155.3 254.9,155.6 C254.2,157.2 253.4,158.7 252.6,160.2 C252.3,160.8 251.9,161.4 251.6,162 C251,163.2 250.3,164.3 249.6,165.5 C249.2,166.2 248.8,166.8 248.3,167.5 C247.6,168.6 247,169.6 246.3,170.6 C245.8,171.3 245.4,172 244.9,172.6 C244.2,173.6 243.4,174.6 242.7,175.6 C242.2,176.2 241.7,176.9 241.2,177.5 C240.4,178.5 239.5,179.6 238.7,180.6 C238.2,181.2 237.8,181.7 237.3,182.3 C236.2,183.6 235.1,184.8 233.9,186 C233.6,186.3 233.4,186.6 233.1,186.8 C231.7,188.3 230.2,189.7 228.7,191.1 C228.1,191.6 227.5,192.1 227,192.6 C226.1,193.4 225.2,194.2 224.3,195 C223.6,195.6 223,196.1 222.3,196.6 C221.4,197.3 220.6,198 219.7,198.7 C219,199.2 218.3,199.8 217.5,200.3 C216.6,200.9 215.8,201.6 214.9,202.2 C214.1,202.7 213.4,203.2 212.6,203.7 C211.7,204.3 210.8,204.9 209.9,205.5 C209.2,206 208.4,206.4 207.7,206.8 C206.6,207.5 205.5,208.1 204.4,208.7 C203.6,209.1 202.9,209.5 202.1,210 C201,210.6 199.9,211.2 198.7,211.7 C197.9,212.1 197.2,212.5 196.4,212.8 C195.2,213.4 194,213.9 192.8,214.4 C192,214.7 191.3,215.1 190.5,215.4 C189.1,216 187.7,216.5 186.4,217 C185.8,217.2 185.1,217.5 184.5,217.7 C183.9,217.9 183.3,218.1 182.7,218.3 C181.5,218.7 180.3,219.1 179.1,219.5 C178.4,219.7 177.7,219.9 177,220.1 C175.9,220.4 174.7,220.8 173.6,221.1 C172.8,221.3 172.1,221.5 171.3,221.7 C170.2,222 169,222.2 167.9,222.5 C167.1,222.7 166.4,222.8 165.6,223 C164.4,223.2 163.3,223.4 162.1,223.6 C161.3,223.7 160.6,223.9 159.8,224 C158.6,224.2 157.4,224.3 156.2,224.5 C155.5,224.6 154.7,224.7 154,224.8 C152.7,224.9 151.3,225.1 150,225.2 C149.4,225.2 148.7,225.3 148.1,225.4 C146.1,225.5 144.1,225.6 142.1,225.7 C79,227.2 27.4,185.5 19.7,130.5 C20.7,137.5 21.6,144.5 22.6,151.4 C30.3,206.4 81.9,248.1 144.4,246.8 C146.4,246.8 148.4,246.7 150.4,246.5 C151,246.5 151.7,246.4 152.3,246.3 C153.6,246.2 155,246.1 156.3,245.9 C157.1,245.8 157.8,245.7 158.6,245.6 C159.8,245.4 161,245.3 162.2,245.1 C163,245 163.8,244.8 164.6,244.7 C165.8,244.5 166.9,244.3 168,244.1 C168.8,243.9 169.6,243.8 170.3,243.6 C171.4,243.4 172.6,243.1 173.7,242.8 C174.5,242.6 175.2,242.4 176,242.2 C177.1,241.9 178.3,241.6 179.4,241.2 C180.1,241 180.8,240.8 181.5,240.6 C182.7,240.2 183.9,239.8 185.2,239.4 C185.8,239.2 186.4,239 187,238.8 C187.1,238.8 187.2,238.7 187.4,238.7 C187.9,238.5 188.4,238.3 189,238.1 C190.4,237.6 191.8,237.1 193.1,236.5 C193.9,236.2 194.6,235.8 195.4,235.5 C196.6,235 197.8,234.4 199,233.9 C199.8,233.5 200.6,233.1 201.4,232.7 C202.5,232.1 203.7,231.6 204.8,231 C205.6,230.6 206.3,230.2 207.1,229.8 C208.2,229.2 209.3,228.5 210.4,227.9 C210.9,227.6 211.4,227.4 211.8,227.1 C212.1,226.9 212.3,226.8 212.6,226.6 C213.5,226 214.4,225.4 215.3,224.8 C216.1,224.3 216.8,223.8 217.6,223.3 C218.5,222.7 219.4,222 220.3,221.4 C221,220.9 221.8,220.3 222.5,219.8 C223.4,219.1 224.2,218.4 225.1,217.8 C225.8,217.2 226.5,216.7 227.2,216.1 C228.1,215.4 228.9,214.6 229.7,213.9 C230.2,213.4 230.8,212.9 231.4,212.5 C231.5,212.4 231.5,212.4 231.6,212.3 C233.1,210.9 234.6,209.5 236,208 C236.3,207.7 236.6,207.3 236.9,207 C238,205.8 239.1,204.7 240.2,203.4 C240.7,202.8 241.2,202.3 241.7,201.7 C242.5,200.7 243.4,199.7 244.2,198.7 C244.7,198.1 245.2,197.4 245.7,196.8 C246.5,195.8 247.2,194.8 247.9,193.8 C248.1,193.5 248.4,193.1 248.7,192.8 C248.9,192.5 249.1,192.1 249.4,191.8 C250.1,190.8 250.8,189.7 251.4,188.7 C251.8,188 252.3,187.3 252.7,186.7 C253.4,185.6 254,184.4 254.7,183.3 C255,182.7 255.4,182.1 255.7,181.4 C256.5,179.9 257.2,178.5 257.9,177 C258.1,176.7 258.2,176.3 258.4,176 C259.2,174.2 260,172.3 260.8,170.5 C261,169.9 261.2,169.3 261.5,168.7 C262,167.4 262.5,166.1 262.9,164.8 C263.1,164.1 263.4,163.3 263.6,162.6 C264,161.4 264.3,160.2 264.7,159 C264.9,158.2 265.1,157.4 265.3,156.6 C265.6,155.4 265.9,154.2 266.1,153 C266.3,152.2 266.4,151.4 266.6,150.5 C266.8,149.3 267,148 267.2,146.8 C267.3,146.3 267.4,145.7 267.5,145.2 C267.5,144.9 267.6,144.6 267.6,144.3 C267.7,143.6 267.8,142.9 267.8,142.2 C267.9,141.5 268,140.9 268,140.2 C268,139.9 268,139.6 268,139.3 C268.2,136.9 268.3,134.5 268.3,132 C267.9,126.8 267.6,122 266.9,117.2 Z" id="Shape" fill="#919099"></path>
                                <path d="M142.2,0.9 C210.1,-0.5 265.1,48.8 264.9,110.8 C264.7,172.8 209.3,224.4 141.4,225.8 C73.6,227.3 18.6,178 18.7,116 L3.6,116.3 C1.1,116.4 0,114.7 1.3,112.7 L16.7,88.2 C18,86.2 20,82.9 21.3,80.8 L36.7,56.3 C37.3,55.3 38.2,54.8 39,54.8 C39.8,54.8 40.7,55.3 41.3,56.3 L56.5,80.2 C57.8,82.2 59.8,85.4 61.1,87.4 L76.3,111.3 C77.6,113.3 76.5,114.9 74,115 L59.6,115.3 C59.5,156.7 96.3,189.7 141.6,188.7 C187,187.8 224,153.3 224.1,111.8 C224.2,70.4 187.4,37.4 142.1,38.3 L142.2,0.9 Z" id="Shape" fill="#B6B4C1"></path>
                              </g>
                              <rect id="Rectangle-path" x="0.8" y="0.1" width="273.5" height="273.5" />
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="circle-fwd z-index2">
                      <svg class="circle-animation2 z-index3" width="347px" height="410px" viewBox="0 0 347 410" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g id="frontend-03" transform="translate(-3, 0)">
                            <g id="circle-yellow" transform="translate(7, 0)">
                              <g id="Group">
                                <g transform="translate(73.000000, 4.000000)" fill-rule="nonzero" id="Shape">
                                  <path d="M224.3,162.1 C214.3,90.3 146.9,35.9 65.4,37.6 L68.3,58.5 C149.9,56.8 217.2,111.2 227.2,183 C226.2,176 225.2,169.1 224.3,162.1 Z" fill="#DDBE07"></path>
                                  <polygon fill="#DDBE07" points="66.7 317.9 69.6 338.8 69.6 352.1 66.6 331.1"></polygon>
                                  <path d="M267.7,177.3 L264.8,156.4 C265.9,164.2 266.4,172.1 266.4,180.2 C266.4,183 266.3,185.8 266.1,188.6 C266.1,189.4 266,190.1 266,190.9 C265.9,192.8 265.7,194.7 265.5,196.5 C265.4,197.7 265.3,199 265.1,200.2 C264.9,201.6 264.7,202.9 264.5,204.3 C264.2,206.4 263.9,208.4 263.5,210.4 C263.3,211.7 263,213 262.7,214.3 C262.3,216.3 261.8,218.3 261.3,220.3 C261,221.6 260.7,222.8 260.3,224.1 C259.7,226.2 259.1,228.2 258.5,230.3 C258.2,231.4 257.8,232.6 257.5,233.7 C256.7,236.2 255.8,238.6 254.9,241 C254.6,241.7 254.4,242.4 254.2,243 C253,246.1 251.7,249.1 250.3,252.1 C249.9,252.9 249.5,253.7 249.1,254.5 C248.1,256.7 247,258.8 245.9,261 C245.3,262.1 244.7,263.1 244.1,264.2 C243.1,266 242,267.9 241,269.6 C240.3,270.7 239.6,271.8 238.9,272.9 C237.8,274.6 236.7,276.3 235.6,278 C234.9,279.1 234.1,280.2 233.4,281.2 C232.2,282.9 230.9,284.6 229.6,286.3 C228.9,287.3 228.1,288.3 227.4,289.2 C225.9,291.1 224.4,292.9 222.8,294.8 C222.2,295.5 221.6,296.3 221,297 C218.8,299.5 216.5,302 214.2,304.4 C213.8,304.8 213.3,305.3 212.9,305.7 C211,307.7 209,309.6 207,311.5 C206,312.4 205,313.3 203.9,314.3 C202.5,315.5 201.2,316.7 199.8,317.9 C198.7,318.8 197.6,319.7 196.5,320.6 C195.1,321.7 193.7,322.9 192.2,324 C191.1,324.9 189.9,325.7 188.7,326.6 C187.2,327.7 185.8,328.7 184.3,329.8 C183.1,330.6 181.9,331.4 180.7,332.2 C179.2,333.2 177.7,334.2 176.2,335.2 C175,335.9 173.8,336.7 172.6,337.4 C170.8,338.5 169,339.6 167.1,340.6 C165.9,341.3 164.7,341.9 163.6,342.6 C161.7,343.6 159.7,344.6 157.7,345.6 C156.6,346.2 155.4,346.7 154.3,347.3 C152,348.4 149.7,349.4 147.3,350.4 C146.4,350.8 145.6,351.2 144.7,351.5 C141.5,352.8 138.2,354.1 134.9,355.3 C132,356.3 129.2,357.3 126.3,358.2 C125.5,358.5 124.6,358.7 123.8,359 C121.7,359.6 119.6,360.3 117.4,360.8 C116.3,361.1 115.1,361.4 114,361.7 C112.1,362.2 110.3,362.6 108.4,363.1 C107.2,363.4 105.9,363.6 104.7,363.9 C102.9,364.3 101,364.6 99.2,365 C97.9,365.2 96.7,365.4 95.4,365.7 C93.5,366 91.6,366.3 89.7,366.5 C88.5,366.7 87.2,366.8 86,367 C83.9,367.2 81.8,367.4 79.7,367.6 C78.6,367.7 77.6,367.8 76.5,367.9 C73.3,368.1 70.1,368.3 66.9,368.4 L69.8,389.3 C73,389.2 76.2,389 79.4,388.8 C80.4,388.7 81.5,388.6 82.5,388.5 C84.7,388.3 86.8,388.1 89,387.9 C90.2,387.8 91.4,387.6 92.6,387.4 C94.6,387.1 96.5,386.9 98.4,386.5 C99.6,386.3 100.9,386.1 102.1,385.9 C104,385.6 105.9,385.2 107.8,384.8 C109,384.6 110.2,384.3 111.4,384 C113.3,383.6 115.3,383.1 117.2,382.6 C118.3,382.3 119.4,382.1 120.5,381.8 C122.7,381.2 124.8,380.6 127,379.9 C127.8,379.7 128.6,379.4 129.4,379.2 C132.2,378.3 135.1,377.4 137.9,376.3 C138,376.3 138,376.2 138.1,376.2 C141.4,375 144.7,373.7 147.9,372.4 C148.8,372 149.7,371.6 150.6,371.2 C152.9,370.2 155.1,369.2 157.4,368.1 C158.6,367.5 159.8,366.9 160.9,366.3 C162.8,365.3 164.7,364.4 166.6,363.4 C167.8,362.7 169.1,362 170.3,361.4 C172.1,360.4 173.9,359.3 175.7,358.3 C176.3,357.9 177,357.6 177.6,357.2 C178.2,356.8 178.8,356.4 179.3,356.1 C180.8,355.2 182.3,354.2 183.8,353.2 C185,352.4 186.3,351.5 187.5,350.7 C189,349.7 190.4,348.6 191.8,347.6 C193,346.7 194.2,345.9 195.3,345 C196.7,343.9 198.1,342.8 199.5,341.7 C200.6,340.8 201.7,339.9 202.8,339 C204.2,337.8 205.5,336.6 206.9,335.4 C207.7,334.7 208.5,334 209.3,333.3 C209.5,333.1 209.7,332.9 210,332.7 C212,330.8 214,328.9 215.9,326.9 C216.3,326.5 216.8,326 217.2,325.6 C219.5,323.2 221.8,320.7 224,318.2 C224.6,317.5 225.2,316.8 225.8,316 C227.4,314.2 228.9,312.3 230.4,310.4 C231.2,309.4 231.9,308.4 232.6,307.5 C233.9,305.8 235.2,304.1 236.4,302.4 C236.7,301.9 237.1,301.5 237.5,301 C237.9,300.4 238.3,299.8 238.7,299.2 C239.8,297.5 241,295.8 242,294.1 C242.7,293 243.4,291.9 244.1,290.8 C245.2,289 246.2,287.2 247.2,285.4 C247.8,284.3 248.4,283.3 249,282.2 C250.1,280.1 251.2,277.9 252.2,275.7 C252.6,274.9 253,274.1 253.4,273.3 C254.8,270.3 256.1,267.3 257.3,264.2 C257.6,263.5 257.8,262.8 258,262.2 C258.9,259.8 259.8,257.4 260.6,254.9 C261,253.8 261.3,252.6 261.6,251.5 C262.2,249.5 262.8,247.4 263.4,245.4 C263.7,244.1 264,242.9 264.4,241.6 C264.9,239.6 265.3,237.6 265.8,235.6 C266.1,234.3 266.3,233 266.6,231.7 C267,229.7 267.3,227.6 267.6,225.6 C267.7,224.8 267.9,223.9 268,223.1 C268.1,222.6 268.1,222 268.2,221.5 C268.3,220.3 268.5,219 268.6,217.8 C268.7,216.8 268.8,215.8 268.9,214.7 C269,213.8 269,213 269.1,212.1 C269.2,211.3 269.2,210.6 269.2,209.8 C269.3,207 269.4,204.2 269.5,201.4 C269.3,193.1 268.8,185.1 267.7,177.3 Z" fill="#DDBE07"></path>
                                  <polygon fill="#DDBE07" points="66.5 368.4 69.4 389.4 69.4 403.1 66.5 382.1"></polygon>
                                  <path d="M66.5,382.1 C66.5,382.3 66.5,382.5 66.5,382.7 C66.5,382.9 66.4,383.1 66.4,383.3 C66.4,383.4 66.4,383.4 66.3,383.5 C66.2,383.6 66.2,383.7 66.1,383.8 C66.1,383.9 66,383.9 66,384 C66,384.1 65.9,384.1 65.8,384.2 C65.7,384.3 65.7,384.3 65.6,384.4 L65.5,384.5 C65.4,384.5 65.4,384.6 65.3,384.6 C65.2,384.6 65.2,384.7 65.1,384.7 C65,384.7 64.9,384.8 64.8,384.8 L64.7,384.8 C64.6,384.8 64.4,384.8 64.3,384.8 C63.8,384.8 63.2,384.7 62.5,384.3 L36,370.9 C33.8,369.8 30.2,368 28.1,366.9 L1.7,353.5 C1.5,353.4 1.2,353.2 1,353.1 C0.4,352.7 0.1,352.2 -1.42108547e-14,351.7 C1,358.7 1.9,365.7 2.9,372.6 C3,373.3 3.5,373.9 4.5,374.4 L30.9,387.8 C31.1,387.9 31.3,388 31.6,388.1 C33.9,389.3 37.3,391 39.2,392 L65.3,405.3 C65.9,405.6 66.5,405.8 67.1,405.8 C67.2,405.8 67.4,405.8 67.5,405.8 L67.6,405.8 C67.7,405.8 67.7,405.8 67.8,405.8 C67.8,405.8 67.8,405.8 67.9,405.8 C68,405.8 68,405.7 68.1,405.7 C68.1,405.7 68.2,405.7 68.2,405.6 C68.2,405.6 68.2,405.6 68.3,405.5 L68.4,405.4 C68.4,405.4 68.5,405.4 68.5,405.3 C68.5,405.3 68.5,405.2 68.6,405.2 C68.7,405.1 68.7,405.1 68.8,405 L68.9,404.9 L68.9,404.8 C69,404.7 69,404.6 69.1,404.5 C69.1,404.4 69.1,404.4 69.2,404.3 C69.3,404.1 69.3,403.9 69.3,403.7 C69.3,403.6 69.3,403.5 69.3,403.5 C69.3,403.4 69.3,403.3 69.3,403.2 L66.5,382.1 Z" fill="#DDBE07"></path>
                                  <path d="M65.5,0.3 C176.6,-2 266.7,78.7 266.4,180.2 C266.1,281 176.6,365 66.5,368.4 L66.5,382.1 C66.5,383.7 65.6,384.7 64.3,384.7 C63.8,384.7 63.2,384.6 62.5,384.2 L36,370.9 C33.8,369.8 30.2,368 28.1,366.9 L1.7,353.5 C-0.5,352.4 -0.5,350.5 1.7,349.3 L28.2,334.8 C30.4,333.6 34,331.6 36.2,330.4 L62.7,315.9 C63.3,315.6 63.9,315.4 64.5,315.4 C65.8,315.4 66.7,316.3 66.7,317.9 L66.7,331.2 C154.3,328.3 225.3,261.4 225.6,181.1 C225.9,100.2 154,35.8 65.4,37.6 L65.5,0.3 Z" fill="#FFDF00"></path>
                                </g>
                                <rect id="Rectangle-path" x="0.9" y="0.2" width="413.7" height="413.7" />
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>

                    <div class="clip-path-circle-animation z-index3"></div>
                    <div class="clip-path-circle-animation2 z-index2"></div>

                    <?php
                    if (have_rows('graficos_barra')):
                      while (have_rows('graficos_barra')):
                        the_row(); ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'cinza'): ?>
                          <div class="text-top-left text-js fade animated animation-delay-1 z-index3">
                            <span class="progress-label">
                              <?php if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php if (get_sub_field('tipo_de_barra') == 'amarelo'): ?>
                          <div class="text-bottom-left text-js2 fade animated animation-delay-2-5 z-index3">
                            <span class="progress-label">
                              <?php if (get_sub_field('numero')):
                                $number = get_sub_field('numero');
                              endif; ?>
                              <?php echo $number.'%'; ?>
                            </span>
                            <span class="text_percent">
                              <?php the_sub_field('texto'); ?>
                            </span>
                          </div>
                        <?php endif; ?>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'slick_slider':
              ?>
              <div class="block-profissoes citacoes bg1 pb-60">
                <div class="grid-cont">
                  <div class="block-profissoes slick-slider2 slick-slider-js2">
                    <div class="text-right">
                      <p class="vertical-text reset"><?php the_sub_field('text-right'); ?></p>
                    </div>
                    <div class="text-left">
                      <p class="vertical-text reset"><?php the_sub_field('text-left'); ?></p>
                    </div>
                    <div id="slick-slider2" role="complementary" class="simple">
                      <?php
                      if (have_rows('slider')): ?>
                        <?php while (have_rows('slider')):
                          the_row(); ?>
                          <blockquote class="quote reset">
                            <?php if (get_sub_field('imagem')): ?>
                              <div class="author-image" style="background: url(<?php the_sub_field('imagem'); ?>) 50% 50% no-repeat;"></div>
                            <?php endif ?>
                            <p class="text reset"><q><?php the_sub_field('texto'); ?></q></p>
                            <cite class="cite"><b><?php the_sub_field('autor'); ?></b></cite>
                          </blockquote>
                          <?php
                        endwhile;
                      endif;
                      ?>
                    </div>
                  </div>
                  <script>
                  jQuery(document).ready(function( $ ) {
                      Edit.modules.collection.push({ type: 'slickProfissoes2', instance: new Edit.modules.slickProfissoes2('.slick-slider-js2') });
                  })
                  </script>
                </div>
              </div>
              <?php
              break;
              case 'bloco-video':
              ?>
              <div class="block-profissoes mercado bg2 padding">
                <div class="grid-cont big">
                  <div class="title-block aligncenter pt-80 pb-60">
                    <h2 class="title-big reset">
                      <?php the_sub_field('titulo'); ?>
                      <span class="dot">.</span>
                    </h2>
                  </div>
                  <h3 class="subtitle-big pb-60 reset">
                    <?php the_sub_field('subtitulo'); ?>
                  </h3>
                  <div class="flex-container">
                    <?php
                    if (have_rows('videos')): ?>
                      <?php while (have_rows('videos')):
                        the_row(); ?>
                        <div class="flex-item block-video">
                          <?php if (get_sub_field('link')):
                            $class = 'block-content';
                          endif; ?>
                          <a href="<?php the_sub_field('link'); ?>" class="<?php echo $class ?>">
                            <div class="video-block">
                              <?php
                              $videoLink = get_sub_field('url_video');
                              $videoLink = str_replace('https:','',$videoLink);
                              $videoLink = str_replace('http:','',$videoLink);
                              if (strpos($videoLink, 'vimeo') > 0) {
                                $color = '?color=ffdd00';
                              } 
                              ?>
                              <div class='embed-container'> 
                                <iframe src="<?php echo $videoLink,$color; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                              </div>
                            </div>
                            <h3 class="subtitulo"><?php the_sub_field('subtitulo'); ?></h3>
                            <div class="rectangle"></div>
                            <p class="texto reset"><?php the_sub_field('texto'); ?></p>
                          </a>
                        </div>
                        <?php
                      endwhile;
                    endif;
                    ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'bloco-video-big':
              ?>
              <div class="block-profissoes mercado bg2">
                <div class="blockquote-yellow">
                  <div class="grid-cont">
                    <blockquote class="blockquote reset">
                      <q class="quote"><?php the_sub_field('quote'); ?> </q>
                      <i class="quote-autor"><?php the_sub_field('quote_autor'); ?></i>
                    </blockquote>
                  </div>
                </div>
                <div class="block-profissoes video">
                  <div class="grid-cont">
                    <div class="block-video-big">
                      <div class="video-block">
                        <?php
                        $videoLink = get_sub_field('url_video');
                        $videoLink = str_replace('https:','',$videoLink);
                        $videoLink = str_replace('http:','',$videoLink);
                        if (strpos($videoLink, 'vimeo') > 0) {
                          $color = '?color=ffdd00';
                        } 
                        ?>
                        <div class='embed-container'> <iframe id="iframe-entrevista" src="<?php echo $videoLink,$color; ?>"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
                      </div>
                    </div>
                    <?php if (get_sub_field('link')): ?>
                      <a href="<?php the_sub_field('link'); ?>" class="block-content">
                      <?php endif; ?>
                      <h3 class="subtitulo"><?php the_sub_field('subtitulo'); ?></h3>
                      <div class="rectangle"></div>
                      <p class="texto"><?php the_sub_field('texto'); ?></p>
                      <?php if (get_sub_field('link')): ?>
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php
              break;
              case 'bloco-empresas':
              ?>
              <div class="block-profissoes empresas margin-50">
                <div class="grid-cont big">
                  <div class="block-text-and-image in-company">
                    <div class="pane-scroll">
                      <div class="clientes ">
                        <div class="clientesContainer">
                          <?php
                          if (have_rows('empresas')):
                            while (have_rows('empresas')):
                              the_row(); ?>
                              <?php $image = get_sub_field('logotipo'); ?>
                              <div class="item">
                                <a  href="<?php the_sub_field('link') ?>" target="_blank" class="no-route">
                                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </a>
                              </div>
                              <?php
                            endwhile;
                          endif;
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              break;
            endswitch;
          endwhile;
        endif;
        ?>
        <?php
        // old configuration with selected vacancies
        // if (get_field('ofertas')):
        // get_template_part( 'partials/partial', 'ofertas-profissoes');
        //endif;
        ?>
        <?php
        if (get_field('artigos_relacionados')):
          get_template_part('partials/partial', 'artigos-relacionados');
        endif;
        ?>
      </div> <!-- end content profissoes -->
      <script>
        jQuery(document).ready(function ( $ ) {
          <?php
          if (get_next_post()):
            $next_post     = get_next_post();
            $next_post_url = get_permalink($next_post->ID);
            $next_post_url = str_replace(home_url(), "", $next_post_url);
          else:
            $next_post_url = 'undefined';
          endif;
          if (get_adjacent_post()):
            $prev_post     = get_adjacent_post();
            $prev_post_url = get_permalink($prev_post->ID);
            $prev_post_url = str_replace(home_url(), "", $prev_post_url);
          else:
            $prev_post_url = 'undefined';
          endif;
          if (LANGUAGE == 'PT'):
            $parent  = get_post(28493);
          else:
            $parent  = get_post(22226);
          endif;
          $parent_url = get_permalink($parent->ID);
          $currentUrl = $_SERVER['REQUEST_URI'];
          $arr        = explode('?ajax=true', $currentUrl);
          $filter = '';
          if (sizeof($arr) > 1) {
            $filter = '?' . $arr[1];
            $filter = str_replace('&inputAno=0', "", $filter);
            $filter = str_replace('&inputCliente=0', "", $filter);
            $filter = str_replace('?&', "?", $filter);
          }
          $meta_query = array(
            'relation' => 'AND'
          );
          $ano        = '';
          $cliente    = '';
          $queryString = '';
          $order      = 'ASC';
          $orderBy    = 'menu_order';
          $post_type  = 'profissoes';
          $postId     = $wp_query->post->ID;
          $links      = getNextAndPreviousLinks($order, $orderBy, $post_type, $meta_query, $postId, $queryString);
          $parent_url = str_replace(home_url(), "", $parent_url . $queryString);
          ?>
          Edit.modules.collection.push({ type: 'innerNavigation', instance: new Edit.modules.innerNavigation('<?php
            echo $links["next"];
            ?>', '<?php
            echo $links["prev"];
            ?>', '<?php
            echo $parent_url;
            ?>') })
          Edit.pageLoader.totalModules = 1;
          Edit.modules.shareLightbox('.block-share');
          Edit.modules.isoModuleResponsive.init();
        });
      </script>
      <script type="text/javascript" src="<?php bloginfo('template_url');?>/scripts/profissoes.js?ver=<?php echo $GLOBALS['version']; ?>"></script>
    </div>