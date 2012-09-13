<?php
$dir = $_GET["tool"];

$versions = parse_ini_file('versions.ini', true);

$color = $versions["$dir"]["color"];
$font = $versions["$dir"]["font"];
$name = $versions["$dir"]["name"];
$version = $versions["$dir"]["version"];

$color="#$color" or die('Colour problem.');

echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>\r";
echo "<HTML>\r";
echo "<HEAD>\r";
echo "<TITLE>\r";
echo "About - $name\r";
echo "</title>\r";
echo "<meta http-equiv='Content-Type' content='text/html;charset=utf-8' >\r";
echo "</head>\r";
echo "<body>\r";
echo "<table width='95%'>\r";
echo "<tr>\r";
echo "<td bgcolor='$color'><font color='$font'>$name</font></td>\r";
echo "</tr>\r";
echo "</table>\r";
echo "<H3>\r";
echo "About $name\r";
echo "</H3>\r";
echo "<center>Version $version</center>\r";
echo "<hr>\r";
echo "This tool is written by Matthew Bowker and hosted on Toolserver.\r";
echo "<br>\r";
echo "All of the code is released under the <a href='http://www.gnu.org/copyleft/gpl.html' target=_blank>GNU General Public Licence.</a>\r";
echo "<br>\r";
echo "If you have any questions, feel free to contact me <a href='http://en.wikipedia.org/w/index.php?title=User_talk:Matthewrbowker&action=edit&section=new' target=_blank>on my English Wikipedia talk page</a>.\r";
echo "<center>\r";
echo "<a href='#' onclick='javascript:self.close()'>X&nbsp;&nbsp;&nbsp;Close this window</a>\r";
echo "</center>\r";
echo "</body>\r";
echo "</html>\r";
?>