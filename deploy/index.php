<?php

require('../includes.php');

$site = new site();

if (isset($_POST['check_Password']) && isset($_POST['deploy'])) {
	$output = "Ready for deployment, captain!";
}
else if (isset($_POST['check_Password'])) {
	//Check the password here
	$output = "We would test here...
	<form action=\"index.php\" method=\"post\">
	<input type=\"hidden\" name=\"check_Password\" value=\"{$_POST['check_Password']}\" />
	</form>";
}
else {
	$output = "<div style=\"text-align:center\">
<form action=\"index.php\" method=\"post\">
<label for=\"check_Password\">Please enter the daily deployment password here:</label> <input type=\"password\" name=\"check_Password\" id=\"check_Password\" />";
}

$site -> gen_opening();
?>

<br />


<?php

echo $output;

$site -> gen_closing();

?>