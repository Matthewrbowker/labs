<?php
require("../includes.php");
// Docs of the APIs live here

$site = new site();

$site -> gen_opening();

$site -> Display("api.docs");

$site -> gen_closing();
