<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();
?>

<form action="check.php" method="get">
<label for="value">Term to check: </label><input type="text" name="value" /><br />
<input type="submit" value="Check!" /></form>

<?php $site -> gen_closing();r ?>