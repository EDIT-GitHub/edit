<?php

/**
 * Utils.
 *
 * Email, Files, WP Custom code, membership and etc...
 *
 * @version 1.0
 * @author nuno.ildefonso
 */
/////////////////////////////////////////
// Auxiliary Functions
////////////////////////////////////////

#region Email

/**
 * Sends a email with the template
 * 
 * A true return value does not automatically mean that the user received the
 * email successfully. It just only means that the method used was able to
 * process the request without any errors.
 *
 * Using the two 'wp_mail_from' and 'wp_mail_from_name' hooks allow from
 * creating a from address like 'Name <email@address.com>' when both are set. If
 * just 'wp_mail_from' is set, then just the email address will be used with no
 * name.
 *
 * @since 1.0
 * 
 * @uses PHPMailer
 *
 * @param string $to Email to.
 * @param string $subject The email subject
 * @param string $template The template (must match name in ../libs/emails/ folder)
 * @param array $parameters 
 * @return bool Whether the email contents were sent successfully.
 */
function sendEmail($to, $subject, $template, $parameters){
    
    $templatePath = dirname(__FILE__) . "/emails/".$template.".html";
    $emailHtml = file_get_contents($templatePath) ;
    
    foreach ($parameters as $key => $value){
        $emailHtml = str_replace($key,$value,$emailHtml);
    }
    
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );
    
    $status = wp_mail($to, $subject, $emailHtml);
    
    remove_filter ( 'wp_mail_content_type', 'set_html_content_type' );
    
    return $status;
}

#endregion

#region Files

function getFileuploadPublicPath($fileid) {
    global $wpdb;
    $result = $wpdb->get_results($wpdb->prepare("SELECT publicpath FROM files WHERE files.id = %s", $fileid));
    return $result;
}

#endregion 

#region WP Utils

/**
 * Gets the string from the template part
 *
 * @since 1.0
 * 
 * @return string from the parcial.
 */
function load_template_part($template_name, $part_name=null) {  
    ob_start();  
    get_template_part($template_name, $part_name);  
    $var = ob_get_contents();  
    ob_end_clean();  
    return $var;  
}  

#endregion

#region Utils

/**
 * Generates random password
 *
 * @since 1.0
 * 
 * @uses PHPMailer
 *
 * @return string The GUID.
 */
function generateRandomPassword($length = 15)
{
    return substr(sha1(rand()), 0, $length);
}

/**
 * Gets a new guid 
 *
 * @since 1.0
 * 
 * @uses PHPMailer
 *
 * @return string The GUID.
 */
function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

/**
 * Gets the request headers
 *
 * @since 1.0
 * 
 * @return array Return the headers.
 */
function getHeaders(){
    $headers = array();
    foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) <> 'HTTP_') {
            continue;
        }
        $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
        $headers[$header] = $value;
    }
    
    return $headers;
}

/**
 * Gets the user ip
 *
 * @since 1.0
 * 
 * @return string The ip.
 */
function get_the_user_ip() {

    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        //check ip from share internet

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {

        //to check ip is pass from proxy

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    } else {

        $ip = $_SERVER['REMOTE_ADDR'];

    }

    return apply_filters( 'wpb_get_ip', $ip );
    
}

/**
 * Gets the string from the http get of one url
 *
 * @since 1.0
 * 
 * @return string from the parcial.
 */
function httpGet($url)
{
    $ch = curl_init();  
    
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    
    $output=curl_exec($ch);
    
    curl_close($ch);
    return $output;
}

#endregion

#region End Session

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}

#endregion


#region Ip tools

/**
 * Retrives info from the client ip
 *
 * @uses get_the_user_ip, wpdb
 * 
 * @since 1.0
 * 
 * @return array The logged User data.
 */
function detectSorceIp(){
    
    $ip = get_the_user_ip();
    
    //Search in db
    global $wpdb;
    
    $checkIp = $wpdb->get_results('SELECT request FROM ipinfodb WHERE ip ="'. $ip .'" ');        
    $response = '';    
    
    if(count($checkIp) == 0) {
        
        $response = httpGet('http://api.ipinfodb.com/v3/ip-city/?key=8573874345d32d3f854e128a00390717953ed57fbcc0c1e849b0bae7f1731fd5&ip='.$ip.'&format=json');
        
        
        $wpdb->insert( 
            'ipinfodb', 
            array( 
                'ip' => $ip,
                'request' => $response
            ), 
            array( 
                '%s',
                '%s'
            ) 
        );
    } else {
        $response = $checkIp[0]->request;
    }
    
    $obj = json_decode($response);
    
    return $obj;
}

#endregion

//Sorting

