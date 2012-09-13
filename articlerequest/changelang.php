<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

if (ISSET($_GET['lang'])) $lang = $_GET['lang'];
else $lang = 'en';

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Change Language $sep; Article Request $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >
<script type=\"text/javascript\" src=\"categories.js\"></script>\r";

genheader();

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>