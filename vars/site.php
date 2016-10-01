<?php

class site {
    private $smarty;
    private $config;

    function __construct(config $config, $build = true) {
        $this->smarty = new Smarty();
        $this->config = $config;

        $this->smarty->setTemplateDir($config->get("rootDirectory") . 'templates/');
        $this->smarty->setCompileDir($config->get("rootDirectory") . 'templates_c/');


        if ($build) {
            // Start with a little time processing
            $time = microtime();
            $time = explode(' ', $time);
            $time = $time[1] + $time[0];
            $this->starttime = $time;

            $cwd = getcwd();
            $cwd = str_replace("\\", "/", $cwd);
            $dirarray = explode("/", $cwd);
            $dir = strtolower($dirarray[sizeof($dirarray) - 1]);

            if ($dir == '~matthewrbowker' || $dir == 'labs' || $dir == 'public_html' || $dir == 'htdocs') $dir = 'root';
            
            $versions = $config->getTool($dir);

            $name = $versions["name"];
            $author = $versions["author"];
            $rootVersion = $versions["root"]["version"];
            $version = $versions["version"];
            $color = $versions["color"];
            $font = $versions["font"];
            $changelog = $versions["changelog"];
            $home = $versions["home"];
            $onload = $versions["onload"];
            $ts_sitename = $config->get("sitename");
            $ts_sn_on = $config->get("sn_on");
            $ts_sitenotice = $config->get("sitenotice");

            if (ISSET($this->onload) && $this->onload != "") $this->onload = " onload = \"" . $this->onload . "\"";

            if ($home == "true") {
                $hometext = "You are home!";
                $abouturl = "vars/about.php?tool=$dir";
                $abouttext = "About these tools";
                $changelogurl = "vars/changelog.php?tool=$dir";
                $csurl = $config->get("scriptloc") . "/css.php";
                $title = "";
            } else {
                $hometext = "<a href='../'>&lt; Return home</a>\n";
                $abouturl = "../vars/about.php?tool=$dir";
                $abouttext = "About this tool";
                $changelogurl = "../vars/changelog.php?tool=$dir";
                $csurl = "../" . $config->get("scriptloc") . "/css.php";
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
            $this->smarty->assign('ts_sitenotice', $ts_sitenotice);
            $this->smarty->assign('hometext', $hometext);
            $this->smarty->assign('abouturl', $abouturl);
            $this->smarty->assign('abouttext', $abouttext);
            $this->smarty->assign('changelogurl', $changelogurl);
            $this->smarty->assign('csurl', $csurl);
            $this->smarty->assign('title', $title);
            $this->smarty->assign('wpHref', $config->get("wpHref"));
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