<?php
require('functions.php');
require('vars.php');
$start = starttime();

$dir = $_GET['tool'];

$versions = parse_ini_file('versions.ini', true);

$color = $versions["$dir"]["color"];
$font = $versions["$dir"]["font"];
$name = $versions["$dir"]["name"];
$log = $versions["$dir"]["changelog"];

/*$log = $_GET['log'] or die('Error getting log');
$color = $_GET['color'] or die('Error getting log');
$font = $_GET['font'] or die('Error getting log');
$name = $_GET['name'] or die('Error getting log');*/

$color = "#$color";

if (!file_exists("logs/$log.ini")) {
$data = array( 0 => array ("version" => "Error!", "changes" => "<font color=\"red\">There was an error finding your log file.  Sorry.</font>" ) );
}

else {
$data = parse_ini_file("logs/$log.ini", true);
}

$totnum = count($data);

$totnum = $totnum-1;

echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>\r
<HTML>
<HEAD>
<TITLE>
Changelog - $name
</TITLE>
<meta http-equiv='Content-Type' content='text/html;charset=utf-8' >
</HEAD>
<BODY>
<table width='95%'>
<tr>
<td bgcolor='$color'><font color='$font'>$name</font></td>
</tr>
</table>
<H1>Changelog</H1>\r";

while (0 <= $totnum) {
$changes = $data[$totnum]['changes'];

$changes = str_replace("\n","</li>\r<li>",$changes);
echo "<H3>" . $data[$totnum]['version'] . "</H3>\r
<UL>
<li>" . $changes . "</li>
</UL>\r\r";

$totnum = $totnum-1;

}

echo "\r
<center>
<a href='#' onclick='javascript:self.close()'>X&nbsp;&nbsp;&nbsp;Close this window</a>\r
</center>";
endtime($start);
echo "</BODY>
</HTML>";

?>