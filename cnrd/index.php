<?php
require('../includes.php');

$config = new config();

$site = new site($config);

$full = false;

if (isset($_GET["full"])) $full = true;

$db = mysqli_connect($config->get("wpServer"), $config->get("sqlUser"), $config->get("sqlPw"), $config->get("wpDb"));

if (mysqli_errno($db) > 0) die(mysqli_errno($db) . ": " . mysqli_error($db));

$query=sprintf("SELECT page_title, rd_namespace, rd_title
FROM (
  SELECT * FROM page p
  WHERE page_is_redirect = 1
  AND p.page_namespace = 0
  %s
  ) as p
INNER JOIN (
  SELECT * FROM redirect r
  WHERE r.rd_namespace NOT IN (0, 4, 10, 12, 14, 100)
  ) as r on r.rd_from = p.page_id;", (!$full ? "AND page_title NOT IN (\"Longest_Wikipedia_Article\",\"T:MP\",\"CiteYourSourcesDebate\",\"Rules_to_consider/Do_not_include_primary_sources_debate\",\"MOS:FAQ\",\"Rules_to_consier/Make_only_links_relevant_to_the_context_debate\",\"AvoidBiasDebate\",\"Define_and_Describe_Talk\",\"RulesToConsider/Establish_Context\",\"Rules_to_consider/Pay_attention_to_spelling_debate\",\"T:TDYK\",\"T:DYKT\",\"T:tdyk\")
  " : ""));

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
'118'=>'Draft',
'119'=>'Draft talk',
'442'=>'Course',
'443'=>'Course talk',
'444'=>'Institution',
'445'=>'Institution talk');

$returning = false;

$result=mysqli_query($db, $query);

if (mysqli_errno($db) > 0) die(mysqli_errno($db) . ": " . mysqli_error($db));

$num=mysqli_stmt_num_rows($result);

$site -> gen_opening();

echo "
Below is a list of Redirects that redirect outside their namespace.  I borrowed the query used to generate this report form <a href=\"http://toolserver.org/~tb/CNRS/\" target=\"_blank\">TopBannana</a>, then I adapted it to exclude several common redirects.<br><br>
For a complete list of redirects, please see <a href=\"?full\">this page</a>.<br />
<br />";

$tot=0;
echo "<TABLE style=\"text-align:center;width:100%;border-collapse:collapse;\">
<tr>
<td style=\"width:50%;border:#999999 dashed 1px\"><u>Source Page</u></td>
<td style=\"width:50%;border:#999999 dashed 1px\"><u>Target Page</u></td>
</tr>
";

while ($tot < $num) {
$from = mysqli_result($result,$tot,"page_title");
$to_ns = mysqli_result($result,$tot,"rd_namespace");
$to = mysqli_result($result,$tot,"rd_title");
//if (!in_array($to, $ignore)) {

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
//}
$tot++;
}
echo !$returning ? "<tr><td colspan=2 style=\"text-align:center; color:red;\">No redirects returned</td></tr>" : "";
echo "</TABLE>";
$site ->gen_closing();
