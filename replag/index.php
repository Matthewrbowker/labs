<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

if (isset($_GET['server'])) {
	$server = $_GET['server'];
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
	$replagfile = file("https://toolserver.org/~bryan/stats/replag/replag");
	$replag = explode(" ",trim($replagfile[$servers[$server]]) );
	echo "<center><H3>The replag of \"$server\" is " . $replag[2] . " seconds.</H3></center>";
} ?>

<form action="index.php" method="get">
<select name="server">
<option value="commons-s1"<?=$server=="commons-s1" ? " selected" : "" ?>>commons-s1</option>
<option value="commons-s2"<?=$server=="commons-s2" ? " selected" : "" ?>>commons-s2</option>
<option value="commons-s3"<?=$server=="commons-s3" ? " selected" : "" ?>>commons-s3</option>
<option value="commons-s5"<?=$server=="commons-s5" ? " selected" : "" ?>>commons-s5</option>
<option value="commons-s6"<?=$server=="commons-s6" ? " selected" : "" ?>>commons-s6</option>
<option value="commons-s7"<?=$server=="commons-s7" ? " selected" : "" ?>>commons-s7</option>
<option value="s1"<?=$server=="s1" ? " selected" : "" ?>>s1</option>
<option value="s2"<?=$server=="s2" ? " selected" : "" ?>>s2</option>
<option value="s3"<?=$server=="s3" ? " selected" : "" ?>>s3</option>
<option value="s5"<?=$server=="s5" ? " selected" : "" ?>>s5</option>
<option value="s6"<?=$server=="s6" ? " selected" : "" ?>>s6</option>
<option value="s7"<?=$server=="s7" ? " selected" : "" ?>>s7</option>
</select>
<input type="submit" value="Check">
</form>

<? $site -> gen_closing(); ?>