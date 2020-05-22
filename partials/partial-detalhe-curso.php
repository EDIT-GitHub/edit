<?php
/**
* The template for Curso
*
* @package Edit
*/
//Tipo de formacao
$tipoFormacao = get_field('tipo_formacao');
$tipoFormacao = $tipoFormacao[0]; //First
$icon = get_field('icon', $tipoFormacao);
$cssClassType = get_field('class', $tipoFormacao);
//End tipo de formacao
//Localizacao
$localizacao = get_field('localizacao');
$localizacao = $localizacao[0]; //First
//End Localizacao
$postId = $wp_query->post->ID;
$end = false;
$dataInicio = get_field('home_data', false, false);
if($dataInicio != false):
	$hoje = date('Ymd');
	if($hoje > $dataInicio):
//Colocar data a definir e vagas disponíveis quando ultrapassa o dia atual
		$end = true;
	endif;
endif;
?>
<?php the_field('tracking_code'); ?>
<div class="content single-formacao">
	<!-- FORM MODAL MODULE -->
	<div class="slider form flex full curso <?php echo $cssClassType; ?> js-formmodal">
		<input type="hidden" id="idCurso" value="" />
		<div class="form-content">
			<div class="btn">
				<?php the_field('titulo_formulario') ?>
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
<form id="register-formacao">
	<div class="wrapper">
		<div class="pane-scroll">
			<div class="slider-item">
				<div class="grid-cont">
					<div class="content v-align">
						<input type="hidden" id="url" name="url"  value="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
						<input id="curso" name="curso" type="hidden" value="<?php the_field('titulo'); ?>"  />
						<input id="local" name="local" type="hidden" value="<?php echo $localizacao->post_title; ?>"  />
						<input id="nome" name="name" type="text" data-type="text" placeholder="NOME" autofocus />
						<input id="email" name="email" type="text" data-type="email" placeholder="EMAIL"  />
						<input id="post_id" name="post_id" type="hidden"  value="<?php echo $postId; ?>" />
						
						<div class="filters-holder">
							<div class="filter" style="display:none;margin-bottom: -10px;">
								<?php $formClass = get_field('class', $tipoFormacao); ?>
								<select id="assunto" data-exterior-label="Curso" name="assunto">
									<?php if ($formClass == 'workshop') { ?>
										<option value="Inscricao">PEDIDO DE INSCRIÇÃO</option>
										<option value="Informacao-workshops">PEDIDO DE INFORMAÇÃO</option>
									<?php } else { ?>
										<option value="SOPP" selected>MARCAÇÃO DE SOPP</option>
										<option value="Informacao">PEDIDO DE INFORMAÇÃO</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<input id="telefone" name="telefone" maxlength="14" data-type="phone" type="text" placeholder="+351 000 000 000" />
						<input id="pais" name="pais" data-type="text" type="text" placeholder="PAÍS" />
						<input id="cidade" name="cidade" data-type="text" type="text" placeholder="CIDADE" />
                        <div id="localizacaoContainer" style="margin-bottom: 20px;" class="filters-holder">
						    <div class="filter">
							    <select id="nl_localizacao" data-exterior-label="Localização" name="localizacao">
								    <option value><?php dictionary("Localizacao") ?></option>
									<option value="Lisboa">Lisboa</option>
									<option value="Porto">Porto</option>
									<option value="Madrid">Madrid</option>
                                    <option value="S�o Paulo">S�o Paulo</option>
                                </select>
							</div>
						</div>
						<textarea name="message" id="message" placeholder="Mensagem"></textarea>
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
							<span class="label-text label">Este site utiliza cookies. Ao submeter este formulário estará a consentir a sua utilização.
								<br>
								<a class="label-href" href="/politica-de-privacidade/" class="no-route" target="_blank">Política de Privacidade</a>
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
    jQuery(document).ready(function ($) {
        jQuery('.btn-submit .btn-icon').click(function (e) {
           var myVar = setInterval(myTimer, 500);
           console.log("send event before");
            //ga('send', 'event', 'more', 'click','test');
            console.log("send event after");
            function myTimer() {
                var el = jQuery('.btn-submit .btn-icon').hasClass( "success" );

                console.log(el);
                if (el == true){
                    window.location.hash = 'obrigado';
                    clearInterval(myVar);
                }
            }
        });
        jQuery('.block-formacao-info.form-content > div').click(function (e) {
            window.location.hash = 'pedido-de-informacao';
            gtag('event', "click", {
					  'event_category': "form",
					  'event_label': "<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>#pedido-de-informacao",
					  'value': "info"
					});
					console.log("send ga open");
            });

        jQuery('.slider.form .form-content > div').click(function (e) {
            window.location.hash = '';
            gtag('event', "click", {
					  'event_category': "form",
					  'event_label': "close",
					  'value': "info"
					});
					console.log("send ga close");
        });
    });
	var success = 'sucesso';
	var sending = 'a enviar';
	var cursoN = '<?php echo wp_create_nonce("edit Nonce Registration Form"); ?>';
	var form_sucesso = "<?php dictionary("Pedido_enviado_com_sucesso") ?>";
	jQuery(document).ready(function ($) {
			Edit.modules.collection.push({ type: 'formModal', instance: new Edit.modules.formModal('.js-formmodal', 'workshop_form') });		
		});
	</script>
	<!-- END FORM MODAL MODULE -->
	<!-- HEADER MODULE -->
	<div class="header curso flex small">
		<div class="header-item formacao curso <?php echo $cssClassType; ?>">
			<div class="background">
				<?php
				$bg = get_bloginfo('template_url') . '/images/dummy/formacao/header/bg.jpg';
				if (get_field('fundo_header'))
					$bg = get_field('fundo_header');
				?>
				<div class="img" draggable="false" style="background-image:url(<?php echo $bg; ?>)"></div>
				<div class="pixels" style="background-image:url(<?php bloginfo('template_url'); ?>/images/dummy/formacao/header/pixel.png)"></div>
			</div>
			<div class="grid-cont">
				<div class="header-description">
					<div class="summary">
						<p class="subtitulo"><?php echo $localizacao->post_title; ?></p>
						<h1><?php the_field('titulo'); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END HEADER MODULE -->
	<div class="block-formacao-info">
		<div class="grid-cont curso <?php echo $cssClassType; ?> margin-50">
			<?php
			if (have_rows('bloco_infomacao')):
				while (have_rows('bloco_infomacao')):
					the_row();
					$tipo = get_sub_field('css_tipo');
					switch ($tipo)
					{
						case 'curso': ?>
						<div class="block-info">
							<div class="icon icon-curso"></div>
							<div class="info">
								<p><?php echo $tipoFormacao->post_title; ?></p>
								<?php
								$vagas = get_sub_field('info_descricao');
								if($end || $vagas == NULL): ?>
									<span>VAGAS DISPONÍVEIS</span>
									<?php elseif( get_sub_field('esgotado') ): ?>
										<span class="red">ESGOTADO</span>
										<?php else: ?>
											<span><?php echo $vagas ?></span>
										<?php endif; ?>
									</div>
								</div>
								<?php
								break;
								case 'icon-data': ?>
								<div class="block-info">
									<div class="icon icon-data"></div>
									<div class="info">
										<?php
                                        
										if ($tipoFormacao->post_title=='Remote Learning'){
                                            $svg_info = '<div class="tooltip-remote"><svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14px" height="14px"><path d="M 12 0 C 5.371094 0 0 5.371094 0 12 C 0 18.628906 5.371094 24 12 24 C 18.628906 24 24 18.628906 24 12 C 24 5.371094 18.628906 0 12 0 Z M 12 2 C 17.523438 2 22 6.476563 22 12 C 22 17.523438 17.523438 22 12 22 C 6.476563 22 2 17.523438 2 12 C 2 6.476563 6.476563 2 12 2 Z M 12 5.8125 C 11.816406 5.8125 11.664063 5.808594 11.5 5.84375 C 11.335938 5.878906 11.183594 5.96875 11.0625 6.0625 C 10.941406 6.15625 10.851563 6.285156 10.78125 6.4375 C 10.710938 6.589844 10.6875 6.769531 10.6875 7 C 10.6875 7.226563 10.710938 7.40625 10.78125 7.5625 C 10.851563 7.71875 10.941406 7.84375 11.0625 7.9375 C 11.183594 8.03125 11.335938 8.085938 11.5 8.125 C 11.664063 8.164063 11.816406 8.1875 12 8.1875 C 12.179688 8.1875 12.371094 8.164063 12.53125 8.125 C 12.691406 8.085938 12.816406 8.03125 12.9375 7.9375 C 13.058594 7.84375 13.148438 7.71875 13.21875 7.5625 C 13.289063 7.410156 13.34375 7.226563 13.34375 7 C 13.34375 6.769531 13.289063 6.589844 13.21875 6.4375 C 13.148438 6.285156 13.058594 6.15625 12.9375 6.0625 C 12.816406 5.96875 12.691406 5.878906 12.53125 5.84375 C 12.371094 5.808594 12.179688 5.8125 12 5.8125 Z M 10.78125 9.15625 L 10.78125 18.125 L 13.21875 18.125 L 13.21875 9.15625 Z"/></svg><span>GMT Lisbon</span></div>';
                                        }else{
                                            $svg_info ='';
                                        }
                                        $subtitulo = get_sub_field('info_titulo');
										if($end || $subtitulo == NULL) { ?>
											<p>A definir <?php echo $svg_info; ?></p>
										<?php } else { ?>
											<p><?php the_sub_field('info_titulo') ?> <?php echo $svg_info; ?></p>
										<?php } ?>
										<span>
											<?php the_sub_field('info_descricao') ?>
										</span>
									</div>
								</div>
								<?php break;
								case 'icon-preco': ?>
								<div class="block-info">
									<div class="icon icon-preco"></div>
									<div class="info">
										<p><?php the_sub_field('info_titulo') ?></p>
										<span><?php the_sub_field('info_descricao') ?></span>
									</div>
								</div>
								<?php break;
								case 'icon-pdf': ?>
								<div class="block-info">
									<a href="<?php the_sub_field('info_documento') ?>" target="_blank">
										<div class="icon icon-pdf"></div>
										<div class="info">
											<p><?php the_sub_field('info_titulo') ?></p>
											<span><?php the_sub_field('info_descricao') ?></span>
										</div>
									</a>
								</div>
								<?php break;
							}
							?>
							<?php
						endwhile;
					endif;
					?>
				</div>
				<div class="grid-cont big dates">
					<div class="date">
						<?php
						if (have_rows('horario_semanal')):
							function getHour($day)
							{
								$tipoFormacao = get_field('tipo_formacao');
				$tipoFormacao = $tipoFormacao[0]; //First
				$icon = get_field('icon', $tipoFormacao);
				$cssClassType = get_field('class', $tipoFormacao);
				while (have_rows('horario_semanal'))
				{
					the_row();
					$curr = get_sub_field('dia_da_semana');
					if ($curr == $day)
					{
						$data = get_sub_field('horario_semanal_horas');
						?>
						<div class="day curso <?php echo $cssClassType; ?>">
							<div class="bg">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="110px" height="110px" viewBox="0 0 110 110" enable-background="new 0 0 110 110" xml:space="preserve">
									<path fill="#F2F2F2" d="M108.5,0c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
									c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
									c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
									c0,2-1.791,4-4,4s-4-2-4-4H0v110h110V0H108.5z" />
									<rect y="103" fill="#E5E5E5" width="110" height="7" />
								</svg>
							</div>
							<div>
								<?php if( get_field('ingles') ): ?>
									<div>
										<?php if($day == "s"){?>
											<div class="sab">S</div>
											<div class="small-txt">AT</div>
										<?php }else if($day == "d"){?>
											<div class="sab">S</div>
											<div class="small-txt">UN</div>
										<?php }else if($day == '2'){?>
											<div class="sab">M</div>
											<div class="small-txt">on</div>
										<?php }else if($day == "3"){?>
											<div class="sab">T</div>
											<div class="small-txt">UE</div>
										<?php }else if($day == "4"){?>
											<div class="sab">W</div>
											<div class="small-txt">ED</div>
										<?php }else if($day == "5"){?>
											<div class="sab">T</div>
											<div class="small-txt">HU</div>
										<?php }else if($day == "6"){?>
											<div class="sab">F</div>
											<div class="small-txt">RI</div>
										<?php }else{ ?>
											<div><?php echo $day."ª";?></div>
										<?php } ?>
									</div>
									<?php else: ?>
										<div>
											<?php if($day == "s"){?>
												<div class="sab">S</div>
												<div class="small-txt">AB</div>
											<?php }else if($day == "d"){?>
												<div class="sab">D</div>
												<div class="small-txt">OM</div>
											<?php }else{ ?>
												<div><?php echo $day."ª";?></div>
											<?php } ?>
										</div>
									<?php endif; ?>
									<div class="hours">
										&nbsp;<?php echo $data; ?>
									</div>
								</div>
							</div>
							<?php
							return $data;
						}
					}
					?>
					<div class="day">
						<div class="bg">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="110px" height="110px" viewBox="0 0 110 110" enable-background="new 0 0 110 110" xml:space="preserve">
								<path fill="#F2F2F2" d="M108.5,0c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
								c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
								c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1c0,2-1.791,4-4,4s-4-2-4-4h-1
								c0,2-1.791,4-4,4s-4-2-4-4H0v110h110V0H108.5z" />
								<rect y="103" fill="#E5E5E5" width="110" height="7" />
							</svg>
						</div>
						<div>
							<?php if( get_field('ingles') ): ?>
								<div>
									<?php if($day == "s"){?>
										<div class="sab">S</div>
										<div class="small-txt">AT</div>
									<?php }else if($day == "d"){?>
										<div class="sab">S</div>
										<div class="small-txt">UN</div>
									<?php }else if($day == '2'){?>
										<div class="sab">M</div>
										<div class="small-txt">on</div>
									<?php }else if($day == "3"){?>
										<div class="sab">T</div>
										<div class="small-txt">UE</div>
									<?php }else if($day == "4"){?>
										<div class="sab">W</div>
										<div class="small-txt">ED</div>
									<?php }else if($day == "5"){?>
										<div class="sab">T</div>
										<div class="small-txt">HU</div>
									<?php }else if($day == "6"){?>
										<div class="sab">F</div>
										<div class="small-txt">RI</div>
									<?php }else{ ?>
										<div><?php echo $day."ª";?></div>
									<?php } ?>
								</div>
								<?php else: ?>
									<div>
										<?php if($day == "s"){?>
											<div class="sab">S</div>
											<div class="small-txt">AB</div>
										<?php }else if($day == "d"){?>
											<div class="sab">D</div>
											<div class="small-txt">OM</div>
										<?php }else{ ?>
											<div><?php echo $day."ª";?></div>
										<?php } ?>
									</div>
								<?php endif; ?>
								<div class="hours">
								</div>
							</div>
						</div>
						<?php
						return '';
					}
					getHour(2);
					getHour(3);
					getHour(4);
					getHour(5);
					getHour(6);
					getHour("s");
					getHour("d");
					?>
					<?php
				endif;
				?>
			</div>
		</div>
	</div>
	<div class="block-formacao-info gray curso">
		<div class="grid-cont">
			<!-- RADIAL GRAPH MODULE -->
			<div class="class-duration js-radialmodule">
				<?php
				if (have_rows('componentes')):
					$total = 0;
					while (have_rows('componentes')):
						the_row();
						$horas = get_sub_field('componente_horas');
						$total += $horas;
						?>
						<div class="graph curso <?php echo $cssClassType; ?>" data-hours="<?php echo $horas; ?>">
							<div class="content-svg">
								<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="220px" height="220px" viewBox="0 0 220 220" enable-background="new 0 0 220 220" xml:space="preserve">
								<g>
									<path class="bg-white" fill="none" stroke="#fff" stroke-width="10" stroke-miterlimit="10" d="M110,10C54.771,10,10,54.771,10,110s44.771,100,100,100s100-44.771,100-100S165.229,10,110,10L110,10z" />
									<path class="radial-svg" fill="none" stroke="#fff" stroke-width="10" stroke-miterlimit="10" d="M110,10C54.771,10,10,54.771,10,110s44.771,100,100,100s100-44.771,100-100S165.229,10,110,10L110,10z" />
								</g>
							</svg>
						</div>
						<div class="content-circle">
							<div class="circle">
							</div>
						</div>
						<div class="graph-text">
							<?php echo $horas; ?>h
							<span><?php the_sub_field('componente_titulo'); ?></span>
						</div>
					</div>
					<?php
				endwhile;
				?>
				<div class="total" data-total="<?php echo $total; ?>">
					<div>
						<div class="equal">=</div>
						<div class="total">
							<?php echo $total; ?>h
							<span><?php the_field('texto_do_total_de_componentes') ?></span>
						</div>
					</div>
				</div>
				<?php
			endif;
			?>
		</div>
		<script>
			jQuery(document).ready(function( $ ) {
				Edit.modules.collection.push({ type: 'radialGraph', instance: new Edit.modules.radialGraph('.js-radialmodule .graph', '.radial-svg') });
			})
		</script>
		<!-- END RADIAL GRPAH MODULE -->
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
	</div>
</div>
<div class="btn-position-holder"></div>
<div id="formulario-curso" class="block-formacao-info form-content curso <?php echo $cssClassType; ?> margin-100">
	<div class="btn">
		<?php the_field('titulo_formulario') ?>
		<div class="icon form-btn btn-icon">
			<div class="inner">
				<div class="icon">
					<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
					<path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
					c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
					c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z" />
				</svg>
			</div>
		</div>
	</div>
</div>
</div>
<?php
get_template_part('partials/partial', 'genericblocks');
?>
<?php if (get_field('video')): ?>
	<div class="slider-media">
		<iframe src="<?php the_field('video'); ?>" width="860" frameborder="0" height="484" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	</div>
	<?php
endif; ?>
<?php
if (get_field('artigos_relacionados')):
	get_template_part('partials/partial', 'artigos-relacionados');
endif;
?>
</div>
<script>

	jQuery(document).ready(function( $ ) {
		<?php
		if (get_next_post())
		{
			$next_post = get_next_post();
			$next_post_url = get_permalink($next_post->ID);
			$next_post_url = str_replace(home_url() , "", $next_post_url);
		}
		else
		{
			$next_post_url = 'undefined';
		}
		if (get_adjacent_post())
		{
			$prev_post = get_adjacent_post();
			$prev_post_url = get_permalink($prev_post->ID);
			$prev_post_url = str_replace(home_url() , "", $prev_post_url);
		}
		else
		{
			$prev_post_url = 'undefined';
		}
		$parent = get_post(10);
		$parent_url = get_permalink($parent->ID);
		$currentUrl = $_SERVER['REQUEST_URI'];
		$arr = explode('?ajax=true', $currentUrl);
		$filter = '';
		if (sizeof($arr) > 1)
		{
			$filter = '?' . $arr[1];
			$filter = str_replace('inputCursos', "tipo", $filter);
			$filter = str_replace('&tipo=0', "", $filter);
			$filter = str_replace('inputHorario', "horario", $filter);
			$filter = str_replace('&horario=0', "", $filter);
			$filter = str_replace('inputLocalizacao', "localizacao", $filter);
			$filter = str_replace('&localizacao=0', "", $filter);
			$filter = str_replace('inputArea', "area", $filter);
			$filter = str_replace('&area=0', "", $filter);
			$filter = str_replace('?&', "?", $filter);
		}
			//request data
		$meta_query = array(
			'relation' => 'AND'
		);
		$areaId = '';
		$tipoId = '';
		$horarioId = '';
		$localizacaoId = '';
		$queryString = '';
		if (isset($_REQUEST['inputCursos']))
		{
			$tipoId = $_REQUEST['inputCursos'];
			if ($queryString == '')
			{
				$queryString = $queryString . '?inputCursos=' . $tipoId;
			}
			else
			{
				$queryString = $queryString . '&inputCursos=' . $tipoId;
			}
		}
		if (isset($_REQUEST['inputArea']))
		{
			$areaId = $_REQUEST['inputArea'];
			if ($queryString == '')
			{
				$queryString = $queryString . '?inputArea=' . $areaId;
			}
			else
			{
				$queryString = $queryString . '&inputArea=' . $areaId;
			}
		}
		if (isset($_REQUEST['inputHorario']))
		{
			$horarioId = $_REQUEST['inputHorario'];
			if ($queryString == '')
			{
				$queryString = $queryString . '?inputHorario=' . $horarioId;
			}
			else
			{
				$queryString = $queryString . '&inputHorario=' . $horarioId;
			}
		}
		if (isset($_REQUEST['inputLocalizacao']))
		{
			$localizacaoId = $_REQUEST['inputLocalizacao'];
			if ($queryString == '')
			{
				$queryString = $queryString . '?inputLocalizacao=' . $localizacaoId;
			}
			else
			{
				$queryString = $queryString . '&inputLocalizacao=' . $localizacaoId;
			}
		}
		if ($tipoId != '0' && $tipoId != ''):
			array_push($meta_query, array(
			'key' => 'tipo_formacao', // name of custom field
			'value' => '"' . $tipoId . '"',
			'compare' => 'LIKE'
		));
		endif;
		if ($horarioId != '0' && $horarioId != ''):
			array_push($meta_query, array(
			'key' => 'horario', // name of custom field
			'value' => '"' . $horarioId . '"',
			'compare' => 'LIKE'
		));
		endif;
		if ($localizacaoId != '0' && $localizacaoId != ''):
			array_push($meta_query, array(
			'key' => 'localizacao', // name of custom field
			'value' => '"' . $localizacaoId . '"',
			'compare' => 'LIKE'
		));
		endif;
		if ($areaId != '0' && $areaId != ''):
			array_push($meta_query, array(
			'key' => 'area_formacao', // name of custom field
			'value' => '"' . $areaId . '"',
			'compare' => 'LIKE'
		));
		endif;
		$order = 'ASC';
		$orderBy = 'meta_value date';
		$post_type = 'formacao';
		$postId = $wp_query->post->ID;
		$links = getNextAndPreviousLinks($order, $orderBy, $post_type, $meta_query, $postId, $queryString, 'home_data');
		$parent_url = str_replace(home_url() , "", $parent_url . $queryString);
		?>
		Edit.modules.collection.push({type:'innerNavigation',instance:new Edit.modules.innerNavigation('<?php echo $links["next"]; ?>','<?php echo $links["prev"]; ?>','<?php echo $parent_url; ?>')})
		Edit.pageLoader.totalModules = 2;
		Edit.modules.isoModuleResponsive.init();
	});
</script>