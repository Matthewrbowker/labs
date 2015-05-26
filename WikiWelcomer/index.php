<?php
require('../includes.php');

$site = new site();

//$start = starttime();

$site -> gen_opening();

//new_genheader();?>

WikiWelcomer welcomes people when they join the help channel (<a href="ircs://freenode/wikipedia-en-help">#wikipedia-en-help on Freenode</a>).  It is a backup system in case <a href="http://en.wikipedia.org/wiki/WP:HELPMEBOT">Helpmebot</a> is down.  To activate the bot, change <a href="http://en.wikipedia.org/wiki/User:WikiWelcomer/control" target=_blank>this page</a> to "on".
<?php
//endtime($start);
//new_genfooter();
$site -> gen_closing();
?>