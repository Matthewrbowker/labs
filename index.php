<?php
require("includes.php");

$site = new site();

$site ->gen_opening();

if (isset($_GET['test'])) $testserver = true;

$bots = "<ul>\n";
$tools = "<ul>\n";
$test = "<ul>\n";

$data = parse_ini_file('vars/versions.ini',true);

$keys = array_keys($data);

for($i=0,$c=count($data);$i<$c;$i++) {
	if ($data[$keys[$i]]['homepage'] == 'bot') {
		$bots .= "<li><a href=\"" . $keys[$i] . "/\">" . $data[$keys[$i]]['name'] . "</a>";
		if (isset($data[$keys[$i]]['homepagedescr']) && $data[$keys[$i]]['homepagedescr'] != '') $bots .= " - " . $data[$keys[$i]]['homepagedescr'];
		$bots .= "</li>\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == 'tool') {
		$tools .= "<li><a href=\"" . $keys[$i] . "/\">" . $data[$keys[$i]]['name'] . "</a>";
		if (isset($data[$keys[$i]]['homepagedescr']) && $data[$keys[$i]]['homepagedescr'] != '') $tools .= " - " . $data[$keys[$i]]['homepagedescr'];
		$tools .= "</li>\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == 'test') {
		$test .= "<li><a href=\"" . $keys[$i] . "/\">" . $data[$keys[$i]]['name'] . "</a>";
		if (isset($data[$keys[$i]]['homepagedescr']) && $data[$keys[$i]]['homepagedescr'] != '') $test .= " - " . $data[$keys[$i]]['homepagedescr'];
		$test .= "</li>\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == '' || !isset($data[$keys[$i]]['home'])) {
		//Do nothing
	}
	else {
		echo "<div id=\"sitenotice\"><div id=\"sn-content\">There was an error classifying \"" . $data[$keys[$i]]['name'] . ".\"</div></div><br />";
	}
}

$bots .= "</ul>";
$tools .= "</ul>";
$test .= "</ul>";

$site->assign("bots", $bots);
$site->assign("tools", $tools);
$site->assign("testserver", $testserver);
$site->assign("test", $test);

$site->Display("index");
$site->gen_closing();
