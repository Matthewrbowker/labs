<?php
require('../includes.php');

$site = new site();

$site ->gen_opening();
?>
This tool checks if an image is a "Featured Picture" on various wikis. 
<br>
<br> 
<form action="process.php" method="get">
<label for="file">File name: </label><input type="text" name="file" />
<input type="submit" value="Check file" />
</form>

<?php $site -> gen_closing(); ?>