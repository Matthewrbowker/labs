<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');

$start = starttime();

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Bash Quote Generator $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >
</HEAD>
<body>\r";

genheader();

echo "Please select your quip below:

<form action='quip.php' method='get'>
<input type='text' name='id'><input type=\"submit\" value=\"Go!\">
</form>
<br>
<br>
or ...
<br>
<br>
<a href='quip.php?id=rand'>Get a random quip!</a>\r";
endtime($start);
genfooter();
echo "</body>
</html>";