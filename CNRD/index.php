<?php
require('../includes.php');

$site = new site();

$db = mysql_connect($wpServer, $sqlUser, $sqlPw);
 
mysql_select_db($wpDb, $db);

$query="SELECT page_title, rd_namespace, rd_title
FROM " . $wpDbTablePrefix . "page p
INNER JOIN " . $wpDbTablePrefix . "redirect r on r.rd_from = p.page_id
WHERE r.rd_namespace NOT IN ( 0, 4, 10, 12, 14, 100 )
AND   p.page_namespace = 0";
/*AND rd_title NOT  IN ('Did_you_know','Main_Page','WikiProject_Transport/Maritime_transport_task_force','Requests_for_adminship','WikiProject_Jennifer_Lopez','Cite_your_sources_debate','Neutral_point_of_view','Contents','Longpages','Do_not_include_the_full_text_of_lengthy_primary_sources','Manual_of_Style/Linking','Writing_better_articles/Define_and_describe','Writing_better_articles/Establish_context','Writing_better_articles/Pay_attention_to_spelling')";*/

$ignore = array('Did_you_know',
'Main_Page',
'WikiProject_Transport/Maritime_transport_task_force',
'Requests_for_adminship',
'WikiProject_Jennifer_Lopez',
'Cite_your_sources_debate',
'Neutral_point_of_view',
'Contents','Longpages',
'Do_not_include_the_full_text_of_lengthy_primary_sources',
'Manual_of_Style/Linking',
'Writing_better_articles/Define_and_describe',
'Writing_better_articles/Establish_context',
'Writing_better_articles/Pay_attention_to_spelling',
'Test',
'All_pages',
'Spam_blacklist/Log');

$ns=array(
'-2'=>'Media',
'-1'=>'Special',
'0'=>'',
'1'=>'Talk',
'2'=>'User',
'3'=>'User talk',
'4'=>'Wikipedia',
'5'=>'Wikipedia talk',
'6'=>'File',
'7'=>'File talk',
'8'=>'MediaWiki',
'9'=>'MediaWiki talk',
'10'=>'Template',
'11'=>'Template talk',
'12'=>'Help',
'13'=>'Help talk',
'14'=>'Category',
'15'=>'Category talk',
'100'=>'Portal',
'101'=>'Portal talk',
'108'=>'Book',
'109'=>'Book talk',
'442'=>'Course',
'443'=>'Course talk',
'444'=>'Institution',
'445'=>'Institution talk');

$returning = false;

$result=mysql_query($query, $db);

$num=mysql_numrows($result);

$site -> gen_opening();

replag("s1");

echo "
Below is a list of Redirects that redirect outside their namespace.  I borrowed the query used to generate this report form <a href=\"http://toolserver.org/~tb/CNRS/\" target=\"_blank\">TopBannana</a>, then I adapted it to exclude several common redirects.<br><br>
For a complete list of redirects, please see <a href=\"full.php\">this page</a>.<br />
<br />";

$tot=0;
echo "<TABLE style=\"text-align:center;width:100%;border-collapse:collapse;\">
<tr>
<td style=\"width:50%;border:#999999 dashed 1px\"><u>Source Page</u></td>
<td style=\"width:50%;border:#999999 dashed 1px\"><u>Target Page</u></td>
</tr>
";

while ($tot < $num) {
$from = mysql_result($result,$tot,"page_title");
$to_ns = mysql_result($result,$tot,"rd_namespace");
$to = mysql_result($result,$tot,"rd_title");
if (!in_array($to, $ignore)) {

$to_ns_rev=$ns[$to_ns];

$to_ns_rev = str_replace(' ','_',$to_ns_rev);

echo "<TR>
<TD style=\"border:#999999 dashed 1px\">
<a href=\"" . $wpScriptHref . "?title=$from&amp;redirect=no\" target=_blank>$from</a>
</td>
<TD style=\"border:#999999 dashed 1px\">
<a href=\"" . $wpScriptHref . "?title=$to_ns_rev:$to\" target=_blank>$to_ns_rev:$to</a>
</td>
</tr>";
$returning = true;
}
$tot++;
}
echo !$returning ? "<tr><td colspan=2 style=\"text-align:center; color:red;\">No redirects returned</td></tr>" : "";
echo "</TABLE>";
$site ->gen_closing();
?>
