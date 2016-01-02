<?php
require('../includes.php');

$start = starttime();

$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysqli_connect('sql-user-m.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);

mysqli_select_db('u_matthewrbowker_articlerequest', $db);

//$result = mysqli_query("SELECT * FROM `archived` WHERE 1");

genheader();

echo "<br>
Matthewrbot is my main Wikipedia bot.  It handles tasks related to <a href=\"http://en.wikipedia.org/wiki/Wikipedia:Requested_articles\" target=_blank>the requested articles process</a>.  For more information about this bot, please visit <a href=\"http://en.wikipedia.org/wiki/User:Matthewrbot\" target=_blank>its user page</a>.";

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>