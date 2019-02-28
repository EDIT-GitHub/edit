<?php
/**
 * Membership implementation for tv record
 *
 * @version 1.0
 * @author Nuno Ildefonso
 */

/////////////////////////////////////////
// Navigation Walkers
////////////////////////////////////////
class Header_Walker extends Walker {
    // Set the properties of the element which give the ID of the current item and its parent
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    private static $counter = 1;

    // Displays start of a level. E.g '<ul>'
    // @see Walker::start_lvl()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
    }
    
    // Displays end of a level. E.g '</ul>'
    // @see Walker::end_lvl()
    function end_lvl( &$output, $depth = 0, $args = array() )  {
    }
    
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 )  {
        global $post;
        
        $home = get_home_url();
        
        if($depth == 0){
            $dataSub = $item->hasChildren ? 'data-sub="menuId'.$item->ID.'"' : '';
            $activeClass = '';
            
            if(isset($item->classes) && isset($post)){
                $activeClass = in_array('current_page_item', $item->classes) || in_array('current-menu-ancestor', $item->classes) || in_array('current-menu-item', $item->classes) ? 'active' : '';
            }
            $url = empty($item->url) ? '': 'href="'.$item->url.'"';
            
            $url = str_replace($home,"",$url);
            
            $output.='<li class="'.$activeClass.' '.$item->classes[0].'" '.$dataSub.'><a '.$url.'><div class="bullet"></div>'.$item->title.'</a>';
            self::$counter++;
        }
    }
    
    // Displays end of an element. E.g '</li>'
    // @see Walker::end_el()
    function end_el( &$output, $item, $depth = 0, $args = array() )  {
        if($depth == 0){
            $output.='</li> ';
        }
        
    }    
    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

class Footer_Walker extends Walker {
    // Set the properties of the element which give the ID of the current item and its parent
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    private static $counter = 1;

    // Displays start of a level. E.g '<ul>'
    // @see Walker::start_lvl()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
    }
    
    // Displays end of a level. E.g '</ul>'
    // @see Walker::end_lvl()
    function end_lvl( &$output, $depth = 0, $args = array() )  {
    }
    
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 )  {
        global $post;
        
        $home = get_home_url();
        
        if($depth == 0){
            $dataSub = $item->hasChildren ? 'data-sub="menuId'.$item->ID.'"' : '';
            $activeClass = '';
            
            if(isset($item->classes) && isset($post)){
                $activeClass = in_array('current_page_item', $item->classes) || in_array('current-menu-ancestor', $item->classes) || in_array('current-menu-item', $item->classes) ? 'active' : '';
            }
            $url = empty($item->url) ? '': 'href="'.$item->url.'"';
            
            $url = str_replace($home,"",$url);
            
            $output.='<li class="'.$activeClass.' '.$item->classes[0].'" '.$dataSub.'><a '.$url.'><div class="bullet"></div>'.$item->title.'</a>';
            self::$counter++;
        }
    }
    
    // Displays end of an element. E.g '</li>'
    // @see Walker::end_el()
    function end_el( &$output, $item, $depth = 0, $args = array() )  {
        if($depth == 0){
            $output.='</li> ';
        }
        
    }    
    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

class Header_Social_Walker extends Walker {
    // Set the properties of the element which give the ID of the current item and its parent
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    private static $counter = 1;

    // Displays start of a level. E.g '<ul>'
    // @see Walker::start_lvl()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output.= '';
    }
    
    // Displays end of a level. E.g '</ul>'
    // @see Walker::end_lvl()
    function end_lvl( &$output, $depth = 0, $args = array() )  {
        $output.= '';
    }
    
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 )  {
        global $post;
        
        $home = get_home_url();
        
        if($depth == 0){
            $activeClass = '';
            $templatePart = '';
            if(isset($item->classes) && isset($post)){
                $activeClass = $item->classes[0];
            }
            $url = empty($item->url) ? '': 'href="'.$item->url.'"';
            
            $url = str_replace($home,"",$url);
            $templatePart =  load_template_part('images/assets/svg/inline/icon', $item->description);
            $output.='<a '.$url.' target="_blank" class="header-social-link no-route '. $activeClass .'"><div class="icon">'.$templatePart.'</div></a>';
            self::$counter++;
        }
    }
    
    // Displays end of an element. E.g '</li>'
    // @see Walker::end_el()
    function end_el( &$output, $item, $depth = 0, $args = array() )  {
    }    
    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

class Footer_Social_Walker extends Walker {
    // Set the properties of the element which give the ID of the current item and its parent
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
    private static $counter = 1;

    // Displays start of a level. E.g '<ul>'
    // @see Walker::start_lvl()
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output.= '';
    }
    
    // Displays end of a level. E.g '</ul>'
    // @see Walker::end_lvl()
    function end_lvl( &$output, $depth = 0, $args = array() )  {
        $output.= '';
    }
    
    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 )  {
        global $post;
        
        $home = get_home_url();
        
        if($depth == 0){
            $activeClass = '';
            $templatePart = '';
            if(isset($item->classes) && isset($post)){
                $activeClass = $item->classes[0];
            }
            $url = empty($item->url) ? '': 'href="'.$item->url.'"';
            
            $url = str_replace($home,"",$url);
            $templatePart =  load_template_part('images/assets/svg/inline/icon', $item->description);
            $output.='<a '.$url.' target="_black" class="footer-social-link no-route '. $activeClass .'"><div class="icon">'.$templatePart.'</div></a>';

            self::$counter++;
        }
    }
    
    // Displays end of an element. E.g '</li>'
    // @see Walker::end_el()
    function end_el( &$output, $item, $depth = 0, $args = array() )  {
    }    
    function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        // check, whether there are children for the given ID and append it to the element with a (new) ID
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}