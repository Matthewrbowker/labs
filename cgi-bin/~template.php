<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
NAME $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\r";

genheader('000000','white','NAME','LOG','0_1','no','');

echo "STUFF GOES HERE";

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>