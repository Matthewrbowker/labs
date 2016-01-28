<?php
require('../includes.php');

$site = new site();

$site -> gen_opening();

$site -> Display("spam.index");

$site -> gen_closing();
