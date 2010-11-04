<?php

/*
Plugin Name: iDevCenter
Plugin URI: http://idevcenter.com/tools/wordpress/
Description: iDevCenter integration for WordPress.

Version: 1.0.1
Author: Sepehr Lajevardi
Author URI: http://sepehr.ws/
*/
 
/**
 * iDevCenter shortcode callback.
 */
function idc_vote() {
  $base = 'http://www.idevcenter.com/links';
  $perma = rawurlencode(get_permalink($post->ID));
  $title = __('Vote on iDevCenter', 'idevcenter');
  
  return '<a href="' . $base . '/vote?url=' . $perma . '" class="idc-vote-anchor">
            <img src="' . $base . '/image?url=' . $perma . '" alt="' . $title . '" title="' . $title . '" class="idc-vote-image" />
	    		</a>';
}

/**
 * iDevCenter action callback.
 */
function idc_init(){
  if (function_exists('add_shortcode')) {
    add_shortcode('idc-vote', 'idc_vote');
  }
}

add_action('plugins_loaded', 'idc_init');

