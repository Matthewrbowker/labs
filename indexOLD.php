<?php
require("cgi-bin/functions.php");
require("cgi-bin/vars.php");

$start = starttime();

new_genheader();
/*
$bots = "<b>Bots</b>\n<ul>\n";
$tools = "<b>Tools</b>\n";
$test = "<b>Testing tools</b>";

$data = parse_ini_file('cgi-bin/versions.ini',true);

$keys = array_keys($data);


for($i=0,$c=count($data);$i<$c;$i++) {
	if ($data[$keys[$i]]['homepage'] == 'bot') {
		$bots .= "<li><a href=\"" . $keys[$i] . "/\">" . $data[$keys[$i]]['name'] . "</a>";
		if (isset($data[$keys[$i]]['homepagedescr'])) $bots .= " - " . $data[$keys[$i]]['homepagedescr'];
		$bots .= "</li>\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == 'tool') {
		$tools .= $data[$keys[$i]]['name'] . "\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == 'test') {
		$test .= $data[$keys[$i]]['name'] . "\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == '' || !isset($data[$keys[$i]]['home'])) {
		//Do nothing
	}
	else {
		echo "<div id=\"sitenotice\"><div id=\"sn-content\">There was an error classifying \"" . $data[$keys[$i]]['name'] . ".\"</div></div><br />";
	}
}

$bots .= "</ul>";
*/
?>
Hello and welcome!  I'm <a href="<?=$wpHref?>User:Matthewrbowker" target=_blank>Matthew</a> and these are my tools!
<br>
<br>
I have the following tools avalible:
<br>
<br>

<?
//Bots
//echo $bots;
?>

<b>Bots</b>
<ul>
<li><a href="wikiwelcomer">WikiWelcomer</a> -  Welcomes people onto IRC.</li>
<li><a href="matthewrbot">Matthewrbot</a> - Handles tasks related to Requested Articles
</ul>

<b>Tools</b>
<ul>
<li><a href="projectinfo">Project Information tool</a> - shows information about different projects.</li>
<li><a href="serverinfo">Toolserver Database Information tool</a> - allows you to check which server a specific language's database is mirrored on Toolserver.</li>
<li><a href="CNRD">Cross-Namespace Redirects</a> - shows redirects outside of their namespace. </li>
<?php if($testserver): //For testing tools ?>
</ul>
<b>Test tools</b>
<ul>
<li><a href="blacklist">Title blacklist checker</a> - checks titles and usernames against the title blacklist.</li>
<li><a href="articleinfo">Article information</a> - Allows you to view information about an article.</li>
<li><a href="bash">Bash Quote Generator</a> - collection of quotes from IRC.</li>
<li><a href="autopatrolled">Autopatrolled checker</a> - Lists people eligable for the "autopatrolled" user right.</li>
<li><a href="fp">Featured Picture checker</a> - Allows you to check if a picture is featured.</li>
<li><a href="logs">Bot Logs</a> - Shows the logs for my bots.</li>
<li><a href="replag">Replag checker</a> - shows the replag of Toolserver.</li>
<li><a href="sports">Sports information</a> - allows you to generate an infobox for a sports figure.</li>
<li><a href="social">Share an article</a></li>
<li><a href="testing">Test tools</a></li>
<li><a href="articlerequest">Article Request</a> - Allows people to request an article.</li>
<?php endif; ?>
</ul>
If you need to contact me, please do so <a href="<?=$wpScriptHref ?>?title=User_talk:Matthewrbowker&amp;action=edit&amp;section=new" target=_blank>on my English Wikipedia talk page</a>.  If you'd like the source code for my tools, please visit <a href="https://github.com/Matthewrbowker/toolserver" target=_blank>the GitHub repository for my web-based tools</a> or the <a href="https://github.com/Matthewrbowker/toolserverBots" target=_blank>the GitHub repository for my bots</a>.
<?
endtime($start);
new_genfooter();
?>