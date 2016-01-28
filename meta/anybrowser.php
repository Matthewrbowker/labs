<?php
require("../includes.php");

$site = new site();

$site ->gen_opening();

$site->Display("meta.anybrowser");

$site -> gen_closing();
