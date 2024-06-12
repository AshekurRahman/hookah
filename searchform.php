<?php
add_filter('get_search_form','hookah_search_form');
if( !function_exists('hookah_search_form') ){
    function hookah_search_form(){            
        $data = '<form role="search" method="get" class="search__form" action="'.esc_url(home_url("/")).'">';
        $data .= '<input type="search" name="s" class="input__control" placeholder="'.esc_attr__("Search Here...","hookah").'" value="'.esc_attr(get_search_query()).'">';
        $data .= '<button type="submit" class="search_submit">';
		$data .= '<i class="fa-sharp fa-light fa-telescope icon"></i>';
        $data .= '</button>';         
        $data .= '</form>';
        return $data;
   }
}