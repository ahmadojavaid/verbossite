<?php
/**
Plugin Name: mqtranslate/qtranslate-slug 2 qtranslate-x migration helper
Description: Recreates the language switching like mqtranslate in qtranslate-x
Version: 1.1.0
Author: kuchenundkakao
Author URI: https://kuchenundkakao.wordpress.com
License: GPL2
*
*/

add_filter('qtranslate_detect_language', 'make_qtranslate_slug_compatible_again');
function make_qtranslate_slug_compatible_again($url_info){
if(!defined('DOING_AJAX')){
if( isset($url_info['doing_front_end']) ){
if($url_info['doing_front_end'] === TRUE){
global $q_config;
if(($q_config['hide_default_language']) && (!isset($url_info['lang_url']))){
$url_info['language'] = $q_config['default_language'];
}
}
}
}
return $url_info;
}

/* Add a function to remove false duplicate alternate hreflang tags if qtranslate_slug is installed */
add_action('get_header','remove_qts_slug_canonical');
function remove_qts_slug_canonical(){
global $qtranslate_slug;
remove_action('wp_head',array($qtranslate_slug, 'qtranslate_slug_header_extended'));
}