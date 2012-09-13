<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');

$start = starttime();

$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('sql-user-m.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);

mysql_select_db('toolserver', $db) or die('Unable to contact database');

$query_ns="SELECT `ns_id`,`ns_name` FROM `namespace` WHERE `dbname`='enwiki_p' AND `ns_id`>=0 AND `ns_name`!='Thread' AND `ns_name`!='Thread talk' AND `ns_name`!='Summary' AND `ns_name`!='Summary talk' ORDER BY `ns_id` ASC";

$result_ns=mysql_query($query_ns);

$num_ns=mysql_numrows($result_ns);

$tot_ns=0;

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Article Information $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >
</HEAD>
<body>";

genheader();

echo "<br>
<form action=\"answer.php\" method=\"get\">
<select name=\"ns\">";

while ($tot_ns < $num_ns)
{
$ns_id=mysql_result($result_ns,$tot_ns,"ns_id");
$ns_name=mysql_result($result_ns,$tot_ns,"ns_name");

if ($ns_name == '') {$ns_name='(Article)';}

echo "<option value='$ns_id'>$ns_name</option>\r";

$tot_ns++;
}

echo "\r</select>
<input type=\"text\" name=\"article\" width=\"80\"></input>

<input type=\"submit\" value=\"Go!\"></input>
</form>\r";
endtime($start);
genfooter();
echo "\r
</body>
</HTML>";
?>