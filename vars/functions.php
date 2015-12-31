<?php

function sanitize($string) {
$string = strip_tags($string);
$string = mysqli_real_escape_string($string);
return $string;
}

function parse($string) {
$string=str_replace("_", " ", $string) or die("replace problem: $string");
$string=str_replace(".", "'", $string) or die("replace problem: $string");

return $string;

}

function sql_error_check() {
	if (mysqli_error() != '') {
		echo "<div id=\"sitenotice\">
		<div id=\"sn-content\">
		<b>ERROR:</b> " . mysqli_error() . "
		</div>
		</div>";
	}
}

function genheader() {
	/*require("vars.php");
	$versions = parse_ini_file('versions.ini', true);
	
	$cwd = getcwd();
	$dirarray = explode("/",$cwd);
	if ($dirarray[4]=='htdocs' && ISSET($dirarray[6])) $dir = $dirarray[6];
	else if (ISSET($dirarray[5])) $dir = $dirarray[5];
	else if (ISSET($dirarray[4])) $dir = $dirarray[4];
	else $dir = $dirarray[3];
	$dir = strtolower($dir); 
	
	if ($dir == '~matthewrbowker' || $dir == 'toolserver' || $dir == 'public_html' || $dir=='htdocs') $dir = 'root';
	
	$name = $versions["$dir"]["name"] or die("Error: This tool is not registered in Matthewrbowker's tool database.");
	$author = $versions["$dir"]["author"];
	$version = $versions["$dir"]["version"];
	$color = $versions["$dir"]["color"];
	$font = $versions["$dir"]["font"];
	$changelog = $versions["$dir"]["changelog"];
	$home = $versions["$dir"]["home"];
	$onload = $versions["$dir"]["onload"];
	
	if ($onload !='') $onload = "," . $onload;
	$onload = "checkjs()" . $onload;
	$onload = " onload = \"" . $onload . "\"";
	
	if ($home=='yes' || $home==true) {$hometext="You are home!";
	$abouturl="cgi-bin/about.php?tool=$dir";
	$abouttext="About these tools";
	$changelogurl = "cgi-bin/changelog.php?tool=$dir";
	$csurl = "style/master.css";
	$title = "$sitename";
	}
	else {$hometext="<a href='../'>&lt; Return home</a>\n";
	$abouturl="../cgi-bin/about.php?tool=$dir";
	$abouttext="About this tool";
	$changelogurl = "../cgi-bin/changelog.php?tool=$dir";
	$csurl = "../style/master.css";
	$title = "$name $sep $sitename";
	}
	
	$changelogtext = "Change Log";
	
	echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
	<HTML>
	<HEAD>
	<TITLE>
	$title
	</title>
	<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" ><meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\">
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
	";*/
	echo "This function is depreciated.  Please convert this page to classes";
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
echo "<div class=\"vertime\">Page generated in $total_time seconds.</div>\r";
}

function genfooter() {
/*echo "<hr width='75%'>
<p><a href='http://validator.w3.org/check?uri=referer' target=_blank><img src='http://www.w3.org/Icons/valid-html401' alt='Valid HTML 4.01 Transitional' height='31' width='88' border='0'></a>
<a href=\"http://jigsaw.w3.org/css-validator/check/referer\"><img style=\"border:0;width:88px;height:31px\" src=\"http://jigsaw.w3.org/css-validator/images/vcss\" alt=\"Valid CSS!\"></a>
<a href='http://toolserver.org/' target=_blank><img src='http://toolserver.org/images/wikimedia-toolserver-button.png' alt='Powered by Wikimedia Toolserver' border='0'></a>
<a href=\"http://www.anybrowser.org/campaign/\" target=\"_blank\"><img src=\"http://toolserver.org/~matthewrbowker/images/anybrowser.jpg\" width=\"88\" height=\"31\" alt=\"Viewable With Any Browser\" border='0'></a>
<a href=\"http://espn.go.com\" target=_blank><img src=\"http://toolserver.org/~matthewrbowker/images/espn-api-black_150.png\" alt=\"Powered by the ESPN api\" border=\"0\"  height=31px></a>
</p>\r";*/
}

function replag($server="s1") {
	$servers = array("commons-s1" => "0",
	"commons-s2" => "1",
	"commons-s3" => "2",
	"commons-s5" => "3",
	"commons-s6" => "4",
	"commons-s7" => "5",
	"s1" => "6",
	"s2" => "7",
	"s3" => "8",
	"s5" => "9",
	"s6" => "10",
	"s7" => "11");
	@$replagfile = file("https://toolserver.org/~bryan/stats/replag/replag");
	$replag = explode(" ",trim($replagfile[$servers[$server]]) );
	if ($replag[2] > 600 ) {
		echo "<div id=\"sitenotice\">
		<div id=\"sn-content\">
		<b>Attention:</b> Replication lag of \"$server\" on Toolserver is high right now.  These results may be outdated. <small>(<a href=\"../replag/?server=$server\" style=\"color:white; text-decoration:none;\">verify</a>)</small>
		</div>
		</div>";
	}
}

