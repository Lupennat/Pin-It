<?php
/*
Plugin Name: Pin It!
Plugin URI: http://www.synaestesia.com
Description: Shortcode Pinterest Embed
Version: 1.0
Author: Fabio Lelli
Author URI: http://www.synaestesia.com
License: GPLv2

Copyright 2013 Fabio Lelli (email : info@synaestesia.com)
This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

add_shortcode('pinit', 'fl_pinit_render');
wp_enqueue_script( 'fl_pin', plugins_url() . "/fl_pinit/js/pin.js", array('jquery') );

/**
*
* Render the shortcode
*
* @param array $atts shortcode attributes
*/
function fl_pinit_render($atts) {
	extract( shortcode_atts ( array(
			'board' => 'pinterest',
			'board_width' => NULL,
			'board_height' => NULL,
			'image_width' => NUll
		), $atts ) );
	if ( !is_null( $board_width ) ) {
		$board_width = "data-pin-board-width=\"$board_width\">";
	}
	if ( !is_null( $board_height ) ) {
		$board_height = "data-pin-scale-height=\"$board_height\">";
	}
	if ( !is_null( $image_width ) ) {
		$image_width = "data-pin-scale-width=\"$image_width\">";
	}
	return "<a data-pin-do='embedBoard' href='http://pinterest.com/pinterest/$board/' $board_width $board_height $image_width></a>";
}