<?php 
//----------------------------------------------------------------------------------
//  Register Front-End Styles And Scripts
//----------------------------------------------------------------------------------


$GLOBALS['version'] = '8.7.6';


function prefix_add_footer_styles() {
	
	$environment = ENVIRONMENT;
	$edit_theme_version = $GLOBALS['version'];

	wp_register_style( 'edit-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300' );
	wp_register_style( 'edit-brandon-grotesque', 'https://use.typekit.net/jrx3kxo.css' );
	wp_register_style( 'edit-slick-css', get_template_directory_uri() . '/scripts/slick/slick.css',  '', $edit_theme_version );
	wp_register_style( 'edit-slick-css-theme', get_template_directory_uri() . '/scripts/slick/slick-theme.css',  '', $edit_theme_version );
	wp_register_style( 'edit-profissoes', get_template_directory_uri() . '/css/profissoes.css',  '', $edit_theme_version );

	wp_register_style( 'edit-dev-devicon', get_template_directory_uri() . '/css/devicon.min.css', '', $edit_theme_version );

	wp_register_style( 'edit-devicon', get_template_directory_uri() . '/dist/css/devicon.min.css', '', $edit_theme_version );

	/* edit-dev-styles e edit-styles são incluídos no header para que o viewport-bugfill.js funcione em produção */
	if ($environment == 'development'):
		/* Enqueue styles */
		wp_enqueue_style('edit-roboto');
		wp_enqueue_style('edit-brandon-grotesque');
		wp_enqueue_style('edit-dev-devicon');
	else:
		/* Enqueue styles */
		wp_enqueue_style('edit-roboto');
		wp_enqueue_style('edit-brandon-grotesque');
		wp_enqueue_style('edit-devicon');
	endif;
};

