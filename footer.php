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
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
			 y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
				<path d="M8.191,18.968c0.586,0.586,1.535,0.586,2.121,0l4.689-4.689l4.688,4.688c0.586,0.586,1.535,0.586,2.121,0
			c0.586-0.585,0.586-1.535,0-2.121l-5.656-5.657c-0.293-0.293-0.677-0.439-1.061-0.439c-0.032,0-0.063,0.017-0.095,0.019
			c-0.03-0.002-0.06-0.018-0.09-0.018c-0.384,0-0.769,0.146-1.062,0.439l-5.656,5.657C7.605,17.432,7.605,18.382,8.191,18.968z" />
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
			<div class="menu-more">
				<div class="btn-icon no-hover">
					<div class="inner">
						<div class="icon">
							<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M14 16H8C7.44772 16 7 15.5523 7 15C7 14.4477 7.44772 14 8 14H14V8C14 7.44772 14.4477 7 15 7C15.5523 7 16 7.44772 16 8V14H22C22.5523 14 23 14.4477 23 15C23 15.5523 22.5523 16 22 16H16V22C16 22.5523 15.5523 23 15 23C14.4477 23 14 22.5523 14 22V16Z"
								 fill="black" />
							</svg>
						</div>
					</div>
				</div>
				<p class="menu-title yellow reset">menu</p>

				<?php wp_nav_menu( array(
					'theme_location'=>'footer',
					'walker' => new Footer_Walker()
				) ); ?>
			</div>
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
				<p class="location-name">
					<?php the_field('nome'); ?> <span>
						<?php the_field('titulo'); ?></span></p>
				<p class="location-address">
					<?php the_field('morada_rua'); ?>
				</p>
				<p class="location-address-details">
					<?php the_field('morada'); ?>
				</p>
				<a class="location-link no-route" href="tel:<?php echo $phone; ?>">
					<?php the_field('telefone'); ?></a>
				<a class="location-link no-route" href="mailto:<?php the_field('email'); ?>">
					<?php the_field('email'); ?></a>
				<?php if(LANGUAGE == 'PT'): ?>
				<a href="/escola-digital-cursos-formacao-porto-lisboa/#map?loc=<?php echo $count; ?>" class="location-map-link no-route">
					<span>Mapa</span>
					<div class="btn-icon">
						<div class="inner">
							<div class="icon">
								<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
								 y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
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
								<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
								 y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
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
		</div>
	</div>
	<div class="footer-funcs">
		<div class="grid-cont">
			<div class="footer-block-newsletter">
				<div class="grid-1-4 nl-logo">
					<svg version="1.1" id="Layer_1" xmlns="//www.w3.org/2000/svg" xmlns:xlink="//www.w3.org/1999/xlink" x="0px" y="0px"
					 width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
						<path class="newsletter-icon" d="M-0.001,0V23.99L24.001,24V0H-0.001z M21.594,21.615H2.406V2.409h19.188V21.615z M19.725,5.457H4.67v2.41
					h15.055V5.457z M15.629,12.899h4.096v-2.41h-4.096V12.899z M15.629,17.258h4.096v-2.375h-4.096V17.258z M4.778,18.959h8.443v-8.47
					H4.778V18.959z M7.149,12.899h3.665v3.685H7.149V12.899z"></path>
					</svg>
					<p class="footer-title">Newsletter</p>
				</div>

				<?php if(LANGUAGE == 'PT'): ?>

				<div id="newNewsletterForm" style="display:none">
					<div class="logoContainer">
						<img style="width: 160px;" alt="edit-logo" src="<?php bloginfo('template_url'); ?>/dist/images/assets/svg/edit-inline.svg" />
					</div>
					<div class="titleContainer">
						<h2 class="title">
							<?php dictionary("NOSSAS_NOVIDADES") ?>
						</h2>
					</div>
					<div class="form" style="">
						<div class="nl-message-container">
							<div class="nl-message">SUBSCRIÇÃO ENVIADA COM SUCESSO</div>
						</div>
						<?php else: ?>
						<div id="newNewsletterForm" style="display:none">
							<div class="logoContainer">
								<img style="width: 160px;" alt="edit-logo" src="<?php bloginfo('template_url'); ?>/dist/images/assets/svg/edit-inline.svg" />
							</div>
							<div class="titleContainer">
								<h2 class="title">
									<?php dictionary("NOSSAS_NOVIDADES") ?>
								</h2>
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
																<input id="nl_nome" name="name" type="text" data-type="text" placeholder="<?php dictionary("NOME") ?>"
																/>
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
																			<option value>
																				<?php dictionary("Localizacao") ?>
																			</option>
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
																			<option value>
																				<?php dictionary("Areas_de_interesse") ?>
																			</option>
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
					<div class="footer-block-social">

						<div class="grid-1-4 nl-logo">
							<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M17.1384 13.3468C15.9122 13.3468 14.8307 13.9261 14.124 14.8131L7.57002 11.4897C7.65582 11.1724 7.71749 10.8446 7.71749 10.4995C7.71749 10.1239 7.64425 9.77026 7.54204 9.42614L14.0672 6.11812C14.7699 7.04527 15.8794 7.65126 17.1393 7.65126C19.2735 7.65126 21 5.93942 21 3.82516C21 1.71281 19.2735 0 17.1394 0C15.0099 0 13.2816 1.71281 13.2816 3.82512C13.2816 4.17114 13.3433 4.49992 13.43 4.8182L6.87694 8.14155C6.16939 7.25362 5.08587 6.67249 3.85778 6.67249C1.72547 6.67249 0 8.38623 0 10.4995C0 12.6128 1.72551 14.3256 3.85778 14.3256C5.11961 14.3256 6.2282 13.7177 6.93379 12.7896L13.456 16.0977C13.3538 16.4408 13.2796 16.7973 13.2796 17.1739C13.2796 19.2872 15.008 21 17.1374 21C19.2716 21 20.9981 19.2872 20.9981 17.1739C20.9991 15.0587 19.2726 13.3468 17.1384 13.3468Z"
								 fill="white" />
							</svg>
							<p class="footer-title">Social Media</p>
						</div>


						<div class="footer-social-buttons social-links-block">
							<?php wp_nav_menu( array( 'theme_location'=>'footer_social','walker' => new Footer_Social_Walker(), 'items_wrap' => '%3$s') ); ?>
						</div>
					</div>
				</div>
				<div class="grid-cont">
					<?php if(LANGUAGE == 'PT'): ?>
					<div class="footer-bottom-bar">
						<div class="wrapper-logo">
							<a href="/" class="footer-logo">
								<img src="<?php bloginfo('template_url'); ?>/images/assets/svg/footer-logo.svg" />
							</a>
							<span class="copyright">Copyright © <?php echo date('Y'); ?> | <b>EDIT. - Disruptive Digital Education</b></span>
						</div>
						<div class="grid-1-4">
							<div class="pp">
								<a href="/politica-de-privacidade/">
									Política de Privacidade
								</a>
							</div>
						</div>
						<div class="grid-1-4">
							<div class="dgert">
								<a href="http://certifica.dgert.msess.pt" target="_blank">
									<img src="<?php bloginfo('template_url'); ?>/images/assets/svg/dgert.svg">
								</a>
							</div>
						</div>
						<?php else: ?>
						<div class="footer-bottom-bar">
							<div class="wrapper-logo">
								<a href="/" class="footer-logo">
									<img src="<?php bloginfo('template_url'); ?>/images/assets/svg/footer-logo.svg" />
								</a>
								<span class="copyright">Copyright © <?php echo date('Y'); ?> | <b>EDIT. - Disruptive Digital Education</b></span>
							</div>
							<div class="grid-1-4 pp">
								<a href="/politica-de-privacidad/">
									Política de Privacidad </a>
							</div>
							<div class="grid-1-4">
								<div class="dgert">
									<a href="http://www.fundae.es/" target="_blank">
										<img src="<?php bloginfo('template_url'); ?>/images/assets/fundae.png">
									</a>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
