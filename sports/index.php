<?php
require('../includes.php');

$site = new site();

$count = 0;

$site -> gen_opening();

$json = json_decode(file_get_contents("http://api.espn.com/v1/sports?apikey=$espnapikey"), true);

if ($json['status'] == "success" && $http_response_header[0] == "HTTP/1.1 200 OK") {
echo "<form action=\"options.php\" method=\"post\">\r";

while ($count < count($json['sports'])) {
	echo "<input type=\"hidden\" name=\"" . $json['sports'][$count]['name'] . "-api\" value=\"" . urlencode($json['sports'][$count]['links']['api']['sports']['href']) . "\">\r";
	$count++;
}
echo "<select name=\"sport\">";
$count = 0;
while ($count < count($json['sports'])) {
	echo "<option value=\"" . $json['sports'][$count]['name'] . "\">" . ucwords($json['sports'][$count]['name']) . "</option>\r";
	$count++;
}

echo "</select><input type=\"submit\" value=\"Submit form\">";
}
else {
	echo "There was a problem with the ESPN API.  ESPN's server returned \"" . $http_response_header[0] . ".\"";
}

$site -> gen_closing();
?>