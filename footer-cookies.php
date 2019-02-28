<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package MrBones
*/
?>
<!-- START GO TOP MODULE -->
<div class="gotop-container js-gotop margin-50">
	<div class="gotop-btn">
		<div class="inner">
			<div class="border"></div>
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
			<path d="M8.191,18.968c0.586,0.586,1.535,0.586,2.121,0l4.689-4.689l4.688,4.688c0.586,0.586,1.535,0.586,2.121,0
			c0.586-0.585,0.586-1.535,0-2.121l-5.656-5.657c-0.293-0.293-0.677-0.439-1.061-0.439c-0.032,0-0.063,0.017-0.095,0.019
			c-0.03-0.002-0.06-0.018-0.09-0.018c-0.384,0-0.769,0.146-1.062,0.439l-5.656,5.657C7.605,17.432,7.605,18.382,8.191,18.968z"/>
		</svg>
	</div>
	<div class="line"></div>
	<div class="line"></div>
	<div class="line"></div>
</div>
<script>
	jQuery(document).ready(function( $ ) {
		Edit.goTop = new Edit.modules.goTop('.js-gotop');
	})
</script>
</div>
<!-- END GO TOP MODULE -->
<!-- FOOTER -->
<footer id="footer">
	<div class="footer-nav">
		<div class="grid-cont">
			<?php wp_nav_menu( array(
				'menu_item' => 'nav nav-tabs',
				'theme_location'=>'footer',
				'walker' => new Footer_Walker()
			) ); ?>
		</div>
	</div>
	<div class="footer-funcs">
		<?php
		$arguments = array(
			'offset'           => '',
			'showposts'        => '0',
			'orderby'          => 'menu_order',
			'order'            => 'ASC',
			'post_type'        => 'localizacoes',
			'suppress_filters'  => '0'
		);
		$locations = get_posts( $arguments );;
		$count = 0;
		if($locations):
			?>
			<div class="grid-cont">
				<?php
				foreach($locations as $post):
					setup_postdata($post);
					$gmap = get_field('localizacao');
					$phone = str_replace(' ','',get_field('telefone'));
					?>
					<div class="grid-1-4 footer-block-contact">
						<p class="location-name"><?php the_field('nome'); ?> <span><?php the_field('titulo'); ?></span></p>
						<p class="location-address"><?php the_field('morada_rua'); ?></p>
						<p class="location-address-details"><?php the_field('morada'); ?></p>
						<a class="location-link no-route" href="tel:<?php echo $phone; ?>"><?php the_field('telefone'); ?></a>
						<a class="location-link no-route" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
						<?php if(LANGUAGE == 'PT'): ?>
							<a href="/escola-digital-cursos-formacao-porto-lisboa/#map?loc=<?php echo $count; ?>" class="location-map-link no-route">
								<span>Mapa</span>
								<div class="btn-icon">
									<div class="inner">
										<div class="icon">
											<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
											<g>
												<g>
													<path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
													C16.5,22.828,15.828,23.5,15,23.5z" />
												</g>
												<g>
													<path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z" />
												</g>
											</g>
										</svg>
									</div>
								</div>
							</div>
						</a>
						<?php else:  ?>
							<a href="/escuela/#map?loc=<?php echo $count; ?>" class="location-map-link no-route">
								<span>Mapa</span>
								<div class="btn-icon">
									<div class="inner">
										<div class="icon">
											<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
											<g>
												<g>
													<path d="M15,23.5c-0.829,0-1.5-0.672-1.5-1.5V8c0-0.829,0.671-1.5,1.5-1.5c0.828,0,1.5,0.671,1.5,1.5v14
													C16.5,22.828,15.828,23.5,15,23.5z" />
												</g>
												<g>
													<path d="M22,16.5H8c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h14c0.828,0,1.5,0.671,1.5,1.5S22.828,16.5,22,16.5z" />
												</g>
											</g>
										</svg>
									</div>
								</div>
							</div>
						</a>
					<?php endif; ?>
				</div>
				<?php $count++; ?>
			<?php endforeach;
		endif;?>
		<div class="grid-1-4 footer-block-newsletter">
			<div class="icon">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				width="26px" height="26px" viewBox="0 0 26 26" enable-background="new 0 0 26 26" xml:space="preserve">
				<g>
					<g>
						<path fill="#DDDDDD" d="M2.36,6.705c-0.2,0-0.36,0.16-0.36,0.35v11.89c0,0.189,0.16,0.351,0.36,0.351h18.16
						c0.199,0,0.359-0.16,0.359-0.351V7.055c0-0.19-0.16-0.35-0.359-0.35H2.36z M20.52,21.295H2.36c-1.3,0-2.36-1.05-2.36-2.35V7.055
						c0-1.3,1.06-2.35,2.36-2.35h18.16c1.301,0,2.359,1.05,2.359,2.35v11.89C22.879,20.245,21.82,21.295,20.52,21.295z" />
					</g>
					<g>
						<path fill="#DDDDDD" d="M20.52,20.795H2.36c-0.77,0-1.46-0.48-1.73-1.199c-0.08-0.191-0.02-0.41,0.13-0.551l7.09-6.32
						c0.2-0.18,0.52-0.16,0.7,0.04c0.19,0.21,0.17,0.52-0.03,0.71l-6.79,6.05c0.16,0.17,0.39,0.27,0.63,0.27h18.16
						c0.24,0,0.471-0.1,0.631-0.27l-6.861-6.122c-0.209-0.19-0.229-0.5-0.039-0.71c0.182-0.2,0.5-0.22,0.699-0.04l7.17,6.39
						c0.16,0.142,0.211,0.358,0.141,0.55C21.98,20.314,21.289,20.795,20.52,20.795z" />
					</g>
					<g>
						<path fill="#DDDDDD" d="M1.73,6.475l9.71,8.66l9.71-8.66c-0.16-0.17-0.391-0.27-0.631-0.27H2.36C2.12,6.205,1.89,6.305,1.73,6.475
						z M11.44,16.305c-0.12,0-0.24-0.039-0.33-0.13L0.76,6.955c-0.15-0.14-0.21-0.36-0.13-0.55c0.27-0.72,0.96-1.2,1.73-1.2h18.16
						c0.77,0,1.461,0.48,1.74,1.2c0.07,0.19,0.02,0.41-0.141,0.55l-10.35,9.22C11.68,16.266,11.56,16.305,11.44,16.305z" />
					</g>
				</g>
			</svg>
		</div>
		<?php if(LANGUAGE == 'PT'): ?>
			<p class="footer-title">Newsletter</p>
			<p class="footer-text">Recebe as novidades todos os meses, com a newsletter da EDIT.</p>
			<div id="newNewsletterForm" style="display:none">
				<div class="logoContainer">
					<img style="width: 160px;" alt="edit-logo" src="<?php bloginfo('template_url'); ?>/dist/images/assets/svg/edit-inline.svg" />
				</div>
				<div class="titleContainer">
					<h2 class="title"><?php dictionary("NOSSAS_NOVIDADES") ?></h2>
				</div>
				<div class="form" style="">
					<div class="nl-message-container">
						<div class="nl-message">SUBSCRIÇÃO ENVIADA COM SUCESSO</div>
					</div>
					<?php else: ?>
						<p class="footer-title">Newsletter</p>
						<p id="text" class="footer-text">Regístrate aquí para conocer los eventos, cursos y novedades de EDIT..</p>
						<div id="newNewsletterForm" style="display:none">
							<div class="logoContainer">
								<img style="width: 160px;" alt="edit-logo" src="<?php bloginfo('template_url'); ?>/dist/images/assets/svg/edit-inline.svg" />
							</div>
							<div class="titleContainer">
								<h2 class="title"><?php dictionary("NOSSAS_NOVIDADES") ?></h2>
							</div>
							<div class="form" style="">
								<div class="nl-message-container">
									<div class="nl-message">ENVIADO CON ÉXITO</div>
								</div>
							<?php endif; ?>
							<form id="register-newsletter">
								<div class="wrapper">
									<div class="pane-scroll">
										<div class="slider-item">
											<div class="grid-cont">
												<div class="content v-align">
													<div class="nl-line">
														<div class="nl-colum">
															<input id="nl_nome" name="name" type="text" data-type="text" placeholder="<?php dictionary("NOME") ?>" />
														</div>
														<div class="nl-colum">
															<input id="nl_apelido" name="apelido" type="text" data-type="text" placeholder="<?php dictionary("APELIDO") ?>" />
														</div>
													</div>
													<div class="nl-line">
														<div class="nl-colum">
															<input id="nl_email" name="email" type="text" data-type="email" placeholder="EMAIL" />
														</div>
														<div class="nl-colum">
															<div id="localizacaoContainer" class="filters-holder">
																<div class="filter">
																	<select id="nl_localizacao" data-exterior-label="Localização" name="localizacao">
																		<option value><?php dictionary("Localizacao") ?></option>
																		<option value="Lisboa">Lisboa</option>
																		<option value="Porto">Porto</option>
																		<option value="Madrid">Madrid</option>
																	</select>
																</div>
															</div>
														</div>
													</div>
													<div class="nl-line">
														<div class="nl-colum70">
															<div id="interesseContainer" class="filters-holder">
																<div class="filter">
																	<select id="nl_interesse" data-exterior-label="Áreas de interesse" name="interesse">
																		<option value><?php dictionary("Areas_de_interesse") ?></option>
																		<option value="Marketing Digital">Marketing Digital</option>
																		<option value="Design Digital">Design Digital</option>
																		<option value="Frontend">Front-end</option>
																		<option value="Mobile">Mobile</option>
																		<option value="UX/UI">UX/UI</option>
																		<option value="Business">Business</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="nl-colum30">
															<div class="default-btn btn-submit" style="height:54px;width:109px;">
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
														</div>
													</div>
													<div class="nl-line" id="messageEmailReg" style="">
														<?php dictionary("Email_ja_registrado"); ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="footer-newsletter-form">
						<form id="footer-newsletter">
							<div class="row">
								<button id="footerNewsletterButton">
									<?php dictionary("Subscrever"); ?>
									<div class="btn-icon">
										<div class="border"></div>
										<div class="inner">
											<div class="icon">
												<div class="submit-icon"></div>
											</div>
										</div>
									</div>
								</button>
							</div>
						</form>
					</div>
				</div>
				<div class="grid-1-2 footer-block-social">
					<div class="footer-social-buttons">
						<?php wp_nav_menu( array( 'theme_location'=>'footer_social','walker' => new Footer_Social_Walker(), 'items_wrap' => '%3$s') ); ?>
					</div>
				</div>
				<?php if(LANGUAGE == 'PT'): ?>
					<div class="footer-bottom-bar">
						<div class="grid-1-2">
							<a href="/" class="footer-logo">
								<img src="<?php bloginfo('template_url'); ?>/images/assets/svg/footer-logo.svg" />
							</a>
							<span class="copyright">Copyright © 2018 | <b>EDIT.
								<br>
							- Disruptive Digital Education</b></span>
						</div>
						<div class="grid-1-4">
							<div class="pp">
								<a href="/politica-de-privacidade/">
									Política de Privacidade
								</a>
							</div>
						</div>
						<div class="grid-1-4">
							<div class="grid-1-2 dgert">
								<a href="http://certifica.dgert.msess.pt" target="_blank">
									<img src="<?php bloginfo('template_url'); ?>/images/assets/svg/dgert.svg">
								</a>
							</div>
						</div>
						<?php else: ?>
							<div class="footer-bottom-bar">
								<div class="grid-1-2">
									<a href="/" class="footer-logo">
										<img src="<?php bloginfo('template_url'); ?>/images/assets/svg/footer-logo.svg" />
									</a>
									<span class="copyright">Copyright © 2018 | <b>EDIT. <br>- Disruptive Digital Education</b></span>
								</div>
								<div class="grid-1-4 pp">
									<a href="/politica-de-privacidad/">
									Política de Privacidad </a>
								</div>
								<div class="grid-1-4 dgert">
									<a href="http://www.fundae.es/" target="_blank">
										<img src="<?php bloginfo('template_url'); ?>/images/assets/fundae.png">
									</a>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</footer>
			</div>
		</div>
		<!-- END FOOTER -->
		<script>
			jQuery(function ($) {
				$( "#newNewsletterForm").find('select').multifilter({
					multiselect: false,
					singlecategory: true,
					totalLabelSufix: '',
					totalLabelPrefix: '',
					totalLabelPos: 'before',
				});
				$( "#newNewsletterForm .btn-submit").click(function() {
					var nome = $( "#nl_nome").val();
					var apelido = $( "#nl_apelido").val();
					var email = $( "#nl_email").val();
					var localizacao = $( "#nl_localizacao").val();
					var interesse = $( "#nl_interesse").val();
					var valid = true;
					if (nome.length == 0) {
						$( "#nl_nome").css("border-color", "red");
						setTimeout(function () { $( "#nl_nome").css("border-color", "#d7d7d7"); }, 1000);
						var valid = false;
					}
					if (apelido.length == 0) {
						$( "#nl_apelido").css("border-color", "red");
						setTimeout(function () { $( "#nl_apelido").css("border-color", "#d7d7d7"); }, 1000);
						var valid = false;
					}
					var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
					if (!re.test(email)) {
						$( "#nl_email").css("border-color", "red");
						setTimeout(function () { $( "#nl_email").css("border-color", "#d7d7d7"); }, 1000);
						var valid = false;
					}
					if (localizacao.length == 0) {
						$( "#nl_localizacao").parent().find(".multiselect-header").css("border-color", "red");
						setTimeout(function () { $( "#nl_localizacao").parent().find(".multiselect-header").css("border-color", "#d7d7d7"); }, 1000);
						var valid = false;
					}
					if (interesse.length == 0) {
						$( "#nl_interesse").parent().find(".multiselect-header").css("border-color", "red");
						setTimeout(function () { $( "#nl_interesse").parent().find(".multiselect-header").css("border-color", "#d7d7d7"); }, 1000);
						var valid = false;
					}
					if (valid) {
						Edit.newsletter.sendModal(email, nome, apelido, localizacao, interesse);
					}
				});
			});
		</script>
		<script>
			function validateForm() {
				var x = document.forms["footer-newsletter"]["email"].value;
				var atpos = x.indexOf("@");
				var dotpos = x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
					document.getElementById('notValid').style.display = 'block';
					return false;
				}
				else {
					document.getElementById('show').style.display = 'block';
					document.getElementById('news').style.display = 'none';
					document.getElementById('text').style.display = 'none';
					document.getElementById('notValid').style.display = 'none';
				}
			}
		</script>
		<!-- END FOOTER -->
		<?php wp_footer(); ?>
		<script>
			window.viewportUnitsBuggyfill.init({
				force:true,
				refreshDebounceWait:200
			});
		</script>
		
		<?php if ( is_user_logged_in() ): ?>
			<script>
				jQuery(document).ready(function($) {
					$('a').each(function() {
						$(this).addClass('no-route');
					});
				});
			</script>
		<?php endif; ?>
		<script type="text/javascript">
			setTimeout(function () {
				var a = document.createElement("script");
				var b = document.getElementsByTagName("script")[0];
				a.src = document.location.protocol + "//script.crazyegg.com/pages/scripts/0027/3562.js?" + Math.floor(new Date().getTime() / 3600000);
				a.async = true; a.type = "text/javascript"; b.parentNode.insertBefore(a, b)
			}, 1);
		</script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places&key=AIzaSyB6tSm7bnJ_ZlWLfCLqkR0E1CDZ4LCC2wA"></script>
		<?php
		if( LANGUAGE == 'PT' && !is_page( 'politica-de-privacidade' ) && !is_user_logged_in() ): ?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					$.gdprcookie.init({
						title: false,
						message: "<svg class='cookie-svg' width='48' height='48' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M35.555 18.131c0 9.642-7.843 17.502-17.464 17.502-9.725 0-17.569-7.86-17.569-17.502C.522 8.384 8.366.524 18.091.524c9.62 0 17.464 7.86 17.464 17.607z' fill='#F5F4F4'/><path d='M35.87 18.236c0 9.118-7.53 16.559-16.733 16.559-9.307 0-16.732-7.441-16.732-16.56 0-9.117 7.53-16.558 16.732-16.558C28.34 1.572 35.87 9.013 35.87 18.236z' fill='#FFDF00'/><path d='M18.091 36.157C8.052 36.157 0 28.087 0 18.131 0 8.07 8.052 0 18.091 0c9.935 0 18.092 8.07 18.092 18.131-.105 9.956-8.157 18.026-18.092 18.026zm0-35.109c-9.411 0-17.045 7.65-17.045 17.083 0 9.432 7.634 17.083 17.045 17.083 9.412 0 17.046-7.65 17.046-17.083C35.032 8.699 27.4 1.048 18.091 1.048z' fill='#020202'/><path d='M2.928 18.131c.419.314.628.943.21 1.467-.314.42-.942.63-1.465.21-.523-.315-.627-.943-.209-1.467.314-.42 1.046-.524 1.464-.21zM4.496 18.131c.21.21.314.524.105.734-.21.21-.523.314-.732.104-.21-.21-.314-.524-.105-.733.21-.21.523-.21.732-.105z' fill='#F5F4F4'/><path d='M24.053 8.28c0 .314-.21.523-.523.523-.314 0-.523-.21-.523-.524 0-.314.209-.524.523-.524.313 0 .523.21.523.524zM9.412 12.89c0 .63-.419 1.049-1.046 1.049s-1.046-.42-1.046-1.048c0-.629.419-1.048 1.046-1.048.523 0 1.046.524 1.046 1.048zM13.908 15.51c0 .315-.21.525-.523.525-.314 0-.523-.21-.523-.524 0-.314.21-.524.523-.524.314 0 .523.21.523.524zM17.046 5.24c0 .315-.21.524-.523.524-.314 0-.523-.21-.523-.524 0-.314.21-.524.523-.524.209 0 .523.315.523.524zM22.065 12.367c0 .629-.418 1.048-1.046 1.048-.523 0-1.045-.42-1.045-1.048 0-.629.418-1.048 1.045-1.048.628 0 1.046.419 1.046 1.048zM8.994 22.742c0 .63-.418 1.048-1.046 1.048-.523 0-1.046-.419-1.046-1.048 0-.628.419-1.048 1.046-1.048.523 0 1.046.42 1.046 1.048z' fill='#020202'/><path d='M46.118 32.07c-1.569-.734-2.196-2.62-1.569-4.192-1.045.21-2.091.105-3.137-.315-2.405-1.153-3.45-3.982-2.3-6.393.209-.314.313-.629.627-.943-1.36-1.048-1.882-2.934-1.15-4.507.104-.314.313-.524.523-.838-.523-.314-.942-.524-1.465-.838-8.784-4.193-19.241-.42-23.32 8.28-4.183 8.803-.418 19.283 8.262 23.37 8.784 4.192 19.241.42 23.32-8.28.836-1.676 1.255-3.353 1.568-5.135-.418.105-.836 0-1.359-.21z' fill='#F5F4F4'/><path d='M46.117 32.07c-1.568-.734-2.195-2.62-1.568-4.192-1.046.21-2.092.105-3.137-.315-2.405-1.153-3.451-3.982-2.301-6.393.21-.314.314-.628.628-.943-1.36-.943-1.883-2.83-1.15-4.402-.105-.104-.315-.21-.42-.21-8.365-3.982-18.3-.523-22.274 7.756-3.973 8.28-.313 18.236 8.053 22.219 8.366 3.982 18.3.524 22.274-7.756.837-1.782 1.255-3.563 1.464-5.345-.523-.105-1.046-.21-1.569-.42z' fill='#FFDF00'/><path d='M44.653 34.9a13.605 13.605 0 0 1-2.614 5.554c-1.255 1.677-3.033 2.935-4.81 3.983-1.883.943-3.974 1.467-6.066 1.572-2.091.105-4.183-.21-6.065-1.048 3.974.838 8.157.314 11.607-1.468 3.556-1.781 6.38-4.82 7.948-8.593z' fill='#303030'/><path d='M16.836 38.044c.523.21.732.838.523 1.362-.21.524-.837.734-1.36.524-.522-.21-.732-.838-.522-1.362.209-.524.836-.839 1.36-.524zM18.3 37.73c.314.104.419.419.314.733-.104.314-.418.42-.732.314-.313-.104-.418-.419-.313-.733.209-.315.522-.42.732-.315z' fill='#F5F4F4'/><path d='M30.118 48c-2.614 0-5.229-.524-7.738-1.782-8.994-4.297-12.863-15.091-8.575-24.105 2.091-4.401 5.751-7.65 10.248-9.222 4.497-1.572 9.412-1.363 13.804.733.523.21 1.045.524 1.568.839.105.105.21.21.21.42 0 .104 0 .313-.105.418-.21.21-.314.42-.418.734-.628 1.362-.21 2.934.94 3.878.105.104.21.21.21.314 0 .105 0 .314-.105.42-.209.314-.418.523-.522.838-1.046 2.096-.105 4.716 1.986 5.764.837.42 1.778.524 2.72.314.209 0 .418 0 .522.21.105.105.105.314.105.524-.523 1.362 0 2.83 1.36 3.458.313.21.731.21 1.15.21.104 0 .313.105.418.21.104.104.104.314.104.419-.209 1.781-.836 3.563-1.568 5.24C43.399 44.227 36.916 48 30.118 48zm.105-35.11c-1.883 0-3.87.315-5.752.944-4.287 1.572-7.738 4.611-9.62 8.699-4.08 8.489-.419 18.655 8.051 22.742 8.471 4.087 18.615.42 22.693-8.07.628-1.362 1.15-2.934 1.36-4.402l-.941-.314c-1.57-.734-2.406-2.41-2.092-3.982-.941.104-1.778-.105-2.614-.524-2.615-1.258-3.765-4.507-2.51-7.127l.314-.629c-1.36-1.258-1.674-3.144-.942-4.82.105-.106.105-.315.21-.42-.314-.21-.628-.315-.942-.524a17.569 17.569 0 0 0-7.215-1.572z' fill='#020202'/><path d='M34.72 24.314c-.105.21-.42.42-.733.21-.209-.105-.418-.42-.209-.734.105-.21.418-.419.732-.21.21.21.314.525.21.734zM24.052 21.275c-.104.21-.418.42-.732.21-.209-.105-.418-.42-.209-.734.105-.21.418-.42.732-.21.21.21.314.525.21.734zM33.359 35.738c-.105.21-.418.42-.732.21-.21-.105-.418-.42-.21-.734.105-.21.419-.42.733-.21.209.21.313.524.209.734zM22.065 36.367c-.105.21-.418.42-.732.21-.21-.105-.418-.42-.21-.734.105-.21.419-.42.733-.21.209.105.313.42.209.734zM29.072 28.192c-.21.524-.837.734-1.36.524-.522-.314-.836-.943-.522-1.467.209-.524.836-.734 1.36-.524.522.314.731.943.522 1.467zM35.242 18.131c-.21.524-.837.734-1.36.524-.523-.21-.732-.838-.523-1.362.21-.524.837-.734 1.36-.524.523.21.732.838.523 1.362zM25.934 39.616c-.209.524-.836.733-1.36.524-.522-.315-.731-.944-.522-1.468.209-.524.836-.733 1.36-.524.627.315.836.944.522 1.468zM36.915 29.555c-.21.524-.837.733-1.36.524-.523-.21-.732-.839-.523-1.363.21-.524.837-.733 1.36-.524.523.21.732.839.523 1.363zM19.973 30.288c-.209.524-.836.734-1.36.524-.522-.21-.731-.838-.522-1.362.209-.524.836-.734 1.36-.524.522.21.836.838.522 1.362zM40.471 34.166c-.104.21-.418.42-.732.21-.209-.105-.418-.42-.209-.734.105-.21.418-.42.732-.21.21.21.314.524.21.734zM35.974 41.502c-.209.524-.836.734-1.36.524-.522-.21-.731-.838-.522-1.362.209-.524.836-.734 1.36-.524.627.21.836.838.522 1.362z' fill='#020202'/></svg><p class='title-cookies'>Política de privacidade & Cookies</p><p class='text-cookies'>Cookies são pequenos ficheiros de texto que são armazenados no seu computador ou no seu dispositivo móvel através do navegador de internet (browser), retendo apenas informação relacionada com as suas preferências, não incluindo, como tal, os seus dados pessoais. A colocação de cookies ajudará o website a reconhecer o seu dispositivo na próxima vez que o utilizador o visita.</p><p class='text-cookies'>Usamos o termo cookies nesta política para referir todos os ficheiros que recolhem informações desta forma.</p><p class='text-cookies'>Os cookies utilizados não recolhem informação que identifica o utilizador. Os cookies recolhem informações genéricas, designadamente a forma como os utilizadores chegam e utilizam os websites ou a zona do país/países através do qual acedem ao website, etc.",
						delay: 600,
						expires: 365,
						acceptBtnLabel: "Aceitar",
					});
