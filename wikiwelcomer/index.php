<?php
require('../includes.php');

$config = new config();

$site = new site($config);

$site -> gen_opening();

$site -> Display("wikiwelcomer.index");

$site -> gen_closing();

