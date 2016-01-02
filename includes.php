<?php

// Supporting files
require('vars/site.php'); // Site wrapper - make it look pretty ^^
require('vars/functions.php'); // Functions

// Configuration variables
require('vars/vars.php'); //Starting config variables
if (file_exists("vars/vars. . $_SERVER[SERVER_NAME] . .php")) {require("vars/vars." . $_SERVER["SERVER_NAME"] . ".php"); }

// More config files can go here.

?>