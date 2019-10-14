<?php

/**
 * functions short summary.
 *
 * functions description.
 *
 * @version 3.0
 * @author Carlos~Martinho Refact By Nuno Ildefonso
 */

/////////////////////////////////////////
// Library includes
////////////////////////////////////////


include_once dirname(__FILE__) . "/libs/enqueue-assets.php";
include_once dirname(__FILE__) . "/libs/utils.php";


if (ENVIRONMENT == 'development' || ENVIRONMENT == 'staging' || ENVIRONMENT == 'production') {
	include_once dirname(__FILE__) . "/libs/custom-post-type.php";	
    include_once dirname(__FILE__) . "/libs/forms.php";
} else {
	include_once dirname(__FILE__) . "/libs/custom-post-type-es.php";
    include_once dirname(__FILE__) . "/libs/forms-es.php";
}

include_once dirname(__FILE__) . "/libs/comments-walker.php";
include_once dirname(__FILE__) . "/libs/navigation-walkers.php";
include_once dirname(__FILE__) . "/libs/resources.php";


/////////////////////////////////////////
// Theme setup
////////////////////////////////////////
if ( ! function_exists( 'theme_setup' ) ) :

	function theme_setup() {    

        
   

    // REMOVE WP EMOJI
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    add_action( 'wp_enqueue_scripts', 'edit_theme_assets');
    add_action( 'get_footer', 'prefix_add_footer_styles');

    function my_acf_google_map_api( $api ){
        if (LANGUAGE == 'PT'):
           $api['key'] = 'AIzaSyB6tSm7bnJ_ZlWLfCLqkR0E1CDZ4LCC2wA';
       else: 
          $api['key'] = 'AIzaSyBiotkW3UhtL674UFVW_fPwgJSoDUopQCY';
      endif;
      return $api;
  }
  add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


  function add_specific_menu_location_atts( $atts, $item, $args ) {
      // add the desired attributes:

      if( $args->theme_location == 'profissoes' ) {
        $atts['class'] = 'menu-item-link no-route';
        return $atts;
    }

}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_location_atts', 10, 3 );


        // Custom mime types
function custom_mime_types($mime_types){
            $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
            $mime_types['json'] = 'application/json'; //Adding svg extension
            return $mime_types;
        }
        add_filter('upload_mimes', 'custom_mime_types', 1, 1);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
        	'primary' => __( 'Primary Menu', 'edit' ),
        	'languages' => __( 'Languages Menu', 'edit' ),
            'profissoes' => __( 'Profissoes Menu', 'edit' ),
            'footer' => __( 'Footer Menu', 'edit' ),
            'header_social' => __( 'Header Social', 'edit' ),
            'footer_social' => __( 'Footer Social', 'edit')
        ) );

        //remove margin top from adminbar
        function my_filter_head() {
        	remove_action('wp_head', '_admin_bar_bump_cb');
        }
        add_action('get_header', 'my_filter_head');

        function wpse200296_before_admin_bar_render() {
        	global $wp_admin_bar;
        	$wp_admin_bar->remove_menu('customize');
            $wp_admin_bar->remove_menu('get-shortlink');
            $wp_admin_bar->remove_menu('appearance');
            $wp_admin_bar->remove_menu('duplicate_this');
        }
        add_action( 'wp_before_admin_bar_render', 'wpse200296_before_admin_bar_render', 999 ); 

        /////////////////////////////////////////
        // Remove Menus from Admin area
        ////////////////////////////////////////
        function remove_menus(){
            remove_menu_page( 'edit.php' );
        }
        add_action( 'admin_menu', 'remove_menus', 999 );


        function set_html_content_type() {
        	return 'text/html';
        }

        /////////////////////////////////////////
        // Search Tweak
        ////////////////////////////////////////
        function my_search_is_perfect( $search, $wp_query ) {
        	global $wpdb;

        	if ( empty( $search ) )
        		return $search;

        	$q = $wp_query->query_vars;
        	$n = !empty( $q['exact'] ) ? '' : '%';

        	$search = $searchand = '';

        	foreach ( (array) $q['search_terms'] as $term ) {
        		$term = esc_sql( $wpdb->esc_like( $term ) );

        		$search .= "{$searchand}($wpdb->posts.post_title REGEXP '[[:<:]]{$term}[[:>:]]') OR ($wpdb->posts.post_content REGEXP '[[:<:]]{$term}[[:>:]]')";

        		$searchand = ' AND ';
        	}

        	if ( ! empty( $search ) ) {
        		$search = " AND ({$search}) ";
        		if ( ! is_user_logged_in() )
        			$search .= " AND ($wpdb->posts.post_password = '') ";
        	}

        	return $search;
        }
        add_filter( 'posts_search', 'my_search_is_perfect', 20, 2 );

    }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

function preview_newsletter($wp_admin_bar) {
	$queryParam = (int) '1';
	$queryParamEncoded = urlencode($queryParam);
	$currentUrl = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	//$reinsertUrlWithParam = add_query_arg('cccclr', $queryParamEncoded, $currentUrl);
    
    $post_id = $_GET['post'];
    
    $url_key = 'wM3fJ4Y2';
    $encode_post_id = $url_key.strtr(base64_encode($post_id), '+/=', '._-');

    $reinsertUrlWithParam = "/newsletter/?id=".$encode_post_id;
    $post_t = get_post_type();
    $args = array(
		'id'    => 'preview_nl',
		'title' => 'Preview Newsletter',
		'href'  => $reinsertUrlWithParam,
		'meta'  => array(
            'class' => $post_t,
            'target' => '_blank'
		)
    );
    if ($post_t=='formacao'){
        $wp_admin_bar->add_node($args);
    }
	
}
add_action('admin_bar_menu', 'preview_newsletter', 100);


function wwp_custom_query_vars_filter($vars) {
    $vars[] .= 'n_name';
    $vars[] .= 'n_email';
    return $vars;
}
add_filter( 'query_vars', 'wwp_custom_query_vars_filter' );
?>