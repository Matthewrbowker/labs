<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

$site -> Display("wikiwelcomer.index");

$site -> gen_closing();
