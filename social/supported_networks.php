<?
require('cgi-bin/vars.php');

for ($i=0,$c=count($socialbuttons); $i<$c;$i++) {
	echo $socialbuttons[$i] . "\n";
}
die();
?>