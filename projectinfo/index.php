<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');

$start = starttime();

$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('sql-user-m.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);

mysql_select_db('toolserver', $db) or die('Unable to contact database');

$query_lang="SELECT `lang`,`english_name` FROM `language` WHERE `english_name`!=-1 ORDER BY `english_name` ASC";
$result_lang=mysql_query($query_lang);

$num_lang=mysql_numrows($result_lang);

$tot_lang=0;

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Project Information $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\r";

genheader();

echo "<br>
What would you like to find out about?  (Note: searches are automatically limited to thirty items.)
<br>
<br>
<form action=\"result.php\" method=\"get\">
Type of information: 
<select name=\"type\">
<option value=\"basic\" selected>Basic Information</option>
<option value=\"full\">Full Information</option>
</select>
<br>
<br>
Language: 
<select name=\"lang\">
<option value=\"alllangs\" selected>Any language</option>
<option value=\"multi-langs\">Multi-language projects</option>\r";

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
<select name=\"family\">
<option value=\"allprojects\" selected>Any Project</option>\r";

$query_proj="SELECT DISTINCT `family` FROM `wiki` WHERE `family` LIKE 'wiki%'";

$result_proj=mysql_query($query_proj);

$num_proj=mysql_numrows($result_proj);

mysql_close();

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

endtime($start);
genfooter();
echo "\r</body>
</html>";

?>