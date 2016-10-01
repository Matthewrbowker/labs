<?php
require("../includes.php");
// Docs of the APIs live here

$config = new config();

$site = new site($config);

$site -> gen_opening();

$site -> Display("api.docs");

$site -> gen_closing();
