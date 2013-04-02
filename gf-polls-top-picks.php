<?php 
/******************************************

Plugin Name: Gravity Forms Polls Top Picks
Description: A way to grab the Top 5, 10, etc. picks of your GF Poll
Author: Roy Sivan
Version: 1.0
Author URI: http://www.roysivan.com/
/***************  LICENSE   **********************
This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

******************************************/

function GFTop($atts){

	extract( shortcode_atts( array(
		'total' => '5',
		'formid' => '1',
		'poll_input' => '1'
	), $atts ) );

	$poll_input = $poll_input-1;
	$MyResults = new GFPolls();
	$summary = $MyResults->gpoll_get_results($formid);
	$entries = $summary['fields'][$poll_input]['inputs'];
	
	$UnSortedResults = array();
	foreach($entries as $entry){
		$UnSortedResults[$entry['label']] = $entry['total_entries'];
	}
	arsort($UnSortedResults);
	$i = 1;
	$output = '<ul>';
	foreach($UnSortedResults as $key=>$value ){
		if($i <= $total){
			$output .= '<li>'.$key.'</li>';
		}
	$i++;
	}
	$output .= '</ul>';	
	
	return $output;
}
add_shortcode( 'gftop', 'GFTop' );

?>