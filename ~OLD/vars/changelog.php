<?php
require("../includes.php");

$dir = $_GET['tool'] or $dir = "root";

$versions = parse_ini_file('versions.ini', true);

$color = $versions["$dir"]["color"];
$font = $versions["$dir"]["font"];
$name = $versions["$dir"]["name"];
$log = $versions["$dir"]["changelog"];

$site = new site(false);

$color = "#$color";

if (!file_exists("logs/$log.ini")) {
$data = array( 0 => array ("version" => "Error!", "changes" => "<font color=\"red\">There was an error finding your log file.  Sorry.</font>" ) );
}

else {
$data = parse_ini_file("logs/$log.ini", true);
}

$totnum = count($data) - 1;

$buffer = "";

while (0 <= $totnum) {
$changes = $data[$totnum]['changes'];

$changes = str_replace("\n","</li>\r<li>",$changes);
$buffer .= "<H4>" . $data[$totnum]['version'] . "</H4>\r
<UL>
<li>" . $changes . "</li>
</UL>\r\r";

$totnum = $totnum-1;

}

$site->assign("clcontents", $buffer);
$site->assign("color", $color);
$site->assign("font", $font);
$site->assign("name", $name);

$site->Display('changelog');
