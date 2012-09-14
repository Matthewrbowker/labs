<?php

function sanitize($string) {
$string = strip_tags($string);
$string = mysql_real_escape_string($string);
return $string;
}

function parse($string) {
$string=str_replace("_", " ", $string) or die("replace problem: $string");
$string=str_replace(".", "'", $string) or die("replace problem: $string");

return $string;

}

function genheader()
{

$versions = parse_ini_file('versions.ini', true);



$cwd = getcwd();
$dirarray = explode("/",$cwd);
if (ISSET($dirarray[4])) $dir = $dirarray[4];
else $dir = $dirarray[3];
$dir = strtolower($dir); 

if ($dir == '~matthewrbowker' || $dir == 'toolserver' || $dir == 'public_html') $dir = 'root';

$name = $versions["$dir"]["name"] or die("Error: This tool is not registered in Matthewrbowker's tool database.");
$version = $versions["$dir"]["version"];
$color = $versions["$dir"]["color"];
$font = $versions["$dir"]["font"];
$changelog = $versions["$dir"]["changelog"];
$home = $versions["$dir"]["home"];
$onload = $versions["$dir"]["onload"];

if ($onload !='') $onload = "," . $onload;
$onload = "checkjs()" . $onload;
$onload = " onload = \"" . $onload . "\"";

if ($home=='yes') {$hometext="You are home!";
$abouturl="cgi-bin/about.php?tool=$dir";
$abouttext="About these tools";
$changelogurl = "cgi-bin/changelog.php?tool=$dir";
$csurl = "style/master.css";
}
else {$hometext="<a href='../'>&lt; Return home</a>\n";
$abouturl="../cgi-bin/about.php?tool=$dir";
$abouttext="About this tool";
$changelogurl = "../cgi-bin/changelog.php?tool=$dir";
$csurl = "../style/master.css";
}

$changelogtext = "Change Log";

echo "<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\">
<link rel=\"stylesheet\" href=\"$csurl\" type=\"text/css\">
<script type=\"text/javascript\">\n
function about()
{
window.open('$abouturl','aboutframe','width=300,height=300,resizable=no,scrollbars=no,toolbar=no,location=no,status=no,menubar=no,copyhistory=no')
}
function changelog()
{
window.open('$changelogurl','clframe','width=600,height=600,resizable=no,scrollbars=no,toolbar=no,location=no,status=no,menubar=no,copyhistory=no')
}
function checkjs() {
     if(document) {
          document.getElementById('abouttext').style.display = 'block';
          document.getElementById('cltext').style.display = 'block';
	 }
}
</script>
<style type=\"text/css\">
#abouttext { display:none; }
#cltext { display: none; }
</style>
</head>
<body$onload>
<table width='100%' border=1>
<tr>
<td width='50%' bgcolor='$color'><font color='$font'><big>$name</big></font></td>
<td width='20%'><noscript><font color=\"red\">Error - Javascript disabled</font>
</noscript>
<div id=\"abouttext\"><a href='#' onclick='about()'>$abouttext</a></div>
</td>
<td width='20%'><noscript><font color=\"red\">Error - Javascript disabled</font>
</noscript>
<div id=\"cltext\"><a href='#' onclick='changelog()'>$changelogtext</a></div>
</td>
<td width='10%'>
$hometext
</td>
</tr>
</table>
";
}

function starttime() {
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
return $start;
}

function endtime($start) {
echo "<br><br>\r";
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo "<div align=\"right\"><small><i>Page generated in $total_time seconds.</i></small></div>\r";
}

function genfooter() {
echo "<hr width='75%'>
<p><a href='http://validator.w3.org/check?uri=referer' target=_blank><img src='http://www.w3.org/Icons/valid-html401' alt='Valid HTML 4.01 Transitional' height='31' width='88'></a>
<a href=\"http://jigsaw.w3.org/css-validator/check/referer\"><img style=\"border:0;width:88px;height:31px\" src=\"http://jigsaw.w3.org/css-validator/images/vcss\" alt=\"Valid CSS!\"></a>
<a href='http://toolserver.org/' target=_blank><img src='http://toolserver.org/images/wikimedia-toolserver-button.png' alt='Powered by Wikimedia Toolserver'></a>
<a href=\"http://www.anybrowser.org/campaign/\" target=\"_blank\"><img src=\"http://toolserver.org/~matthewrbowker/images/anybrowser.jpg\" width=\"88\" height=\"31\" alt=\"Viewable With Any Browser\"></a></p>\r";
}

?>