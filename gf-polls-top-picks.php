<?php 
/******************************************

Plugin Name: Gravity Forms Polls Top Picks
Description: A way to grab the Top 5, 10, etc. picks of your GF Poll
Author: Roy Sivan
Version: 1.0
Author URI: http://www.roysivan.com/
******************************************/

define('GF Poll Top Picks', '1.0'); // The current version of prelease


$MyResults = new GFPolls();
$summary = $MyResults->gpoll_get_results('2');
$entries = $summary['fields']['0']['inputs'];

$UnSortedResults = array();
foreach($entries as $entry){
	$UnSortedResults[$entry['label']] = $entry['total_entries'];
}
arsort($UnSortedResults);
$i = 1;
foreach($UnSortedResults as $key=>$value ){
	if($i <= 10){
		echo '<li>'.$key.'</li>';
	}
$i++;
}


?>