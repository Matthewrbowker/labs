<?php
require('../includes.php');

$site = new site();

$db = mysql_connect($tsServer, $sqlUser, $sqlPw);

mysql_select_db($tsDb, $db) or die('Unable to contact database');

$site -> gen_opening();

echo "\r<br>
Which project would you like to find out about?
<br>
<form action=\"answer.php\" method=\"get\">
Language: 
<select name=\"lang\">";

$query_lang="SELECT `lang`,`english_name` FROM `language` WHERE `english_name`!=-1 ORDER BY `english_name` ASC";
$result_lang=mysql_query($query_lang);

$num_lang=mysql_numrows($result_lang);

$tot_lang=0;

while ($tot_lang < $num_lang)
{
$langcode=mysql_result($result_lang,$tot_lang,"lang");
$langname=mysql_result($result_lang,$tot_lang,"english_name");

echo "<option value='$langcode'>$langname</option>\r";

$tot_lang++;
}
echo "\r</select>
<br>
<br>
Project: 
<select name=\"family\">\r";

$query_proj="SELECT DISTINCT `family` FROM `wiki` WHERE `family` LIKE 'wiki%'";
$result_proj=mysql_query($query_proj);

$num_proj=mysql_numrows($result_proj);

$tot_proj=0;

while ($tot_proj < $num_proj)
{
$projcode=mysql_result($result_proj,$tot_proj,"family");
$projname=ucwords($projcode); 

echo "<option value='$projcode'>$projname</option>\r";

$tot_proj++;
}
echo "\r</select>
<br>
<br>
<input type=\"submit\" value=\"Find it!\"><input type=\"reset\" name=\"reset\" value=\"Reset the form\">
</form>
<br>";

$site -> gen_closing();
?>