<?php

if (ISSET($_GET['article']) && $_GET['article'] != '') {
	header("Location:share." . strtolower($_GET['share']) . ".php?article=" . $_GET['article']);
	die();
}
else {
	$pass = false;
}

require('../includes.php');
require('cgi-bin/vars.php');

$site = new site();

$site -> gen_opening();

?>

<? if (!$pass) error("The article field cannot be blank."); ?>

<form action="validate.php" method="get">
<label for="article">Please enter the article you'd like to share: </label><input type="text" name="article" value="<?=$_GET['article'] ?>" />
<?
for ($i=0, $c=count($socialbuttons); $i<$c; $i++) {
	echo "<input type=\"submit\" name=\"share\" value=\"{$socialbuttons[$i]}\" />\r";
}

$site-> gen_closing();

?>