function cmpLisboa($a, $b)
{
    global $posts;
    global $ordLocal;
    

    $localizacao1 = get_post_meta($posts[$b]->ID, 'localizacao');
    $localizacao2 = get_post_meta($posts[$a]->ID, 'localizacao');
    
    
    $data1 = get_post_meta($posts[$a]->ID, 'home_data');
    $data2 = get_post_meta($posts[$b]->ID, 'home_data');
    
    
    if ($localizacao1[0] == $localizacao2[0])
    {
        if($data1[0] == $data2[0]) return 0 ;
        return ($data1[0] < $data2[0]) ? -1 : 1;
    }
    else{
        return ($localizacao1[0] < $localizacao2[0]) ? -1 : 1;
    }
}

function cmpPorto($a, $b)
{
    global $posts;
    global $ordLocal;

    $localizacao1 = get_post_meta($posts[$a]->ID, 'localizacao');
    $localizacao2 = get_post_meta($posts[$b]->ID, 'localizacao');
    
    $data1 = get_post_meta($posts[$a]->ID, 'home_data');
    $data2 = get_post_meta($posts[$b]->ID, 'home_data');
    
    
    if ($localizacao1[0] == $localizacao2[0])
    {
        if($data1[0] == $data2[0]) return 0 ;
        return ($data1[0] < $data2[0]) ? -1 : 1;
    }
    else{
        return ($localizacao1[0] < $localizacao2[0]) ? -1 : 1;
    }
}

function wp_sortDate($posts, $ordLocal){
    
    if($ordLocal == 'Lisboa'){
        uksort($posts, 'cmpLisboa');
        
    }else{
        uksort($posts, 'cmpPorto'); 
    }
    return $posts;
}


function selectOption($request,$htmlId){
    
    if(isset($_REQUEST[$request])) {
        echo '
                $("#'.$htmlId.'").find("option").each(function( i, opt ) {
                    
                    if( opt.value === "0" ) 
                        $(opt).removeAttr("selected");
                
                    if( opt.value === "'.$_REQUEST[$request].'" ){
                        $(opt).attr("selected","selected");
                        var elem = $("li[data-value='.$_REQUEST[$request].']");
console.log("Hello");
                        //elem.click();
                    }
                });
            ';   
    }
}


#region Register WP Events
//add_action( 'save_post', 'update_map_files' );
#endregion


function getNextAndPreviousLinks($order, $orderBy, $post_type, $meta_query, $postId,$queryString, $meta_key = ''){
    
    $category = '';
    $tag = '';
    $include = '';
    $exclude = '';
    $post_mime_type = '';
    $post_parent = '';
    $post_status = 'publish';
    $search = '';
    

    //Products Stuff
    
    $args = array(
           'offset'           => '',
           'showposts'        => '-1',
           's'                => $search,
           'category'         => $category,
           'tag'              => $tag,
           'include'          => $include,
           'exclude'          => $exclude,
           'order'            => $order,
           'orderby'          => $orderBy,
           'meta_query'       => $meta_query,
           'post_type'        => $post_type,
           'post_mime_type'   => $post_mime_type,
           'post_parent'      => $post_parent,
           'post_status'      => $post_status,
           //'suppress_filters' => $supress_filters
       );

    //$sessionName = 'filterCache' . md5(json_encode($args));

    //if(isset($_SESSION[$sessionName])){
    //    if($_SESSION[$sessionName] != ''){
    //        $myposts = $_SESSION[$sessionName];    
    //    }else{
    //        $myposts = get_posts( $args );
    //    }
    //}else{
    //    $myposts = get_posts( $args );
    //}
    //$_SESSION[$sessionName] = $myposts;
    $myposts = get_posts( $args );
    $total  = count($myposts);
    $position = 0;
    $nextUrl = 'undefined';
    $previousUrl = 'undefined';
    if($total > 1){
        for ($i = 0; $i < count($myposts); $i++)
        {
    	    if($myposts[$i]->ID == $postId){
                $position = $i;
                break;
            }
        }
        if($position > 0 && $position  < $total - 1){
            $next = $position+1;
            $prev = $position-1;
        


            $nextUrl = get_permalink($myposts[$next]->ID);
            $previousUrl = get_permalink($myposts[$prev]->ID);

            $nextUrl =str_replace(home_url(),"",$nextUrl.$queryString);
            $previousUrl =str_replace(home_url(),"",$previousUrl.$queryString);
        }else{
            if($position  == $total - 1){
                $nextUrl = get_permalink($myposts[0]->ID);
                $nextUrl =str_replace(home_url(),"",$nextUrl.$queryString);
                $previousUrl = get_permalink($myposts[$position-1]->ID);
                $previousUrl =str_replace(home_url(),"",$previousUrl.$queryString);
            }
            if($position  == 0){
                $nextUrl = get_permalink($myposts[$position+1]->ID);
                $nextUrl =str_replace(home_url(),"",$nextUrl.$queryString);
                $previousUrl = get_permalink($myposts[$total - 1]->ID);
                $previousUrl =str_replace(home_url(),"",$previousUrl.$queryString);
            }
        }
    }
    return array('next' => $nextUrl, 'prev' => $previousUrl);
}