<?php

$array = explode("\n",file_get_contents("stringlist.txt"));
$buffer = file_get_contents("article.txt");
$bufferNew = file("article.txt", FILE_IGNORE_NEW_LINES);
$count = 0;
$old = array_fill(0, count($array), "Colorado Department of Public Safety");
$temp = 1;

function map($value) {
	return $value . " (Colorado) | " . $value;
}

$new = array_map("map", $array);
	
/*foreach ($array as $value) {
	echo $value;
	$buffer = preg_replace("#\Colorado Department of Public Safety\b#i", $value, $buffer, 1);
	$count++;
	}*/

//$buffer = preg_replace($old, $array, $buffer, $temp);

	$buffer = str_replace($array, $new, $buffer, $count);
	
echo "<pre>";
echo $buffer;
echo "</pre>";
echo $count . " replacements made";