<?php
require('../includes.php');

$site = new site();

$site->gen_opening(); ?>

Matthewrbot is my main Wikipedia bot.  It handles tasks related to <a href="<?=$wpHref?>Wikipedia:Requested_articles" target=_blank>the requested articles process</a>.  For more information about this bot, please visit <a href="<?=$wpHref?>User:Matthewrbot" target=_blank>its user page</a>.

<?php $site ->gen_closing();?>