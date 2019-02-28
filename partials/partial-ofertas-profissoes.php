<div class="block-profissoes ofertas">
    <div class="grid-cont big pb-80">
        <div class="flex-container">

                <?php

                $id = get_sub_field('tipo_de_formacao');
                $meta_query = array('relation' => 'AND',
                array(
                    'key' => 'area', 
                    //'value' => '1246', 
                    'value' => $id,
                    'compare' => 'LIKE'
                ));

                $the_query = new WP_Query(array(
                    'post_type'      => 'recrutamento',
                    'meta_query'     => $meta_query,
                  //'post__in'       => $ids,
                    'posts_per_page' => 6, 
                    'post_status'    => 'publish',
                    'orderby'        => 'date',
                    'order'          => 'DESC'
                ));
                $posts = $the_query->get_posts();
                //var_dump($posts);
                foreach ($posts as $post):
                    setup_postdata( $post );

                        if( get_field('empresa') ):
                            $empresa = get_field('empresa');
                            $empresa = $empresa[0];
                        endif;

                   
                        ?>
                        <div class="card">
                            <div class="front">
                                <div class="circle-tile-heading dark-blue">
                                    <div class="circle" style="background-image:url('<?php the_field('logo', $empresa); ?>')">
                                    </div>
                                </div>
                                <div class="card__container">
                                    <div class="text-container">
                                        <h3 class="title reset">
                                            <?php the_field('titulo'); ?>
                                        </h3>
                                        <p class="subtitulo reset"><?php the_field('frase_bloco_profissões'); ?></p>
                                    </div>
                                    <div class="barra-horizontal"></div>
                                    <div class="flex-container">
                                        <div class="flex-item">
                                            <div class="company-avatar">
                                                <div class="bola"></div>
                                                <p class="text"><?php the_field('tipo_funcao'); ?></p>
                                                <p class="horario">
                                                    <?php 
                                                    $horario = get_field('horario');
                                                    if ($horario == '') {
                                                      $horario = '—';
                                                  }
                                                  ?>
                                                  <?php echo $horario ?></p>
                                              </div>
                                          </div>
                                          <div class="flex-item">
                                            <div class="company-avatar">
                                                <div class="bola"></div>
                                                <p class="text">DATA</p>
                                                <p class="horario">
                                                    <?php $post_date = get_the_date( 'd-m-y' ); echo $post_date; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn--link">
                                        <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="link">+ INFO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                endforeach;
            ?>
        </div>
        <!--  LOAD MORE BUTTON  -->
        <div class="block-formacao-info mt-60">
            <div class="grid-cont big flex-container flex-centered">
             <?php if(LANGUAGE == 'PT'):
                 $link = '/recrutamento';
             else: 
                 $link = '/empleos-disruptivos';
             endif; ?> 
             <a class="btn-more" href="<?php echo $link; ?>" >
                <div>
                    <?php dictionary("botao_ofertas"); ?>                                
                    <div class="btn-icon">
                        <div class="inner">
                            <div class="icon">
                                <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
                                            C16.5,22.828,15.828,23.5,15,23.5z"></path>
                                        </g>
                                        <g>
                                            <path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z"></path>
                                        </g>
                                    </g>
                                </svg>

                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- END LOAD MORE BUTTON -->
</div>
</div>
<?php wp_reset_postdata(); ?>