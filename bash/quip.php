<?php
require('../includes.php');

$site = new site();

$id=$_GET['id'];

$db = mysqli_connect($tsServer, $sqlUser, $sqlPw);

mysqli_select_db($tsDb, $db) or die('Unable to contact database');

if ($id='rand') {
$countquery="SELECT COUNT( * ) FROM `quips` WHERE 1;";
$countres=mysqli_query($countquery);
//$count=mysqli_result($countres,0,0);

$count='2';
$count=intval($count);

$num=rand(1,$count);

$query="SELECT `quip` from `quips` where `id`=$num LIMIT 1;";
}
else {
$query="SELECT `quip` from `quips` where `id`=$id LIMIT 1;";
}

$result = mysqli_query($query);

$quip = mysqli_result($result,0,"quip");

$quip = str_replace('//',"<br>\r",$quip);

$site -> gen_opening();

if ($id=='rand') echo "<H3>Quip #$num</H3>\r";
else echo "<H3>Quip #$id</H3>\r";

echo "<br>\r$quip\r<br>\r<br>\r";
echo "<a href='index.php'>&lt; Return home</a>";
if ($id=='rand') echo " | <A HREF='quip.php?id=rand'>Another random quip &gt;</a>\r";

$site -> gen_closing();
?>