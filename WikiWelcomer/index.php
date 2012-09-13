<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');

$start = starttime();

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<Title>
WikiWelcomer $sep $sitename
</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"http://toolserver.org/~matthewrbowker/cgi-bin/master.css\">
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\">";

genheader('2f4f4f','white','WikiWelcomer','wikiwelcomer','4_0','no','');

echo "\r<H1>WikiWelcomer</H1>
WikiWelcomer welcomes people when they join the help channel (<a href=\"ircs://freenode/wikipedia-en-help\">#wikipedia-en-help on Freenode</a>).  It is a backup system in case <a href=\"http://en.wikipedia.org/wiki/WP:HELPMEBOT\">Helpmebot</a> is down.  To activate the bot, change <a href=\"http://en.wikipedia.org/wiki/User:WikiWelcomer/control\" target=_blank>this page</a> to \"on\".</li>\r";
endtime($start);
genfooter();
echo "</body>
</html>";
?>