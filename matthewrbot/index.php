<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Matthewrbot $sep $sitename
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