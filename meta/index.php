<?php
require("../includes.php");

$site = new site();

$site ->gen_opening();

$site -> Display("meta.index");

$site -> gen_closing();
