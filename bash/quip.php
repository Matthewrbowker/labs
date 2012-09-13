<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');

$start = starttime();

$id=$_GET['id'];

$db = mysql_connect('localhost','root','');

mysql_select_db('quips', $db) or die('Unable to contact database');

if ($id='rand') {
$countquery="SELECT COUNT( * ) FROM `quips` WHERE 1;";
$countres=mysql_query($countquery);
//$count=mysql_result($countres,0,0);

$count='2';
$count=intval($count);

$num=rand(1,$count);

$query="SELECT `quip` from `quips` where `id`=$num LIMIT 1;";
}
else {
$query="SELECT `quip` from `quips` where `id`=$id LIMIT 1;";
}

$result = mysql_query($query);

$quip = mysql_result($result,0,"quip");

$quip = str_replace('//',"<br>\r",$quip);

echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>\r";
echo "<HTML>\r";
echo "<head>\r";
echo "<TITLE>\r";
if ($id=='rand') echo "Quip #$num - Bash Quote Generator - Matthewrbowker on Toolserver\r";
else echo "Quip #$id - Matthewrbowker's Tools\r";
echo "</title>\r";
echo "<link rel='stylesheet' type='text/css' href='http://toolserver.org/~matthewrbowker/cgi-bin/master.css'>\r";
echo "<meta http-equiv='Content-Type' content='text/html;charset=utf-8'>\r";
echo "</HEAD>\r";
echo "<BODY>\r";

genheader();

if ($id=='rand') echo "<H3>Quip #$num</H3>\r";
else echo "<H3>Quip #$id</H3>\r";

echo "<br>\r$quip\r<br>\r<br>\r";
echo "<a href='index.php'>&lt; Return home</a>";
if ($id=='rand') echo " | <A HREF='quip.php?id=rand'>Another random quip &gt;</a>\r";

endtime($start);
genfooter();

echo "\r
</body>
</html>";
?>