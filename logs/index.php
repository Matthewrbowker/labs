<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Logs $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >\r";

genheader();

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

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>