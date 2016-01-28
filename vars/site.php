<?php

class site {
    private $smarty;

    function __construct() {
        // Start with a little time processing
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $this->starttime = $time;

        $this->smarty = new Smarty();

        require('vars.php');
        $versions = parse_ini_file("versions.ini", true);

        $cwd = getcwd();
        $dirarray = explode("/",$cwd);
        if ($dirarray[4]=='htdocs' && ISSET($dirarray[6])) $dir = $dirarray[6];
        else if (ISSET($dirarray[5])) $dir = $dirarray[5];
        else if (ISSET($dirarray[4])) $dir = $dirarray[4];
        else $dir = $dirarray[3];
        $dir = strtolower($dir);

        if ($dir == '~matthewrbowker' || $dir == 'labs' || $dir == 'public_html' || $dir=='htdocs') $dir = 'root';

        $name = $versions["$dir"]["name"] or die("Error: This tool is not registered in Matthewrbowker's tool database.");
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
        $this->smarty->Display("heading.tpl");
    }

    function gen_closing() {
        $this->smarty->Display("footer.tpl");
    }

    function Display($pageName = "index") {
        $this->smarty->Display("$pageName.tpl");
    }

    function Assign($variable, $text) {
        $this->smarty->assign($variable, $text);
    }

}
