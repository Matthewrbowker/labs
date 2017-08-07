<?php
include("../includes.php");

$config = new config();

$dir = "root";

if (isset($_GET["tool"])) {
    $dir = $_GET["tool"];
}

$versions = $config->getTool($dir);

$site = new site($config, false);

$color = $versions["color"];
$author = $versions["author"];
$font = $versions["font"];
$name = $versions["name"];
$version = $versions["version"];

$color="#$color" or die('Colour problem.');

$site->assign("color", $color);
$site->assign("author", $author);
$site->assign("font", $font);
$site->assign("name", $name);
$site->assign("version", $version);

$site->Display("about");