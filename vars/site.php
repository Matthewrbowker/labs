<?php

// Wrapper for generating the site content

class site {
	private $versions;
	private $name;
	private $author;
	private $version;
	private $color;
	private $font;
	private $changelog;
	private $home;
	private $onload;
	private $title;
	private $starttime;
	private $ts_sitename;
	private $ts_sn_on;
	private $ts_sitenotice;
	
	function __construct() {
		// Start with a little time processing
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$this->starttime = $time;
		
		require('vars.php');
		$this->versions = parse_ini_file("versions.ini", true);
	
		$cwd = getcwd();
		$dirarray = explode("/",$cwd);
		if ($dirarray[4]=='htdocs' && ISSET($dirarray[6])) $dir = $dirarray[6];
		else if (ISSET($dirarray[5])) $dir = $dirarray[5];
		else if (ISSET($dirarray[4])) $dir = $dirarray[4];
		else $dir = $dirarray[3];
		$dir = strtolower($dir); 
		
		if ($dir == '~matthewrbowker' || $dir == 'labs' || $dir == 'public_html' || $dir=='htdocs') $dir = 'root';
		
		$this->name = $this->versions["$dir"]["name"] or die("Error: This tool is not registered in Matthewrbowker's tool database.");
		$this->author = $this->versions["$dir"]["author"];
		$this->version = $this->versions["$dir"]["version"];
		$this->color = $this->versions["$dir"]["color"];
		$this->font = $this->versions["$dir"]["font"];
		$this->changelog = $this->versions["$dir"]["changelog"];
		$this->home = $this->versions["$dir"]["home"];
		$this->onload = $this->versions["$dir"]["onload"];
		$this->ts_sitename = $sitename;
		$this->ts_sn_on = $sn_on;
		$this->ts_sitenotice = $sitenotice;
		
		//if ($this->onload !='') $this->onload = "," . $this->onload;
		//$this->onload = "checkjs()" . $this->onload;
		if (ISSET($this->onload) &&$this->onload != "") $this->onload = " onload = \"" . $this->onload . "\"";
		
		if ($this->home=="true") {
			$this->hometext="You are home!";
			$this->abouturl="vars/about.php?tool=$dir";
			$this->abouttext="About these tools";
			$this->changelogurl = "vars/changelog.php?tool=$dir";
			$this->csurl = $scriptloc . "/css.php";
			$this->title = $sitename;
		}
		else {
			$this->hometext="<a href='../'>&lt; Return home</a>\n";
			$this->abouturl="../vars/about.php?tool=$dir";
			$this->abouttext="About this tool";
			$this->changelogurl = "../vars/changelog.php?tool=$dir";
			$this->csurl = "../" .$scriptloc . "/css.php";
			$this->title = "$this->name $sep $sitename";
		}

	}
	
	function gen_opening() {
		$sitename = $this->home ? $this->ts_sitename : $this->name;
		$width = $this->home ? 50 : 33;
		
		echo <<<ENDL
		<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>{$this->title}
		</title>
		<link rel="stylesheet" type="text/css" href="{$this->csurl}?color={$this->color}" />
		<script>
		<!--
		function wopen(url, name, w, h, s)
		{
		w += 32;
		h += 96;
		 var win = window.open(url,
		  name,
		  'width=' + w + ', height=' + h + ', ' +
		  'location=no, menubar=no, ' +
		  'status=no, toolbar=no, scrollbars=' + s + ', resizable=no');
		 win.resizeTo(w, h);
		 win.focus();
		}
		// -->
		</script> 
		</head>
		
		<body{(isset($this->onload) && $this->onload != '') ? " " . $this->onload : ""}>
		<div id="fullbody">
		<div id="heading">
		<h1>{$sitename}</h1>
ENDL;
		 if (!$this->home) {
			echo "<h2> {$this->ts_sitename }</h2>";
		}
        echo <<<ENDL
		</div>
		<table id="navi">
		<tr>
		<td style="width:{$width}%;">
		<a href="{$this->abouturl}" target="popup"
		 onClick="wopen('{$this->abouturl }', 'popup', 400, 300, 'no'); return false;">{$this->abouttext }</a>
		</td>
		<td style="width:{$width}%;">
		<a href="{$this->changelogurl }" target="popup"
		 onClick="wopen('{$this->changelogurl }', 'popup', 640, 480, 'yes'); return false;">Change Log</a>
		</td>
ENDL;
		if (!$this->home) {
		echo "<td style='width:34%;''>
		{$this->hometext}
		</td>";
        }

        echo <<<ENDL
		</tr>
		</table>
ENDL;
		sql_error_check();
		if($this->ts_sn_on) {
        echo "<div id='sitenotice'>
		<div id='sn-content'>
		<b>Note:</b> {$this->ts_sitenotice }
		</div>
		</div>";
        }
	}
	
	function gen_closing() {
		//generate the closing HTML

		$versions = "Core version {$this->versions['root']['version']}";

		if($this->home != 'true') $versions = "| Tool version {$this->version}";

		$relative = $this->home ? "" : "../";
		
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $this->starttime), 4);
		
		echo <<<ENDL
        <br>
        <br>
        <div class="vertime">{$versions}
        </div>
        <div class="vertime">Page generated in <?=$total_time?> seconds.</div>
        <div id="footer">
        <a href='http://validator.w3.org/check?uri=referer' target="_blank" ><img src='{$relative}images/valid-html5.png' alt='Valid HTML 5' style="border:0;width:88px;height:31px"></a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="{$relative}images/valid-css.gif" alt="Valid CSS!"></a>
        <a href='http://toolserver.org/' target=_blank><img src='{$relative}images/wikimedia-toolserver-button.png' alt='Powered by Wikimedia Toolserver' style="border:0;width:88px;height:31px"></a>
        <a href="http://www.anybrowser.org/campaign/" target="_blank"><img src="{$relative}images/anybrowser.jpg" style="border:0;width:88px;height:31px" alt="Viewable With Any Browser"></a>
        <a href="http://espn.go.com" target=_blank><img src="{$relative}images/espn-api-black_150.png" alt="Powered by the ESPN api" style="border:0;width:88px;height:31px"></a>
        
        </div>
        </div>
        </body>
        </html>
ENDL;
	}
	
	function __destruct() {
		// clear the variables
	}
}