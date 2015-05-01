<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

if (!isset($_REQUEST['sport']) || !isset($_REQUEST)) {
	echo "There was a problem with the tool.  Local variable \"sport\" not set.";
}
else {
	$count = 0;
	$data = json_decode(file_get_contents(urldecode($_REQUEST[$_REQUEST['sport'] . "-api"] . "?apikey=$espnapikey")), true);
	$tot = count($data['sports'][0]['links']['api']);
	echo $tot;
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
	echo "Please choose your option:\r";
	$lookup = array_keys($data['sports'][0]['links']['api']);
	while ($count < $tot) {
		var_dump($lookup);
		echo "<form action=\"get_data.php\"><input type=\"hidden\" name=\"api\" value=\"" . urlencode($data['sports'][0]['links']['api'][$lookup[$count]]['href']) . "\"><input type=\"submit\" value=\"" . $lookup[$count] . "\"></form>\r";
		$count++;
	}
}

$site -> gen_closing();

?>