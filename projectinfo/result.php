<?php
require('../includes.php');

$site = new site();

$type=$_GET["type"];
$lang=$_GET["lang"];
$family=$_GET["family"];

$db = mysql_connect($tsServer, $sqlUser, $sqlPw);

mysql_select_db($tsDb, $db) or die('Unable to contact database');

$type=strip_tags($type);
$lang=strip_tags($lang);
$family=strip_tags($family);

$type=mysql_real_escape_string($type);
$lang=mysql_real_escape_string($lang);
$family=mysql_real_escape_string($family);


if ($lang!='alllangs' and $lang!='multi-langs') { $langquerypart="`lang`='$lang'"; }
elseif ($lang=='multi-langs') {$langquerypart="`is_multilang`=1"; }
else {$langquerypart="none"; }

if ($family!='allprojects') { $familyquerypart="`family`='$family'"; }

if ($family=='allprojects' and $langquerypart=='none') { $querypart="1"; }
elseif ($langquerypart=='none') {$querypart="$familyquerypart"; }
elseif ($family=='allprojects') {$querypart="$langquerypart"; }
else { $querypart="$langquerypart AND $familyquerypart"; }

if ($type=='basic') {$query="SELECT `dbname`,`lang`,`family`,`is_closed`,`domain` FROM `wiki` WHERE $querypart LIMIT 30;";}
else {$query="SELECT * FROM `wiki` WHERE $querypart LIMIT 30;";}
$result=mysql_query($query) or die('Error in query');
$num=mysql_numrows($result);

$site -> gen_opening();

echo "<br>";

if ($num==0) { echo "<H2><font color='#550000'>Your search returned no results.</font></H2>"; }

$tot=0;

if ($type=='basic')
	{
	while ($tot < $num) {
	$dbname=mysql_result($result,$tot,"dbname");
	$language=mysql_result($result,$tot,"lang");
	$family=mysql_result($result,$tot,"family");
	$is_closed=mysql_result($result,$tot,"is_closed");
	$domain=mysql_result($result,$tot,"domain");
	
	$family=ucwords($family);
	
	echo "<H2>$dbname</H2>";
	if ($domain!='') { echo "<a href='http://$domain' target=_blank>http://$domain</a><br>"; }
	echo "<b>Language:</b> $language<br>";
	echo "<b>Project:</b> $family<br>";
	if ($is_closed!='1') { echo '<span style="color:green;">Project is open!</span><br>';}
	echo '<hr>';

	$tot++;
	}
}

elseif ($type=='full')
	{
	while ($tot < $num) {
	$dbname=mysql_result($result,$tot,"dbname");
	$language=mysql_result($result,$tot,"lang");
	$family=mysql_result($result,$tot,"family");
	$domain=mysql_result($result,$tot,"domain");
	$is_meta=mysql_result($result,$tot,"is_meta");
	$is_closed=mysql_result($result,$tot,"is_closed");
	$is_multilang=mysql_result($result,$tot,"is_multilang");
	$server=mysql_result($result,$tot,"server");
	$script_path=mysql_result($result,$tot,"script_path"); 

	$family=ucwords($family);
	
	echo "<H2>$dbname</H2>";
	echo "<b>Language:</b> $language<br>";
	echo "<b>Project:</b> $family<br>";
	if ($is_closed!='1') { echo "<a href='http://$domain' target=_blank>http://$domain</a><br>"; }
	echo "<b>Database server on <a href='http://toolserver.org/' target=_blank>Toolserver</a>:</b> Server $server<br>";
	echo "<b>Script path (location of the API, etc.):</b> http://$domain$script_path<br>";
	if ($is_meta=='1') { echo 'Project is a meta project.<br>';}
	if ($is_multilang=='1') { echo 'Project is a multi-language project.<br>';}
	if ($is_closed!='1') {echo '<span style="color:green;">Project is open!</span><br>';}

	echo '<hr>';
	$tot++;
	}
}

else { die('Unable to display information.'); }
echo "\r<a href=\"index.php\">&lt; Try another search</a>\r";

$site -> gen_closing();
?>