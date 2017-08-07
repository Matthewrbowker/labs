<?php
require("../includes.php");

$config = new config();

$dir = "root";

if (isset($_GET["tool"])) {
    $dir = $_GET["tool"];
}

$versions = $config->getTool($dir);

$color = $versions["color"];
$font = $versions["font"];
$name = $versions["name"];
$log = $versions["changelog"];

$site = new site($config, false);

$color = "#$color";

$file = $config->get("rootDirectory") . "vars/logs/$log.ini";

if (!file_exists($file)) {
$data = array( 0 => array ("version" => "Error!", "changes" => "<font color=\"red\">There was an error finding your log file.  Sorry.</font>" ) );
}

else {
$data = parse_ini_file($file, true);
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
