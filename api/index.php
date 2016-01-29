<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

$site->Display("api.index");

$site -> gen_closing(); ?>