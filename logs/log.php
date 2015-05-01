<?php
require('../includes.php');

$site = new site();

$tool = $_GET['tool'];
$log = $_GET['log'];

$file = getcwd() . "/".$tool."/".$log.".out";
$contents = file_get_contents($file);

$site -> gen_opening();

echo "
Viewing log file \"$log.out\"
<br>
<br>
<pre>";

echo $contents; 

echo "</pre>
<br>
<br><a href=\"index.php\">&lt; Return to tool selection</a> | <a href=\"view_logs.php?tool=$tool\">&lt; View another log for this tool</a>";

$site -> gen_closing();

?>