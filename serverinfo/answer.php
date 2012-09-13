<?php
require("../cgi-bin/functions.php");
require("../cgi-bin/vars.php");
$start = starttime();

$lang=$_GET["lang"];
$project=$_GET["family"];

$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('sql-user-m.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);

mysql_select_db('toolserver', $db) or die('Unable to contact database');

$lang=sanitize($lang);
$project=sanitize($project);

$query="SELECT `dbname`,`server` FROM `wiki` WHERE `lang`='$lang' AND `family`='$project' LIMIT 1";
$result=mysql_query($query) or die("Error with query.");
mysql_close();

$dbname=mysql_result($result,0,'dbname') or $end="That project ($lang, $project) is not avalable.";
$server=mysql_result($result,0,'server') or $end="That project ($lang, $project) is not avalable.";

if ($end!="That project ($lang, $project) is not avalable.")
{ $end="The database $dbname is located on server $server."; }

echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<HTML>
<HEAD>
<TITLE>
Toolserver Database Information - results for $dbname ($lang, $project) $sep $sitename
</title>
<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>\n";

genheader();

echo "<br>
<a href='index.php'>&lt; Try another</a>
<center><H2>$end</H2></center>\r";
endtime($start);
genfooter();
echo "\r</body>
</html>";
?>