<?php
require('../includes.php');

$site = new site();

$site->gen_opening();

$site->Display("matthewrbot.index");

$site ->gen_closing();
