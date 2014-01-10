<?php
require("includes.php");

//$site = new site();

//$site ->gen_opening();

if (isset($_GET['test'])) $testserver = true;

$bots = "<b>Bots</b>\n<ul>\n";
$tools = "<b>Tools</b>\n<ul>\n";
$test = "<b>Testing tools</b>\n<ul>\n";

//$data = parse_ini_file('vars/versions.ini',true);

//$keys = array_keys($data);

echo memory_get_usage();

die();


for($i=0,$c=count($data);$i<$c;$i++) {
	if ($data[$keys[$i]]['homepage'] == 'bot') {
		$bots .= "<li><a href=\"" . $keys[$i] . "/\">" . $data[$keys[$i]]['name'] . "</a>";
		if (isset($data[$keys[$i]]['homepagedescr']) && $data[$keys[$i]]['homepagedescr'] != '') $bots .= " - " . $data[$keys[$i]]['homepagedescr'];
		$bots .= "</li>\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == 'tool') {
		$tools .= "<li><a href=\"" . $keys[$i] . "/\">" . $data[$keys[$i]]['name'] . "</a>";
		if (isset($data[$keys[$i]]['homepagedescr']) && $data[$keys[$i]]['homepagedescr'] != '') $tools .= " - " . $data[$keys[$i]]['homepagedescr'];
		$tools .= "</li>\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == 'test') {
		$test .= "<li><a href=\"" . $keys[$i] . "/\">" . $data[$keys[$i]]['name'] . "</a>";
		if (isset($data[$keys[$i]]['homepagedescr']) && $data[$keys[$i]]['homepagedescr'] != '') $test .= " - " . $data[$keys[$i]]['homepagedescr'];
		$test .= "</li>\n";
	}
	elseif ($data[$keys[$i]]['homepage'] == '' || !isset($data[$keys[$i]]['home'])) {
		//Do nothing
	}
	else {
		echo "<div id=\"sitenotice\"><div id=\"sn-content\">There was an error classifying \"" . $data[$keys[$i]]['name'] . ".\"</div></div><br />";
	}
}

$bots .= "</ul>";
$tools .= "</ul>";
$test .= "</ul>";
?>
Hello and welcome!  I'm <a href="<?=$wpHref?>User:Matthewrbowker" target=_blank>Matthew</a> and these are my tools!
<br>
<br>
I have the following tools avalible:
<br>
<br>

<?=$bots;?>
<?=$tools;?>
<? if($testserver) echo $test; ?>
If you need to contact me, please do so <a href="<?=$wpScriptHref ?>?title=User_talk:Matthewrbowker&amp;action=edit&amp;section=new" target=_blank>on my English Wikipedia talk page</a>.  If you'd like the source code for my tools, please visit <a href="https://github.com/Matthewrbowker/toolserver" target=_blank>the GitHub repository for my web-based tools</a> or the <a href="https://github.com/Matthewrbowker/toolserverBots" target=_blank>the GitHub repository for my bots</a>.  Or, you're always welcome to <a href="https://bugzilla.wikimedia.org/enter_bug.cgi?product=Tool%20Labs%20tools&component=Matthewrbowker's%20tools" target=_blank>file a bug</a>.
<?
//endtime($start);
$site->gen_closing();
?>