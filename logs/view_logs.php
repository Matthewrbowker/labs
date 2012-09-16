<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

$tool = $_GET['tool'];

$tool = strtolower($tool);

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Logs $sep $tool $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\r";

genheader();

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

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>