$(document.body)
.on("gdpr:show", function() {
	$("#button-sabermais").attr("href", "/politica-de-privacidade/").text('Mais info');
})
});
</script>
<?php elseif ( !is_page( 'politica-de-privacidad') && !is_page( 'politica-de-privacidade' ) && !is_user_logged_in() ): ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$.gdprcookie.init({
			title: false,
			message: "<svg class='cookie-svg' width='48' height='48' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M35.555 18.131c0 9.642-7.843 17.502-17.464 17.502-9.725 0-17.569-7.86-17.569-17.502C.522 8.384 8.366.524 18.091.524c9.62 0 17.464 7.86 17.464 17.607z' fill='#F5F4F4'/><path d='M35.87 18.236c0 9.118-7.53 16.559-16.733 16.559-9.307 0-16.732-7.441-16.732-16.56 0-9.117 7.53-16.558 16.732-16.558C28.34 1.572 35.87 9.013 35.87 18.236z' fill='#FFDF00'/><path d='M18.091 36.157C8.052 36.157 0 28.087 0 18.131 0 8.07 8.052 0 18.091 0c9.935 0 18.092 8.07 18.092 18.131-.105 9.956-8.157 18.026-18.092 18.026zm0-35.109c-9.411 0-17.045 7.65-17.045 17.083 0 9.432 7.634 17.083 17.045 17.083 9.412 0 17.046-7.65 17.046-17.083C35.032 8.699 27.4 1.048 18.091 1.048z' fill='#020202'/><path d='M2.928 18.131c.419.314.628.943.21 1.467-.314.42-.942.63-1.465.21-.523-.315-.627-.943-.209-1.467.314-.42 1.046-.524 1.464-.21zM4.496 18.131c.21.21.314.524.105.734-.21.21-.523.314-.732.104-.21-.21-.314-.524-.105-.733.21-.21.523-.21.732-.105z' fill='#F5F4F4'/><path d='M24.053 8.28c0 .314-.21.523-.523.523-.314 0-.523-.21-.523-.524 0-.314.209-.524.523-.524.313 0 .523.21.523.524zM9.412 12.89c0 .63-.419 1.049-1.046 1.049s-1.046-.42-1.046-1.048c0-.629.419-1.048 1.046-1.048.523 0 1.046.524 1.046 1.048zM13.908 15.51c0 .315-.21.525-.523.525-.314 0-.523-.21-.523-.524 0-.314.21-.524.523-.524.314 0 .523.21.523.524zM17.046 5.24c0 .315-.21.524-.523.524-.314 0-.523-.21-.523-.524 0-.314.21-.524.523-.524.209 0 .523.315.523.524zM22.065 12.367c0 .629-.418 1.048-1.046 1.048-.523 0-1.045-.42-1.045-1.048 0-.629.418-1.048 1.045-1.048.628 0 1.046.419 1.046 1.048zM8.994 22.742c0 .63-.418 1.048-1.046 1.048-.523 0-1.046-.419-1.046-1.048 0-.628.419-1.048 1.046-1.048.523 0 1.046.42 1.046 1.048z' fill='#020202'/><path d='M46.118 32.07c-1.569-.734-2.196-2.62-1.569-4.192-1.045.21-2.091.105-3.137-.315-2.405-1.153-3.45-3.982-2.3-6.393.209-.314.313-.629.627-.943-1.36-1.048-1.882-2.934-1.15-4.507.104-.314.313-.524.523-.838-.523-.314-.942-.524-1.465-.838-8.784-4.193-19.241-.42-23.32 8.28-4.183 8.803-.418 19.283 8.262 23.37 8.784 4.192 19.241.42 23.32-8.28.836-1.676 1.255-3.353 1.568-5.135-.418.105-.836 0-1.359-.21z' fill='#F5F4F4'/><path d='M46.117 32.07c-1.568-.734-2.195-2.62-1.568-4.192-1.046.21-2.092.105-3.137-.315-2.405-1.153-3.451-3.982-2.301-6.393.21-.314.314-.628.628-.943-1.36-.943-1.883-2.83-1.15-4.402-.105-.104-.315-.21-.42-.21-8.365-3.982-18.3-.523-22.274 7.756-3.973 8.28-.313 18.236 8.053 22.219 8.366 3.982 18.3.524 22.274-7.756.837-1.782 1.255-3.563 1.464-5.345-.523-.105-1.046-.21-1.569-.42z' fill='#FFDF00'/><path d='M44.653 34.9a13.605 13.605 0 0 1-2.614 5.554c-1.255 1.677-3.033 2.935-4.81 3.983-1.883.943-3.974 1.467-6.066 1.572-2.091.105-4.183-.21-6.065-1.048 3.974.838 8.157.314 11.607-1.468 3.556-1.781 6.38-4.82 7.948-8.593z' fill='#303030'/><path d='M16.836 38.044c.523.21.732.838.523 1.362-.21.524-.837.734-1.36.524-.522-.21-.732-.838-.522-1.362.209-.524.836-.839 1.36-.524zM18.3 37.73c.314.104.419.419.314.733-.104.314-.418.42-.732.314-.313-.104-.418-.419-.313-.733.209-.315.522-.42.732-.315z' fill='#F5F4F4'/><path d='M30.118 48c-2.614 0-5.229-.524-7.738-1.782-8.994-4.297-12.863-15.091-8.575-24.105 2.091-4.401 5.751-7.65 10.248-9.222 4.497-1.572 9.412-1.363 13.804.733.523.21 1.045.524 1.568.839.105.105.21.21.21.42 0 .104 0 .313-.105.418-.21.21-.314.42-.418.734-.628 1.362-.21 2.934.94 3.878.105.104.21.21.21.314 0 .105 0 .314-.105.42-.209.314-.418.523-.522.838-1.046 2.096-.105 4.716 1.986 5.764.837.42 1.778.524 2.72.314.209 0 .418 0 .522.21.105.105.105.314.105.524-.523 1.362 0 2.83 1.36 3.458.313.21.731.21 1.15.21.104 0 .313.105.418.21.104.104.104.314.104.419-.209 1.781-.836 3.563-1.568 5.24C43.399 44.227 36.916 48 30.118 48zm.105-35.11c-1.883 0-3.87.315-5.752.944-4.287 1.572-7.738 4.611-9.62 8.699-4.08 8.489-.419 18.655 8.051 22.742 8.471 4.087 18.615.42 22.693-8.07.628-1.362 1.15-2.934 1.36-4.402l-.941-.314c-1.57-.734-2.406-2.41-2.092-3.982-.941.104-1.778-.105-2.614-.524-2.615-1.258-3.765-4.507-2.51-7.127l.314-.629c-1.36-1.258-1.674-3.144-.942-4.82.105-.106.105-.315.21-.42-.314-.21-.628-.315-.942-.524a17.569 17.569 0 0 0-7.215-1.572z' fill='#020202'/><path d='M34.72 24.314c-.105.21-.42.42-.733.21-.209-.105-.418-.42-.209-.734.105-.21.418-.419.732-.21.21.21.314.525.21.734zM24.052 21.275c-.104.21-.418.42-.732.21-.209-.105-.418-.42-.209-.734.105-.21.418-.42.732-.21.21.21.314.525.21.734zM33.359 35.738c-.105.21-.418.42-.732.21-.21-.105-.418-.42-.21-.734.105-.21.419-.42.733-.21.209.21.313.524.209.734zM22.065 36.367c-.105.21-.418.42-.732.21-.21-.105-.418-.42-.21-.734.105-.21.419-.42.733-.21.209.105.313.42.209.734zM29.072 28.192c-.21.524-.837.734-1.36.524-.522-.314-.836-.943-.522-1.467.209-.524.836-.734 1.36-.524.522.314.731.943.522 1.467zM35.242 18.131c-.21.524-.837.734-1.36.524-.523-.21-.732-.838-.523-1.362.21-.524.837-.734 1.36-.524.523.21.732.838.523 1.362zM25.934 39.616c-.209.524-.836.733-1.36.524-.522-.315-.731-.944-.522-1.468.209-.524.836-.733 1.36-.524.627.315.836.944.522 1.468zM36.915 29.555c-.21.524-.837.733-1.36.524-.523-.21-.732-.839-.523-1.363.21-.524.837-.733 1.36-.524.523.21.732.839.523 1.363zM19.973 30.288c-.209.524-.836.734-1.36.524-.522-.21-.731-.838-.522-1.362.209-.524.836-.734 1.36-.524.522.21.836.838.522 1.362zM40.471 34.166c-.104.21-.418.42-.732.21-.209-.105-.418-.42-.209-.734.105-.21.418-.42.732-.21.21.21.314.524.21.734zM35.974 41.502c-.209.524-.836.734-1.36.524-.522-.21-.731-.838-.522-1.362.209-.524.836-.734 1.36-.524.627.21.836.838.522 1.362z' fill='#020202'/></svg><p class='title-cookies'>Política de privacidad y cookies</p><p class='text-cookies'>Las cookies son pequeños archivos de texto que se almacenan en tu ordenador o dispositivo móvil a través del navegador de internet, y conserva sólo información relacionada con tus preferencias, sin incluir, como tal, tus datos personales. La colocación de cookies ayudará a la página web a reconocer tu dispositivo la próxima vez que nos visites.</p><p class='text-cookies'>Usamos el término cookies en esta política para referirnos a todos los ficheros que recogen informaciones de esta forma.</p><p class='text-cookies'>Las cookies utilizadas no recopilan información que identifique al usuario. Recogen información genérica, en particular la forma en que los usuarios llegan y usan la página web o la zona del país del cual acceden a ella, etc.",
			delay: 600,
			expires: 365,
			acceptBtnLabel: "Aceptar",
		});
$(document.body)
.on("gdpr:show", function() {
	$("#button-sabermais").attr("href", "/politica-de-privacidad/").text('Más info');
})
});
</script>
<?php endif; ?>
<script>
	window.debug = false;
	var newsletterN = '<?php echo wp_create_nonce("Edit Nonce Newsletter Form");?>';
</script>
</body>
</html>