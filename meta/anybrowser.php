<?php
require("../cgi-bin/functions.php");
require("../cgi-bin/vars.php");

$site = new site();

$site ->gen_opening();
?>

This site has been tested on the following browsers:
<ul>
<li>Internet Explorer: 9, 10</li>
<li>Mozilla Firefox: 18, 22.0a2, 23a1</li>
<li>Google Chrome: 26</li>
<li>Opera: 12.13</li>
<li>Safari for Mac: 6.0.3</li>
<li>Lynx: 2.8.7</li>
</ul>
<br><br>
For more information about the anybrowser campaign

<?
$site -> gen_closing();
?>