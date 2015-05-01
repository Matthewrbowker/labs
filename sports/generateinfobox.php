<?php
require("../includes.php");

$site = new site();

$count = 0;

$site -> gen_opening();

if (ISSET($_GET['sport']) && ISSET($_GET['league']) && ISSET($_GET['player'])) {
	echo $_GET['sport'];
	echo $_GET['player'];
}
else if (ISSET($_GET['league']) && ISSET($_GET['sport'])) {
	echo $_GET['league'];
	echo $_GET['sport'];
}
else if (ISSET($_GET['sport'])) {
	$json = json_decode(file_get_contents("http://api.espn.com/v1/sports/" . $_GET['sport'] . "?apikey=$espnapikey"), true);

	if ($json['status'] == "success" && $http_response_header[0] == "HTTP/1.1 200 OK") {
		echo "<form action=\"generateinfobox.php\" method=\"get\">\r";
		echo "<input type=\"hidden\" name=\"sport\" value=\"{$_GET['sport']}\">";
		echo "<select name=\"league\">";
		while ($count < count($json['sports'][0]['leagues'])) {
			echo "<option value=\"" . $json['sports'][0]['leagues'][$count]['abbreviation'] . "\">" . ucwords($json['sports'][0]['leagues'][$count]['name']) . "</option>\r";
			$count++;
		}

		echo "</select><input type=\"submit\" value=\"Submit form\">";
	}
	else {
		echo "There was a problem with the ESPN API.  ESPN's server returned \"" . $http_response_header[0] . ".\"";
	}
}
else {

	$json = json_decode(file_get_contents("http://api.espn.com/v1/sports?apikey=$espnapikey"), true);

	if ($json['status'] == "success" && $http_response_header[0] == "HTTP/1.1 200 OK") {
		echo "<form action=\"generateinfobox.php\" method=\"get\">\r";

		echo "<select name=\"sport\">";
		while ($count < count($json['sports'])) {
			echo "<option value=\"" . $json['sports'][$count]['name'] . "\">" . ucwords($json['sports'][$count]['name']) . "</option>\r";
			$count++;
		}

		echo "</select><input type=\"submit\" value=\"Submit form\">";
	}
	else {
		echo "There was a problem with the ESPN API.  ESPN's server returned \"" . $http_response_header[0] . ".\"";
	}

}
espn_api();

$site -> gen_closing();

?>