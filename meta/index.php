<?php
require("../cgi-bin/functions.php");
require("../cgi-bin/vars.php");

$site = new site();

$site ->gen_opening();
?>

Welcome to my meta pages!  These pages are un-related to any tool, instead; they're related to my tools as a whole.  Feel free to browse around!

<ul>
<li><a href="anybrowser.php">Any Browser Campaign</a></li>
</ul>

<?
$site -> gen_closing();
?>