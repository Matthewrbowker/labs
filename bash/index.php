<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

echo "Please select your quip below:

<form action='quip.php' method='get'>
<input type='text' name='id'><input type=\"submit\" value=\"Go!\">
</form>
<br>
<br>
or ...
<br>
<br>
<a href='quip.php?id=rand'>Get a random quip!</a>\r";

$site -> gen_closing();

?>