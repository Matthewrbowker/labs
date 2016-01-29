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

function sql_error_check(mysqli $db) {
	$error = false;
	if (mysqli_error($db) != '') {
		echo "<div id=\"sitenotice\">
		<div id=\"sn-content\">
		<b>ERROR:</b> " . mysqli_error($db) . "
		</div>
		</div>";
		$error=true;
	}
	if (mysqli_connect_error($db) != '') {
		echo "<div id=\"sitenotice\">
		<div id=\"sn-content\">
		<b>ERROR:</b> " . mysqli_connect_error($db) . "
		</div>
		</div>";
		$error=true;
	}
	if ($error) die();
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
