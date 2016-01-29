<?php

class site {
    private $smarty;

    function __construct($build = true) {

        $this->smarty = new Smarty();

        $smFile = __FILE__;
        $smFile = str_replace("\\", "/", $smFile);
        $smFileArr = explode("/", $smFile);
        $size = sizeof($smFileArr) - 2;
        $smRootDir = "";

        for ($i = 0; $i < $size; $i++) {
            $smRootDir .= $smFileArr[$i] . "/";
        }

        $this->smarty->setTemplateDir($smRootDir . 'templates/');
        $this->smarty->setCompileDir($smRootDir . 'templates_c/');
        if ($build) {
            // Start with a little time processing
            $time = microtime();
            $time = explode(' ', $time);
            $time = $time[1] + $time[0];
            $this->starttime = $time;

            require('vars.php');
            $versions = parse_ini_file("versions.ini", true);

            $cwd = getcwd();
            $cwd = str_replace("\\", "/", $cwd);
            $dirarray = explode("/", $cwd);
            $dir = strtolower($dirarray[sizeof($dirarray) - 1]);

            if ($dir == '~matthewrbowker' || $dir == 'labs' || $dir == 'public_html' || $dir == 'htdocs') $dir = 'root';

            $name = $versions["$dir"]["name"] or die("Error: This tool is not registered in Matthewrbowker's tool database.");
            $author = $versions["$dir"]["author"];
            $rootVersion = $versions["root"]["version"];
            $version = $versions["$dir"]["version"];
            $color = $versions["$dir"]["color"];
            $font = $versions["$dir"]["font"];
            $changelog = $versions["$dir"]["changelog"];
            $home = $versions["$dir"]["home"];
            $onload = $versions["$dir"]["onload"];
            $ts_sitename = $sitename;
            $ts_sn_on = $sn_on;
            $ts_sitenotice = $sitenotice;

            //if ($this->onload !='') $this->onload = "," . $this->onload;
            //$this->onload = "checkjs()" . $this->onload;
            if (ISSET($this->onload) && $this->onload != "") $this->onload = " onload = \"" . $this->onload . "\"";

            if ($home == "true") {
                $hometext = "You are home!";
                $abouturl = "vars/about.php?tool=$dir";
                $abouttext = "About these tools";
                $changelogurl = "vars/changelog.php?tool=$dir";
                $csurl = $scriptloc . "/css.php";
                $title = "";
            } else {
                $hometext = "<a href='../'>&lt; Return home</a>\n";
                $abouturl = "../vars/about.php?tool=$dir";
                $abouttext = "About this tool";
                $changelogurl = "../vars/changelog.php?tool=$dir";
                $csurl = "../" . $scriptloc . "/css.php";
                $title = "$name";
            }

            $this->smarty->assign('dir', $dir);
            $this->smarty->assign('name', $name);
            $this->smarty->assign('author', $author);
            $this->smarty->assign('rootVersion', $rootVersion);
            $this->smarty->assign('version', $version);
            $this->smarty->assign('color', $color);
            $this->smarty->assign('font', $font);
            $this->smarty->assign('changelog', $changelog);
            $this->smarty->assign('onload', $onload);
            $this->smarty->assign('sitename', $ts_sitename);
            $this->smarty->assign('ts_sn_on', $ts_sn_on);
            $this->smarty->assign('hometext', $hometext);
            $this->smarty->assign('abouturl', $abouturl);
            $this->smarty->assign('abouttext', $abouttext);
            $this->smarty->assign('changelogurl', $changelogurl);
            $this->smarty->assign('csurl', $csurl);
            $this->smarty->assign('title', $title);
        }

    }

    function gen_opening() {
        $this->Display("heading");
    }

    function gen_closing() {
        $this->Display("footer");
    }

    function Display($pageName = "index") {
        try {
            $this->smarty->Display("$pageName.tpl");
        }
        catch (smartyException $e) {
            echo "<div class='alert alert-danger'>{$e->getMessage()}</div>";
        }
    }

    function Assign($variable, $text) {
        $this->smarty->assign($variable, $text);
    }

}