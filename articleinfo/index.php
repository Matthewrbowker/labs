<?php
require('../includes.php');

$site = new site();

$db = mysql_connect($tsServer, $sqlUser, $sqlPw);

mysql_select_db($tsDb, $db) or die('Unable to contact database');

$query_ns="SELECT `ns_id`,`ns_name` FROM `namespace` WHERE `dbname`='enwiki_p' AND `ns_id`>=0 AND `ns_name`!='Thread' AND `ns_name`!='Thread talk' AND `ns_name`!='Summary' AND `ns_name`!='Summary talk' ORDER BY `ns_id` ASC";

$result_ns=mysql_query($query_ns);

$num_ns=mysql_numrows($result_ns);

$tot_ns=0;

$site -> gen_opening();

echo "<form action=\"answer.php\" method=\"get\">
<select name=\"ns\">";

while ($tot_ns < $num_ns)
{
$ns_id=mysql_result($result_ns,$tot_ns,"ns_id");
$ns_name=mysql_result($result_ns,$tot_ns,"ns_name");

if ($ns_name == '') {$ns_name='(Article)';}

echo "<option value='$ns_id'>$ns_name</option>\r";

$tot_ns++;
}

echo "\r</select>
<input type=\"text\" name=\"article\" width=\"80\"></input>

<input type=\"submit\" value=\"Go!\"></input>
</form>\r";

$site -> gen_closing();

?>