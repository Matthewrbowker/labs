<?php
require('../includes.php');

$site = new site();

$tool = $_GET['tool'];

$tool = strtolower($tool);

$site -> gen_opening();

echo "Please select the log file:
<br>
<ul>";
$directory = getcwd() . "/$tool";
if ($handle = opendir($directory)) { 
    while (false !== ($dir = readdir($handle))) {
        if (!is_dir($dir) && $dir!='.' && $dir!='..')
        {
			$files = explode('.',$dir);
            echo "<li><a href=\"log.php?tool=".$tool."&amp;log=".$files[0]."\">".$files[0]."</a></li>\r"; 
        }
    } 
    closedir($handle); 
}

echo "</ul>
<br>
<br>
<a href=\"index.php\">&lt; Choose another tool</a>";

$site -> gen_closing();
?>