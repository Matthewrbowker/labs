<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

if (ISSET($_GET['lang'])) $lang = $_GET['lang'];
else $lang = 'en';

genheader();

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>