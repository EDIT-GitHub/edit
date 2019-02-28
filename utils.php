<?php

/**
 * @version 1.0
 * @author Nuno Ildefonso
 */
/* UTILS */

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

function load_template_part($template_name, $part_name=null) {  
    ob_start();  
    get_template_part($template_name, $part_name);  
    $var = ob_get_contents();  
    ob_end_clean();  
    return $var;  
}  

/* UTILS */

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

function httpGet($url)
{
    $ch = curl_init();  
    
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    
    $output=curl_exec($ch);
    
    curl_close($ch);
    return $output;
}

//8573874345d32d3f854e128a00390717953ed57fbcc0c1e849b0bae7f1731fd5
//http://api.ipinfodb.com/v3/ip-city/?key=<your_api_key>&ip=74.125.45.100&format=json
//http://ipinfodb.com/ip_location_api_json.php
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

?>