function new_genheader() { 
	/*require("vars.php");
	global $home;
	$versions = parse_ini_file('versions.ini', true);
	
	$cwd = getcwd();
	$dirarray = explode("/",$cwd);
	if ($dirarray[4]=='htdocs' && ISSET($dirarray[6])) $dir = $dirarray[6];
	else if (ISSET($dirarray[5])) $dir = $dirarray[5];
	else if (ISSET($dirarray[4])) $dir = $dirarray[4];
	else $dir = $dirarray[3];
	$dir = strtolower($dir); 
	
	if ($dir == '~matthewrbowker' || $dir == 'toolserver' || $dir == 'public_html' || $dir=='htdocs') $dir = 'root';
	
	$name = $versions["$dir"]["name"] or die("Error: This tool is not registered in Matthewrbowker's tool database.");
	$author = $versions["$dir"]["author"];
	$version = $versions["$dir"]["version"];
	$color = $versions["$dir"]["color"];
	$font = $versions["$dir"]["font"];
	$changelog = $versions["$dir"]["changelog"];
	$home = $versions["$dir"]["home"];
	$onload = $versions["$dir"]["onload"];
	
	if ($onload !='') $onload = "," . $onload;
	$onload = "checkjs()" . $onload;
	$onload = " onload = \"" . $onload . "\"";
	
	if ($home=="true") {$hometext="You are home!";
	$abouturl="cgi-bin/about.php?tool=$dir";
	$abouttext="About these tools";
	$changelogurl = "cgi-bin/changelog.php?tool=$dir";
	$csurl = "cgi-bin/css.php";
	$title = "$sitename";
	}
	else {$hometext="<a href='../'>&lt; Return home</a>\n";
	$abouturl="../cgi-bin/about.php?tool=$dir";
	$abouttext="About this tool";
	$changelogurl = "../cgi-bin/changelog.php?tool=$dir";
	$csurl = "../cgi-bin/css.php";
	$title = "$name $sep $sitename";
	}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$title?>
</title>
<link rel="stylesheet" type="text/css" href="<?=$csurl ?>?color=<? echo $color; ?>" />
<script>
<!--
function wopen(url, name, w, h, s)
{
w += 32;
h += 96;
 var win = window.open(url,
  name,
  'width=' + w + ', height=' + h + ', ' +
  'location=no, menubar=no, ' +
  'status=no, toolbar=no, scrollbars=' + s + ', resizable=no');
 win.resizeTo(w, h);
 win.focus();
}
// -->
</script> 
</head>

<body>
<div id="fullbody">
<div id="heading">
<h1><?=$home ? $sitename : $name; ?></h1>
<? if (!$home) : ?>
<h2><?=$sitename; ?></h2>
<? endif; ?>
</div>
<table id="navi">
<tr>
<td style="width:<?=$home ? '50' : '33'?>%;">
<a href="<?=$abouturl; ?>" target="popup"
 onClick="wopen('<?=$abouturl; ?>', 'popup', 400, 300, 'no'); return false;"><?=$abouttext; ?></a>
</td>
<td style="width:<?=$home ? '50' : '33'?>%;">
<a href="<?=$changelogurl; ?>" target="popup"
 onClick="wopen('<?=$changelogurl; ?>', 'popup', 640, 480, 'yes'); return false;">Change Log</a>
</td>
<? if (!$home) : ?>
<td style="width:34%;">
<?=$hometext;?>
</td>
<? endif; ?>
</tr>
</table>
<? sql_error_check() ?>
<? if($sn_on == true) : ?>
<div id="sitenotice">
<div id="sn-content">
<b>Note:</b> <?=$sitenotice; ?>
</div>
</div>
<? endif; ?>
    <?*/
	echo "This function is depreciated!  Please convert this page to classes.";
}

function new_genfooter() {
	/*global $home;
	?>
    <div id="footer">
<a href='http://validator.w3.org/check?uri=referer' target="_blank" ><img src='<?=$home ? "" : "../"?>images/valid-html5.png' alt='Valid HTML 5' style="border:0;width:88px;height:31px"></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="<?=$home ? "" : "../"?>images/valid-css.gif" alt="Valid CSS!"></a>
<a href='http://toolserver.org/' target=_blank><img src='<?=$home ? "" : "../"?>images/wikimedia-toolserver-button.png' alt='Powered by Wikimedia Toolserver' style="border:0;width:88px;height:31px"></a>
<a href="http://www.anybrowser.org/campaign/" target="_blank"><img src="<?=$home ? "" : "../"?>images/anybrowser.jpg" style="border:0;width:88px;height:31px" alt="Viewable With Any Browser"></a>
<a href="http://espn.go.com" target=_blank><img src="<?=$home ? "" : "../"?>images/espn-api-black_150.png" alt="Powered by the ESPN api" style="border:0;width:88px;height:31px"></a>

</div>
</div>
</body>
</html>
<?*/
}

function error($error = "UND", $prefix = "Error:") {
	if ($error == "UND") $error = "An unknown error occured.";
	echo <<<ERROR
<div id="sitenotice">
<div id="sn-content">
<b>{$prefix}</b> {$error}
</div>
</div>
ERROR;
}

function genwplink($string = "Wikipedia") {
	$string = str_replace(" ","_",$string);
	$string = urlencode($string);
	return $string;
}
?>