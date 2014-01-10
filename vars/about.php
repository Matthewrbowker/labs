<?php
$dir = $_GET["tool"];

$versions = parse_ini_file('versions.ini', true);

$color = $versions["$dir"]["color"];
$author = $versions["$dir"]["author"];
$font = $versions["$dir"]["font"];
$name = $versions["$dir"]["name"];
$version = $versions["$dir"]["version"];

$color="#$color" or die('Colour problem.');

?>
<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN' 'http://www.w3.org/TR/html4/loose.dtd'>
<HTML>
<HEAD>
<TITLE>
About - <?=$name?>
</title>
<meta http-equiv='Content-Type' content='text/htmlcharset=utf-8' >
<link rel="stylesheet" href="../scripts/css.php?color=ffffff" />
</head>
<body>
<table width='95%'>
<tr>
<td bgcolor='<?=$color?>'><font color='<?=$font?>'><?=$name?></font></td>
</tr>
</table>
<H3>
About <?=$name?>
</H3>
<br>
<center>Version <?=$version?></center>
<hr>
This tool is written by <?=$author?> and hosted on Toolserver.
<br><br>
All of the code is released under the <a href='http://www.gnu.org/copyleft/gpl.html' target=_blank>GNU General Public Licence.</a>
<br><br>
<center>
<a href='#' onclick='javascript:self.close()'>X&nbsp;&nbsp;&nbsp;Close this window</a>
</center>
</body>
</html>