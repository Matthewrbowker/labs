<?php

// Supporting files
require('vars/site.php'); // Site wrapper - make it look pretty ^^
require('vars/functions.php'); // Functions

require_once('lib/smarty/Smarty.class.php');

// Configuration variables
require('vars/vars.php'); //Starting config variables
// if (file_exists("vars/vars." . $_SERVER["SERVER_NAME"] . ".php")) {require("vars/vars." . $_SERVER["SERVER_NAME"] . ".php"); }

include("vars/vars.local.inc.php");