<?php
include("../includes.php");
$dir = $_GET["tool"] or $dir = "root";

$versions = parse_ini_file('versions.ini', true);

$site = new site(false);

$color = $versions["$dir"]["color"];
$author = $versions["$dir"]["author"];
$font = $versions["$dir"]["font"];
$name = $versions["$dir"]["name"];
$version = $versions["$dir"]["version"];

$color="#$color" or die('Colour problem.');

$site->assign("color", $color);
$site->assign("author", $author);
$site->assign("font", $font);
$site->assign("name", $name);
$site->assign("version", $version);

$site->Display("about");