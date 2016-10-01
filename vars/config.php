<?php

class config {
    private $values;
    private $tools;

    public function __construct()
    {
        $this->values = [];

        $vars = parse_ini_file('vars.ini', true);

        foreach($vars as $key => $value) {
            $this->set($key, $value);
        }
        unset($vars);

        $this->tools = parse_ini_file("versions.ini", true);

        if(file_exists("vars.local.inc.ini")) {

            $vars = parse_ini_file('vars.local.inc.ini', true);

            foreach($vars as $key => $value) {
                $this->set($key, $value);
            }
            unset($vars);
        }

    }

    public function __destruct()
    {
        unset($this->values);
    }

    public function get($key) {
        $retVal = "";
        if (array_key_exists($key, $this->values)) {
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