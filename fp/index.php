<?php
require('../includes.php');

$site = new site();

$site ->gen_opening();

$site->Display("fp.index");

$site -> gen_closing();
