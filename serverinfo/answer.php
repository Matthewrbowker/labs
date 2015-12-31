<?php
require("../includes.php");

$site = new site();

$lang=$_GET["lang"];
$project=$_GET["family"];

$db = mysqli_connect($tsServer, $sqlUser, $sqlPw);

mysqli_select_db($tsDb, $db) or die('Unable to contact database');

$lang=sanitize($lang);
$project=sanitize($project);

$query="SELECT `dbname`,`server` FROM `wiki` WHERE `lang`='$lang' AND `family`='$project' LIMIT 1";
$result=mysqli_query($query) or die("Error with query.");
mysqli_close();

$site -> gen_opening();

?>
<br>
<a href='index.php'>&lt; Try another</a>
<div style="width:100%; text-align:center;"><H2>
<?=mysqli_num_rows($result) > 0 ? "The database " . mysqli_result($result,0,'dbname') . " is located on server " . mysqli_result($result,0,'server') . "." : "That project ($lang, $project) is not avalable."?>
</H2></div>
<? $site -> gen_closing(); ?>