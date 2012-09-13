<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('sql-user-m.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);

mysql_select_db('u_matthewrbowker_articlerequest', $db);

//$result = mysql_query("SELECT * FROM `archived` WHERE 1");

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Archived article requests $sep Matthewrbot $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\r";

genheader();

echo "<br>
Matthewrbot is my main Wikipedia bot.  It handles tasks related to <a href=\"http://en.wikipedia.org/wiki/Wikipedia:Requested_articles\" target=_blank>the requested articles process</a>.  For more information about this bot, please visit <a href=\"http://en.wikipedia.org/wiki/User:Matthewrbot\" target=_blank>its user page</a>.";

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>