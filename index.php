<?php
require("cgi-bin/functions.php");
require("cgi-bin/vars.php");

$start = starttime();

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<title>
$sitename
</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"cgi-bin/master.css\">
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\">\r";
genheader($_SERVER['REQUEST_URI']);
echo "\r
Hello and welcome!  I'm <a href=\"http://en.wikipedia.org/wiki/User:Matthewrbowker\" target=_blank>Matthew</a> and these are my tools:

<br>
<H3>Tools:</H3>
I have the following tools avalible:
<br>
<br>
<b>Bots</b>
<ul>
<li><a href=\"WikiWelcomer\">WikiWelcomer</a> -  Welcomes people onto IRC.</li>
<li><a href=\"matthewrbot\">Matthewrbot</a> - Handles tasks related to Requested Articles
</ul>
<b>Tools</b>
<ul>
<li><a href=\"projectinfo\">Project Information tool</a> - shows information about different projects.
<li><a href=\"serverinfo\">Toolserver Database Information tool</a> - allows you to check which server a specific language's database is mirrored on Toolserver.
<li><a href=\"CNRD\">Cross-Namespace Redirects</a> - shows redirects outside of their namespace.
</ul>
If you need to contact me, please do so <a href=\"http://en.wikipedia.org/w/index.php?title=User_talk:Matthewrbowker&action=edit&section=new\" target=_blank>on my English Wikipedia talk page</a>.  If you'd like the source code for my tools, please visit <a href=\"http://svn.toolserver.org/svnroot/matthewrbowker\" target=_blank>the SVN repository I maintain</a>.\r";
endtime($start);
genfooter();
echo "</body>
</html>";
?>