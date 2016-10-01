<?php

class config {
    private $values;
    private $tools;

    public function __construct()
    {
        $this->values = [];

        // Tool directory
        $smFile = __FILE__;
        $smFile = str_replace("\\", "/", $smFile);
        $smFileArr = explode("/", $smFile);
        $size = sizeof($smFileArr) - 2;
        $smRootDir = "";

        for ($i = 0; $i < $size; $i++) {
            $smRootDir .= $smFileArr[$i] . "/";
        }

        $this->set("rootDirectory", $smRootDir);

        $defaultsFile = $this->get("rootDirectory") . "vars/vars.ini";
        $configFile = $this->get("rootDirectory") . "vars/vars.local.inc.ini";
        $versionsFile = $this->get("rootDirectory") . "vars/versions.ini";

        $vars1 = parse_ini_file($defaultsFile, true);

        foreach($vars1 as $key => $value) {
            $this->set($key, $value);
        }
        $this->tools = parse_ini_file($versionsFile, true);


        if(file_exists($configFile)) {
            $vars2 = parse_ini_file($configFile, true);

            foreach($vars2 as $key => $value) {
                $this->set($key, $value);
            }
        }

    }

    public function __destruct()
    {
        unset($this->values);
    }

    public function get($key) {
        $retVal = "";
        if ($this->exists($key)) {
            $retVal = $this->values[$key];
        }
        return $retVal;
    }

    public function set($key, $value) {
        $this->values[$key] = $value;
    }

    public function exists($key) {
        return array_key_exists($key, $this->values);
    }

    public function dump() {
        var_dump($this->values);
    }

    public function getTool($tool) {
        return $this->tools[$tool] or die("This tool is missing");
    }
}