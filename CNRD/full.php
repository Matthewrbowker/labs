<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');

$start = starttime();

$ts_pw = posix_getpwuid(posix_getuid());
$ts_mycnf = parse_ini_file($ts_pw['dir'] . "/.my.cnf");
$db = mysql_connect('enwiki-p.rrdb.toolserver.org', $ts_mycnf['user'], $ts_mycnf['password']);
unset($ts_mycnf, $ts_pw);
 
mysql_select_db('enwiki_p', $db);

$query="SELECT page_title, rd_namespace, rd_title
FROM page p
INNER JOIN redirect r on r.rd_from = p.page_id
WHERE r.rd_namespace NOT IN ( 0, 4, 10, 12, 14, 100 )
AND   p.page_namespace = 0";

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

$result=mysql_query($query, $db);

$num=mysql_numrows($result);

echo "<HTML>
<HEAD>
<TITLE>
Cross-Namespace Redirects $sep $sitename
</TITLE>";
genheader('CC00CC','white','Cross-Namespace Redirects','CNRD','1_1','no','');
echo "
This detail page includes all of the redirects on the English Wikipedia.  To exclucde common redirects, see <a href=\"index.php\">this page</a>.<br><br>";

if ($num=='0') {
echo "<center>
<H3>No redirects returned</H3>
</center>";
}

else {
$tot=0;
echo "<TABLE border=1 width=\"100%\">
<tr>
<td width=\"40%\"><u>Source Page</u></td>
<td width=\"40%\"><u>Target Page</u></td>
</tr>
";


while ($tot < $num) {

$from = mysql_result($result,$tot,"page_title");
$to_ns = mysql_result($result,$tot,"rd_namespace");
$to = mysql_result($result,$tot,"rd_title");

$to_ns_rev=$ns[$to_ns];

$to_ns_rev = str_replace(' ','_',$to_ns_rev);

echo "<TR>
<TD>
<a href=\"http://en.wikipedia.org/w/index.php?title=$from&redirect=no\" target=_blank>$from</a>
</td>
<TD>
<a href=\"http://en.wikipedia.org/w/index.php?title=$to_ns_rev:$to\" target=_blank>$to_ns_rev:$to</a>
</td>
</tr>";
$tot++;
}
echo "</TABLE>";
}

endtime($start);
genfooter();

echo "</body>
</html>";
?>