</footer>
</div>
</div>
<!-- END FOOTER -->
<script>
	jQuery(document).ready(function ($) {
		$("#newNewsletterForm").find('select').multifilter({
			multiselect: false,
			singlecategory: true,
			totalLabelSufix: '',
			totalLabelPrefix: '',
			totalLabelPos: 'before',
		});
		$("#newNewsletterForm .btn-submit").click(function () {
			var nome = $("#nl_nome").val();
			var apelido = $("#nl_apelido").val();
			var email = $("#nl_email").val();
			var localizacao = $("#nl_localizacao").val();
			var interesse = $("#nl_interesse").val();
			var valid = true;
			if (nome.length == 0) {
				$("#nl_nome").css("border-color", "red");
				setTimeout(function () {
					$("#nl_nome").css("border-color", "#d7d7d7");
				}, 1000);
				var valid = false;
			}
			if (apelido.length == 0) {
				$("#nl_apelido").css("border-color", "red");
				setTimeout(function () {
					$("#nl_apelido").css("border-color", "#d7d7d7");
				}, 1000);
				var valid = false;
			}
			var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if (!re.test(email)) {
				$("#nl_email").css("border-color", "red");
				setTimeout(function () {
					$("#nl_email").css("border-color", "#d7d7d7");
				}, 1000);
				var valid = false;
			}
			if (localizacao.length == 0) {
				$("#nl_localizacao").parent().find(".multiselect-header").css("border-color", "red");
				setTimeout(function () {
					$("#nl_localizacao").parent().find(".multiselect-header").css("border-color", "#d7d7d7");
				}, 1000);
				var valid = false;
			}
			if (interesse.length == 0) {
				$("#nl_interesse").parent().find(".multiselect-header").css("border-color", "red");
				setTimeout(function () {
					$("#nl_interesse").parent().find(".multiselect-header").css("border-color", "#d7d7d7");
				}, 1000);
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
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
			document.getElementById('notValid').style.display = 'block';
			return false;
		} else {
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
		force: true,
		refreshDebounceWait: 200
	});
</script>

<?php if ( is_user_logged_in() ): ?>
<script>
	jQuery(document).ready(function ($) {
		$('a').each(function () {
			$(this).addClass('no-route');
		});
	});
</script>
<script type="text/javascript">

var sliderProgram = new Swiper('.slider-program', {

	
	wrapperClass: 'slider-wrapper',

	slideClass: 'frame',

	effect: 'fade',

	slideActiveClass: 'active',

	slidesPerView: '1',

	
	
	navigation: {

		nextEl: '.button-next',

		prevEl: '.button-prev',

	}


});


</script>
<?php endif; ?>

<?php if (LANGUAGE == 'PT'): ?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places&key=AIzaSyB6tSm7bnJ_ZlWLfCLqkR0E1CDZ4LCC2wA"></script>
<?php else: ?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places&key=AIzaSyBiotkW3UhtL674UFVW_fPwgJSoDUopQCY"></script>
<?php endif; ?>
<script>
	window.debug = false;
	var newsletterN = '<?php echo wp_create_nonce("Edit Nonce Newsletter Form");?>';
</script>


</body>

</html>