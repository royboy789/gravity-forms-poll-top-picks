<?php 
/******************************************

Plugin Name: Gravity Forms Polls Top Picks
Description: A way to grab the Top 5, 10, etc. picks of your GF Poll
Author: Roy Sivan
Version: 1.0
Author URI: http://www.roysivan.com/
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