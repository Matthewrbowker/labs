<?

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
	
	function gen_opening_boostrap() {
		echo <<< ENDL
<HTML>
<HEAD>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
<title>{$this->title}</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"
integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
crossorigin="anonymous">

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      </style>
</HEAD>
<BODY>

<div class="container-fluid">
<div class="col-md-1">&nbsp;</div>
<div class="col-md-10">
ENDL;
	}
	
	function gen_opening() {
		$this -> gen_opening_boostrap();
		return;
		?>
		<!DOCTYPE html>
		<html>
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?=$this->title?>
		</title>
		<link rel="stylesheet" type="text/css" href="<?=$this->csurl ?>?color=<? echo $this->color; ?>" />
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
		
		<body<?= (isset($this->onload) && $this->onload != '') ? " " . $this->onload : "" ?>>
		<div id="fullbody">
		<div id="heading">
		<h1><?=$this->home ? $this->ts_sitename : $this->name; ?></h1>
		<? if (!$this->home) : ?>
		<h2><?=$this->ts_sitename; ?></h2>
		<? endif; ?>
		</div>
		<table id="navi">
		<tr>
		<td style="width:<?=$this->home ? '50' : '33'?>%;">
		<a href="<?=$this->abouturl; ?>" target="popup"
		 onClick="wopen('<?=$this->abouturl; ?>', 'popup', 400, 300, 'no'); return false;"><?=$this->abouttext; ?></a>
		</td>
		<td style="width:<?=$this->home ? '50' : '33'?>%;">
		<a href="<?=$this->changelogurl; ?>" target="popup"
		 onClick="wopen('<?=$this->changelogurl; ?>', 'popup', 640, 480, 'yes'); return false;">Change Log</a>
		</td>
		<? if (!$this->home) : ?>
		<td style="width:34%;">
		<?=$this->hometext;?>
		</td>
		<? endif; ?>
		</tr>
		</table>
		<? sql_error_check() ?>
		<? if($this->ts_sn_on) : ?>
		<div id="sitenotice">
		<div id="sn-content">
		<b>Note:</b> <?=$this->ts_sitenotice; ?>
		</div>
		</div>
		<? endif; ?>
			<?
	}
	
	function gen_closing_bootstrap() {
		echo <<<ENDL
		 <div class="footer">
        <p style="text-align:right"><small>Wikimedia Labs tools &middot; Written by Matthewrbowker &middot; Core Version {$this->versions['root']['version']} &middot; Tool Version {$this->version}<br />
          <a href="http://localhost/~wiki/index.php?title=Article_request%2Fconfig%2Finterface" target=_blank>Edit this page</a> &middot; <a href="http://localhost/~wiki/index.php?title=Article_request%2Fconfig%2Finterface%2Fall" target=_blank>Edit this tool</a> &middot; <a href="about.php"\>About this tool</a> </small>
        </p>
      </div>
    </div>

    </div> <!-- /col-md-10 -->
    <div class="col-md-1">&nbsp;</div>

    </div> <!-- /container -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
 integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
 crossorigin="anonymous\></script>
</BODY>
</HTML>";

ENDL;
	}
	
	function gen_closing() {
		//generate the closing HTML
		
		$this -> gen_closing_bootstrap();
		return;
		
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$finish = $time;
		$total_time = round(($finish - $this->starttime), 4);
		
		?>
        <br>
        <br>
        <div class="vertime">Core version <?=$this->versions['root']['version']?><? if($this->home != 'true'): ?>
        | Tool version <?=$this->version?>
        <? endif; ?></div>
        <div class="vertime">Page generated in <?=$total_time?> seconds.</div>
        <div id="footer">
        <a href='http://validator.w3.org/check?uri=referer' target="_blank" ><img src='<?=$this->home ? "" : "../"?>images/valid-html5.png' alt='Valid HTML 5' style="border:0;width:88px;height:31px"></a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img style="border:0;width:88px;height:31px" src="<?=$this->home ? "" : "../"?>images/valid-css.gif" alt="Valid CSS!"></a>
        <a href='http://toolserver.org/' target=_blank><img src='<?=$this->home ? "" : "../"?>images/wikimedia-toolserver-button.png' alt='Powered by Wikimedia Toolserver' style="border:0;width:88px;height:31px"></a>
        <a href="http://www.anybrowser.org/campaign/" target="_blank"><img src="<?=$this->home ? "" : "../"?>images/anybrowser.jpg" style="border:0;width:88px;height:31px" alt="Viewable With Any Browser"></a>
        <a href="http://espn.go.com" target=_blank><img src="<?=$this->home ? "" : "../"?>images/espn-api-black_150.png" alt="Powered by the ESPN api" style="border:0;width:88px;height:31px"></a>
        
        </div>
        </div>
        </body>
        </html>
<?
	}
	
	function __destruct() {
		// clear the variables
	}
}