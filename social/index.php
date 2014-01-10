<?php
require('../includes.php');
require('cgi-bin/vars.php');

$site = new site();

$site -> gen_opening();

?>

This tool allows you to share an article.  <br /><br />

<form action="validate.php" method="get">
<label for="article">Please enter the article you'd like to share: </label><input type="text" name="article" />
<?
for ($i=0, $c=count($socialbuttons); $i<$c; $i++) {
	echo "<input type=\"submit\" name=\"share\" value=\"{$socialbuttons[$i]}\" />\r";
}
?>
</form>

<?

$site -> gen_closing();

?>