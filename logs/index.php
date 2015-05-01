<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

echo "The following tools log their output:
<ul>";
if ($handle = opendir(getcwd())) { 
    /* loop through directory. */ 
    while (false !== ($dir = readdir($handle))) {
        if (is_dir($dir) && $dir!='.' && $dir!='..')
        {
            echo "<li><a href=\"view_logs.php?tool=".$dir."\">".ucfirst($dir)."</a></li>"; 
        }
    } 
    closedir($handle); 
}  
echo "</ul>";

$site -> gen_closing();
?>