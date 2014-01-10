<?
require('../includes.php');

$site = new site();

$check = $_GET['value'];

if (!ISSET($check) || $check == "") {
	$site -> gen_opening();
	echo "Error getting value!";
	$site -> gen_closing();
	die();
}

$url = array('http://en.wikipedia.org/wiki/Mediawiki:Titleblacklist?action=raw|local', 'http://meta.wikimedia.org/wiki/Title_blacklist?action=raw|global');

ini_set('user_agent', "Matthewrbowker's tools/blacklist");

$cur_blacklist = 0;
$found_match = false;

$site -> gen_opening();

echo "Matching the term \"" . htmlentities($check) . "\" against the current blacklists....

<ul>";

while (count($url) > $cur_blacklist) {
	$url_array = explode("|",$url[$cur_blacklist]);
	//echo "<h2>{$url_array[1]}</H2>";
	$line_num = 0;
	$contents = file_get_contents($url_array[0]);
	$contents_array = explode("\r",str_replace(array("\r","\n"),"\r",$contents));
	foreach ($contents_array as $value) {
		$line_num++;
		//$value_new = $value;
		$value_new = trim($value);
		//$value_new = strstr($value_new, "#", true);//BUGGY
		//$value_new = substr($value_new, 0, strpos($value_new, "#"));
		$value_array = explode("#",$value_new);
		$value_new = $value_array[0];
		if ($value_new != "" && $value_new != " ") {
			//$value_final = explode(" ",$value_new);
			//$value_new = $value_final[0];
			//$value_args = $value_final[1];
			//echo $line_num . ": " . $value_new;
			$reg = "/";
			if (strpos($value_new,'\x{')) $reg.= "(*UTF8)";
			$reg .= $value_new;
			if (strpos($value_new,'\x{')) $reg.= "/u";
			else $reg.="/";
			if (preg_match($reg, $check) == 1) {
				echo "<li><span style=\"color:#ff0000;\">MATCH on line $line_num of the $url_array[1] blacklist.</span></li>";
				$found_match = true;
			}
			//echo "<br />\r";
		}
	}
	$cur_blacklist++;
}

if (!$found_match) echo "<li><span style=\"color:#00cc00;\">No match found!</span></li>";

echo "</ul>

<a href=\"index.php\">&lt; Try another search</a>";

$site -> gen_closing();

?>