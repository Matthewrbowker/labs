<?php

class config {
    private $values;
    public function __construct()
    {
        $this->values = [];

        $vars1 = parse_ini_file('vars.ini', true);

        foreach($vars1 as $key => $value) {
            $this->set($key, $value);
        }

        if(file_exists("vars.local.inc.ini")) {

            $vars2 = parse_ini_file('vars.local.inc.ini', true);

            foreach($vars1 as $key => $value) {
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
}