function edit_theme_assets() {

  	// Register theme styles
	$environment = ENVIRONMENT;
	$edit_theme_version = $GLOBALS['version'];

	// Register theme dev styles
	wp_register_style( 'edit-dev-styles', get_template_directory_uri() . '/css/styles.css',  '', $edit_theme_version );

	// Register theme prod styles
	wp_register_style( 'edit-styles', get_template_directory_uri() . '/dist/css/styles.min.css', '', $edit_theme_version );

	/* Enqueue prod and dev styles */
	if ($environment == 'development' || $environment == 'development-es'):
		wp_enqueue_style('edit-dev-styles');
	else:
		wp_enqueue_style('edit-styles');
	endif;
	
	

	// Register theme scripts
	wp_register_script( 'edit-waypoints', 'https://cdn.jsdelivr.net/npm/waypoints@4.0.1/lib/jquery.waypoints.min.js', 'jquery', null, true);
	wp_register_script( 'edit-gdpr', get_template_directory_uri() . '/scripts/gdpr-cookie.js', '',  $edit_theme_version, true );
	wp_register_script('edit-modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.2/modernizr.min.js', '', null, false);
	wp_register_script( 'edit-fancybox', 'https://cdn.jsdelivr.net/npm/fancybox@2.1.6/dist/js/jquery.fancybox.min.js', 'jquery',  null, true );
	wp_register_script( 'edit-swiper', 'https://cdn.jsdelivr.net/npm/swiper@4.4.6/dist/js/swiper.min.js', 'jquery',  $edit_theme_version, true );
	wp_register_script( 'edit-slick', 'https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js', 'jquery',  $edit_theme_version, true );

	
	if ($environment == 'production' || $environment == 'production-es' || $environment == 'staging' || $environment == 'staging-es'):

		// Register unused scripts
		wp_deregister_script( 'wp-embed' );

		// Register theme prod scripts
		wp_register_script( 'edit-scripts', get_template_directory_uri() . '/dist/js/app.js', 'jquery',  $edit_theme_version, true );
		
		/* Enqueue Scritps */
		wp_enqueue_script( 
			array(
				'jquery',
				'edit-waypoints',
				'edit-scripts',
				'edit-fancybox',
				'edit-swiper',
				'edit-slick'
			)
		);
	else:
		// Register unused scripts
		wp_deregister_script( 'wp-embed' );
		// Register theme dev scripts
		wp_register_script( 'edit-dev-viewport-bugfill', get_template_directory_uri() . '/scripts/third/plugins/viewport-bugfill.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-MultiFilter', get_template_directory_uri() . '/scripts/massive/plugins/MultiFilter.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-main', get_template_directory_uri() . '/scripts/main.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-modules', get_template_directory_uri() . '/scripts/modules.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-common', get_template_directory_uri() . '/scripts/common.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-services', get_template_directory_uri() . '/scripts/services.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-TweenMax', get_template_directory_uri() . '/scripts/third/plugins/TweenMax.min.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-is', get_template_directory_uri() . '/scripts/third/plugins/is.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-imagesLoaded', get_template_directory_uri() . '/scripts/third/plugins/imagesLoaded.pkgd.min.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-NormalizeEvents', get_template_directory_uri() . '/scripts/massive/utils/NormalizeEvents.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-typeahead', get_template_directory_uri() . '/scripts/third/plugins/typeahead.bundle.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-isotope', get_template_directory_uri() . '/scripts/third/plugins/isotope.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-packery', get_template_directory_uri() . '/scripts/third/plugins/packery.pckg.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-widget', get_template_directory_uri() . '/scripts/third/jquery.ui.widget.js', 'jquery',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-iframe-transport', get_template_directory_uri() . '/scripts/third/jquery.iframe-transport.js', 'jquery',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-fileupload', get_template_directory_uri() . '/scripts/third/jquery.fileupload.js', 'jquery',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-enquire', get_template_directory_uri() . '/scripts/third/plugins/enquire.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-lodash', get_template_directory_uri() . '/bower_components/lodash/dist/lodash.compat.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-backbone', get_template_directory_uri() . '/bower_components/backbone/backbone.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-backbone-analytics', get_template_directory_uri() . '/scripts/third/backbone.analytics.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-ScrollToPlugin', get_template_directory_uri() . '/scripts/third/plugins/ScrollToPlugin.min.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-validate', get_template_directory_uri() . '/scripts/third/plugins/jquery.validate.min.js', 'jquery',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-jquery-validate', get_template_directory_uri() . '/scripts/third/plugins/jquery.validate.extend.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-jquery-easing', get_template_directory_uri() . '/scripts/third/plugins/jquery.easing.1.3.js', 'jquery',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-TimelineMax', get_template_directory_uri() . '/scripts/third/plugins/TimelineMax.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-iscroll', get_template_directory_uri() . '/scripts/third/plugins/iscroll.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-mockjax', get_template_directory_uri() . '/scripts/third/plugins/mockjax.min.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-froogaloop', get_template_directory_uri() . '/scripts/third/plugins/froogaloop.min.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-MassiveSlider', get_template_directory_uri() . '/scripts/massive/plugins/MassiveSlider.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-canvasDetector', get_template_directory_uri() . '/scripts/third/utils/canvasDetector.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-three', get_template_directory_uri() . '/scripts/third/plugins/three.min.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-projector', get_template_directory_uri() . '/scripts/third/plugins/projector.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-canvasRenderer', get_template_directory_uri() . '/scripts/third/plugins/canvasRenderer.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-convolutionshader', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/convolutionshader.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-copyshader', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/copyshader.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-focusshader', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/focusshader.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-renderpass', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/renderpass.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-maskpass', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/maskpass.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-effectcomposer', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/effectcomposer.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-shaderpass', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/shaderpass.js', '',  $edit_theme_version, true );
		wp_register_script( 'edit-dev-bloompass', get_template_directory_uri() . '/scripts/third/plugins/postprocessing/bloompass.js', '',  $edit_theme_version, true );
	

			/* Enqueue Scritps */
			wp_enqueue_script( 
				array(
				//'edit-modernizr',
					'jquery',
					'edit-waypoints',
					'edit-dev-viewport-bugfill',
					'edit-dev-MultiFilter',
					'edit-dev-main',
					'edit-dev-modules',
					'edit-dev-common',
					'edit-dev-services',
					'edit-dev-TweenMax',
					'edit-dev-is',
					'edit-dev-imagesLoaded',
					'edit-dev-NormalizeEvents',
					'edit-dev-typeahead',
					'edit-dev-isotope',
					'edit-dev-packery',
					'edit-dev-widget',
					'edit-dev-iframe-transport',
					'edit-dev-fileupload',
					'edit-dev-enquire',
					'edit-dev-lodash',
					'edit-dev-backbone',
					'edit-dev-backbone-analytics',
					'edit-dev-ScrollToPlugin',
					'edit-dev-validate',
					'edit-dev-jquery-validate',
					'edit-dev-jquery-easing',
					'edit-dev-TimelineMax',
					'edit-dev-iscroll',
					'edit-dev-mockjax',
					'edit-dev-froogaloop',
					'edit-dev-MassiveSlider',
					'edit-fancybox',
					'edit-swiper',
					'edit-slick',
					// 'waypoints',
					// 'edit-dev-canvasDetector',
					// 'edit-dev-three',
					// 'edit-dev-projector',
					// 'edit-dev-canvasRenderer',
					// 'edit-dev-copyshader',
					// 'edit-dev-focusshader',
					// 'edit-dev-renderpass',
					// 'edit-dev-maskpass',
					// 'edit-dev-effectcomposer',
					// 'edit-dev-shaderpass',
					// 'edit-dev-bloompass',
					
				)
			);

		
	endif;
} ?>