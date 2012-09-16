<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

$tool = $_GET['tool'];
$log = $_GET['log'];

$file = getcwd() . "/".$tool."/".$log.".out";
$contents = file_get_contents($file);

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
". ucfirst($tool). " $sep $log $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\r";

genheader();

echo "</head>";

echo "
Viewing log file \"$log.out\"
<br>
<br>
<pre>";

echo $contents; 

echo "</pre>
<br>
<br><a href=\"index.php\">&lt; Return to tool selection</a> | <a href=\"view_logs.php?tool=$tool\">&lt; View another log for this tool</a>";

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>