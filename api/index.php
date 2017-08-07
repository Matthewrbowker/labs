<?php
require('../includes.php');

$config = new config();

$site = new site($config);

$site -> gen_opening();

$site->Display("api.index");

$site -> gen_closing(); ?>