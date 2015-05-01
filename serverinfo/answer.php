<?php
require("../includes.php");

$site = new site();

$lang=$_GET["lang"];
$project=$_GET["family"];

$db = mysql_connect($tsServer, $sqlUser, $sqlPw);

mysql_select_db($tsDb, $db) or die('Unable to contact database');

$lang=sanitize($lang);
$project=sanitize($project);

$query="SELECT `dbname`,`server` FROM `wiki` WHERE `lang`='$lang' AND `family`='$project' LIMIT 1";
$result=mysql_query($query) or die("Error with query.");
mysql_close();

$site -> gen_opening();

?>
<br>
<a href='index.php'>&lt; Try another</a>
<div style="width:100%; text-align:center;"><H2>
<?=mysql_num_rows($result) > 0 ? "The database " . mysql_result($result,0,'dbname') . " is located on server " . mysql_result($result,0,'server') . "." : "That project ($lang, $project) is not avalable."?>
</H2></div>
<? $site -> gen_closing(); ?>