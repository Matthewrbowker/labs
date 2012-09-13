<?php
require('../cgi-bin/functions.php');
require('../cgi-bin/vars.php');
$start = starttime();

if (ISSET($_GET['lang'])) $lang = $_GET['lang'];
else $lang = 'en';

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<HTML>
<HEAD>
<TITLE>
Article Request $sep $sitename
</title>
<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" >
<script type=\"text/javascript\" src=\"categories.js\"></script>\r";

genheader();

echo "If you would like to request an article be written on the English Wikipedia, please fill out the information below.  Fields with a <font color=\"red\">*</font> are required.
<br>
<br>
<noscript>
	<style type=\"text/css\">
		#form { display:none; }
	</style>
<center><H3><font color=\"red\">This form requires Javascript to work!  Please enable Javascript in your browser to continue.</font></H3></center>
<br>
<br>
</noscript>

<div id=\"form\">
<form method=\"get\" action=\"result.php\" name=\"mainform\" onsubmit=\"return validate();\" onreset=\"resetform();\">
<table width=\"50%\">
<tr>
<td>
<div id=\"subject\" class=\"black\">Article subject</div> <font color=\"red\">*</font> : 
</td>
<td>
<input type=\"text\" name=\"subject\" />
</td>
</tr>
<tr>
<td>
Description/Comments:
</td>
<td>
<input type=\"text\" name=\"comment\" />
</td>
</tr>
<tr>
<td>
<div id=\"category1\" class=\"black\">Category <font color=\"red\">*</font> : </div>
</td>
<td>
<select name=\"category\" onchange=\"parseform();\">
<option value=\"none\">Please choose one</option>
<option value=\"aas\">Applied arts and sciences</option>
<option value=\"ae\">Arts and entertainment</option>
<option value=\"b\">Biography</option>
<option value=\"be\">Business and economics</option>
<option value=\"math\">Mathematics</option>
<option value=\"music\">Music</option>
<option value=\"ns\">Natural sciences</option>
<option value=\"phil\">Philosophy</option>
<option value=\"ss\">Social sciences</option>
<option value=\"s\">Sport</option>
</select>
</td>
</tr>

<tr>
<td>
<div id=\"subcat1\" class=\"hidden\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../images/sublevel.jpg\" alt=\"dots\">Sub-category <font color=\"red\">*</font> : </div>
</td>
<td>
<div id=\"subcat2\" class=\"hidden\"><select name=\"subcat\" onchange=\"parseform();\">
</select>
</div>
</td>
</tr>
<tr>
<td>
<div id=\"subsubcat1\" class=\"hidden\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"../images/sublevel.jpg\" alt=\"dots\">Sub-sub-category <font color=\"red\">*</font> : </div>
</td>
<td>
<div id=\"subsubcat2\" class=\"hidden\"><select name=\"subsubcat\">
</select>
</div>
</td>
</tr>
<tr>
<td>
Your on-wiki username (if applicable) :
</td>
<td>
<input type=\"text\" name=\"username\" onblur=\"checkusername()\"><div id=\"unameinfo\"> </div>
</td>
</tr>
<tr>
<td colspan=\"2\">
<input type=\"checkbox\" name=\"doublecheck\" onchange=\"checkbox()\"> <font color=\"red\">*</font> I affirm that the article I'm submitting for creation follows all of Wikipedia's guidelines.<br>I've checked <a href=\"http://en.wikipedia.org/Wikipedia:Requested_articles\" target=_blank>the request list</a> and I'm not submitting a duplicate.
</td>
</tr>
<tr>
<td>
<center>
<input type=\"submit\" id=\"submit\" value=\"Request article!\" disabled/>
</center>
</td>
<td>
<center>
<input type=\"reset\" value=\"Reset form\" />
</center>
</td>
</tr>
</table>
</div>
<br>";

endtime($start);
genfooter();

echo "</BODY>
</HTML>";
?>