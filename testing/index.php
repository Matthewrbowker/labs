<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();
$site -> Display("testing.index");
$site -> gen_closing();
